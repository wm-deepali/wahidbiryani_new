<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Traits\CompressesImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    use CompressesImages;

    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());

        $imageName = null;

        if ($request->hasFile('image')) {
            // Blog featured image — wide banner-style
            $imageName = $this->compressAndStore(
                $request->file('image'),
                'blogs',
                1200,
                80
            );
        }

        Blog::create([
            'title'             => $request->title,
            'slug'              => Blog::uniqueSlug($request->filled('slug') ? $request->slug : $request->title),
            'category'          => $request->category,
            'published_at'      => $request->published_at,
            'image'             => $imageName,
            'image_alt'         => $request->image_alt,
            'short_description' => $request->short_description,
            'content'           => $request->content,
            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'show_home'         => $request->show_home ? 1 : 0,
            'status'            => $request->status ? 1 : 0,
        ]);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog Added Successfully');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->rules());

        $blog = Blog::findOrFail($id);

        $imageName = $blog->image;

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }

            $imageName = $this->compressAndStore(
                $request->file('image'),
                'blogs',
                1200,
                80
            );
        }

        $blog->update([
            'title'             => $request->title,
            // keeps the existing URL unless the slug field is changed manually
            'slug'              => Blog::uniqueSlug($request->filled('slug') ? $request->slug : $blog->slug, $blog->id),
            'category'          => $request->category,
            'published_at'      => $request->published_at ?: $blog->published_at,
            'image'             => $imageName,
            'image_alt'         => $request->image_alt,
            'short_description' => $request->short_description,
            'content'           => $request->content,
            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'show_home'         => $request->show_home ? 1 : 0,
            'status'            => $request->status ? 1 : 0,
        ]);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog Updated Successfully');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return response()->json([
            'message' => 'Blog Deleted Successfully'
        ]);
    }

    private function rules(): array
    {
        return [
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255',
            'category'          => 'nullable|string|max:100',
            'published_at'      => 'nullable|date',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image_alt'         => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'content'           => 'required|string',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
        ];
    }
}