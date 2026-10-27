@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Add Outlet</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.outlets.index') }}">Manage Outlets</a>
                        <span>›</span>
                        Add Outlet
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.outlets.store') }}" method="POST">
                @csrf
                @include('admin.outlets._form', ['outlet' => null])
            </form>

        </div>
    </div>
</div>

@include('admin.footer')e