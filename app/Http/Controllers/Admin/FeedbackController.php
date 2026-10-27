<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter'); // null | 'unread'

        $feedbacks = Feedback::query()
            ->when($filter === 'unread', fn ($q) => $q->where('is_read', 0))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        $counts = [
            'all'    => Feedback::count(),
            'unread' => Feedback::where('is_read', 0)->count(),
        ];

        return view('admin.feedbacks.index', compact('feedbacks', 'filter', 'counts'));
    }

    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);

        if (!$feedback->is_read) {
            $feedback->update(['is_read' => 1]);
        }

        return view('admin.feedbacks.show', compact('feedback'));
    }

    public function destroy($id)
    {
        Feedback::findOrFail($id)->delete();

        return response()->json(['message' => 'Feedback deleted successfully.']);
    }
}