@extends('layouts.app')

@section('body_class', 'heritage-page')

@section('content')

  <!-- Page Header -->
  <section class="section-padding text-center heritage-page-header position-relative overflow-hidden bg-ivory"
    style="padding-top: 180px; ;">

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
              <li class="active text-primary" style="color: var(--color-primary) !important;">Our Story</li>
            </ul>
          </div>
        </nav>

        <span class="urdu-accent reveal-up text-accent">ہماری کہانی</span>
        <h1 class="section-title split-words text-primary" style="font-size: clamp(2.5rem, 4vw, 3.75rem);">The Wahid
          Story</h1>
        <p class="section-desc reveal-up mx-auto text-dark" style="max-width: 600px; opacity: 0.85;">How a simple
          charcoal stove in Aminabad evolved into a living culinary institution of Lucknow.</p>

        <div class="hero-ornament reveal-up" style="opacity: 1; transform: none; margin-top: 30px;">
          <svg width="220" height="20" viewBox="0 0 220 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="ornament-line" d="M10 10H100C105 5 110 1 110 1C110 1 115 5 120 10H210" stroke="#C49A45"
              stroke-width="1.5" stroke-linecap="round" />
          </svg>
        </div>
      </div>
    </div>
  </section>

  <!-- Legacy timeline -->
  <section class="timeline-section bg-cream">
    <div class="timeline-line-container">
      <div class="timeline-bg-line"></div>
      <div class="timeline-track"></div>
    </div>

    <div class="container">

      <!-- Milestone 1: 1902 -->
      <div class="timeline-item">
        <div class="timeline-badge"></div>
        <div class="timeline-col">
          <div class="timeline-card">
            <h3 class="timeline-year text-accent">1902</h3>

            <div class="tl-arch">
              <div class="tl-arch-ring"></div>
              <div class="tl-arch-frame">
                <img loading="lazy" src="assets/img/md-quraishi.WEBP" alt="Late Chaudhary Mohammadu Quraishi">
                <div class="tl-arch-overlay"></div>
                <div class="tl-arch-content">
                  <span class="tl-arch-role">Legacy <span class="tl-arch-dot">•</span> <span class="tl-arch-role-urdu">ورثہ</span></span>
                  <h4 class="tl-arch-name">Late Chaudhary Mohammadu Quraishi</h4>
                </div>
              </div>
            </div>

            <h4 class="timeline-card-title">The Roots of Our Culinary Legacy</h4>
            <p class="timeline-card-desc">The Quraishi family's culinary journey begins with Late Chaudhary Mohammadu
              Quraishi, whose kitchen craft became the foundation that every later generation built upon.</p>
          </div>
        </div>
      </div>

      <!-- Milestone 2: 1943 -->
      <div class="timeline-item">
        <div class="timeline-badge"></div>
        <div class="timeline-col">
          <div class="timeline-card">
            <h3 class="timeline-year text-accent">1943</h3>

            <div class="tl-arch">
              <div class="tl-arch-ring"></div>
              <div class="tl-arch-frame">
                <img loading="lazy" src="assets/img/aladeen.jpeg" alt="Late Aladeen Quraishi">
                <div class="tl-arch-overlay"></div>
                <div class="tl-arch-content">
                  <span class="tl-arch-role">Legacy <span class="tl-arch-dot">•</span> <span class="tl-arch-role-urdu">ورثہ</span></span>
                  <h4 class="tl-arch-name">Late Aladeen Quraishi</h4>
                </div>
              </div>
            </div>

            <h4 class="timeline-card-title">Carrying the Legacy Forward</h4>
            <p class="timeline-card-desc">Late Aladeen Quraishi carried the family legacy forward, preserving the
              recipes and kitchen traditions so that the next generation could take them even further.</p>
          </div>
        </div>
      </div>

      <!-- Milestone 3: 1955 -->
      <div class="timeline-item">
        <div class="timeline-badge"></div>
        <div class="timeline-col">
          <div class="timeline-card">
            <h3 class="timeline-year text-accent">1955</h3>

            <div class="tl-arch">
              <div class="tl-arch-ring"></div>
              <div class="tl-arch-frame">
                <img loading="lazy" src="assets/img/haji-wahid.WEBP" alt="Late Haji Wahid Ali Quraishi">
                <div class="tl-arch-overlay"></div>
                <div class="tl-arch-content">
                  <span class="tl-arch-role">Founder <span class="tl-arch-dot">•</span> <span class="tl-arch-role-urdu">بانی</span></span>
                  <h4 class="tl-arch-name">Late Haji Wahid Ali Quraishi</h4>
                </div>
              </div>
            </div>

            <h4 class="timeline-card-title">Wahid Biryani Is Born</h4>
            <p class="timeline-card-desc">In 1955, Late Haji Wahid Ali Quraishi founded Wahid Biryani in Aminabad,
              becoming the pioneer of Aminabad Biryani and giving Lucknow a name it still calls its pride.</p>
          </div>
        </div>
      </div>

      <!-- Milestone 4: 1990 -->
      <div class="timeline-item">
        <div class="timeline-badge"></div>
        <div class="timeline-col">
          <div class="timeline-card">
            <h3 class="timeline-year text-accent">1990</h3>

            <div class="tl-arch">
              <div class="tl-arch-ring"></div>
              <div class="tl-arch-frame">
                <img loading="lazy" src="assets/img/abid-ali.WEBP" alt="Abid Ali Quraishi">
                <div class="tl-arch-overlay"></div>
                <div class="tl-arch-content">
                  <span class="tl-arch-role">Director <span class="tl-arch-dot">•</span> <span class="tl-arch-role-urdu">سرپرست</span></span>
                  <h4 class="tl-arch-name">Abid Ali Quraishi</h4>
                </div>
              </div>
            </div>

            <h4 class="timeline-card-title">Custodian of the Recipes</h4>
            <p class="timeline-card-desc">Abid Ali Quraishi took charge as Director, safeguarding the family recipes
              as the custodian and master blender of the signature spice blends.</p>
          </div>
        </div>
      </div>

      <!-- Milestone 5: 2012 -->
      <div class="timeline-item">
        <div class="timeline-badge"></div>
        <div class="timeline-col">
          <div class="timeline-card">
            <h3 class="timeline-year text-accent">2012</h3>

            <div class="tl-arch">
              <div class="tl-arch-ring"></div>
              <div class="tl-arch-frame tl-arch-group">
                <img loading="lazy" src="assets/img/brother2.png" alt="The Quraishi Brothers">
                <div class="tl-arch-overlay"></div>
                <div class="tl-arch-content">
                  <span class="tl-arch-role">Next Gen <span class="tl-arch-dot">•</span> <span class="tl-arch-role-urdu">نسلِ نو</span></span>
                  <h4 class="tl-arch-name">The Quraishi Brothers</h4>
                  <ul class="tl-arch-names">
                    <li>M. Aqib Quraishi</li>
                    <li>M. Saqib Quraishi</li>
                    <li>M. Arbaaz Quraishi</li>
                    <li>M. Saad Quraishi</li>
                  </ul>
                </div>
              </div>
            </div>

            <h4 class="timeline-card-title">The Next Generation</h4>
            <p class="timeline-card-desc">The four Quraishi brothers carry the flame and the kitchen ethos forward,
              keeping the promise of "Har Mehfil Ki Shaan" alive for a new era.</p>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Lucknow's Famous Monument Section -->
  <section class="lucknow-monument-section position-relative overflow-hidden bg-ivory" style="padding-top: 100px;">

    <!-- Golden Rumi Gate Image Background -->
    <div class="position-absolute w-100 h-100"
      style="top: 0; left: 0; z-index: 1; opacity: 0.12; pointer-events: none; mix-blend-mode: multiply;">
      <img src="assets/img/rumi_gate_golden.png" alt="Rumi Gate Watermark"
        style="width: 100%; height: 100%; object-fit: contain; object-position: center bottom;">
    </div>

    <div class="container position-relative" style="z-index: 2;">
      <!-- Giant Mughal Arch Frame made with CSS -->
      <div class="mughal-monument-arch reveal-up mx-auto text-center"
        style="max-width: 920px; padding: 105px 40px 40px; position: relative; border: 3px solid var(--color-accent); border-bottom: none; border-radius: 460px 460px 0 0; background: linear-gradient(to bottom, rgba(196,154,69,0.05) 0%, rgba(255,255,255,0) 100%);">

        <!-- Inner Dashed Arch -->
        <div
          style="position: absolute; top: 15px; left: 15px; right: 15px; bottom: 0; border: 1px dashed var(--color-accent); border-bottom: none; border-radius: 445px 445px 0 0; opacity: 0.6;">
        </div>

        <!-- Arch Keystone Ornament -->
        <div
          style="position: absolute; top: -15px; left: 50%; transform: translateX(-50%); background: var(--color-bg-light); padding: 0 20px;">
          <svg width="40" height="30" viewBox="0 0 40 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 0C25 15 35 25 40 30H0C5 25 15 15 20 0Z" fill="#C49A45" />
          </svg>
        </div>

        <span class="urdu-accent mb-2 d-block reveal-up"
          style="color: var(--color-primary); font-size: 2.2rem; text-shadow: 0 2px 4px rgba(0,0,0,0.05);">لکھنؤ کی
          پہچان</span>
        <h2 class="section-title text-primary mb-4 reveal-up mx-auto"
          style="font-size: clamp(1.8rem, 2.7vw, 2.75rem); text-transform: uppercase; letter-spacing: 1.5px; max-width: 80%; line-height: 1.2;">
          The Pride of Lucknow
        </h2>

        <div class="mx-auto reveal-up" style="max-width: 650px; position: relative; z-index: 5;">
          <p class="mb-4 font-body" style="font-size: 1.25rem; line-height: 1.8; color: var(--color-text);">
            Just as the magnificent <strong>Rumi Darwaza</strong> and the grand <strong>Bada Imambara</strong> stand as
            the architectural soul of this city, Wahid Biryani has stood as its culinary monument since 1955.
          </p>
          <p class="mb-4 font-body"
            style="font-size: 1.15rem; line-height: 1.8; color: var(--color-text); opacity: 0.9;">
            For over seven decades, our handis in Aminabad have mirrored the grandeur of Nawabi structures—steeped in
            history, crafted with immense patience, and carrying the true, famous essence of Awadh. To taste our biryani
            is to walk the royal, spice-scented corridors of ancient Lucknow.
          </p>

          <div class="d-flex justify-content-center align-items-center gap-3 mt-5">
            <span style="width: 60px; height: 1px; background: var(--color-accent);"></span>
            <span class="font-display italic text-primary" style="font-size: 1.3rem;">A Famous City, A Famous
              Flavor</span>
            <span style="width: 60px; height: 1px; background: var(--color-accent);"></span>
          </div>
        </div>
      </div>
    </div>
  </section>
 
@endsection