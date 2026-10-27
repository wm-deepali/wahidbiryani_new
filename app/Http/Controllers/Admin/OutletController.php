<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class OutletController extends Controller
{
    public function index()
    {
        $outlets = Outlet::ordered()->get();

        return view('admin.outlets.index', compact('outlets'));
    }

    public function create()
    {
        return view('admin.outlets.create');
    }

    public function store(Request $request)
    {
        Outlet::create($this->validated($request));

        return redirect()->route('admin.outlets.index')
            ->with('success', 'Outlet added successfully.');
    }

    public function edit($id)
    {
        $outlet = Outlet::findOrFail($id);

        return view('admin.outlets.edit', compact('outlet'));
    }

    public function update(Request $request, $id)
    {
        $outlet = Outlet::findOrFail($id);
        $outlet->update($this->validated($request));

        return redirect()->route('admin.outlets.index')
            ->with('success', 'Outlet updated successfully.');
    }

    public function destroy($id)
    {
        Outlet::findOrFail($id)->delete();

        return response()->json(['message' => 'Outlet deleted successfully.']);
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'address'    => 'required|string',
            'email'      => 'nullable|email|max:255',
            'phones'     => 'nullable|string|max:255',
            'whatsapp'   => 'nullable|string|max:50',
            'map_url'    => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'status'     => 'nullable|boolean',
        ]);

        $data['map_url']    = $this->normalizeMapUrl($data['map_url'] ?? null);
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['status']     = $request->boolean('status');

        return $data;
    }

    /**
     * Accepts either the embed URL or the whole <iframe ...> code pasted from Google Maps
     * and returns only the src URL.
     */
    private function normalizeMapUrl(?string $value): ?string
    {
        $value = trim((string) $value);

        if ($value === '') {
            return null;
        }

        if (preg_match('/src=["\']([^"\']+)["\']/i', $value, $m)) {
            $value = html_entity_decode($m[1]);
        }

        if (!Str::startsWith($value, 'https://www.google.com/maps')) {
            throw ValidationException::withMessages([
                'map_url' => 'Please paste the Google Maps embed link (or the full iframe code).',
            ]);
        }

        return $value;
    }
}