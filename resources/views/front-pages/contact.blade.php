@extends('layouts.app')

@section('body_class', 'contact-page')

@section('content')

    @php
        // Contact details come from the settings table
        $supportEmail = $settings->support_email ?? $settings->admin_email ?? null;
        $mainPhone    = $settings->phone ?? null;
        $mainWhatsapp = $settings->whatsapp ?? $mainPhone;
    @endphp

    <!-- Page Header -->
    <section class="section-padding text-center heritage-page-header position-relative overflow-hidden bg-ivory"
        style="padding-top: 180px;">

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
                            <li class="active text-primary" style="color: var(--color-primary) !important;">Contact Us</li>
                        </ul>
                    </div>
                </nav>

                <span class="urdu-accent reveal-up text-accent">خوش آمدید</span>
                <h1 class="section-title split-words text-primary" style="font-size: clamp(2.5rem, 4vw, 3.75rem);">Khush
                    Aamdeed</h1>
                <p class="section-desc reveal-up mx-auto text-dark" style="max-width: 600px; opacity: 0.85;">Step into a
                    Lucknowi mehfil. Connect with us for bookings, royal outdoor catering, or queries.</p>

                <div class="hero-ornament reveal-up" style="opacity: 1; transform: none; margin-top: 30px;">
                    <svg width="220" height="20" viewBox="0 0 220 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="ornament-line" d="M10 10H100C105 5 110 1 110 1C110 1 115 5 120 10H210" stroke="#C49A45"
                            stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact & Reservation Details -->
    <section class="section-padding bg-ivory" style="padding-top: 20px;">
        <div class="container">

            <!-- Centralised Support System -->
            @if($supportEmail || $mainPhone || $mainWhatsapp)
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="p-4 p-md-5 rounded-4 text-center position-relative overflow-hidden"
                            style="background: var(--color-primary); color: var(--color-bg-light); border: 2px solid var(--color-accent); box-shadow: 0 15px 35px rgba(0,0,0,0.15);">
                            <div class="position-absolute" style="top: -20px; right: -20px; opacity: 0.05;">
                                <svg width="150" height="150" viewBox="0 0 150 150" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="75" cy="75" r="75" />
                                </svg>
                            </div>
                            <h2 class="font-display mb-3 text-accent"
                                style="font-size: 2.5rem; position: relative; z-index: 2;">Centralised Support System</h2>
                            <p class="mb-4 mx-auto"
                                style="color: var(--color-bg-light); font-size: 1.1rem; opacity: 0.9; max-width: 600px; position: relative; z-index: 2;">
                                Reach out to us for feedback, all India franchise enquiries, or catering services.</p>
                            <div class="d-flex justify-content-center flex-wrap gap-3 gap-md-5 font-body position-relative"
                                style="font-size: 1.15rem; z-index: 2;">
                                @if($supportEmail)
                                    <div
                                        class="support-item d-flex align-items-center bg-dark bg-opacity-25 py-2 px-4 rounded-pill border border-accent-subtle transition-all">
                                        <i class="fa-solid fa-envelope text-accent me-3 fs-5"></i>
                                        <a href="mailto:{{ $supportEmail }}" class="text-decoration-none"
                                            style="color: var(--color-bg-light);">{{ $supportEmail }}</a>
                                    </div>
                                @endif
                                @if($mainPhone)
                                    <div
                                        class="support-item d-flex align-items-center bg-dark bg-opacity-25 py-2 px-4 rounded-pill border border-accent-subtle transition-all">
                                        <i class="fa-solid fa-phone text-accent me-3 fs-5"></i>
                                        <a href="tel:{{ \App\Models\Outlet::telNumber($mainPhone) }}" class="text-decoration-none"
                                            style="color: var(--color-bg-light);">{{ $mainPhone }}</a>
                                    </div>
                                @endif
                                @if($mainWhatsapp)
                                    <div
                                        class="support-item d-flex align-items-center bg-dark bg-opacity-25 py-2 px-4 rounded-pill border border-accent-subtle transition-all">
                                        <i class="fa-brands fa-whatsapp text-accent me-3 fs-5"></i>
                                        <a href="{{ \App\Models\Outlet::whatsappUrl($mainWhatsapp) }}" class="text-decoration-none"
                                            style="color: var(--color-bg-light);">{{ $mainWhatsapp }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row g-5">
                <!-- Branches Column -->
                <div class="col-lg-7">
                    <div class="d-flex align-items-center mb-4">
                        <h2 class="font-display text-primary m-0" style="font-size: 2rem;">Our Outlets</h2>
                        <div class="ms-4 flex-grow-1 border-top border-accent" style="opacity: 0.3;"></div>
                    </div>

                    @forelse($outlets as $outlet)
                        @php $outletEmail = $outlet->email ?: $supportEmail; @endphp

                        <div class="branch-card mb-5 p-4 rounded-4 position-relative transition-all"
                            style="background: #ffffff; border: 1px solid rgba(196,154,69,{{ $loop->first ? '0.4' : '0.25' }}); box-shadow: 0 10px 30px rgba(0,0,0,{{ $loop->first ? '0.04' : '0.02' }});">

                            @if($loop->first)
                                <div class="position-absolute top-0 end-0 px-4 py-1"
                                    style="background: var(--color-accent); color: var(--color-primary); font-size: 0.85rem; font-weight: 700; letter-spacing: 1px; border-bottom-left-radius: 12px; border-top-right-radius: 12px;">
                                    OUTLET</div>
                            @else
                                <div class="position-absolute top-0 end-0 px-4 py-1"
                                    style="background: rgba(196,154,69,0.15); color: var(--color-primary); border: 1px solid var(--color-accent); font-size: 0.85rem; font-weight: 700; letter-spacing: 1px; border-bottom-left-radius: 12px; border-top-right-radius: 12px; border-top: none; border-right: none;">
                                    OUTLET</div>
                            @endif

                            <h3 class="font-display text-primary mb-4" style="font-size: 1.6rem; padding-top: 10px;">
                                {{ $outlet->name }}</h3>

                            <div class="row g-4 align-items-center mb-4">
                                <div class="col-md-7 font-body">
                                    <div class="d-flex align-items-start mb-3">
                                        <div class="icon-wrap mt-1 me-3 d-flex align-items-center justify-content-center rounded-circle"
                                            style="width: 32px; height: 32px; background: rgba(196,154,69,0.1); min-width: 32px;">
                                            <i class="fa-solid fa-location-dot text-accent fs-6"></i>
                                        </div>
                                        <p class="mb-0 text-dark opacity-75" style="line-height: 1.5;">{{ $outlet->address }}</p>
                                    </div>

                                    @if($outletEmail)
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="icon-wrap me-3 d-flex align-items-center justify-content-center rounded-circle"
                                                style="width: 32px; height: 32px; background: rgba(196,154,69,0.1); min-width: 32px;">
                                                <i class="fa-solid fa-envelope text-accent fs-6"></i>
                                            </div>
                                            <a href="mailto:{{ $outletEmail }}"
                                                class="text-dark text-decoration-none fw-medium opacity-75 hover-text-accent">{{ $outletEmail }}</a>
                                        </div>
                                    @endif

                                    @if(count($outlet->phone_list))
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="icon-wrap me-3 d-flex align-items-center justify-content-center rounded-circle"
                                                style="width: 32px; height: 32px; background: rgba(196,154,69,0.1); min-width: 32px;">
                                                <i class="fa-solid fa-phone text-accent fs-6"></i>
                                            </div>
                                            <span class="text-dark fw-medium opacity-75">
                                                @foreach($outlet->phone_list as $phone)
                                                    <a href="{{ $phone['href'] }}"
                                                        class="text-dark text-decoration-none hover-text-accent">{{ $phone['label'] }}</a>@if(!$loop->last), @endif
                                                @endforeach
                                            </span>
                                        </div>
                                    @endif

                                    @if($outlet->whatsapp_url)
                                        <div class="d-flex align-items-center">
                                            <div class="icon-wrap me-3 d-flex align-items-center justify-content-center rounded-circle"
                                                style="width: 32px; height: 32px; background: rgba(196,154,69,0.1); min-width: 32px;">
                                                <i class="fa-brands fa-whatsapp text-accent fs-6"></i>
                                            </div>
                                            <a href="{{ $outlet->whatsapp_url }}"
                                                class="text-dark text-decoration-none fw-medium opacity-75 hover-text-accent">{{ $outlet->whatsapp }}</a>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-5">
                                    @if($outlet->map_url)
                                        <div class="map-container p-1 rounded-3"
                                            style="border: 1px dashed {{ $loop->first ? 'var(--color-accent)' : 'rgba(196,154,69,0.5)' }};">
                                            <iframe class="w-100 rounded-3 border-0" style="height: 160px;"
                                                src="{{ $outlet->map_url }}" allowfullscreen="" loading="lazy"
                                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#orderOnlineModal"
                                class="btn btn-burgundy-fill w-100 py-3 magnetic-btn text-uppercase tracking-wider fw-bold rounded-3">Order
                                Food Online</a>
                        </div>
                    @empty
                        <p class="text-dark opacity-75">Our outlet details will be available soon.</p>
                    @endforelse
                </div>

                <!-- Form Column -->
                <div class="col-lg-5">
                    <div class="contact-form-panel sticky-lg-top" style="top: 100px; z-index: 10;">

                        <form id="heritageContactForm" action="{{ route('contact.submit') }}" method="POST" novalidate>
                            @csrf
                            <h3 class="font-display text-primary mb-4" style="font-size: 1.85rem;">Reserve a Spot / Inquiry
                            </h3>

                            <div class="contact-form-group">
                                <input type="text" id="contactName" name="name" class="contact-form-input" placeholder=" "
                                    required>
                                <label for="contactName" class="contact-form-label">Aapka Naam (Full Name)</label>
                            </div>

                            <div class="contact-form-group">
                                <input type="email" id="contactEmail" name="email" class="contact-form-input"
                                    placeholder=" " required>
                                <label for="contactEmail" class="contact-form-label">Email Address</label>
                            </div>

                            <div class="contact-form-group">
                                <input type="tel" id="contactPhone" name="phone" class="contact-form-input" placeholder=" "
                                    required>
                                <label for="contactPhone" class="contact-form-label">Mobile Number</label>
                            </div>

                            <div class="contact-form-group">
                                <select id="contactRequest" name="request" class="contact-form-input"
                                    style="padding-top: 16px;" required>
                                    <option value="" disabled selected></option>
                                    <option value="Dine-in Table Reservation">Dine-in Table Reservation</option>
                                    <option value="Outdoor Shahi Catering">Outdoor Shahi Catering</option>
                                    <option value="General Inquiry & Feedback">General Inquiry & Feedback</option>
                                </select>
                                <label for="contactRequest" class="contact-form-label"
                                    style="top: -12px; font-size: 0.7rem; color: var(--color-accent); font-weight: 600;">How
                                    may we serve you?</label>
                            </div>

                            <div class="contact-form-group">
                                <textarea id="contactMessage" name="message" class="contact-form-input" rows="4"
                                    placeholder=" " required></textarea>
                                <label for="contactMessage" class="contact-form-label">Message / Details of Inquiry</label>
                            </div>

                            <button type="submit" id="contactSubmitBtn"
                                class="btn btn-burgundy-fill w-100 py-3 mt-3 magnetic-btn">Send Message</button>
                        </form>

                        <!-- Fallback success block (used only if no thank-you redirect comes back) -->
                        <div id="formSuccessBlock" class="form-success-wrapper">
                            <div class="form-success-icon">
                                <svg width="70" height="70" viewBox="0 0 70 70" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="35" cy="35" r="33" stroke="#C49A45" stroke-width="2" />
                                    <path d="M22 35L31 44L48 25" stroke="#C49A45" stroke-width="3" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <h2 class="form-success-title">Shukriya.</h2>
                            <p class="form-success-desc">Thank you for writing to the Wahid Biryani darbar. Your message has
                                been recorded and our team will get in touch with you shortly.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Same shared submit script as the feedback and franchise pages: validates, posts, then goes to /thank-you --}}
    @include('partials.ajax-form-script', ['formId' => 'heritageContactForm', 'successId' => 'formSuccessBlock'])

@endsection