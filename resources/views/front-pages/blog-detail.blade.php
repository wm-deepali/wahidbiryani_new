@extends('layouts.app')

@section('title', $blog->meta_title ?: $blog->title)
@section('meta_description', $blog->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($blog->short_description), 160))

@section('body_class', 'heritage-page page-blog-detail')

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
                            <li><a href="{{ route('blogs') }}">Blog</a></li>
                            <li class="separator">✦</li>
                            <li class="active text-primary" style="color: var(--color-primary) !important;">Article</li>
                        </ul>
                    </div>
                </nav>

                @if($blog->urdu_accent)
                    <span class="urdu-accent reveal-up text-accent">{{ $blog->urdu_accent }}</span>
                @endif
                <h1 class="section-title split-words text-primary" style="font-size: clamp(2.5rem, 4vw, 3.75rem);">
                    {{ $blog->title }}</h1>
                @if($blog->short_description)
                    <p class="section-desc reveal-up mx-auto text-dark" style="max-width: 600px; opacity: 0.85;">
                        {{ $blog->short_description }}</p>
                @endif

                <div class="hero-ornament reveal-up" style="opacity: 1; transform: none; margin-top: 30px;">
                    <svg width="220" height="20" viewBox="0 0 220 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="ornament-line" d="M10 10H100C105 5 110 1 110 1C110 1 115 5 120 10H210" stroke="#C49A45"
                            stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Detail Section -->
    <section class="section-padding bg-ivory">
        <div class="container">
            <div class="row g-5">

                <!-- Left Side: Author / Info Card (Sticky) -->
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="sticky-lg-top" style="top: 100px;">
                        <div
                            class="blog-sidebar-card p-4 rounded-4 shadow-sm transition-all reveal-up bg-white border border-accent-subtle">
                            <div class="text-center mb-4 pb-4 border-bottom border-accent-subtle">
                                <div class="author-avatar mb-3 mx-auto rounded-circle overflow-hidden shadow-sm d-flex align-items-center justify-content-center"
                                    style="width: 90px; height: 90px; background: rgba(196,154,69,0.1);">
                                    @if($blog->author_image_url)
                                        <img alt="{{ $blog->author_name }}" class="w-100 h-100 object-fit-cover"
                                            src="{{ $blog->author_image_url }}" />
                                    @else
                                        <span class="font-display text-accent fs-2">{{ strtoupper(mb_substr($blog->author_name, 0, 1)) }}</span>
                                    @endif
                                </div>
                                <h4 class="font-display text-primary mb-1">{{ $blog->author_name }}</h4>
                                @if($blog->author_title)
                                    <p class="text-accent text-uppercase mb-0 font-body"
                                        style="font-size: 0.8rem; letter-spacing: 1px;">{{ $blog->author_title }}</p>
                                @endif
                            </div>

                            <div class="blog-meta-info mb-4 font-body" style="font-size: 0.9rem;">
                                <div class="d-flex align-items-center mb-3 text-dark opacity-75">
                                    <div class="icon-wrap d-flex align-items-center justify-content-center rounded-circle me-3"
                                        style="width: 32px; height: 32px; background: rgba(196,154,69,0.1);">
                                        <i class="fa-regular fa-calendar text-accent fs-6"></i>
                                    </div>
                                    <span>{{ ($blog->published_at ?? $blog->created_at)->format('F d, Y') }}</span>
                                </div>
                                <div class="d-flex align-items-center mb-3 text-dark opacity-75">
                                    <div class="icon-wrap d-flex align-items-center justify-content-center rounded-circle me-3"
                                        style="width: 32px; height: 32px; background: rgba(196,154,69,0.1);">
                                        <i class="fa-regular fa-clock text-accent fs-6"></i>
                                    </div>
                                    <span>{{ $blog->read_time }} Min Read</span>
                                </div>
                                @if(count($blog->categories))
                                    <div class="d-flex align-items-center text-dark opacity-75">
                                        <div class="icon-wrap d-flex align-items-center justify-content-center rounded-circle me-3"
                                            style="width: 32px; height: 32px; background: rgba(196,154,69,0.1);">
                                            <i class="fa-regular fa-folder-open text-accent fs-6"></i>
                                        </div>
                                        <span>{{ implode(', ', $blog->categories) }}</span>
                                    </div>
                                @endif
                            </div>

                            <div class="social-share mt-4 pt-4 border-top border-accent-subtle text-center">
                                <span class="font-display text-primary d-block mb-3 fw-bold">Share this story</span>
                                <div class="d-flex justify-content-center gap-3">
                                    <a class="btn rounded-circle d-flex align-items-center justify-content-center border border-accent"
                                        href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                        target="_blank" rel="noopener" style="width: 38px; height: 38px;"><i
                                            class="fa-brands fa-facebook-f text-accent"></i></a>
                                    <a class="btn rounded-circle d-flex align-items-center justify-content-center border border-accent"
                                        href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->title) }}"
                                        target="_blank" rel="noopener" style="width: 38px; height: 38px;"><i
                                            class="fa-brands fa-x-twitter text-accent"></i></a>
                                    <a class="btn rounded-circle d-flex align-items-center justify-content-center border border-accent"
                                        href="https://wa.me/?text={{ urlencode($blog->title . ' ' . url()->current()) }}"
                                        target="_blank" rel="noopener" style="width: 38px; height: 38px;"><i
                                            class="fa-brands fa-whatsapp text-accent"></i></a>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <a class="btn btn-burgundy-fill w-100 magnetic-btn rounded-3 py-2"
                                    href="{{ route('blogs') }}">Back to Articles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Blog Details -->
                <div class="col-lg-9 order-1 order-lg-2">
                    @if($blog->banner_url)
                        <div class="rounded-4 overflow-hidden mb-4 shadow-lg reveal-scale">
                            <img alt="{{ $blog->title }}" class="w-100 h-100 object-fit-cover"
                                src="{{ $blog->banner_url }}" style="max-height: 450px;" />
                        </div>
                    @endif

                    <!-- Article Content (HTML from the admin editor) -->
                    <div class="blog-content font-body text-dark opacity-85 reveal-up"
                        style="line-height: 1.9; font-size: 1.05rem;">
                        {!! $blog->content !!}
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection