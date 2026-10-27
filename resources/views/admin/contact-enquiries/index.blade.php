@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Contact Enquiries</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Contact Enquiries
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="flash-success">{{ session('success') }}</div>
            @endif

            <!-- Filter tabs -->
            <div class="filter-tabs">
                <a href="{{ route('admin.contact-enquiries.index') }}" class="filter-tab {{ !$filter ? 'active' : '' }}">
                    All <small>{{ $counts['all'] }}</small>
                </a>
                <a href="{{ route('admin.contact-enquiries.index', ['filter' => 'unread']) }}"
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
                                <th style="width:200px">Request</th>
                                <th style="width:130px">Received</th>
                                <th style="width:90px">Status</th>
                                <th style="width:90px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($enquiries as $enquiry)
                                <tr id="row{{ $enquiry->id }}">
                                    <td><span class="id-chip">{{ $enquiry->id }}</span></td>

                                    <td>
                                        <div class="question-text" style="{{ $enquiry->is_read ? 'font-weight:500' : '' }}">{{ $enquiry->name }}</div>
                                        <div class="target-text">{{ \Illuminate\Support\Str::limit($enquiry->message, 60) }}</div>
                                    </td>

                                    <td>
                                        <div>{{ $enquiry->email }}</div>
                                        <div class="target-text">{{ $enquiry->phone }}</div>
                                    </td>

                                    <td><span class="pill pill-type">{{ $enquiry->request_type }}</span></td>

                                    <td>{{ $enquiry->created_at->format('d M Y') }}<div class="target-text">{{ $enquiry->created_at->format('h:i A') }}</div></td>

                                    <td>
                                        @if($enquiry->is_read)
                                            <span class="pill pill-active">Read</span>
                                        @else
                                            <span class="pill pill-inactive">New</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div style="display:flex;gap:6px">
                                            <a href="{{ route('admin.contact-enquiries.show', $enquiry->id) }}" class="action-btn" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <button class="action-btn action-btn-danger"
                                                onclick="deleteEnquiry({{ $enquiry->id }})" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="empty-state">
                                            <div class="empty-icon"><i class="fa fa-envelope-o"></i></div>
                                            <strong style="font-size:14px;color:var(--text-primary)">No enquiries yet</strong>
                                            <p>Messages sent from the contact page will appear here.</p>
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
function deleteEnquiry(id) {
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
                url: "{{ url('admin/contact-enquiries') }}/" + id,
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