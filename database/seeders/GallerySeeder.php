<?php

namespace Database\Seeders;

use App\Models\GalleryImage;
use App\Models\GalleryVideo;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $this->seedImages();
        $this->seedVideos();
    }

    // Existing static images (served from public/assets/img)
    private function seedImages(): void
    {
        $images = [
            ['assets/img/gallery1.jpeg', 'Smiles at the Outlet', 'Moments'],
            ['assets/img/gallery2.jpeg', "Lucknow's Oldest Taste of Mughlai Food", 'Heritage'],
            ['assets/img/gallery3.jpeg', 'The Wahid Biryani Family', 'Our People'],
            ['assets/img/gallery4.jpeg', 'A Warm Welcome for Our Guests', 'Hospitality'],
            ['assets/img/gallery7.jpeg', 'Guests Who Love Wahid', 'Guests'],
            ['assets/img/gallery9.jpeg', 'Celebrations at the Outlet', 'Celebrations'],
        ];

        foreach ($images as $i => [$path, $title, $subtitle]) {
            GalleryImage::updateOrCreate(
                ['image' => $path],
                [
                    'title'      => $title,
                    'subtitle'   => $subtitle,
                    'sort_order' => $i + 1,
                    'status'     => 1,
                ]
            );
        }
    }

    // Existing static reels (mp4 files in public/assets/video, posters in public/assets/video/poster)
    // Seeded as "upload" videos so they keep playing from your own server.
    private function seedVideos(): void
    {
        $videos = [
            ['insta1', 'The Real Taste of Mughlai Cuisine', 'Wahid Biryani • Since 1955'],
            ['insta2', 'Har Mehfil Ki Shaan', 'Wahid Biryani • Lucknow'],
            ['insta3', 'Pride of Lucknow Since 1955', 'Wahid Biryani • Since 1955'],
            ['insta4', '4th Generation of Legacy', 'Quraishi Family • Since 1902'],
            ['insta5', 'Review of Saudi Customer', 'Wahid Biryani • Customer Review'],
            ['insta6', 'Wahid Biryani Outlet', 'Wahid Biryani • Lucknow'],
            ['insta7', 'Wahid Biryani at Night', 'Wahid Biryani • Lucknow'],
            ['insta8', 'Happy Customer with Wahid Biryani', 'Wahid Biryani • Since 1955'],
        ];

        foreach ($videos as $i => [$file, $title, $subtitle]) {
            GalleryVideo::updateOrCreate(
                ['video_file' => "assets/video/{$file}.mp4"],
                [
                    'title'      => $title,
                    'subtitle'   => $subtitle,
                    'video_url'  => null,
                    'platform'   => GalleryVideo::PLATFORM_UPLOAD,
                    'thumbnail'  => "assets/video/poster/{$file}.png",
                    'sort_order' => $i + 1,
                    'status'     => 1,
                ]
            );
        }
    }
}