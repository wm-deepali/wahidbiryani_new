@extends('layouts.app')

@section('content')



  <!-- Mobile Offcanvas Menu (Collapsible Dropdowns) -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNav" aria-labelledby="offcanvasNavLabel">
    <div class="offcanvas-header">
      <a href="index.html" class="logo-link p-1 bg-white rounded">
        <img src="assets/img/logo.png" alt="Wahid Biryani" style="max-height: 44px;">
      </a>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="offcanvas-nav">
        <li class="mb-3">
          <a href="index.html" class="offcanvas-link">Home</a>
        </li>

        <!-- Mobile Collapse: Our Legacy -->
        <li class="mb-3">
          <a href="#mobileLegacyCollapse" class="offcanvas-link" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="mobileLegacyCollapse">Our Legacy <i
              class="fa-solid fa-chevron-down fs-6 ms-1"></i></a>
          <div class="collapse ps-3 mt-2" id="mobileLegacyCollapse">
            <a href="our-story.html" class="offcanvas-sublink" data-bs-dismiss="offcanvas">Our Story</a>
            <a href="wahid-legacy.html" class="offcanvas-sublink" data-bs-dismiss="offcanvas">The Wahid Biryani Legacy</a>
            <a href="director-message.html" class="offcanvas-sublink" data-bs-dismiss="offcanvas">Director's Message</a>
            <a href="awards.html" class="offcanvas-sublink" data-bs-dismiss="offcanvas">Awards & Recognitions</a>
          </div>
        </li>

        <!-- Mobile Collapse: Signature Dishes -->
        <li class="mb-3">
          <a href="signature-dishes.html" class="offcanvas-link">Signature Dishes </a>
        </li>

        <!-- Direct Link: Menu -->
        <li class="mb-3">
          <a href="menu.html" class="offcanvas-link">Menu</a>
        </li>

        <!-- Direct Link: Our Outlets -->
        <li class="mb-3">
          <a href="our-outlets.html" class="offcanvas-link">Our Outlets</a>
        </li>

        <!-- Mobile Collapse: Gallery -->
        <li class="mb-3">
          <a href="#mobileGalleryCollapse" class="offcanvas-link" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="mobileGalleryCollapse">Gallery <i
              class="fa-solid fa-chevron-down fs-6 ms-1"></i></a>
          <div class="collapse ps-3 mt-2" id="mobileGalleryCollapse">
            <a href="image-gallery.html" class="offcanvas-sublink" data-bs-dismiss="offcanvas">Image Gallery</a>
            <a href="video-gallery.html" class="offcanvas-sublink" data-bs-dismiss="offcanvas">Video's</a>
          </div>
        </li>

        <!-- Mobile Collapse: Contact Us -->
        <li class="mb-3">
          <a href="#mobileContactCollapse" class="offcanvas-link" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="mobileContactCollapse">Contact Us <i
              class="fa-solid fa-chevron-down fs-6 ms-1"></i></a>
          <div class="collapse ps-3 mt-2" id="mobileContactCollapse">
            <a href="contact.html" class="offcanvas-sublink" data-bs-dismiss="offcanvas">Contact Us</a>
            <a href="feedback.html" class="offcanvas-sublink" data-bs-dismiss="offcanvas">Feedback & Suggestions</a>
            <a href="franchise.html" class="offcanvas-sublink" data-bs-dismiss="offcanvas">Franchise Enquiry</a>
          </div>
        </li>
      </ul>

      <div class="offcanvas-footer">
        <a href="javascript:void(0)" class="btn btn-burgundy-fill w-100 d-block text-center py-3" data-bs-toggle="modal" data-bs-target="#orderOnlineModal" data-bs-dismiss="offcanvas">Order Online</a>
      </div>
    </div>
  </div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNav" aria-labelledby="offcanvasNavLabel">
    <div class="offcanvas-header">
      <a href="index.html" class="logo-link p-1 bg-white rounded">
        <img src="assets/img/logo.png" alt="Wahid Biryani" style="max-height: 44px;">
      </a>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="offcanvas-nav">
        <li class="mb-3">
          <a href="index.html" class="offcanvas-link ">Home</a>
        </li>

        <!-- Mobile Collapse: Our Legacy -->
        <li class="mb-3">
          <a href="#mobileLegacyCollapse" class="offcanvas-link " data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="mobileLegacyCollapse">Our Legacy <i
              class="fa-solid fa-chevron-down fs-6 ms-1"></i></a>
          <div class="collapse  ps-3 mt-2" id="mobileLegacyCollapse">
            <a href="our-story.html" class="offcanvas-sublink " >Our Story</a>
            <a href="wahid-legacy.html" class="offcanvas-sublink " >The Wahid Biryani Legacy</a>
            <a href="director-message.html" class="offcanvas-sublink " >Director's Message</a>
            <a href="awards.html" class="offcanvas-sublink " >Awards & Recognitions</a>
          </div>
        </li>

        <!-- Mobile Collapse: Signature Dishes -->
        <li class="mb-3">
        <a href="signature-dishes.html" class="offcanvas-link">Signature Dishes </a>
        </li>

        <!-- Direct Link: Menu -->
        <li class="mb-3">
          <a href="menu.html" class="offcanvas-link ">Menu</a>
        </li>

        <!-- Direct Link: Our Outlets -->
        <li class="mb-3">
          <a href="our-outlets.html" class="offcanvas-link ">Our Outlets</a>
        </li>

        <!-- Mobile Collapse: Gallery -->
        <li class="mb-3">
          <a href="#mobileGalleryCollapse" class="offcanvas-link active" data-bs-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="mobileGalleryCollapse">Gallery <i
              class="fa-solid fa-chevron-down fs-6 ms-1"></i></a>
          <div class="collapse show ps-3 mt-2" id="mobileGalleryCollapse">
            <a href="image-gallery.html" class="offcanvas-sublink active text-accent" >Image Gallery</a>
            <a href="video-gallery.html" class="offcanvas-sublink " >Video's</a>
          </div>
        </li>

        <!-- Mobile Collapse: Contact Us -->
        <li class="mb-3">
          <a href="#mobileContactCollapse" class="offcanvas-link " data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="mobileContactCollapse">Contact Us <i
              class="fa-solid fa-chevron-down fs-6 ms-1"></i></a>
          <div class="collapse  ps-3 mt-2" id="mobileContactCollapse">
            <a href="contact.html" class="offcanvas-sublink " >Contact Us</a>
            <a href="feedback.html" class="offcanvas-sublink " >Feedback & Suggestions</a>
            <a href="franchise.html" class="offcanvas-sublink " >Franchise Enquiry</a>
          </div>
        </li>
      </ul>

      <div class="offcanvas-footer">
        <a href="javascript:void(0)" class="btn btn-burgundy-fill w-100 d-block text-center py-3" data-bs-toggle="modal" data-bs-target="#orderOnlineModal" data-bs-dismiss="offcanvas">Order Online</a>
      </div>
    </div>
  </div>

  <!-- Hero Section (Mughal Era, Legacy Feel) -->
  <section class="hero-section">
    <div class="hero-bg-container">
      <div class="hero-bg" style="background-image: url('assets/img/lucknowi_dastarkhwan.png');"></div>
    </div>
    <div class="hero-overlay"></div>

    <div class="hero-content">
      <span class="urdu-accent hero-urdu">خوش آمدید</span>
      <p class="font-body text-uppercase letter-spacing-2 text-accent fw-600 mb-2 hero-subtitle"
        style="font-size: 0.9rem;">A Legacy of Taste Since 1955</p>
      <h1 class="hero-heading split-words">Awadhi & Mughlai Culinary Tradition</h1>
      <p class="hero-desc">A Taste That Belongs to Lucknow. Serving generations with the same authentic aroma, secret
        recipes, and royal hospitality.</p>

      <div class="hero-ctas">
        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#orderOnlineModal" class="btn btn-peach-fill magnetic-btn">Order Food Online</a>
        <a href="about-us.html" class="btn btn-gold-outline magnetic-btn">Explore Our Legacy</a>
      </div>

      <!-- Gold delicate ornament line drawing -->
      <div class="hero-ornament">
        <svg width="220" height="30" viewBox="0 0 220 30" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path class="ornament-line" d="M10 15H100C105 10 110 5 110 5C110 5 115 10 120 15H210" stroke="#C49A45"
            stroke-width="1.2" stroke-linecap="round" />
          <path class="ornament-line" d="M100 15C102.5 19.5 106.5 24 110 24C113.5 24 117.5 19.5 120 15" stroke="#C49A45"
            stroke-width="1" stroke-linecap="round" />
        </svg>
      </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
      <span>Dastarkhwan</span>
      <i class="fa-solid fa-chevron-down"></i>
    </div>
  </section>


  <!-- Our Legacy ki ek Jhalak (Lineage, Director's Message) -->
<section class="section-padding bg-cream" id="legacy-teaser">
  <div class="container">
    <div class="section-title-wrapper">
      <span class="urdu-accent">روایتی ورثہ</span>
      <h2 class="section-title">A Living Tradition</h2>
      <p class="section-desc">Four generations of Lucknowi dum-pukht tradition, served with the same promise.</p>
    </div>

    <div class="row align-items-center justify-content-between g-5">
      <!-- Text details -->
      <div class="col-lg-6 reveal-left">
        <h3 class="font-display text-primary mb-3" style="font-size: 1.85rem;">The Wahid Biryani Legacy</h3>
        <p class="font-body text-muted mb-4" style="font-size: 0.95rem; line-height: 1.7;">
          Our journey began in 1955 in the lanes of Aminabad, where hand-crafted spice secrets redefined the royal
          flavors of Lucknow. Those recipes and the slow-dum copper kalai techniques have been carefully guarded and
          passed down from one generation to the next.
        </p>
        <p class="font-body text-muted mb-4" style="font-size: 0.95rem; line-height: 1.7;">
          Today, the fourth generation carries this legacy forward across our outlets, with the same passion,
          authenticity, and respect for our seventy-year culinary riwayat.
        </p>

        <div class="legacy-quote my-4">
          <p class="quote-text font-display italic text-primary fs-5 mb-2">
            "We do not cut corners. The spices are ground by hand, the meat is double-marinated, and every handi is
            sealed with dough. It is our promise to Lucknow."
          </p>
          <span class="quote-author font-body text-uppercase letter-spacing-1 text-accent fw-600"
            style="font-size: 0.75rem;">— The Wahid Biryani Family</span>
        </div>

        <a href="about-us.html" class="btn btn-gold-outline magnetic-btn mt-3">Read Our Full Story</a>
      </div>

      <!-- Highlights visual layout -->
      <div class="col-lg-5 col-xl-5 offset-xl-1">
        <div class="legacy-highlights reveal-right">
          <!-- Decorative Corners -->
          <div class="parchment-corner top-left"></div>
          <div class="parchment-corner top-right"></div>
          <div class="parchment-corner bottom-left"></div>
          <div class="parchment-corner bottom-right"></div>

          <h4 class="font-display text-accent text-center mb-4 highlights-title">
            Pride of Lucknow
            <span class="d-block urdu-subtitle mt-2"
              style="font-size: 1.1rem; color: var(--color-primary); font-family: var(--font-urdu);">ہر محفل کی شان</span>
          </h4>

          <!-- Key numbers -->
          <div class="highlight-grid">
            <div class="highlight-item">
              <span class="highlight-value font-display">1955</span>
              <span class="highlight-label">Serving Since</span>
            </div>
            <div class="highlight-item">
              <span class="highlight-value font-display">4th</span>
              <span class="highlight-label">Generation of Legacy</span>
            </div>
            <div class="highlight-item">
              <span class="highlight-value font-display">ISO</span>
              <span class="highlight-label">9001:2015 &amp; 22000:2018</span>
            </div>
            <div class="highlight-item">
              <span class="highlight-value font-display">15–20</span>
              <span class="highlight-label">Mins Preparation Time</span>
            </div>
          </div>

          <!-- Separator -->
          <div class="highlight-separator">
            <div class="separator-line"></div>
            <div class="separator-diamond"></div>
            <div class="separator-line"></div>
          </div>

          <!-- Promise list -->
          <ul class="highlight-list">
            <li><strong>Fortune Refined Soyabean Oil</strong> used in all cooking</li>
            <li><strong>4 Outlets:</strong> Aminabad, Nazirabad, Bangla Bazar &amp; Munshi Pulia</li>
            <li><strong>All India</strong> Franchise &amp; Catering Services Available</li>
            <li><strong>Order Online</strong> on Swiggy &amp; Zomato</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Lucknow Ki Shaan Section (Royal Archway 3-Column Layout) -->
<section
  class="lucknow-shaan-section position-relative d-flex align-items-center justify-content-center overflow-hidden"
  style="padding-top: 100px; padding-bottom: 120px;">

  <!-- Background Subtle Pattern -->
  <div class="shaan-bg-pattern"></div>

  <div class="container position-relative shaan-container">

    <div class="section-title-wrapper">
      <span class="urdu-accent">روایتی ورثہ</span>
      <h2 class="section-title">A Living Tradition</h2>
      <p class="section-desc">From our late founder to the brothers managing our legacy kitchens today.</p>
    </div>

    <div class="row align-items-stretch justify-content-center g-3 g-lg-4">

      <!-- Column 1: Wahid Biryani Content -->
      <div class="col-lg-4 col-md-4 col-12 text-center reveal-up">
        <div class="shaan-arch-wrapper w-100">
          <div class="shaan-arch-border"></div>

          <div
            class="shaan-arch-inner d-flex flex-column align-items-center justify-content-center p-4 text-center mx-auto"
            style="background: var(--color-primary) !important; width: 100%; max-width: 360px;">
            <span class="urdu-accent mb-3" style="font-size: 2.2rem; color: var(--color-accent);">ذائقۂ اودھ</span>
            <h3 style="color: #FFFDF8; font-family: var(--font-display); font-size: 1.8rem; margin-bottom: 1.2rem;">
              The Wahid Experience</h3>
            <p style="color: rgba(255,255,255,0.8); font-size: 0.95rem; line-height: 1.7;">
              "Wahid Biryani is not just selling food. It is serving a legacy of Lucknow that has been carried forward
              since 1955. Every grain of rice holds the secret of the Nawabs."
            </p>
          </div>

        </div>
      </div>

      <!-- Column 2: Image Swiper (image + name overlay) -->
      <div class="col-lg-4 col-md-4 col-12 text-center reveal-up" style="transition-delay: 0.2s;">
        <div class="shaan-arch-wrapper w-100">
          <div class="shaan-arch-border"></div>

          <div class="shaan-arch-inner shaan-img-arch mx-auto p-0 overflow-hidden"
            style="background: var(--color-primary) !important; width: 100%; max-width: 360px;">

            <div class="swiper shaan-swiper">
              <div class="swiper-wrapper">

                <!-- Slide 1 -->
                <div class="swiper-slide shaan-slide">
                  <img src="assets/img/md-quraishi.WEBP" class="shaan-slide-img" alt="Late Chaudhary Mohammadu Quraishi">
                  <div class="shaan-slide-content">
                    <span class="shaan-role">Legacy <span class="shaan-dot">•</span> <span class="shaan-role-urdu">ورثہ</span></span>
                    <h4 class="shaan-name">Late Chaudhary Mohammadu Quraishi</h4>
                  </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide shaan-slide">
                  <img src="assets/img/aladeen.jpeg" class="shaan-slide-img" alt="Late Aladeen Quraishi">
                  <div class="shaan-slide-content">
                    <span class="shaan-role">Legacy <span class="shaan-dot">•</span> <span class="shaan-role-urdu">ورثہ</span></span>
                    <h4 class="shaan-name">Late Aladeen Quraishi</h4>
                  </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide shaan-slide">
                  <img src="assets/img/haji-wahid.WEBP" class="shaan-slide-img" alt="Late Haji Wahid Ali Quraishi">
                  <div class="shaan-slide-content">
                    <span class="shaan-role">Founder <span class="shaan-dot">•</span> <span class="shaan-role-urdu">بانی</span></span>
                    <h4 class="shaan-name">Late Haji Wahid Ali Quraishi</h4>
                  </div>
                </div>

                <!-- Slide 4 -->
                <div class="swiper-slide shaan-slide">
                  <img src="assets/img/abid-ali.WEBP" class="shaan-slide-img" alt="Abid Ali Quraishi">
                  <div class="shaan-slide-content">
                    <span class="shaan-role">Director <span class="shaan-dot">•</span> <span class="shaan-role-urdu">سرپرست</span></span>
                    <h4 class="shaan-name">Abid Ali Quraishi</h4>
                  </div>
                </div>

                <!-- Slide 5: All four brothers (group photo yahan lagana) -->
                <div class="swiper-slide shaan-slide">
                  <img src="assets/img/brother2.png" class="shaan-slide-img" alt="The Quraishi Brothers">
                  <div class="shaan-slide-content">
                    <span class="shaan-role">Next Gen <span class="shaan-dot">•</span> <span class="shaan-role-urdu">نسلِ نو</span></span>
                    <h4 class="shaan-name shaan-name-group">The Quraishi Brothers</h4>
                    <ul class="shaan-names">
                      <li>M. Aqib Quraishi</li>
                      <li>M. Saqib Quraishi</li>
                      <li>M. Arbaaz Quraishi</li>
                      <li>M. Saad Quraishi</li>
                    </ul>
                  </div>
                </div>

              </div>

              <div class="swiper-pagination shaan-pagination"></div>
            </div>

          </div>

        </div>
      </div>

      <!-- Column 3: Lineage Names Swiper (no image) -->
      <div class="col-lg-4 col-md-4 col-12 text-center reveal-up" style="transition-delay: 0.4s;">
        <div class="shaan-arch-wrapper w-100">
          <div class="shaan-arch-border"></div>

          <div class="shaan-arch-inner lineage-arch mx-auto p-0 overflow-hidden text-center"
            style="background: var(--color-primary) !important; width: 100%; max-width: 360px;">

            <!-- Fixed heading -->
            <div class="lineage-head">
              <h3 class="lineage-head-title">Our Culinary Lineage</h3>
              <span class="lineage-head-urdu">سلسلۂ طباخی</span>
            </div>

            <!-- Vertical Swiper -->
            <div class="swiper lineage-swiper">
              <div class="swiper-wrapper">

                <!-- Slide 1 -->
                <div class="swiper-slide lineage-slide">
                  <span class="lineage-role">Legacy <span class="lineage-dot">•</span> <span class="lineage-role-urdu">ورثہ</span></span>
                  <h4 class="lineage-name">Late Chaudhary Mohammadu Quraishi</h4>
                  <p class="lineage-desc">The roots of our culinary legacy</p>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide lineage-slide">
                  <span class="lineage-role">Legacy <span class="lineage-dot">•</span> <span class="lineage-role-urdu">ورثہ</span></span>
                  <h4 class="lineage-name">Late Aladeen Quraishi</h4>
                  <p class="lineage-desc">Carried the family legacy forward</p>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide lineage-slide">
                  <span class="lineage-role">Founder <span class="lineage-dot">•</span> <span class="lineage-role-urdu">بانی</span></span>
                  <h4 class="lineage-name">Late Haji Wahid Ali Quraishi</h4>
                  <p class="lineage-desc">1955 — Pioneer of Aminabad Biryani</p>
                </div>

                <!-- Slide 4 -->
                <div class="swiper-slide lineage-slide">
                  <span class="lineage-role">Director <span class="lineage-dot">•</span> <span class="lineage-role-urdu">سرپرست</span></span>
                  <h4 class="lineage-name">Abid Ali Quraishi</h4>
                  <p class="lineage-desc">Custodian &amp; Master Blender of Recipes</p>
                </div>

                <!-- Slide 5: all brothers together -->
                <div class="swiper-slide lineage-slide">
                  <span class="lineage-role">Next Gen <span class="lineage-dot">•</span> <span class="lineage-role-urdu">نسلِ نو</span></span>
                  <h4 class="lineage-name">The Quraishi Brothers</h4>
                  <ul class="lineage-names">
                    <li>M. Aqib Quraishi</li>
                    <li>M. Saqib Quraishi</li>
                    <li>M. Arbaaz Quraishi</li>
                    <li>M. Saad Quraishi</li>
                  </ul>
                  <p class="lineage-desc">Carrying the Flame &amp; Kitchen Ethos Today</p>
                </div>

              </div>

              <div class="swiper-pagination lineage-pagination"></div>
            </div>

          </div>

        </div>
      </div>

    </div>
  </div>
</section>


  <!-- Horizontal Scroll: The Royal Dastarkhwan (Highlights & Features) -->
  <section class="royal-dastarkhwan-section bg-cream">

    <div class="sig-jaali-overlay"></div>
    <div class="royal-dastarkhwan-header text-center">
      <div class="section-title-wrapper mb-0">
        <span class="urdu-accent">دسترخوان اودھ</span>
        <h2 class="section-title">The Royal Dastarkhwan <br/> By Wahid Biryani</h2>
        <p class="section-desc mb-0">Scroll vertically to unfold the core highlights and features of our culinary
          execution.</p>
      </div>
    </div>

    <div class="container position-relative">
      <!-- Staggered Royal Grid Layout -->
      <div class="row g-3 g-md-4 g-lg-5 justify-content-center mt-4">
        <!-- Card 1 -->
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 reveal-up">
          <div class="royal-parchment-card story-card h-100">
            <div>
              <span class="royal-seal-number">01</span>
              <div class="royal-image-frame">
                <img loading="lazy" src="assets/img/img1.png" alt="Traditional Awadhi Dum Prep">
              </div>
              <h3 class="royal-card-title">Dum-Pukht Cooking</h3>
              <p class="royal-card-desc">The secret of our biryani lies in 'Dum-Pukht'—sealing the copper handi with
                wheat dough to slow cook ingredients in their own steam, locking in rich herbal aromas.</p>
            </div>
          </div>
        </div>

        <!-- Card 2 (Staggered Down) -->
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 reveal-up stagger-down-desktop">
          <div class="royal-parchment-card story-card h-100">
            <div>
              <span class="royal-seal-number">02</span>
              <div class="royal-image-frame">
                <img loading="lazy" src="assets/img/img2.png" alt="Copper kitchenware">
              </div>
              <h3 class="royal-card-title">Brass & Copper Kitchenware</h3>
              <p class="royal-card-desc">We strictly cook in heavy brass and tin-coated copper handis. These traditional
                metals distribute heat gently, ensuring the meat becomes incredibly tender.</p>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 reveal-up">
          <div class="royal-parchment-card story-card h-100">
            <div>
              <span class="royal-seal-number">03</span>
              <div class="royal-image-frame">
                <img loading="lazy" src="assets/img/img3.png" alt="Saffron prep">
              </div>
              <h3 class="royal-card-title">Kashmiri Saffron Infusion</h3>
              <p class="royal-card-desc">True Lucknowi biryani uses no artificial dyes. We layer our rice grains with
                hand-extracted Kashmiri saffron milk to create delicate gold hues and floral notes.</p>
            </div>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 reveal-up">
          <div class="royal-parchment-card story-card h-100">
            <div>
              <span class="royal-seal-number">04</span>
              <div class="royal-image-frame">
                <img loading="lazy" src="assets/img/img4.png" alt="Family archival manuscripts">
              </div>
              <h3 class="royal-card-title">The Legacy Spice Mix</h3>
              <p class="royal-card-desc">Our legacy spice recipe, composed of over 32 hand-ground elements, is preserved
                as a closely-guarded family archive passed down across three generations.</p>
            </div>
          </div>
        </div>

        <!-- Card 5 (Staggered Down) -->
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 reveal-up stagger-down-desktop">
          <div class="royal-parchment-card story-card h-100">
            <div>
              <span class="royal-seal-number">05</span>
              <div class="royal-image-frame">
                <img loading="lazy" src="assets/img/img5.png" alt="Ulta Tawa Bread Cooking">
              </div>
              <h3 class="royal-card-title">Ulta Tawa Paratha</h3>
              <p class="royal-card-desc">Pan-seared on inverted heavy copper griddles to achieve paper-thin, soft
                layered breads crafted to complement melt-in-mouth Galavati kababs.</p>
            </div>
          </div>
        </div>

        <!-- Card 6 -->
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 reveal-up">
          <div class="royal-parchment-card story-card h-100">
            <div>
              <span class="royal-seal-number">06</span>
              <div class="royal-image-frame">
                <img loading="lazy" src="assets/img/img6.png" alt="Charcoal Flame Roast">
              </div>
              <h3 class="royal-card-title">Charcoal Flame Roast</h3>
              <p class="royal-card-desc">Juicy meat cuts marinated for 12 hours in raw papaya and secret spices, roasted
                slowly over live charcoal embers for authentic smoky aromas.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


<!-- Signature Dishes Showcase (Royal Awadhi Card Grid) -->
<section class="section-padding bg-cream position-relative overflow-hidden" id="signature">
  <!-- Architectural Ornaments (Pure CSS to avoid raster artifacts) -->
  <div
    style="position: absolute; left: -20px; top: 10%; width: 100px; height: 80%; border-right: 5px double var(--color-accent); border-radius: 0 50% 50% 0; opacity: 0.3; pointer-events: none;">
  </div>
  <div
    style="position: absolute; right: -20px; top: 10%; width: 100px; height: 80%; border-left: 5px double var(--color-accent); border-radius: 50% 0 0 50%; opacity: 0.3; pointer-events: none;">
  </div>

  <div class="sig-jaali-overlay"></div>

  <div class="container position-relative" style="z-index: 2;">
    <div class="section-title-wrapper">
      <span class="urdu-accent">روایتی پکوان</span>
      <h2 class="section-title">Signature Dishes Selection</h2>
      <p class="section-desc">Seven highlights from the legendary dastarkhwan of Wahid Biryani.</p>
    </div>

    <div class="signature-grid">

      <!-- Card 1: Biryani (Full Width Feature) -->
      <div class="sig-card sig-card-featured reveal-scale">
        <div class="sig-card-img-wrapper">
          <img loading="lazy" src="assets/img/chicken_biryani.jpeg" alt="Wahid Chicken Biryani">
          <div class="sig-card-overlay"></div>
          <span class="sig-card-number">01</span>
        </div>
        <div class="sig-card-body">
          <span class="dish-urdu">واحد خاص بریانی</span>
          <h3 class="sig-card-title">Wahid Special Biryani</h3>
          <p class="sig-card-desc">Our signature biryani, served since 1955 and loved across Lucknow. Choose from
            Chicken, Mutton, Paneer and Egg biryani, cooked with the same recipe and the same care for four
            generations.</p>
       
          <a href="menu.html#biryani" class="sig-card-link">View Full Menu <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- Card 2: Mughlai (Chicken Main Course) -->
      <div class="sig-card reveal-scale">
        <div class="sig-card-img-wrapper">
          <img loading="lazy" src="assets/img/chicken_kari.jpeg" alt="Chicken Main Course">
          <div class="sig-card-overlay"></div>
          <span class="sig-card-number">02</span>
        </div>
        <div class="sig-card-body">
          <span class="dish-urdu">مغلئی ذائقے</span>
          <h3 class="sig-card-title">Mughlai Delicacies</h3>
          <p class="sig-card-desc">Rich Mughlai gravies in Chicken Korma, Masala, Curry, Butter, Kali Mirch and
            Changezi, with boneless options too. Perfect with fresh breads.</p>
          <a href="menu.html#mughlai" class="sig-card-link">View Full Menu <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- Card 3: Lucknowi Dastarkhwan (Mutton Main Course) -->
      <div class="sig-card reveal-scale">
        <div class="sig-card-img-wrapper">
          <img loading="lazy" src="assets/img/lucknowi_dastarkhwan.png" alt="Lucknowi Dastarkhwan">
          <div class="sig-card-overlay"></div>
          <span class="sig-card-number">03</span>
        </div>
        <div class="sig-card-body">
          <span class="dish-urdu">لکھنوی دسترخوان</span>
          <h3 class="sig-card-title">Lucknowi Dastarkhwan</h3>
          <p class="sig-card-desc">A full mutton spread of Korma, Masala, Curry, Butter, Kali Mirch and Changezi,
            along with classic Kaleji and Bheja Fry.</p>
          <a href="menu.html#mutton" class="sig-card-link">View Full Menu <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- Card 4: Kababs & Tikkas -->
      <div class="sig-card reveal-scale">
        <div class="sig-card-img-wrapper">
          <img loading="lazy" src="assets/img/mutton_galavati_kabab.jpeg" alt="Kababs & Tikkas">
          <div class="sig-card-overlay"></div>
          <span class="sig-card-number">04</span>
        </div>
        <div class="sig-card-body">
          <span class="dish-urdu">کباب اور تکہ</span>
          <h3 class="sig-card-title">Kababs &amp; Tikkas</h3>
          <p class="sig-card-desc">Soft Mutton Galawati, Shami and Seekh kababs, along with Chicken Reshmi, Malai
            and Green Tikka from our starters.</p>
          <a href="menu.html#kebabs" class="sig-card-link">View Full Menu <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- Card 5: Desserts -->
      <div class="sig-card reveal-scale">
        <div class="sig-card-img-wrapper">
          <img loading="lazy" src="assets/img/shahi_tukda.jpg" alt="Shahi Tukda">
          <div class="sig-card-overlay"></div>
          <span class="sig-card-number">05</span>
        </div>
        <div class="sig-card-body">
          <span class="dish-urdu">شاہی میٹھا</span>
          <h3 class="sig-card-title">Traditional Desserts</h3>
          <p class="sig-card-desc">End your meal the royal way with Shahi Tukda, Zafrani Kheer or Gulab Jamun.</p>
          <a href="menu.html#desserts" class="sig-card-link">View Full Menu <i
              class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- Card 6: Mutton Boti Kabab -->
      <div class="sig-card reveal-scale">
        <div class="sig-card-img-wrapper">
          <img loading="lazy" src="assets/img/mutton_boti_kabab.jpeg" alt="Mutton Boti Kabab">
          <div class="sig-card-overlay"></div>
          <span class="sig-card-number">06</span>
        </div>
        <div class="sig-card-body">
          <span class="dish-urdu">بوٹی کباب</span>
          <h3 class="sig-card-title">Mutton Boti Kabab</h3>
          <p class="sig-card-desc">Juicy mutton boti kababs, a favourite starter and a perfect partner for our
            biryani and rumali roti.</p>
          <a href="menu.html#kebabs" class="sig-card-link">View Full Menu <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- Card 7: Breads -->
      <div class="sig-card reveal-scale">
        <div class="sig-card-img-wrapper">
          <img loading="lazy" src="assets/img/muglai_kabab_paratha.jpeg" alt="Mughlai Paratha and Breads">
          <div class="sig-card-overlay"></div>
          <span class="sig-card-number">07</span>
        </div>
        <div class="sig-card-body">
          <span class="dish-urdu">شاہی روٹی</span>
          <h3 class="sig-card-title">Royal Breads</h3>
          <p class="sig-card-desc">Mughlai Paratha, Rumali Roti, Sheermal, Kulcha and Naan, made fresh to go
            with our gravies and kababs.</p>
          <a href="menu.html#breads" class="sig-card-link">View Full Menu <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>

    </div>
  </div>
</section>

  <!-- Tehzeeb & Adab Section (Green Theme) -->
  <section class="tehzeeb-section">
    <!-- Jaali Pattern Background Overlay -->
    <div class="sig-jaali-overlay" style="opacity: 0.05;"></div>

    <div class="container position-relative" style="z-index: 2;">
      <div class="row align-items-center g-5">

        <!-- Left: Ornate Image -->
        <div class="col-lg-5 reveal-scale">
          <div class="tehzeeb-image-frame">
            <img loading="lazy" src="assets/img/heritage-dining.png" alt="Awadhi Hospitality">
          </div>
        </div>

        <!-- Right: Content -->
        <div class="col-lg-7 reveal-up">
          <span class="urdu-accent mb-3 d-block" style="color: var(--color-accent); font-size: 2rem;">ادب اور
            تہذیب</span>
          <h2 class="section-title text-white mb-4" style="font-size: clamp(2.2rem, 4vw, 3.2rem); text-align: left;">
            Adab, Tehzeeb &<br><span
              style="color: var(--color-accent); font-style: italic; font-family: var(--font-display);">Mehmaan
              Nawazi</span></h2>

          <div class="tehzeeb-text text-accent-peach">
            <p class="mb-4">At Wahid Biryani, we don't just serve food; we serve an era. Rooted in the legendary culture
              of Lucknow, our hospitality is an extension of the Awadhi <em>Tehzeeb</em>—a refined etiquette where every
              guest is treated like royalty.</p>

            <p class="mb-4">From the careful folding of the <em>dastarkhwan</em> to the polite <em>'Pehle Aap'</em>
              (after you) tradition, we bring the soulful warmth of the Nawabs directly to your table.</p>
          </div>

          <div class="d-flex align-items-center gap-4 mt-5">
            <div class="gold-stamp flex-shrink-0">
              <span class="d-block font-display fs-4 text-white">70+</span>
              <span class="text-accent"
                style="font-size: 0.70rem; text-transform: uppercase; letter-spacing: 2px;">Years of<br>Tradition</span>
            </div>
            <div class="border-start border-accent opacity-50" style="height: 60px;"></div>
            <p class="font-display italic text-accent mb-0"
              style="font-size: 1.15rem; line-height: 1.5; max-width: 400px;">"A taste that belongs to Lucknow, an
              experience that belongs to you."</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Featured Menu Grid ("Kuchh Menu's dikhane hai") -->
 <section class="section-padding bg-ivory" id="menu-teaser">
  <div class="container">
    <div class="section-title-wrapper">
      <span class="urdu-accent">دسترخوان کا انتخاب</span>
      <h2 class="section-title">Highlights from the Menu</h2>
      <p class="section-desc">A glimpse of the handpicked delicacies loved by our patrons.</p>
    </div>

    <div class="row g-3 g-md-4 justify-content-center">

      <!-- Item 1: Wahid Chicken Biryani -->
      <div class="col-lg-4 col-md-6 col-sm-6 col-12 reveal-scale">
        <div class="royal-parchment-card story-card h-100">
          <div>
            <div class="royal-image-frame" style="aspect-ratio: 4/3;">
              <img loading="lazy" src="assets/img/chicken_biryani.jpeg" alt="Wahid Chicken Biryani">
            </div>
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <h4 class="font-display text-primary fs-5 mb-0">Wahid Chicken Biryani</h4>
              <span class="font-display text-accent fw-600">₹180</span>
            </div>
            <p class="font-body mb-0" style="font-size: 0.85rem; color: var(--color-text); opacity: 0.85;">Our
              signature biryani, served since 1955. Half plate with 2 pieces of chicken.</p>
          </div>
        </div>
      </div>

      <!-- Item 2: Mutton Galawati Kabab -->
      <div class="col-lg-4 col-md-6 col-sm-6 col-12 reveal-scale">
        <div class="royal-parchment-card story-card h-100">
          <div>
            <div class="royal-image-frame" style="aspect-ratio: 4/3;">
              <img loading="lazy" src="assets/img/mutton_galavati_kabab.jpeg" alt="Mutton Galawati Kabab">
            </div>
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <h4 class="font-display text-primary fs-5 mb-0">Mutton Galawati Kabab</h4>
              <span class="font-display text-accent fw-600">₹190</span>
            </div>
            <p class="font-body mb-0" style="font-size: 0.85rem; color: var(--color-text); opacity: 0.85;">Soft,
              melt-in-your-mouth Lucknowi galawati kababs. One plate with 4 pieces.</p>
          </div>
        </div>
      </div>

      <!-- Item 3: Shahi Tukda -->
      <div class="col-lg-4 col-md-6 col-sm-6 col-12 reveal-scale">
        <div class="royal-parchment-card story-card h-100">
          <div>
            <div class="royal-image-frame" style="aspect-ratio: 4/3;">
              <img loading="lazy" src="assets/img/shahi_tukda.jpg" alt="Shahi Tukda">
            </div>
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <h4 class="font-display text-primary fs-5 mb-0">Shahi Tukda</h4>
              <span class="font-display text-accent fw-600">₹90</span>
            </div>
            <p class="font-body mb-0" style="font-size: 0.85rem; color: var(--color-text); opacity: 0.85;">The
              classic royal dessert of Lucknow, the perfect sweet end to your meal.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center mt-5 reveal-up">
      <a href="menu.html" class="btn btn-burgundy-fill magnetic-btn">View Entire Dastarkhwan Menu</a>
    </div>
  </div>
</section>
  <!-- Awards & Recognitions Section -->
  <section class="section-padding position-relative overflow-hidden" id="awards"
    style="background-color: #F4EBD7; z-index: 1;">
    <!-- Creative Background Image -->
    <div
      style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('assets/img/rumi_gate_golden.png') center/cover no-repeat fixed; opacity: 0.12; z-index: -1; mix-blend-mode: multiply; filter: contrast(1.2);">
    </div>
    <div class="container position-relative" style="z-index: 2;">
      <div class="section-title-wrapper">
        <span class="urdu-accent">اعزاز و اعتراف</span>
        <h2 class="section-title">Awards & Recognitions</h2>
        <p class="section-desc">Accolades and culinary honors celebrating our 70-year legacy of taste.</p>
      </div>

      <!-- Award Photos Row (3 images, text over image) -->
      <div class="row g-4 justify-content-center mt-3">

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
    </div>
  </section>

  <!-- Heritage Reels & Video Stories Section -->
  <section class="section-padding reels-section position-relative overflow-hidden bg-ivory" id="reels-showcase">
    <!-- Subtle Jaali Background Pattern -->
    <div class="sig-jaali-overlay" style="opacity: 0.04; z-index: 1;"></div>

    <div class="container position-relative" style="z-index: 2;">
      <div class="section-title-wrapper text-center">
        <span class="urdu-accent reveal-up">روایتی جھلکیاں</span>
        <h2 class="section-title split-words">Heritage Reels & Stories</h2>
        <p class="section-desc reveal-up mx-auto" style="max-width: 620px;">
          Experience the live sizzle of our charcoal sigris, the aroma of sealing dum handis, and authentic kitchen traditions in motion.
        </p>
        
        <!-- Royal Gold Delicate Ornament -->
        <div class="hero-ornament reveal-up my-3" style="opacity: 1; transform: none;">
          <svg width="220" height="20" viewBox="0 0 220 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="ornament-line" d="M10 10H100C105 5 110 1 110 1C110 1 115 5 120 10H210" stroke="#C49A45"
              stroke-width="1.5" stroke-linecap="round" />
          </svg>
        </div>
      </div>

      <!-- 4 Reels Responsive Grid: >=1280px (4 cards), 1024px-1279px (2 cards), mobile (2/1 cards) -->
      <div class="reels-grid">
        
        <!-- Reel 1 -->
        <div class="reel-card-item reveal-scale">
          <div class="reel-card" data-reel-id="reel-1">
            <div class="reel-thumbnail-wrap">
              <img loading="lazy" src="assets/video/poster/insta1.png" alt="The 70-Year Sigri Dum Magic" class="reel-poster">
              <video class="reel-video" muted playsinline loop preload="metadata" poster="assets/img/chicken_biryani.jpeg">
                <source src="assets/video/insta1.mp4" type="video/mp4">
              </video>
            </div>
            <div class="reel-overlay"></div>
            
            <div class="reel-top-bar">
              <span class="reel-badge-pill">
                <i class="fa-brands fa-instagram text-accent"></i> Reel
              </span>
              <span class="reel-views-pill">
                <i class="fa-solid fa-fire text-accent"></i> 1.2M
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
              <span class="reel-urdu-tag">دستخطی بریانی</span>
              <h3 class="reel-title">The 70-Year Dum Magic</h3>
              <div class="reel-meta-row">
                <span>0:45 • Aminabad Flagship</span>
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
               <img loading="lazy" src="assets/video/poster/insta2.png" alt="The 70-Year Sigri Dum Magic" class="reel-poster">
              <video class="reel-video" muted playsinline loop preload="metadata" poster="assets/img/chicken_biryani.jpeg">
                <source src="assets/video/insta2.mp4" type="video/mp4">
              </video>
            </div>
            <div class="reel-overlay"></div>
            
            <div class="reel-top-bar">
              <span class="reel-badge-pill">
                <i class="fa-brands fa-instagram text-accent"></i> Reel
              </span>
              <span class="reel-views-pill">
                <i class="fa-solid fa-fire text-accent"></i> 890K
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
              <span class="reel-urdu-tag">دم پخت مصالحے</span>
              <h3 class="reel-title">Secret Spices in Copper Handi</h3>
              <div class="reel-meta-row">
                <span>0:38 • Heritage Recipe</span>
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
              <img loading="lazy" src="assets/video/poster/insta3.png" alt="The 70-Year Sigri Dum Magic" class="reel-poster">
              <video class="reel-video" muted playsinline loop preload="metadata" poster="assets/img/chicken_biryani.jpeg">
                <source src="assets/video/insta3.mp4" type="video/mp4">
              </video>
            </div>
            <div class="reel-overlay"></div>
            
            <div class="reel-top-bar">
              <span class="reel-badge-pill">
                <i class="fa-brands fa-instagram text-accent"></i> Reel
              </span>
              <span class="reel-views-pill">
                <i class="fa-solid fa-fire text-accent"></i> 1.8M
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
              <span class="reel-urdu-tag">گلاوٹی کباب</span>
              <h3 class="reel-title">Galavati on Live Charcoal</h3>
              <div class="reel-meta-row">
                <span>0:52 • Live Kitchen</span>
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
              <img loading="lazy" src="assets/video/poster/insta4.png" alt="The 70-Year Sigri Dum Magic" class="reel-poster">
              <video class="reel-video" muted playsinline loop preload="metadata" poster="assets/img/chicken_biryani.jpeg">
                <source src="assets/video/insta4.mp4" type="video/mp4">
              </video>
            </div>
            <div class="reel-overlay"></div>
            
            <div class="reel-top-bar">
              <span class="reel-badge-pill">
                <i class="fa-brands fa-instagram text-accent"></i> Reel
              </span>
              <span class="reel-views-pill">
                <i class="fa-solid fa-fire text-accent"></i> 640K
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
              <span class="reel-urdu-tag">الٹا توا پراٹھا</span>
              <h3 class="reel-title">Royal Ulta Tawa Paratha</h3>
              <div class="reel-meta-row">
                <span>0:41 • Master Chefs</span>
                <span class="reel-watch-cta">Watch <i class="fa-solid fa-chevron-right ms-1" style="font-size: 0.65rem;"></i></span>
              </div>
            </div>

            <div class="reel-progress-bar"></div>
          </div>
        </div>

      </div>

      <!-- CTA to Video Gallery -->
      <div class="text-center mt-5 reveal-up">
        <a href="video-gallery.html" class="btn btn-gold-outline magnetic-btn">
          <i class="fa-solid fa-film me-2"></i> Explore All Video Stories
        </a>
      </div>

    </div>
  </section>

  <!-- Biryani Dum Animation Section (Palatial Lucknowi Architecture) -->
  <section class="dum-section position-relative overflow-hidden">
    <!-- Lucknowi Jaali Lattice Background Watermark -->
    <div class="dum-jaali-overlay"></div>

    <!-- Rumi Darwaza Grand Scalloped Arch Background Silhouette -->
    <div class="dum-rumi-arch-bg">

    </div>



    <div class="dum-container position-relative" style="z-index: 2;">
      <div class="dum-visual-wrapper">
        <div class="dum-bg-glow"></div>
        <img src="assets/img/mutton_boti_kabab.jpeg" alt="Authentic Clay Pot Handi"
          class="dum-handi img-fluid rounded-circle shadow-lg border border-3 border-accent">

        <!-- Steam layers moving independently -->
        <div class="dum-steam-container">
          <div class="dum-steam-layer"
            style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><path d=%22M30,90 Q40,60 30,30 T40,0%22 stroke=%22rgba(244,235,215,0.08)%22 stroke-width=%228%22 fill=%22none%22 stroke-linecap=%22round%22/></svg>');">
          </div>
          <div class="dum-steam-layer"
            style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><path d=%22M50,90 Q30,60 50,30 T30,0%22 stroke=%22rgba(244,235,215,0.06)%22 stroke-width=%2210%22 fill=%22none%22 stroke-linecap=%22round%22/></svg>');"
            data-parallax-speed="-0.05"></div>
          <div class="dum-steam-layer"
            style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><path d=%22M70,90 Q80,60 70,30 T80,0%22 stroke=%22rgba(244,235,215,0.04)%22 stroke-width=%226%22 fill=%22none%22 stroke-linecap=%22round%22/></svg>');">
          </div>
        </div>

        <!-- Falling saffron strands -->
        <div class="dum-saffron-strands">
          <svg class="dum-saffron-strand" style="top: 10%; left: 20%;" viewBox="0 0 10 30" fill="none">
            <path d="M2,2 Q8,15 2,28" stroke="#C49A45" stroke-width="2" />
          </svg>
          <svg class="dum-saffron-strand" style="top: 25%; left: 75%;" viewBox="0 0 10 30" fill="none">
            <path d="M8,2 Q2,15 8,28" stroke="#8B1E1E" stroke-width="2" />
          </svg>
          <svg class="dum-saffron-strand" style="top: 50%; left: 15%;" viewBox="0 0 10 30" fill="none">
            <path d="M4,2 Q6,15 4,28" stroke="#C49A45" stroke-width="2" />
          </svg>
        </div>
      </div>

      <div class="dum-text-wrapper">
        <div class="dum-step-card">
          <span class="urdu-accent" style="color: var(--color-accent); font-size: 1.8rem;">دم پخت</span>
          <h3 class="font-display" style="color: var(--color-bg-main);">The Art of Dum Cooking</h3>
          <p class="font-body text-accent-peach" style="line-height: 1.7; opacity: 0.95;">
            Slow dum-cooking requires a slow fire and exact timing. As temperatures rise inside the handi, saffron
            threads dissolve, meat juices coalesce, and the heavy steam transforms grains of rice into aromatic jewels.
          </p>
        </div>
        <div class="dum-step-card">
          <h3 class="font-display" style="color: var(--color-bg-main);">Unlocking the Flavours</h3>
          <p class="font-body text-accent-peach" style="line-height: 1.7; opacity: 0.95;">
            When the clay dough seal is cracked open at your table, the sudden burst of steam fills the room with
            cardamom, clove, rose water, and royal saffron. This is the moment Lucknow comes alive.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Banner Section (Palatial Lucknowi Rumi Gate Architecture) -->
  <section class="royal-cta-banner text-center position-relative">
    <!-- Rumi Darwaza Grand Scalloped Arch Background Silhouette -->
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



    <div class="container position-relative" style="z-index: 2;">
      <div class="royal-cta-box">
        <span class="urdu-accent reveal-up d-block mb-2" style="color: var(--color-accent); font-size: 2rem;">خوش
          آمدید</span>
        <h2 class="section-title reveal-up mb-3"
          style="color: var(--color-primary); font-size: clamp(2rem, 3.5vw, 3rem);">Dine at Our Dastarkhwan Tonight</h2>
        <p class="section-desc reveal-up mb-4"
          style="color: var(--color-text); opacity: 0.9; max-width: 650px; margin: 0 auto;">
          Indulge in an authentic Lucknowi dining experience, delivered fresh to your door or hosted with traditional
          royal adaab.
        </p>

        <div class="d-flex gap-3 justify-content-center flex-wrap reveal-up pt-2">
          <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#orderOnlineModal" class="btn btn-burgundy-fill magnetic-btn">Order Food Online</a>
          <a href="contact.html" class="btn btn-gold-outline magnetic-btn">Visit Our Outlets</a>
        </div>
      </div>
    </div>
  </section>


@endsection

@push('scripts')
@endpush
