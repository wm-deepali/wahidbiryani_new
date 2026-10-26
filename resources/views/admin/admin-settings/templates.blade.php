@include('admin.top-header')
<div class="main-section">
    @include('admin.header')

    <style>
        :root {
            --bg: #f1f2f4;
            --surface: #ffffff;
            --border: #e3e5e8;
            --border-hover: #c9cccf;
            --text-primary: #202223;
            --text-secondary: #6d7175;
            --text-hint: #8c9196;
            --text-disabled: #babec3;
            --navy: #303d89;
            --navy-hover: #252f70;
            --navy-light: #eef0fc;
            --navy-border: #c5c9ef;
            --green: #007a5e;
            --green-bg: #e3f1ec;
            --green-border: #9fcfc3;
            --red: #c0392b;
            --red-bg: #fce8e8;
            --red-border: #f5b8b8;
            --amber: #916a00;
            --amber-bg: #fff5cc;
            --amber-border: #e8d080;
            --blue: #0069d9;
            --blue-bg: #e8f2ff;
            --blue-border: #a8cdf5;
            --purple: #6d28d9;
            --purple-bg: #ede9fe;
            --purple-border: #c4b5fd;
            --whatsapp: #25d366;
            --whatsapp-bg: #e8faf1;
            --whatsapp-border: #a3e8c4;
            --radius-sm: 6px;
            --radius-md: 8px;
            --radius-lg: 12px;
            --shadow: 0 1px 0 rgba(0, 0, 0, .05), 0 0 0 1px rgba(0, 0, 0, .07);
            --font: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        .sp-page { background: var(--bg); padding: 24px 28px; min-height: 100vh; font-family: var(--font); color: var(--text-primary); font-size: 14px; }
        .sp-page * { box-sizing: border-box; }

        /* ── Page header ── */
        .sp-page-header { display: flex; align-items: flex-start; justify-content: space-between; flex-wrap: wrap; gap: 12px; margin-bottom: 20px; }
        .sp-page-title { font-size: 20px; font-weight: 660; margin: 0 0 4px; letter-spacing: -.2px; }
        .sp-crumb { font-size: 12.5px; color: var(--text-hint); display: flex; align-items: center; gap: 4px; flex-wrap: wrap; }
        .sp-crumb a { color: var(--navy); text-decoration: none; font-weight: 500; }
        .sp-crumb a:hover { text-decoration: underline; }
        .sp-crumb-sep { color: var(--border-hover); }

        /* ── TOP channel tabs ── */
        .sp-channel-tabs { display: flex; align-items: center; gap: 2px; background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 4px; box-shadow: var(--shadow); margin-bottom: 20px; }
        .sp-channel-tab { display: inline-flex; align-items: center; gap: 8px; padding: 9px 20px; border-radius: var(--radius-md); font-size: 13.5px; font-weight: 600; cursor: pointer; transition: all .15s; color: var(--text-secondary); border: none; background: transparent; font-family: var(--font); flex: 1; justify-content: center; }
        .sp-channel-tab:hover { background: var(--bg); color: var(--text-primary); }
        .sp-channel-tab.active { color: #fff; }
        .sp-channel-tab.sms.active { background: var(--navy); }
        .sp-channel-tab.email.active { background: var(--blue); }
        .sp-channel-tab.whatsapp.active { background: #128c7e; }
        .sp-channel-tab i { font-size: 15px; }

        /* ── Main layout ── */
        .sp-tpl-layout { display: grid; grid-template-columns: 220px 1fr; gap: 20px; align-items: start; }
        @media(max-width:960px) { .sp-tpl-layout { grid-template-columns: 1fr; } }

        /* ── Left sidebar nav ── */
        .sp-sidenav { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-lg); box-shadow: var(--shadow); overflow: hidden; }
        .sp-sidenav-header { padding: 12px 16px; border-bottom: 1px solid var(--border); background: #fafafa; }
        .sp-sidenav-label { font-size: 10.5px; font-weight: 750; letter-spacing: .08em; text-transform: uppercase; color: var(--text-hint); }
        .sp-sidenav-item { display: flex; align-items: center; gap: 10px; padding: 10px 16px; cursor: pointer; border-left: 3px solid transparent; transition: all .12s; font-size: 13px; font-weight: 500; color: var(--text-secondary); border-bottom: 1px solid var(--border); }
        .sp-sidenav-item:last-child { border-bottom: none; }
        .sp-sidenav-item:hover { background: var(--bg); color: var(--text-primary); }
        .sp-sidenav-item.active { background: var(--navy-light); color: var(--navy); border-left-color: var(--navy); font-weight: 650; }
        .sp-sidenav-item i { font-size: 14px; flex-shrink: 0; }
        .sp-sidenav-badge { margin-left: auto; font-size: 10px; font-weight: 700; padding: 2px 6px; border-radius: 10px; }
        .sp-sidenav-badge.active-badge { background: var(--green-bg); color: var(--green); border: 1px solid var(--green-border); }
        .sp-sidenav-badge.draft-badge { background: var(--amber-bg); color: var(--amber); border: 1px solid var(--amber-border); }
        .sp-sidenav-badge.off-badge { background: var(--bg); color: var(--text-hint); border: 1px solid var(--border); }

        /* ── Right content panel ── */
        .sp-panel { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-lg); box-shadow: var(--shadow); overflow: hidden; }
        .sp-panel-header { padding: 16px 20px; border-bottom: 1px solid var(--border); background: #fafafa; display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; flex-wrap: wrap; }
        .sp-panel-title { font-size: 15px; font-weight: 660; color: var(--text-primary); margin: 0 0 3px; }
        .sp-panel-desc { font-size: 12.5px; color: var(--text-hint); margin: 0; line-height: 1.5; }
        .sp-panel-body { padding: 24px; }

        /* ── Status toggle bar ── */
        .sp-status-bar { display: flex; align-items: center; justify-content: space-between; background: var(--green-bg); border: 1px solid var(--green-border); border-radius: var(--radius-md); padding: 11px 16px; margin-bottom: 22px; }
        .sp-status-bar.inactive { background: var(--bg); border-color: var(--border); }
        .sp-status-bar-text { font-size: 13px; font-weight: 600; color: var(--green); }
        .sp-status-bar.inactive .sp-status-bar-text { color: var(--text-hint); }
        .sp-status-bar-sub { font-size: 11.5px; color: var(--green); opacity: .75; margin-top: 1px; }
        .sp-status-bar.inactive .sp-status-bar-sub { color: var(--text-hint); }

        /* ── Toggle switch ── */
        .sp-switch { position: relative; width: 40px; height: 22px; flex-shrink: 0; }
        .sp-switch input { opacity: 0; width: 0; height: 0; position: absolute; }
        .sp-switch-track { position: absolute; inset: 0; background: var(--border); border-radius: 22px; cursor: pointer; transition: background .2s; }
        .sp-switch-track::after { content: ''; position: absolute; left: 3px; top: 3px; width: 16px; height: 16px; background: #fff; border-radius: 50%; transition: transform .2s; box-shadow: 0 1px 3px rgba(0, 0, 0, .2); }
        .sp-switch input:checked+.sp-switch-track { background: var(--navy); }
        .sp-switch input:checked+.sp-switch-track::after { transform: translateX(18px); }

        /* ── Form fields ── */
        .sp-field { margin-bottom: 20px; }
        .sp-field:last-child { margin-bottom: 0; }
        .sp-label { display: flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 700; color: var(--text-secondary); letter-spacing: .04em; text-transform: uppercase; margin-bottom: 7px; }
        .sp-req { color: var(--red); }
        .sp-label-badge { font-size: 10px; font-weight: 700; padding: 1px 6px; border-radius: 10px; text-transform: uppercase; letter-spacing: .04em; }
        .sp-label-badge.sms-badge { background: var(--navy-light); color: var(--navy); border: 1px solid var(--navy-border); }
        .sp-label-badge.email-badge { background: var(--blue-bg); color: var(--blue); border: 1px solid var(--blue-border); }
        .sp-label-badge.wa-badge { background: var(--whatsapp-bg); color: #128c7e; border: 1px solid var(--whatsapp-border); }
        .sp-help { font-size: 11.5px; color: var(--text-hint); margin-top: 5px; line-height: 1.55; }

        .sp-input, .sp-select, .sp-textarea { width: 100%; border: 1px solid var(--border); border-radius: var(--radius-md); padding: 0 12px; height: 38px; font-size: 13.5px; color: var(--text-primary); background: var(--surface); outline: none; font-family: var(--font); transition: border-color .15s, box-shadow .15s; }
        .sp-input:focus, .sp-select:focus, .sp-textarea:focus { border-color: var(--navy); box-shadow: 0 0 0 3px rgba(48, 61, 137, .10); }
        .sp-input::placeholder, .sp-textarea::placeholder { color: var(--text-disabled); }
        .sp-input[readonly] { background: #f7f8f9; cursor: not-allowed; color: var(--text-secondary); }
        .sp-select { appearance: none; -webkit-appearance: none; padding-right: 32px; cursor: pointer; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6'%3E%3Cpath d='M0 0l5 6 5-6z' fill='%238c9196'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 10px center; }
        .sp-textarea { height: auto; padding: 11px 12px; resize: vertical; min-height: 120px; line-height: 1.65; font-size: 13.5px; }

        .sp-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        @media(max-width:640px) { .sp-grid-2 { grid-template-columns: 1fr; } }
        .sp-grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 14px; }
        @media(max-width:640px) { .sp-grid-3 { grid-template-columns: 1fr; } }

        /* ── Template body editor ── */
        .sp-editor-wrap { border: 1px solid var(--border); border-radius: var(--radius-md); overflow: hidden; }
        .sp-editor-toolbar { padding: 8px 12px; background: #fafafa; border-bottom: 1px solid var(--border); display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }
        .sp-tb-btn { display: inline-flex; align-items: center; gap: 4px; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 5px; cursor: pointer; border: 1px solid var(--border); background: var(--surface); color: var(--text-secondary); font-family: var(--font); transition: all .12s; white-space: nowrap; }
        .sp-tb-btn:hover { background: var(--navy-light); border-color: var(--navy-border); color: var(--navy); }
        .sp-tb-btn i { font-size: 12px; }
        .sp-tb-sep { width: 1px; height: 20px; background: var(--border); margin: 0 2px; }
        .sp-editor-area { width: 100%; border: none; padding: 14px; font-size: 13.5px; font-family: var(--font); color: var(--text-primary); background: var(--surface); outline: none; resize: vertical; min-height: 140px; line-height: 1.7; }

        /* ── Variable chips ── */
        .sp-var-section { background: var(--bg); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 14px 16px; }
        .sp-var-title { font-size: 12px; font-weight: 700; color: var(--text-secondary); letter-spacing: .05em; text-transform: uppercase; margin-bottom: 10px; display: flex; align-items: center; gap: 6px; }
        .sp-var-chips { display: flex; flex-wrap: wrap; gap: 6px; }
        .sp-var-chip { display: inline-flex; align-items: center; gap: 5px; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 5px; background: var(--navy-light); color: var(--navy); border: 1px solid var(--navy-border); cursor: pointer; font-family: 'SF Mono', 'Fira Code', monospace; transition: all .12s; user-select: none; }
        .sp-var-chip:hover { background: var(--navy); color: #fff; }
        .sp-var-chip i { font-size: 10px; }

        /* ── Preview panel ── */
        .sp-preview-wrap { border: 1px solid var(--border); border-radius: var(--radius-md); overflow: hidden; }
        .sp-preview-header { padding: 10px 14px; background: #fafafa; border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; }
        .sp-preview-label { font-size: 11.5px; font-weight: 650; color: var(--text-secondary); display: flex; align-items: center; gap: 6px; }
        .sp-preview-body { padding: 16px; min-height: 80px; font-size: 13.5px; color: var(--text-primary); line-height: 1.7; background: var(--surface); }

        /* SMS preview bubble */
        .sp-sms-bubble { background: #e5e5ea; border-radius: 14px 14px 14px 4px; padding: 10px 14px; font-size: 13px; color: #1c1c1e; line-height: 1.55; max-width: 300px; }
        .sp-sms-sender { font-size: 11px; color: var(--text-hint); margin-bottom: 6px; font-weight: 600; }
        .sp-sms-char-count { font-size: 11px; color: var(--text-hint); margin-top: 8px; display: flex; gap: 10px; }

        /* SMS provider readonly bar */
        .sp-provider-bar { background: var(--navy-light); border: 1px solid var(--navy-border); border-radius: var(--radius-md); padding: 11px 16px; display: flex; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 20px; flex-wrap: wrap; }
        .sp-provider-bar-group { display: flex; gap: 24px; flex-wrap: wrap; }
        .sp-provider-bar-item-label { font-size: 10.5px; font-weight: 700; letter-spacing: .06em; text-transform: uppercase; color: var(--navy); margin-bottom: 3px; }
        .sp-provider-bar-item-val { font-size: 13.5px; font-weight: 650; color: var(--text-primary); }
        .sp-provider-bar-note { font-size: 11.5px; color: var(--text-hint); display: flex; align-items: center; gap: 5px; }

        /* Email preview */
        .sp-email-preview { border: 1px solid var(--border); border-radius: var(--radius-md); overflow: hidden; }
        .sp-email-header-bar { background: var(--bg); padding: 12px 16px; border-bottom: 1px solid var(--border); font-size: 12px; color: var(--text-hint); }
        .sp-email-header-bar div { display: flex; gap: 6px; margin-bottom: 4px; }
        .sp-email-header-bar span:first-child { font-weight: 650; color: var(--text-secondary); min-width: 36px; }
        .sp-email-html-body { padding: 24px; background: #fff; font-size: 14px; line-height: 1.7; }

        /* ── Section divider ── */
        .sp-divider { border: none; border-top: 1px solid var(--border); margin: 24px 0; }

        /* ── Info callout ── */
        .sp-callout { display: flex; align-items: flex-start; gap: 10px; padding: 12px 14px; border-radius: var(--radius-md); font-size: 12.5px; line-height: 1.6; margin-bottom: 20px; }
        .sp-callout i { flex-shrink: 0; margin-top: 1px; font-size: 14px; }
        .sp-callout.info { background: var(--blue-bg); border: 1px solid var(--blue-border); color: var(--blue); }
        .sp-callout.warn { background: var(--amber-bg); border: 1px solid var(--amber-border); color: var(--amber); }
        .sp-callout.success { background: var(--green-bg); border: 1px solid var(--green-border); color: var(--green); }

        /* ── Action bar ── */
        .sp-action-bar { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-lg); box-shadow: var(--shadow); padding: 14px 20px; display: flex; align-items: center; justify-content: space-between; gap: 10px; margin-top: 20px; flex-wrap: wrap; }
        .sp-action-bar-left { font-size: 12.5px; color: var(--text-hint); display: flex; align-items: center; gap: 6px; }
        .sp-action-bar-right { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }

        .sp-btn { display: inline-flex; align-items: center; gap: 6px; border-radius: var(--radius-md); padding: 8px 16px; font-size: 13.5px; font-weight: 600; font-family: var(--font); cursor: pointer; text-decoration: none; transition: all .15s; white-space: nowrap; border: 1px solid transparent; }
        .sp-btn-primary { background: var(--navy); color: #fff; border-color: var(--navy-hover); box-shadow: 0 1px 3px rgba(48, 61, 137, .2); }
        .sp-btn-primary:hover { background: var(--navy-hover); color: #fff; }
        .sp-btn-secondary { background: var(--surface); color: var(--text-primary); border-color: var(--border); }
        .sp-btn-secondary:hover { background: var(--bg); border-color: var(--border-hover); }
        .sp-btn-ghost { background: transparent; color: var(--navy); border-color: var(--navy-border); }
        .sp-btn-ghost:hover { background: var(--navy-light); }
        .sp-btn-sm { height: 32px; padding: 0 12px; font-size: 12.5px; }

        /* Channel tab panels */
        .sp-channel-panel { display: none; }
        .sp-channel-panel.active { display: block; }

        /* Test modal */
        .sp-modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0, 0, 0, .45); z-index: 1000; align-items: center; justify-content: center; padding: 20px; }
        .sp-modal-overlay.open { display: flex; }
        .sp-modal { background: var(--surface); border-radius: var(--radius-lg); box-shadow: 0 20px 60px rgba(0, 0, 0, .2); width: 100%; max-width: 440px; overflow: hidden; animation: mIn .18s ease; }
        @keyframes mIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: none; } }
        .sp-modal-header { padding: 14px 20px; border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; }
        .sp-modal-title { font-size: 14px; font-weight: 650; margin: 0; }
        .sp-modal-close { width: 28px; height: 28px; border-radius: var(--radius-sm); border: none; background: var(--bg); color: var(--text-hint); cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 13px; }
        .sp-modal-body { padding: 20px; }
        .sp-modal-footer { padding: 12px 20px; border-top: 1px solid var(--border); display: flex; justify-content: flex-end; gap: 8px; }

        @media(max-width:768px) { .sp-page { padding: 16px; } }
    </style>

    <div class="app-content content container-fluid">
        <div class="sp-page">

            <!-- Page header -->
            <div class="sp-page-header">
                <div>
                    <h1 class="sp-page-title">Message Templates</h1>
                    <div class="sp-crumb">
                        <a href="#">Dashboard</a>
                        <span class="sp-crumb-sep">›</span>
                        <a href="#">Admin Settings</a>
                        <span class="sp-crumb-sep">›</span>
                        <span>Message Templates</span>
                    </div>
                </div>
                <div style="display:flex;gap:8px;flex-wrap:wrap">
                    <button class="sp-btn sp-btn-secondary" onclick="openTestModal()">
                        <i class="fa fa-paper-plane"></i> Send Test
                    </button>
                    <button class="sp-btn sp-btn-primary" onclick="saveSmsTemplate()">
                        <i class="fa fa-save"></i> Save Template
                    </button>
                </div>
            </div>

            <!-- ── Channel tabs ── -->
            <div class="sp-channel-tabs">
                <button class="sp-channel-tab sms active" onclick="switchChannel('sms',this)">
                    <i class="fa fa-comment-dots"></i> SMS Templates
                </button>
                <button class="sp-channel-tab email" onclick="switchChannel('email',this)">
                    <i class="fa fa-envelope"></i> Email Templates
                </button>
            </div>

            {{-- ══════════════════════════════════════
            SMS CHANNEL PANEL — fully dynamic
            ══════════════════════════════════════ --}}
            <div class="sp-channel-panel active" id="panel-sms">
                <div class="sp-tpl-layout">

                    {{-- ── Left sidenav — rendered from $meta / $templates ── --}}
                    <div class="sp-sidenav">
                        <div class="sp-sidenav-header">
                            <div class="sp-sidenav-label">SMS Template Events</div>
                        </div>

                        @php $firstKey = true; @endphp
                        @foreach (\App\Models\SmsTemplate::$eventKeys as $evKey)
                            @php
                                $tpl = $templates[$evKey] ?? null;
                                $m = $meta[$evKey];
                                $badge = $tpl ? $tpl->navBadge() : ['class' => 'off-badge', 'label' => 'Off'];
                            @endphp
                            <div class="sp-sidenav-item {{ $firstKey ? 'active' : '' }}"
                                onclick="switchSmsTemplate('{{ $evKey }}', this)" data-event="{{ $evKey }}">
                                <i class="{{ $m['icon'] }}"></i>
                                {{ $m['label'] }}
                                <span class="sp-sidenav-badge {{ $badge['class'] }}" id="nav-badge-{{ $evKey }}">
                                    {{ $badge['label'] }}
                                </span>
                            </div>
                            @php $firstKey = false; @endphp
                        @endforeach
                    </div>

                    {{-- ── Right panels — one per event key ── --}}
                    <div id="sms-panels-container">

                        @foreach (\App\Models\SmsTemplate::$eventKeys as $evKey)
                            @php
                                $tpl = $templates[$evKey] ?? null;
                                $m = $meta[$evKey];
                                $isEnabled = $tpl?->enabled ?? false;
                                $dltId = $tpl?->dlt_template_id ?? '';
                                $tplType = $tpl?->template_type ?? $m['default_type'];
                                $body = $tpl?->body ?? $m['default_body'];
                                $extra = $tpl?->extra_settings ?? [];
                                $isFirst = $evKey === \App\Models\SmsTemplate::$eventKeys[0];
                                $statusHtml = $tpl ? $tpl->statusBadgeHtml() : '<span style="font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;background:var(--bg);color:var(--text-hint);border:1px solid var(--border)">Off</span>';
                            @endphp

                            <div class="sp-panel sms-event-panel" id="sms-panel-{{ $evKey }}"
                                style="{{ $isFirst ? '' : 'display:none' }}" data-event="{{ $evKey }}">

                                {{-- Panel header --}}
                                <div class="sp-panel-header">
                                    <div>
                                        <p class="sp-panel-title">
                                            <i class="{{ $m['icon'] }}" style="margin-right:7px;color:var(--navy)"></i>
                                            {{ $m['label'] }} Template
                                        </p>
                                        <p class="sp-panel-desc">{{ $m['desc'] }}</p>
                                    </div>
                                    {!! $statusHtml !!}
                                </div>

                                <div class="sp-panel-body">

                                    {{-- ── PROVIDER BAR (read-only, from SMS Settings) ── --}}
                                    <div class="sp-provider-bar">
                                        <div class="sp-provider-bar-group">
                                            <div>
                                                <div class="sp-provider-bar-item-label">Active Provider</div>
                                                <div class="sp-provider-bar-item-val">
                                                    {{ $smsSettings?->provider
                                                        ? strtoupper($smsSettings->provider)
                                                        : '— Not configured —' }}
                                                </div>
                                            </div>
                                            <div>
                                                <div class="sp-provider-bar-item-label">Sender ID</div>
                                                <div class="sp-provider-bar-item-val">
                                                    {{ $smsSettings?->sender_id ?? '— Not set —' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sp-provider-bar-note">
                                            <i class="fa fa-lock" style="font-size:11px"></i>
                                            Managed in <a href="{{ route('admin.admin-setting.index', ['tab' => 'sms']) }}"
                                                style="color:var(--navy);font-weight:600">SMS Settings</a>
                                        </div>
                                    </div>

                                    {{-- Event notes --}}
                                    @if($evKey === 'otp')
                                        <div class="sp-callout info">
                                            <i class="fa fa-info-circle"></i>
                                            <span>Sent on every Business / Service enquiry and Career form submit. The form is
                                                saved even if the OTP is not verified, but the thank-you email goes only
                                                after verification.</span>
                                        </div>
                                    @endif

                                    @if($evKey === 'admin-customer-detail')
                                        <div class="sp-callout info">
                                            <i class="fa fa-info-circle"></i>
                                            <span>Sent to the admin mobile number:
                                                <strong>{{ $smsSettings?->admin_mobile_number ?: '— Not set —' }}</strong>
                                                (change it in SMS Settings). Contains only Name, Mobile Number and
                                                Service.</span>
                                        </div>
                                    @endif

                                    {{-- ── Status toggle ── --}}
                                    <div class="sp-status-bar {{ $isEnabled ? '' : 'inactive' }}"
                                        id="status-bar-{{ $evKey }}">
                                        <div>
                                            <div class="sp-status-bar-text" id="status-text-{{ $evKey }}">
                                                @if($isEnabled)
                                                    <i class="fa fa-check-circle" style="margin-right:6px"></i>Template is
                                                    active
                                                @else
                                                    Template is disabled
                                                @endif
                                            </div>
                                            <div class="sp-status-bar-sub" id="status-sub-{{ $evKey }}">
                                                @if($isEnabled)
                                                    SMS will be sent on every trigger for this event
                                                @else
                                                    Enable to activate this SMS event
                                                @endif
                                            </div>
                                        </div>
                                        <label class="sp-switch">
                                            <input type="checkbox" id="enabled-{{ $evKey }}" {{ $isEnabled ? 'checked' : '' }}
                                                onchange="toggleSmsStatus('{{ $evKey }}', this)">
                                            <span class="sp-switch-track"></span>
                                        </label>
                                    </div>

                                    {{-- ── DLT Template ID + Template Type ── --}}
                                    <div class="sp-grid-2" style="margin-bottom:20px">
                                        <div class="sp-field" style="margin:0">
                                            <label class="sp-label">
                                                DLT Template ID <span class="sp-req">*</span>
                                            </label>
                                            <input type="text" class="sp-input" id="dlt-id-{{ $evKey }}"
                                                value="{{ old('dlt_template_id', $dltId) }}"
                                                placeholder="18-digit DLT Template ID">
                                            <div class="sp-help">Mandatory for India — register on TRAI DLT portal</div>
                                        </div>
                                        <div class="sp-field" style="margin:0">
                                            <label class="sp-label">Template Type</label>
                                            <select class="sp-select" id="tpl-type-{{ $evKey }}">
                                                @foreach(['transactional' => 'Transactional'] as $val => $label)
                                                    <option value="{{ $val }}" {{ $tplType === $val ? 'selected' : '' }}>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="sp-help">Use Transactional for OTP and admin alerts</div>
                                        </div>
                                    </div>

                                    <hr class="sp-divider">

                                    {{-- ── Template Body ── --}}
                                    <div class="sp-field">
                                        <label class="sp-label">
                                            Template Body <span class="sp-req">*</span>
                                            <span class="sp-label-badge sms-badge">SMS</span>
                                        </label>
                                        <div class="sp-callout info">
                                            <i class="fa fa-info-circle"></i>
                                            <span>Click variable chips below to insert placeholders at cursor. The exact
                                                variable text must match your DLT-registered template.</span>
                                        </div>
                                        <div class="sp-editor-wrap">
                                            <div class="sp-editor-toolbar" id="toolbar-{{ $evKey }}">
                                                <span
                                                    style="font-size:11.5px;font-weight:650;color:var(--text-hint);margin-right:4px">Insert:</span>
                                                @foreach($m['vars'] as $varKey => $varLabel)
                                                    <span class="sp-var-chip" title="{{ $varLabel }}"
                                                        onclick="insertSmsVar('body-{{ $evKey }}', '{{ $varKey }}')">
                                                        <i class="fa fa-code" style="font-size:10px"></i>{{ $varKey }}
                                                    </span>
                                                @endforeach
                                            </div>
                                            <textarea class="sp-editor-area" id="body-{{ $evKey }}"
                                                oninput="updateSmsCharCount('{{ $evKey }}'); updateSmsPreview('{{ $evKey }}')">{{ old('body', $body) }}</textarea>
                                        </div>
                                        <div style="display:flex;justify-content:space-between;margin-top:5px">
                                            <div class="sp-help" id="char-count-{{ $evKey }}">0 chars</div>
                                            <div class="sp-help" id="char-status-{{ $evKey }}"></div>
                                        </div>
                                    </div>

                                    {{-- ── Variable chips ── --}}
                                    <div class="sp-var-section" style="margin-bottom:20px">
                                        <div class="sp-var-title">
                                            <i class="fa fa-code"></i> Available Variables — click to insert at cursor
                                        </div>
                                        <div class="sp-var-chips">
                                            @foreach($m['vars'] as $varKey => $varLabel)
                                                <span class="sp-var-chip" title="{{ $varLabel }}"
                                                    onclick="insertSmsVar('body-{{ $evKey }}', '{{ $varKey }}')">
                                                    <i class="fa fa-hashtag" style="font-size:10px"></i>{{ $varKey }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>

                                    {{-- ── Live SMS Preview ── --}}
                                    <div class="sp-field" style="margin-bottom:20px">
                                        <label class="sp-label"><i class="fa fa-eye" style="margin-right:5px"></i>Live
                                            Preview</label>
                                        <div class="sp-preview-wrap">
                                            <div class="sp-preview-header">
                                                <span class="sp-preview-label"><i class="fa fa-mobile-alt"></i>SMS
                                                    Preview</span>
                                                <span style="font-size:11.5px;color:var(--text-hint)">Sample data
                                                    applied</span>
                                            </div>
                                            <div class="sp-preview-body">
                                                <div class="sp-sms-sender">
                                                    {{ $smsSettings?->sender_id ?? 'SENDER' }}
                                                </div>
                                                <div class="sp-sms-bubble" id="preview-bubble-{{ $evKey }}">
                                                    {{-- Populated by JS on load --}}
                                                </div>
                                                <div class="sp-sms-char-count" id="preview-stats-{{ $evKey }}"></div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- ── Event-specific extras ── --}}
                                    @if($m['extras'] === 'otp')
                                        <hr class="sp-divider">
                                        <div class="sp-grid-3">
                                            <div class="sp-field" style="margin:0">
                                                <label class="sp-label">OTP Length</label>
                                                <select class="sp-select" id="otp-length-{{ $evKey }}">
                                                    @foreach([4, 6, 8] as $len)
                                                        <option value="{{ $len }}" {{ ($extra['otp_length'] ?? 6) == $len ? 'selected' : '' }}>
                                                            {{ $len }} digits
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="sp-field" style="margin:0">
                                                <label class="sp-label">OTP Expiry (min)</label>
                                                <input type="number" class="sp-input" id="otp-expiry-{{ $evKey }}"
                                                    value="{{ $extra['otp_expiry'] ?? 10 }}" min="1" max="60">
                                            </div>
                                            <div class="sp-field" style="margin:0">
                                                <label class="sp-label">Max Retry Attempts</label>
                                                <input type="number" class="sp-input" id="otp-retries-{{ $evKey }}"
                                                    value="{{ $extra['max_retries'] ?? 3 }}" min="1" max="10">
                                            </div>
                                        </div>
                                    @endif

                                    {{-- ── Save button (per panel) ── --}}
                                    <hr class="sp-divider">
                                    <div
                                        style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px">
                                        <div class="sp-help" id="save-note-{{ $evKey }}"
                                            style="display:flex;align-items:center;gap:5px">
                                            <i class="fa fa-info-circle"></i> Unsaved changes
                                        </div>
                                        <div style="display:flex;gap:8px">
                                            <button type="button" class="sp-btn sp-btn-secondary sp-btn-sm"
                                                onclick="openSmsTestModal('{{ $evKey }}')">
                                                <i class="fa fa-paper-plane"></i> Send Test
                                            </button>
                                            <button type="button" class="sp-btn sp-btn-primary sp-btn-sm"
                                                onclick="saveSmsTemplateFor('{{ $evKey }}')">
                                                <i class="fa fa-save"></i> Save Template
                                            </button>
                                        </div>
                                    </div>

                                </div>{{-- /sp-panel-body --}}
                            </div>{{-- /sp-panel --}}
                        @endforeach

                    </div>{{-- /sms-panels-container --}}
                </div>{{-- /sp-tpl-layout --}}
            </div>{{-- /panel-sms --}}

            {{-- ══════════════════════════════════════
            EMAIL CHANNEL PANEL
            ══════════════════════════════════════ --}}
            <div class="sp-channel-panel" id="panel-email">
                <div class="sp-tpl-layout">

                    {{-- ── Left sidenav ── --}}
                    <div class="sp-sidenav">
                        <div class="sp-sidenav-header">
                            <div class="sp-sidenav-label">Email Template Events</div>
                        </div>

                        @php $firstEmailKey = true; @endphp
                        @foreach (\App\Models\EmailTemplate::$eventKeys as $evKey)
                            @php
                                $tpl = $emailTemplates[$evKey] ?? null;
                                $m = $emailMeta[$evKey];
                                $badge = $tpl ? $tpl->navBadge() : ['class' => 'off-badge', 'label' => 'Off'];
                            @endphp
                            <div class="sp-sidenav-item {{ $firstEmailKey ? 'active' : '' }}"
                                onclick="switchEmailTemplate('{{ $evKey }}', this)" data-event="{{ $evKey }}">
                                <i class="{{ $m['icon'] }}"></i>
                                {{ $m['label'] }}
                                <span class="sp-sidenav-badge {{ $badge['class'] }}" id="email-nav-badge-{{ $evKey }}">
                                    {{ $badge['label'] }}
                                </span>
                            </div>
                            @php $firstEmailKey = false; @endphp
                        @endforeach
                    </div>

                    {{-- ── Right panels — one per event key ── --}}
                    <div id="email-panels-container">

                        @foreach (\App\Models\EmailTemplate::$eventKeys as $evKey)
                            @php
                                $tpl = $emailTemplates[$evKey] ?? null;
                                $m = $emailMeta[$evKey];
                                $isEnabled = $tpl?->enabled ?? false;
                                $fromName = $tpl?->from_name ?? $smtpSettings?->from_name ?? '';
                                $fromEmail = $tpl?->from_email ?? $smtpSettings?->from_email ?? '';
                                $replyName = $tpl?->reply_to_name ?? $smtpSettings?->reply_to_name ?? '';
                                $replyEmail = $tpl?->reply_to_email ?? $smtpSettings?->reply_to_email ?? '';
                                $cc = $tpl?->cc ?? '';
                                $subject = $tpl?->subject ?? $m['default_subject'];
                                $previewText = $tpl?->preview_text ?? $m['default_preview'];
                                $body = $tpl?->body ?? $m['default_body'];
                                $isFirst = $evKey === \App\Models\EmailTemplate::$eventKeys[0];
                                $statusHtml = $tpl
                                    ? $tpl->statusBadgeHtml()
                                    : '<span style="font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;background:var(--bg);color:var(--text-hint);border:1px solid var(--border)">Off</span>';
                                $previewTo = $m['audience'] === 'candidate' ? 'candidate@example.com' : 'customer@example.com';
                            @endphp

                            <div class="sp-panel email-event-panel" id="email-panel-{{ $evKey }}"
                                style="{{ $isFirst ? '' : 'display:none' }}" data-event="{{ $evKey }}">

                                {{-- Panel header --}}
                                <div class="sp-panel-header">
                                    <div>
                                        <p class="sp-panel-title">
                                            <i class="{{ $m['icon'] }}" style="margin-right:7px;color:var(--blue)"></i>
                                            {{ $m['label'] }} Template
                                        </p>
                                        <p class="sp-panel-desc">{{ $m['desc'] }}</p>
                                    </div>
                                    {!! $statusHtml !!}
                                </div>

                                <div class="sp-panel-body">

                                    {{-- Verification rule --}}
                                    <div class="sp-callout info" style="margin-bottom:20px">
                                        <i class="fa fa-shield-alt"></i>
                                        <span>This email is sent <strong>only if the
                                                {{ $m['audience'] === 'candidate' ? 'candidate' : 'customer' }} has verified
                                                their mobile number</strong> with the OTP. No email is sent otherwise.
                                            Admin detail emails (with Mobile Verified Yes/No) are configured in SMTP
                                            Settings.</span>
                                    </div>

                                    {{-- ── Status toggle ── --}}
                                    <div class="sp-status-bar {{ $isEnabled ? '' : 'inactive' }}"
                                        id="email-status-bar-{{ $evKey }}">
                                        <div>
                                            <div class="sp-status-bar-text" id="email-status-text-{{ $evKey }}">
                                                @if($isEnabled)
                                                    <i class="fa fa-check-circle" style="margin-right:6px"></i>Template is
                                                    active
                                                @else
                                                    Template is disabled
                                                @endif
                                            </div>
                                            <div class="sp-status-bar-sub" id="email-status-sub-{{ $evKey }}">
                                                @if($isEnabled)
                                                    Email will be sent after mobile OTP verification
                                                @else
                                                    Enable to activate this email event
                                                @endif
                                            </div>
                                        </div>
                                        <label class="sp-switch">
                                            <input type="checkbox" id="email-enabled-{{ $evKey }}" {{ $isEnabled ? 'checked' : '' }} onchange="toggleEmailStatus('{{ $evKey }}', this)">
                                            <span class="sp-switch-track"></span>
                                        </label>
                                    </div>

                                    {{-- ── Sender details (per template, falls back to SMTP settings) ── --}}
                                    <div class="sp-grid-2" style="margin-bottom:16px">
                                        <div class="sp-field" style="margin:0">
                                            <label class="sp-label">From Name</label>
                                            <input type="text" class="sp-input" id="email-from-name-{{ $evKey }}"
                                                value="{{ old('from_name', $fromName) }}"
                                                placeholder="{{ $smtpSettings?->from_name ?? 'Web Mingo' }}">
                                            <div class="sp-help">Leave blank to use SMTP default</div>
                                        </div>
                                        <div class="sp-field" style="margin:0">
                                            <label class="sp-label">From Email</label>
                                            <input type="email" class="sp-input" id="email-from-email-{{ $evKey }}"
                                                value="{{ old('from_email', $fromEmail) }}"
                                                placeholder="{{ $smtpSettings?->from_email ?? 'noreply@webmingo.com' }}">
                                        </div>
                                        <div class="sp-field" style="margin:0">
                                            <label class="sp-label">Reply-To Email</label>
                                            <input type="email" class="sp-input" id="email-reply-email-{{ $evKey }}"
                                                value="{{ old('reply_to_email', $replyEmail) }}"
                                                placeholder="{{ $smtpSettings?->reply_to_email ?? '' }}">
                                        </div>
                                        <div class="sp-field" style="margin:0">
                                            <label class="sp-label">CC (optional)</label>
                                            <input type="email" class="sp-input" id="email-cc-{{ $evKey }}"
                                                value="{{ old('cc', $cc) }}" placeholder="e.g. manager@webmingo.com">
                                        </div>
                                    </div>

                                    <hr class="sp-divider">

                                    {{-- ── Subject + Preview text ── --}}
                                    <div class="sp-grid-2" style="margin-bottom:20px">
                                        <div class="sp-field" style="margin:0">
                                            <label class="sp-label">
                                                Email Subject <span class="sp-req">*</span>
                                            </label>
                                            <input type="text" class="sp-input" id="email-subject-{{ $evKey }}"
                                                value="{{ old('subject', $subject) }}"
                                                oninput="updateEmailPreviewHeader('{{ $evKey }}')"
                                                placeholder="{{ $m['default_subject'] }}">
                                            <div class="sp-help">Supports variables. Emoji supported. Recommended: 40–60
                                                chars.</div>
                                        </div>
                                        <div class="sp-field" style="margin:0">
                                            <label class="sp-label">
                                                Preview Text
                                                <span class="sp-label-badge email-badge">Gmail / Apple Mail</span>
                                            </label>
                                            <input type="text" class="sp-input" id="email-preview-text-{{ $evKey }}"
                                                value="{{ old('preview_text', $previewText) }}"
                                                placeholder="{{ $m['default_preview'] }}">
                                            <div class="sp-help">Shown below subject in inbox. Keep under 90 chars.</div>
                                        </div>
                                    </div>

                                    <hr class="sp-divider">

                                    {{-- ── Template body ── --}}
                                    <div class="sp-field">
                                        <label class="sp-label">
                                            Email Body (HTML) <span class="sp-req">*</span>
                                            <span class="sp-label-badge email-badge">HTML</span>
                                        </label>
                                        <div class="sp-callout info">
                                            <i class="fa fa-info-circle"></i>
                                            <span>Use full HTML for richly styled emails. Click variable chips below to
                                                insert at cursor.</span>
                                        </div>
                                        <div class="sp-editor-wrap">
                                            <div class="sp-editor-toolbar" id="email-toolbar-{{ $evKey }}">
                                                <span
                                                    style="font-size:11.5px;font-weight:650;color:var(--text-hint);margin-right:4px">Insert:</span>
                                                @foreach($m['vars'] as $varKey => $varLabel)
                                                    <span class="sp-var-chip" title="{{ $varLabel }}"
                                                        onclick="insertEmailVar('email-body-{{ $evKey }}', '{{ $varKey }}')">
                                                        <i class="fa fa-code" style="font-size:10px"></i>{{ $varKey }}
                                                    </span>
                                                @endforeach
                                            </div>
                                            <textarea class="sp-editor-area" id="email-body-{{ $evKey }}"
                                                style="min-height:200px;font-family:monospace;font-size:12.5px"
                                                oninput="updateEmailPreview('{{ $evKey }}')">{{ old('body', $body) }}</textarea>
                                        </div>
                                    </div>

                                    {{-- ── Variable chips ── --}}
                                    <div class="sp-var-section" style="margin-bottom:20px">
                                        <div class="sp-var-title">
                                            <i class="fa fa-code"></i> Available Variables — click to insert at cursor
                                        </div>
                                        <div class="sp-var-chips">
                                            @foreach($m['vars'] as $varKey => $varLabel)
                                                <span class="sp-var-chip" title="{{ $varLabel }}"
                                                    onclick="insertEmailVar('email-body-{{ $evKey }}', '{{ $varKey }}')">
                                                    <i class="fa fa-hashtag" style="font-size:10px"></i>{{ $varKey }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>

                                    {{-- ── Live email preview ── --}}
                                    <div class="sp-field" style="margin-bottom:20px">
                                        <label class="sp-label"><i class="fa fa-eye" style="margin-right:5px"></i>Live
                                            Preview</label>
                                        <div class="sp-email-preview">
                                            <div class="sp-email-header-bar">
                                                <div id="email-preview-from-{{ $evKey }}">
                                                    <span>From:</span>
                                                    <span>{{ $fromName ?: ($smtpSettings?->from_name ?? 'Web Mingo') }}
                                                        &lt;{{ $fromEmail ?: ($smtpSettings?->from_email ?? 'noreply@webmingo.com') }}&gt;</span>
                                                </div>
                                                <div><span>To:</span><span>{{ $previewTo }}</span></div>
                                                <div id="email-preview-subject-{{ $evKey }}">
                                                    <span>Sub:</span><span>{{ $subject }}</span>
                                                </div>
                                            </div>
                                            <div class="sp-email-html-body" id="email-preview-body-{{ $evKey }}">
                                                {{-- Populated by JS on load --}}
                                            </div>
                                        </div>
                                    </div>

                                    {{-- ── Save row ── --}}
                                    <hr class="sp-divider">
                                    <div
                                        style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px">
                                        <div class="sp-help" id="email-save-note-{{ $evKey }}"
                                            style="display:flex;align-items:center;gap:5px">
                                            <i class="fa fa-info-circle"></i> Unsaved changes
                                        </div>
                                        <div style="display:flex;gap:8px">
                                            <button type="button" class="sp-btn sp-btn-secondary sp-btn-sm"
                                                onclick="openEmailTestModal('{{ $evKey }}')">
                                                <i class="fa fa-paper-plane"></i> Send Test
                                            </button>
                                            <button type="button" class="sp-btn sp-btn-primary sp-btn-sm"
                                                onclick="saveEmailTemplateFor('{{ $evKey }}')">
                                                <i class="fa fa-save"></i> Save Template
                                            </button>
                                        </div>
                                    </div>

                                </div>{{-- /sp-panel-body --}}
                            </div>{{-- /email-panel --}}
                        @endforeach

                    </div>{{-- /email-panels-container --}}
                </div>{{-- /sp-tpl-layout --}}
            </div>{{-- /panel-email --}}


            {{-- ══ Email Test Modal ══ --}}
            <div class="sp-modal-overlay" id="emailTestModal">
                <div class="sp-modal">
                    <div class="sp-modal-header">
                        <h5 class="sp-modal-title">
                            <i class="fa fa-paper-plane" style="margin-right:8px;color:var(--blue)"></i>Send Test Email
                        </h5>
                        <button class="sp-modal-close" onclick="closeEmailModal()"><i class="fa fa-times"></i></button>
                    </div>
                    <div class="sp-modal-body">
                        <div class="sp-callout info">
                            <i class="fa fa-info-circle"></i>
                            <span>Test emails use sample variable values. Actual customer data is not used.</span>
                        </div>
                        <input type="hidden" id="emailTestEventKey" value="">
                        <div class="sp-field">
                            <label class="sp-label">Email Address <span class="sp-req">*</span></label>
                            <input type="email" class="sp-input" id="emailTestAddress" placeholder="you@example.com">
                        </div>
                    </div>
                    <div class="sp-modal-footer">
                        <button class="sp-btn sp-btn-secondary" onclick="closeEmailModal()">Cancel</button>
                        <button class="sp-btn sp-btn-primary" onclick="sendEmailTest()">
                            <i class="fa fa-paper-plane"></i> Send Test
                        </button>
                    </div>
                </div>
            </div>

            <!-- Action bar -->
            <div class="sp-action-bar">
                <div class="sp-action-bar-left">
                    <i class="fa fa-info-circle"></i>
                    Changes save per template. Switch tabs to edit other channels.
                </div>
                <div class="sp-action-bar-right">
                    <button class="sp-btn sp-btn-secondary" onclick="openTestModal()">
                        <i class="fa fa-paper-plane"></i> Send Test
                    </button>
                    <button class="sp-btn sp-btn-secondary" onclick="window.location.reload()">
                        <i class="fa fa-history"></i> Reset to Default
                    </button>
                    <button class="sp-btn sp-btn-primary" onclick="saveSmsTemplate()">
                        <i class="fa fa-save"></i> Save Template
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ── Send Test Modal (SMS) ── -->
<div class="sp-modal-overlay" id="testModal">
    <div class="sp-modal">
        <div class="sp-modal-header">
            <h5 class="sp-modal-title"><i class="fa fa-paper-plane" style="margin-right:8px;color:var(--navy)"></i>Send
                Test SMS</h5>
            <button class="sp-modal-close" onclick="closeModal()"><i class="fa fa-times"></i></button>
        </div>
        <div class="sp-modal-body">
            <div class="sp-callout info"><i class="fa fa-info-circle"></i><span>Test messages use sample variable
                    values. Actual customer data is not used.</span></div>
            <input type="hidden" id="testEventKey" value="">
            <div class="sp-field">
                <label class="sp-label">Mobile Number <span class="sp-req">*</span></label>
                <input type="text" class="sp-input" id="testMobile" placeholder="+91 98765 43210">
            </div>
        </div>
        <div class="sp-modal-footer">
            <button class="sp-btn sp-btn-secondary" onclick="closeModal()">Cancel</button>
            <button class="sp-btn sp-btn-primary" onclick="sendSmsTest()">
                <i class="fa fa-paper-plane"></i> Send Test
            </button>
        </div>
    </div>
</div>

@include('admin.footer')

<script>
    /* ════════════════════════════════════════════════
       Sample values for live SMS preview substitution
    ════════════════════════════════════════════════ */
    const SMS_SAMPLE = {
        '{otp}': '847291',
        '{otp_expiry}': '10',
        '{customer_name}': 'Rahul Sharma',
        '{customer_mobile}': '9876543210',
        '{service}': 'Website Development',
        '{brand_name}': 'Web Mingo',
    };

    /* ── Channel switcher (page header buttons follow the active channel) ── */
    let activeChannel = 'sms';

    function switchChannel(ch, btn) {
        document.querySelectorAll('.sp-channel-tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.sp-channel-panel').forEach(p => p.classList.remove('active'));
        btn.classList.add('active');
        document.getElementById('panel-' + ch).classList.add('active');
        activeChannel = ch;
    }

    /* ── SMS template nav switcher ── */
    let activeSmsEvent = '{{ \App\Models\SmsTemplate::$eventKeys[0] }}';

    function switchSmsTemplate(evKey, navItem) {
        document.querySelectorAll('#panel-sms .sp-sidenav-item').forEach(i => i.classList.remove('active'));
        navItem.classList.add('active');
        document.getElementById('sms-panel-' + activeSmsEvent).style.display = 'none';
        activeSmsEvent = evKey;
        document.getElementById('sms-panel-' + evKey).style.display = 'block';
    }

    /* ── Insert variable at cursor ── */
    function insertSmsVar(textareaId, variable) {
        const ta = document.getElementById(textareaId);
        if (!ta) return;
        const s = ta.selectionStart, e = ta.selectionEnd;
        ta.value = ta.value.substring(0, s) + variable + ta.value.substring(e);
        ta.selectionStart = ta.selectionEnd = s + variable.length;
        ta.focus();
        const evKey = textareaId.replace('body-', '');
        updateSmsCharCount(evKey);
        updateSmsPreview(evKey);
    }

    /* ── Char count + part calculation ── */
    function updateSmsCharCount(evKey) {
        const ta = document.getElementById('body-' + evKey);
        if (!ta) return;
        const len = ta.value.length;
        const parts = len === 0 ? 0 : (len <= 160 ? 1 : Math.ceil(len / 153));
        const cc = document.getElementById('char-count-' + evKey);
        const cs = document.getElementById('char-status-' + evKey);
        if (cc) cc.textContent = `${len} chars · ${parts} SMS part${parts !== 1 ? 's' : ''}`;
        if (cs) {
            if (len > 480) cs.innerHTML = '<span style="color:var(--amber)">Too long — consider splitting</span>';
            else if (len > 160) cs.innerHTML = '<span style="color:var(--amber)">Multi-part SMS</span>';
            else if (len > 0) cs.innerHTML = '<span style="color:var(--green)">✓ Within 1 SMS</span>';
            else cs.textContent = '';
        }
    }

    /* ── Live preview ── */
    function updateSmsPreview(evKey) {
        const ta = document.getElementById('body-' + evKey);
        if (!ta) return;
        let preview = ta.value;
        Object.keys(SMS_SAMPLE).forEach(k => {
            preview = preview.split(k).join('<strong>' + SMS_SAMPLE[k] + '</strong>');
        });
        const bubble = document.getElementById('preview-bubble-' + evKey);
        const stats = document.getElementById('preview-stats-' + evKey);
        if (bubble) bubble.innerHTML = preview || '<em style="color:var(--text-hint)">Template body is empty</em>';
        const len = ta.value.length;
        const parts = len === 0 ? 0 : (len <= 160 ? 1 : Math.ceil(len / 153));
        if (stats && len > 0) {
            stats.innerHTML = `<span>${len} chars</span><span>${parts} SMS part${parts !== 1 ? 's' : ''}</span>`
                + (len <= 160 ? '<span style="color:var(--green)">✓ Within limit</span>' : '<span style="color:var(--amber)">Multi-part</span>');
        } else if (stats) {
            stats.innerHTML = '';
        }
    }

    /* ── Status bar toggle ── */
    function toggleSmsStatus(evKey, cb) {
        const bar = document.getElementById('status-bar-' + evKey);
        const text = document.getElementById('status-text-' + evKey);
        const sub = document.getElementById('status-sub-' + evKey);
        if (cb.checked) {
            bar.classList.remove('inactive');
            text.innerHTML = '<i class="fa fa-check-circle" style="margin-right:6px"></i>Template is active';
            sub.textContent = 'SMS will be sent on every trigger for this event';
        } else {
            bar.classList.add('inactive');
            text.textContent = 'Template is disabled';
            sub.textContent = 'Enable to activate this SMS event';
        }
    }

    /* ── Save a single SMS template (AJAX) ── */
    function saveSmsTemplateFor(evKey) {
        const payload = {
            _token: '{{ csrf_token() }}',
            enabled: document.getElementById('enabled-' + evKey)?.checked ? 1 : 0,
            dlt_template_id: document.getElementById('dlt-id-' + evKey)?.value ?? '',
            template_type: document.getElementById('tpl-type-' + evKey)?.value ?? 'transactional',
            body: document.getElementById('body-' + evKey)?.value ?? '',
        };

        // OTP extras
        const otpLen = document.getElementById('otp-length-' + evKey);
        if (otpLen) {
            payload.otp_length = otpLen.value;
            payload.otp_expiry = document.getElementById('otp-expiry-' + evKey)?.value;
            payload.max_retries = document.getElementById('otp-retries-' + evKey)?.value;
        }

        const note = document.getElementById('save-note-' + evKey);
        if (note) note.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving…';

        fetch(`{{ url('admin/settings/templates') }}/${evKey}`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify(payload),
        })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    if (note) note.innerHTML = '<i class="fa fa-check-circle" style="color:var(--green)"></i> <span style="color:var(--green)">Saved</span>';
                    updateNavBadge(evKey, payload.enabled, payload.body);
                    Swal.fire({ icon: 'success', title: 'Template Saved!', text: data.message, timer: 1800, showConfirmButton: false });
                } else {
                    if (note) note.innerHTML = '<i class="fa fa-exclamation-circle" style="color:var(--red)"></i> <span style="color:var(--red)">Error saving</span>';
                    Swal.fire({ icon: 'error', title: 'Error', text: data.message, confirmButtonColor: '#303d89' });
                }
            })
            .catch(() => {
                if (note) note.innerHTML = '<i class="fa fa-exclamation-circle" style="color:var(--red)"></i> <span style="color:var(--red)">Network error</span>';
                Swal.fire({ icon: 'error', title: 'Network Error', text: 'Could not reach the server.', confirmButtonColor: '#303d89' });
            });
    }

    /* Page header / action bar Save: saves the active template of the active channel */
    function saveSmsTemplate() {
        if (activeChannel === 'email') {
            saveEmailTemplateFor(activeEmailEvent);
        } else {
            saveSmsTemplateFor(activeSmsEvent);
        }
    }

    /* ── Update nav badge after save ── */
    function updateNavBadge(evKey, enabled, body) {
        const badge = document.getElementById('nav-badge-' + evKey);
        if (!badge) return;
        badge.className = 'sp-sidenav-badge';
        if (enabled) {
            badge.className += ' active-badge'; badge.textContent = 'On';
        } else if (body && body.trim()) {
            badge.className += ' draft-badge'; badge.textContent = 'Draft';
        } else {
            badge.className += ' off-badge'; badge.textContent = 'Off';
        }
    }

    /* ── Test modal ── */
    function openTestModal() {
        if (activeChannel === 'email') {
            openEmailTestModal(activeEmailEvent);
        } else {
            openSmsTestModal(activeSmsEvent);
        }
    }
    function openSmsTestModal(evKey) { document.getElementById('testEventKey').value = evKey; document.getElementById('testModal').classList.add('open'); }
    function closeModal() { document.getElementById('testModal').classList.remove('open'); }
    document.getElementById('testModal').addEventListener('click', function (e) { if (e.target === this) closeModal(); });

    function sendSmsTest() {
        const mobile = document.getElementById('testMobile').value.trim();
        const evKey = document.getElementById('testEventKey').value;
        if (!mobile) { Swal.fire({ icon: 'warning', title: 'Mobile required', text: 'Enter a mobile number to send the test SMS.', confirmButtonColor: '#303d89' }); return; }
        closeModal();
        Swal.fire({ title: 'Sending…', allowOutsideClick: false, didOpen: () => Swal.showLoading() });

        fetch('{{ route('admin.settings.templates.test') }}', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ event_key: evKey, mobile }),
        })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({ icon: 'success', title: 'Test SMS Sent!', text: data.message, timer: 2500, showConfirmButton: false });
                } else {
                    Swal.fire({ icon: 'error', title: 'Failed', text: data.message, confirmButtonColor: '#303d89' });
                }
            })
            .catch(() => {
                Swal.fire({ icon: 'error', title: 'Error', text: 'Something went wrong. Please try again.', confirmButtonColor: '#303d89' });
            });
    }

    /* ── Init: populate char counts and previews for all SMS panels ── */
    document.addEventListener('DOMContentLoaded', function () {
        @foreach (\App\Models\SmsTemplate::$eventKeys as $evKey)
            updateSmsCharCount('{{ $evKey }}');
            updateSmsPreview('{{ $evKey }}');
        @endforeach
    });
