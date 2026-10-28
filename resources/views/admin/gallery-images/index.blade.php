@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Image Gallery</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Image Gallery
                    </div>
                </div>
                <a href="{{ route('admin.gallery-images.create') }}" class="btn-primary-dash">
                    <i class="fa fa-plus"></i> Add Image
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
                                <th style="width:90px">Image</th>
                                <th>Title</th>
                                <th style="width:180px">Sub Title</th>
                                <th style="width:80px">Order</th>
                                <th style="width:110px">Status</th>
                                <th style="width:90px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($images as $image)
                                <tr id="row{{ $image->id }}">
                                    <td><span class="id-chip">{{ $image->id }}</span></td>

                                    <td>
                                        @if($image->image_url)
                                            <img src="{{ $image->image_url }}" alt="" class="blog-thumb">
                                        @else
                                            <div class="blog-thumb"></div>
                                        @endif
                                    </td>

                                    <td><div class="question-text">{{ $image->title }}</div></td>

                                    <td>
                                        @if($image->subtitle)
                                            <span class="pill pill-type">{{ $image->subtitle }}</span>
                                        @else
                                            —
                                        @endif
                                    </td>

                                    <td><span class="id-chip">{{ $image->sort_order }}</span></td>

                                    <td>
                                        @if($image->status)
                                            <span class="pill pill-active">Active</span>
                                        @else
                                            <span class="pill pill-inactive">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div style="display:flex;gap:6px">
                                            <a href="{{ route('admin.gallery-images.edit', $image->id) }}" class="action-btn" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button class="action-btn action-btn-danger"
                                                onclick="deleteImage({{ $image->id }})" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="empty-state">
                                            <div class="empty-icon"><i class="fa fa-picture-o"></i></div>
                                            <strong style="font-size:14px;color:var(--text-primary)">No gallery images found</strong>
                                            <p>Add images to show them on the Image Gallery page.</p>
                                            <a href="{{ route('admin.gallery-images.create') }}" class="btn-primary-dash">
                                                <i class="fa fa-plus"></i> Add Image
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
function deleteImage(id) {
    Swal.fire({
        title: 'Delete Image?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#b22222',
        cancelButtonColor: '#6d7175',
        confirmButtonText: 'Yes, Delete'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ url('admin/gallery-images') }}/" + id,
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