@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Video Gallery</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Video Gallery
                    </div>
                </div>
                <a href="{{ route('admin.gallery-videos.create') }}" class="btn-primary-dash">
                    <i class="fa fa-plus"></i> Add Video
                </a>
            </div>

            @if(session('success'))
                <div class="flash-success">{{ session('success') }}</div>
            @endif

            <div class="faq-card">
                <div class="faq-table-wrap">
                    <table class="faq-table">
                        <thead>
                            <tr>
                                <th style="width:60px">ID</th>
                                <th style="width:90px">Thumb</th>
                                <th>Title</th>
                                <th style="width:130px">Platform</th>
                                <th style="width:80px">Order</th>
                                <th style="width:110px">Status</th>
                                <th style="width:120px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($videos as $video)
                                <tr id="row{{ $video->id }}">
                                    <td><span class="id-chip">{{ $video->id }}</span></td>

                                    <td>
                                        @if($video->thumbnail_url)
                                            <img src="{{ $video->thumbnail_url }}" alt="" class="blog-thumb">
                                        @else
                                            <div class="blog-thumb"></div>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="question-text">{{ $video->title }}</div>
                                        <div class="target-text">{{ $video->subtitle }}</div>
                                    </td>

                                    <td><span class="pill pill-type">{{ $video->platform_label }}</span></td>

                                    <td><span class="id-chip">{{ $video->sort_order }}</span></td>

                                    <td>
                                        @if($video->status)
                                            <span class="pill pill-active">Active</span>
                                        @else
                                            <span class="pill pill-inactive">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div style="display:flex;gap:6px">
                                            <a href="{{ $video->open_url }}" target="_blank" rel="noopener" class="action-btn" title="Open video">
                                                <i class="fa fa-external-link"></i>
                                            </a>
                                            <a href="{{ route('admin.gallery-videos.edit', $video->id) }}" class="action-btn" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button class="action-btn action-btn-danger"
                                                onclick="deleteVideo({{ $video->id }})" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="empty-state">
                                            <div class="empty-icon"><i class="fa fa-video-camera"></i></div>
                                            <strong style="font-size:14px;color:var(--text-primary)">No gallery videos found</strong>
                                            <p>Add a YouTube, Facebook or Instagram link to show it on the Video Gallery page.</p>
                                            <a href="{{ route('admin.gallery-videos.create') }}" class="btn-primary-dash">
                                                <i class="fa fa-plus"></i> Add Video
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')

<script>
function deleteVideo(id) {
    Swal.fire({
        title: 'Delete Video?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#b22222',
        cancelButtonColor: '#6d7175',
        confirmButtonText: 'Yes, Delete'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ url('admin/gallery-videos') }}/" + id,
                type: "DELETE",
                data: { _token: "{{ csrf_token() }}" },
                beforeSend: function () { Swal.showLoading(); },
                success: function (res) {
                    Swal.fire('Deleted!', res.message, 'success');
                    $("#row" + id).fadeOut(400, function () { $(this).remove(); });
                },
                error: function () {
                    Swal.fire('Error!', 'Something went wrong.', 'error');
                }
            });
        }
    });
}
</script>