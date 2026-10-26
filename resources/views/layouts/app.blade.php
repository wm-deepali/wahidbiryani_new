<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('partials.seo')
    @if ($general->favicon_url)
        <link rel="icon" href="{{ $general->favicon_url }}" />
    @endif

    <!-- Resource Hints & Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Manrope:wght@300;400;500;600;700;800&family=Noto+Nastaliq+Urdu:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- CSS Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    @stack('styles')
</head>

<body class="home-page">

    @php
        $siteName = $general->site_name ?: config('app.name');
        $contactEmail = $general->contact_email;
        $hasSocial = filled($general->facebook) || filled($general->instagram) || filled($general->linkedin)
            || filled($general->twitter) || filled($general->youtube) || filled($general->pinterest);
    @endphp

    @if (!empty($seo?->body_scripts))
        {!! $seo->body_scripts !!}
    @endif


    <!-- Page Curtains for Transitions -->
    <div class="page-curtain page-curtain-left"></div>
    <div class="page-curtain page-curtain-right"></div>

    <!-- Elegant Heritage Preloader -->
    <div id="preloader">
        <div class="preloader-logo-wrapper">
            <img src="assets/img/logo.png" alt="Wahid Biryani Logo" class="preloader-logo">
            <div class="preloader-subtitle">Since 1955</div>
            <div class="preloader-line"></div>
        </div>
    </div>

    <!-- Announcement Bar (Split Layout) -->
    <div class="announcement-bar">
        <div class="announcement-left">
            Since 1955 | The Original Taste of Lucknow | Serving Generations with the Same Aroma & Tradition
        </div>
        <div class="announcement-right">
            <div class="announcement-socials">
                <span class="social-label">Follow Us:</span>
                <a href="https://www.facebook.com/wahidbiryani" target="_blank" rel="noopener noreferrer"
                    class="social-icon-link" aria-label="Facebook">
                    <svg width="14" height="14" viewBox="0 0 320 512" fill="currentColor">
                        <path
                            d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                    </svg>
                </a>
                <a href="https://www.instagram.com/wahid_biryani_/" target="_blank" rel="noopener noreferrer"
                    class="social-icon-link" aria-label="Instagram">
                    <svg width="14" height="14" viewBox="0 0 448 512" fill="currentColor">
                        <path
                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                    </svg>
                </a>

                <a href="https://wa.me/919125066660" target="_blank" rel="noopener noreferrer" class="social-icon-link"
                    aria-label="WhatsApp">
                    <svg width="14" height="14" viewBox="0 0 448 512" fill="currentColor">
                        <path
                            d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Heritage Header Navigation -->
    <header class="heritage-header">
        <div class="header-container">
            <a href="index.html" class="logo-link" title="Wahid Biryani - Since 1955">
                <img src="assets/img/logo.png" alt="Wahid Biryani" class="logo-img">
            </a>

            <!-- Desktop Menu with Dropdowns -->
            <ul class="nav-menu">
                <li><a href="index.html" class="nav-link">Home</a></li>

                <!-- Dropdown: Our Legacy -->
                <li class="dropdown">
                    <a href="#" class="nav-link">Our Legacy</a>
                    <ul class="dropdown-menu">
                        <li><a href="our-story.html">Our Story</a></li>
                        <li><a href="wahid-legacy.html">The Wahid Biryani Legacy</a></li>
                        <li><a href="director-message.html">Director's Message</a></li>
                        <li><a href="awards.html">Awards & Recognitions</a></li>
                    </ul>
                </li>

                <!-- Direct Link: Signature Dishes -->
                <li><a href="signature-dishes.html" class="nav-link">Signature Dishes</a></li>

                <!-- Direct Link: Menu -->
                <li><a href="menu.html" class="nav-link">Menu</a></li>

                <!-- Direct Link: Our Outlets -->
                <li><a href="our-outlets.html" class="nav-link">Our Outlets</a></li>

                <!-- Dropdown: Gallery -->
                <li class="dropdown">
                    <a href="image-gallery.html" class="nav-link">Gallery</a>
                    <ul class="dropdown-menu">
                        <li><a href="image-gallery.html">Image Gallery</a></li>
                        <li><a href="video-gallery.html">Video's</a></li>
                    </ul>
                </li>

                <!-- Dropdown: Contact Us -->
                <li class="dropdown">
                    <a href="contact.html" class="nav-link">Contact Us</a>
                    <ul class="dropdown-menu">
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="feedback.html">Feedback & Suggestions</a></li>
                        <li><a href="franchise.html">Franchise Enquiry</a></li>
                    </ul>
                </li>
            </ul>

            <!-- CTA Button -->
            <div class="nav-cta">
                <a href="javascript:void(0)" class="btn btn-burgundy magnetic-btn" data-bs-toggle="modal"
                    data-bs-target="#orderOnlineModal">Order Food Online</a>
            </div>

            <!-- Mobile Nav Toggle -->
            <button class="mobile-nav-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNav"
                aria-controls="offcanvasNav" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
        <div class="header-border"></div>
    </header>

    @yield('content')



    <footer class="heritage-footer">
        <!-- Rumi Darwaza Scalloped Arch Top Ornament -->
        <div class="footer-top-ornament">
            <svg width="180" height="30" viewBox="0 0 180 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 28V20C10 20 20 12 45 12C60 12 70 5 90 2C110 5 120 12 135 12C160 12 170 20 170 28"
                    stroke="#C49A45" stroke-width="1.2" stroke-linecap="round" />
                <circle cx="90" cy="10" r="2.5" fill="#C49A45" />
            </svg>
        </div>

        <!-- Bada Imambara Architectural Silhouette Background SVG -->
        <div class="footer-imambara-silhouette">
            <svg width="100%" height="90" viewBox="0 0 1200 90" preserveAspectRatio="none" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 90V65H80C90 55 100 35 120 35C140 35 150 55 160 65H280C290 45 310 15 340 15C370 15 390 45 400 65H520C530 48 550 20 580 20C610 20 630 48 640 65H760C770 45 790 15 820 15C850 15 870 45 880 65H1000C1010 55 1020 35 1040 35C1060 35 1070 55 1080 65H1200V90H0Z"
                    fill="#C49A45" fill-opacity="0.05" />
            </svg>
        </div>

        <div class="container position-relative" style="z-index: 2;">
            <div class="row g-4 text-start mb-5 align-items-start">

                <!-- Column 1: Royal Emblem & Founder Ethos -->
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="footer-brand-wrapper">
                        <img src="assets/img/logo.png" alt="Wahid Biryani Logo" class="footer-logo mb-3">
                        <span class="d-block urdu-accent mb-2"
                            style="color: var(--color-accent); font-size: 1.5rem;">روایت • نسلاً
                            بعد نسل</span>
                        <p class="font-body text-accent-peach mb-3"
                            style="font-size: 0.88rem; line-height: 1.6; opacity: 0.9;">
                            Pride of Lucknow since 1955. Wahid Biryani carries the legacy of four generations of the
                            Quraishi family,
                            serving the real taste of Mughlai cuisine at every mehfil.
                        </p>
                        <div class="footer-quote-box border-start border-2 border-accent ps-3 py-1">
                            <span class="font-display italic text-accent d-block" style="font-size: 0.95rem;">"Har
                                Mehfil Ki
                                Shaan."</span>
                        </div>
                    </div>
                </div>

                <!-- Column 2: Our Outlets & Locations -->
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h4 class="font-display text-accent fs-5 mb-3 border-bottom border-accent-subtle pb-2">Our Lucknow
                        Kitchens
                    </h4>
                    <ul class="list-unstyled footer-location-list font-body"
                        style="font-size: 0.88rem; line-height: 1.8;">
                        <li class="mb-2">
                            <i class="fa-solid fa-location-dot text-accent me-2"></i>
                            <strong>Aminabad Outlet</strong><br>
                            <span class="text-accent-peach opacity-75 ps-4 d-block">Naaz Cinema Road, Aminabad,
                                Lucknow</span>
                        </li>
                        <li class="mb-2">
                            <i class="fa-solid fa-location-dot text-accent me-2"></i>
                            <strong>Nazirabad Outlet</strong><br>
                            <span class="text-accent-peach opacity-75 ps-4 d-block">Medicine Market, Nazirabad,
                                Lucknow</span>
                        </li>
                        <li class="mb-2">
                            <i class="fa-solid fa-location-dot text-accent me-2"></i>
                            <strong>Bangla Bazar Outlet</strong><br>
                            <span class="text-accent-peach opacity-75 ps-4 d-block">Ambika Vikar, Sector J, Ashiyana,
                                Lucknow</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-location-dot text-accent me-2"></i>
                            <strong>Munshi Pulia Outlet</strong><br>
                            <span class="text-accent-peach opacity-75 ps-4 d-block">D-Block, Indira Nagar, Near Jwala
                                Hospital,
                                Lucknow</span>
                        </li>
                    </ul>
                </div>

                <!-- Column 3: Quick Links -->
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h4 class="font-display text-accent fs-5 mb-3 border-bottom border-accent-subtle pb-2">Quick Links
                    </h4>
                    <ul class="list-unstyled footer-quick-links font-body" style="font-size: 0.88rem; line-height: 2;">
                        <li><a href="our-story.html" class="footer-link"><i
                                    class="fa-solid fa-chevron-right text-accent me-2"
                                    style="font-size: 0.7rem;"></i>Our Story</a></li>
                        <li><a href="wahid-legacy.html" class="footer-link"><i
                                    class="fa-solid fa-chevron-right text-accent me-2"
                                    style="font-size: 0.7rem;"></i>Wahid Biryani Legacy</a></li>
                        <li><a href="director-message.html" class="footer-link"><i
                                    class="fa-solid fa-chevron-right text-accent me-2"
                                    style="font-size: 0.7rem;"></i>Director's
                                Message</a></li>
                        <li><a href="awards.html" class="footer-link"><i
                                    class="fa-solid fa-chevron-right text-accent me-2"
                                    style="font-size: 0.7rem;"></i>Awards & Recognitions</a></li>
                        <li><a href="feedback.html" class="footer-link"><i
                                    class="fa-solid fa-chevron-right text-accent me-2"
                                    style="font-size: 0.7rem;"></i>Feedback & Suggestions</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact -->
                <div class="col-lg-3 col-md-6">
                    <h4 class="font-display text-accent fs-5 mb-3 border-bottom border-accent-subtle pb-2">Timings &
                        Contact</h4>
                    <div class="footer-contact-details font-body" style="font-size: 0.88rem; line-height: 1.8;">
                        <p class="mb-2 text-accent-peach">
                            <i class="fa-regular fa-clock text-accent me-2"></i>
                            <strong>Opening Hours:</strong><br>
                            <span class="ps-4 d-block">12:30 PM to 10:30 PM (Daily)</span>
                        </p>
                        <p class="mb-2 text-accent-peach">
                            <i class="fa-solid fa-phone text-accent me-2"></i>
                            <strong>Ordering Inquiries:</strong><br>
                            <span class="ps-4 d-block">
                                <a href="tel:+915222611878" class="footer-link">0522-2611878</a>,
                                <a href="tel:+919236613111" class="footer-link">+91 92366 13111</a>
                            </span>
                        </p>
                        <p class="mb-2 text-accent-peach">
                            <i class="fa-solid fa-handshake text-accent me-2"></i>
                            <strong>Franchise & Catering:</strong><br>
                            <span class="ps-4 d-block"><a href="tel:+919125066660" class="footer-link">+91 91250
                                    66660</a></span>
                        </p>
                        <p class="mb-3 text-accent-peach">
                            <i class="fa-solid fa-envelope text-accent me-2"></i>
                            <strong>Franchise & Support:</strong><br>
                            <span class="ps-4 d-block"><a href="mailto:info@wahidbiryani.com"
                                    class="footer-link">info@wahidbiryani.com</a></span>
                        </p>
                        <a href="franchise.html" class="btn btn-gold-outline btn-sm magnetic-btn">Franchise Inquiry</a>
                    </div>
                </div>

            </div>

            <!-- Social Connections Bar -->
            <div
                class="d-flex justify-content-between align-items-center flex-wrap pt-4 border-top border-accent-subtle">
                <div class="footer-social-wrapper mb-3 mb-md-0 d-flex align-items-center gap-3">
                    <span class="font-display text-accent me-2" style="font-size: 0.95rem;">Connect With Us:</span>
                    <div class="footer-socials d-flex flex-row align-items-center gap-2 m-0 p-0">
                        <a href="#" class="footer-social-link" aria-label="Facebook"><i
                                class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://www.facebook.com/wahidbiryani" target="_blank" class="footer-social-link"
                            aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/wahid_biryani_/" target="_blank" class="footer-social-link"
                            aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>

                <ul class="footer-nav m-0 p-0 d-flex flex-wrap gap-3 gap-md-4 justify-content-center list-unstyled">
                    <li><a href="index.html" class="footer-nav-link">Home</a></li>
                    <li><a href="our-story.html" class="footer-nav-link">Our Legacy</a></li>
                    <li><a href="signature-dishes.html" class="footer-nav-link">Signature Dishes</a></li>
                    <li><a href="menu.html" class="footer-nav-link">Menu</a></li>
                    <li><a href="our-outlets.html" class="footer-nav-link">Our Outlets</a></li>
                    <li><a href="image-gallery.html" class="footer-nav-link">Gallery</a></li>
                    <li><a href="video-gallery.html" class="footer-nav-link">Videos</a></li>
                    <li><a href="faq.html" class="footer-nav-link">FAQ</a></li>
                    <li><a href="contact.html" class="footer-nav-link">Contact</a></li>
                </ul>
            </div>

            <div class="footer-divider my-4"></div>

            <div class="text-center w-100">
                <p class="footer-copyright text-center mx-auto mb-0 pb-2"
                    style="max-width: 700px; text-align: center !important;">
                    &copy; 2026 Wahid Biryani Private Limited. The Real Taste of Mughlai Cuisine. Lucknow, India.<br>
                    All heritage recipes, logos, and cultural typography are property of Wahid Biryani.
                </p>
            </div>
        </div>
    </footer>

    <!-- GSAP & Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="assets/js/animations.js" defer></script>
    <script src="assets/js/main.js" defer></script>

    <!-- Royal Order Food Online Outlets Popup Modal -->
    <div class="modal fade royal-order-modal" id="orderOnlineModal" tabindex="-1"
        aria-labelledby="orderOnlineModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content royal-modal-content">

                <!-- Modal Header with Awadhi Arch & Close Button -->
                <div class="modal-header royal-modal-header border-0 pb-0">
                    <div class="w-100 text-center position-relative pt-2">
                        <span class="urdu-accent text-accent fs-4 d-block mb-1">دسترخوان پر تشریف لائیں</span>
                        <h3 class="modal-title font-display text-primary fs-2 mb-1" id="orderOnlineModalLabel">Select
                            Your Nearest Outlet</h3>
                        <p class="font-body text-muted small mb-0">Choose an outlet for fast doorstep delivery, online
                            takeaway, or direct WhatsApp ordering</p>

                        <div class="modal-gold-divider mx-auto my-2"></div>

                        <button type="button" class="btn-close royal-modal-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="modal-body royal-modal-body">
                    <div class="outlet-modal-list">

                        <!-- Outlet 1: Aminabad -->
                        <div class="outlet-modal-card">
                            <div class="outlet-modal-info">
                                <div class="outlet-badges-row">
                                    <span class="outlet-modal-badge">
                                        <i class="fa-solid fa-crown text-accent"></i> Since 1955 • Pride of Lucknow
                                    </span>
                                    <span class="outlet-status-pill"><i class="fa-solid fa-circle-dot"></i> Open
                                        Now</span>
                                </div>
                                <h4 class="outlet-modal-name">Aminabad Outlet</h4>
                                <p class="outlet-modal-addr">
                                    <i class="fa-solid fa-location-dot text-accent me-1"></i> Naaz Cinema Road,
                                    Aminabad, Lucknow
                                </p>
                                <div class="outlet-modal-meta">
                                    <span><i class="fa-solid fa-clock text-accent me-1"></i> 12:30 PM – 10:30 PM</span>
                                    <span><i class="fa-solid fa-phone text-accent me-1"></i>
                                        <a href="tel:+915222611878"
                                            class="text-muted text-decoration-none hover-text-accent">0522-2611878</a>,
                                        <a href="tel:+919236613111"
                                            class="text-muted text-decoration-none hover-text-accent">+91 92366
                                            13111</a>
                                    </span>
                                </div>
                            </div>
                            <div class="outlet-modal-actions">
                                <a href="https://www.swiggy.com/city/lucknow/wahid-biryani-aminabad-rest462690"
                                    target="_blank" rel="noopener noreferrer" class="btn btn-swiggy-modal"
                                    title="Order on Swiggy">
                                    <i class="fa-solid fa-bag-shopping"></i> Swiggy
                                </a>
                                <a href="https://www.zomato.com/lucknow/wahid-biryani-1-aminabad/info" target="_blank"
                                    rel="noopener noreferrer" class="btn btn-zomato-modal" title="Order on Zomato">
                                    <i class="fa-solid fa-bag-shopping"></i> Zomato
                                </a>
                                <a href="https://wa.me/919236613111?text=Hello%20Wahid%20Biryani%2C%20I%20would%20like%20to%20order%20food%20from%20Aminabad%20Outlet."
                                    target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp-modal"
                                    title="WhatsApp Order">
                                    <i class="fa-brands fa-whatsapp"></i> WhatsApp
                                </a>
                            </div>
                        </div>

                        <!-- Outlet 2: Bangla Bazar (Ashiyana) -->
                        <div class="outlet-modal-card">
                            <div class="outlet-modal-info">
                                <div class="outlet-badges-row">
                                    <span class="outlet-modal-badge">
                                        <i class="fa-solid fa-fire text-accent"></i> Wahid Biryani Outlet
                                    </span>
                                    <span class="outlet-status-pill"><i class="fa-solid fa-circle-dot"></i> Open
                                        Now</span>
                                </div>
                                <h4 class="outlet-modal-name">Bangla Bazar Outlet</h4>
                                <p class="outlet-modal-addr">
                                    <i class="fa-solid fa-location-dot text-accent me-1"></i> Ambika Vikar, Sector J,
                                    Ashiyana, Lucknow
                                </p>
                                <div class="outlet-modal-meta">
                                    <span><i class="fa-solid fa-clock text-accent me-1"></i> 12:30 PM – 10:30 PM</span>
                                    <span><i class="fa-solid fa-phone text-accent me-1"></i>
                                        <a href="tel:+919648931111"
                                            class="text-muted text-decoration-none hover-text-accent">+91 96489
                                            31111</a>,
                                        <a href="tel:+916390786444"
                                            class="text-muted text-decoration-none hover-text-accent">+91 63907
                                            86444</a>
                                    </span>
                                </div>
                            </div>
                            <div class="outlet-modal-actions">
                                <a href="https://www.swiggy.com/city/lucknow/wahid-biryani-ambika-vihar-aashiana-rest415138"
                                    target="_blank" rel="noopener noreferrer" class="btn btn-swiggy-modal"
                                    title="Order on Swiggy">
                                    <i class="fa-solid fa-bag-shopping"></i> Swiggy
                                </a>
                                <a href="https://www.zomato.com/lucknow/wahid-biryani-aashiana/info" target="_blank"
                                    rel="noopener noreferrer" class="btn btn-zomato-modal" title="Order on Zomato">
                                    <i class="fa-solid fa-bag-shopping"></i> Zomato
                                </a>
                                <a href="https://wa.me/919648931111?text=Hello%20Wahid%20Biryani%2C%20I%20would%20like%20to%20order%20food%20from%20Bangla%20Bazar%20Outlet."
                                    target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp-modal"
                                    title="WhatsApp Order">
                                    <i class="fa-brands fa-whatsapp"></i> WhatsApp
                                </a>
                            </div>
                        </div>

                        <!-- Outlet 3: Munshi Pulia (Indira Nagar) -->
                        <div class="outlet-modal-card">
                            <div class="outlet-modal-info">
                                <div class="outlet-badges-row">
                                    <span class="outlet-modal-badge">
                                        <i class="fa-solid fa-hotel text-accent"></i> Wahid Biryani Outlet
                                    </span>
                                    <span class="outlet-status-pill"><i class="fa-solid fa-circle-dot"></i> Open
                                        Now</span>
                                </div>
                                <h4 class="outlet-modal-name">Munshi Pulia Outlet</h4>
                                <p class="outlet-modal-addr">
                                    <i class="fa-solid fa-location-dot text-accent me-1"></i> D-Block, Indira Nagar,
                                    Near Jwala Hospital, Lucknow
                                </p>
                                <div class="outlet-modal-meta">
                                    <span><i class="fa-solid fa-clock text-accent me-1"></i> 12:30 PM – 10:30 PM</span>
                                    <span><i class="fa-solid fa-phone text-accent me-1"></i>
                                        <a href="tel:+917607837666"
                                            class="text-muted text-decoration-none hover-text-accent">+91 76078
                                            37666</a>,
                                        <a href="tel:+918174867555"
                                            class="text-muted text-decoration-none hover-text-accent">+91 81748
                                            67555</a>
                                    </span>
                                </div>
                            </div>
                            <div class="outlet-modal-actions">
                                <a href="https://www.swiggy.com/city/lucknow/wahid-biryani-indira-nagar-rest989590"
                                    target="_blank" rel="noopener noreferrer" class="btn btn-swiggy-modal"
                                    title="Order on Swiggy">
                                    <i class="fa-solid fa-bag-shopping"></i> Swiggy
                                </a>
                                <a href="https://www.zomato.com/lucknow/wahid-biryani-indira-nagar/order"
                                    target="_blank" rel="noopener noreferrer" class="btn btn-zomato-modal"
                                    title="Order on Zomato">
                                    <i class="fa-solid fa-bag-shopping"></i> Zomato
                                </a>
                                <a href="https://wa.me/917607837666?text=Hello%20Wahid%20Biryani%2C%20I%20would%20like%20to%20order%20food%20from%20Munshi%20Pulia%20Outlet."
                                    target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp-modal"
                                    title="WhatsApp Order">
                                    <i class="fa-brands fa-whatsapp"></i> WhatsApp
                                </a>
                            </div>
                        </div>

                        <!-- Outlet 4: Nazirabad (No Swiggy / Zomato - only WhatsApp & Call Now) -->
                        <div class="outlet-modal-card">
                            <div class="outlet-modal-info">
                                <div class="outlet-badges-row">
                                    <span class="outlet-modal-badge">
                                        <i class="fa-solid fa-hotel text-accent"></i> Wahid Biryani Outlet
                                    </span>
                                    <span class="outlet-status-pill"><i class="fa-solid fa-circle-dot"></i> Open
                                        Now</span>
                                </div>
                                <h4 class="outlet-modal-name">Nazirabad Outlet</h4>
                                <p class="outlet-modal-addr">
                                    <i class="fa-solid fa-location-dot text-accent me-1"></i> Medicine Market,
                                    Nazirabad, Lucknow
                                </p>
                                <div class="outlet-modal-meta">
                                    <span><i class="fa-solid fa-clock text-accent me-1"></i> 12:30 PM – 10:30 PM</span>
                                    <span><i class="fa-solid fa-phone text-accent me-1"></i>
                                        <a href="tel:+918896612786"
                                            class="text-muted text-decoration-none hover-text-accent">+91 88966
                                            12786</a>,
                                        <a href="tel:+919984700333"
                                            class="text-muted text-decoration-none hover-text-accent">+91 99847
                                            00333</a>
                                    </span>
                                </div>
                            </div>
                            <div class="outlet-modal-actions">
                                <a href="tel:+918896612786" class="btn btn-callnow-outlet" title="Call Now"
                                    style="display:inline-flex !important; align-items:center !important; justify-content:center !important; gap:8px !important; position:static !important; width:auto !important; height:auto !important; min-height:44px !important; padding:10px 20px !important; margin:0 !important; font-size:15px !important; font-weight:700 !important; line-height:1.2 !important; letter-spacing:0 !important; text-transform:none !important; color:#333333 !important; background:#e9ecef !important; border:1px solid #d0d4d9 !important; border-radius:8px !important; box-shadow:0 4px 10px rgba(0,0,0,0.08) !important; text-decoration:none !important; white-space:nowrap !important; flex:0 0 auto !important; transform:none !important;">
                                    <i class="fa-solid fa-phone"
                                        style="color:#333333 !important; margin:0 !important; font-size:14px !important; width:auto !important; height:auto !important; background:transparent !important;"></i>
                                    Call Now
                                </a>
                                <a href="https://wa.me/918896612786?text=Hello%20Wahid%20Biryani%2C%20I%20would%20like%20to%20order%20food%20from%20Nazirabad%20Outlet."
                                    target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp-modal"
                                    title="WhatsApp Order">
                                    <i class="fa-brands fa-whatsapp"></i> WhatsApp
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Modal Footer -->
                <div
                    class="modal-footer royal-modal-footer justify-content-between border-0 px-4 py-3 bg-light-subtle rounded-bottom-4">
                    <span class="small text-muted"><i class="fa-solid fa-truck-fast text-accent me-1"></i> Home Delivery
                        Available Across Lucknow</span>
                    <a href="menu.html" class="small text-primary fw-bold text-decoration-none hover-text-accent"
                        data-bs-dismiss="modal">
                        Explore Full Dastarkhwan Menu <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @stack('scripts')

</body>

</html>