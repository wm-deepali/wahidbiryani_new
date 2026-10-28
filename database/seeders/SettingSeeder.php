<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        // Singleton settings row. firstOrCreate() means re-running the seeder
        // will NOT overwrite values already edited from the admin panel.
        Setting::firstOrCreate(
            ['id' => 1],
            [
                // Site Identity (logos/favicon left empty -> model falls back to assets/img/logo.png)
                'site_name'            => 'Wahid Biryani',
                'tagline'              => 'Har Mehfil Ki Shaan.',
                'header_logo'          => null,
                'footer_logo'          => null,
                'admin_login_logo'     => null,
                'admin_dashboard_logo' => null,
                'favicon'              => null,

                // Contact
                'admin_email'          => 'info@wahidbiryani.com',
                'support_email'        => 'info@wahidbiryani.com',
                'phone'                => '0522-2611878',
                'whatsapp'             => '9125066660',
                'business_address'     => 'Naaz Cinema Road, Aminabad, Lucknow',
                'business_hours'       => '12:30 PM to 10:30 PM (Daily)',

                // Header
                'announcement_text'    => 'Since 1955 | The Original Taste of Lucknow | Serving Generations with the Same Aroma & Tradition',
                'preloader_subtitle'   => 'Since 1955',

                // Footer
                'footer_description'   => 'Pride of Lucknow since 1955. Wahid Biryani carries the legacy of four generations of the Quraishi family, serving the real taste of Mughlai cuisine at every mehfil.',
                'footer_urdu_text'     => 'روایت • نسلاً بعد نسل',
                'footer_copyright'     => "© 2026 Wahid Biryani Private Limited. The Real Taste of Mughlai Cuisine. Lucknow, India.\nAll heritage recipes, logos, and cultural typography are property of Wahid Biryani.",
                'google_map_url'       => null,

                // Social Links
                'facebook'             => 'https://www.facebook.com/wahidbiryani',
                'instagram'            => 'https://www.instagram.com/wahid_biryani_/',
                'twitter'              => null,
                'linkedin'             => null,
                'youtube'              => null,
                'pinterest'            => null,

                // Regional
                'currency'             => 'INR',
                'currency_symbol'      => '₹',
                'timezone'             => 'Asia/Kolkata',

                // Features
                'maintenance_mode'     => false,
                'admin_session_timeout' => 60,
            ]
        );
    }
}