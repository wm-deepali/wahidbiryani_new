<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'What makes Wahid Biryani authentic and unique?',
                'answer'   => "Our biryani is crafted using the ancient Awadhi Dum-Pukht technique. Rice and meat are cooked together slowly in dough-sealed, tin-lined copper handis over wood charcoal fires (sigri), infused with our family's secret 32-spice potli and pure Kashmiri saffron.",
            ],
            [
                'question' => 'Where was the first Wahid Biryani outlet opened?',
                'answer'   => 'The original outlet was established in 1955 by Marhoom Wahid Ali Sahab on Old Nazirabad Road in Aminabad, Lucknow. It continues to be the historic culinary landmark of the city.',
            ],
            [
                'question' => 'Do you offer Royal Outdoor Catering for weddings and private events?',
                'answer'   => 'Yes, we provide luxury Awadhi Dastarkhwan outdoor catering for weddings, royal receptions, and private banquets. Our master chefs prepare live Dum-Pukht handis and Ulta Tawa counters on-site.',
            ],
            [
                'question' => 'How can I order food online or book a table?',
                'answer'   => 'You can order directly through our website by visiting our Menu page, or reach out to our central desk via WhatsApp and phone at +91 522 2622555.',
            ],
            [
                'question' => 'How can I enquire about Wahid Biryani Franchise opportunities?',
                'answer'   => "You can submit your business proposal and details on our Franchise Enquiry page. Our director's office will get in touch with you directly.",
            ],
        ];

        foreach ($faqs as $i => $faq) {
            Faq::updateOrCreate(
                ['question' => $faq['question']],
                [
                    'answer'     => $faq['answer'],
                    'sort_order' => $i + 1,
                    'status'     => 1,
                ]
            );
        }
    }
}