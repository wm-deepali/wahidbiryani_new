@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.faqs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

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
                <div class="faq-identity">
                    <div class="faq-identity-icon"><i class="fa fa-question-circle"></i></div>
                    <div>
                        <div class="question-text">{{ \Illuminate\Support\Str::limit($faq->question, 40) }}</div>
                        <div class="faq-identity-id">ID #{{ $faq->id }}</div>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.faqs._form', ['faq' => $faq])
            </form>

        </div>
    </div>
</div>

@include('admin.footer')