</script>

<script>
    /* ════════════════════════════════════════════════
       EMAIL TEMPLATE JS — mirrors SMS JS
    ════════════════════════════════════════════════ */
    const EMAIL_SAMPLE = {
        // Customer (business / service enquiry)
        '{customer_name}': 'Rahul Sharma',
        '{customer_email}': 'rahul@example.com',
        '{customer_mobile}': '+91 98765 43210',
        '{service}': 'Website Development',
        '{message}': 'I would like a quote for a 10 page business website.',

        // Candidate (career form)
        '{candidate_name}': 'Priya Verma',
        '{candidate_email}': 'priya@example.com',
        '{candidate_mobile}': '+91 91234 56789',
        '{position}': 'Laravel Developer',
        '{apply_type}': 'Job',

        // Global
        '{brand_name}': 'Web Mingo',
        '{site_url}': '{{ url('/') }}',
        '{logo_url}': '{{ asset('assets/images/logo.png') }}',
    };

    /* ── Email nav switcher ── */
    let activeEmailEvent = '{{ \App\Models\EmailTemplate::$eventKeys[0] }}';

    function switchEmailTemplate(evKey, navItem) {
        document.querySelectorAll('#panel-email .sp-sidenav-item').forEach(i => i.classList.remove('active'));
        navItem.classList.add('active');
        document.getElementById('email-panel-' + activeEmailEvent).style.display = 'none';
        activeEmailEvent = evKey;
        document.getElementById('email-panel-' + evKey).style.display = 'block';
    }

    /* ── Insert variable at cursor ── */
    function insertEmailVar(textareaId, variable) {
        const ta = document.getElementById(textareaId);
        if (!ta) return;
        const s = ta.selectionStart, e = ta.selectionEnd;
        ta.value = ta.value.substring(0, s) + variable + ta.value.substring(e);
        ta.selectionStart = ta.selectionEnd = s + variable.length;
        ta.focus();
        const evKey = textareaId.replace('email-body-', '');
        updateEmailPreview(evKey);
    }

    /* ── Replace variables with sample data ── */
    function applyEmailSamples(text) {
        Object.keys(EMAIL_SAMPLE).forEach(k => {
            text = text.split(k).join(EMAIL_SAMPLE[k]);
        });
        return text;
    }

    /* ── Live preview ── */
    function updateEmailPreview(evKey) {
        const ta = document.getElementById('email-body-' + evKey);
        if (!ta) return;
        const previewBody = document.getElementById('email-preview-body-' + evKey);
        if (previewBody) {
            previewBody.innerHTML = ta.value
                ? applyEmailSamples(ta.value)
                : '<em style="color:var(--text-hint)">Template body is empty</em>';
        }
    }

    function updateEmailPreviewHeader(evKey) {
        const subjectInput = document.getElementById('email-subject-' + evKey);
        const subjectEl = document.getElementById('email-preview-subject-' + evKey);
        if (subjectInput && subjectEl) {
            subjectEl.innerHTML = '<span>Sub:</span><span>' + applyEmailSamples(subjectInput.value) + '</span>';
        }
    }

    /* ── Status toggle ── */
    function toggleEmailStatus(evKey, cb) {
        const bar = document.getElementById('email-status-bar-' + evKey);
        const text = document.getElementById('email-status-text-' + evKey);
        const sub = document.getElementById('email-status-sub-' + evKey);
        if (cb.checked) {
            bar.classList.remove('inactive');
            text.innerHTML = '<i class="fa fa-check-circle" style="margin-right:6px"></i>Template is active';
            sub.textContent = 'Email will be sent after mobile OTP verification';
        } else {
            bar.classList.add('inactive');
            text.textContent = 'Template is disabled';
            sub.textContent = 'Enable to activate this email event';
        }
    }

    /* ── Save a single email template (AJAX) ── */
    function saveEmailTemplateFor(evKey) {
        const payload = {
            _token: '{{ csrf_token() }}',
            enabled: document.getElementById('email-enabled-' + evKey)?.checked ? 1 : 0,
            from_name: document.getElementById('email-from-name-' + evKey)?.value ?? '',
            from_email: document.getElementById('email-from-email-' + evKey)?.value ?? '',
            reply_to_email: document.getElementById('email-reply-email-' + evKey)?.value ?? '',
            cc: document.getElementById('email-cc-' + evKey)?.value ?? '',
            subject: document.getElementById('email-subject-' + evKey)?.value ?? '',
            preview_text: document.getElementById('email-preview-text-' + evKey)?.value ?? '',
            body: document.getElementById('email-body-' + evKey)?.value ?? '',
        };

        const note = document.getElementById('email-save-note-' + evKey);
        if (note) note.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving…';

        fetch(`{{ url('admin/settings/email-templates') }}/${evKey}`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify(payload),
        })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    if (note) note.innerHTML = '<i class="fa fa-check-circle" style="color:var(--green)"></i> <span style="color:var(--green)">Saved</span>';
                    updateEmailNavBadge(evKey, payload.enabled, payload.body);
                    Swal.fire({ icon: 'success', title: 'Template Saved!', text: data.message, timer: 1800, showConfirmButton: false });
                } else {
                    if (note) note.innerHTML = '<i class="fa fa-exclamation-circle" style="color:var(--red)"></i> <span style="color:var(--red)">Error saving</span>';
                    Swal.fire({ icon: 'error', title: 'Error', text: data.message, confirmButtonColor: '#303d89' });
                }
            })
            .catch(() => {
                if (note) note.innerHTML = '<i class="fa fa-exclamation-circle" style="color:var(--red)"></i> <span style="color:var(--red)">Network error</span>';
                Swal.fire({ icon: 'error', title: 'Network Error', text: 'Could not reach the server.', confirmButtonColor: '#303d89' });
            });
    }

    /* ── Update nav badge after save ── */
    function updateEmailNavBadge(evKey, enabled, body) {
        const badge = document.getElementById('email-nav-badge-' + evKey);
        if (!badge) return;
        badge.className = 'sp-sidenav-badge';
        if (enabled) {
            badge.className += ' active-badge'; badge.textContent = 'On';
        } else if (body && body.trim()) {
            badge.className += ' draft-badge'; badge.textContent = 'Draft';
        } else {
            badge.className += ' off-badge'; badge.textContent = 'Off';
        }
    }

    /* ── Test modal ── */
    function openEmailTestModal(evKey) {
        document.getElementById('emailTestEventKey').value = evKey;
        document.getElementById('emailTestModal').classList.add('open');
    }
    function closeEmailModal() {
        document.getElementById('emailTestModal').classList.remove('open');
    }
    document.getElementById('emailTestModal').addEventListener('click', function (e) {
        if (e.target === this) closeEmailModal();
    });

    function sendEmailTest() {
        const email = document.getElementById('emailTestAddress').value.trim();
        const evKey = document.getElementById('emailTestEventKey').value;
        if (!email) {
            Swal.fire({ icon: 'warning', title: 'Email required', text: 'Enter an email address to send the test.', confirmButtonColor: '#303d89' });
            return;
        }
        closeEmailModal();
        Swal.fire({ title: 'Sending…', allowOutsideClick: false, didOpen: () => Swal.showLoading() });

        fetch('{{ route('admin.settings.email-templates.test') }}', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ event_key: evKey, email }),
        })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({ icon: 'success', title: 'Test Email Sent!', text: data.message, timer: 2500, showConfirmButton: false });
                } else {
                    Swal.fire({ icon: 'error', title: 'Failed', text: data.message, confirmButtonColor: '#303d89' });
                }
            })
            .catch(() => {
                Swal.fire({ icon: 'error', title: 'Error', text: 'Something went wrong.', confirmButtonColor: '#303d89' });
            });
    }

    /* ── Init: populate all email previews on load ── */
    document.addEventListener('DOMContentLoaded', function () {
        @foreach (\App\Models\EmailTemplate::$eventKeys as $evKey)
            updateEmailPreview('{{ $evKey }}');
            updateEmailPreviewHeader('{{ $evKey }}');
        @endforeach
    });
</script>