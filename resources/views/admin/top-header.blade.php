{{-- Destination: resources/views/admin/top-header.blade.php --}}
@php
    $siteName = $general->site_name ?: config('app.name');
    $adminUser = auth()->user();
    $adminName = $adminUser?->name ?? 'Admin';
    $adminInitial = \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($adminName, 0, 1));

    // New (unattended) leads for the bell badge
    $newLeads = \App\Models\ContactEnquiry::where('status', 'new')->count()
        + \App\Models\PackageEnquiry::where('status', 'new')->count()
        + \App\Models\KnowledgeBaseEnquiry::where('status', 'new')->count();
@endphp
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="robots" content="noindex, nofollow">
  <meta name="description" content="{{ $siteName }} admin panel">
  <meta name="author" content="{{ $siteName }}">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Admin Dashboard | {{ $siteName }}</title>

  @if ($general->favicon_url)
      <link rel="icon" href="{{ $general->favicon_url }}">
      <link rel="shortcut icon" href="{{ $general->favicon_url }}">
  @endif

  <!-- VENDOR CSS — exact same order as original -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/datatable.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.10.4/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/custom/css/header.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/custom/css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
/* ════════════════════════════════════════════════════
   BASE — only safe overrides that won't break header.js
════════════════════════════════════════════════════ */
body {
    font-family: 'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;
    background: #f1f2f4;
}
/* Keep existing layout intact — these are the same values the original had */
.main-section { display: flex !important; }
.main-section #cssmenu { width: 280px !important; min-width: 280px !important; flex-shrink: 0 !important; }
.main-section .app-content { flex: 1 !important; min-width: 0 !important; }
/* ════════════════════════════════════════════════════
   TOP HEADER
════════════════════════════════════════════════════ */
.top-header-sec {
    background: #1e2761 !important;
    border-bottom: 1px solid rgba(255,255,255,.07) !important;
    padding: 0 !important;
    margin-bottom: 0 !important;
    position: sticky !important;
    top: 0 !important;
    z-index: 1030 !important;
    box-shadow: 0 2px 8px rgba(0,0,0,.2) !important;
}
.top-main-header {
    height: 56px;
    padding: 0 20px;
    display: flex;
    align-items: center;
    gap: 12px;
}
/* ── Logo ── */
.admin-logo {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
    text-decoration: none;
}
.admin-logo img {
    height: 32px;
    width: auto;
    object-fit: contain;
    filter: brightness(0) invert(1);
}
.admin-logo-text {
    display: flex;
    flex-direction: column;
    line-height: 1.25;
}
.admin-logo-brand {
    font-size: 13.5px;
    font-weight: 700;
    color: #fff;
    letter-spacing: .01em;
}
.admin-logo-sub {
    font-size: 9.5px;
    color: rgba(255,255,255,.45);
    text-transform: uppercase;
    letter-spacing: .07em;
    font-weight: 500;
}
/* ── Spacer ── */
.th-push { flex: 1 1 auto; }
/* ── Right icon buttons ── */
.th-icon-btn {
    position: relative;
    width: 36px;
    height: 36px;
    border-radius: 8px;
    border: none;
    background: transparent;
    color: rgba(255,255,255,.6);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    cursor: pointer;
    transition: background .14s, color .14s;
    text-decoration: none;
    flex-shrink: 0;
}
.th-icon-btn:hover { background: rgba(255,255,255,.1); color: #fff; text-decoration: none; }
.th-icon-btn .th-dot {
    position: absolute;
    top: 3px; right: 1px;
    min-width: 17px; height: 17px;
    padding: 0 4px;
    border-radius: 9px;
    background: #ef4444;
    color: #fff;
    font-size: 9px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #1e2761;
    box-sizing: content-box;
}
/* ── User button ── */
.th-user-wrap {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,.08);
    border: 1px solid rgba(255,255,255,.14);
    border-radius: 9px;
    padding: 5px 11px 5px 5px;
    cursor: pointer;
    transition: background .14s, border-color .14s;
    color: #fff;
    text-decoration: none;
    flex-shrink: 0;
}
.th-user-wrap:hover { background: rgba(255,255,255,.14); border-color: rgba(255,255,255,.22); color: #fff; text-decoration: none; }
.th-avatar {
    width: 28px; height: 28px;
    border-radius: 7px;
    background: linear-gradient(135deg, #6366f1, #818cf8);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 700;
    color: #fff;
    flex-shrink: 0;
    letter-spacing: -.2px;
}
.th-uname  { font-size: 12.5px; font-weight: 650; color: #fff; line-height: 1.2; }
.th-caret  { font-size: 9px;    color: rgba(255,255,255,.35); margin-left: 2px; }
/* ── Remove Bootstrap default dropdown arrow on toggle btn ── */
.btn-group > .th-user-wrap::after { display: none; }
.btn.bg-transparent { padding: 0 !important; border: none !important; background: transparent !important; box-shadow: none !important; }
.btn.bg-transparent::after { display: none !important; }
/* ── Dropdown menu ── */
.header-dropdown.dropdown-menu {
    min-width: 175px !important;
    border: 1px solid #e3e5e8 !important;
    border-radius: 10px !important;
    box-shadow: 0 8px 24px rgba(0,0,0,.13) !important;
    padding: 6px !important;
    margin-top: 6px !important;
    background: #fff !important;
}
.header-dropdown .dropdown-item {
    display: flex !important;
    align-items: center !important;
    gap: 9px !important;
    padding: 9px 12px !important;
    border-radius: 7px !important;
    font-size: 13px !important;
    font-weight: 500 !important;
    color: #202223 !important;
    transition: background .12s !important;
}
.header-dropdown .dropdown-item i { color: #8c9196 !important; font-size: 13px !important; width: 15px !important; text-align: center !important; }
.header-dropdown .dropdown-item:hover { background: #f1f2f4 !important; color: #303d89 !important; }
.header-dropdown .dropdown-item:hover i { color: #303d89 !important; }
.header-dropdown .dropdown-divider { margin: 4px 0 !important; border-color: #e3e5e8 !important; }
.header-dropdown .dd-danger        { color: #c0392b !important; }
.header-dropdown .dd-danger i      { color: #c0392b !important; }
.header-dropdown .dd-danger:hover  { background: #fce8e8 !important; color: #c0392b !important; }
</style>
</head>
<body>
<div class="top-header-sec">
    <div class="container-fluid p-0">
        <div class="top-main-header">

            <!-- Logo -->
            <a href="{{ route('admin.dashboard') }}" class="admin-logo">
                @if (filled($general->admin_dashboard_logo))
                    <img src="{{ asset('storage/' . ltrim($general->admin_dashboard_logo, '/')) }}" alt="{{ $siteName }}">
                @endif
                <div class="admin-logo-text">
                    <span class="admin-logo-brand">{{ $siteName }}</span>
                    <span class="admin-logo-sub">Admin Panel</span>
                </div>
            </a>

            <div class="th-push"></div>

            <!-- New enquiries -->
            <a href="{{ route('admin.enquiries.index', ['status' => 'new']) }}" class="th-icon-btn"
                title="{{ $newLeads }} new {{ \Illuminate\Support\Str::plural('enquiry', $newLeads) }}"
                style="margin-right:4px">
                <i class="fa-solid fa-bell"></i>
                @if ($newLeads > 0)
                    <span class="th-dot">{{ $newLeads > 99 ? '99+' : $newLeads }}</span>
                @endif
            </a>

            <!-- User dropdown — original JS structure kept exactly -->
            <div class="btn-group">
                <button class="btn bg-transparent p-0 dropdown-toggle" type="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="th-user-wrap">
                        <div class="th-avatar">{{ $adminInitial }}</div>
                        <div style="display:flex;flex-direction:column">
                            <span class="th-uname">{{ $adminName }}</span>
                        </div>
                        <i class="fa-solid fa-chevron-down th-caret"></i>
                    </div>
                </button>
                <div class="dropdown-menu dropdown-menu-right keep-open header-dropdown">
                    <a class="dropdown-item" href="{{ url('admin/profile-setting') }}">
                        <i class="fa-solid fa-user"></i> My Profile
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.admin-setting.index', ['tab' => 'general']) }}">
                        <i class="fa-solid fa-gear"></i> Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item dd-danger" href="{{ url('admin/logout') }}">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>