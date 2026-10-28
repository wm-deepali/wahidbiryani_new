<?php

namespace Database\Seeders;

use App\Models\SeoPage;
use Illuminate\Database\Seeder;

class SeoPageSeeder extends Seeder
{
    public function run(): void
    {
        $brand = 'Wahid Biryani';

        // page_key = route name, slug = public URL path ('/' for home)
        $pages = [
            [
                'page_key' => 'home', 'page_name' => 'Home', 'page_group' => 'Main', 'slug' => '/',
                'meta_title' => 'Wahid Biryani | Original Lucknowi Biryani Since 1955',
                'meta_description' => 'Wahid Biryani, the pride of Lucknow since 1955. Enjoy authentic Awadhi biryani, kebabs and Mughlai cuisine at our Lucknow outlets or order online.',
                'meta_keywords' => 'Wahid Biryani, Lucknow biryani, Awadhi biryani, Mughlai cuisine, best biryani in Lucknow',
                'priority' => 1.0, 'freq' => 'daily',
            ],
            [
                'page_key' => 'our-story', 'page_name' => 'Our Story', 'page_group' => 'Our Legacy', 'slug' => 'our-story',
                'meta_title' => "Our Story | {$brand}",
                'meta_description' => 'Read how Wahid Biryani began in 1955 and grew into one of the most loved biryani names in Lucknow, carried forward by four generations.',
                'meta_keywords' => 'Wahid Biryani story, Lucknow food heritage, since 1955',
                'priority' => 0.8, 'freq' => 'monthly',
            ],
            [
                'page_key' => 'wahid-legacy', 'page_name' => 'The Wahid Biryani Legacy', 'page_group' => 'Our Legacy', 'slug' => 'wahid-legacy',
                'meta_title' => "The Wahid Biryani Legacy | {$brand}",
                'meta_description' => 'Discover the legacy of the Quraishi family and the traditional recipes that have kept Wahid Biryani the original taste of Lucknow.',
                'meta_keywords' => 'Wahid Biryani legacy, Quraishi family, Lucknowi recipes',
                'priority' => 0.7, 'freq' => 'monthly',
            ],
            [
                'page_key' => 'director-message', 'page_name' => "Director's Message", 'page_group' => 'Our Legacy', 'slug' => 'director-message',
                'meta_title' => "Director's Message | {$brand}",
                'meta_description' => "A message from the director of Wahid Biryani on tradition, quality and serving Lucknow's tables for generations.",
                'meta_keywords' => 'Wahid Biryani director, director message',
                'priority' => 0.5, 'freq' => 'yearly',
            ],
            [
                'page_key' => 'awards', 'page_name' => 'Awards & Recognitions', 'page_group' => 'Our Legacy', 'slug' => 'awards',
                'meta_title' => "Awards & Recognitions | {$brand}",
                'meta_description' => 'Awards and recognitions earned by Wahid Biryani for authentic Lucknowi flavour and decades of consistent quality.',
                'meta_keywords' => 'Wahid Biryani awards, recognitions, best biryani award',
                'priority' => 0.5, 'freq' => 'yearly',
            ],
            [
                'page_key' => 'signature-dishes', 'page_name' => 'Signature Dishes', 'page_group' => 'Menu', 'slug' => 'signature-dishes',
                'meta_title' => "Signature Dishes | {$brand}",
                'meta_description' => 'Explore the signature dishes of Wahid Biryani, from slow-cooked Awadhi biryani to rich Mughlai curries and kebabs.',
                'meta_keywords' => 'signature dishes, Awadhi biryani, Mughlai kebabs, Lucknow food',
                'priority' => 0.9, 'freq' => 'weekly',
            ],
            [
                'page_key' => 'menu', 'page_name' => 'Menu', 'page_group' => 'Menu', 'slug' => 'menu',
                'meta_title' => "Menu | {$brand}",
                'meta_description' => 'Browse the full Wahid Biryani menu: biryani, kebabs, curries, breads and desserts, all prepared in the traditional Lucknowi way.',
                'meta_keywords' => 'Wahid Biryani menu, biryani menu Lucknow, Mughlai menu',
                'priority' => 0.9, 'freq' => 'weekly',
            ],
            [
                'page_key' => 'our-outlets', 'page_name' => 'Our Outlets', 'page_group' => 'Main', 'slug' => 'our-outlets',
                'meta_title' => "Our Outlets in Lucknow | {$brand}",
                'meta_description' => 'Find a Wahid Biryani outlet near you in Lucknow. See addresses, timings and contact numbers, or order via Swiggy, Zomato and WhatsApp.',
                'meta_keywords' => 'Wahid Biryani outlets, Aminabad, Nazirabad, Indira Nagar, Ashiyana',
                'priority' => 0.9, 'freq' => 'monthly',
            ],
            [
                'page_key' => 'image-gallery', 'page_name' => 'Image Gallery', 'page_group' => 'Gallery', 'slug' => 'image-gallery',
                'meta_title' => "Image Gallery | {$brand}",
                'meta_description' => 'Photos of our dishes, kitchens and outlets. See the food and the heritage behind Wahid Biryani.',
                'meta_keywords' => 'Wahid Biryani photos, biryani images, gallery',
                'priority' => 0.5, 'freq' => 'monthly',
            ],
            [
                'page_key' => 'video-gallery', 'page_name' => 'Video Gallery', 'page_group' => 'Gallery', 'slug' => 'video-gallery',
                'meta_title' => "Video Gallery | {$brand}",
                'meta_description' => 'Watch videos from the Wahid Biryani kitchens, behind the dum cooking and the story of our Lucknowi flavours.',
                'meta_keywords' => 'Wahid Biryani videos, biryani cooking video',
                'priority' => 0.5, 'freq' => 'monthly',
            ],
            [
                'page_key' => 'blogs', 'page_name' => 'Blogs', 'page_group' => 'Content', 'slug' => 'blogs',
                'meta_title' => "Blog | {$brand}",
                'meta_description' => 'Stories, recipes and food culture from Lucknow, shared by the Wahid Biryani team.',
                'meta_keywords' => 'Lucknow food blog, biryani recipes, Awadhi cuisine',
                'priority' => 0.6, 'freq' => 'weekly',
            ],
            [
                'page_key' => 'faq', 'page_name' => 'FAQ', 'page_group' => 'Content', 'slug' => 'faq',
                'meta_title' => "Frequently Asked Questions | {$brand}",
                'meta_description' => 'Answers to common questions about Wahid Biryani: outlets, timings, online ordering, catering and franchise.',
                'meta_keywords' => 'Wahid Biryani FAQ, ordering, catering, franchise questions',
                'priority' => 0.5, 'freq' => 'monthly',
            ],
            [
                'page_key' => 'contact', 'page_name' => 'Contact Us', 'page_group' => 'Contact', 'slug' => 'contact',
                'meta_title' => "Contact Us | {$brand}",
                'meta_description' => 'Get in touch with Wahid Biryani for orders, catering, feedback or general enquiries. Call, WhatsApp or send us a message.',
                'meta_keywords' => 'contact Wahid Biryani, biryani catering Lucknow',
                'priority' => 0.7, 'freq' => 'monthly',
            ],
            [
                'page_key' => 'feedback', 'page_name' => 'Feedback & Suggestions', 'page_group' => 'Contact', 'slug' => 'feedback',
                'meta_title' => "Feedback & Suggestions | {$brand}",
                'meta_description' => 'Share your feedback or suggestions with Wahid Biryani. We read every message and use it to serve you better.',
                'meta_keywords' => 'Wahid Biryani feedback, suggestions',
                'priority' => 0.4, 'freq' => 'yearly',
            ],
            [
                'page_key' => 'franchise', 'page_name' => 'Franchise Enquiry', 'page_group' => 'Contact', 'slug' => 'franchise',
                'meta_title' => "Franchise Enquiry | {$brand}",
                'meta_description' => 'Interested in a Wahid Biryani franchise? Send an enquiry to partner with a trusted Lucknow food brand since 1955.',
                'meta_keywords' => 'Wahid Biryani franchise, biryani franchise India, restaurant franchise',
                'priority' => 0.6, 'freq' => 'monthly',
            ],
        ];

        foreach ($pages as $p) {
            // firstOrCreate: re-running never overwrites SEO edited in admin
            SeoPage::firstOrCreate(
                ['page_key' => $p['page_key']],
                [
                    'page_name'           => $p['page_name'],
                    'page_group'          => $p['page_group'],
                    'slug'                => $p['slug'],
                    'meta_title'          => $p['meta_title'],
                    'meta_description'    => $p['meta_description'],
                    'meta_keywords'       => $p['meta_keywords'],
                    'canonical_url'       => null,
                    'robots'              => 'index, follow',
                    'og_title'            => $p['meta_title'],
                    'og_description'      => $p['meta_description'],
                    'og_image'            => null,
                    'og_type'             => 'website',
                    'twitter_card'        => 'summary_large_image',
                    'twitter_title'       => $p['meta_title'],
                    'twitter_description' => $p['meta_description'],
                    'twitter_image'       => null,
                    'schema_markup'       => null,
                    'scripts'             => null,
                    'body_scripts'        => null,
                    'in_sitemap'          => true,
                    'sitemap_priority'    => $p['priority'],
                    'sitemap_changefreq'  => $p['freq'],
                    'is_active'           => true,
                ]
            );
        }
    }
}