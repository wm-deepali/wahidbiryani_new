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
        $data   = $this->validated($request);

        // New image uploaded -> remove the old uploaded one
        if (isset($data['image']) && $outlet->image) {
            $this->deleteUploadedImage($outlet->image);
        }

        $outlet->update($data);

        return redirect()->route('admin.outlets.index')
            ->with('success', 'Outlet updated successfully.');
    }

    public function destroy($id)
    {
        $outlet = Outlet::findOrFail($id);

        if ($outlet->image) {
            $this->deleteUploadedImage($outlet->image);
        }

        $outlet->delete();

        return response()->json(['message' => 'Outlet deleted successfully.']);
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name'                  => 'required|string|max:255',
            'address'               => 'required|string',
            'email'                 => 'nullable|email|max:255',
            'phones'                => 'nullable|string|max:255',
            'whatsapp'              => 'nullable|string|max:50',
            'map_url'               => 'nullable|string',
            'timings'               => 'nullable|string|max:100',

            'swiggy_url'            => 'nullable|url|max:500',
            'zomato_url'            => 'nullable|url|max:500',

            'title'                 => 'nullable|string|max:255',
            'subtitle'              => 'nullable|string|max:255',
            'urdu_name'             => 'nullable|string|max:255',
            'description'           => 'nullable|string',
            'badge_text'            => 'nullable|string|max:255',
            'badge_icon'            => 'nullable|string|max:100',
            'is_flagship'           => 'nullable|boolean',
            'amenities'             => 'nullable|array',
            'amenities.*.icon'      => 'nullable|string|max:100',
            'amenities.*.label'     => 'nullable|string|max:100',
            'prep_time'             => 'nullable|string|max:100',
            'image'                 => 'nullable|image|max:3072',
            'tag_text'              => 'nullable|string|max:255',
            'tag_icon'              => 'nullable|string|max:100',

            'sort_order'            => 'nullable|integer|min:0',
            'status'                => 'nullable|boolean',
        ]);

        $data['map_url']     = $this->normalizeMapUrl($data['map_url'] ?? null);
        $data['sort_order']  = $data['sort_order'] ?? 0;
        $data['status']      = $request->boolean('status');
        $data['is_flagship'] = $request->boolean('is_flagship');

        // Columns that are NOT NULL with a default: empty input must fall back to the default
        $data['timings']    = $data['timings']    ?? '12:30 PM – 10:30 PM';
        $data['prep_time']  = $data['prep_time']  ?? '15 – 20 Minutes';
        $data['badge_icon'] = $data['badge_icon'] ?? 'fa-solid fa-hotel';
        $data['tag_icon']   = $data['tag_icon']   ?? 'fa-solid fa-star';

        // Amenities: drop empty rows, reindex
        $data['amenities'] = collect($data['amenities'] ?? [])
            ->filter(fn ($a) => filled($a['label'] ?? null))
            ->map(fn ($a) => [
                'icon'  => $a['icon'] ?: 'fa-solid fa-check',
                'label' => $a['label'],
            ])
            ->values()
            ->all() ?: null;

        // Image: only touch the column when a new file is uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                . '-' . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/outlets'), $name);
            $data['image'] = 'uploads/outlets/' . $name;
        } else {
            unset($data['image']);
        }

        return $data;
    }

    /** Only deletes files we uploaded (not the static assets/img/* files). */
    private function deleteUploadedImage(string $path): void
    {
        if (Str::startsWith($path, 'uploads/outlets/')) {
            $full = public_path($path);

            if (is_file($full)) {
                @unlink($full);
            }
        }
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