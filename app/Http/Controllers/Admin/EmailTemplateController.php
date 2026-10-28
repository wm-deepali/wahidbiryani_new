<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use App\Models\SmtpSetting;
use App\Services\Email\EmailDispatcher;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    public function index()
    {
        return view('admin.admin-settings.templates', self::getData());
    }

    /**
     * Supplies $emailTemplates, $emailMeta, $smtpSettings and $emailSamples
     * to the shared message-templates blade.
     */
    public static function getData(): array
    {
        $templates = EmailTemplate::whereIn('event_key', EmailTemplate::$eventKeys)
            ->get()
            ->keyBy('event_key');

        return [
            'emailMeta' => EmailTemplate::eventMeta(),
            'emailTemplates' => $templates,
            'smtpSettings' => SmtpSetting::getInstance(),
            'emailSamples' => self::sampleVars(),
        ];
    }

    /**
     * Sample values for every template variable.
     * Used by the live preview (blade) and by the test email.
     *
     * Keys must match the placeholders in EmailTemplate::eventMeta().
     */
    public static function sampleVars(string $email = 'priya.verma@example.com'): array
    {
        // Same $general object the front-end layout uses (admin → General Settings)
        $general = view()->shared('general');

        $siteUrl = rtrim(url('/'), '/');
        $brandName = $general?->site_name ?: config('app.name', 'Wahid Biryani');
        $logo = $general?->header_logo_url ?? asset('assets/img/logo.png');

        return [
            // Visitor details (form fields)
            '{name}' => 'Priya Verma',
            '{email}' => $email,
            '{phone}' => '+91 98765 43210',
            '{message}' => 'We loved the biryani at your Aminabad outlet. Do you take bulk orders for weddings?',

            // Contact enquiry
            '{request_type}' => 'Catering / Bulk Order',

            // Feedback
            '{outlet}' => 'Aminabad Outlet',

            // Franchise enquiry
            '{city}' => 'Kanpur',
            '{budget}' => '₹25 - 50 Lakhs',

            // Common
            '{brand_name}' => $brandName,
            '{site_url}' => $siteUrl,
            '{logo_url}' => $logo,
            '{submitted_at}' => now()->format('d M Y, g:i A'),
            '{ip_address}' => '103.21.58.14',
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

        $result = EmailDispatcher::sendTest($eventKey, $email, self::sampleVars($email), 'Test Recipient');

        return response()->json([
            'success' => $result['success'],
            'message' => $result['success']
                ? "Test email sent to {$email}"
                : $result['response'],
        ]);
    }
}