@extends('layouts.app')

@section('body_class', 'heritage-page page-signature-dishes')

@section('content')

    <!-- Page Header (Awadhi Heritage Banner) -->
    <section class="section-padding text-center heritage-page-header position-relative overflow-hidden bg-ivory"
        style="padding-top: 180px; padding-bottom: 90px;">

        <!-- Subtle Pattern Overlay -->
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
                            <li class="active text-primary" style="color: var(--color-primary) !important;">Signature Dishes
                            </li>
                        </ul>
                    </div>
                </nav>

                <span class="urdu-accent reveal-up text-accent">شاہکار طعامِ اودھ</span>
                <h1 class="section-title split-words text-primary" style="font-size: clamp(2.5rem, 4.2vw, 3.8rem);">Our
                    Signature Creations</h1>
                <p class="section-desc reveal-up mx-auto text-dark" style="max-width: 680px; opacity: 0.88;">The five sacred
                    pillars of Wahid Biryani’s culinary repertoire — slow-cooked with heirloom spices in sealed copper
                    handis, carrying seventy years of Nawabi legacy.</p>

                <div class="hero-ornament reveal-up" style="opacity: 1; transform: none; margin-top: 25px;">
                    <svg width="220" height="20" viewBox="0 0 220 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="ornament-line" d="M10 10H100C105 5 110 1 110 1C110 1 115 5 120 10H210" stroke="#C49A45"
                            stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Sticky Quick Anchor Filter Bar -->
    <div class="sig-sticky-nav-wrapper">
        <div class="container">
            <ul class="sig-nav-pills">
                <li>
                    <a href="#wahid-special" class="sig-nav-pill-link active">
                        <i class="fa-solid fa-bowl-rice pill-icon"></i> Wahid Special Biryani
                    </a>
                </li>
                <li>
                    <a href="#mughlai" class="sig-nav-pill-link">
                        <i class="fa-solid fa-fire-burner pill-icon"></i> Mughlai Delicacies
                    </a>
                </li>
                <li>
                    <a href="#awadhi" class="sig-nav-pill-link">
                        <i class="fa-solid fa-bread-slice pill-icon"></i> Awadhi Specialities
                    </a>
                </li>
                <li>
                    <a href="#kebabs" class="sig-nav-pill-link">
                        <i class="fa-solid fa-utensils pill-icon"></i> Kebabs & Tikkas
                    </a>
                </li>
                <li>
                    <a href="#desserts" class="sig-nav-pill-link">
                        <i class="fa-solid fa-crown pill-icon"></i> Traditional Desserts
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- =========================================================================
               SECTION 1: WAHID SPECIAL BIRYANI (Left Image / Right Content)
               ========================================================================= -->
    <section id="wahid-special" class="sig-showcase-section sig-section-target">
        <div class="container">
            <div class="sig-showcase-row">

                <!-- Image Side (Left) -->
                <div class="sig-image-col reveal-left">
                    <div class="sig-image-card">
                        <!-- Corner Ornaments -->
                        <div class="sig-corner-ornament top-right"></div>
                        <div class="sig-corner-ornament bottom-left"></div>

                        <!-- Floating Badge -->
                        <div class="sig-floating-badge">
                            <i class="fa-solid fa-crown badge-icon"></i>
                            <span>Since 1955 • Pride of Lucknow</span>
                        </div>

                        <!-- Dual Image Stack (1 row 1 img) -->
                        <div class="sig-dual-image-stack">
                            <div class="sig-image-frame">
                                <img loading="lazy" src="assets/img/chicken_biryani.jpeg" alt="Wahid Special Dum Biryani">
                                <div class="sig-image-arch-overlay"></div>
                                <div class="sig-image-caption-tag">✦ Signature Dum Biryani</div>
                            </div>
                            <div class="sig-image-frame">
                                <img loading="lazy" src="assets/img/dum_pukht.png" alt="Royal Dum Pukht Dastarkhwan">
                                <div class="sig-image-arch-overlay"></div>
                                <div class="sig-image-caption-tag">✦ The Real Taste of Mughlai Cuisine</div>
                            </div>
                        </div>

                        <!-- Bottom Meta Bar -->
                        <div class="sig-image-meta-bar">
                            <div class="sig-meta-tag-list">
                                <span class="sig-meta-chip"><i class="fa-regular fa-clock me-1"></i> 15–20 Mins</span>
                                <span class="sig-meta-chip">Dum Cooked</span>
                                <span class="sig-meta-chip">Since 1955</span>
                            </div>
                            <div class="sig-origin-stamp">امین آباد لکھنؤ</div>
                        </div>
                    </div>
                </div>

                <!-- Content Side (Right) -->
                <div class="sig-content-col reveal-right">
                    <div class="sig-category-indicator">
                        <span class="sig-number-tag">01 / BIRYANI & RICE</span>
                        <span class="sig-urdu-accent">دستخطی دم پخت بریانی</span>
                    </div>

                    <h2 class="sig-section-heading">Wahid Special Biryani</h2>

                    <p class="sig-narrative-text">
                        Since 1955, Wahid Biryani has been the Pride of Lucknow, serving the real taste of Mughlai cuisine.
                        Our
                        signature dum biryani is prepared in the tradition of four generations of the Quraishi family and is
                        served
                        in Chicken, Mutton, Paneer and Egg varieties, with Biryani Rice, Plain Rice and Jeera Rice to match.
                        Every
                        dish is cooked fresh in Fortune Refined Soyabean Oil, so you get the same trusted taste, every
                        single time.
                    </p>

                    <!-- Culinary Highlights Grid -->
                    <div class="sig-highlights-grid">
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-fire"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Cooking Style</h5>
                                <p>Slow Dum Biryani</p>
                            </div>
                        </div>
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-clock"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Preparation Time</h5>
                                <p>Fresh in 15–20 Minutes</p>
                            </div>
                        </div>
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-droplet"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Cooking Oil</h5>
                                <p>Fortune Refined Soyabean Oil</p>
                            </div>
                        </div>
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-award"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Legacy</h5>
                                <p>Since 1955 • 4th Generation</p>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Sub-items List -->
                    <div class="sig-dishes-sublist">
                        <!-- Sub-item 1 -->
                        <div class="sig-dish-subitem">
                            <div class="sig-dish-subitem-left">
                                <div class="sig-subitem-thumb">
                                    <img src="assets/img/chicken_biryani.jpeg" alt="Wahid Mutton Biryani">
                                </div>
                                <div class="sig-subitem-details">
                                    <h4>Wahid Mutton Biryani</h4>
                                    <p>Our signature dum biryani layered with tender mutton pieces, served Half (2 pcs).</p>
                                </div>
                            </div>
                            <div class="sig-dish-subitem-right">
                                <span class="sig-subitem-price">Our Best</span>
                                <button type="button" class="sig-btn-detail" data-bs-toggle="modal"
                                    data-bs-target="#dishModal" data-title="Wahid Mutton Biryani"
                                    data-desc="Wahid Biryani's signature dum biryani, layered with tender mutton pieces and cooked slow in the real Mughlai tradition. Served in a Half portion with 2 pieces, and cooked in Fortune Refined Soyabean Oil. Ready in about 15–20 minutes."
                                    data-price="Half (2 pcs)" data-img="assets/img/chicken_biryani.jpeg"
                                    data-tag="Dum Cooked, Since 1955, Mughlai Tradition">
                                    Details <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Sub-item 2 -->
                        <div class="sig-dish-subitem">
                            <div class="sig-dish-subitem-left">
                                <div class="sig-subitem-thumb">
                                    <img src="assets/img/reshmi_chicken_tikka.jpeg" alt="Wahid Chicken Biryani">
                                </div>
                                <div class="sig-subitem-details">
                                    <h4>Wahid Chicken Biryani</h4>
                                    <p>Our most loved dum biryani with succulent chicken, served Half (2 pcs).</p>
                                </div>
                            </div>
                            <div class="sig-dish-subitem-right">
                                <span class="sig-subitem-price">Fan Favourite</span>
                                <button type="button" class="sig-btn-detail" data-bs-toggle="modal"
                                    data-bs-target="#dishModal" data-title="Wahid Chicken Biryani"
                                    data-desc="Fragrant rice layered with succulent chicken and cooked slow on dum, the way Wahid Biryani has made it since 1955. Served in a Half portion with 2 pieces, and cooked in Fortune Refined Soyabean Oil. Ready in about 15–20 minutes."
                                    data-price="Half (2 pcs)" data-img="assets/img/reshmi_chicken_tikka.jpeg"
                                    data-tag="Dum Cooked, Since 1955, Mughlai Tradition">
                                    Details <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="sig-content-actions">
                        <a href="{{ route('menu') }}" class="btn btn-burgundy-fill magnetic-btn">Order Biryani Online</a>
                        <a href="{{ route('menu') }}" class="btn btn-gold-outline magnetic-btn">View Full Menu</a>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <div class="sig-section-divider"></div>

    <!-- =========================================================================
               SECTION 2: MUGHLAI DELICACIES (Right Image / Left Content - Reversed)
               ========================================================================= -->
    <section id="mughlai" class="sig-showcase-section sig-section-target">
        <div class="container">
            <div class="sig-showcase-row reverse-row">

                <!-- Image Side (Right) -->
                <div class="sig-image-col reveal-right">
                    <div class="sig-image-card">
                        <!-- Corner Ornaments -->
                        <div class="sig-corner-ornament top-right"></div>
                        <div class="sig-corner-ornament bottom-left"></div>

                        <!-- Floating Badge -->
                        <div class="sig-floating-badge">
                            <i class="fa-solid fa-crown badge-icon"></i>
                            <span>Imperial Court Recipe</span>
                        </div>

                        <!-- Dual Image Stack (1 row 1 img) -->
                        <div class="sig-dual-image-stack">
                            <div class="sig-image-frame">
                                <img loading="lazy" src="assets/img/chicken_kari.jpeg" alt="Mughlai Delicacies">
                                <div class="sig-image-arch-overlay"></div>
                                <div class="sig-image-caption-tag">✦ Slow-Simmered Gravy</div>
                            </div>
                            <div class="sig-image-frame">
                                <img loading="lazy" src="assets/img/reshmi_chicken_tikka.jpeg" alt="Reshmi Chicken Tikka">
                                <div class="sig-image-arch-overlay"></div>
                                <div class="sig-image-caption-tag">✦ Royal Reshmi Delicacy</div>
                            </div>
                        </div>

                        <!-- Bottom Meta Bar -->
                        <div class="sig-image-meta-bar">
                            <div class="sig-meta-tag-list">
                                <span class="sig-meta-chip">Iron Karahi</span>
                                <span class="sig-meta-chip">Cashew Base</span>
                                <span class="sig-meta-chip">Rich Gravy</span>
                            </div>
                            <div class="sig-origin-stamp">مغلائی شاہکار</div>
                        </div>
                    </div>
                </div>

                <!-- Content Side (Left) -->
                <div class="sig-content-col reveal-left">
                    <div class="sig-category-indicator">
                        <span class="sig-number-tag">02 / SHAHI GRAVIES</span>
                        <span class="sig-urdu-accent">مغلائی کڑاہی و سالن</span>
                    </div>

                    <h2 class="sig-section-heading">Mughlai Delicacies</h2>

                    <p class="sig-narrative-text">
                        Inherited from the royal Dastarkhwans of the Mughal era, our slow-simmered curries are an exercise
                        in balance and depth. Prepared in thick-gauge iron karahis, each dish marries caramelized onion
                        paste (birista), crushed cashews, dried fenugreek (kasoori methi), and ginger juliennes with
                        succulent meats. The result is a silky, rich gravy that clings delightfully to warm artisan breads.
                    </p>

                    <!-- Culinary Highlights Grid -->
                    <div class="sig-highlights-grid">
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-pepper-hot"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Gravy Foundation</h5>
                                <p>Caramelized Onion & Cashews</p>
                            </div>
                        </div>
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-leaf"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Herbal Finish</h5>
                                <p>Roasted Kasoori Methi & Ginger</p>
                            </div>
                        </div>
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-layer-group"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Texture</h5>
                                <p>Velvety, Thick & Silky Reduction</p>
                            </div>
                        </div>
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-bread-slice"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Best Paired With</h5>
                                <p>Hot Ulta Tawa Mughlai Paratha</p>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Sub-items List -->
                    <div class="sig-dishes-sublist">
                        <!-- Sub-item 1 -->
                        <div class="sig-dish-subitem">
                            <div class="sig-dish-subitem-left">
                                <div class="sig-subitem-thumb">
                                    <img src="assets/img/chicken_kari.jpeg" alt="Mughlai Chicken Karahi">
                                </div>
                                <div class="sig-subitem-details">
                                    <h4>Mughlai Chicken Karahi</h4>
                                    <p>Deep wok cooked with tomato reduction, green chilies, coriander, and fenugreek.</p>
                                </div>
                            </div>
                            <div class="sig-dish-subitem-right">
                                <span class="sig-subitem-price">₹280</span>
                                <button type="button" class="sig-btn-detail" data-bs-toggle="modal"
                                    data-bs-target="#dishModal" data-title="Mughlai Chicken Karahi"
                                    data-desc="A royal curry composed of tomatoes, ginger juliennes, roasted spices, and fenugreek leaves, simmered with chicken pieces in a heavy iron wok (karahi). The curry is finished with fresh green chilies and a splash of cream, creating a thick, highly savory gravy that pairs perfectly with warm breads."
                                    data-price="₹280" data-img="assets/img/chicken_kari.jpeg"
                                    data-tag="Iron Karahi Cooked, Ginger Juliennes, Thick Gravy">
                                    Details <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Sub-item 2 -->
                        <div class="sig-dish-subitem">
                            <div class="sig-dish-subitem-left">
                                <div class="sig-subitem-thumb">
                                    <img src="assets/img/chicken_kari.jpeg" alt="Wahid Special Chicken Gravy">
                                </div>
                                <div class="sig-subitem-details">
                                    <h4>Wahid Special Chicken Curry</h4>
                                    <p>Traditional slow-cooked Awadhi gravy with aromatic spices and saffron hints.</p>
                                </div>
                            </div>
                            <div class="sig-dish-subitem-right">
                                <span class="sig-subitem-price">₹260</span>
                                <button type="button" class="sig-btn-detail" data-bs-toggle="modal"
                                    data-bs-target="#dishModal" data-title="Wahid Special Chicken Curry"
                                    data-desc="Homestyle Awadhi gravy prepared with fresh ground spices, simmered over slow flame to achieve tender chicken pieces coated in an intensely flavorful, aromatic gravy."
                                    data-price="₹260" data-img="assets/img/chicken_kari.jpeg"
                                    data-tag="Awadhi Style, Slow Simmered, Aromatic">
                                    Details <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="sig-content-actions">
                        <a href="{{ route('menu') }}" class="btn btn-burgundy-fill magnetic-btn">Order Mughlai Curries</a>
                        <a href="{{ route('menu') }}" class="btn btn-gold-outline magnetic-btn">Explore Menu</a>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <div class="sig-section-divider"></div>

    <!-- =========================================================================
               SECTION 3: AWADHI SPECIALITIES (Left Image / Right Content)
               ========================================================================= -->
    <section id="awadhi" class="sig-showcase-section sig-section-target">
        <div class="container">
            <div class="sig-showcase-row">

                <!-- Image Side (Left) -->
                <div class="sig-image-col reveal-left">
                    <div class="sig-image-card">
                        <!-- Corner Ornaments -->
                        <div class="sig-corner-ornament top-right"></div>
                        <div class="sig-corner-ornament bottom-left"></div>

                        <!-- Floating Badge -->
                        <div class="sig-floating-badge">
                            <i class="fa-solid fa-star badge-icon"></i>
                            <span>Inverted Tawa Technique</span>
                        </div>

                        <!-- Dual Image Stack (1 row 1 img) -->
                        <div class="sig-dual-image-stack">
                            <div class="sig-image-frame">
                                <img loading="lazy" src="assets/img/muglai_paratha.jpeg"
                                    alt="Awadhi Specialities & Parathas">
                                <div class="sig-image-arch-overlay"></div>
                                <div class="sig-image-caption-tag">✦ Golden Layered Paratha</div>
                            </div>
                            <div class="sig-image-frame">
                                <img loading="lazy" src="assets/img/muglai_kabab_paratha.jpeg"
                                    alt="Mughlai Kabab Paratha Combo">
                                <div class="sig-image-arch-overlay"></div>
                                <div class="sig-image-caption-tag">✦ Signature Paratha Roll</div>
                            </div>
                        </div>

                        <!-- Bottom Meta Bar -->
                        <div class="sig-image-meta-bar">
                            <div class="sig-meta-tag-list">
                                <span class="sig-meta-chip">Ulta Tawa</span>
                                <span class="sig-meta-chip">Multi-Layered</span>
                                <span class="sig-meta-chip">Pure Ghee</span>
                            </div>
                            <div class="sig-origin-stamp">روایتی پراٹھا</div>
                        </div>
                    </div>
                </div>

                <!-- Content Side (Right) -->
                <div class="sig-content-col reveal-right">
                    <div class="sig-category-indicator">
                        <span class="sig-number-tag">03 / TAWA & BREAD CRAFT</span>
                        <span class="sig-urdu-accent">اودھی خاص پراٹھا و رول</span>
                    </div>

                    <h2 class="sig-section-heading">Awadhi Specialities</h2>

                    <p class="sig-narrative-text">
                        No culinary exploration of Lucknow is complete without the iconic Mughlai Paratha. Hand-kneaded with
                        whole milk, saffron water, and fine flour, each dough round is tossed paper-thin and baked across
                        the dome of an inverted cast-iron griddle (ulta tawa). Brushed generously with golden desi ghee, it
                        achieves crisp gossamer layers on the outside while staying pillow-soft within. Wrapped around
                        sizzling Galavati kebabs, it defines the soul of Aminabad.
                    </p>

                    <!-- Culinary Highlights Grid -->
                    <div class="sig-highlights-grid">
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-circle-dot"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Griddle Method</h5>
                                <p>Inverted Dome (Ulta Tawa)</p>
                            </div>
                        </div>
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-cookie"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Crust & Flake</h5>
                                <p>Crispy Outer, Melt-Soft Inside</p>
                            </div>
                        </div>
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-droplet"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Desi Ghee Layering</h5>
                                <p>100% Clarified Pure Butter</p>
                            </div>
                        </div>
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-scroll"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Heritage Roll</h5>
                                <p>Signature Mint & Onion Wrap</p>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Sub-items List -->
                    <div class="sig-dishes-sublist">
                        <!-- Sub-item 1 -->
                        <div class="sig-dish-subitem">
                            <div class="sig-dish-subitem-left">
                                <div class="sig-subitem-thumb">
                                    <img src="assets/img/muglai_kabab_paratha.jpeg" alt="Mughlai Kabab Paratha">
                                </div>
                                <div class="sig-subitem-details">
                                    <h4>Mughlai Kabab Paratha</h4>
                                    <p>Flaky ghee paratha wrapped around smoked Galavati kababs, mint chutney and onions.
                                    </p>
                                </div>
                            </div>
                            <div class="sig-dish-subitem-right">
                                <span class="sig-subitem-price">₹210</span>
                                <button type="button" class="sig-btn-detail" data-bs-toggle="modal"
                                    data-bs-target="#dishModal" data-title="Mughlai Kabab Paratha"
                                    data-desc="The ultimate street-style luxury. A hand-thrown, multi-layered Mughlai paratha cooked on an inverted griddle (ulta tawa) with pure ghee, wrapped carefully around hot, charcoal-infused Galavati kababs, fresh ring-cut onions, and a splash of signature mint yogurt chutney."
                                    data-price="₹210" data-img="assets/img/muglai_kabab_paratha.jpeg"
                                    data-tag="Ulta Tawa Paratha, Ghee-rich, Mint Chutney">
                                    Details <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Sub-item 2 -->
                        <div class="sig-dish-subitem">
                            <div class="sig-dish-subitem-left">
                                <div class="sig-subitem-thumb">
                                    <img src="assets/img/muglai_paratha.jpeg" alt="Mughlai Paratha">
                                </div>
                                <div class="sig-subitem-details">
                                    <h4>Mughlai Paratha (Single)</h4>
                                    <p>Traditional multi-layered flaky flatbread baked on an inverted tawa with pure ghee.
                                    </p>
                                </div>
                            </div>
                            <div class="sig-dish-subitem-right">
                                <span class="sig-subitem-price">₹40</span>
                                <button type="button" class="sig-btn-detail" data-bs-toggle="modal"
                                    data-bs-target="#dishModal" data-title="Mughlai Paratha"
                                    data-desc="Authentic flaky flatbread made from fine wheat flour (maida), milk, and ghee. Kneaded repeatedly, folded to create multiple layers, and baked carefully on an inverted iron tawa to achieve a crisp golden exterior and incredibly soft, pull-apart layers inside."
                                    data-price="₹40" data-img="assets/img/muglai_paratha.jpeg"
                                    data-tag="Kneaded Flatbread, Golden Layers, Inverted Tawa">
                                    Details <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="sig-content-actions">
                        <a href="{{ route('menu') }}" class="btn btn-burgundy-fill magnetic-btn">Order Parathas Online</a>
                        <a href="{{ route('menu') }}" class="btn btn-gold-outline magnetic-btn">View Full Menu</a>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <div class="sig-section-divider"></div>

    <!-- =========================================================================
               SECTION 4: KEBABS & TIKKAS (Right Image / Left Content - Reversed)
               ========================================================================= -->
    <section id="kebabs" class="sig-showcase-section sig-section-target">
        <div class="container">
            <div class="sig-showcase-row reverse-row">

                <!-- Image Side (Right) -->
                <div class="sig-image-col reveal-right">
                    <div class="sig-image-card">
                        <!-- Corner Ornaments -->
                        <div class="sig-corner-ornament top-right"></div>
                        <div class="sig-corner-ornament bottom-left"></div>

                        <!-- Floating Badge -->
                        <div class="sig-floating-badge">
                            <i class="fa-solid fa-fire-flame-curved badge-icon"></i>
                            <span>155 Heirloom Spices</span>
                        </div>

                        <!-- Dual Image Stack (1 row 1 img) -->
                        <div class="sig-dual-image-stack">
                            <div class="sig-image-frame">
                                <img loading="lazy" src="assets/img/mutton_galavati_kabab.jpeg"
                                    alt="Mutton Galavati Kababs">
                                <div class="sig-image-arch-overlay"></div>
                                <div class="sig-image-caption-tag">✦ Melt-in-Mouth Galavati</div>
                            </div>
                            <div class="sig-image-frame">
                                <img loading="lazy" src="assets/img/mutton_boti_kabab.jpeg" alt="Mutton Boti Kabab">
                                <div class="sig-image-arch-overlay"></div>
                                <div class="sig-image-caption-tag">✦ Charcoal Sigri Boti</div>
                            </div>
                        </div>

                        <!-- Bottom Meta Bar -->
                        <div class="sig-image-meta-bar">
                            <div class="sig-meta-tag-list">
                                <span class="sig-meta-chip">7x Fine Minced</span>
                                <span class="sig-meta-chip">Charcoal Smoked</span>
                                <span class="sig-meta-chip">Melt-In-Mouth</span>
                            </div>
                            <div class="sig-origin-stamp">کبابِ لکھنؤ</div>
                        </div>
                    </div>
                </div>

                <!-- Content Side (Left) -->
                <div class="sig-content-col reveal-left">
                    <div class="sig-category-indicator">
                        <span class="sig-number-tag">04 / SIGRI & SMOKE</span>
                        <span class="sig-urdu-accent">گلاباتی کباب و بوٹی کباب</span>
                    </div>

                    <h2 class="sig-section-heading">Kebabs & Tikkas</h2>

                    <p class="sig-narrative-text">
                        Born out of the culinary demands of the Nawabs of Awadh, the Galavati Kebab represents the pinnacle
                        of textural perfection. Select prime lamb is minced seven times, tenderized with raw papaya pulp,
                        and steeped in an astonishing 155-spice potli formulation. Infused with the sacred 'Dhungar' smoke
                        of burning charcoal and pure ghee, these kebabs are pan-seared gently on a broad tawa until they
                        liquefy into rich flavor the moment they touch the palate.
                    </p>

                    <!-- Culinary Highlights Grid -->
                    <div class="sig-highlights-grid">
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-utensils"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Mincing Precision</h5>
                                <p>7-Stage Silken Lamb Grind</p>
                            </div>
                        </div>
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-smog"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Dhungar Smoking</h5>
                                <p>Live Coal & Desi Ghee Infusion</p>
                            </div>
                        </div>
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-flask"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Secret Spices</h5>
                                <p>155 Rare Awadhi Botanicals</p>
                            </div>
                        </div>
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-heart"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Texture</h5>
                                <p>Melt-In-The-Mouth Velvet</p>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Sub-items List -->
                    <div class="sig-dishes-sublist">
                        <!-- Sub-item 1 -->
                        <div class="sig-dish-subitem">
                            <div class="sig-dish-subitem-left">
                                <div class="sig-subitem-thumb">
                                    <img src="assets/img/mutton_galavati_kabab.jpeg" alt="Mutton Galavati Kabab">
                                </div>
                                <div class="sig-subitem-details">
                                    <h4>Mutton Galavati Kabab</h4>
                                    <p>Ultra-soft minced lamb infused with 155 secret spices, smoked with glowing coals.</p>
                                </div>
                            </div>
                            <div class="sig-dish-subitem-right">
                                <span class="sig-subitem-price">₹180</span>
                                <button type="button" class="sig-btn-detail" data-bs-toggle="modal"
                                    data-bs-target="#dishModal" data-title="Mutton Galavati Kabab"
                                    data-desc="The crown jewel of Lucknow's street cuisine. Tenderized using organic raw papaya paste, the mutton is minced seven times to achieve its ultra-soft texture. It is seasoned with the legendary 155-spice blend created during the Nawabi era, smoked with glowing wood charcoal and ghee, and shallow fried on a wide iron griddle (tawa)."
                                    data-price="₹180" data-img="assets/img/mutton_galavati_kabab.jpeg"
                                    data-tag="Smoked Minced Lamb, Pan Fried, Nawabi Era">
                                    Details <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Sub-item 2 -->
                        <div class="sig-dish-subitem">
                            <div class="sig-dish-subitem-left">
                                <div class="sig-subitem-thumb">
                                    <img src="assets/img/mutton_boti_kabab.jpeg" alt="Mutton Boti Kabab">
                                </div>
                                <div class="sig-subitem-details">
                                    <h4>Mutton Boti Kabab</h4>
                                    <p>Hand-cut mutton chunks skewered and roasted on an open charcoal sigri with mustard
                                        oil.</p>
                                </div>
                            </div>
                            <div class="sig-dish-subitem-right">
                                <span class="sig-subitem-price">₹220</span>
                                <button type="button" class="sig-btn-detail" data-bs-toggle="modal"
                                    data-bs-target="#dishModal" data-title="Mutton Boti Kabab"
                                    data-desc="Hand-cut mutton chunks double-marinated in lime juice, coriander powder, cumin, pepper, and a dash of mustard oil. Skewered on thin iron rods and slow-roasted over fiery red coal sigris. This creates a slightly charred, crisp exterior while keeping the meat incredibly tender and juicy inside."
                                    data-price="₹220" data-img="assets/img/mutton_boti_kabab.jpeg"
                                    data-tag="Charcoal Roasted, Hand-Cut Chunks, Mustard Oil">
                                    Details <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Sub-item 3 -->
                        <div class="sig-dish-subitem">
                            <div class="sig-dish-subitem-left">
                                <div class="sig-subitem-thumb">
                                    <img src="assets/img/reshmi_chicken_tikka.jpeg" alt="Reshmi Chicken Tikka">
                                </div>
                                <div class="sig-subitem-details">
                                    <h4>Reshmi Chicken Tikka</h4>
                                    <p>Boneless tender chicken marinated in rich cashew paste, cream, and mild saffron
                                        spices.</p>
                                </div>
                            </div>
                            <div class="sig-dish-subitem-right">
                                <span class="sig-subitem-price">₹240</span>
                                <button type="button" class="sig-btn-detail" data-bs-toggle="modal"
                                    data-bs-target="#dishModal" data-title="Reshmi Chicken Tikka"
                                    data-desc="Silken morsels of boneless chicken marinated in whipped cream, crushed cashew nut paste, white pepper, and green cardamom. Roasted gently over glowing coals until tender, juicy, and golden."
                                    data-price="₹240" data-img="assets/img/reshmi_chicken_tikka.jpeg"
                                    data-tag="Cashew Nut Paste, Whipped Cream, Mild & Juicy">
                                    Details <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="sig-content-actions">
                        <a href="{{ route('menu') }}" class="btn btn-burgundy-fill magnetic-btn">Order Kebabs Online</a>
                        <a href="{{ route('menu') }}" class="btn btn-gold-outline magnetic-btn">View Full Menu</a>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <div class="sig-section-divider"></div>

    <!-- =========================================================================
               SECTION 5: TRADITIONAL DESSERTS (Left Image / Right Content)
               ========================================================================= -->
    <section id="desserts" class="sig-showcase-section sig-section-target">
        <div class="container">
            <div class="sig-showcase-row">

                <!-- Image Side (Left) -->
                <div class="sig-image-col reveal-left">
                    <div class="sig-image-card">
                        <!-- Corner Ornaments -->
                        <div class="sig-corner-ornament top-right"></div>
                        <div class="sig-corner-ornament bottom-left"></div>

                        <!-- Floating Badge -->
                        <div class="sig-floating-badge">
                            <i class="fa-solid fa-gem badge-icon"></i>
                            <span>Kashmiri Saffron & Rabri</span>
                        </div>

                        <!-- Dual Image Stack (1 row 1 img) -->
                        <div class="sig-dual-image-stack">
                            <div class="sig-image-frame">
                                <img loading="lazy" src="assets/img/shahi_tukda.jpg" alt="Royal Shahi Tukda">
                                <div class="sig-image-arch-overlay"></div>
                                <div class="sig-image-caption-tag">✦ Saffron Rabri Shahi Tukda</div>
                            </div>
                            <div class="sig-image-frame">
                                <img loading="lazy" src="assets/img/heritage-dining.png" alt="Royal Sweet Dastarkhwan">
                                <div class="sig-image-arch-overlay"></div>
                                <div class="sig-image-caption-tag">✦ Dastarkhwan Finale</div>
                            </div>
                        </div>

                        <!-- Bottom Meta Bar -->
                        <div class="sig-image-meta-bar">
                            <div class="sig-meta-tag-list">
                                <span class="sig-meta-chip">6h Slow Rabri</span>
                                <span class="sig-meta-chip">Silver Leaf</span>
                                <span class="sig-meta-chip">Cardamom</span>
                            </div>
                            <div class="sig-origin-stamp">شاہی میٹھا</div>
                        </div>
                    </div>
                </div>

                <!-- Content Side (Right) -->
                <div class="sig-content-col reveal-right">
                    <div class="sig-category-indicator">
                        <span class="sig-number-tag">05 / SWEET RIWAYAT</span>
                        <span class="sig-urdu-accent">شاہی ٹکڑا و اودھی میٹھا</span>
                    </div>

                    <h2 class="sig-section-heading">Traditional Desserts</h2>

                    <p class="sig-narrative-text">
                        No royal Awadhi banquet concludes without the golden grandeur of Shahi Tukda. Artisanal bread
                        triangles are gently fried in pure desi ghee to a crisp amber hue, submerged into fragrant sugar
                        syrup, and drowned in thick, slow-reduced buffalo milk rabri. Infused with green cardamom powder,
                        drops of kewra jal, and strands of pure Kashmiri saffron, each serving is adorned with slivers of
                        toasted almonds and pure silver leaf (chandi ka varq).
                    </p>

                    <!-- Culinary Highlights Grid -->
                    <div class="sig-highlights-grid">
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-bowl-food"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Rabri Preparation</h5>
                                <p>6-Hour Slow Simmered Milk</p>
                            </div>
                        </div>
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-sun"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Aromatic Infusion</h5>
                                <p>Kashmiri Saffron & Kewra Water</p>
                            </div>
                        </div>
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Royal Garnish</h5>
                                <p>Toasted Nuts & Chandi Varq</p>
                            </div>
                        </div>
                        <div class="sig-highlight-card">
                            <div class="sig-highlight-icon"><i class="fa-solid fa-champagne-glasses"></i></div>
                            <div class="sig-highlight-info">
                                <h5>Tradition</h5>
                                <p>Dastarkhwan Celebratory Finale</p>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Sub-items List -->
                    <div class="sig-dishes-sublist">
                        <!-- Sub-item 1 -->
                        <div class="sig-dish-subitem">
                            <div class="sig-dish-subitem-left">
                                <div class="sig-subitem-thumb">
                                    <img src="assets/img/shahi_tukda.jpg" alt="Shahi Tukda">
                                </div>
                                <div class="sig-subitem-details">
                                    <h4>Royal Shahi Tukda</h4>
                                    <p>Ghee-fried bread soaked in saffron syrup, thick cardamom rabri, almonds, and silver
                                        varq.</p>
                                </div>
                            </div>
                            <div class="sig-dish-subitem-right">
                                <span class="sig-subitem-price">₹120</span>
                                <button type="button" class="sig-btn-detail" data-bs-toggle="modal"
                                    data-bs-target="#dishModal" data-title="Royal Shahi Tukda"
                                    data-desc="A royal dessert of ghee-fried bread triangles soaked in sugar syrup, layered generously with thick, slow-reduced rabri milk flavored with green cardamom and Kashmiri saffron, finished with roasted almond shavings and pure silver leaf (varq)."
                                    data-price="₹120" data-img="assets/img/shahi_tukda.jpg"
                                    data-tag="Ghee Fried Bread, Thick Rabri, Silver Leaf">
                                    Details <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="sig-content-actions">
                        <a href="{{ route('menu') }}" class="btn btn-burgundy-fill magnetic-btn">Order Dessert Online</a>
                        <a href="{{ route('menu') }}" class="btn btn-gold-outline magnetic-btn">View Full Menu</a>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- =========================================================================
               ROYAL DASTARKHWAN CALL-TO-ACTION BANNER
               ========================================================================= -->
    <section class="sig-royal-cta-section text-center">
        <div class="sig-jaali-overlay"></div>
        <div class="container position-relative" style="z-index: 5;">
            <div class="sig-cta-content">
                <span class="urdu-accent mb-2 d-block" style="font-size: 2.2rem; color: var(--color-accent);">دعوتِ
                    دسترخوان</span>
                <h2>Experience the Taste of Royal Lucknow</h2>
                <p>Whether you crave the slow-dum fragrance of our 55-spice Biryani or the melt-in-the-mouth tenderness of
                    Galavati Kababs, Wahid Biryani brings royal Awadhi heritage right to your table.</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="{{ route('menu') }}" class="btn btn-burgundy-fill magnetic-btn py-3 px-4">Order Online Now</a>
                    <a href="{{ route('our-outlets') }}" class="btn btn-gold-outline magnetic-btn py-3 px-4">Locate Nearest Outlet</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Reusable Dish Detail Lightbox Modal -->
    <div class="modal fade" id="dishModal" tabindex="-1" aria-labelledby="dishModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content"
                style="background: var(--color-bg-light); border: 1px solid rgba(196,154,69,0.4); border-radius: 12px; overflow: hidden;">
                <div class="modal-header"
                    style="border-bottom: 1px solid rgba(196,154,69,0.25); background: rgba(18,63,50,0.04);">
                    <h5 class="modal-title font-display text-primary fs-4" id="dishModalLabel">Culinary Secrets</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-5 mb-4 mb-md-0">
                            <div class="position-relative overflow-hidden rounded-3 border border-accent border-opacity-50"
                                style="aspect-ratio: 1/1;">
                                <img loading="lazy" id="modalImg" src="" alt="" class="w-100 h-100"
                                    style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <span class="text-accent font-body fw-bold text-uppercase letter-spacing-1 d-block mb-1"
                                id="modalTag" style="font-size: 0.8rem;"></span>
                            <h3 class="font-display text-primary mb-2" id="modalTitle" style="font-size: 2.1rem;"></h3>
                            <div class="text-danger font-display fs-3 fw-bold mb-3" id="modalPrice"></div>
                            <p class="font-body text-dark mb-4" id="modalDesc"
                                style="font-size: 0.95rem; line-height: 1.7; opacity: 0.85;"></p>

                            <div class="d-flex gap-3">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#orderOnlineModal"
                                    class="btn btn-burgundy-fill flex-grow-1 text-center py-2">Order Online</a>
                                <button type="button" class="btn btn-gold-outline py-2 px-4"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <!-- Modal and Sticky Navigation Scroll-Spy Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Dish Modal Data Injection
            const dishModal = document.getElementById('dishModal');
            if (dishModal) {
                dishModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    if (!button) return;

                    const title = button.getAttribute('data-title');
                    const desc = button.getAttribute('data-desc');
                    const price = button.getAttribute('data-price');
                    const img = button.getAttribute('data-img');
                    const tag = button.getAttribute('data-tag');

                    document.getElementById('modalTitle').textContent = title || '';
                    document.getElementById('modalDesc').textContent = desc || '';
                    document.getElementById('modalPrice').textContent = price || '';
                    document.getElementById('modalTag').textContent = tag || '';

                    const imgEl = document.getElementById('modalImg');
                    if (imgEl) {
                        imgEl.src = img || '';
                        imgEl.alt = title || '';
                    }
                });
            }

            // Sticky Filter Active Indicator based on Scroll Position
            const sections = document.querySelectorAll('.sig-section-target');
            const navLinks = document.querySelectorAll('.sig-nav-pill-link');

            function updateActivePill() {
                let currentSection = '';
                const scrollPosition = window.pageYOffset + 200;

                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.offsetHeight;
                    if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                        currentSection = '#' + section.getAttribute('id');
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === currentSection) {
                        link.classList.add('active');
                    }
                });
            }

            window.addEventListener('scroll', updateActivePill, { passive: true });
        });
    </script>

@endpush