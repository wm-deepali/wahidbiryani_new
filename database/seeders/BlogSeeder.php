<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        // Full article body for the first post (from the static detail page)
        $dumPukhtContent = <<<'HTML'
<p class="lead font-display text-primary mb-4" style="font-size: 1.35rem; line-height: 1.6;">The legacy of Awadhi cuisine is intrinsically tied to the slow and deliberate art of Dum Pukht—a culinary technique that translates to "breathe and cook." At Wahid Biryani, this method isn't just a recipe; it's a sacred ritual.</p>

<p class="mb-4">Originating in the royal kitchens of the Nawabs, Dum Pukht involves cooking meat and rice in a heavy-bottomed handi (clay or tin-lined copper pot) sealed tightly with whole wheat dough. This seal traps the aromatic steam, allowing the ingredients to cook in their own juices and infusing every grain of rice with profound, layered flavor.</p>

<div class="row g-3 my-5">
    <div class="col-md-6">
        <div class="rounded-3 overflow-hidden shadow-sm h-100">
            <img alt="Spices" class="w-100 h-100 object-fit-cover" src="/assets/img/awadhi_spices.png" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="rounded-3 overflow-hidden shadow-sm h-100">
            <img alt="Cooking process" class="w-100 h-100 object-fit-cover" src="/assets/img/galouti_kebab.png" />
        </div>
    </div>
</div>

<h3 class="font-display text-primary mt-5 mb-3" style="font-size: 2rem;">The Seal of Perfection</h3>
<p class="mb-4">The dough seal, known as the <em>purdah</em>, acts as an organic pressure vessel, but with far more nuance. It locks in the volatile oils of our signature spices—saffron, mace, cardamom, star anise, and fragrant kewra water. When the seal is finally broken table-side before serving, the aroma that escapes into the room is an ode to centuries of Nawabi luxury.</p>

<blockquote class="p-4 my-5 rounded-3 bg-cream border-start border-4 border-accent">
    <p class="font-display text-primary italic mb-0" style="font-size: 1.25rem;">"A biryani cooked without dum is merely rice and meat. It is the sealed breath of the handi that bestows its soul."</p>
</blockquote>

<h3 class="font-display text-primary mt-5 mb-3" style="font-size: 2rem;">Patience is a Living Virtue</h3>
<p class="mb-4">In today's fast-paced culinary world, the time-consuming nature of Dum Pukht might seem impractical. However, we believe that true perfection cannot be rushed. Our ustaads tend to the charcoal embers with meticulous care, ensuring a gentle, even heat that transforms the ingredients over four to five hours.</p>
HTML;

        $blogs = [
            [
                'title'             => 'The Secret Art of Dum Pukht Cooking',
                'category'          => 'Heritage, Recipes',
                'short_description' => 'Discover how the slow-cooking technique of Dum Pukht elevates the flavors of our signature biryanis to royal standards.',
                'image'             => 'assets/img/dum_pukht.png',
                'content'           => $dumPukhtContent,
                'read_time'         => 5,
                'published_at'      => '2026-08-14',
            ],
            [
                'title'             => 'A Royal Tale: The Origin of Galouti Kebab',
                'category'          => 'Recipes',
                'short_description' => 'Crafted for a Nawab without teeth, the Galouti Kebab remains the pinnacle of melt-in-the-mouth perfection.',
                'image'             => 'assets/img/galouti_kebab.png',
                'published_at'      => '2026-08-10',
            ],
            [
                'title'             => 'The Essential Spices of an Awadhi Kitchen',
                'category'          => 'Culture',
                'short_description' => 'From saffron to mace, explore the magical blend of spices that give our Wahid Biryani its iconic aroma.',
                'image'             => 'assets/img/awadhi_spices.png',
                'published_at'      => '2026-08-06',
            ],
            [
                'title'             => 'The Perfect Chicken Biryani',
                'category'          => 'Cuisine',
                'short_description' => 'Dive into the layers of flavor that make our Chicken Biryani a timeless classic, loved by generations.',
                'image'             => 'assets/img/chicken_biryani.jpeg',
                'published_at'      => '2026-08-02',
            ],
            [
                'title'             => 'Sweet Endings: Shahi Tukda',
                'category'          => 'Desserts',
                'short_description' => 'The royal dessert that perfectly concludes a Nawabi feast. Learn about the rich history of this bread pudding.',
                'image'             => 'assets/img/shahi_tukda.jpg',
                'published_at'      => '2026-07-28',
            ],
            [
                'title'             => 'Dining Like the Nawabs',
                'category'          => 'Experience',
                'short_description' => 'Experience the ambiance and tradition of a true Lucknowi Dastarkhwan at Wahid Biryani.',
                'image'             => 'assets/img/heritage-dining.png',
                'published_at'      => '2026-07-24',
            ],
        ];

        foreach ($blogs as $i => $b) {
            $slug = Str::slug($b['title']);

            Blog::updateOrCreate(
                ['slug' => $slug],
                [
                    'title'             => $b['title'],
                    'category'          => $b['category'],
                    'urdu_accent'       => 'روایتی مضامین',
                    'short_description' => $b['short_description'],
                    'image'             => $b['image'],
                    'banner_image'      => $b['image'],
                    // Posts without a full article get a placeholder body — replace from admin
                    'content'           => $b['content'] ?? '<p class="mb-4">' . e($b['short_description']) . '</p>',
                    'author_name'       => 'Wahid Archives',
                    'author_title'      => 'Culinary Historian',
                    'author_image'      => 'assets/img/author_demo.jpg',
                    'read_time'         => $b['read_time'] ?? 5,
                    'published_at'      => $b['published_at'],
                    'sort_order'        => $i + 1,
                    'status'            => 1,
                ]
            );
        }
    }
}