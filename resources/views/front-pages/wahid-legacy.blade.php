@extends('layouts.app')

@section('body_class', 'heritage-page page-wahid-legacy')

@section('content')

  <!-- Page Header (Exact breadcrum.text Structure) -->
  <section class="section-padding text-center heritage-page-header position-relative overflow-hidden bg-ivory"
    style="padding-top: 180px">

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
              <li class="active text-primary" style="color: var(--color-primary) !important;">Our Legacy</li>
            </ul>
          </div>
        </nav>

        <span class="urdu-accent reveal-up text-accent">ہماری روایت</span>
        <h1 class="section-title split-words text-primary" style="font-size: clamp(2.5rem, 4vw, 3.75rem);">The Legacy of
          Awadh</h1>
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

  <!-- Section 1: Our Legacy & Family Lineage -->
  <section class="section-padding bg-cream" id="legacy-lineage">
    <div class="container">
      <div class="section-title-wrapper">
        <span class="urdu-accent">روایتی ورثہ</span>
        <h2 class="section-title">A Living Tradition</h2>
        <p class="section-desc">From our late founder to the brothers managing our legacy kitchens today.</p>
      </div>

      <div class="row align-items-start justify-content-between g-4">
        <!-- Text details -->
        <div class="col-lg-6 reveal-left">
          <div class="legacy-intro-box">
            <h3 class="font-display text-primary mb-2" style="font-size: 1.85rem;">This Is the Story of Wahid Biryani's History</h3>
            <p class="font-display italic text-accent mb-4" style="font-size: 1.15rem;">Prices Have Changed, but the Taste Is Still the Same</p>

            <p class="font-body text-muted mb-4" style="font-size: 0.98rem; line-height: 1.8;">
              About 150 years ago, this journey that began in the year 1902 continues even today. The late Shri Aladdin Qureshi and his son Haji Wahid Ali Qureshi established Wahid Biryani under the name Wahid Biryani in 1943. Haji Wahid was the only son of the family, therefore he was named Wahid. His father Shri Aladdin Qureshi was from the Bade Sahab Quresh family and was the cook of the Nawab-e-Awadh.
            </p>
            <p class="font-body text-muted mb-4" style="font-size: 0.98rem; line-height: 1.8;">
              After the Nawabi era ended, people started doing their own work and business, slavery ended, princely states etc. ended, and when the late Aladdin grew weak, he told his recipe, that is the potli masala, to his son Wahid Sahab. Wahid Sahab, taking on all his responsibilities, made his firm under the name Wahid Biryani (in the year 1955), in which Wahid Sahab's maternal uncle, the respected Majeed Sahab, taught him the work and helped Wahid Sahab by giving his important contribution, whose journey starting from Nakhas Chidiya Bazaar, Sadar Racecourse and Chowk Sabzi Mandi in the year 1978, reached Nazirabad in the year 1980, and Aminabad on Naaz Cinema Road in the year 1995, which exists even today.
            </p>
            <p class="font-body text-muted mb-4" style="font-size: 0.98rem; line-height: 1.8;">
              In fact, Wahid Biryani began at one anna per plate. Wahid Sahab tells a story from his time that I was selling biryani in the market, a gentleman ate our biryani and asked our name and address. I felt that the gentleman did not like the biryani. I told him, do not give me money. Then he said that I liked your biryani very much. I will definitely write about it in my magazine. Its picture was printed 60 years ago in a magazine named Dharmyug, whose headline was - Prices have changed, but the taste is the same.
            </p>
            <p class="font-body text-muted mb-4" style="font-size: 0.98rem; line-height: 1.8;">
              Wahid Sahab, telling his story, said that now due to age I have also become weak. Now Abid Ali Qureshi looks after my work and I have given all the responsibility to him.
            </p>
            <p class="font-body text-muted mb-4" style="font-size: 0.98rem; line-height: 1.8;">
              Abid Ali Qureshi is handling all the responsibilities very well and has made Wahid Biryani a multi-cuisine restaurant, which is available in both vegetarian and non-vegetarian forms. He is invited to all the food festivals held across India.
            </p>
            <p class="font-body text-muted mb-4" style="font-size: 0.98rem; line-height: 1.8;">
              He started with chicken-mutton biryani and now this journey has moved ahead and will continue ahead too. At present, the firm is in the hands of the fourth generation, who will take care of this work and maintain its existence in the country and abroad. Wahid Sahab's young grandsons Aakib Qureshi, Saakib Qureshi, Arbaaz Qureshi and Mohammad Saad Qureshi are now taking this work ahead with the new times, new times and new technology. They will keep moving ahead with the guidance and blessings of their grandfather and their father.
            </p>

            <div class="legacy-history-sign">
              <span class="legacy-history-sign__label">Founder</span>
              <span class="legacy-history-sign__name">Haji Wahid Ali Qureshi</span>
              <span class="legacy-history-sign__name">Mohammad Abid Ali Qureshi</span>
            </div>

            <div class="legacy-quote my-4">
              <p class="quote-text font-display italic text-primary fs-5 mb-2">
                "We do not cut corners. The spices are ground by hand, the meat is double-marinated, and every handi is
                sealed with dough. It is our promise to Lucknow."
              </p>
              <span class="quote-author font-body text-uppercase letter-spacing-1 text-accent fw-600"
                style="font-size: 0.75rem;">— Abid Ali, Director</span>
            </div>

            <a href="{{ route('our-story') }}" class="btn btn-gold-outline magnetic-btn mt-2">Explore Timeline Story</a>
          </div>
        </div>

        <!-- Lineage visual layout (Sticky) -->
        <div class="col-lg-6 col-xl-6 legacy-sticky-col">
          <div class="lineage-parchment reveal-right">
            <!-- Decorative Corners -->
            <div class="parchment-corner top-left"></div>
            <div class="parchment-corner top-right"></div>
            <div class="parchment-corner bottom-left"></div>
            <div class="parchment-corner bottom-right"></div>

            <h4 class="font-display text-accent text-center mb-5 lineage-title">
              Our Culinary Lineage
              <span class="d-block urdu-subtitle mt-2"
                style="font-size: 1.1rem; color: var(--color-primary); font-family: var(--font-urdu);">سلسلۂ
                طباخی</span>
            </h4>

            <div class="lineage-timeline">
              <!-- Node 1: Founder -->
              <div class="lineage-node">
                <div class="node-badge">
                  <span class="node-lang">Founder • بانی</span>
                </div>
                <div class="node-content">
                  <h5 class="font-display text-primary mb-1">Marhoom Wahid Ali</h5>
                  <p class="node-desc mb-0">1955 — The Pioneer of Aminabad Biryani</p>
                </div>
              </div>

              <!-- Node Separator -->
              <div class="lineage-separator">
                <div class="separator-line"></div>
                <div class="separator-diamond"></div>
                <div class="separator-line"></div>
              </div>

              <!-- Node 2: Director -->
              <div class="lineage-node">
                <div class="node-badge">
                  <span class="node-lang">Director • سرپرست</span>
                </div>
                <div class="node-content">
                  <h5 class="font-display text-primary mb-1">Abid Ali</h5>
                  <p class="node-desc mb-0">The Custodian & Master Blender of Recipes</p>
                </div>
              </div>

              <!-- Node Separator -->
              <div class="lineage-separator">
                <div class="separator-line"></div>
                <div class="separator-diamond"></div>
                <div class="separator-line"></div>
              </div>

              <!-- Node 3: Next Gen -->
              <div class="lineage-node">
                <div class="node-badge">
                  <span class="node-lang">Next Gen • نسلِ نو</span>
                </div>
                <div class="node-content">
                  <h5 class="font-display text-primary mb-1">Aqib & Shakib</h5>
                  <p class="node-desc mb-0">Carrying the Flame & Kitchen Ethos Today</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section 2: 6 Pillars of the Royal Dastarkhwan -->
  <section class="royal-dastarkhwan-section bg-ivory position-relative overflow-hidden py-5">
    <div class="sig-jaali-overlay" style="opacity: 0.05;"></div>
    <div class="container position-relative py-4">
      <div class="section-title-wrapper text-center">
        <span class="urdu-accent">دسترخوان اودھ</span>
        <h2 class="section-title">The 6 Pillars of the Royal Dastarkhwan</h2>
        <p class="section-desc mb-5">The core values, authentic ingredients, and time-honored cooking principles that
          define our legacy.</p>
      </div>

      <!-- Staggered Royal Grid Layout -->
      <div class="row g-3 g-md-4 g-lg-2 justify-content-center legacy-pillar-grid mt-2">
        <!-- Card 1 -->
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 reveal-up">
          <div class="royal-parchment-card story-card h-100">
            <div>
              <span class="royal-seal-number">01</span>
              <div class="royal-image-frame">
                <img loading="lazy" src="assets/img/img1.png" alt="Traditional Awadhi Dum Prep">
              </div>
              <h3 class="royal-card-title">Dum-Pukht Cooking</h3>
              <p class="royal-card-desc">The secret of our biryani lies in authentic ' Dum-Pukht'—sealing the copper
                degh with kneaded dough to slow-cook ingredients in their own steam, locking in rich herbal aromas.</p>
            </div>
          </div>
        </div>

        <!-- Card 2 (Staggered Down) -->
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 reveal-up stagger-down-desktop">
          <div class="royal-parchment-card story-card h-100">
            <div>
              <span class="royal-seal-number">02</span>
              <div class="royal-image-frame">
                <img loading="lazy" src="assets/img/reshmi_chicken_tikka.jpeg" alt="Copper kitchenware">
              </div>
              <h3 class="royal-card-title">Brass & Copper Vessels</h3>
              <p class="royal-card-desc">We strictly cook in heavy brass and tin-coated copper handis (Kalai). These
                traditional
                metals distribute heat gently, ensuring the meat achieves melt-in-mouth tenderness.</p>
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
              <p class="royal-card-desc">True Lucknowi biryani uses no artificial dyes. We layer our aged rice grains
                with
                hand-extracted Kashmiri saffron warm milk to create subtle gold hues and delicate floral notes.</p>
            </div>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 reveal-up">
          <div class="royal-parchment-card story-card h-100">
            <div>
              <span class="royal-seal-number">04</span>
              <div class="royal-image-frame">
                <img loading="lazy" src="assets/img/muglai_paratha.jpeg" alt="Family archival manuscripts">
              </div>
              <h3 class="royal-card-title">The 32-Spice Secret Potli</h3>
              <p class="royal-card-desc">Our legacy spice recipe, composed of 32 hand-ground whole botanicals, is
                preserved
                as a closely-guarded family archive passed down directly across three generations.</p>
            </div>
          </div>
        </div>

        <!-- Card 5 (Staggered Down) -->
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 reveal-up stagger-down-desktop">
          <div class="royal-parchment-card story-card h-100">
            <div>
              <span class="royal-seal-number">05</span>
              <div class="royal-image-frame">
                <img loading="lazy" src="assets/img/muglai_kabab_paratha.jpeg" alt="Ulta Tawa Bread Cooking">
              </div>
              <h3 class="royal-card-title">Ulta Tawa Craft</h3>
              <p class="royal-card-desc">Pan-seared on inverted heavy copper griddles to achieve paper-thin, soft
                layered breads crafted to complement melt-in-mouth Galavati kababs perfectly.</p>
            </div>
          </div>
        </div>

        <!-- Card 6 -->
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 reveal-up">
          <div class="royal-parchment-card story-card h-100">
            <div>
              <span class="royal-seal-number">06</span>
              <div class="royal-image-frame">
                <img loading="lazy" src="assets/img/mutton_boti_kabab.jpeg" alt="Charcoal Flame Roast">
              </div>
              <h3 class="royal-card-title">Charcoal Flame Sigri</h3>
              <p class="royal-card-desc">Prime cuts skewered and roasted on open charcoal sigris with pure ghee brushing
                for
                genuine Awadhi smokiness.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section 3: Tehzeeb & Adab Section (Green Awadhi Theme) -->
  <section class="tehzeeb-section">
    <div class="sig-jaali-overlay" style="opacity: 0.05;"></div>

    <div class="container position-relative" style="z-index: 2;">
      <div class="row align-items-center g-5">

        <!-- Left: Ornate Image Frame -->
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
              guest is welcomed as an honored nawab.</p>

            <p class="mb-4">From the careful folding of the <em>dastarkhwan</em> to the polite <em>'Pehle Aap'</em>
              (after you) tradition, we bring the soulful warmth of the Nawabs directly to your dining experience.</p>
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

  <!-- Section 4: Lucknow Monument Section -->
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

  <!-- Section 5: Royal CTA Banner -->
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

