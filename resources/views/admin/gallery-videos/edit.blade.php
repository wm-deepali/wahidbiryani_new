@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Edit Gallery Video</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.gallery-videos.index') }}">Video Gallery</a>
                        <span>›</span>
                        Edit Video
                    </div>
                </div>
                <div class="faq-identity">
                    <div class="faq-identity-icon"><i class="fa fa-video-camera"></i></div>
                    <div>
                        <div class="question-text">{{ \Illuminate\Support\Str::limit($video->title, 40) }}</div>
                        <div class="faq-identity-id">ID #{{ $video->id }}</div>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.gallery-videos.update', $video->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.gallery-videos._form', ['video' => $video])
            </form>

        </div>
    </div>
</div>

@include('admin.footer')