<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    private const UPLOAD_DIR = 'blogs'; // stored on the 'public' disk => storage/app/public/blogs
    private const IMAGE_FIELDS = ['image', 'banner_image', 'author_image'];

    public function index()
    {
        $blogs = Blog::ordered()->get();

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data = $this->handleUploads($request, $data);

        Blog::create($data);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog added successfully.');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $data = $this->validated($request, $blog);
        $data = $this->handleUploads($request, $data, $blog);

        $blog->update($data);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        foreach (self::IMAGE_FIELDS as $field) {
            $this->deleteFile($blog->{$field});
        }

        $blog->delete();

        return response()->json(['message' => 'Blog deleted successfully.']);
    }

    /* ---------------- helpers ---------------- */

    private function validated(Request $request, ?Blog $blog = null): array
    {
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => ['nullable', 'string', 'max:255', Rule::unique('blogs', 'slug')->ignore($blog?->id)],
            'category'         => 'nullable|string|max:255',
            'urdu_accent'      => 'nullable|string|max:255',
            'short_description'=> 'nullable|string',
            'content'          => 'required|string',
            'author_name'      => 'nullable|string|max:255',
            'author_title'     => 'nullable|string|max:255',
            'read_time'        => 'nullable|integer|min:1|max:999',
            'published_at'     => 'nullable|date',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'sort_order'       => 'nullable|integer|min:0',
            'status'           => 'nullable|boolean',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'banner_image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'author_image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
        ]);

        $data['slug']        = !empty($data['slug']) ? Str::slug($data['slug']) : null; // model auto-generates when empty
        $data['author_name'] = $data['author_name'] ?: 'Wahid Archives';
        $data['read_time']   = $data['read_time'] ?? 5;
        $data['sort_order']  = $data['sort_order'] ?? 0;
        $data['status']      = $request->boolean('status');

        return $data;
    }

    private function handleUploads(Request $request, array $data, ?Blog $blog = null): array
    {
        foreach (self::IMAGE_FIELDS as $field) {
            unset($data[$field]); // drop UploadedFile objects from validated data

            if ($request->hasFile($field)) {
                if ($blog) {
                    $this->deleteFile($blog->{$field});
                }
                $data[$field] = $this->storeFile($request->file($field));
            }
        }

        return $data;
    }

    private function storeFile($file): string
    {
        // Saved to storage/app/public/blogs, served via the public/storage symlink
        return $file->store(self::UPLOAD_DIR, 'public');
    }

    private function deleteFile(?string $path): void
    {
        // Only delete files we uploaded (blogs/...), never static assets/ images
        if ($path && Str::startsWith($path, self::UPLOAD_DIR . '/')) {
            Storage::disk('public')->delete($path);
        }
    }
}