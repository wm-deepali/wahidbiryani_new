@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Edit Blog</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.blogs.index') }}">Manage Blogs</a>
                        <span>›</span>
                        Edit Blog
                    </div>
                </div>
                <div class="faq-identity">
                    <div class="faq-identity-icon"><i class="fa fa-newspaper-o"></i></div>
                    <div>
                        <div class="question-text">{{ \Illuminate\Support\Str::limit($blog->title, 40) }}</div>
                        <div class="faq-identity-id">ID #{{ $blog->id }}</div>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.blogs._form', ['blog' => $blog])
            </form>

        </div>
    </div>
</div>

@include('admin.footer')