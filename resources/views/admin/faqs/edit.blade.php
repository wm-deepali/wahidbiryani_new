@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.faqs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <!-- Page header -->
            <div class="page-header">
                <div>
                    <h1>Edit FAQ</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.faqs.index') }}">Manage FAQ</a>
                        <span>›</span>
                        Edit FAQ
                    </div>
                </div>

                <!-- Identity chip -->
                <div class="faq-identity">
                    <div class="faq-identity-icon"><i class="fa fa-question"></i></div>
                    <div>
                        <div style="font-size:13px;font-weight:600;color:var(--text-primary);max-width:260px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                            {{ $faq->question }}
                        </div>
                        <div class="faq-identity-id">ID #{{ $faq->id }}</div>
                    </div>
                </div>
            </div>

            <form id="faqForm" method="POST" action="{{ route('admin.faqs.update', $faq->id) }}">
                @csrf
                @method('PUT')

                @include('admin.faqs._form', ['faq' => $faq])

                <!-- Action bar -->
                <div class="action-bar">
                    <a href="{{ route('admin.faqs.index') }}" class="btn-secondary-dash">Cancel</a>
                    <button type="submit" id="saveBtn" class="btn-primary-dash" data-loading="Updating...">
                        <i class="fa-solid fa-save"></i> Update FAQ
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

@include('admin.footer')

@include('admin.faqs._form-script')