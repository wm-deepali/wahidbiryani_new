<form method="POST" action="{{ route('admin.smtp-settings.store') }}">
    @csrf
    <div class="settings-layout">

    <div class="settings-sidenav">
        <span class="settings-sidenav-label">Sections</span>
        <a href="#smtp-config" class="active"><i class="fa-solid fa-server"></i> SMTP Config</a>
        <a href="#smtp-sender"><i class="fa-solid fa-user"></i> Sender Details</a>
        <a href="#smtp-admin"><i class="fa-solid fa-user-shield"></i> Admin Recipients</a>
        <a href="#smtp-templates"><i class="fa-solid fa-envelope-open-text"></i> Email Events</a>
    </div>

    <div class="settings-content">

        @if ($errors->any())
            <div class="info-banner" style="background:#fff0f0;border-color:#f5c6cb;margin-bottom:20px">
                <i class="fa-solid fa-circle-xmark" style="color:#dc3545"></i>
                <div>
                    <strong>Please fix the following errors:</strong>
                    <ul style="margin:6px 0 0;padding-left:18px">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="info-banner blue">
            <i class="fa-solid fa-circle-info"></i>
            <div>Configure your SMTP credentials to send thank-you emails to customers and candidates, and detail emails
                to the admin, through your own mail server.</div>
        </div>

        <!-- SMTP Config -->
        <div class="settings-section" id="smtp-config">
            <div class="settings-section-title"><i class="fa-solid fa-server"></i> SMTP Configuration</div>
            <p class="settings-section-desc">Enter your mail server credentials. Works with Gmail, Mailgun, SendGrid,
                and any SMTP provider.</p>

            <div class="form-grid">

                <div class="field-group">
                    <label class="field-label">SMTP Host <span class="req">*</span></label>
                    <input type="text" name="smtp_host" class="field-input"
                        value="{{ old('smtp_host', $smtp->smtp_host ?? '') }}" placeholder="smtp.gmail.com">
                </div>
                <div class="field-group">
                    <label class="field-label">SMTP Port <span class="req">*</span></label>
                    <select class="field-select" name="smtp_port">
                        <option value="465" {{ old('smtp_port', $smtp->smtp_port ?? '') == '465' ? 'selected' : '' }}>465
                            (SSL)</option>
                        <option value="587" {{ old('smtp_port', $smtp->smtp_port ?? '587') == '587' ? 'selected' : '' }}>
                            587 (TLS)</option>
                        <option value="25" {{ old('smtp_port', $smtp->smtp_port ?? '') == '25' ? 'selected' : '' }}>25
                        </option>
                    </select>
                </div>
                <div class="field-group">
                    <label class="field-label">SMTP Username <span class="req">*</span></label>
                    <input type="email" name="smtp_username" class="field-input"
                        value="{{ old('smtp_username', $smtp->smtp_username ?? '') }}">
                </div>
                <div class="field-group">
                    <label class="field-label">SMTP Password <span class="req">*</span></label>
                    <div class="input-wrap">
                        <input type="password" name="smtp_password" class="field-input" id="smtpPass"
                            autocomplete="new-password"
                            placeholder="{{ !empty($smtp?->smtp_password) ? '(saved — leave blank to keep)' : '' }}">
                        <button type="button" onclick="togglePass('smtpPass', this)"
                            style="border:1px solid var(--border);border-left:none;border-radius:0 var(--radius-sm) var(--radius-sm) 0;background:var(--bg);padding:0 12px;cursor:pointer;color:var(--text-hint);flex-shrink:0"><i
                                class="fa fa-eye"></i></button>
                    </div>
                </div>
                <div class="field-group">
                    <label class="field-label">Encryption</label>
                    <select class="field-select" name="smtp_encryption">
                        <option value="tls" {{ old('smtp_encryption', $smtp->smtp_encryption ?? 'tls') == 'tls' ? 'selected' : '' }}>TLS</option>
                        <option value="ssl" {{ old('smtp_encryption', $smtp->smtp_encryption ?? '') == 'ssl' ? 'selected' : '' }}>SSL</option>
                        <option value="none" {{ old('smtp_encryption', $smtp->smtp_encryption ?? '') == 'none' ? 'selected' : '' }}>None</option>
                    </select>
                </div>
            </div>
        </div>

        <hr class="section-divider">

        <!-- Sender Details -->
        <div class="settings-section" id="smtp-sender">
            <div class="settings-section-title"><i class="fa-solid fa-user"></i> Sender Details</div>
            <p class="settings-section-desc">The default name and address people see in their inbox. Each email template can override these.</p>

            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label">From Name</label>
                    <input type="text" name="from_name" class="field-input"
                        value="{{ old('from_name', $smtp->from_name ?? '') }}">
                </div>
                <div class="field-group">
                    <label class="field-label">From Email</label>
                    <input type="email" name="from_email" class="field-input"
                        value="{{ old('from_email', $smtp->from_email ?? '') }}">
                </div>
                <div class="field-group">
                    <label class="field-label">Reply-To Name</label>
                    <input type="text" name="reply_to_name" class="field-input"
                        value="{{ old('reply_to_name', $smtp->reply_to_name ?? '') }}">
                </div>
                <div class="field-group">
                    <label class="field-label">Reply-To Email</label>
                    <input type="email" name="reply_to_email" class="field-input"
                        value="{{ old('reply_to_email', $smtp->reply_to_email ?? '') }}">
                </div>
            </div>
        </div>

        <hr class="section-divider">

        <!-- Admin Recipients -->
        <div class="settings-section" id="smtp-admin">
            <div class="settings-section-title"><i class="fa-solid fa-user-shield"></i> Admin Recipients</div>
            <p class="settings-section-desc">Where the Customer Detail and Candidate Detail emails are delivered. Both
                emails always show whether the mobile number is verified.</p>

            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label">Enquiry Email — To <span class="req">*</span></label>
                    <input type="email" name="enquiry_admin_to" class="field-input"
                        placeholder="business@webmingo.com"
                        value="{{ old('enquiry_admin_to', $smtp->enquiry_admin_to ?? '') }}">
                    <span class="field-hint">Business / Service enquiry details come here.</span>
                </div>
                <div class="field-group">
                    <label class="field-label">Enquiry Email — CC</label>
                    <input type="text" name="enquiry_admin_cc" class="field-input"
                        placeholder="webmingo@gmail.com"
                        value="{{ old('enquiry_admin_cc', $smtp->enquiry_admin_cc ?? '') }}">
                    <span class="field-hint">Separate multiple addresses with a comma.</span>
                </div>
                <div class="field-group">
                    <label class="field-label">Career Email — To <span class="req">*</span></label>
                    <input type="email" name="career_admin_to" class="field-input"
                        placeholder="hr@webmingo.com"
                        value="{{ old('career_admin_to', $smtp->career_admin_to ?? '') }}">
                    <span class="field-hint">Candidate details with resume attachment come here.</span>
                </div>
                <div class="field-group">
                    <label class="field-label">Career Email — CC</label>
                    <input type="text" name="career_admin_cc" class="field-input"
                        placeholder="hr.webmingo@gmail.com"
                        value="{{ old('career_admin_cc', $smtp->career_admin_cc ?? '') }}">
                    <span class="field-hint">Separate multiple addresses with a comma.</span>
                </div>
            </div>
        </div>

        <hr class="section-divider">

        <!-- Email Events -->
        <div class="settings-section" id="smtp-templates">
            <div class="settings-section-title"><i class="fa-solid fa-envelope-open-text"></i> Email Notification Events
            </div>
            <p class="settings-section-desc">Choose which events trigger an email. Thank-you emails also need their
                template enabled in Message Templates, and go out only after the mobile number is OTP verified.</p>

            <div class="toggle-row">
                <div>
                    <div class="toggle-info-label">Thank You Email to Customer</div>
                    <div class="toggle-info-sub">After a Business / Service enquiry, only if the mobile number is verified.</div>
                </div>
                <label class="toggle-switch"><input type="checkbox"
       name="customer_thank_you"
       value="1"
       {{ old('customer_thank_you', $smtp->customer_thank_you ?? 1) ? 'checked' : '' }}><span class="toggle-track"></span></label>
            </div>
            <div class="toggle-row">
                <div>
                    <div class="toggle-info-label">Thank You Email to Candidate</div>
                    <div class="toggle-info-sub">After a Career form submission, only if the mobile number is verified.</div>
                </div>
                <label class="toggle-switch"><input type="checkbox"
       name="candidate_thank_you"
       value="1"
       {{ old('candidate_thank_you', $smtp->candidate_thank_you ?? 1) ? 'checked' : '' }}><span class="toggle-track"></span></label>
            </div>
            <div class="toggle-row">
                <div>
                    <div class="toggle-info-label">Customer Detail Email to Admin</div>
                    <div class="toggle-info-sub">On every enquiry, whether verified or not. Shows Mobile Verified Yes/No.</div>
                </div>
                <label class="toggle-switch"><input type="checkbox"
       name="admin_customer_detail"
       value="1"
       {{ old('admin_customer_detail', $smtp->admin_customer_detail ?? 1) ? 'checked' : '' }}><span class="toggle-track"></span></label>
            </div>
            <div class="toggle-row">
                <div>
                    <div class="toggle-info-label">Candidate Detail Email to Admin</div>
                    <div class="toggle-info-sub">On every application with the resume attached. Shows Mobile Verified Yes/No.</div>
                </div>
                <label class="toggle-switch"><input type="checkbox"
       name="admin_candidate_detail"
       value="1"
       {{ old('admin_candidate_detail', $smtp->admin_candidate_detail ?? 1) ? 'checked' : '' }}><span class="toggle-track"></span></label>
            </div>
        </div>

    </div>
</div>

<div class="action-bar">
    <button type="button" class="btn-secondary-dash" onclick="window.location.reload()">Discard Changes</button>
    <button class="btn-primary-dash" type="submit">
        <i class="fa fa-save"></i> Save SMTP Settings
    </button>
</div>

</form>