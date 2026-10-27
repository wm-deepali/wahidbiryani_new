@extends('layouts.app')

@section('body_class', 'heritage-page page-faq')

@section('content')

    <!-- Page Header -->
    <section class="section-padding text-center heritage-page-header position-relative overflow-hidden bg-ivory"
        style="padding-top: 180px;">

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
                            <li class="active text-primary" style="color: var(--color-primary) !important;">FAQ</li>
                        </ul>
                    </div>
                </nav>

                <span class="urdu-accent reveal-up text-accent">سوالات و جوابات</span>
                <h1 class="section-title split-words text-primary" style="font-size: clamp(2.5rem, 4vw, 3.75rem);">
                    Frequently Asked Questions</h1>
                <p class="section-desc reveal-up mx-auto text-dark" style="max-width: 600px; opacity: 0.85;">
                    Everything you need to know about our 1955 recipes, hand-ground spices, outlets, catering, and
                    Tehzeeb.</p>

                <div class="hero-ornament reveal-up" style="opacity: 1; transform: none; margin-top: 30px;">
                    <svg width="220" height="20" viewBox="0 0 220 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="ornament-line" d="M10 10H100C105 5 110 1 110 1C110 1 115 5 120 10H210" stroke="#C49A45"
                            stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section-padding bg-ivory">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    @if($faqs->count())
                        <div class="accordion custom-accordion" id="faqAccordion">
                            @foreach($faqs as $faq)
                                <div class="accordion-item bg-transparent border-0 mb-4 rounded-4 overflow-hidden">
                                    <h2 class="accordion-header">
                                        <button
                                            class="accordion-button {{ $loop->first ? '' : 'collapsed' }} bg-white text-primary font-display fw-bold px-4 py-3"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq{{ $faq->id }}"
                                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                            aria-controls="faq{{ $faq->id }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="faq{{ $faq->id }}"
                                        class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body bg-white font-body text-dark opacity-75 px-4 pb-4 pt-1">
                                            {!! nl2br(e($faq->answer)) !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center text-dark opacity-75">No questions have been added yet. Please check back soon.</p>
                    @endif

                </div>
            </div>
        </div>
    </section>

    <!-- Royal CTA Banner Section -->
    <section class="royal-cta-banner text-center position-relative">
        <div class="rumi-cta-arch-bg">
            <svg width="600" height="280" viewBox="0 0 600 280" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 270V160C20 160 50 80 150 80C210 80 250 20 300 5C350 20 390 80 450 80C550 80 580 160 580 270"
                    stroke="#C49A45" stroke-width="3" stroke-linecap="round" fill="none" />
                <path
                    d="M70 270V190C70 190 100 120 180 120C230 120 260 60 300 40C340 60 370 120 420 120C500 120 530 190 530 270"
                    stroke="#C49A45" stroke-width="1.5" stroke-dasharray="4 4" fill="none" />
                <circle cx="300" cy="35" r="8" fill="#C49A45" />
            </svg>
        </div>

        <div class="container position-relative royal-cta-container">
            <div class="royal-cta-box">
                <span class="urdu-accent reveal-up d-block mb-2">خوش آمدید</span>
                <h2 class="section-title reveal-up mb-3">Still Have Questions?</h2>
                <p class="section-desc reveal-up mb-4">
                    Our heritage concierge team is always here to assist you with any questions or catering requests.
                </p>

                <div class="d-flex gap-3 justify-content-center flex-wrap reveal-up pt-2">
                    <a href="{{ route('contact') }}" class="btn btn-burgundy-fill magnetic-btn">Contact Us</a>
                    <a href="{{ route('menu') }}" class="btn btn-gold-outline magnetic-btn">Explore Menu</a>
                </div>
            </div>
        </div>
    </section>

@endsection