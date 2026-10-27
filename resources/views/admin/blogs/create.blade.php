@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Add Blog</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.blogs.index') }}">Manage Blogs</a>
                        <span>›</span>
                        Add Blog
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.blogs._form', ['blog' => null])
            </form>

        </div>
    </div>
</div>

@include('admin.footer')