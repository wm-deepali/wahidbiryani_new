@extends('layouts.app')

@section('body_class', 'heritage-page page-blog-listing')

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
                            <li class="active text-primary" style="color: var(--color-primary) !important;">Blog</li>
                        </ul>
                    </div>
                </nav>

                <span class="urdu-accent reveal-up text-accent">داستانِ اودھ</span>
                <h1 class="section-title split-words text-primary" style="font-size: clamp(2.5rem, 4vw, 3.75rem);">Awadhi
                    Chronicles</h1>
                <p class="section-desc reveal-up mx-auto text-dark" style="max-width: 600px; opacity: 0.85;">Stories,
                    recipes, and the rich culinary heritage of Lucknow, preserved for generations.</p>

                <div class="hero-ornament reveal-up" style="opacity: 1; transform: none; margin-top: 30px;">
                    <svg width="220" height="20" viewBox="0 0 220 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="ornament-line" d="M10 10H100C105 5 110 1 110 1C110 1 115 5 120 10H210" stroke="#C49A45"
                            stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Listing Section -->
    <section class="section-padding bg-ivory">
        <div class="container">

            @if($blogs->count())
                <div class="row g-5">
                    @foreach($blogs as $blog)
                        <div class="col-lg-4 col-md-6">
                            <div
                                class="branch-card p-0 rounded-4 overflow-hidden position-relative transition-all h-100 d-flex flex-column">
                                @if($blog->image_url)
                                    <div class="image-reveal-wrapper">
                                        <img alt="{{ $blog->title }}" class="w-100 h-100" src="{{ $blog->image_url }}" />
                                    </div>
                                @endif
                                <div class="p-4 d-flex flex-column flex-grow-1">
                                    @if($blog->primary_category)
                                        <span class="text-accent mb-2 font-body text-uppercase">{{ $blog->primary_category }}</span>
                                    @endif
                                    <h3 class="font-display text-primary mb-3">{{ $blog->title }}</h3>
                                    <p class="font-body text-dark opacity-75 mb-4">
                                        {{ \Illuminate\Support\Str::limit($blog->short_description, 140) }}</p>
                                    <a class="mt-auto font-body text-accent fw-bold text-uppercase d-flex align-items-center hover-text-primary transition-fast"
                                        href="{{ route('blog-detail', $blog->slug) }}">
                                        Read Article <i class="fa-solid fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($blogs->hasPages())
                    <div class="d-flex justify-content-center mt-5">
                        {{ $blogs->links() }}
                    </div>
                @endif
            @else
                <p class="text-center text-dark opacity-75">No articles have been published yet. Please check back soon.</p>
            @endif

        </div>
    </section>

@endsection