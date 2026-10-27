@extends('layouts.app')

@section('body_class', 'heritage-page')

@section('content')

  <!-- Page Header -->
  <section class="section-padding text-center heritage-page-header position-relative overflow-hidden bg-ivory" style="padding-top: 180px;>

    <!-- Subtle Pattern -->
    <div class=" sig-jaali-overlay" style="opacity: 0.05; z-index: 1;">
    </div>

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
              <li class="active text-primary" style="color: var(--color-primary) !important;">Video Gallery</li>
            </ul>
          </div>
        </nav>

        <span class="urdu-accent reveal-up text-accent">ویڈیو گیلری</span>
        <h1 class="section-title split-words text-primary" style="font-size: clamp(2.5rem, 4vw, 3.75rem);">Cinematic
          Heritage</h1>
        <p class="section-desc reveal-up mx-auto text-dark" style="max-width: 600px; opacity: 0.85;">Watch the magic
          unfold. See the bustling kitchens, the charcoal sigris, and the legacy of our chefs in motion.</p>

        <div class="hero-ornament reveal-up" style="opacity: 1; transform: none; margin-top: 30px;">
          <svg width="220" height="20" viewBox="0 0 220 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="ornament-line" d="M10 10H100C105 5 110 1 110 1C110 1 115 5 120 10H210" stroke="#C49A45"
              stroke-width="1.5" stroke-linecap="round" />
          </svg>
        </div>
      </div>
    </div>
  </section>

  <!-- Video Gallery -->
  <section class="section-padding bg-ivory" style="padding-top: 40px; padding-bottom: 80px;">
    <div class="container">

      <div class="reels-grid">

        <!-- Reel 1 -->
        <div class="reel-card-item reveal-scale">
          <div class="reel-card" data-reel-id="reel-1">
            <div class="reel-thumbnail-wrap">
              <img loading="lazy" src="assets/video/poster/insta1.png" alt="The Real Taste of Mughlai Cuisine" class="reel-poster">
              <video class="reel-video" muted playsinline loop preload="metadata" poster="assets/img/chicken_biryani.jpeg">
                <source src="assets/video/insta1.mp4" type="video/mp4">
              </video>
            </div>
            <div class="reel-overlay"></div>

            <div class="reel-top-bar">
              <span class="reel-badge-pill">
                <i class="fa-brands fa-instagram text-accent"></i> Reel
              </span>
            </div>

            <!-- Sound Toggle Pill -->
            <button type="button" class="reel-sound-btn" aria-label="Toggle Sound" title="Sound Mute/Unmute">
              <i class="fa-solid fa-volume-xmark"></i>
            </button>

            <div class="reel-center-action">
              <button type="button" class="reel-play-btn" aria-label="Play Reel Video">
                <i class="fa-solid fa-play"></i>
              </button>
            </div>

            <div class="reel-bottom-content">
              <span class="reel-urdu-tag">وحید بریانی</span>
              <h3 class="reel-title">The Real Taste of Mughlai Cuisine</h3>
              <div class="reel-meta-row">
                <span>Wahid Biryani • Since 1955</span>
                <span class="reel-watch-cta">Watch <i class="fa-solid fa-chevron-right ms-1" style="font-size: 0.65rem;"></i></span>
              </div>
            </div>

            <div class="reel-progress-bar"></div>
          </div>
        </div>

        <!-- Reel 2 -->
        <div class="reel-card-item reveal-scale" style="transition-delay: 0.15s;">
          <div class="reel-card" data-reel-id="reel-2">
            <div class="reel-thumbnail-wrap">
              <img loading="lazy" src="assets/video/poster/insta2.png" alt="Har Mehfil Ki Shaan" class="reel-poster">
              <video class="reel-video" muted playsinline loop preload="metadata" poster="assets/img/chicken_biryani.jpeg">
                <source src="assets/video/insta2.mp4" type="video/mp4">
              </video>
            </div>
            <div class="reel-overlay"></div>

            <div class="reel-top-bar">
              <span class="reel-badge-pill">
                <i class="fa-brands fa-instagram text-accent"></i> Reel
              </span>
            </div>

            <!-- Sound Toggle Pill -->
            <button type="button" class="reel-sound-btn" aria-label="Toggle Sound" title="Sound Mute/Unmute">
              <i class="fa-solid fa-volume-xmark"></i>
            </button>

            <div class="reel-center-action">
              <button type="button" class="reel-play-btn" aria-label="Play Reel Video">
                <i class="fa-solid fa-play"></i>
              </button>
            </div>

            <div class="reel-bottom-content">
              <span class="reel-urdu-tag">ہر محفل کی شان</span>
              <h3 class="reel-title">Har Mehfil Ki Shaan</h3>
              <div class="reel-meta-row">
                <span>Wahid Biryani • Lucknow</span>
                <span class="reel-watch-cta">Watch <i class="fa-solid fa-chevron-right ms-1" style="font-size: 0.65rem;"></i></span>
              </div>
            </div>

            <div class="reel-progress-bar"></div>
          </div>
        </div>

        <!-- Reel 3 -->
        <div class="reel-card-item reveal-scale" style="transition-delay: 0.3s;">
          <div class="reel-card" data-reel-id="reel-3">
            <div class="reel-thumbnail-wrap">
              <img loading="lazy" src="assets/video/poster/insta3.png" alt="Pride of Lucknow Since 1955" class="reel-poster">
              <video class="reel-video" muted playsinline loop preload="metadata" poster="assets/img/chicken_biryani.jpeg">
                <source src="assets/video/insta3.mp4" type="video/mp4">
              </video>
            </div>
            <div class="reel-overlay"></div>

            <div class="reel-top-bar">
              <span class="reel-badge-pill">
                <i class="fa-brands fa-instagram text-accent"></i> Reel
              </span>
            </div>

            <!-- Sound Toggle Pill -->
            <button type="button" class="reel-sound-btn" aria-label="Toggle Sound" title="Sound Mute/Unmute">
              <i class="fa-solid fa-volume-xmark"></i>
            </button>

            <div class="reel-center-action">
              <button type="button" class="reel-play-btn" aria-label="Play Reel Video">
                <i class="fa-solid fa-play"></i>
              </button>
            </div>

            <div class="reel-bottom-content">
              <span class="reel-urdu-tag">لکھنؤ کا فخر</span>
              <h3 class="reel-title">Pride of Lucknow Since 1955</h3>
              <div class="reel-meta-row">
                <span>Wahid Biryani • Since 1955</span>
                <span class="reel-watch-cta">Watch <i class="fa-solid fa-chevron-right ms-1" style="font-size: 0.65rem;"></i></span>
              </div>
            </div>

            <div class="reel-progress-bar"></div>
          </div>
        </div>

        <!-- Reel 4 -->
        <div class="reel-card-item reveal-scale" style="transition-delay: 0.45s;">
          <div class="reel-card" data-reel-id="reel-4">
            <div class="reel-thumbnail-wrap">
              <img loading="lazy" src="assets/video/poster/insta4.png" alt="4th Generation of Legacy" class="reel-poster">
              <video class="reel-video" muted playsinline loop preload="metadata" poster="assets/img/chicken_biryani.jpeg">
                <source src="assets/video/insta4.mp4" type="video/mp4">
              </video>
            </div>
            <div class="reel-overlay"></div>

            <div class="reel-top-bar">
              <span class="reel-badge-pill">
                <i class="fa-brands fa-instagram text-accent"></i> Reel
              </span>
            </div>

            <!-- Sound Toggle Pill -->
            <button type="button" class="reel-sound-btn" aria-label="Toggle Sound" title="Sound Mute/Unmute">
              <i class="fa-solid fa-volume-xmark"></i>
            </button>

            <div class="reel-center-action">
              <button type="button" class="reel-play-btn" aria-label="Play Reel Video">
                <i class="fa-solid fa-play"></i>
              </button>
            </div>

            <div class="reel-bottom-content">
              <span class="reel-urdu-tag">چوتھی نسل کی وراثت</span>
              <h3 class="reel-title">4th Generation of Legacy</h3>
              <div class="reel-meta-row">
                <span>Quraishi Family • Since 1902</span>
                <span class="reel-watch-cta">Watch <i class="fa-solid fa-chevron-right ms-1" style="font-size: 0.65rem;"></i></span>
              </div>
            </div>

            <div class="reel-progress-bar"></div>
          </div>
        </div>

        <!-- Reel 5 -->
        <div class="reel-card-item reveal-scale">
          <div class="reel-card" data-reel-id="reel-5">
            <div class="reel-thumbnail-wrap">
              <img loading="lazy" src="assets/video/poster/insta5.png" alt="Review of Saudi Customer" class="reel-poster">
              <video class="reel-video" muted playsinline loop preload="metadata" poster="assets/img/chicken_biryani.jpeg">
                <source src="assets/video/insta5.mp4" type="video/mp4">
              </video>
            </div>
            <div class="reel-overlay"></div>

            <div class="reel-top-bar">
              <span class="reel-badge-pill">
                <i class="fa-brands fa-instagram text-accent"></i> Reel
              </span>
            </div>

            <!-- Sound Toggle Pill -->
            <button type="button" class="reel-sound-btn" aria-label="Toggle Sound" title="Sound Mute/Unmute">
              <i class="fa-solid fa-volume-xmark"></i>
            </button>

            <div class="reel-center-action">
              <button type="button" class="reel-play-btn" aria-label="Play Reel Video">
                <i class="fa-solid fa-play"></i>
              </button>
            </div>

            <div class="reel-bottom-content">
              <span class="reel-urdu-tag">وحید بریانی</span>
              <h3 class="reel-title">Review of Saudi Customer</h3>
              <div class="reel-meta-row">
                <span>Wahid Biryani • Customer Review</span>
                <span class="reel-watch-cta">Watch <i class="fa-solid fa-chevron-right ms-1" style="font-size: 0.65rem;"></i></span>
              </div>
            </div>

            <div class="reel-progress-bar"></div>
          </div>
        </div>

        <!-- Reel 6 -->
        <div class="reel-card-item reveal-scale" style="transition-delay: 0.15s;">
          <div class="reel-card" data-reel-id="reel-6">
            <div class="reel-thumbnail-wrap">
              <img loading="lazy" src="assets/video/poster/insta6.png" alt="Wahid Biryani Outlet" class="reel-poster">
              <video class="reel-video" muted playsinline loop preload="metadata" poster="assets/img/chicken_biryani.jpeg">
                <source src="assets/video/insta6.mp4" type="video/mp4">
              </video>
            </div>
            <div class="reel-overlay"></div>

            <div class="reel-top-bar">
              <span class="reel-badge-pill">
                <i class="fa-brands fa-instagram text-accent"></i> Reel
              </span>
            </div>

            <!-- Sound Toggle Pill -->
            <button type="button" class="reel-sound-btn" aria-label="Toggle Sound" title="Sound Mute/Unmute">
              <i class="fa-solid fa-volume-xmark"></i>
            </button>

            <div class="reel-center-action">
              <button type="button" class="reel-play-btn" aria-label="Play Reel Video">
                <i class="fa-solid fa-play"></i>
              </button>
            </div>

            <div class="reel-bottom-content">
              <span class="reel-urdu-tag">وحید بریانی</span>
              <h3 class="reel-title">Wahid Biryani Outlet</h3>
              <div class="reel-meta-row">
                <span>Wahid Biryani • Lucknow</span>
                <span class="reel-watch-cta">Watch <i class="fa-solid fa-chevron-right ms-1" style="font-size: 0.65rem;"></i></span>
              </div>
            </div>

            <div class="reel-progress-bar"></div>
          </div>
        </div>

        <!-- Reel 7 -->
        <div class="reel-card-item reveal-scale" style="transition-delay: 0.3s;">
          <div class="reel-card" data-reel-id="reel-7">
            <div class="reel-thumbnail-wrap">
              <img loading="lazy" src="assets/video/poster/insta7.png" alt="Wahid Biryani at Night" class="reel-poster">
              <video class="reel-video" muted playsinline loop preload="metadata" poster="assets/img/chicken_biryani.jpeg">
                <source src="assets/video/insta7.mp4" type="video/mp4">
              </video>
            </div>
            <div class="reel-overlay"></div>

            <div class="reel-top-bar">
              <span class="reel-badge-pill">
                <i class="fa-brands fa-instagram text-accent"></i> Reel
              </span>
            </div>

            <!-- Sound Toggle Pill -->
            <button type="button" class="reel-sound-btn" aria-label="Toggle Sound" title="Sound Mute/Unmute">
              <i class="fa-solid fa-volume-xmark"></i>
            </button>

            <div class="reel-center-action">
              <button type="button" class="reel-play-btn" aria-label="Play Reel Video">
                <i class="fa-solid fa-play"></i>
              </button>
            </div>

            <div class="reel-bottom-content">
              <span class="reel-urdu-tag">وحید بریانی</span>
              <h3 class="reel-title">Wahid Biryani at Night</h3>
              <div class="reel-meta-row">
                <span>Wahid Biryani • Lucknow</span>
                <span class="reel-watch-cta">Watch <i class="fa-solid fa-chevron-right ms-1" style="font-size: 0.65rem;"></i></span>
              </div>
            </div>

            <div class="reel-progress-bar"></div>
          </div>
        </div>

        <!-- Reel 8 -->
        <div class="reel-card-item reveal-scale" style="transition-delay: 0.45s;">
          <div class="reel-card" data-reel-id="reel-8">
            <div class="reel-thumbnail-wrap">
              <img loading="lazy" src="assets/video/poster/insta8.png" alt="Happy Customer with Wahid Biryani" class="reel-poster">
              <video class="reel-video" muted playsinline loop preload="metadata" poster="assets/img/chicken_biryani.jpeg">
                <source src="assets/video/insta8.mp4" type="video/mp4">
              </video>
            </div>
            <div class="reel-overlay"></div>

            <div class="reel-top-bar">
              <span class="reel-badge-pill">
                <i class="fa-brands fa-instagram text-accent"></i> Reel
              </span>
            </div>

            <!-- Sound Toggle Pill -->
            <button type="button" class="reel-sound-btn" aria-label="Toggle Sound" title="Sound Mute/Unmute">
              <i class="fa-solid fa-volume-xmark"></i>
            </button>

            <div class="reel-center-action">
              <button type="button" class="reel-play-btn" aria-label="Play Reel Video">
                <i class="fa-solid fa-play"></i>
              </button>
            </div>

            <div class="reel-bottom-content">
              <span class="reel-urdu-tag">وحید بریانی</span>
              <h3 class="reel-title">Happy Customer with Wahid Biryani</h3>
              <div class="reel-meta-row">
                <span>Wahid Biryani • Since 1955</span>
                <span class="reel-watch-cta">Watch <i class="fa-solid fa-chevron-right ms-1" style="font-size: 0.65rem;"></i></span>
              </div>
            </div>

            <div class="reel-progress-bar"></div>
          </div>
        </div>

      </div>
    </div>
  </section>
  
@endsection

