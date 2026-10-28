@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Edit Gallery Image</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.gallery-images.index') }}">Image Gallery</a>
                        <span>›</span>
                        Edit Image
                    </div>
                </div>
                <div class="faq-identity">
                    <div class="faq-identity-icon"><i class="fa fa-picture-o"></i></div>
                    <div>
                        <div class="question-text">{{ \Illuminate\Support\Str::limit($image->title, 40) }}</div>
                        <div class="faq-identity-id">ID #{{ $image->id }}</div>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.gallery-images.update', $image->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.gallery-images._form', ['image' => $image])
            </form>

        </div>
    </div>
</div>

@include('admin.footer')