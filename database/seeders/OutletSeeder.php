<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    public function run(): void
    {
        $outlets = [
            [
                'name'     => 'Aminabad Outlet',
                'address'  => 'Naaz Cinema Road, Aminabad, Lucknow',
                'phones'   => '0522-2611878, +91 92366 13111',
                'whatsapp' => '+91 92366 13111',
                'map_url'  => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.8517228807955!2d80.92348367590822!3d26.844654976687445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd0774a12361%3A0xe543360b13cf106b!2sWahid%20Biryani!5e0!3m2!1sen!2sin!4v1723385750000!5m2!1sen!2sin',
            ],
            [
                'name'     => 'Nazirabad Outlet',
                'address'  => 'Medicine Market, Nazirabad, Lucknow',
                'phones'   => '+91 88966 12786, +91 99847 00333',
                'whatsapp' => '+91 88966 12786',
                'map_url'  => 'https://www.google.com/maps?q=Wahid+Biryani+Medicine+Market+Nazirabad+Lucknow&output=embed',
            ],
            [
                'name'     => 'Bangla Bazar Outlet',
                'address'  => 'Ambika Vikar, Sector J, Ashiyana, Lucknow',
                'phones'   => '+91 96489 31111, +91 91988 17222, +91 63907 86444',
                'whatsapp' => '+91 96489 31111',
                'map_url'  => 'https://www.google.com/maps?q=Wahid+Biryani+Ambika+Vikar+Sector+J+Ashiyana+Lucknow&output=embed',
            ],
            [
                'name'     => 'Munshi Pulia Outlet',
                'address'  => 'D-Block, Indira Nagar, Near Jwala Hospital, Munshi Pulia, Lucknow',
                'phones'   => '+91 76078 37666, +91 81748 67555',
                'whatsapp' => '+91 76078 37666',
                'map_url'  => 'https://www.google.com/maps?q=Wahid+Biryani+Indira+Nagar+Munshi+Pulia+Lucknow&output=embed',
            ],
    ];

        foreach ($outlets as $i => $o) {
            Outlet::updateOrCreate(
                ['name' => $o['name']],
                $o + ['sort_order' => $i + 1, 'status' => 1]
            );
        }
    }
}