@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Manage Outlets</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Manage Outlets
                    </div>
                </div>
                <a href="{{ route('admin.outlets.create') }}" class="btn-primary-dash">
                    <i class="fa fa-plus"></i> Add Outlet
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
                                <th>Outlet</th>
                                <th style="width:240px">Phones</th>
                                <th style="width:150px">Order Online</th>
                                <th style="width:80px">Order</th>
                                <th style="width:110px">Status</th>
                                <th style="width:90px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($outlets as $outlet)
                                <tr id="row{{ $outlet->id }}">
                                    <td><span class="id-chip">{{ $outlet->id }}</span></td>

                                    <td>
                                        <div style="display:flex;align-items:center;gap:12px">
                                            @if($outlet->image)
                                                <img src="{{ asset($outlet->image) }}" alt=""
                                                    style="width:48px;height:48px;object-fit:cover;border-radius:8px;flex-shrink:0">
                                            @endif
                                            <div>
                                                <div class="question-text">
                                                    {{ $outlet->name }}
                                                    @if($outlet->is_flagship)
                                                        <i class="fa fa-star" style="color:#c49a45" title="Flagship"></i>
                                                    @endif
                                                </div>
                                                <div class="target-text">{{ \Illuminate\Support\Str::limit($outlet->address, 70) }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>{{ $outlet->phones ?: '—' }}</td>

                                    <td>{{ $outlet->order_platforms ?: 'Call only' }}</td>

                                    <td><span class="id-chip">{{ $outlet->sort_order }}</span></td>

                                    <td>
                                        @if($outlet->status)
                                            <span class="pill pill-active">Active</span>
                                        @else
                                            <span class="pill pill-inactive">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div style="display:flex;gap:6px">
                                            <a href="{{ route('admin.outlets.edit', $outlet->id) }}" class="action-btn" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button class="action-btn action-btn-danger"
                                                onclick="deleteOutlet({{ $outlet->id }})" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="empty-state">
                                            <div class="empty-icon"><i class="fa fa-map-marker"></i></div>
                                            <strong style="font-size:14px;color:var(--text-primary)">No outlets found</strong>
                                            <p>Add your outlets to show them on the website.</p>
                                            <a href="{{ route('admin.outlets.create') }}" class="btn-primary-dash">
                                                <i class="fa fa-plus"></i> Add Outlet
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
function deleteOutlet(id) {
    Swal.fire({
        title: 'Delete Outlet?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#b22222',
        cancelButtonColor: '#6d7175',
        confirmButtonText: 'Yes, Delete'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ url('admin/outlets') }}/" + id,
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