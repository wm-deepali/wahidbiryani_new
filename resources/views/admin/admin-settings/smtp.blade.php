<form method="POST" action="{{ route('admin.smtp-settings.store') }}">
    @csrf
    <div class="settings-layout">

    <div class="settings-sidenav">
        <span class="settings-sidenav-label">Sections</span>
        <a href="#smtp-config" class="active"><i class="fa-solid fa-server"></i> SMTP Config</a>
        <a href="#smtp-sender"><i class="fa-solid fa-user"></i> Sender Details</a>
        <a href="#smtp-notifications"><i class="fa-solid fa-bell"></i> Admin Notifications</a>
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
            <div>Configure your SMTP credentials so the website can email the admin whenever a visitor submits the
                contact, feedback or franchise form.</div>
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
            <p class="settings-section-desc">The name and address shown as the sender of these emails.</p>

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

        <!-- Admin Notifications -->
        <div class="settings-section" id="smtp-notifications">
            <div class="settings-section-title"><i class="fa-solid fa-bell"></i> Admin Email Notifications</div>
            <p class="settings-section-desc">Choose which form submissions send an email to the admin. Emails are
                delivered to the Support Email in General Settings (or the Admin Email if no support email is set).</p>

            <div class="toggle-row">
                <div>
                    <div class="toggle-info-label">Contact Enquiry</div>
                    <div class="toggle-info-sub">Email the admin whenever someone submits the Contact Us form.</div>
                </div>
                <label class="toggle-switch"><input type="checkbox"
                        name="notify_contact_enquiry"
                        value="1"
                        {{ old('notify_contact_enquiry', $smtp->notify_contact_enquiry ?? 1) ? 'checked' : '' }}><span class="toggle-track"></span></label>
            </div>
            <div class="toggle-row">
                <div>
                    <div class="toggle-info-label">Feedback &amp; Suggestions</div>
                    <div class="toggle-info-sub">Email the admin whenever someone submits the Feedback form.</div>
                </div>
                <label class="toggle-switch"><input type="checkbox"
                        name="notify_feedback"
                        value="1"
                        {{ old('notify_feedback', $smtp->notify_feedback ?? 1) ? 'checked' : '' }}><span class="toggle-track"></span></label>
            </div>
            <div class="toggle-row">
                <div>
                    <div class="toggle-info-label">Franchise Enquiry</div>
                    <div class="toggle-info-sub">Email the admin whenever someone submits the Franchise Enquiry form.</div>
                </div>
                <label class="toggle-switch"><input type="checkbox"
                        name="notify_franchise_enquiry"
                        value="1"
                        {{ old('notify_franchise_enquiry', $smtp->notify_franchise_enquiry ?? 1) ? 'checked' : '' }}><span class="toggle-track"></span></label>
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