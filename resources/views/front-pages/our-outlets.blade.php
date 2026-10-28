@extends('layouts.app')

@section('body_class', 'heritage-page page-our-outlets')

@section('content')

    <!-- Page Header -->
    <section class="section-padding text-center heritage-page-header position-relative overflow-hidden bg-ivory"
        style="padding-top: 180px;">

        <div class="sig-jaali-overlay" style="opacity: 0.05; z-index: 1;"></div>

        <div class="container position-relative" style="z-index: 5;">
            <div class="heritage-title-box">

                <nav aria-label="breadcrumb" class="reveal-up mb-4 d-flex justify-content-center">
                    <div class="royal-breadcrumb-wrapper"
                        style="background: rgba(196,154,69,0.05); border-color: rgba(196,154,69,0.25);">
                        <ul class="royal-breadcrumb-list">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="separator">✦</li>
                            <li class="active text-primary" style="color: var(--color-primary) !important;">Our Outlets</li>
                        </ul>
                    </div>
                </nav>

                <span class="urdu-accent reveal-up text-accent">ہماری شاخیں</span>
                <h1 class="section-title split-words text-primary" style="font-size: clamp(2.5rem, 4vw, 3.75rem);">Our
                    Outlets
                </h1>
                <p class="section-desc reveal-up mx-auto text-dark" style="max-width: 600px; opacity: 0.85;">Experience the
                    royal feast of Awadh across our iconic Lucknow locations.</p>

                <div class="hero-ornament reveal-up" style="opacity: 1; transform: none; margin-top: 30px;">
                    <svg width="220" height="20" viewBox="0 0 220 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="ornament-line" d="M10 10H100C105 5 110 1 110 1C110 1 115 5 120 10H210" stroke="#C49A45"
                            stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Outlets Showcase Section -->
    <section class="section-padding bg-cream position-relative overflow-hidden" id="outlets-showcase">
        <div class="container position-relative" style="z-index: 2;">
            <div class="outlet-showcase-container">

                @forelse($outlets as $outlet)
                    <div class="outlet-card {{ $loop->even ? 'reverse-row' : '' }} reveal-up">
                        <div class="outlet-card-inner">

                            <!-- Content Side -->
                            <div class="outlet-content-side">
                                <div>
                                    <div class="outlet-top-meta">
                                        @if($outlet->badge_text)
                                            <span class="outlet-badge {{ $outlet->is_flagship ? 'flagship' : '' }}">
                                                <i class="{{ $outlet->badge_icon }} me-1"></i> {{ $outlet->badge_text }}
                                            </span>
                                        @endif
                                        @if($outlet->urdu_name)
                                            <span class="outlet-urdu-title">{{ $outlet->urdu_name }}</span>
                                        @endif
                                    </div>

                                    <h2 class="outlet-title">{{ $outlet->title ?: $outlet->name }}</h2>
                                    @if($outlet->subtitle)
                                        <h3 class="outlet-subtitle">{{ $outlet->subtitle }}</h3>
                                    @endif
                                    @if($outlet->description)
                                        <p class="outlet-desc">{{ $outlet->description }}</p>
                                    @endif

                                    <!-- Amenities -->
                                    @if(!empty($outlet->amenities))
                                        <div class="outlet-amenities">
                                            @foreach($outlet->amenities as $amenity)
                                                <span class="outlet-amenity-chip">
                                                    <i class="{{ $amenity['icon'] ?? 'fa-solid fa-check' }}"></i> {{ $amenity['label'] }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif

                                    <!-- Info Grid -->
                                    <div class="outlet-info-grid">
                                        <div class="outlet-info-item">
                                            <i class="fa-solid fa-location-dot outlet-info-icon"></i>
                                            <div class="outlet-info-text">
                                                <strong>Address</strong>
                                                <span>{{ $outlet->address }}</span>
                                            </div>
                                        </div>

                                        @if($outlet->prep_time)
                                            <div class="outlet-info-item">
                                                <i class="fa-regular fa-clock outlet-info-icon"></i>
                                                <div class="outlet-info-text">
                                                    <strong>Food Preparation Time</strong>
                                                    <span>{{ $outlet->prep_time }}</span>
                                                </div>
                                            </div>
                                        @endif

                                        @if(count($outlet->phone_list))
                                            <div class="outlet-info-item">
                                                <i class="fa-solid fa-phone outlet-info-icon"></i>
                                                <div class="outlet-info-text">
                                                    <strong>Direct Phone</strong>
                                                    <span>
                                                        @foreach($outlet->phone_list as $phone)
                                                            <a href="{{ $phone['href'] }}" class="text-decoration-none"
                                                                style="color: inherit;">{{ $phone['label'] }}</a>@if(!$loop->last), @endif
                                                        @endforeach
                                                    </span>
                                                </div>
                                            </div>
                                        @endif

                                        @if($outlet->order_platforms)
                                            <div class="outlet-info-item">
                                                <i class="fa-solid fa-bag-shopping outlet-info-icon"></i>
                                                <div class="outlet-info-text">
                                                    <strong>Order Online On</strong>
                                                    <span>{{ $outlet->order_platforms }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="outlet-actions">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#orderOnlineModal"
                                        class="btn btn-burgundy-fill magnetic-btn"><i
                                            class="fa-solid fa-utensils me-2"></i>Order Online</a>
                                    @if($outlet->whatsapp_order_url)
                                        <a href="{{ $outlet->whatsapp_order_url }}" target="_blank" rel="noopener noreferrer"
                                            class="btn btn-whatsapp magnetic-btn"><i
                                                class="fa-brands fa-whatsapp me-2"></i>WhatsApp Order</a>
                                    @endif
                                    <a href="{{ $outlet->directions_url }}" target="_blank" rel="noopener noreferrer"
                                        class="btn btn-gold-outline magnetic-btn"><i
                                            class="fa-solid fa-location-arrow me-2"></i>Get Directions</a>
                                </div>
                            </div>

                            <!-- Visual Side -->
                            @if($outlet->image)
                                <div class="outlet-visual-side">
                                    <img loading="lazy" src="{{ asset($outlet->image) }}"
                                        alt="{{ $outlet->title ?: $outlet->name }}">
                                    <div class="outlet-visual-overlay"></div>
                                    @if($outlet->tag_text)
                                        <div class="outlet-floating-tag">
                                            <span>{{ $outlet->tag_text }}</span>
                                            <i class="{{ $outlet->tag_icon }} tag-icon"></i>
                                        </div>
                                    @endif
                                </div>
                            @endif

                        </div>
                    </div>
                @empty
                    <p class="text-center text-dark opacity-75">Our outlet details will be available soon.</p>
                @endforelse

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
                <h2 class="section-title reveal-up mb-3">Taste the Tradition</h2>
                <p class="section-desc reveal-up mb-4">
                    Experience the authentic culinary legacy that has defined Awadhi cuisine for over seven decades.
                </p>

                <div class="d-flex gap-3 justify-content-center flex-wrap reveal-up pt-2">
                    <a href="{{ route('menu') }}" class="btn btn-burgundy-fill magnetic-btn">View Menu</a>
                    <a href="{{ route('contact') }}" class="btn btn-gold-outline magnetic-btn">Contact Our Team</a>
                </div>
            </div>
        </div>
    </section>

@endsection