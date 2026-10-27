@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Manage Blogs</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Manage Blogs
                    </div>
                </div>
                <a href="{{ route('admin.blogs.create') }}" class="btn-primary-dash">
                    <i class="fa fa-plus"></i> Add Blog
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
                                <th style="width:80px">Image</th>
                                <th>Title</th>
                                <th style="width:140px">Category</th>
                                <th style="width:120px">Published</th>
                                <th style="width:80px">Order</th>
                                <th style="width:110px">Status</th>
                                <th style="width:90px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($blogs as $blog)
                                <tr id="row{{ $blog->id }}">
                                    <td><span class="id-chip">{{ $blog->id }}</span></td>

                                    <td>
                                        @if($blog->image_url)
                                            <img src="{{ $blog->image_url }}" alt="" class="blog-thumb">
                                        @else
                                            <div class="blog-thumb"></div>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="question-text">{{ $blog->title }}</div>
                                        <div class="target-text">/{{ $blog->slug }}</div>
                                    </td>

                                    <td>
                                        @if($blog->primary_category)
                                            <span class="pill pill-type">{{ $blog->primary_category }}</span>
                                        @else
                                            —
                                        @endif
                                    </td>

                                    <td>{{ optional($blog->published_at)->format('d M Y') ?? '—' }}</td>

                                    <td><span class="id-chip">{{ $blog->sort_order }}</span></td>

                                    <td>
                                        @if($blog->status)
                                            <span class="pill pill-active">Active</span>
                                        @else
                                            <span class="pill pill-inactive">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div style="display:flex;gap:6px">
                                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="action-btn" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button class="action-btn action-btn-danger"
                                                onclick="deleteBlog({{ $blog->id }})" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">
                                        <div class="empty-state">
                                            <div class="empty-icon"><i class="fa fa-newspaper-o"></i></div>
                                            <strong style="font-size:14px;color:var(--text-primary)">No blogs found</strong>
                                            <p>Add your first article to show it on the website.</p>
                                            <a href="{{ route('admin.blogs.create') }}" class="btn-primary-dash">
                                                <i class="fa fa-plus"></i> Add Blog
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
function deleteBlog(id) {
    Swal.fire({
        title: 'Delete Blog?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#b22222',
        cancelButtonColor: '#6d7175',
        confirmButtonText: 'Yes, Delete'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ url('admin/blogs') }}/" + id,
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