<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use Illuminate\Http\Request;

class ContactEnquiryController extends Controller
{
    private const STATUSES = ['new', 'contacted', 'closed'];

    public function index(Request $request)
    {
        $query = ContactEnquiry::query()->latest();

        if ($request->filled('status') && in_array($request->status, self::STATUSES, true)) {
            $query->where('status', $request->status);
        }

        if ($request->filled('service')) {
            $query->where('service', $request->service);
        }

        if ($request->filled('q')) {
            $q = trim($request->q);
            $query->where(function ($w) use ($q) {
                $w->where('full_name', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%")
                    ->orWhere('phone', 'like', "%{$q}%")
                    ->orWhere('company', 'like', "%{$q}%")
                    ->orWhere('message', 'like', "%{$q}%");
            });
        }

        $enquiries = $query->paginate(15)->withQueryString();

        $counts = ContactEnquiry::selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $services = ContactEnquiry::select('service')->distinct()->orderBy('service')->pluck('service');

        return view('admin.enquiries.index', compact('enquiries', 'counts', 'services'));
    }

    public function show(ContactEnquiry $enquiry)
    {
        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function update(Request $request, ContactEnquiry $enquiry)
    {
        $data = $request->validate([
            'status' => 'required|in:' . implode(',', self::STATUSES),
        ]);

        $enquiry->update($data);

        return back()->with('success', 'Enquiry status updated.');
    }

    public function destroy(ContactEnquiry $enquiry)
    {
        $enquiry->delete();

        return redirect()
            ->route('admin.enquiries.index')
            ->with('success', 'Enquiry deleted.');
    }
}