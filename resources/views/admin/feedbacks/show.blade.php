@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Feedback #{{ $feedback->id }}</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.feedbacks.index') }}">Feedback</a>
                        <span>›</span>
                        View
                    </div>
                </div>
                <a href="{{ route('admin.feedbacks.index') }}" class="btn-secondary-dash">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>

            <div class="faq-layout">

                <!-- Left: message -->
                <div>
                    <div class="section-card">
                        <div class="section-card-header"><h5>Feedback</h5></div>
                        <div class="section-card-body">
                            <div class="field-group">
                                <span class="field-label">Outlet Visited</span>
                                <span class="pill pill-type">{{ $feedback->outlet ?: '—' }}</span>
                            </div>
                            <div class="field-group">
                                <span class="field-label">Message</span>
                                <div style="font-size:14px;line-height:1.7;color:var(--text-primary)">{!! nl2br(e($feedback->message)) !!}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: sender -->
                <div>
                    <div class="section-card">
                        <div class="section-card-header"><h5>Sender</h5></div>
                        <div class="section-card-body">
                            <div class="info-row">
                                <span class="info-label">Name</span>
                                <span class="info-value">{{ $feedback->name }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Email</span>
                                <span class="info-value">{{ $feedback->email }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Phone</span>
                                <span class="info-value">{{ $feedback->phone }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Received</span>
                                <span class="info-value">{{ $feedback->created_at->format('d M Y, h:i A') }}</span>
                            </div>
                            @if($feedback->ip_address)
                                <div class="info-row">
                                    <span class="info-label">IP</span>
                                    <span class="info-value">{{ $feedback->ip_address }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="section-card">
                        <div class="section-card-header"><h5>Reply</h5></div>
                        <div class="section-card-body" style="display:flex;flex-direction:column;gap:10px">
                            <a href="mailto:{{ $feedback->email }}?subject={{ rawurlencode('Thank you for your feedback') }}"
                                class="btn-primary-dash" style="justify-content:center">
                                <i class="fa fa-envelope"></i> Reply by Email
                            </a>
                            <a href="tel:{{ \App\Models\Outlet::telNumber($feedback->phone) }}"
                                class="btn-secondary-dash" style="justify-content:center">
                                <i class="fa fa-phone"></i> Call
                            </a>
                            <a href="{{ \App\Models\Outlet::whatsappUrl($feedback->phone) }}" target="_blank" rel="noopener"
                                class="btn-secondary-dash" style="justify-content:center">
                                <i class="fa fa-whatsapp"></i> WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@include('admin.footer')