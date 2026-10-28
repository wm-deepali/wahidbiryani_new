<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class GalleryVideoController extends Controller
{
    private const THUMB_DIR = 'gallery/video-thumbs'; // storage/app/public/gallery/video-thumbs
    private const VIDEO_DIR = 'gallery/videos';       // storage/app/public/gallery/videos

    public function index()
    {
        $videos = GalleryVideo::ordered()->get();

        return view('admin.gallery-videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.gallery-videos.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data = $this->applySource($request, $data);
        $data = $this->applyThumbnail($request, $data);

        GalleryVideo::create($data);

        return redirect()->route('admin.gallery-videos.index')
            ->with('success', 'Gallery video added successfully.');
    }

    public function edit($id)
    {
        $video = GalleryVideo::findOrFail($id);

        return view('admin.gallery-videos.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $video = GalleryVideo::findOrFail($id);

        $data = $this->validated($request);
        $data = $this->applySource($request, $data, $video);
        $data = $this->applyThumbnail($request, $data, $video);

        $video->update($data);

        return redirect()->route('admin.gallery-videos.index')
            ->with('success', 'Gallery video updated successfully.');
    }

    public function destroy($id)
    {
        $video = GalleryVideo::findOrFail($id);

        $this->deleteFile($video->thumbnail);
        $this->deleteFile($video->video_file);
        $video->delete();

        return response()->json(['message' => 'Gallery video deleted successfully.']);
    }

    /* ---------------- helpers ---------------- */

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'subtitle'         => 'nullable|string|max:255',
            'source'           => 'required|in:link,upload',
            'video_url'        => 'nullable|required_if:source,link|url|max:2000',
            // 50 MB — also check upload_max_filesize / post_max_size in php.ini
            'video_file'       => 'nullable|file|mimes:mp4,webm,mov|max:51200',
            'thumbnail'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'remove_thumbnail' => 'nullable|boolean',
            'sort_order'       => 'nullable|integer|min:0',
            'status'           => 'nullable|boolean',
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['status']     = $request->boolean('status');

        return $data;
    }

    /**
     * Sets video_url / video_file / platform according to the chosen source
     * and removes whichever one no longer applies.
     */
    private function applySource(Request $request, array $data, ?GalleryVideo $video = null): array
    {
        $source = $data['source'];
        unset($data['source'], $data['video_file']);

        if ($source === 'link') {
            $info = GalleryVideo::analyze($data['video_url'] ?? null);

            if (!$info) {
                throw ValidationException::withMessages([
                    'video_url' => 'Please enter a valid YouTube, Facebook or Instagram video / reel link.',
                ]);
            }

            if ($video) {
                $this->deleteFile($video->video_file); // switched from an uploaded file to a link
            }

            $data['video_url']  = trim($data['video_url']);
            $data['video_file'] = null;
            $data['platform']   = $info['platform'];

            return $data;
        }

        // source = upload
        if ($request->hasFile('video_file')) {
            if ($video) {
                $this->deleteFile($video->video_file);
            }

            $data['video_file'] = $request->file('video_file')->store(self::VIDEO_DIR, 'public');
        } elseif ($video && $video->video_file) {
            $data['video_file'] = $video->video_file; // keep the current file
        } else {
            throw ValidationException::withMessages([
                'video_file' => 'Please upload a video file (MP4, WebM or MOV).',
            ]);
        }

        $data['video_url'] = null;
        $data['platform']  = GalleryVideo::PLATFORM_UPLOAD;

        return $data;
    }

    private function applyThumbnail(Request $request, array $data, ?GalleryVideo $video = null): array
    {
        $remove = !empty($data['remove_thumbnail']);
        unset($data['remove_thumbnail'], $data['thumbnail']);

        if ($request->hasFile('thumbnail')) {
            if ($video) {
                $this->deleteFile($video->thumbnail);
            }

            $data['thumbnail'] = $request->file('thumbnail')->store(self::THUMB_DIR, 'public');
        } elseif ($remove && $video) {
            $this->deleteFile($video->thumbnail);
            $data['thumbnail'] = null;
        }

        return $data;
    }

    // Only delete files we uploaded (gallery/...), never static assets
    private function deleteFile(?string $path): void
    {
        if ($path && Str::startsWith($path, 'gallery/')) {
            Storage::disk('public')->delete($path);
        }
    }
}