@extends('layouts.admin-app')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    /* ── Theme: taken from the website's home.css ── */
    :root {
        --brand: #457c10;
        --brand-light: #8cc63f;
        --brand-pale: #d4ec9a;
        --brand-teal: #2f9e6e;
        --brand-dark: #0e1a09;
        --brand-dark-2: #16260d;
        --brand-soft: #f4f8ee;
        --text: #202223;
        --muted: #6d7175;
        --border: #e3e5e8;
        --font: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }

    /* This page is only the card: hide the default Laravel navbar */
    .navbar { display: none !important; }
    main.py-4 { padding: 0 !important; }

    body {
        font-family: var(--font);
        background:
            radial-gradient(circle at 12% 18%, rgba(140, 198, 63, .35), transparent 45%),
            radial-gradient(circle at 88% 82%, rgba(47, 158, 110, .28), transparent 45%),
            linear-gradient(160deg, var(--brand-dark) 0%, var(--brand-dark-2) 55%, var(--brand) 140%);
        background-attachment: fixed;
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px 16px;
    }

    .login-card {
        width: 100%;
        max-width: 940px;
        display: flex;
        border-radius: 24px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 30px 70px rgba(5, 12, 3, .45);
    }

    /* ── Left brand panel ── */
    .login-left {
        position: relative;
        width: 45%;
        padding: 48px 28px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
        background: linear-gradient(160deg, var(--brand-dark) 0%, var(--brand-dark-2) 45%, var(--brand) 130%);
        overflow: hidden;
    }

    .login-left::before,
    .login-left::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        filter: blur(40px);
    }

    .login-left::before {
        width: 260px; height: 260px;
        top: -90px; right: -90px;
        background: rgba(140, 198, 63, .35);
    }

    .login-left::after {
        width: 220px; height: 220px;
        bottom: -80px; left: -80px;
        background: rgba(47, 158, 110, .35);
    }

    .login-left > * { position: relative; z-index: 1; }

    .logo-box {
        background: #fff;
        padding: 14px 18px;
        border-radius: 16px;
        display: inline-block;
        margin-bottom: 22px;
        box-shadow: 0 10px 28px rgba(0, 0, 0, .25);
    }

    .logo-box img {
        display: block;
        width: 140px;
        height: auto;
        max-height: 80px;
        object-fit: contain;
    }

    .login-left h2 {
        font-size: 22px;
        font-weight: 700;
        margin: 0 0 8px;
        color: #fff;
    }

    .login-left p {
        font-size: 14px;
        margin: 0;
        color: rgba(255, 255, 255, .7);
    }

    /* ── Right form panel ── */
    .login-right {
        width: 55%;
        padding: 48px 44px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .login-eyebrow {
        display: inline-block;
        align-self: flex-start;
        margin: 0 0 12px;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: var(--brand);
        background: var(--brand-soft);
        border: 1px solid rgba(69, 124, 16, .18);
    }

    .login-title {
        font-size: 28px;
        font-weight: 800;
        color: var(--text);
        margin: 0 0 6px;
    }

    .login-sub {
        font-size: 13.5px;
        color: var(--muted);
        margin: 0 0 28px;
    }

    .field { margin-bottom: 18px; }

    .field label {
        display: block;
        font-size: 13px;
        font-weight: 500;
        color: var(--text);
        margin-bottom: 6px;
    }

    .field .form-control {
        width: 100%;
        height: 48px;
        padding: 0 16px;
        font-family: var(--font);
        font-size: 14px;
        color: var(--text);
        background: #f9faf7;
        border: 1.5px solid var(--border);
        border-radius: 12px;
        transition: border-color .15s, box-shadow .15s, background .15s;
    }

    .field .form-control:focus {
        outline: none;
        background: #fff;
        border-color: var(--brand);
        box-shadow: 0 0 0 4px rgba(69, 124, 16, .14);
    }

    .field .form-control.is-invalid {
        border-color: #d92d20;
        background-image: none;
    }

    .pw-wrap { position: relative; }
    .pw-wrap .form-control { padding-right: 64px; }

    .pw-toggle {
        position: absolute;
        top: 50%;
        right: 8px;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        padding: 6px 10px;
        font-family: var(--font);
        font-size: 12px;
        font-weight: 600;
        color: var(--brand);
        cursor: pointer;
        border-radius: 8px;
    }

    .pw-toggle:hover { background: var(--brand-soft); }

    .field-error {
        display: block;
        margin-top: 6px;
        font-size: 12.5px;
        font-weight: 500;
        color: #d92d20;
    }

    .login-options {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 8px;
        margin: 4px 0 24px;
    }

    .login-options .form-check { margin: 0; padding-left: 1.5rem; }

    .form-check-label {
        font-size: 13px;
        color: var(--muted);
        cursor: pointer;
    }

    .form-check-input { accent-color: var(--brand); cursor: pointer; }

    .forgot-link {
        font-size: 13px;
        font-weight: 500;
        color: var(--brand);
        text-decoration: none;
    }

    .forgot-link:hover { text-decoration: underline; }

    .btn-login {
        width: 100%;
        height: 50px;
        border: none;
        border-radius: 50px;
        font-family: var(--font);
        font-size: 15px;
        font-weight: 600;
        color: #fff;
        background: linear-gradient(135deg, var(--brand) 0%, var(--brand-teal) 100%);
        box-shadow: 0 12px 24px rgba(69, 124, 16, .32);
        cursor: pointer;
        transition: transform .15s, box-shadow .15s;
    }

    .btn-login:hover {
        transform: translateY(-1px);
        box-shadow: 0 16px 30px rgba(69, 124, 16, .4);
    }

    .btn-login:active { transform: translateY(0); }

    /* ── Mobile ── */
    @media (max-width: 768px) {
        .login-card { flex-direction: column; max-width: 460px; }

        .login-left,
        .login-right { width: 100%; }

        .login-left { padding: 32px 20px; }
        .logo-box img { width: 110px; }
        .login-right { padding: 32px 24px; }
        .login-title { font-size: 24px; }
    }
</style>

@php
    $siteName = $general->site_name ?: config('app.name');
@endphp

<div class="login-wrapper">
    <div class="login-card">

        <!-- LEFT SIDE -->
        <div class="login-left">
            <div class="logo-box">
                <img src="{{ $general->admin_login_logo_url }}" alt="{{ $siteName }}">
            </div>

            <h2>{{ $siteName }}</h2>
            @if (filled($general->tagline))
                <p>{{ $general->tagline }}</p>
            @endif
        </div>

        <!-- RIGHT SIDE -->
        <div class="login-right">
            <span class="login-eyebrow">Admin Panel</span>
            <h4 class="login-title">Welcome back</h4>
            <p class="login-sub">Sign in to manage your website.</p>

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <!-- EMAIL -->
                <div class="field">
                    <label for="email">Email Address</label>
                    <input id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}"
                        autocomplete="email" required autofocus>

                    @error('email')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- PASSWORD -->
                <div class="field">
                    <label for="password">Password</label>
                    <div class="pw-wrap">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password" autocomplete="current-password" required>
                        <button type="button" class="pw-toggle" id="pwToggle" aria-label="Show password">Show</button>
                    </div>

                    @error('password')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- REMEMBER -->
                <div class="login-options">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                            name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- BUTTON -->
                <button type="submit" class="btn-login">Login</button>

            </form>
        </div>

    </div>
</div>

<script>
    (function () {
        var btn = document.getElementById('pwToggle');
        var input = document.getElementById('password');

        if (!btn || !input) return;

        btn.addEventListener('click', function () {
            var show = input.type === 'password';
            input.type = show ? 'text' : 'password';
            btn.textContent = show ? 'Hide' : 'Show';
            btn.setAttribute('aria-label', show ? 'Hide password' : 'Show password');
        });
    })();
</script>

@endsection