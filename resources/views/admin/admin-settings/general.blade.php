<form action="{{ route('admin.settings.general.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="settings-layout">

        <!-- Section nav -->
        <div class="settings-sidenav">
            <span class="settings-sidenav-label">Sections</span>
            <a href="#gs-site" class="active"><i class="fa-solid fa-globe"></i> Site Identity</a>
            <a href="#gs-contact"><i class="fa-solid fa-phone"></i> Contact Info</a>
            <a href="#gs-header"><i class="fa-solid fa-bullhorn"></i> Header</a>
            <a href="#gs-footer">
                <i class="fa-solid fa-share-nodes"></i>
                Footer & Social
            </a>
            <a href="#gs-regional"><i class="fa-solid fa-map-pin"></i> Regional</a>
            <a href="#gs-security"><i class="fa-solid fa-shield"></i> Security</a>
        </div>

        <!-- Content -->
        <div class="settings-content">

            <!-- Site Identity -->
            <div class="settings-section" id="gs-site">
                <div class="settings-section-title"><i class="fa-solid fa-globe"></i> Site Identity</div>
                <p class="settings-section-desc">Basic information about your website shown to visitors and used across
                    the admin panel.</p>

                <style>
                    .logo-preview-box {
                        width: 100%;
                        max-width: 220px;
                        height: 70px;
                        margin: 10px auto 0;
                        border: 1px solid #e3e5e8;
                        border-radius: 8px;
                        background: #fafafa;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        overflow: hidden;
                        padding: 6px;
                    }

                    .logo-preview-box img {
                        max-width: 100%;
                        max-height: 100%;
                        object-fit: contain;
                    }

                    .logo-preview-remove {
                        display: block;
                        text-align: center;
                        margin-top: 6px;
                        font-size: 11.5px;
                        color: #b22222;
                        background: none;
                        border: none;
                        cursor: pointer;
                        padding: 0;
                    }
                </style>

                <div class="form-grid">
                    <div class="field-group col-full">
                        <label class="field-label">Site Name <span class="req">*</span></label>
                        <input type="text" name="site_name" class="field-input"
                            value="{{ old('site_name', $general?->site_name) }}" placeholder="Your site name">
                    </div>

                    <div class="field-group col-full">
                        <label class="field-label">Tagline</label>
                        <input type="text" name="tagline" class="field-input"
                            value="{{ old('tagline', $general?->tagline) }}"
                            placeholder="e.g. Har Mehfil Ki Shaan">
                        <span class="field-hint">Shown in the header logo tooltip and in the quote box in the footer.</span>
                    </div>

                    <!-- Website Header Logo -->
                    <div class="field-group">
                        <label class="field-label">Website Header Logo</label>
                        <div class="upload-area">
                            <input type="file" id="header_logo" name="header_logo" accept="image/*">
                            <div class="upload-icon"><i class="fa fa-cloud-upload"></i></div>
                            <div class="upload-label">Upload Header Logo</div>
                            <div class="upload-sub">PNG, SVG · recommended 200×60px</div>
                        </div>

                        @if(!empty($general->header_logo))
                            <div class="logo-preview-box">
                                <img src="{{ asset('storage/' . $general->header_logo) }}" alt="Header Logo">
                            </div>
                        @endif

                        <div id="header_logoPreview" style="display:none">
                            <div class="logo-preview-box">
                                <img id="preview_header_logo" src="" alt="Preview">
                            </div>
                            <button type="button" class="logo-preview-remove" onclick="clearImage('header_logo')">
                                <i class="fa fa-times"></i> Remove
                            </button>
                        </div>
                    </div>

                    <!-- Website Footer Logo -->
                    <div class="field-group">
                        <label class="field-label">Website Footer Logo</label>
                        <div class="upload-area">
                            <input type="file" id="footer_logo" name="footer_logo" accept="image/*">
                            <div class="upload-icon"><i class="fa fa-cloud-upload"></i></div>
                            <div class="upload-label">Upload Footer Logo</div>
                            <div class="upload-sub">PNG, SVG · recommended 200×60px</div>
                        </div>

                        @if(!empty($general->footer_logo))
                            <div class="logo-preview-box">
                                <img src="{{ asset('storage/' . $general->footer_logo) }}" alt="Footer Logo">
                            </div>
                        @endif

                        <div id="footer_logoPreview" style="display:none">
                            <div class="logo-preview-box">
                                <img id="preview_footer_logo" src="" alt="Preview">
                            </div>
                            <button type="button" class="logo-preview-remove" onclick="clearImage('footer_logo')">
                                <i class="fa fa-times"></i> Remove
                            </button>
                        </div>
                    </div>

                    <!-- Favicon -->
                    <div class="field-group">
                        <label class="field-label">Favicon</label>
                        <div class="upload-area">
                            <input type="file" id="favicon" name="favicon" accept="image/*">
                            <div class="upload-icon"><i class="fa fa-image"></i></div>
                            <div class="upload-label">Upload Favicon</div>
                            <div class="upload-sub">ICO, PNG · 32×32px</div>
                        </div>

                        @if(!empty($general->favicon))
                            <div class="logo-preview-box" style="height:50px;max-width:60px">
                                <img src="{{ asset('storage/' . $general->favicon) }}" alt="Favicon">
                            </div>
                        @endif

                        <div id="faviconPreview" style="display:none">
                            <div class="logo-preview-box" style="height:50px;max-width:60px">
                                <img id="preview_favicon" src="" alt="Preview">
                            </div>
                            <button type="button" class="logo-preview-remove" onclick="clearImage('favicon')">
                                <i class="fa fa-times"></i> Remove
                            </button>
                        </div>
                    </div>

                    <!-- Admin Login Page Logo -->
                    <div class="field-group">
                        <label class="field-label">Admin Login Page Logo</label>
                        <div class="upload-area">
                            <input type="file" id="admin_login_logo" name="admin_login_logo" accept="image/*">
                            <div class="upload-icon"><i class="fa fa-cloud-upload"></i></div>
                            <div class="upload-label">Upload Login Logo</div>
                            <div class="upload-sub">PNG, SVG · recommended 200×60px</div>
                        </div>

                        @if(!empty($general->admin_login_logo))
                            <div class="logo-preview-box">
                                <img src="{{ asset('storage/' . $general->admin_login_logo) }}" alt="Admin Login Logo">
                            </div>
                        @endif

                        <div id="admin_login_logoPreview" style="display:none">
                            <div class="logo-preview-box">
                                <img id="preview_admin_login_logo" src="" alt="Preview">
                            </div>
                            <button type="button" class="logo-preview-remove" onclick="clearImage('admin_login_logo')">
                                <i class="fa fa-times"></i> Remove
                            </button>
                        </div>
                    </div>

                    <!-- Admin Dashboard Logo -->
                    <div class="field-group">
                        <label class="field-label">Admin Dashboard Logo</label>
                        <div class="upload-area">
                            <input type="file" id="admin_dashboard_logo" name="admin_dashboard_logo" accept="image/*">
                            <div class="upload-icon"><i class="fa fa-cloud-upload"></i></div>
                            <div class="upload-label">Upload Dashboard Logo</div>
                            <div class="upload-sub">PNG, SVG · recommended 200×60px</div>
                        </div>

                        @if(!empty($general->admin_dashboard_logo))
                            <div class="logo-preview-box">
                                <img src="{{ asset('storage/' . $general->admin_dashboard_logo) }}"
                                    alt="Admin Dashboard Logo">
                            </div>
                        @endif

                        <div id="admin_dashboard_logoPreview" style="display:none">
                            <div class="logo-preview-box">
                                <img id="preview_admin_dashboard_logo" src="" alt="Preview">
                            </div>
                            <button type="button" class="logo-preview-remove"
                                onclick="clearImage('admin_dashboard_logo')">
                                <i class="fa fa-times"></i> Remove
                            </button>
                        </div>
                    </div>

                    <div class="field-group col-full">
                        <label class="field-label">Admin Email</label>
                        <input type="email" name="admin_email" class="field-input"
                            value="{{ old('admin_email', $general?->admin_email) }}">
                        <span class="field-hint">Used for system notifications and enquiry alerts.</span>
                    </div>
                </div>
            </div>

            <hr class="section-divider">

            <!-- Contact Info -->
            <div class="settings-section" id="gs-contact">
                <div class="settings-section-title"><i class="fa-solid fa-phone"></i> Contact Info</div>
                <p class="settings-section-desc">Displayed on the contact page, the footer and the top announcement bar.</p>

                <div class="form-grid">
                    <div class="field-group">
                        <label class="field-label">Phone Number</label>
                        <input type="text" name="phone" class="field-input" value="{{ old('phone', $general?->phone) }}"
                            placeholder="+91 98765 43210">
                        <span class="field-hint">Footer "Ordering Inquiries" and contact page.</span>
                    </div>
                    <div class="field-group">
                        <label class="field-label">WhatsApp Number</label>
                        <input type="text" name="whatsapp" class="field-input"
                            value="{{ old('whatsapp', $general?->whatsapp) }}" placeholder="+91 98765 43210">
                        <span class="field-hint">Announcement bar icon, footer "Franchise & Catering" and contact page.</span>
                    </div>
                    <div class="field-group">
                        <label class="field-label">Support Email</label>
                        <input type="email" name="support_email" class="field-input"
                            value="{{ old('support_email', $general?->support_email) }}">
                        <span class="field-hint">Used in the footer and as the fallback for outlets without an email.</span>
                    </div>
                    <div class="field-group">
                        <label class="field-label">Working Hours</label>
                        <input type="text" name="business_hours" class="field-input"
                            value="{{ old('business_hours', $general->business_hours ?? '') }}"
                            placeholder="12:30 PM to 10:30 PM (Daily)">
                        <span class="field-hint">Shown in the footer.</span>
                    </div>
                    <div class="field-group col-full">
                        <label class="field-label">Business Address</label>
                        <textarea name="business_address" class="field-textarea"
                            rows="3">{{ old('business_address', $general?->business_address) }}</textarea>
                    </div>
                </div>
            </div>

            <hr class="section-divider">

            <!-- Header -->
            <div class="settings-section" id="gs-header">
                <div class="settings-section-title"><i class="fa-solid fa-bullhorn"></i> Header</div>
                <p class="settings-section-desc">Text shown in the top announcement bar and on the page loading screen.
                    Social icons in the announcement bar come from the Footer & Social section.</p>

                <div class="form-grid">
                    <div class="field-group col-full">
                        <label class="field-label">Announcement Bar Text</label>
                        <input type="text" name="announcement_text" class="field-input"
                            value="{{ old('announcement_text', $general?->announcement_text) }}"
                            placeholder="Since 1955 | The Original Taste of Lucknow | Serving Generations with the Same Aroma & Tradition">
                        <span class="field-hint">Shown on the left side of the top bar.</span>
                    </div>

                    <div class="field-group col-full">
                        <label class="field-label">Preloader Subtitle</label>
                        <input type="text" name="preloader_subtitle" class="field-input"
                            value="{{ old('preloader_subtitle', $general?->preloader_subtitle) }}"
                            placeholder="Since 1955">
                        <span class="field-hint">Small text under the logo on the loading screen. Leave empty to hide it.</span>
                    </div>
                </div>
            </div>

            <hr class="section-divider">

            <!-- Footer & Social -->
            <div class="settings-section" id="gs-footer">
                <div class="settings-section-title">
                    <i class="fa-solid fa-share-nodes"></i>
                    Footer & Social Media
                </div>

                <p class="settings-section-desc">
                    Footer text and social media links displayed across the website.
                </p>

                <div class="form-grid">

                    <div class="field-group col-full">
                        <label class="field-label">Footer Urdu Text</label>
                        <input type="text" name="footer_urdu_text" class="field-input" dir="rtl"
                            value="{{ old('footer_urdu_text', $general?->footer_urdu_text) }}"
                            placeholder="روایت • نسلاً بعد نسل">
                        <span class="field-hint">Urdu line under the footer logo. Leave empty to hide it.</span>
                    </div>

                    <div class="field-group col-full">
                        <label class="field-label">Footer Description</label>
                        <textarea name="footer_description" class="field-textarea"
                            rows="4">{{ old('footer_description', $general?->footer_description) }}</textarea>
                        <span class="field-hint">
                            Displayed in the website footer.
                        </span>
                    </div>

                    <div class="field-group col-full">
                        <label class="field-label">Footer Copyright</label>
                        <input type="text" name="footer_copyright" class="field-input"
                            value="{{ old('footer_copyright', $general?->footer_copyright) }}"
                            placeholder="© 2026 Your Company Pvt. Ltd. All rights reserved.">
                        <span class="field-hint">Shown at the very bottom of the footer.</span>
                    </div>

                    <div class="field-group">
                        <label class="field-label">
                            <i class="fab fa-facebook"></i> Facebook URL
                        </label>
                        <input type="url" name="facebook" class="field-input"
                            value="{{ old('facebook', $general?->facebook) }}">
                    </div>

                    <div class="field-group">
                        <label class="field-label">
                            <i class="fab fa-instagram"></i> Instagram URL
                        </label>
                        <input type="url" name="instagram" class="field-input"
                            value="{{ old('instagram', $general?->instagram) }}">
                    </div>

                    <div class="field-group">
                        <label class="field-label">
                            <i class="fab fa-twitter"></i> Twitter / X URL
                        </label>
                        <input type="url" name="twitter" class="field-input"
                            value="{{ old('twitter', $general?->twitter) }}">
                    </div>

                    <div class="field-group">
                        <label class="field-label">
                            <i class="fab fa-linkedin"></i> LinkedIn URL
                        </label>
                        <input type="url" name="linkedin" class="field-input"
                            value="{{ old('linkedin', $general?->linkedin) }}">
                    </div>

                    <div class="field-group">
                        <label class="field-label">
                            <i class="fab fa-youtube"></i> YouTube URL
                        </label>
                        <input type="url" name="youtube" class="field-input"
                            value="{{ old('youtube', $general?->youtube) }}">
                    </div>

                    <div class="field-group">
                        <label class="field-label">
                            <i class="fab fa-pinterest"></i> Pinterest URL
                        </label>
                        <input type="url" name="pinterest" class="field-input"
                            value="{{ old('pinterest', $general?->pinterest) }}">
                    </div>

                </div>
            </div>

            <hr class="section-divider">


            <!-- Regional -->
            <div class="settings-section" id="gs-regional">
                <div class="settings-section-title"><i class="fa-solid fa-map-pin"></i> Regional Settings</div>
                <p class="settings-section-desc">Currency, timezone and date format used across the panel and
                    website.
                </p>

                <div class="form-grid">
                    <div class="field-group">
                        <label class="field-label">Currency</label>
                        <input type="text" name="currency" class="field-input"
                            value="{{ old('currency', $general?->currency ?? 'INR') }}" readonly>
                    </div>
                    <div class="field-group">
                        <label class="field-label">Currency Symbol</label>
                        <input type="text" name="currency_symbol" class="field-input"
                            value="{{ old('currency_symbol', $general?->currency_symbol ?? '₹') }}" readonly>

                    </div>
                    <div class="field-group">
                        <label class="field-label">Timezone</label>
                        <input type="text" name="timezone" class="field-input"
                            value="{{ old('timezone', $general?->timezone ?? 'Asia/Kolkata') }}" readonly>
                    </div>
                </div>
            </div>

            <hr class="section-divider">

            <!-- Security -->
            <div class="settings-section" id="gs-security">
                <div class="settings-section-title"><i class="fa-solid fa-shield"></i> Security</div>
                <p class="settings-section-desc">Control admin panel access and session behaviour.</p>

                <div class="toggle-row">
                    <div>
                        <div class="toggle-info-label">Maintenance Mode</div>
                        <div class="toggle-info-sub">Take the website offline for visitors while you work.</div>
                    </div>
                    <label class="toggle-switch"><input type="checkbox" name="maintenance_mode" {{ old('maintenance_mode', $general?->maintenance_mode) ? 'checked' : '' }}><span
                            class="toggle-track"></span></label>
                </div>
                <div class="toggle-row">
                    <div>
                        <div class="toggle-info-label">Admin Session Timeout</div>
                        <div class="toggle-info-sub">Auto-logout after inactivity (minutes).</div>
                    </div>
                    <div style="display:flex;align-items:center;gap:8px">
                        <input type="number" min="1" max="1440" class="field-input" name="admin_session_timeout"
                            value="{{ old('admin_session_timeout', $general?->admin_session_timeout ?? 60) }}"
                            style="width:80px;height:32px;font-size:13px">
                        <span style="font-size:12.5px;color:var(--text-hint)">min</span>
                    </div>
                </div>
            </div>


        </div><!-- /settings-content -->
    </div><!-- /settings-layout -->

    <div class="action-bar">
        <button type="button" class="btn-secondary-dash" onclick="window.location.reload()">Discard Changes</button>
        <button type="submit" class="btn-primary-dash">
            <i class="fa fa-save"></i>
            Save General Settings
        </button>
    </div>

</form>