<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type');

        $faqs = Faq::query()
            ->when(in_array($type, array_keys(Faq::TYPES), true), fn ($q) => $q->where('type', $type))
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        // Counts for the filter tabs
        $counts = Faq::selectRaw('type, count(*) as total')->groupBy('type')->pluck('total', 'type');

        return view('admin.faqs.index', compact('faqs', 'counts', 'type'));
    }

    public function create()
    {
        // Suggest the next position in the order field
        $nextOrder = (Faq::max('sort_order') ?? 0) + 1;

        return view('admin.faqs.create', compact('nextOrder'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        // If left blank, put the new FAQ at the end
        $data['sort_order'] = $request->filled('sort_order')
            ? (int) $request->sort_order
            : (Faq::max('sort_order') ?? 0) + 1;

        Faq::create($data);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ Added Successfully');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);

        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq  = Faq::findOrFail($id);
        $data = $this->validated($request);

        // Keep the current order if the field is cleared
        $data['sort_order'] = $request->filled('sort_order')
            ? (int) $request->sort_order
            : $faq->sort_order;

        $faq->update($data);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ Updated Successfully');
    }

    public function destroy($id)
    {
        Faq::findOrFail($id)->delete();

        return response()->json([
            'message' => 'FAQ Deleted Successfully'
        ]);
    }

    /**
     * Validate and normalise the payload.
     * Only the fields that belong to the chosen type are kept.
     */
    private function validated(Request $request): array
    {
        $services   = config('faq_pages.services');
        $industries = config('faq_pages.industries');

        // Sub services are only valid for the selected main service
        $validSubs = array_keys(data_get($services, [$request->input('service'), 'subs'], []));

        $request->validate([
            'type'        => ['required', Rule::in(array_keys(Faq::TYPES))],
            'service'     => ['nullable', 'required_if:type,' . Faq::TYPE_SERVICE, Rule::in(array_keys($services))],
            'sub_service' => ['nullable', Rule::in($validSubs)],
            'industry'    => ['nullable', 'required_if:type,' . Faq::TYPE_INDUSTRY, Rule::in(array_keys($industries))],
            'question'    => 'required|string|max:255',
            'answer'      => 'required|string',
            'sort_order'  => 'nullable|integer|min:0',
        ], [
            'service.required_if'  => 'Please select a service.',
            'industry.required_if' => 'Please select an industry.',
            'sub_service.in'       => 'The selected sub service does not belong to the selected service.',
        ]);

        $type = $request->type;

        return [
            'type'        => $type,
            'service'     => $type === Faq::TYPE_SERVICE ? $request->service : null,
            'sub_service' => $type === Faq::TYPE_SERVICE ? ($request->sub_service ?: null) : null,
            'industry'    => $type === Faq::TYPE_INDUSTRY ? $request->industry : null,
            'question'    => $request->question,
            'answer'      => $request->answer,
            'status'      => $request->boolean('status'),
        ];
    }
}