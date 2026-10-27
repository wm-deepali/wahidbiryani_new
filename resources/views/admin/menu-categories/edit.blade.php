@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Edit Category</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.menu-categories.index') }}">Menu Categories</a>
                        <span>›</span>
                        Edit Category
                    </div>
                </div>
                <div class="faq-identity">
                    <div class="faq-identity-icon"><i class="fa fa-list"></i></div>
                    <div>
                        <div class="question-text">{{ \Illuminate\Support\Str::limit($category->name, 40) }}</div>
                        <div class="faq-identity-id">ID #{{ $category->id }}</div>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.menu-categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.menu-categories._form', ['category' => $category])
            </form>

        </div>
    </div>
</div>

@include('admin.footer')