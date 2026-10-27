<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class MenuCategoryController extends Controller
{
    public function index()
    {
        $categories = MenuCategory::withCount('items')->ordered()->get();

        return view('admin.menu-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.menu-categories.create');
    }

    public function store(Request $request)
    {
        MenuCategory::create($this->validated($request));

        return redirect()->route('admin.menu-categories.index')
            ->with('success', 'Category added successfully.');
    }

    public function edit($id)
    {
        $category = MenuCategory::findOrFail($id);

        return view('admin.menu-categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = MenuCategory::findOrFail($id);
        $category->update($this->validated($request, $category));

        return redirect()->route('admin.menu-categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = MenuCategory::withCount('items')->findOrFail($id);

        if ($category->items_count > 0) {
            return response()->json([
                'message' => 'This category still has ' . $category->items_count . ' item(s). Move or delete them first.',
            ], 422);
        }

        $category->delete();

        return response()->json(['message' => 'Category deleted successfully.']);
    }

    private function validated(Request $request, ?MenuCategory $category = null): array
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'slug'       => ['nullable', 'string', 'max:255', Rule::unique('menu_categories', 'slug')->ignore($category?->id)],
            'sort_order' => 'nullable|integer|min:0',
            'status'     => 'nullable|boolean',
        ]);

        $data['slug']       = !empty($data['slug']) ? Str::slug($data['slug']) : null; // model auto-generates when empty
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['status']     = $request->boolean('status');

        return $data;
    }
}