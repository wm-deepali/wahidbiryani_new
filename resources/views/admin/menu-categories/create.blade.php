@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Add Category</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.menu-categories.index') }}">Menu Categories</a>
                        <span>›</span>
                        Add Category
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.menu-categories.store') }}" method="POST">
                @csrf
                @include('admin.menu-categories._form', ['category' => null])
            </form>

        </div>
    </div>
</div>

@include('admin.footer')