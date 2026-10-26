<!-- fixed-top-->

<div class="row d-none">
    <div class="col-10">

        @if (session('success'))
            <div class="alert alert-info alert-dismissible fade in">
                <a href="javascript:void(0);" class="close" data-dismiss="alert">&times;</a>
                <strong>Success!</strong> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade in">
                <a href="javascript:void(0);" class="close" data-dismiss="alert">&times;</a>
                <strong>Error!</strong> {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
</div>

<!-- fixed-top-->

@php
    $settingsTab = request('tab', 'general');
    $onSettingsPage = request()->routeIs('admin.admin-setting.*');
@endphp

<div id='cssmenu'>
    <ul class="pt-0">

        {{-- DASHBOARD --}}
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>
        </li>

        {{-- CONTENT MANAGEMENT --}}
        <li
            class="{{ request()->routeIs(
                'admin.faqs.*',
                'admin.blogs.*',
            )
                ? 'active'
                : '' }}">
            <a href="#"><i class="fa-solid fa-file-lines"></i> Content Management</a>
            <ul>
                <li class="{{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.faqs.index') }}">FAQ</a>
                </li>
                <li class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.blogs.index') }}">Blog Management</a>
                </li>
            
            </ul>
        </li>

        {{-- ENQUIRIES & APPLICATIONS --}}
        <li
            class="{{ request()->routeIs(
                'admin.enquiries.*',
            )
                ? 'active'
                : '' }}">
            <a href="#"><i class="fa-solid fa-inbox"></i> Enquiries & Applications</a>
            <ul>
                <li class="{{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.enquiries.index') }}">Contact Enquiries</a>
                </li>
            </ul>
        </li>

        {{-- MARKETING & SEO --}}
        <li class="{{ request()->routeIs('admin.seo.*') ? 'active' : '' }}">
            <a href="#"><i class="fa-solid fa-bullhorn"></i> Marketing & SEO</a>
            <ul>
                <li class="{{ request()->routeIs('admin.seo.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.seo.index') }}">SEO Management</a>
                </li>
            </ul>
        </li>

        {{-- SETTINGS --}}
        <li
            class="{{ request()->routeIs(
                'admin.admin-setting.*',
                'admin.settings.*',
                'admin.notifications.*',
                'admin.security.*',
                'admin.redirect-settings.*',
            )
                ? 'active'
                : '' }}">
            <a href="#"><i class="fa-solid fa-gear"></i> Settings</a>
            <ul>
                <li class="{{ $onSettingsPage && $settingsTab === 'general' ? 'active' : '' }}">
                    <a href="{{ route('admin.admin-setting.index', ['tab' => 'general']) }}">General Setting</a>
                </li>
                <li class="{{ $onSettingsPage && $settingsTab === 'smtp' ? 'active' : '' }}">
                    <a href="{{ route('admin.admin-setting.index', ['tab' => 'smtp']) }}">SMTP</a>
                </li>
                <li class="{{ request()->routeIs('admin.settings.templates.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings.templates.index') }}">Template Settings</a>
                </li>
                <li class="{{ $onSettingsPage && $settingsTab === 'tracking' ? 'active' : '' }}">
                    <a href="{{ route('admin.admin-setting.index', ['tab' => 'tracking']) }}">Tracking & Pixels</a>
                </li>
                <li class="{{ request()->routeIs('admin.notifications.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.notifications.index') }}">Notification Centre</a>
                </li>
                <li class="{{ request()->routeIs('admin.redirect-settings.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.redirect-settings.index') }}">Redirect Settings</a>
                </li>
                <li class="{{ request()->routeIs('admin.security.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.security.system-logs') }}">System Logs</a>
                </li>
            </ul>
        </li>

    </ul>
</div>