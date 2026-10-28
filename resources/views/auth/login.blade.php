@extends('layouts.admin-app')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    /* ── Theme: same palette as the website (style.css) ── */
    :root {
        --primary: #123F32;        /* Lucknowi Heritage Green */
        --secondary: #1D5946;      /* Awadhi Deep Green */
        --deep: #0c251e;
        --mid: #154537;
        --ivory: #F4EBD7;          /* Dastarkhwan Ivory */
        --cream: #FBF7EC;          /* Dastarkhwan Cream */
        --gold: #C49A45;           /* Antique Awadhi Gold */
        --peach: #DDBB9A;
        --red: #8B1E1E;            /* Lucknowi Burgundy */
        --text: #292A24;
        --muted: #6b6d63;
        --border: rgba(196, 154, 69, .35);
        --font-display: 'Cormorant Garamond', serif;
        --font-body: 'Manrope', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }

    /* This page is only the card: hide the default Laravel navbar */
    .navbar { display: none !important; }
    main.py-4 { padding: 0 !important; }

    body {
        font-family: var(--font-body);
        background-color: var(--deep);
        background-image:
            url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23c49a45' fill-opacity='0.05' fill-rule='evenodd'%3E%3Cpath d='M0 20L20 0L40 20L20 40zM20 5L35 20L20 35L5 20z'/%3E%3C/g%3E%3C/svg%3E"),
            radial-gradient(circle at center, var(--mid) 0%, var(--deep) 100%);
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
        background: var(--cream);
        border: 1px solid var(--gold);
        box-shadow: 0 30px 70px rgba(0, 0, 0, .5), 0 0 30px rgba(196, 154, 69, .15);
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
        background: radial-gradient(circle at center, var(--mid) 0%, var(--deep) 100%);
        border-right: 1px solid var(--gold);
        overflow: hidden;
    }

    /* gold jaali pattern */
    .login-left::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23c49a45' fill-opacity='0.07' fill-rule='evenodd'%3E%3Cpath d='M0 20L20 0L40 20L20 40zM20 5L35 20L20 35L5 20z'/%3E%3C/g%3E%3C/svg%3E");
        pointer-events: none;
    }

    /* gold dashed trim at the top, like the site sections */
    .login-left::after {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 5px;
        background: repeating-linear-gradient(90deg, var(--gold) 0, var(--gold) 4px, transparent 4px, transparent 8px);
        opacity: .6;
    }

    .login-left > * { position: relative; z-index: 1; }

    .logo-box {
        background: rgba(255, 255, 255, .96);
        padding: 12px 20px;
        border-radius: 8px;
        border: 1px solid rgba(196, 154, 69, .5);
        display: inline-block;
        margin-bottom: 22px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, .3), 0 0 14px rgba(196, 154, 69, .25);
    }

    .logo-box img {
        display: block;
        width: 140px;
        height: auto;
        max-height: 80px;
        object-fit: contain;
    }

    .login-left .ornament {
        display: block;
        margin: 0 auto 12px;
        opacity: .9;
    }

    .login-left h2 {
        font-family: var(--font-display);
        font-size: 30px;
        font-weight: 600;
        letter-spacing: .02em;
        margin: 0 0 8px;
        color: var(--ivory);
    }

    .login-left p {
        font-family: var(--font-display);
        font-size: 17px;
        font-style: italic;
        margin: 0;
        color: var(--gold);
    }

    /* ── Right form panel ── */
    .login-right {
        width: 55%;
        padding: 48px 44px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: var(--cream);
    }

    .login-eyebrow {
        display: inline-block;
        align-self: flex-start;
        margin: 0 0 12px;
        padding: 6px 16px;
        border-radius: 50px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .14em;
        text-transform: uppercase;
        color: var(--primary);
        background: rgba(196, 154, 69, .12);
        border: 1px solid var(--gold);
    }

    .login-title {
        font-family: var(--font-display);
        font-size: 38px;
        font-weight: 600;
        color: var(--primary);
        margin: 0 0 6px;
        line-height: 1.1;
    }

    .login-sub {
        font-size: 13.5px;
        color: var(--muted);
        margin: 0 0 28px;
    }

    .field { margin-bottom: 18px; }

    .field label {
        display: block;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .06em;
        text-transform: uppercase;
        color: var(--primary);
        margin-bottom: 6px;
    }

    .field .form-control {
        width: 100%;
        height: 48px;
        padding: 0 16px;
        font-family: var(--font-body);
        font-size: 14px;
        color: var(--text);
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 8px;
        transition: border-color .2s, box-shadow .2s;
    }

    .field .form-control:focus {
        outline: none;
        border-color: var(--gold);
        box-shadow: 0 0 0 4px rgba(196, 154, 69, .2);
    }

    .field .form-control.is-invalid {
        border-color: var(--red);
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
        font-family: var(--font-body);
        font-size: 12px;
        font-weight: 700;
        color: var(--primary);
        cursor: pointer;
        border-radius: 6px;
    }

    .pw-toggle:hover { background: rgba(196, 154, 69, .15); }

    .field-error {
        display: block;
        margin-top: 6px;
        font-size: 12.5px;
        font-weight: 600;
        color: var(--red);
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

    .form-check-input { accent-color: var(--primary); cursor: pointer; }

    .forgot-link {
        font-size: 13px;
        font-weight: 600;
        color: var(--primary);
        text-decoration: none;
    }

    .forgot-link:hover { color: var(--gold); }

    /* Burgundy button that fills green on hover, same as the site's .btn-burgundy-fill */
    .btn-login {
        position: relative;
        z-index: 1;
        overflow: hidden;
        width: 100%;
        height: 50px;
        border: 1px solid var(--red);
        border-radius: 6px;
        font-family: var(--font-body);
        font-size: 13px;
        font-weight: 700;
        letter-spacing: .15em;
        text-transform: uppercase;
        color: var(--cream);
        background: var(--red);
        box-shadow: 0 8px 20px rgba(139, 30, 30, .3);
        cursor: pointer;
        transition: border-color .4s, box-shadow .4s;
    }

    .btn-login::before {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 0;
        height: 100%;
        background: var(--primary);
        z-index: -1;
        transition: width .5s cubic-bezier(0.25, 1, 0.5, 1);
    }

    .btn-login:hover { border-color: var(--primary); }
    .btn-login:hover::before { width: 100%; }

    /* ── Mobile ── */
    @media (max-width: 768px) {
        .login-card { flex-direction: column; max-width: 460px; }

        .login-left,
        .login-right { width: 100%; }

        .login-left { padding: 32px 20px; border-right: none; border-bottom: 1px solid var(--gold); }
        .logo-box img { width: 110px; }
        .login-right { padding: 32px 24px; }
        .login-title { font-size: 32px; }
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

            <svg class="ornament" width="140" height="24" viewBox="0 0 140 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 23V15C10 15 18 8 35 8C48 8 58 3 70 1C82 3 92 8 105 8C122 8 130 15 130 23"
                    stroke="#C49A45" stroke-width="1.2" stroke-linecap="round" />
                <circle cx="70" cy="11" r="2" fill="#C49A45" />
            </svg>

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