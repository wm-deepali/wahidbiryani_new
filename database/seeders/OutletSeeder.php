<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    public function run(): void
    {
        $common = [
            ['icon' => 'fa-solid fa-award',       'label' => 'Since 1955'],
            ['icon' => 'fa-solid fa-certificate', 'label' => 'ISO Certified'],
        ];

        $outlets = [
            [
                'name'        => 'Aminabad Outlet',
                'address'     => 'Naaz Cinema Road, Aminabad, Lucknow',
                'phones'      => '0522-2611878, +91 92366 13111',
                'whatsapp'    => '+91 92366 13111',
                'map_url'     => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.8517228807955!2d80.92348367590822!3d26.844654976687445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd0774a12361%3A0xe543360b13cf106b!2sWahid%20Biryani!5e0!3m2!1sen!2sin!4v1723385750000!5m2!1sen!2sin',
                'timings'     => '12:30 PM – 10:30 PM',
                'swiggy_url'  => 'https://www.swiggy.com/city/lucknow/wahid-biryani-aminabad-rest462690',
                'zomato_url'  => 'https://www.zomato.com/lucknow/wahid-biryani-1-aminabad/info',
                'title'       => 'Wahid Biryani Aminabad',
                'subtitle'    => 'The Real Taste of Mughlai Cuisine',
                'urdu_name'   => 'امین آباد',
                'description' => 'Wahid Biryani, the Pride of Lucknow since 1955, welcomes you at its Aminabad outlet on Naaz Cinema Road. Enjoy authentic Mughlai cuisine, from Dum Biryani and legendary Kababs to rich curries and breads, prepared with the legacy of four generations of the Quraishi family.',
                'badge_text'  => 'Since 1955 • Pride of Lucknow',
                'badge_icon'  => 'fa-solid fa-crown',
                'is_flagship' => true,
                'amenities'   => array_merge($common, [
                    ['icon' => 'fa-solid fa-bag-shopping', 'label' => 'Swiggy & Zomato'],
                    ['icon' => 'fa-solid fa-oil-can',      'label' => 'Fortune Soyabean Oil'],
                ]),
                'prep_time'   => '15 – 20 Minutes',
                'image'       => 'assets/img/Aminabad.png',
                'tag_text'    => '✦ Aminabad Outlet • Since 1955',
                'tag_icon'    => 'fa-solid fa-crown',
            ],
            [
                'name'        => 'Nazirabad Outlet',
                'address'     => 'Medicine Market, Nazirabad, Lucknow',
                'phones'      => '+91 88966 12786, +91 99847 00333',
                'whatsapp'    => '+91 88966 12786',
                'map_url'     => 'https://www.google.com/maps?q=Wahid+Biryani+Medicine+Market+Nazirabad+Lucknow&output=embed',
                'timings'     => '12:30 PM – 10:30 PM',
                'swiggy_url'  => null,
                'zomato_url'  => null,
                'title'       => 'Wahid Biryani Nazirabad',
                'subtitle'    => 'Har Mehfil Ki Shaan',
                'urdu_name'   => 'نظیر آباد',
                'description' => 'Find Wahid Biryani at Medicine Market, Nazirabad. Savour our signature Biryani, Kababs, Mughlai curries and breads, made fresh in the true Mughlai tradition that has made us the Pride of Lucknow since 1955.',
                'badge_text'  => 'Wahid Biryani Outlet',
                'badge_icon'  => 'fa-solid fa-hotel',
                'is_flagship' => false,
                'amenities'   => array_merge($common, [
                    ['icon' => 'fa-solid fa-champagne-glasses', 'label' => 'Catering Services'],
                ]),
                'prep_time'   => '15 – 20 Minutes',
                'image'       => 'assets/img/naziradbadd.png',
                'tag_text'    => '✦ Nazirabad Outlet • Har Mehfil Ki Shaan',
                'tag_icon'    => 'fa-solid fa-star',
            ],
            [
                'name'        => 'Bangla Bazar Outlet',
                'address'     => 'Ambika Vikar, Sector J, Ashiyana, Lucknow',
                'phones'      => '+91 96489 31111, +91 91988 17222, +91 63907 86444',
                'whatsapp'    => '+91 96489 31111',
                'map_url'     => 'https://www.google.com/maps?q=Wahid+Biryani+Ambika+Vikar+Sector+J+Ashiyana+Lucknow&output=embed',
                'timings'     => '12:30 PM – 10:30 PM',
                'swiggy_url'  => 'https://www.swiggy.com/city/lucknow/wahid-biryani-ambika-vihar-aashiana-rest415138',
                'zomato_url'  => 'https://www.zomato.com/lucknow/wahid-biryani-aashiana/info',
                'title'       => 'Wahid Biryani Bangla Bazar',
                'subtitle'    => 'Pride of Lucknow Since 1955',
                'urdu_name'   => 'بنگلہ بازار',
                'description' => "Visit our Bangla Bazar outlet at Ambika Vikar, Sector J, Ashiyana. Enjoy Wahid Biryani's famous Mughlai flavours, from Galavati and Boti Kababs to Biryani, Rolls and fresh breads, served in the tradition of four generations.",
                'badge_text'  => 'Wahid Biryani Outlet',
                'badge_icon'  => 'fa-solid fa-fire',
                'is_flagship' => false,
                'amenities'   => array_merge($common, [
                    ['icon' => 'fa-solid fa-bag-shopping', 'label' => 'Swiggy & Zomato'],
                    ['icon' => 'fa-solid fa-handshake',    'label' => 'Franchise Available'],
                ]),
                'prep_time'   => '15 – 20 Minutes',
                'image'       => 'assets/img/Bangla.png',
                'tag_text'    => '✦ Bangla Bazar Outlet',
                'tag_icon'    => 'fa-solid fa-fire',
            ],
            [
                'name'        => 'Munshi Pulia Outlet',
                'address'     => 'D-Block, Indira Nagar, Near Jwala Hospital, Munshi Pulia, Lucknow',
                'phones'      => '+91 76078 37666, +91 81748 67555',
                'whatsapp'    => '+91 76078 37666',
                'map_url'     => 'https://www.google.com/maps?q=Wahid+Biryani+Indira+Nagar+Munshi+Pulia+Lucknow&output=embed',
                'timings'     => '12:30 PM – 10:30 PM',
                'swiggy_url'  => 'https://www.swiggy.com/city/lucknow/wahid-biryani-indira-nagar-rest989590',
                'zomato_url'  => 'https://www.zomato.com/lucknow/wahid-biryani-indira-nagar/order',
                'title'       => 'Wahid Biryani Munshi Pulia',
                'subtitle'    => '4th Generation of Legacy',
                'urdu_name'   => 'منشی پلیا',
                'description' => 'Located at D-Block, Indira Nagar, near Jwala Hospital, our Munshi Pulia outlet brings you the real taste of Mughlai cuisine. Dine on our signature Biryani, Kababs and curries, backed by a legacy of four generations.',
                'badge_text'  => 'Wahid Biryani Outlet',
                'badge_icon'  => 'fa-solid fa-hotel',
                'is_flagship' => false,
                'amenities'   => array_merge($common, [
                    ['icon' => 'fa-solid fa-bag-shopping',      'label' => 'Swiggy & Zomato'],
                    ['icon' => 'fa-solid fa-champagne-glasses', 'label' => 'Catering Services'],
                ]),
                'prep_time'   => '15 – 20 Minutes',
                'image'       => 'assets/img/munshi-pulia.png',
                'tag_text'    => '✦ Munshi Pulia Outlet',
                'tag_icon'    => 'fa-solid fa-star',
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