@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.faqs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

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

            <form action="{{ route('admin.faqs.store') }}" method="POST">
                @csrf
                @include('admin.faqs._form', ['faq' => null])
            </form>

        </div>
    </div>
</div>

@include('admin.footer')