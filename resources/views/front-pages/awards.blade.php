@extends('layouts.app')

@section('body_class', 'heritage-page page-awards')

@section('content')

  <!-- Page Header (Exact breadcrum.text Structure) -->
  <section class="section-padding text-center heritage-page-header position-relative overflow-hidden bg-ivory"
    style="padding-top: 180px; ">

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
              <li><a href="{{ route('our-story') }}">Our Legacy</a></li>
              <li class="separator">✦</li>
              <li class="active text-primary" style="color: var(--color-primary) !important;">Awards & Recognitions</li>
            </ul>
          </div>
        </nav>

        <span class="urdu-accent reveal-up text-accent">اعزاز و اعتراف</span>
        <h1 class="section-title split-words text-primary" style="font-size: clamp(2.5rem, 4vw, 3.75rem);">Awards &
          Recognitions</h1>
        <p class="section-desc reveal-up mx-auto text-dark" style="max-width: 600px; opacity: 0.85;">Celebrating seventy
          years of culinary excellence, prestigious accolades, and the enduring love of our patrons.</p>

        <div class="hero-ornament reveal-up" style="opacity: 1; transform: none; margin-top: 30px;">
          <svg width="220" height="20" viewBox="0 0 220 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="ornament-line" d="M10 10H100C105 5 110 1 110 1C110 1 115 5 120 10H210" stroke="#C49A45"
              stroke-width="1.5" stroke-linecap="round" />
          </svg>
        </div>
      </div>
    </div>
  </section>

  <!-- Awards Section (Expanded Royal Grid) -->
  <section class="section-padding position-relative overflow-hidden" id="awards-list"
    style="background-color: var(--color-bg-main); z-index: 1;">
    <!-- Creative Background Image -->
    <div
      style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('assets/img/rumi_gate_golden.png') center/cover no-repeat fixed; opacity: 0.10; z-index: -1; mix-blend-mode: multiply;">
    </div>

    <div class="container position-relative" style="z-index: 2;">
      <div class="section-title-wrapper text-center">
        <span class="urdu-accent">اعزاز و وقار</span>
        <h2 class="section-title">Decades of Accolades & Tributes</h2>
        <p class="section-desc">Honoring our relentless commitment to the authenticity of Lucknow's Dastarkhwan.</p>
      </div>

      <!-- Award Photos Row (3 images, text over image) -->
      <div class="row g-4 justify-content-center mt-3 mb-4">

        <!-- Photo 1 -->
        <div class="col-lg-4 col-md-4 col-12 reveal-scale">
          <div class="award-photo">
            <img loading="lazy" src="assets/img/gallery6.jpeg" alt="Receiving a memento on stage">
            <div class="award-photo-overlay">
              <span class="award-photo-tag">Recognition</span>
              <h3 class="award-photo-title">A Proud Moment on Stage</h3>
            </div>
          </div>
        </div>

        <!-- Photo 2 -->
        <div class="col-lg-4 col-md-4 col-12 reveal-scale" style="transition-delay: 0.15s;">
          <div class="award-photo">
            <img loading="lazy" src="assets/img/gallery5.jpeg" alt="Wahid Biryani receiving an award at an event">
            <div class="award-photo-overlay">
              <span class="award-photo-tag">Recognition</span>
              <h3 class="award-photo-title">Honoured at the Awards</h3>
            </div>
          </div>
        </div>

        <!-- Photo 3 -->
        <div class="col-lg-4 col-md-4 col-12 reveal-scale" style="transition-delay: 0.3s;">
          <div class="award-photo">
            <img loading="lazy" src="assets/img/gallery4.jpeg" alt="Guest welcomed with a bouquet at the outlet">
            <div class="award-photo-overlay">
              <span class="award-photo-tag">Hospitality</span>
              <h3 class="award-photo-title">A Warm Welcome for Our Guests</h3>
            </div>
          </div>
        </div>

      </div>

      <div class="row g-4 justify-content-center">
        <!-- Award 1 -->
        <div class="col-lg-4 col-md-6 reveal-scale">
          <div class="award-card h-100">
            <div class="award-icon-wrapper">
              <i class="fa-solid fa-award"></i>
            </div>
            <h4 class="award-title">Culinary Legacy Award</h4>
            <p class="award-desc">Awarded by the Times Food Guide for preserving the authentic Dum-Pukht culinary
              traditions of Awadh since 1955.</p>
          </div>
        </div>

        <!-- Award 2 -->
        <div class="col-lg-4 col-md-6 reveal-scale" style="transition-delay: 0.15s;">
          <div class="award-card h-100">
            <div class="award-icon-wrapper">
              <i class="fa-solid fa-medal"></i>
            </div>
            <h4 class="award-title">Best Biryani of Lucknow</h4>
            <p class="award-desc">Recognized multiple times as the premier destination for traditional Lucknowi biryani
              by food critics and travelers.</p>
          </div>
        </div>

        <!-- Award 3 -->
        <div class="col-lg-4 col-md-6 reveal-scale" style="transition-delay: 0.3s;">
          <div class="award-card h-100">
            <div class="award-icon-wrapper">
              <i class="fa-solid fa-crown"></i>
            </div>
            <h4 class="award-title">Heritage Food Institution</h4>
            <p class="award-desc">Honored by regional tourism councils for contributing to the cultural and culinary
              identity of historical Lucknow.</p>
          </div>
        </div>

        <!-- Award 4 -->
        <div class="col-lg-4 col-md-6 reveal-scale">
          <div class="award-card h-100">
            <div class="award-icon-wrapper">
              <i class="fa-solid fa-certificate"></i>
            </div>
            <h4 class="award-title">Master of Dum-Pukht</h4>
            <p class="award-desc">Conferred by the Awadhi Culinary Guild for upholding dough-sealed copper handi
              techniques without synthetic flavors.</p>
          </div>
        </div>

        <!-- Award 5 -->
        <div class="col-lg-4 col-md-6 reveal-scale" style="transition-delay: 0.15s;">
          <div class="award-card h-100">
            <div class="award-icon-wrapper">
              <i class="fa-solid fa-star"></i>
            </div>
            <h4 class="award-title">70 Years of Riwayat</h4>
            <p class="award-desc">A special jubilee distinction bestowed by the Lucknow Heritage Foundation for three
              generations of service.</p>
          </div>
        </div>

        <!-- Award 6 -->
        <div class="col-lg-4 col-md-6 reveal-scale" style="transition-delay: 0.3s;">
          <div class="award-card h-100">
            <div class="award-icon-wrapper">
              <i class="fa-solid fa-trophy"></i>
            </div>
            <h4 class="award-title">Best Galavati Kabab</h4>
            <p class="award-desc">Celebrated across culinary reviews for our ultra-soft 155-spice melt-in-mouth Galavati
              kababs and Ulta Tawa parathas.</p>
          </div>
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
        <h2 class="section-title reveal-up mb-3">Taste the Tradition</h2>
        <p class="section-desc reveal-up mb-4">
          Experience the award-winning culinary legacy that has defined Awadhi cuisine for over seven decades.
        </p>

        <div class="d-flex gap-3 justify-content-center flex-wrap reveal-up pt-2">
          <a href="{{ route('menu') }}" class="btn btn-burgundy-fill magnetic-btn">View Menu</a>
          <a href="{{ route('our-outlets') }}" class="btn btn-gold-outline magnetic-btn">Visit Our Outlets</a>
        </div>
      </div>
    </div>
  </section>

@endsection