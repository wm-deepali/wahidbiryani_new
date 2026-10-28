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
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

    @stack('styles')
</head>

<body class="@yield('body_class', 'inner-page')">

    @php
        $siteName = $general->site_name ?: config('app.name');
        $contactEmail = $general->contact_email;

        // Shared by the announcement bar (header) and the footer
        $socials = collect([
            ['url' => $general->facebook, 'icon' => 'fa-brands fa-facebook-f', 'label' => 'Facebook'],
            ['url' => $general->instagram, 'icon' => 'fa-brands fa-instagram', 'label' => 'Instagram'],
            ['url' => $general->twitter, 'icon' => 'fa-brands fa-x-twitter', 'label' => 'X (Twitter)'],
            ['url' => $general->linkedin, 'icon' => 'fa-brands fa-linkedin-in', 'label' => 'LinkedIn'],
            ['url' => $general->youtube, 'icon' => 'fa-brands fa-youtube', 'label' => 'YouTube'],
            ['url' => $general->pinterest, 'icon' => 'fa-brands fa-pinterest-p', 'label' => 'Pinterest'],
        ])->filter(fn($s) => filled($s['url']));
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
            <img src="{{ $general->header_logo_url }}" alt="{{ $siteName }} Logo" class="preloader-logo">
            @if(filled($general->preloader_subtitle))
                <div class="preloader-subtitle">{{ $general->preloader_subtitle }}</div>
            @endif
            <div class="preloader-line"></div>
        </div>
    </div>

    <!-- Announcement Bar (Split Layout) -->
    @if(filled($general->announcement_text) || $socials->isNotEmpty() || $general->whatsapp_url)
        <div class="announcement-bar">
            <div class="announcement-left">
                {{ $general->announcement_text }}
            </div>
            <div class="announcement-right">
                <div class="announcement-socials">
                    <span class="social-label">Follow Us:</span>
                    @foreach($socials as $social)
                        <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                            class="social-icon-link" aria-label="{{ $social['label'] }}">
                            <i class="{{ $social['icon'] }}" style="font-size: 14px;"></i>
                        </a>
                    @endforeach
                    @if($general->whatsapp_url)
                        <a href="{{ $general->whatsapp_url }}" target="_blank" rel="noopener noreferrer"
                            class="social-icon-link" aria-label="WhatsApp">
                            <i class="fa-brands fa-whatsapp" style="font-size: 14px;"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <!-- Heritage Header Navigation -->
    <header class="heritage-header">
        <div class="header-container">
            <a href="{{ route('home') }}" class="logo-link"
                title="{{ $siteName }}{{ filled($general->tagline) ? ' - ' . $general->tagline : '' }}">
                <img src="{{ $general->header_logo_url }}" alt="{{ $siteName }}" class="logo-img">
            </a>

            <!-- Desktop Menu with Dropdowns -->
            <ul class="nav-menu">
                <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>

                <!-- Dropdown: Our Legacy -->
                <li class="dropdown">
                    <a href="#" class="nav-link">Our Legacy</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('our-story') }}">Our Story</a></li>
                        <li><a href="{{ route('wahid-legacy') }}">The Wahid Biryani Legacy</a></li>
                        <li><a href="{{ route('director-message') }}">Director's Message</a></li>
                        <li><a href="{{ route('awards') }}">Awards & Recognitions</a></li>
                    </ul>
                </li>

                <li><a href="{{ route('signature-dishes') }}" class="nav-link">Signature Dishes</a></li>
                <li><a href="{{ route('menu') }}" class="nav-link">Menu</a></li>
                <li><a href="{{ route('our-outlets') }}" class="nav-link">Our Outlets</a></li>

                <!-- Dropdown: Gallery -->
                <li class="dropdown">
                    <a href="{{ route('image-gallery') }}" class="nav-link">Gallery</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('image-gallery') }}">Image Gallery</a></li>
                        <li><a href="{{ route('video-gallery') }}">Video's</a></li>
                    </ul>
                </li>

                <!-- Dropdown: Contact Us -->
                <li class="dropdown">
                    <a href="{{ route('contact') }}" class="nav-link">Contact Us</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li><a href="{{ route('feedback') }}">Feedback & Suggestions</a></li>
                        <li><a href="{{ route('franchise') }}">Franchise Enquiry</a></li>
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

    <!-- Mobile Offcanvas Menu (Collapsible Dropdowns) -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNav" aria-labelledby="offcanvasNavLabel">
        <div class="offcanvas-header">
            <a href="{{ route('home') }}" class="logo-link p-1 bg-white rounded">
                <img src="{{ $general->header_logo_url }}" alt="{{ $siteName }}" style="max-height: 44px;">
            </a>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="offcanvas-nav">
                <li class="mb-3">
                    <a href="{{ route('home') }}" class="offcanvas-link">Home</a>
                </li>

                <!-- Mobile Collapse: Our Legacy -->
                <li class="mb-3">
                    <a href="#mobileLegacyCollapse" class="offcanvas-link" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="mobileLegacyCollapse">Our Legacy <i
                            class="fa-solid fa-chevron-down fs-6 ms-1"></i></a>
                    <div class="collapse ps-3 mt-2" id="mobileLegacyCollapse">
                        <a href="{{ route('our-story') }}" class="offcanvas-sublink" data-bs-dismiss="offcanvas">Our
                            Story</a>
                        <a href="{{ route('wahid-legacy') }}" class="offcanvas-sublink"
                            data-bs-dismiss="offcanvas">The Wahid Biryani Legacy</a>
                        <a href="{{ route('director-message') }}" class="offcanvas-sublink"
                            data-bs-dismiss="offcanvas">Director's Message</a>
                        <a href="{{ route('awards') }}" class="offcanvas-sublink" data-bs-dismiss="offcanvas">Awards &
                            Recognitions</a>
                    </div>
                </li>

                <li class="mb-3">
                    <a href="{{ route('signature-dishes') }}" class="offcanvas-link">Signature Dishes</a>
                </li>

                <li class="mb-3">
                    <a href="{{ route('menu') }}" class="offcanvas-link">Menu</a>
                </li>

                <li class="mb-3">
                    <a href="{{ route('our-outlets') }}" class="offcanvas-link">Our Outlets</a>
                </li>

                <!-- Mobile Collapse: Gallery -->
                <li class="mb-3">
                    <a href="#mobileGalleryCollapse" class="offcanvas-link" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="mobileGalleryCollapse">Gallery <i
                            class="fa-solid fa-chevron-down fs-6 ms-1"></i></a>
                    <div class="collapse ps-3 mt-2" id="mobileGalleryCollapse">
                        <a href="{{ route('image-gallery') }}" class="offcanvas-sublink"
                            data-bs-dismiss="offcanvas">Image Gallery</a>
                        <a href="{{ route('video-gallery') }}" class="offcanvas-sublink"
                            data-bs-dismiss="offcanvas">Video's</a>
                    </div>
                </li>

                <!-- Mobile Collapse: Contact Us -->
                <li class="mb-3">
                    <a href="#mobileContactCollapse" class="offcanvas-link" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="mobileContactCollapse">Contact Us <i
                            class="fa-solid fa-chevron-down fs-6 ms-1"></i></a>
                    <div class="collapse ps-3 mt-2" id="mobileContactCollapse">
                        <a href="{{ route('contact') }}" class="offcanvas-sublink" data-bs-dismiss="offcanvas">Contact
                            Us</a>
                        <a href="{{ route('feedback') }}" class="offcanvas-sublink"
                            data-bs-dismiss="offcanvas">Feedback & Suggestions</a>
                        <a href="{{ route('franchise') }}" class="offcanvas-sublink"
                            data-bs-dismiss="offcanvas">Franchise Enquiry</a>
                    </div>
                </li>
            </ul>

            <div class="offcanvas-footer">
                <a href="javascript:void(0)" class="btn btn-burgundy-fill w-100 d-block text-center py-3"
                    data-bs-toggle="modal" data-bs-target="#orderOnlineModal" data-bs-dismiss="offcanvas">Order
                    Online</a>
            </div>
        </div>
    </div>

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

        @php
            $mainPhone = $general->phone;
            $mainWhatsapp = $general->whatsapp;
        @endphp

        <div class="container position-relative" style="z-index: 2;">
            <div class="row g-4 text-start mb-5 align-items-start">

                <!-- Column 1: Royal Emblem & Founder Ethos -->
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="footer-brand-wrapper">
                        <img src="{{ $general->footer_logo_url }}" alt="{{ $siteName }} Logo" class="footer-logo mb-3">

                        @if(filled($general->footer_urdu_text))
                            <span class="d-block urdu-accent mb-2"
                                style="color: var(--color-accent); font-size: 1.5rem;">{{ $general->footer_urdu_text }}</span>
                        @endif

                        @if(filled($general->footer_description))
                            <p class="font-body text-accent-peach mb-3"
                                style="font-size: 0.88rem; line-height: 1.6; opacity: 0.9;">
                                {!! nl2br(e($general->footer_description)) !!}
                            </p>
                        @endif

                        @if(filled($general->tagline))
                            <div class="footer-quote-box border-start border-2 border-accent ps-3 py-1">
                                <span class="font-display italic text-accent d-block"
                                    style="font-size: 0.95rem;">"{{ $general->tagline }}"</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Column 2: Our Outlets & Locations -->
                @if($navOutlets->isNotEmpty())
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                        <h4 class="font-display text-accent fs-5 mb-3 border-bottom border-accent-subtle pb-2">Our Lucknow
                            Kitchens</h4>
                        <ul class="list-unstyled footer-location-list font-body"
                            style="font-size: 0.88rem; line-height: 1.8;">
                            @foreach($navOutlets as $outlet)
                                <li class="{{ $loop->last ? '' : 'mb-2' }}">
                                    <i class="fa-solid fa-location-dot text-accent me-2"></i>
                                    <strong>{{ $outlet->name }}</strong><br>
                                    <span class="text-accent-peach opacity-75 ps-4 d-block">{{ $outlet->address }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Column 3: Quick Links -->
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h4 class="font-display text-accent fs-5 mb-3 border-bottom border-accent-subtle pb-2">Quick Links
                    </h4>
                    <ul class="list-unstyled footer-quick-links font-body" style="font-size: 0.88rem; line-height: 2;">
                        <li><a href="{{ route('our-story') }}" class="footer-link"><i
                                    class="fa-solid fa-chevron-right text-accent me-2"
                                    style="font-size: 0.7rem;"></i>Our Story</a></li>
                        <li><a href="{{ route('wahid-legacy') }}" class="footer-link"><i
                                    class="fa-solid fa-chevron-right text-accent me-2"
                                    style="font-size: 0.7rem;"></i>Wahid Biryani Legacy</a></li>
                        <li><a href="{{ route('director-message') }}" class="footer-link"><i
                                    class="fa-solid fa-chevron-right text-accent me-2"
                                    style="font-size: 0.7rem;"></i>Director's Message</a></li>
                        <li><a href="{{ route('awards') }}" class="footer-link"><i
                                    class="fa-solid fa-chevron-right text-accent me-2"
                                    style="font-size: 0.7rem;"></i>Awards & Recognitions</a></li>
                        <li><a href="{{ route('feedback') }}" class="footer-link"><i
                                    class="fa-solid fa-chevron-right text-accent me-2"
                                    style="font-size: 0.7rem;"></i>Feedback & Suggestions</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact -->
                <div class="col-lg-3 col-md-6">
                    <h4 class="font-display text-accent fs-5 mb-3 border-bottom border-accent-subtle pb-2">Timings &
                        Contact</h4>
                    <div class="footer-contact-details font-body" style="font-size: 0.88rem; line-height: 1.8;">

                        @if(filled($general->business_hours))
                            <p class="mb-2 text-accent-peach">
                                <i class="fa-regular fa-clock text-accent me-2"></i>
                                <strong>Opening Hours:</strong><br>
                                <span class="ps-4 d-block">{!! nl2br(e($general->business_hours)) !!}</span>
                            </p>
                        @endif

                        @if(filled($mainPhone))
                            <p class="mb-2 text-accent-peach">
                                <i class="fa-solid fa-phone text-accent me-2"></i>
                                <strong>Ordering Inquiries:</strong><br>
                                <span class="ps-4 d-block">
                                    <a href="tel:{{ \App\Models\Outlet::telNumber($mainPhone) }}"
                                        class="footer-link">{{ $mainPhone }}</a>
                                </span>
                            </p>
                        @endif

                        @if(filled($mainWhatsapp))
                            <p class="mb-2 text-accent-peach">
                                <i class="fa-brands fa-whatsapp text-accent me-2"></i>
                                <strong>Franchise & Catering:</strong><br>
                                <span class="ps-4 d-block">
                                    <a href="{{ $general->whatsapp_url }}" target="_blank" rel="noopener noreferrer"
                                        class="footer-link">{{ $mainWhatsapp }}</a>
                                </span>
                            </p>
                        @endif

                        @if(filled($contactEmail))
                            <p class="mb-3 text-accent-peach">
                                <i class="fa-solid fa-envelope text-accent me-2"></i>
                                <strong>Franchise & Support:</strong><br>
                                <span class="ps-4 d-block">
                                    <a href="mailto:{{ $contactEmail }}" class="footer-link">{{ $contactEmail }}</a>
                                </span>
                            </p>
                        @endif

                        <a href="{{ route('franchise') }}" class="btn btn-gold-outline btn-sm magnetic-btn">Franchise
                            Inquiry</a>
                    </div>
                </div>

            </div>

            <!-- Social Connections Bar -->
            <div
                class="d-flex justify-content-between align-items-center flex-wrap pt-4 border-top border-accent-subtle">
                @if($socials->isNotEmpty())
                    <div class="footer-social-wrapper mb-3 mb-md-0 d-flex align-items-center gap-3">
                        <span class="font-display text-accent me-2" style="font-size: 0.95rem;">Connect With Us:</span>
                        <div class="footer-socials d-flex flex-row align-items-center gap-2 m-0 p-0">
                            @foreach($socials as $social)
                                <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                                    class="footer-social-link" aria-label="{{ $social['label'] }}">
                                    <i class="{{ $social['icon'] }}"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <ul class="footer-nav m-0 p-0 d-flex flex-wrap gap-3 gap-md-4 justify-content-center list-unstyled">
                    <li><a href="{{ route('home') }}" class="footer-nav-link">Home</a></li>
                    <li><a href="{{ route('our-story') }}" class="footer-nav-link">Our Legacy</a></li>
                    <li><a href="{{ route('signature-dishes') }}" class="footer-nav-link">Signature Dishes</a></li>
                    <li><a href="{{ route('menu') }}" class="footer-nav-link">Menu</a></li>
                    <li><a href="{{ route('our-outlets') }}" class="footer-nav-link">Our Outlets</a></li>
                    <li><a href="{{ route('image-gallery') }}" class="footer-nav-link">Gallery</a></li>
                    <li><a href="{{ route('video-gallery') }}" class="footer-nav-link">Videos</a></li>
                    <li><a href="{{ route('faq') }}" class="footer-nav-link">FAQ</a></li>
                    <li><a href="{{ route('contact') }}" class="footer-nav-link">Contact</a></li>
                </ul>
            </div>

            @if(filled($general->footer_copyright))
                <div class="footer-divider my-4"></div>

                <div class="text-center w-100">
                    <p class="footer-copyright text-center mx-auto mb-0 pb-2"
                        style="max-width: 700px; text-align: center !important;">
                        {!! nl2br(e($general->footer_copyright)) !!}
                    </p>
                </div>
            @endif
        </div>
    </footer>

    <!-- GSAP & Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="{{ asset('assets/js/animations.js')}}" defer></script>
    <script src="{{ asset('assets/js/main.js')}}" defer></script>

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
                        @foreach($navOutlets as $outlet)
                            <div class="outlet-modal-card">
                                <div class="outlet-modal-info">
                                    <div class="outlet-badges-row">
                                        <span class="outlet-modal-badge">
                                            <i class="{{ $outlet->badge_icon }} text-accent"></i>
                                            {{ $outlet->badge_text ?: 'Wahid Biryani Outlet' }}
                                        </span>
                                        <span class="outlet-status-pill"><i class="fa-solid fa-circle-dot"></i> Open
                                            Now</span>
                                    </div>
                                    <h4 class="outlet-modal-name">{{ $outlet->name }}</h4>
                                    <p class="outlet-modal-addr">
                                        <i class="fa-solid fa-location-dot text-accent me-1"></i> {{ $outlet->address }}
                                    </p>
                                    <div class="outlet-modal-meta">
                                        @if($outlet->timings)
                                            <span><i class="fa-solid fa-clock text-accent me-1"></i>
                                                {{ $outlet->timings }}</span>
                                        @endif
                                        @if(count($outlet->phone_list))
                                            <span><i class="fa-solid fa-phone text-accent me-1"></i>
                                                @foreach($outlet->phone_list as $phone)
                                                    <a href="{{ $phone['href'] }}"
                                                        class="text-muted text-decoration-none hover-text-accent">{{ $phone['label'] }}</a>@if(!$loop->last), @endif
                                                @endforeach
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="outlet-modal-actions">
                                    @if($outlet->swiggy_url)
                                        <a href="{{ $outlet->swiggy_url }}" target="_blank" rel="noopener noreferrer"
                                            class="btn btn-swiggy-modal" title="Order on Swiggy">
                                            <i class="fa-solid fa-bag-shopping"></i> Swiggy
                                        </a>
                                    @endif
                                    @if($outlet->zomato_url)
                                        <a href="{{ $outlet->zomato_url }}" target="_blank" rel="noopener noreferrer"
                                            class="btn btn-zomato-modal" title="Order on Zomato">
                                            <i class="fa-solid fa-bag-shopping"></i> Zomato
                                        </a>
                                    @endif

                                    {{-- No Swiggy / Zomato: show Call Now --}}
                                    @if(!$outlet->swiggy_url && !$outlet->zomato_url && $outlet->primary_phone_href)
                                        <a href="{{ $outlet->primary_phone_href }}" class="btn btn-callnow-outlet"
                                            title="Call Now"
                                            style="display:inline-flex !important; align-items:center !important; justify-content:center !important; gap:8px !important; position:static !important; width:auto !important; height:auto !important; min-height:44px !important; padding:10px 20px !important; margin:0 !important; font-size:15px !important; font-weight:700 !important; line-height:1.2 !important; letter-spacing:0 !important; text-transform:none !important; color:#333333 !important; background:#e9ecef !important; border:1px solid #d0d4d9 !important; border-radius:8px !important; box-shadow:0 4px 10px rgba(0,0,0,0.08) !important; text-decoration:none !important; white-space:nowrap !important; flex:0 0 auto !important; transform:none !important;">
                                            <i class="fa-solid fa-phone"
                                                style="color:#333333 !important; margin:0 !important; font-size:14px !important; width:auto !important; height:auto !important; background:transparent !important;"></i>
                                            Call Now
                                        </a>
                                    @endif

                                    @if($outlet->whatsapp_order_url)
                                        <a href="{{ $outlet->whatsapp_order_url }}" target="_blank" rel="noopener noreferrer"
                                            class="btn btn-whatsapp-modal" title="WhatsApp Order">
                                            <i class="fa-brands fa-whatsapp"></i> WhatsApp
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Modal Footer -->
                <div
                    class="modal-footer royal-modal-footer justify-content-between border-0 px-4 py-3 bg-light-subtle rounded-bottom-4">
                    <span class="small text-muted"><i class="fa-solid fa-truck-fast text-accent me-1"></i> Home Delivery
                        Available Across Lucknow</span>
                    <a href="{{ route('menu') }}"
                        class="small text-primary fw-bold text-decoration-none hover-text-accent"
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