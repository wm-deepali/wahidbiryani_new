@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Enquiry #{{ $enquiry->id }}</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.contact-enquiries.index') }}">Contact Enquiries</a>
                        <span>›</span>
                        View
                    </div>
                </div>
                <a href="{{ route('admin.contact-enquiries.index') }}" class="btn-secondary-dash">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>

            <div class="faq-layout">

                <!-- Left: message -->
                <div>
                    <div class="section-card">
                        <div class="section-card-header"><h5>Message</h5></div>
                        <div class="section-card-body">
                            <div class="field-group">
                                <span class="field-label">Request Type</span>
                                <span class="pill pill-type">{{ $enquiry->request_type }}</span>
                            </div>
                            <div class="field-group">
                                <span class="field-label">Message</span>
                                <div style="font-size:14px;line-height:1.7;color:var(--text-primary)">{!! nl2br(e($enquiry->message)) !!}</div>
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
                                <span class="info-value">{{ $enquiry->name }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Email</span>
                                <span class="info-value">{{ $enquiry->email }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Phone</span>
                                <span class="info-value">{{ $enquiry->phone }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Received</span>
                                <span class="info-value">{{ $enquiry->created_at->format('d M Y, h:i A') }}</span>
                            </div>
                            @if($enquiry->ip_address)
                                <div class="info-row">
                                    <span class="info-label">IP</span>
                                    <span class="info-value">{{ $enquiry->ip_address }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="section-card">
                        <div class="section-card-header"><h5>Reply</h5></div>
                        <div class="section-card-body" style="display:flex;flex-direction:column;gap:10px">
                            <a href="mailto:{{ $enquiry->email }}?subject={{ rawurlencode('Re: ' . $enquiry->request_type) }}"
                                class="btn-primary-dash" style="justify-content:center">
                                <i class="fa fa-envelope"></i> Reply by Email
                            </a>
                            <a href="tel:{{ \App\Models\Outlet::telNumber($enquiry->phone) }}"
                                class="btn-secondary-dash" style="justify-content:center">
                                <i class="fa fa-phone"></i> Call
                            </a>
                            <a href="{{ \App\Models\Outlet::whatsappUrl($enquiry->phone) }}" target="_blank" rel="noopener"
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