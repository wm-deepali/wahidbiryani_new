@extends('layouts.app')

@section('body_class', 'page-feedback')

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
                            <li class="active text-primary" style="color: var(--color-primary) !important;">Feedback &amp;
                                Suggestions</li>
                        </ul>
                    </div>
                </nav>

                <span class="urdu-accent reveal-up text-accent">آپ کی رائے</span>
                <h1 class="section-title split-words text-primary" style="font-size: clamp(2.5rem, 4vw, 3.75rem);">Feedback
                    &amp; Suggestions</h1>
                <p class="section-desc reveal-up mx-auto text-dark" style="max-width: 600px; opacity: 0.85;">Your thoughts
                    help us perfect our royal craft. Let us know about your dining experience and service.</p>

                <div class="hero-ornament reveal-up" style="opacity: 1; transform: none; margin-top: 30px;">
                    <svg width="220" height="20" viewBox="0 0 220 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="ornament-line" d="M10 10H100C105 5 110 1 110 1C110 1 115 5 120 10H210" stroke="#C49A45"
                            stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding position-relative bg-ivory" style="padding-top: 50px;">
        <!-- Rumi Darwaza Subtle Background -->
        <div class="rumi-gate-watermark-wrapper"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.05; pointer-events: none; z-index: 0; display: flex; align-items: center; justify-content: center; overflow: hidden;">
            <img src="{{ asset('assets/img/rumi_gate_golden.png') }}" alt="" style="max-height: 80%; width: auto;">
        </div>

        <div class="container position-relative" style="z-index: 2;">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-lg-8">
                    <div class="feedback-card p-4 p-md-5 rounded-4 position-relative">
                        <!-- Corner Ornaments -->
                        <div class="corner-ornament corner-tl"></div>
                        <div class="corner-ornament corner-tr"></div>
                        <div class="corner-ornament corner-bl"></div>
                        <div class="corner-ornament corner-br"></div>

                        <div class="text-center mb-5">
                            <h3 class="font-display text-primary" style="font-size: 2rem;">Write to Us</h3>
                            <p class="font-body text-dark opacity-75">Fill in the details below to share your experience
                                with the Darbar.</p>
                        </div>

                        <form id="feedbackForm" action="{{ route('feedback.submit') }}" method="POST" novalidate>
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="contact-form-group mb-0">
                                        <input type="text" id="fbName" name="name" class="contact-form-input"
                                            placeholder=" " required>
                                        <label for="fbName" class="contact-form-label">Full Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-group mb-0">
                                        <input type="tel" id="fbPhone" name="phone" class="contact-form-input"
                                            placeholder=" " required>
                                        <label for="fbPhone" class="contact-form-label">Mobile Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-group mb-0">
                                        <input type="email" id="fbEmail" name="email" class="contact-form-input"
                                            placeholder=" " required>
                                        <label for="fbEmail" class="contact-form-label">Email Address</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-form-group mb-0">
                                        <select id="fbBranch" name="branch" class="contact-form-input"
                                            style="padding-top: 16px;" required>
                                            <option value="" disabled selected></option>
                                            @foreach($outlets as $outlet)
                                                <option value="{{ $outlet->name }}">{{ $outlet->name }}</option>
                                            @endforeach
                                            <option value="General Website/Other">General Website/Other</option>
                                        </select>
                                        <label for="fbBranch" class="contact-form-label"
                                            style="top: -12px; font-size: 0.7rem; color: var(--color-accent); font-weight: 600;">Which
                                            outlet did you visit?</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="contact-form-group mb-0">
                                        <textarea id="fbMessage" name="message" class="contact-form-input" rows="5"
                                            placeholder=" " required></textarea>
                                        <label for="fbMessage" class="contact-form-label">Your Feedback /
                                            Suggestions</label>
                                    </div>
                                </div>
                                <div class="col-12 mt-4 text-center">
                                    <button type="submit"
                                        class="btn btn-burgundy-fill py-3 px-5 magnetic-btn text-uppercase tracking-wider fw-bold rounded-3">Submit
                                        Feedback</button>
                                </div>
                            </div>
                        </form>

                        <!-- Success Message -->
                        <div id="feedbackSuccess" class="text-center py-4" style="display: none;">
                            <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="35" cy="35" r="33" stroke="#C49A45" stroke-width="2" />
                                <path d="M22 35L31 44L48 25" stroke="#C49A45" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <h2 class="font-display text-primary mt-3">Shukriya.</h2>
                            <p class="font-body text-dark opacity-75 mb-0">Thank you for sharing your thoughts with the
                                Wahid Biryani darbar. Your feedback has been recorded.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.ajax-form-script', ['formId' => 'feedbackForm', 'successId' => 'feedbackSuccess'])

@endsection