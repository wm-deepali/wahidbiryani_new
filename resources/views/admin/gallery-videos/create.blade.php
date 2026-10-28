@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Add Gallery Video</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.gallery-videos.index') }}">Video Gallery</a>
                        <span>›</span>
                        Add Video
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.gallery-videos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.gallery-videos._form', ['video' => null])
            </form>

        </div>
    </div>
</div>

@include('admin.footer')