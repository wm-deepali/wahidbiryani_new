@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Menu Categories</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Menu Categories
                    </div>
                </div>
                <div style="display:flex;gap:8px;flex-wrap:wrap">
                    <a href="{{ route('admin.menu-items.index') }}" class="btn-secondary-dash">
                        <i class="fa fa-cutlery"></i> Menu Items
                    </a>
                    <a href="{{ route('admin.menu-categories.create') }}" class="btn-primary-dash">
                        <i class="fa fa-plus"></i> Add Category
                    </a>
                </div>
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
                                <th>Category</th>
                                <th style="width:100px">Items</th>
                                <th style="width:80px">Order</th>
                                <th style="width:110px">Status</th>
                                <th style="width:90px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($categories as $category)
                                <tr id="row{{ $category->id }}">
                                    <td><span class="id-chip">{{ $category->id }}</span></td>

                                    <td>
                                        <div class="question-text">{{ $category->name }}</div>
                                        <div class="target-text">{{ $category->slug }}</div>
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.menu-items.index', ['category' => $category->id]) }}"
                                            class="pill pill-type" style="text-decoration:none">{{ $category->items_count }}</a>
                                    </td>

                                    <td><span class="id-chip">{{ $category->sort_order }}</span></td>

                                    <td>
                                        @if($category->status)
                                            <span class="pill pill-active">Active</span>
                                        @else
                                            <span class="pill pill-inactive">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div style="display:flex;gap:6px">
                                            <a href="{{ route('admin.menu-categories.edit', $category->id) }}" class="action-btn" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button class="action-btn action-btn-danger"
                                                onclick="deleteCategory({{ $category->id }})" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <div class="empty-icon"><i class="fa fa-list"></i></div>
                                            <strong style="font-size:14px;color:var(--text-primary)">No categories found</strong>
                                            <p>Add a category first, then add menu items to it.</p>
                                            <a href="{{ route('admin.menu-categories.create') }}" class="btn-primary-dash">
                                                <i class="fa fa-plus"></i> Add Category
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
function deleteCategory(id) {
    Swal.fire({
        title: 'Delete Category?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#b22222',
        cancelButtonColor: '#6d7175',
        confirmButtonText: 'Yes, Delete'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ url('admin/menu-categories') }}/" + id,
                type: "DELETE",
                data: { _token: "{{ csrf_token() }}" },
                beforeSend: function () { Swal.showLoading(); },
                success: function (res) {
                    Swal.fire('Deleted!', res.message, 'success');
                    $("#row" + id).fadeOut(400, function () { $(this).remove(); });
                },
                error: function (xhr) {
                    var msg = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : 'Something went wrong.';
                    Swal.fire('Error!', msg, 'error');
                }
            });
        }
    });
}
</script>