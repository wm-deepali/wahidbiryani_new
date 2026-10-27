@extends('layouts.app')

@section('body_class', 'heritage-page page-menu')

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
                            <li class="active text-primary" style="color: var(--color-primary) !important;">Menu</li>
                        </ul>
                    </div>
                </nav>

                <span class="urdu-accent reveal-up text-accent">دسترخوانِ شاہی</span>
                <h1 class="section-title split-words text-primary" style="font-size: clamp(2.5rem, 4vw, 3.75rem);">The
                    Heritage Dastarkhwan</h1>
                <p class="section-desc reveal-up mx-auto text-dark" style="max-width: 600px; opacity: 0.85;">A masterfully
                    curated menu of traditional Awadhi specialties, slow dum cooked and prepared with family archives.</p>

                <div class="hero-ornament reveal-up" style="opacity: 1; transform: none; margin-top: 30px;">
                    <svg width="220" height="20" viewBox="0 0 220 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="ornament-line" d="M10 10H100C105 5 110 1 110 1C110 1 115 5 120 10H210" stroke="#C49A45"
                            stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Menu Section -->
    <section class="section-padding bg-ivory" style="padding-top: 20px;">
        <div class="container">

            @if($categories->count())

                <!-- Category Filter Navigation -->
                <div class="menu-categories reveal-up">
                    <button class="menu-cat-btn active" data-category="all">All Specialties</button>
                    @foreach($categories as $category)
                        <button class="menu-cat-btn" data-category="{{ $category->slug }}">{{ $category->name }}</button>
                    @endforeach
                </div>

                <!-- Menu Grid Listing -->
                <div class="menu-grid">
                    @foreach($categories as $category)
                        @foreach($category->items as $item)
                            <div class="menu-item reveal-scale" data-category="{{ $category->slug }}">
                                <div class="menu-item-info">
                                    <div class="menu-item-header">
                                        <h3 class="menu-item-title">{{ $item->title }}</h3>
                                        @if($item->price !== null && $item->price !== '')
                                            <span class="menu-item-price">{{ $item->displayPrice($currency) }}</span>
                                        @endif
                                    </div>
                                    <p class="menu-item-desc">{{ $item->serving ? $item->serving . ' · ' : '' }}{{ $item->description }}</p>
                                    <span class="menu-item-order" data-bs-toggle="modal" data-bs-target="#menuDetailModal"
                                        data-title="{{ $item->title }}"
                                        data-desc="{{ trim($item->description . ($item->serving ? ' Serving: ' . $item->serving . '.' : '')) }}"
                                        data-price="{{ $item->displayPrice($currency) }}" data-img=""
                                        data-tag="{{ $item->serving }}">View Details <i
                                            class="fa-solid fa-arrow-right"></i></span>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>

            @else
                <p class="text-center text-dark opacity-75">Our menu will be available soon.</p>
            @endif

        </div>
    </section>

    <!-- Bootstrap Menu Detail Lightbox Modal -->
    <div class="modal fade" id="menuDetailModal" tabindex="-1" aria-labelledby="menuDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 440px;">
            <div class="modal-content">
                <div class="modal-header py-2 px-3">
                    <h5 class="modal-title" id="menuDetailModalLabel" style="font-size: 1.1rem;">Dish Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-3 py-3">

                    <!-- Hidden image (kept only so existing JS doesn't break) -->
                    <img id="modalImg" src="" alt="" class="d-none">

                    <span class="urdu-accent d-block mb-1" id="modalTags"
                        style="font-size: 0.75rem; letter-spacing: 0.08em; text-transform: uppercase;"></span>
                    <div class="d-flex justify-content-between align-items-baseline gap-3 mb-2">
                        <h2 class="font-display text-primary m-0" id="modalTitle"
                            style="font-size: 1.5rem; line-height: 1.2;"></h2>
                        <div class="text-accent font-display fw-600" id="modalPrice"
                            style="font-size: 1.3rem; white-space: nowrap;"></div>
                    </div>
                    <p class="font-body text-muted mb-3" id="modalDesc" style="font-size: 0.88rem; line-height: 1.55;"></p>

                    <div class="d-flex gap-2">
                        <a href="{{ route('contact') }}" class="btn btn-burgundy-fill flex-grow-1 text-center py-2"
                            style="font-size: 0.85rem;">Order Online</a>
                        <button type="button" class="btn btn-gold-outline py-2 px-3" style="font-size: 0.85rem;"
                            data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const detailModal = document.getElementById('menuDetailModal');
            if (detailModal) {
                detailModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const title = button.getAttribute('data-title');
                    const desc = button.getAttribute('data-desc');
                    const price = button.getAttribute('data-price');
                    const img = button.getAttribute('data-img');
                    const tag = button.getAttribute('data-tag');

                    document.getElementById('modalTitle').textContent = title;
                    document.getElementById('modalDesc').textContent = desc;
                    document.getElementById('modalPrice').textContent = price;
                    document.getElementById('modalImg').src = img;
                    document.getElementById('modalImg').alt = title;
                    document.getElementById('modalTags').textContent = tag;
                });
            }
        });
    </script>

@endpush