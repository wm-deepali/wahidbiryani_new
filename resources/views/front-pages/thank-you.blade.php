@extends('layouts.app')

@section('body_class', 'heritage-page page-thank-you')

{{-- Thank-you page should never show up in search results --}}
@push('styles')
    <meta name="robots" content="noindex, nofollow">
@endpush

@section('content')

    @php
        $copy = [
            'contact' => [
                'urdu' => 'شکریہ',
                'title' => 'Thank You for Writing to Us',
                'desc' => 'Your message has reached our heritage concierge team. We will get back to you shortly on the phone number or email you shared.',
            ],
            'feedback' => [
                'urdu' => 'آپ کی رائے کا شکریہ',
                'title' => 'Thank You for Your Feedback',
                'desc' => 'Every word you share helps us keep the taste and service of Wahid Biryani true to its 1955 tradition.',
            ],
            'franchise' => [
                'urdu' => 'خوش آمدید',
                'title' => 'Thank You for Your Interest',
                'desc' => 'We have received your franchise enquiry. Our team will review your details and contact you soon to take the conversation forward.',
            ],
        ][$type];
    @endphp

    <!-- Thank You Section -->
    <section class="section-padding text-center heritage-page-header position-relative overflow-hidden bg-ivory"
        style="padding-top: 180px; min-height: 80vh;">

        <!-- Subtle Pattern -->
        <div class="sig-jaali-overlay" style="opacity: 0.05; z-index: 1;"></div>

        <div class="container position-relative" style="z-index: 5;">
            <div class="heritage-title-box">

                <!-- Royal Breadcrumb -->
                <nav aria-label="breadcrumb" class="reveal-up mb-4 d-flex justify-content-center">
                    <div class="royal-breadcrumb-wrapper"
                        style="background: rgba(196,154,69,0.05); border-color: rgba(196,154,69,0.25);">
                        <ul class="royal-breadcrumb-list">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="separator">✦</li>
                            <li class="active text-primary" style="color: var(--color-primary) !important;">Thank You</li>
                        </ul>
                    </div>
                </nav>

                <!-- Gold check emblem -->
                <div class="reveal-up mb-3">
                    <span class="d-inline-flex align-items-center justify-content-center rounded-circle"
                        style="width: 84px; height: 84px; border: 2px solid var(--color-accent); color: var(--color-accent); font-size: 2.2rem;">
                        <i class="fa-solid fa-check"></i>
                    </span>
                </div>

                <span class="urdu-accent reveal-up text-accent">{{ $copy['urdu'] }}</span>
                <h1 class="section-title split-words text-primary" style="font-size: clamp(2.5rem, 4vw, 3.75rem);">
                    {{ $copy['title'] }}</h1>
                <p class="section-desc reveal-up mx-auto text-dark" style="max-width: 600px; opacity: 0.85;">
                    {{ $copy['desc'] }}
                </p>

                <div class="hero-ornament reveal-up" style="opacity: 1; transform: none; margin-top: 30px;">
                    <svg width="220" height="20" viewBox="0 0 220 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="ornament-line" d="M10 10H100C105 5 110 1 110 1C110 1 115 5 120 10H210" stroke="#C49A45"
                            stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>

                <div class="d-flex gap-3 justify-content-center flex-wrap reveal-up pt-4">
                    <a href="{{ route('home') }}" class="btn btn-burgundy-fill magnetic-btn">Back to Home</a>
                    <a href="{{ route('menu') }}" class="btn btn-gold-outline magnetic-btn">Explore Menu</a>
                </div>
            </div>
        </div>
    </section>

@endsection