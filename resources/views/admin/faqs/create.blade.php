@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.faqs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <!-- Page header -->
            <div class="page-header">
                <div>
                    <h1>Add FAQ</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.faqs.index') }}">Manage FAQ</a>
                        <span>›</span>
                        Add FAQ
                    </div>
                </div>
            </div>

            <form id="faqForm" method="POST" action="{{ route('admin.faqs.store') }}">
                @csrf

                @include('admin.faqs._form', ['faq' => null])

                <!-- Action bar -->
                <div class="action-bar">
                    <a href="{{ route('admin.faqs.index') }}" class="btn-secondary-dash">Cancel</a>
                    <button type="submit" id="saveBtn" class="btn-primary-dash" data-loading="Saving...">
                        <i class="fa-solid fa-save"></i> Save FAQ
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

@include('admin.footer')

@include('admin.faqs._form-script')