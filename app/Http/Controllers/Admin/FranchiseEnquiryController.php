<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FranchiseEnquiry;
use Illuminate\Http\Request;

class FranchiseEnquiryController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter'); // null | 'unread'

        $enquiries = FranchiseEnquiry::query()
            ->when($filter === 'unread', fn ($q) => $q->where('is_read', 0))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        $counts = [
            'all'    => FranchiseEnquiry::count(),
            'unread' => FranchiseEnquiry::where('is_read', 0)->count(),
        ];

        return view('admin.franchise-enquiries.index', compact('enquiries', 'filter', 'counts'));
    }

    public function show($id)
    {
        $enquiry = FranchiseEnquiry::findOrFail($id);

        if (!$enquiry->is_read) {
            $enquiry->update(['is_read' => 1]);
        }

        return view('admin.franchise-enquiries.show', compact('enquiry'));
    }

    public function destroy($id)
    {
        FranchiseEnquiry::findOrFail($id)->delete();

        return response()->json(['message' => 'Franchise enquiry deleted successfully.']);
    }
}