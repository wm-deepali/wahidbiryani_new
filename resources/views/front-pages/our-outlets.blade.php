@extends('layouts.app')

@section('body_class', 'heritage-page page-our-outlets')

@section('content')

    <!-- Page Header (Exact breadcrum.text Structure) -->
    <section class="section-padding text-center heritage-page-header position-relative overflow-hidden bg-ivory"
        style="padding-top: 180px" ;>

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
                            <li class="active text-primary" style="color: var(--color-primary) !important;">Our Outlets</li>
                        </ul>
                    </div>
                </nav>

                <span class="urdu-accent reveal-up text-accent">ہماری شاخیں</span>
                <h1 class="section-title split-words text-primary" style="font-size: clamp(2.5rem, 4vw, 3.75rem);">Our
                    Outlets
                </h1>
                <p class="section-desc reveal-up mx-auto text-dark" style="max-width: 600px; opacity: 0.85;">Experience the
                    royal feast of Awadh across our iconic Lucknow locations in Aminabad, Hazratganj, and Chowk.</p>

                <div class="hero-ornament reveal-up" style="opacity: 1; transform: none; margin-top: 30px;">
                    <svg width="220" height="20" viewBox="0 0 220 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="ornament-line" d="M10 10H100C105 5 110 1 110 1C110 1 115 5 120 10H210" stroke="#C49A45"
                            stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Outlets Showcase Section -->
    <section class="section-padding bg-cream position-relative overflow-hidden" id="outlets-showcase">
        <div class="container position-relative" style="z-index: 2;">
            <div class="outlet-showcase-container">

                <!-- Outlet 1: Aminabad -->
                <div class="outlet-card reveal-up">
                    <div class="outlet-card-inner">

                        <!-- Content Side -->
                        <div class="outlet-content-side">
                            <div>
                                <div class="outlet-top-meta">
                                    <span class="outlet-badge flagship"><i class="fa-solid fa-crown me-1"></i> Since 1955 •
                                        Pride of
                                        Lucknow</span>
                                    <span class="outlet-urdu-title">امین آباد</span>
                                </div>

                                <h2 class="outlet-title">Wahid Biryani Aminabad</h2>
                                <h3 class="outlet-subtitle">The Real Taste of Mughlai Cuisine</h3>
                                <p class="outlet-desc">
                                    Wahid Biryani, the Pride of Lucknow since 1955, welcomes you at its Aminabad outlet on
                                    Naaz Cinema
                                    Road. Enjoy authentic Mughlai cuisine, from Dum Biryani and legendary Kababs to rich
                                    curries and
                                    breads, prepared with the legacy of four generations of the Quraishi family.
                                </p>

                                <!-- Amenities Pills -->
                                <div class="outlet-amenities">
                                    <span class="outlet-amenity-chip"><i class="fa-solid fa-award"></i> Since 1955</span>
                                    <span class="outlet-amenity-chip"><i class="fa-solid fa-certificate"></i> ISO
                                        Certified</span>
                                    <span class="outlet-amenity-chip"><i class="fa-solid fa-bag-shopping"></i> Swiggy &
                                        Zomato</span>
                                    <span class="outlet-amenity-chip"><i class="fa-solid fa-oil-can"></i> Fortune Soyabean
                                        Oil</span>
                                </div>

                                <!-- Info Grid -->
                                <div class="outlet-info-grid">
                                    <div class="outlet-info-item">
                                        <i class="fa-solid fa-location-dot outlet-info-icon"></i>
                                        <div class="outlet-info-text">
                                            <strong>Address</strong>
                                            <span>Naaz Cinema Road, Aminabad, Lucknow</span>
                                        </div>
                                    </div>
                                    <div class="outlet-info-item">
                                        <i class="fa-regular fa-clock outlet-info-icon"></i>
                                        <div class="outlet-info-text">
                                            <strong>Food Preparation Time</strong>
                                            <span>15 – 20 Minutes</span>
                                        </div>
                                    </div>
                                    <div class="outlet-info-item">
                                        <i class="fa-solid fa-phone outlet-info-icon"></i>
                                        <div class="outlet-info-text">
                                            <strong>Direct Phone</strong>
                                            <span>0522-2611878, +91 9236613111</span>
                                        </div>
                                    </div>
                                    <div class="outlet-info-item">
                                        <i class="fa-solid fa-bag-shopping outlet-info-icon"></i>
                                        <div class="outlet-info-text">
                                            <strong>Order Online On</strong>
                                            <span>Swiggy & Zomato</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="outlet-actions">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#orderOnlineModal"
                                    class="btn btn-burgundy-fill magnetic-btn"><i
                                        class="fa-solid fa-utensils me-2"></i>Order Online</a>
                                <a href="https://wa.me/919236613111?text=Hello%20Wahid%20Biryani%2C%20I%20would%20like%20to%20order%20from%20Aminabad%20Outlet."
                                    target="_blank" class="btn btn-whatsapp magnetic-btn"><i
                                        class="fa-brands fa-whatsapp me-2"></i>WhatsApp Order</a>
                                <a href="https://maps.google.com/?q=Wahid+Biryani+Naaz+Cinema+Road+Aminabad+Lucknow"
                                    target="_blank" class="btn btn-gold-outline magnetic-btn"><i
                                        class="fa-solid fa-location-arrow me-2"></i>Get
                                    Directions</a>
                            </div>
                        </div>

                        <!-- Visual Side -->
                        <div class="outlet-visual-side">
                            <img loading="lazy" src="assets/img/Aminabad.png" alt="Wahid Biryani Aminabad Outlet">
                            <div class="outlet-visual-overlay"></div>
                            <div class="outlet-floating-tag">
                                <span>✦ Aminabad Outlet • Since 1955</span>
                                <i class="fa-solid fa-crown tag-icon"></i>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Outlet 2: Nazirabad - Reverse Row -->
                <div class="outlet-card reverse-row reveal-up">
                    <div class="outlet-card-inner">

                        <!-- Content Side -->
                        <div class="outlet-content-side">
                            <div>
                                <div class="outlet-top-meta">
                                    <span class="outlet-badge"><i class="fa-solid fa-hotel me-1"></i> Wahid Biryani
                                        Outlet</span>
                                    <span class="outlet-urdu-title">نظیر آباد</span>
                                </div>

                                <h2 class="outlet-title">Wahid Biryani Nazirabad</h2>
                                <h3 class="outlet-subtitle">Har Mehfil Ki Shaan</h3>
                                <p class="outlet-desc">
                                    Find Wahid Biryani at Medicine Market, Nazirabad. Savour our signature Biryani, Kababs,
                                    Mughlai
                                    curries and breads, made fresh in the true Mughlai tradition that has made us the Pride
                                    of Lucknow
                                    since 1955.
                                </p>

                                <!-- Amenities Pills -->
                                <div class="outlet-amenities">
                                    <span class="outlet-amenity-chip"><i class="fa-solid fa-award"></i> Since 1955</span>
                                    <span class="outlet-amenity-chip"><i class="fa-solid fa-certificate"></i> ISO
                                        Certified</span>
                                    <span class="outlet-amenity-chip"><i class="fa-solid fa-bag-shopping"></i> Swiggy &
                                        Zomato</span>
                                    <span class="outlet-amenity-chip"><i class="fa-solid fa-champagne-glasses"></i> Catering
                                        Services</span>
                                </div>

                                <!-- Info Grid -->
                                <div class="outlet-info-grid">
                                    <div class="outlet-info-item">
                                        <i class="fa-solid fa-location-dot outlet-info-icon"></i>
                                        <div class="outlet-info-text">
                                            <strong>Address</strong>
                                            <span>Medicine Market, Nazirabad, Lucknow</span>
                                        </div>
                                    </div>
                                    <div class="outlet-info-item">
                                        <i class="fa-regular fa-clock outlet-info-icon"></i>
                                        <div class="outlet-info-text">
                                            <strong>Food Preparation Time</strong>
                                            <span>15 – 20 Minutes</span>
                                        </div>
                                    </div>
                                    <div class="outlet-info-item">
                                        <i class="fa-solid fa-phone outlet-info-icon"></i>
                                        <div class="outlet-info-text">
                                            <strong>Direct Phone</strong>
                                            <span>+91 8896612786, +91 9984700333</span>
                                        </div>
                                    </div>
                                    <div class="outlet-info-item">
                                        <i class="fa-solid fa-bag-shopping outlet-info-icon"></i>
                                        <div class="outlet-info-text">
                                            <strong>Order Online On</strong>
                                            <span>Swiggy & Zomato</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="outlet-actions">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#orderOnlineModal"
                                    class="btn btn-burgundy-fill magnetic-btn"><i
                                        class="fa-solid fa-utensils me-2"></i>Order Online</a>
                                <a href="https://wa.me/918896612786?text=Hello%20Wahid%20Biryani%2C%20I%20would%20like%20to%20order%20from%20Nazirabad%20Outlet."
                                    target="_blank" class="btn btn-whatsapp magnetic-btn"><i
                                        class="fa-brands fa-whatsapp me-2"></i>WhatsApp Order</a>
                                <a href="https://maps.google.com/?q=Wahid+Biryani+Medicine+Market+Nazirabad+Lucknow"
                                    target="_blank" class="btn btn-gold-outline magnetic-btn"><i
                                        class="fa-solid fa-location-arrow me-2"></i>Get
                                    Directions</a>
                            </div>
                        </div>

                        <!-- Visual Side -->
                        <div class="outlet-visual-side">
                            <img loading="lazy" src="assets/img/naziradbadd.png" alt="Wahid Biryani Nazirabad Outlet">
                            <div class="outlet-visual-overlay"></div>
                            <div class="outlet-floating-tag">
                                <span>✦ Nazirabad Outlet • Har Mehfil Ki Shaan</span>
                                <i class="fa-solid fa-star tag-icon"></i>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Outlet 3: Bangla Bazar -->
                <div class="outlet-card reveal-up">
                    <div class="outlet-card-inner">

                        <!-- Content Side -->
                        <div class="outlet-content-side">
                            <div>
                                <div class="outlet-top-meta">
                                    <span class="outlet-badge"><i class="fa-solid fa-fire me-1"></i> Wahid Biryani
                                        Outlet</span>
                                    <span class="outlet-urdu-title">بنگلہ بازار</span>
                                </div>

                                <h2 class="outlet-title">Wahid Biryani Bangla Bazar</h2>
                                <h3 class="outlet-subtitle">Pride of Lucknow Since 1955</h3>
                                <p class="outlet-desc">
                                    Visit our Bangla Bazar outlet at Ambika Vikar, Sector J, Ashiyana. Enjoy Wahid Biryani's
                                    famous
                                    Mughlai flavours, from Galavati and Boti Kababs to Biryani, Rolls and fresh breads,
                                    served in the
                                    tradition of four generations.
                                </p>

                                <!-- Amenities Pills -->
                                <div class="outlet-amenities">
                                    <span class="outlet-amenity-chip"><i class="fa-solid fa-award"></i> Since 1955</span>
                                    <span class="outlet-amenity-chip"><i class="fa-solid fa-certificate"></i> ISO
                                        Certified</span>
                                    <span class="outlet-amenity-chip"><i class="fa-solid fa-bag-shopping"></i> Swiggy &
                                        Zomato</span>
                                    <span class="outlet-amenity-chip"><i class="fa-solid fa-handshake"></i> Franchise
                                        Available</span>
                                </div>

                                <!-- Info Grid -->
                                <div class="outlet-info-grid">
                                    <div class="outlet-info-item">
                                        <i class="fa-solid fa-location-dot outlet-info-icon"></i>
                                        <div class="outlet-info-text">
                                            <strong>Address</strong>
                                            <span>Ambika Vikar, Sector J, Ashiyana, Lucknow</span>
                                        </div>
                                    </div>
                                    <div class="outlet-info-item">
                                        <i class="fa-regular fa-clock outlet-info-icon"></i>
                                        <div class="outlet-info-text">
                                            <strong>Food Preparation Time</strong>
                                            <span>15 – 20 Minutes</span>
                                        </div>
                                    </div>
                                    <div class="outlet-info-item">
                                        <i class="fa-solid fa-phone outlet-info-icon"></i>
                                        <div class="outlet-info-text">
                                            <strong>Direct Phone</strong>
                                            <span>+91 9648931111, +91 9198817222, +91 6390786444</span>
                                        </div>
                                    </div>
                                    <div class="outlet-info-item">
                                        <i class="fa-solid fa-bag-shopping outlet-info-icon"></i>
                                        <div class="outlet-info-text">
                                            <strong>Order Online On</strong>
                                            <span>Swiggy & Zomato</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="outlet-actions">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#orderOnlineModal"
                                    class="btn btn-burgundy-fill magnetic-btn"><i
                                        class="fa-solid fa-utensils me-2"></i>Order Online</a>
                                <a href="https://wa.me/919648931111?text=Hello%20Wahid%20Biryani%2C%20I%20would%20like%20to%20order%20from%20Bangla%20Bazar%20Outlet."
                                    target="_blank" class="btn btn-whatsapp magnetic-btn"><i
                                        class="fa-brands fa-whatsapp me-2"></i>WhatsApp Order</a>
                                <a href="https://maps.google.com/?q=Wahid+Biryani+Ambika+Vikar+Sector+J+Ashiyana+Lucknow"
                                    target="_blank" class="btn btn-gold-outline magnetic-btn"><i
                                        class="fa-solid fa-location-arrow me-2"></i>Get
                                    Directions</a>
                            </div>
                        </div>

                        <!-- Visual Side -->
                        <div class="outlet-visual-side">
                            <img loading="lazy" src="assets/img/Bangla.png" alt="Wahid Biryani Bangla Bazar Outlet">
                            <div class="outlet-visual-overlay"></div>
                            <div class="outlet-floating-tag">
                                <span>✦ Bangla Bazar Outlet</span>
                                <i class="fa-solid fa-fire tag-icon"></i>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Outlet 4: Munshi Pulia - Reverse Row -->
                <div class="outlet-card reverse-row reveal-up">
                    <div class="outlet-card-inner">

                        <!-- Content Side -->
                        <div class="outlet-content-side">
                            <div>
                                <div class="outlet-top-meta">
                                    <span class="outlet-badge"><i class="fa-solid fa-hotel me-1"></i> Wahid Biryani
                                        Outlet</span>
                                    <span class="outlet-urdu-title">منشی پلیا</span>
                                </div>

                                <h2 class="outlet-title">Wahid Biryani Munshi Pulia</h2>
                                <h3 class="outlet-subtitle">4th Generation of Legacy</h3>
                                <p class="outlet-desc">
                                    Located at D-Block, Indira Nagar, near Jwala Hospital, our Munshi Pulia outlet brings
                                    you the real
                                    taste of Mughlai cuisine. Dine on our signature Biryani, Kababs and curries, backed by a
                                    legacy of
                                    four generations.
                                </p>

                                <!-- Amenities Pills -->
                                <div class="outlet-amenities">
                                    <span class="outlet-amenity-chip"><i class="fa-solid fa-award"></i> Since 1955</span>
                                    <span class="outlet-amenity-chip"><i class="fa-solid fa-certificate"></i> ISO
                                        Certified</span>
                                    <span class="outlet-amenity-chip"><i class="fa-solid fa-bag-shopping"></i> Swiggy &
                                        Zomato</span>
                                    <span class="outlet-amenity-chip"><i class="fa-solid fa-champagne-glasses"></i> Catering
                                        Services</span>
                                </div>

                                <!-- Info Grid -->
                                <div class="outlet-info-grid">
                                    <div class="outlet-info-item">
                                        <i class="fa-solid fa-location-dot outlet-info-icon"></i>
                                        <div class="outlet-info-text">
                                            <strong>Address</strong>
                                            <span>D-Block, Indira Nagar, Near Jwala Hospital, Munshi Pulia, Lucknow</span>
                                        </div>
                                    </div>
                                    <div class="outlet-info-item">
                                        <i class="fa-regular fa-clock outlet-info-icon"></i>
                                        <div class="outlet-info-text">
                                            <strong>Food Preparation Time</strong>
                                            <span>15 – 20 Minutes</span>
                                        </div>
                                    </div>
                                    <div class="outlet-info-item">
                                        <i class="fa-solid fa-phone outlet-info-icon"></i>
                                        <div class="outlet-info-text">
                                            <strong>Direct Phone</strong>
                                            <span>+91 7607837666, +91 8174867555</span>
                                        </div>
                                    </div>
                                    <div class="outlet-info-item">
                                        <i class="fa-solid fa-bag-shopping outlet-info-icon"></i>
                                        <div class="outlet-info-text">
                                            <strong>Order Online On</strong>
                                            <span>Swiggy & Zomato</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="outlet-actions">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#orderOnlineModal"
                                    class="btn btn-burgundy-fill magnetic-btn"><i
                                        class="fa-solid fa-utensils me-2"></i>Order Online</a>
                                <a href="https://wa.me/917607837666?text=Hello%20Wahid%20Biryani%2C%20I%20would%20like%20to%20order%20from%20Munshi%20Pulia%20Outlet."
                                    target="_blank" class="btn btn-whatsapp magnetic-btn"><i
                                        class="fa-brands fa-whatsapp me-2"></i>WhatsApp Order</a>
                                <a href="https://maps.google.com/?q=Wahid+Biryani+Indira+Nagar+Munshi+Pulia+Lucknow"
                                    target="_blank" class="btn btn-gold-outline magnetic-btn"><i
                                        class="fa-solid fa-location-arrow me-2"></i>Get
                                    Directions</a>
                            </div>
                        </div>

                        <!-- Visual Side -->
                        <div class="outlet-visual-side">
                            <img loading="lazy" src="assets/img/munshi-pulia.png" alt="Wahid Biryani Munshi Pulia Outlet">
                            <div class="outlet-visual-overlay"></div>
                            <div class="outlet-floating-tag">
                                <span>✦ Munshi Pulia Outlet</span>
                                <i class="fa-solid fa-star tag-icon"></i>
                            </div>
                        </div>

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
                    Experience the authentic culinary legacy that has defined Awadhi cuisine for over seven decades.
                </p>

                <div class="d-flex gap-3 justify-content-center flex-wrap reveal-up pt-2">
                    <a href="{{ route('menu') }}" class="btn btn-burgundy-fill magnetic-btn">View Menu</a>
                    <a href="{{ route('contact') }}" class="btn btn-gold-outline magnetic-btn">Contact Our Team</a>
                </div>
            </div>
        </div>
    </section>

@endsection