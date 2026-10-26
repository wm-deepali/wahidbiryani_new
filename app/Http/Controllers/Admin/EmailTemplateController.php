<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use App\Models\SmtpSetting;
use App\Services\Email\EmailDispatcher;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    /**
     * The blade is shared with SMS templates — this just
     * supplies the $emailTemplates and $emailMeta variables.
     * The view is loaded by whatever controller already renders
     * the message-templates page; call getData() from there.
     */
    public static function getData(): array
    {
        $meta = EmailTemplate::eventMeta();

        // Keyed by event_key for easy blade lookup
        $templates = EmailTemplate::whereIn('event_key', EmailTemplate::$eventKeys)
            ->get()
            ->keyBy('event_key');

        return [
            'emailMeta' => $meta,
            'emailTemplates' => $templates,
            'smtpSettings' => SmtpSetting::getInstance(),
        ];
    }

    /**
     * AJAX save — POST /admin/settings/email-templates/{eventKey}
     */
    public function save(Request $request, string $eventKey): \Illuminate\Http\JsonResponse
    {
        if (!in_array($eventKey, EmailTemplate::$eventKeys)) {
            return response()->json(['success' => false, 'message' => 'Invalid event key.'], 422);
        }

        $validated = $request->validate([
            'enabled' => 'nullable|boolean',
            'from_name' => 'nullable|string|max:100',
            'from_email' => 'nullable|email|max:150',
            'reply_to_name' => 'nullable|string|max:100',
            'reply_to_email' => 'nullable|email|max:150',
            'cc' => 'nullable|email|max:150',
            'subject' => 'nullable|string|max:255',
            'preview_text' => 'nullable|string|max:255',
            'body' => 'nullable|string',
        ]);

        $template = EmailTemplate::firstOrNew(['event_key' => $eventKey]);
        $template->fill([
            'enabled' => (bool) ($validated['enabled'] ?? false),
            'from_name' => $validated['from_name'] ?? null,
            'from_email' => $validated['from_email'] ?? null,
            'reply_to_name' => $validated['reply_to_name'] ?? null,
            'reply_to_email' => $validated['reply_to_email'] ?? null,
            'cc' => $validated['cc'] ?? null,
            'subject' => $validated['subject'] ?? null,
            'preview_text' => $validated['preview_text'] ?? null,
            'body' => $validated['body'] ?? null,
            'extra_settings' => null,
        ]);
        $template->save();

        return response()->json([
            'success' => true,
            'message' => "'{$eventKey}' email template saved.",
        ]);
    }

    /**
     * AJAX test send — POST /admin/settings/email-templates/test
     */
    public function sendTest(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'event_key' => 'required|string',
            'email' => 'required|email',
        ]);

        $eventKey = $request->input('event_key');
        $email = $request->input('email');

        // Sample variables — matches EmailTemplate::eventMeta() vars exactly
        $samples = [
            // Customer (business / service enquiry)
            '{customer_name}' => 'Rahul Sharma',
            '{customer_email}' => $email,
            '{customer_mobile}' => '+91 98765 43210',
            '{service}' => 'Website Development',
            '{message}' => 'I would like a quote for a 10 page business website.',

            // Candidate (career form)
            '{candidate_name}' => 'Priya Verma',
            '{candidate_email}' => $email,
            '{candidate_mobile}' => '+91 91234 56789',
            '{position}' => 'Laravel Developer',
            '{apply_type}' => 'Job',

            // Global
            '{brand_name}' => config('app.name', 'Web Mingo'),
            '{site_url}' => url('/'),
            '{logo_url}' => asset('assets/images/logo.png'),
        ];

        $result = EmailDispatcher::sendTest($eventKey, $email, $samples, 'Test Recipient');

        return response()->json([
            'success' => $result['success'],
            'message' => $result['success']
                ? "Test email sent to {$email}"
                : $result['response'],
        ]);
    }
}