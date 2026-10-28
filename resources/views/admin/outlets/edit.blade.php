@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Edit Outlet</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.outlets.index') }}">Manage Outlets</a>
                        <span>›</span>
                        Edit Outlet
                    </div>
                </div>
                <div class="faq-identity">
                    <div class="faq-identity-icon"><i class="fa fa-map-marker"></i></div>
                    <div>
                        <div class="question-text">{{ \Illuminate\Support\Str::limit($outlet->name, 40) }}</div>
                        <div class="faq-identity-id">ID #{{ $outlet->id }}</div>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.outlets.update', $outlet->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.outlets._form', ['outlet' => $outlet])
            </form>

        </div>
    </div>
</div>

@include('admin.footer')