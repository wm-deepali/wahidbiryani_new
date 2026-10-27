@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Franchise Enquiries</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Franchise Enquiries
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="flash-success">{{ session('success') }}</div>
            @endif

            <!-- Filter tabs -->
            <div class="filter-tabs">
                <a href="{{ route('admin.franchise-enquiries.index') }}" class="filter-tab {{ !$filter ? 'active' : '' }}">
                    All <small>{{ $counts['all'] }}</small>
                </a>
                <a href="{{ route('admin.franchise-enquiries.index', ['filter' => 'unread']) }}"
                    class="filter-tab {{ $filter === 'unread' ? 'active' : '' }}">
                    Unread <small>{{ $counts['unread'] }}</small>
                </a>
            </div>

            <div class="faq-card">
                <div class="faq-table-wrap">
                    <table class="faq-table">
                        <thead>
                            <tr>
                                <th style="width:60px">ID</th>
                                <th>Name</th>
                                <th style="width:240px">Contact</th>
                                <th style="width:200px">City / Budget</th>
                                <th style="width:130px">Received</th>
                                <th style="width:90px">Status</th>
                                <th style="width:90px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($enquiries as $row)
                                <tr id="row{{ $row->id }}">
                                    <td><span class="id-chip">{{ $row->id }}</span></td>

                                    <td>
                                        <div class="question-text" style="{{ $row->is_read ? 'font-weight:500' : '' }}">{{ $row->name }}</div>
                                        <div class="target-text">{{ \Illuminate\Support\Str::limit($row->message, 60) }}</div>
                                    </td>

                                    <td>
                                        <div>{{ $row->email }}</div>
                                        <div class="target-text">{{ $row->phone }}</div>
                                    </td>

                                    <td>
                                        <span class="pill pill-type">{{ $row->city }}</span>
                                        <div class="target-text">{{ $row->budget }}</div>
                                    </td>

                                    <td>{{ $row->created_at->format('d M Y') }}<div class="target-text">{{ $row->created_at->format('h:i A') }}</div></td>

                                    <td>
                                        @if($row->is_read)
                                            <span class="pill pill-active">Read</span>
                                        @else
                                            <span class="pill pill-inactive">New</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div style="display:flex;gap:6px">
                                            <a href="{{ route('admin.franchise-enquiries.show', $row->id) }}" class="action-btn" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <button class="action-btn action-btn-danger"
                                                onclick="deleteRow({{ $row->id }})" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="empty-state">
                                            <div class="empty-icon"><i class="fa fa-handshake-o"></i></div>
                                            <strong style="font-size:14px;color:var(--text-primary)">No franchise enquiries yet</strong>
                                            <p>Applications sent from the franchise page will appear here.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

            @if($enquiries->hasPages())
                <div style="margin-top:16px">{{ $enquiries->links() }}</div>
            @endif

        </div>
    </div>
</div>

@include('admin.footer')

<script>
function deleteRow(id) {
    Swal.fire({
        title: 'Delete Enquiry?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#b22222',
        cancelButtonColor: '#6d7175',
        confirmButtonText: 'Yes, Delete'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ url('admin/franchise-enquiries') }}/" + id,
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