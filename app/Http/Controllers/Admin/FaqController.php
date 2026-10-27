<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::ordered()->get();

        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        Faq::create($this->validated($request));

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ added successfully.');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);

        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->update($this->validated($request));

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ updated successfully.');
    }

    public function destroy($id)
    {
        Faq::findOrFail($id)->delete();

        return response()->json(['message' => 'FAQ deleted successfully.']);
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'question'   => 'required|string|max:255',
            'answer'     => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'status'     => 'nullable|boolean',
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['status']     = $request->boolean('status');

        return $data;
    }
}