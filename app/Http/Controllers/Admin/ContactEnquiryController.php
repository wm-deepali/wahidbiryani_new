<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use Illuminate\Http\Request;

class ContactEnquiryController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter'); // null | 'unread'

        $enquiries = ContactEnquiry::query()
            ->when($filter === 'unread', fn ($q) => $q->where('is_read', 0))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        $counts = [
            'all'    => ContactEnquiry::count(),
            'unread' => ContactEnquiry::where('is_read', 0)->count(),
        ];

        return view('admin.contact-enquiries.index', compact('enquiries', 'filter', 'counts'));
    }

    public function show($id)
    {
        $enquiry = ContactEnquiry::findOrFail($id);

        if (!$enquiry->is_read) {
            $enquiry->update(['is_read' => 1]);
        }

        return view('admin.contact-enquiries.show', compact('enquiry'));
    }

    public function destroy($id)
    {
        ContactEnquiry::findOrFail($id)->delete();

        return response()->json(['message' => 'Enquiry deleted successfully.']);
    }
}