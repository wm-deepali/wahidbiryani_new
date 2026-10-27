@extends('layouts.app')

@section('body_class', 'page-franchise')

@section('content')

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
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li class="separator">✦</li>
                            <li class="active text-primary" style="color: var(--color-primary) !important;">Franchise
                                Enquiry</li>
                        </ul>
                    </div>
                </nav>

                <span class="urdu-accent reveal-up text-accent">شراکت داری</span>
                <h1 class="section-title split-words text-primary" style="font-size: clamp(2.5rem, 4vw, 3.75rem);">Franchise
                    Opportunities</h1>
                <p class="section-desc reveal-up mx-auto text-dark" style="max-width: 600px; opacity: 0.85;">Partner with a
                    70-year-old culinary institution and bring the authentic royal taste of Awadh to your city.</p>

                <div class="hero-ornament reveal-up" style="opacity: 1; transform: none; margin-top: 30px;">
                    <svg width="220" height="20" viewBox="0 0 220 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="ornament-line" d="M10 10H100C105 5 110 1 110 1C110 1 115 5 120 10H210" stroke="#C49A45"
                            stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding bg-ivory" style="padding-top: 50px; padding-bottom: 80px;">
        <div class="container">
            <div class="row g-5 align-items-stretch">

                <!-- Left: Why Partner With Us -->
                <div class="col-lg-5">
                    <div class="h-100 d-flex flex-column justify-content-center pe-lg-4">
                        <span class="urdu-accent text-accent mb-2" style="font-size: 2rem;">وراثت</span>
                        <h2 class="font-display text-primary mb-4" style="font-size: 2.5rem;">Why Partner With The Legacy?
                        </h2>
                        <p class="font-body text-dark opacity-80 mb-5" style="font-size: 1.1rem; line-height: 1.8;">Wahid
                            Biryani isn't just a restaurant; it's a Lucknowi institution. By becoming a franchisee, you
                            inherit decades of trust, a fiercely loyal customer base, and the secret Dum-Pukht recipes
                            passed down through generations.</p>

                        <ul class="list-unstyled">
                            <li class="d-flex align-items-start mb-4">
                                <div class="icon-wrap mt-1 me-3 d-flex align-items-center justify-content-center rounded-circle"
                                    style="width: 40px; height: 40px; background: rgba(196,154,69,0.1); min-width: 40px;">
                                    <i class="fa-solid fa-crown text-accent"></i>
                                </div>
                                <div>
                                    <h4 class="font-display text-primary fs-5 mb-1">Established Brand Value</h4>
                                    <p class="font-body text-dark opacity-75 mb-0">Operating successfully since 1955 with a
                                        globally recognized reputation.</p>
                                </div>
                            </li>
                            <li class="d-flex align-items-start mb-4">
                                <div class="icon-wrap mt-1 me-3 d-flex align-items-center justify-content-center rounded-circle"
                                    style="width: 40px; height: 40px; background: rgba(196,154,69,0.1); min-width: 40px;">
                                    <i class="fa-solid fa-fire-burner text-accent"></i>
                                </div>
                                <div>
                                    <h4 class="font-display text-primary fs-5 mb-1">Standardized Operations</h4>
                                    <p class="font-body text-dark opacity-75 mb-0">We provide complete SOPs, training, and
                                        central kitchen spice blends.</p>
                                </div>
                            </li>
                            <li class="d-flex align-items-start mb-4">
                                <div class="icon-wrap mt-1 me-3 d-flex align-items-center justify-content-center rounded-circle"
                                    style="width: 40px; height: 40px; background: rgba(196,154,69,0.1); min-width: 40px;">
                                    <i class="fa-solid fa-chart-line text-accent"></i>
                                </div>
                                <div>
                                    <h4 class="font-display text-primary fs-5 mb-1">High ROI Model</h4>
                                    <p class="font-body text-dark opacity-75 mb-0">A proven business model optimized for
                                        both dine-in and high-volume delivery.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Right: Application Form (Mughal Arch) -->
                <div class="col-lg-7">
                    <div class="mughal-monument-arch p-4 p-md-5 mb-5 mt-4 mt-lg-0">
                        <div class="mughal-monument-arch-inner"></div>

                        <div class="text-center pt-4 mb-4 position-relative" style="z-index: 2;">
                            <div
                                class="d-inline-flex align-items-center justify-content-center bg-cream mb-2 rounded-circle franchise-icon-circle">
                                <i class="fa-solid fa-scroll text-accent fs-3"></i>
                            </div>
                            <h3 class="font-display text-primary mt-3" style="font-size: 2rem;">Franchise Application</h3>
                        </div>

                        <form id="franchiseForm" action="{{ route('franchise.submit') }}" method="POST"
                            class="position-relative" style="z-index: 2;" novalidate>
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="contact-form-group mb-0">
                                        <input type="text" id="frName" name="name" class="contact-form-input bg-transparent"
                                            placeholder=" " required>
                                        <label for="frName" class="contact-form-label bg-transparent">Full Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-group mb-0">
                                        <input type="tel" id="frPhone" name="phone"
                                            class="contact-form-input bg-transparent" placeholder=" " required>
                                        <label for="frPhone" class="contact-form-label bg-transparent">Mobile Number</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="contact-form-group mb-0">
                                        <input type="email" id="frEmail" name="email"
                                            class="contact-form-input bg-transparent" placeholder=" " required>
                                        <label for="frEmail" class="contact-form-label bg-transparent">Email Address</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-group mb-0">
                                        <input type="text" id="frCity" name="city" class="contact-form-input bg-transparent"
                                            placeholder=" " required>
                                        <label for="frCity" class="contact-form-label bg-transparent">Proposed City</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-group mb-0">
                                        <select id="frBudget" name="budget" class="contact-form-input bg-transparent"
                                            style="padding-top: 16px;" required>
                                            <option value="" disabled selected></option>
                                            <option value="15 - 25 Lakhs">15 - 25 Lakhs</option>
                                            <option value="25 - 50 Lakhs">25 - 50 Lakhs</option>
                                            <option value="50+ Lakhs">50+ Lakhs</option>
                                        </select>
                                        <label for="frBudget" class="contact-form-label bg-transparent"
                                            style="top: -12px; font-size: 0.7rem; color: var(--color-accent); font-weight: 600;">Investment
                                            Budget (INR)</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="contact-form-group mb-0">
                                        <textarea id="frMessage" name="message" class="contact-form-input bg-transparent"
                                            rows="3" placeholder=" " required></textarea>
                                        <label for="frMessage" class="contact-form-label bg-transparent">Brief Background /
                                            Experience</label>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit"
                                        class="btn btn-burgundy-fill py-3 px-5 magnetic-btn text-uppercase tracking-wider fw-bold rounded-3">Submit
                                        Application</button>
                                </div>
                            </div>
                        </form>

                        <!-- Success Message -->
                        <div id="franchiseSuccess" class="text-center py-4 position-relative" style="display: none; z-index: 2;">
                            <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="35" cy="35" r="33" stroke="#C49A45" stroke-width="2" />
                                <path d="M22 35L31 44L48 25" stroke="#C49A45" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <h2 class="font-display text-primary mt-3">Shukriya.</h2>
                            <p class="font-body text-dark opacity-75 mb-0">Your franchise application has been received.
                                Our director's office will get in touch with you shortly.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.ajax-form-script', ['formId' => 'franchiseForm', 'successId' => 'franchiseSuccess'])

@endsection