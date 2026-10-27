@extends('layouts.app')

@section('body_class', 'heritage-page page-director-message')

@section('content')

    <!-- Page Header (Exact breadcrum.text Structure) -->
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
                            <li><a href="{{ route('our-story') }}">Our Legacy</a></li>
                            <li class="separator">✦</li>
                            <li class="active text-primary" style="color: var(--color-primary) !important;">Director's
                                Message</li>
                        </ul>
                    </div>
                </nav>

                <span class="urdu-accent reveal-up text-accent">پیغامِ سرپرست</span>
                <h1 class="section-title split-words text-primary" style="font-size: clamp(2.5rem, 4vw, 3.75rem);">
                    Director's
                    Message</h1>
                <p class="section-desc reveal-up mx-auto text-dark" style="max-width: 600px; opacity: 0.85;">A personal
                    reflection from the custodians of Wahid Biryani on preserving 70 years of Awadhi culinary craftsmanship
                    and
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

    <!-- Section 1: The Director's Address (Royal Parchment & Portrait Feature) -->
    <section class="section-padding bg-cream position-relative overflow-hidden" id="director-address">
        <div class="container position-relative" style="z-index: 2;">
            <div class="row g-5 align-items-start">

                <!-- Left Column: Director Portrait & Quote -->
                <div class="col-lg-5 reveal-left">
                    <div class="director-portrait-wrapper text-center mb-4">
                        <img src="assets/img/author_demo.png" alt="Director Abid Ali Quraishi" class="img-fluid mb-3">
                        <div class="d-flex justify-content-center">
                            <span class="director-badge">
                                <i class="fa-solid fa-crown text-accent"></i> Director & Master Custodian
                            </span>
                        </div>
                    </div>

                    <!-- Quote Callout Card -->
                    <div class="director-quote-box reveal-up">
                        <p class="director-quote-text">
                            "Wahid Biryani is not just a kitchen for us. It is a legacy of Lucknow that our family has
                            carried
                            forward with sincerity, one generation after another."
                        </p>
                        <div
                            class="d-flex align-items-center justify-content-between mt-3 pt-2 border-top border-accent-subtle">
                            <span class="font-body text-uppercase letter-spacing-1 text-accent fw-600"
                                style="font-size: 0.8rem;">
                                — Abid Ali Quraishi, Director
                            </span>
                            <span class="urdu-accent" style="font-size: 1.2rem; color: var(--color-primary);">سرپرستِ
                                اعلیٰ</span>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Official Message -->
                <div class="col-lg-7 reveal-right">
                    <div class="director-main-card">
                        <span class="urdu-accent d-block mb-2 text-accent" style="font-size: 1.8rem;">روایت کا پاسبان •
                            ذائقہ جو
                            نسلاً بعد نسل چلا</span>
                        <h2 class="font-display text-primary mb-4"
                            style="font-size: clamp(2rem, 3.5vw, 2.7rem); line-height: 1.25;">
                            Carrying Forward the Soul of Aminabad Since 1955
                        </h2>

                        <p class="font-body mb-4" style="font-size: 1.05rem; line-height: 1.85; color: var(--color-text);">
                            <span class="dropcap">W</span>ahid Biryani began in 1955 under the late <strong>Haji Wahid Ali
                                Quraishi</strong>, and it grew into the Pride of Lucknow on one simple belief: serve the
                            real taste of
                            Mughlai cuisine with honesty, so that every guest who sits at our table feels the warmth of
                            Lucknow's
                            hospitality.
                        </p>

                        <p class="font-body mb-4" style="font-size: 1.02rem; line-height: 1.85; color: var(--color-text);">
                            The Quraishi family's culinary roots go back to 1902, and today we proudly stand as the fourth
                            generation
                            of this legacy. As the custodian of our recipes and master blender of our signature flavours, I
                            make sure
                            that the taste of our Dum Biryani, Galavati and Boti Kababs, Mughlai curries and breads stays
                            exactly as
                            our elders intended it to be.
                        </p>

                        <p class="font-body mb-4" style="font-size: 1.02rem; line-height: 1.85; color: var(--color-text);">
                            To our patrons and the families who gather at our dastarkhwan, thank you for your unwavering
                            love. With
                            our outlets across Lucknow, and the next generation, the four Quraishi brothers, now standing
                            beside us,
                            our promise stays the same: <em>"Har Mehfil Ki Shaan", with the same quality, the same taste and
                                the same
                                Tehzeeb of Awadh.</em>
                        </p>

                        <!-- Signatures & Authority Block -->
                        <div
                            class="director-signature-block d-flex justify-content-between align-items-end flex-wrap gap-4">
                            <div>
                                <span class="font-display italic text-muted d-block mb-1" style="font-size: 1.1rem;">With
                                    Royal Regards
                                    & Tehzeeb,</span>
                                <h4 class="director-signature-name">Abid Ali Quraishi</h4>
                                <span class="director-signature-title">Director & Master Blender • Wahid Biryani</span>
                            </div>

                            <div class="text-start">
                                <h4 class="director-signature-name" style="font-size: 1.3rem;">The Quraishi Brothers</h4>
                                <span class="director-signature-title">Next Generation • M. Aqib, M. Saqib, M. Arbaaz & M.
                                    Saad</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Section 2: 4 Sacred Pledges -->
    <section class="section-padding bg-ivory position-relative overflow-hidden py-5" id="director-pledges">
        <div class="sig-jaali-overlay" style="opacity: 0.05;"></div>
        <div class="container position-relative py-4" style="z-index: 2;">
            <div class="section-title-wrapper text-center">
                <span class="urdu-accent">ہماری ضمانت</span>
                <h2 class="section-title">Our Sacred Pledges</h2>
                <p class="section-desc">The core commitments that every Wahid kitchen honors with every single handi.</p>
            </div>

            <div class="row g-2 justify-content-center mt-2">
                <!-- Pledge 1 -->
                <div class="col-lg-3 col-md-6 reveal-up">
                    <div class="pledge-card">
                        <div class="pledge-icon-wrapper">
                            <i class="fa-solid fa-fire-burner"></i>
                        </div>
                        <h3 class="pledge-title">100% Dum-Pukht Sealing</h3>
                        <p class="pledge-desc">
                            Every handi is tightly sealed with dough to capture all the essential spice oils. We never use
                            pressure
                            cookers or speed-up shortcuts.
                        </p>
                    </div>
                </div>

                <!-- Pledge 2 -->
                <div class="col-lg-3 col-md-6 reveal-up" style="transition-delay: 0.15s;">
                    <div class="pledge-card">
                        <div class="pledge-icon-wrapper">
                            <i class="fa-solid fa-mortar-pestle"></i>
                        </div>
                        <h3 class="pledge-title">32 Hand-Ground Spices</h3>
                        <p class="pledge-desc">
                            Our secret potli of raw whole spices is blended exclusively by family elders to guarantee the
                            same
                            unforgettable 1955 Aminabad aroma.
                        </p>
                    </div>
                </div>

                <!-- Pledge 3 -->
                <div class="col-lg-3 col-md-6 reveal-up" style="transition-delay: 0.3s;">
                    <div class="pledge-card">
                        <div class="pledge-icon-wrapper">
                            <i class="fa-solid fa-hand-holding-heart"></i>
                        </div>
                        <h3 class="pledge-title">Authentic Awadhi Tehzeeb</h3>
                        <p class="pledge-desc">
                            Hospitality is an art in Lucknow. Every guest at our table is treated with the gentle courtesy
                            and respect
                            of the royal Nawabi era.
                        </p>
                    </div>
                </div>

                <!-- Pledge 4 -->
                <div class="col-lg-3 col-md-6 reveal-up" style="transition-delay: 0.45s;">
                    <div class="pledge-card">
                        <div class="pledge-icon-wrapper">
                            <i class="fa-solid fa-award"></i>
                        </div>
                        <h3 class="pledge-title">Uncompromising Purity</h3>
                        <p class="pledge-desc">
                            From aged long-grain basmati to 100% pure desi ghee and fresh cuts, we never compromise with
                            artificial
                            colors, essences, or preservatives.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Generations of Trust Milestones (Heritage Green Bar) -->
    <section class="section-padding bg-heritage-green position-relative overflow-hidden py-5"
        style="background-color: var(--color-primary);">
        <div class="sig-jaali-overlay" style="opacity: 0.06;"></div>
        <div class="container position-relative py-3" style="z-index: 2;">
            <div class="row g-4 justify-content-center">
                <!-- Stat 1 -->
                <div class="col-lg-3 col-6 reveal-scale">
                    <div class="stat-badge-box">
                        <div class="stat-number">1955</div>
                        <div class="stat-label">Founded in Aminabad</div>
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="col-lg-3 col-6 reveal-scale" style="transition-delay: 0.1s;">
                    <div class="stat-badge-box">
                        <div class="stat-number">70+</div>
                        <div class="stat-label">Years of Tradition</div>
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="col-lg-3 col-6 reveal-scale" style="transition-delay: 0.2s;">
                    <div class="stat-badge-box">
                        <div class="stat-number">32</div>
                        <div class="stat-label">Hand-Ground Spices</div>
                    </div>
                </div>

                <!-- Stat 4 -->
                <div class="col-lg-3 col-6 reveal-scale" style="transition-delay: 0.3s;">
                    <div class="stat-badge-box">
                        <div class="stat-number">3</div>
                        <div class="stat-label">Generations of Mastery</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Royal CTA Banner -->
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
                    <a href="{{ route('our-outlets') }}" class="btn btn-gold-outline magnetic-btn">Visit Our Outlets</a>
                </div>
            </div>
        </div>
    </section>

@endsection