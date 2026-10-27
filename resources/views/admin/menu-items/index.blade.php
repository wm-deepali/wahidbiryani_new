@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Menu Items</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Menu Items
                    </div>
                </div>
                <div style="display:flex;gap:8px;flex-wrap:wrap">
                    <a href="{{ route('admin.menu-categories.index') }}" class="btn-secondary-dash">
                        <i class="fa fa-list"></i> Categories
                    </a>
                    <a href="{{ route('admin.menu-items.create', $categoryId ? ['category' => $categoryId] : []) }}" class="btn-primary-dash">
                        <i class="fa fa-plus"></i> Add Item
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="flash-success">{{ session('success') }}</div>
            @endif

            <!-- Category filter tabs -->
            <div class="filter-tabs">
                <a href="{{ route('admin.menu-items.index') }}" class="filter-tab {{ !$categoryId ? 'active' : '' }}">
                    All <small>{{ $categories->sum('items_count') }}</small>
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('admin.menu-items.index', ['category' => $category->id]) }}"
                        class="filter-tab {{ (string) $categoryId === (string) $category->id ? 'active' : '' }}">
                        {{ $category->name }} <small>{{ $category->items_count }}</small>
                    </a>
                @endforeach
            </div>

            <div class="faq-card">
                <div class="faq-table-wrap">
                    <table class="faq-table">
                        <thead>
                            <tr>
                                <th style="width:60px">ID</th>
                                <th>Item</th>
                                <th style="width:200px">Category</th>
                                <th style="width:140px">Serving</th>
                                <th style="width:90px">Price</th>
                                <th style="width:80px">Order</th>
                                <th style="width:110px">Status</th>
                                <th style="width:90px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($items as $item)
                                <tr id="row{{ $item->id }}">
                                    <td><span class="id-chip">{{ $item->id }}</span></td>

                                    <td>
                                        <div class="question-text">{{ $item->title }}</div>
                                        <div class="target-text">{{ \Illuminate\Support\Str::limit($item->description, 80) }}</div>
                                    </td>

                                    <td><span class="pill pill-type">{{ $item->category->name ?? '—' }}</span></td>

                                    <td>{{ $item->serving ?: '—' }}</td>

                                    <td><strong>{{ $item->price !== null && $item->price !== '' ? $item->displayPrice() : '—' }}</strong></td>

                                    <td><span class="id-chip">{{ $item->sort_order }}</span></td>

                                    <td>
                                        @if($item->status)
                                            <span class="pill pill-active">Active</span>
                                        @else
                                            <span class="pill pill-inactive">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div style="display:flex;gap:6px">
                                            <a href="{{ route('admin.menu-items.edit', $item->id) }}" class="action-btn" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button class="action-btn action-btn-danger"
                                                onclick="deleteItem({{ $item->id }})" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">
                                        <div class="empty-state">
                                            <div class="empty-icon"><i class="fa fa-cutlery"></i></div>
                                            <strong style="font-size:14px;color:var(--text-primary)">No menu items found</strong>
                                            <p>Add dishes to show them on the menu page.</p>
                                            <a href="{{ route('admin.menu-items.create') }}" class="btn-primary-dash">
                                                <i class="fa fa-plus"></i> Add Item
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
function deleteItem(id) {
    Swal.fire({
        title: 'Delete Menu Item?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#b22222',
        cancelButtonColor: '#6d7175',
        confirmButtonText: 'Yes, Delete'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ url('admin/menu-items') }}/" + id,
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