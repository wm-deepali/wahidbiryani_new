<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->query('category');

        $categories = MenuCategory::withCount('items')->ordered()->get();

        $items = MenuItem::with('category')
            ->when($categoryId, fn ($q) => $q->where('menu_category_id', $categoryId))
            ->orderBy(
                MenuCategory::select('sort_order')->whereColumn('menu_categories.id', 'menu_items.menu_category_id')
            )
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.menu-items.index', compact('items', 'categories', 'categoryId'));
    }

    public function create(Request $request)
    {
        $categories = MenuCategory::ordered()->get();
        $selectedCategory = $request->query('category');

        return view('admin.menu-items.create', compact('categories', 'selectedCategory'));
    }

    public function store(Request $request)
    {
        $item = MenuItem::create($this->validated($request));

        return redirect()->route('admin.menu-items.index', ['category' => $item->menu_category_id])
            ->with('success', 'Menu item added successfully.');
    }

    public function edit($id)
    {
        $item = MenuItem::findOrFail($id);
        $categories = MenuCategory::ordered()->get();

        return view('admin.menu-items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $item = MenuItem::findOrFail($id);
        $item->update($this->validated($request));

        return redirect()->route('admin.menu-items.index', ['category' => $item->menu_category_id])
            ->with('success', 'Menu item updated successfully.');
    }

    public function destroy($id)
    {
        MenuItem::findOrFail($id)->delete();

        return response()->json(['message' => 'Menu item deleted successfully.']);
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'menu_category_id' => 'required|exists:menu_categories,id',
            'title'            => 'required|string|max:255',
            'serving'          => 'nullable|string|max:100',
            'price'            => 'nullable|string|max:50',
            'description'      => 'nullable|string',
            'sort_order'       => 'nullable|integer|min:0',
            'status'           => 'nullable|boolean',
        ]);

        // Strip currency symbol typed by mistake, keep text prices like "MRP"
        if (!empty($data['price'])) {
            $data['price'] = trim(str_replace(['₹', 'Rs.', 'Rs', ','], '', $data['price']));
        }

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['status']     = $request->boolean('status');

        return $data;
    }
}