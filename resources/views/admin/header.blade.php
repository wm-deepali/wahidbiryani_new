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

        {{-- MENU MANAGEMENT --}}
        <li class="{{ request()->routeIs('admin.menu-categories.*', 'admin.menu-items.*') ? 'active' : '' }}">
            <a href="#"><i class="fa-solid fa-utensils"></i> Menu Management</a>
            <ul>
                <li class="{{ request()->routeIs('admin.menu-categories.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.menu-categories.index') }}">Menu Categories</a>
                </li>
                <li class="{{ request()->routeIs('admin.menu-items.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.menu-items.index') }}">Menu Items</a>
                </li>
            </ul>
        </li>

        {{-- CONTENT MANAGEMENT --}}
        <li class="{{ request()->routeIs(
    'admin.faqs.*',
    'admin.blogs.*',
    'admin.outlets.*',
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
                <li class="{{ request()->routeIs('admin.outlets.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.outlets.index') }}">Outlets</a>
                </li>
            </ul>
        </li>

        {{-- GALLERY --}}
        <li class="{{ request()->routeIs('admin.gallery-images.*', 'admin.gallery-videos.*') ? 'active' : '' }}">
            <a href="#"><i class="fa-solid fa-images"></i> Gallery</a>
            <ul>
                <li class="{{ request()->routeIs('admin.gallery-images.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.gallery-images.index') }}">Image Gallery</a>
                </li>
                <li class="{{ request()->routeIs('admin.gallery-videos.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.gallery-videos.index') }}">Video Gallery</a>
                </li>
            </ul>
        </li>

        {{-- ENQUIRIES & APPLICATIONS --}}
        <li class="{{ request()->routeIs(
    'admin.enquiries.*',
    'admin.contact-enquiries.*',
    'admin.feedbacks.*',
    'admin.franchise-enquiries.*',
)
    ? 'active'
    : '' }}">
            <a href="#"><i class="fa-solid fa-inbox"></i> Enquiries & Applications</a>
            <ul>
                <li class="{{ request()->routeIs('admin.contact-enquiries.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.contact-enquiries.index') }}">Contact Enquiries</a>
                </li>
                <li class="{{ request()->routeIs('admin.feedbacks.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.feedbacks.index') }}">Feedback</a>
                </li>
                <li class="{{ request()->routeIs('admin.franchise-enquiries.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.franchise-enquiries.index') }}">Franchise Enquiries</a>
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
        <li class="{{ request()->routeIs(
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
                    <a href="{{ route('admin.settings.email-templates.index') }}">Template Settings</a>
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