@extends('layouts.app')

@section('body_class', 'heritage-page')

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
                            <li><a href="{{ route('image-gallery') }}">Gallery</a></li>
                            <li class="separator">✦</li>
                            <li class="active text-primary" style="color: var(--color-primary) !important;">Image Gallery
                            </li>
                        </ul>
                    </div>
                </nav>

                <span class="urdu-accent reveal-up text-accent">تصویری گیلری</span>
                <h1 class="section-title split-words text-primary" style="font-size: clamp(2.5rem, 4vw, 3.75rem);">Visual
                    Archives</h1>
                <p class="section-desc reveal-up mx-auto text-dark" style="max-width: 600px; opacity: 0.85;">Explore the
                    culinary art, historical kitchen moments, and our legendary Awadhi dastarkhwan.</p>

                <div class="hero-ornament reveal-up" style="opacity: 1; transform: none; margin-top: 30px;">
                    <svg width="220" height="20" viewBox="0 0 220 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="ornament-line" d="M10 10H100C105 5 110 1 110 1C110 1 115 5 120 10H210" stroke="#C49A45"
                            stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Image Gallery -->
    <section class="section-padding bg-ivory" style="padding-top: 40px; padding-bottom: 80px;">
        <div class="container">

            @if($images->count())
                <div class="gallery-grid">
                    @foreach($images as $image)
                        <div class="gallery-item reveal-scale"
                            style="position: relative; overflow: hidden; border-radius: 12px; aspect-ratio: 4/5;">
                            <img loading="lazy" src="{{ $image->image_url }}" alt="{{ $image->title }}"
                                style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease;">
                            <div class="gallery-overlay">
                                <h3 class="gallery-title">{{ $image->title }}</h3>
                                @if($image->subtitle)
                                    <span class="gallery-category">{{ $image->subtitle }}</span>
                                @endif
                                <div class="gallery-view-icon"><i class="fa-solid fa-eye"></i></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-dark opacity-75">Our gallery will be available soon.</p>
            @endif

        </div>
    </section>

    <!-- Royal Gallery Lightbox Modal -->
    <div class="modal fade royal-lightbox-modal" id="galleryLightboxModal" tabindex="-1"
        aria-labelledby="galleryLightboxModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Close Button -->
                <button type="button" class="royal-lightbox-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>

                <div class="royal-lightbox-body">
                    <!-- Main Image Stage -->
                    <div class="royal-lightbox-stage">
                        <!-- Nav Arrows -->
                        <button class="royal-lightbox-nav prev-btn" id="lightboxPrevBtn" aria-label="Previous Image">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button class="royal-lightbox-nav next-btn" id="lightboxNextBtn" aria-label="Next Image">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>

                        <!-- Lightbox Image -->
                        <img id="lightboxImg" src="" alt="Gallery Preview">
                    </div>

                    <!-- Caption Footer -->
                    <div class="royal-lightbox-footer">
                        <div class="royal-lightbox-meta">
                            <span class="royal-lightbox-cat" id="lightboxCat">Category</span>
                            <h3 class="royal-lightbox-title" id="lightboxTitle">Image Title</h3>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <span class="royal-lightbox-count" id="lightboxCount">1 / {{ $images->count() }}</span>
                            <a href="{{ route('menu') }}" class="btn btn-burgundy-fill btn-sm magnetic-btn py-2 px-3">Order
                                Special</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const galleryItems = document.querySelectorAll('.gallery-item');
            const lightboxModalEl = document.getElementById('galleryLightboxModal');
            if (!lightboxModalEl) return;

            const lightboxModal = new bootstrap.Modal(lightboxModalEl);
            const lightboxImg = document.getElementById('lightboxImg');
            const lightboxTitle = document.getElementById('lightboxTitle');
            const lightboxCat = document.getElementById('lightboxCat');
            const lightboxCount = document.getElementById('lightboxCount');
            const prevBtn = document.getElementById('lightboxPrevBtn');
            const nextBtn = document.getElementById('lightboxNextBtn');

            let currentIndex = 0;
            const imagesData = [];

            galleryItems.forEach((item, idx) => {
                const img = item.querySelector('img');
                const title = item.querySelector('.gallery-title') ? item.querySelector('.gallery-title').textContent.trim() : '';
                const cat = item.querySelector('.gallery-category') ? item.querySelector('.gallery-category').textContent.trim() : '';

                imagesData.push({
                    src: img ? img.getAttribute('src') : '',
                    alt: img ? img.getAttribute('alt') : '',
                    title: title,
                    cat: cat
                });

                item.addEventListener('click', function () {
                    showImage(idx);
                    lightboxModal.show();
                });
            });

            function showImage(index) {
                if (index < 0) index = imagesData.length - 1;
                if (index >= imagesData.length) index = 0;
                currentIndex = index;

                const data = imagesData[currentIndex];
                if (!data) return;

                lightboxImg.style.opacity = '0.3';
                lightboxImg.style.transform = 'scale(0.96)';

                setTimeout(() => {
                    lightboxImg.src = data.src;
                    lightboxImg.alt = data.alt || data.title;
                    lightboxTitle.textContent = data.title;
                    lightboxCat.textContent = data.cat;
                    lightboxCount.textContent = `${currentIndex + 1} / ${imagesData.length}`;

                    lightboxImg.style.opacity = '1';
                    lightboxImg.style.transform = 'scale(1)';
                }, 120);
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    showImage(currentIndex - 1);
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    showImage(currentIndex + 1);
                });
            }

            // Keyboard navigation
            document.addEventListener('keydown', function (e) {
                if (!lightboxModalEl.classList.contains('show')) return;
                if (e.key === 'ArrowLeft') {
                    showImage(currentIndex - 1);
                } else if (e.key === 'ArrowRight') {
                    showImage(currentIndex + 1);
                }
            });
        });
    </script>

@endpush