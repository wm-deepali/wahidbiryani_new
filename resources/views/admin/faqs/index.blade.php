@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.faqs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <!-- Page header -->
            <div class="page-header">
                <div>
                    <h1>Manage FAQ</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        Manage FAQ
                    </div>
                </div>
                <a href="{{ route('admin.faqs.create') }}" class="btn-primary-dash">
                    <i class="fa fa-plus"></i> Add FAQ
                </a>
            </div>

            @if(session('success'))
                <div class="flash-success">{{ session('success') }}</div>
            @endif

            <!-- Filter tabs -->
            <div class="filter-tabs">
                <a href="{{ route('admin.faqs.index') }}" class="filter-tab {{ !$type ? 'active' : '' }}">
                    All <small>{{ $counts->sum() }}</small>
                </a>
                @foreach(\App\Models\Faq::TYPES as $key => $label)
                    <a href="{{ route('admin.faqs.index', ['type' => $key]) }}"
                        class="filter-tab {{ $type === $key ? 'active' : '' }}">
                        {{ $label }} <small>{{ $counts[$key] ?? 0 }}</small>
                    </a>
                @endforeach
            </div>

            <!-- Main card -->
            <div class="faq-card">
                <div class="faq-table-wrap">
                    <table class="faq-table">
                        <thead>
                            <tr>
                                <th style="width:60px">ID</th>
                                <th>Question</th>
                                <th style="width:140px">Type</th>
                                <th style="width:80px">Order</th>
                                <th style="width:110px">Status</th>
                                <th style="width:90px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($faqs as $faq)
                                <tr id="row{{ $faq->id }}">

                                    <td><span class="id-chip">{{ $faq->id }}</span></td>

                                    <td>
                                        <div class="question-text">{{ $faq->question }}</div>
                                        <div class="target-text">{{ $faq->target_label }}</div>
                                    </td>

                                    <td><span class="pill pill-type">{{ $faq->type_label }}</span></td>

                                    <td><span class="id-chip">{{ $faq->sort_order }}</span></td>

                                    <td>
                                        @if($faq->status)
                                            <span class="pill pill-active">Active</span>
                                        @else
                                            <span class="pill pill-inactive">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div style="display:flex;gap:6px">
                                            <a href="{{ route('admin.faqs.edit', $faq->id) }}"
                                                class="action-btn" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button class="action-btn action-btn-danger"
                                                onclick="deleteFaq({{ $faq->id }})" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <div class="empty-icon"><i class="fa fa-question-circle"></i></div>
                                            <strong style="font-size:14px;color:var(--text-primary)">No FAQs found</strong>
                                            <p>Add frequently asked questions to help your customers.</p>
                                            <a href="{{ route('admin.faqs.create') }}" class="btn-primary-dash">
                                                <i class="fa fa-plus"></i> Add FAQ
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
function deleteFaq(id) {
    Swal.fire({
        title: 'Delete FAQ?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#b22222',
        cancelButtonColor: '#6d7175',
        confirmButtonText: 'Yes, Delete'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ url('admin/faqs') }}/" + id,
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