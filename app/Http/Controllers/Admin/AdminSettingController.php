<?php

namespace App\Http\Controllers\Admin;

use App\Models\State;
use App\Models\City;
use App\Models\Setting;
use App\Models\SmtpSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminSettingController extends Controller
{
    // Show form
    public function index(Request $request)
    {
        $smtp = SmtpSetting::first();
        $general = Setting::first();
        $states = State::all();
        $activeTab = $request->tab ?? 'general';

        return view(
            'admin.admin-settings.index',
            compact(
                'smtp',
                'general',
                'states',
                'activeTab'
            )
        );
    }

    public function getCities(Request $request)
    {
        return City::where('state_id', $request->state_id)
            ->orderBy('name')
            ->get(['id', 'name']);
    }

    public function smtpSettingStore(Request $request)
    {
        $existing = SmtpSetting::first();

        $validated = $request->validate([
            'smtp_host' => 'required|string|max:255',
            'smtp_port' => 'required|integer',
            'smtp_username' => 'required|string|max:255',
            // Password is only required the first time; blank later keeps the saved one
            'smtp_password' => [$existing?->smtp_password ? 'nullable' : 'required', 'string'],
            'smtp_encryption' => 'required|in:tls,ssl,none',
            'from_name' => 'nullable|string|max:255',
            'from_email' => 'nullable|email|max:255',
            'reply_to_name' => 'nullable|string|max:255',
            'reply_to_email' => 'nullable|email|max:255',
        ]);

        // Keep the existing password when the field was left blank
        if (empty($validated['smtp_password'])) {
            unset($validated['smtp_password']);
        }

        // Admin email notification toggles
        $validated['notify_contact_enquiry'] = $request->has('notify_contact_enquiry');
        $validated['notify_feedback'] = $request->has('notify_feedback');
        $validated['notify_franchise_enquiry'] = $request->has('notify_franchise_enquiry');

        // Update the existing row (updateOrCreate(['id' => 1]) would insert a new row
        // whenever the saved row's id is not 1, because id is not mass assignable)
        SmtpSetting::getInstance()->update($validated);

        return back()->with(
            'success',
            'SMTP settings saved successfully.'
        );
    }

    public function generalSettingStore(Request $request)
    {
        $general = Setting::first();

        $validated = $request->validate([
            'site_name' => 'nullable|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'admin_email' => 'nullable|email|max:255',
            'support_email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'business_address' => 'nullable|string',
            'business_hours' => 'nullable|string|max:255',
            'google_map_url' => 'nullable|string|max:2000',

            // Header
            'announcement_text' => 'nullable|string|max:255',
            'preloader_subtitle' => 'nullable|string|max:100',

            // Footer
            'footer_description' => 'nullable|string',
            'footer_urdu_text' => 'nullable|string|max:255',
            'footer_copyright' => 'nullable|string|max:255',

            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'pinterest' => 'nullable|url|max:255',
            'currency' => 'nullable|string|max:10',
            'currency_symbol' => 'nullable|string|max:10',
            'timezone' => 'nullable|string|max:100',
            'admin_session_timeout' => 'nullable|integer|min:1|max:1440',
            'header_logo' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'footer_logo' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,jpeg,png,ico,webp|max:1024',
            'admin_login_logo' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'admin_dashboard_logo' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        // If the full <iframe ...> embed code was pasted, keep only the src URL.
        if (!empty($validated['google_map_url']) && stripos($validated['google_map_url'], '<iframe') !== false) {
            if (preg_match('/src=["\']([^"\']+)["\']/i', $validated['google_map_url'], $m)) {
                $validated['google_map_url'] = html_entity_decode($m[1]);
            }
        }

        $validated['maintenance_mode'] = $request->has('maintenance_mode');

        // The column has a default of 60, so never send null
        $validated['admin_session_timeout'] = $validated['admin_session_timeout'] ?? 60;

        // Header Logo
        if ($request->hasFile('header_logo')) {
            if ($general && $general->header_logo && Storage::disk('public')->exists($general->header_logo)) {
                Storage::disk('public')->delete($general->header_logo);
            }
            $validated['header_logo'] = $request->file('header_logo')->store('settings', 'public');
        }

        // Footer Logo
        if ($request->hasFile('footer_logo')) {
            if ($general && $general->footer_logo && Storage::disk('public')->exists($general->footer_logo)) {
                Storage::disk('public')->delete($general->footer_logo);
            }
            $validated['footer_logo'] = $request->file('footer_logo')->store('settings', 'public');
        }

        // Favicon
        if ($request->hasFile('favicon')) {
            if ($general && $general->favicon && Storage::disk('public')->exists($general->favicon)) {
                Storage::disk('public')->delete($general->favicon);
            }
            $validated['favicon'] = $request->file('favicon')->store('settings', 'public');
        }

        // Admin Login Page Logo
        if ($request->hasFile('admin_login_logo')) {
            if ($general && $general->admin_login_logo && Storage::disk('public')->exists($general->admin_login_logo)) {
                Storage::disk('public')->delete($general->admin_login_logo);
            }
            $validated['admin_login_logo'] = $request->file('admin_login_logo')->store('settings', 'public');
        }

        // Admin Dashboard Logo
        if ($request->hasFile('admin_dashboard_logo')) {
            if ($general && $general->admin_dashboard_logo && Storage::disk('public')->exists($general->admin_dashboard_logo)) {
                Storage::disk('public')->delete($general->admin_dashboard_logo);
            }
            $validated['admin_dashboard_logo'] = $request->file('admin_dashboard_logo')->store('settings', 'public');
        }

        Setting::updateOrCreate(
            ['id' => 1],
            $validated
        );

        return back()->with(
            'success',
            'General settings updated successfully.'
        );
    }

}