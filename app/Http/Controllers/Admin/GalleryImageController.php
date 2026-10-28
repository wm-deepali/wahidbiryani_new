<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryImageController extends Controller
{
    private const UPLOAD_DIR = 'gallery'; // storage/app/public/gallery

    public function index()
    {
        $images = GalleryImage::ordered()->get();

        return view('admin.gallery-images.index', compact('images'));
    }

    public function create()
    {
        return view('admin.gallery-images.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules(true));

        $data['image']      = $request->file('image')->store(self::UPLOAD_DIR, 'public');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['status']     = $request->boolean('status');

        GalleryImage::create($data);

        return redirect()->route('admin.gallery-images.index')
            ->with('success', 'Gallery image added successfully.');
    }

    public function edit($id)
    {
        $image = GalleryImage::findOrFail($id);

        return view('admin.gallery-images.edit', compact('image'));
    }

    public function update(Request $request, $id)
    {
        $image = GalleryImage::findOrFail($id);
        $data  = $request->validate($this->rules(false));

        if ($request->hasFile('image')) {
            $this->deleteFile($image->image);
            $data['image'] = $request->file('image')->store(self::UPLOAD_DIR, 'public');
        } else {
            unset($data['image']);
        }

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['status']     = $request->boolean('status');

        $image->update($data);

        return redirect()->route('admin.gallery-images.index')
            ->with('success', 'Gallery image updated successfully.');
    }

    public function destroy($id)
    {
        $image = GalleryImage::findOrFail($id);

        $this->deleteFile($image->image);
        $image->delete();

        return response()->json(['message' => 'Gallery image deleted successfully.']);
    }

    private function rules(bool $imageRequired): array
    {
        return [
            'title'      => 'required|string|max:255',
            'subtitle'   => 'nullable|string|max:255',
            'image'      => ($imageRequired ? 'required' : 'nullable') . '|image|mimes:jpg,jpeg,png,webp|max:4096',
            'sort_order' => 'nullable|integer|min:0',
            'status'     => 'nullable|boolean',
        ];
    }

    // Only delete files we uploaded (gallery/...), never static assets/ images
    private function deleteFile(?string $path): void
    {
        if ($path && Str::startsWith($path, self::UPLOAD_DIR . '/')) {
            Storage::disk('public')->delete($path);
        }
    }
}