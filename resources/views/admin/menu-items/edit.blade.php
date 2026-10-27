@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Edit Menu Item</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.menu-items.index') }}">Menu Items</a>
                        <span>›</span>
                        Edit Item
                    </div>
                </div>
                <div class="faq-identity">
                    <div class="faq-identity-icon"><i class="fa fa-cutlery"></i></div>
                    <div>
                        <div class="question-text">{{ \Illuminate\Support\Str::limit($item->title, 40) }}</div>
                        <div class="faq-identity-id">ID #{{ $item->id }}</div>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.menu-items.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.menu-items._form', ['item' => $item, 'selectedCategory' => null])
            </form>

        </div>
    </div>
</div>

@include('admin.footer')