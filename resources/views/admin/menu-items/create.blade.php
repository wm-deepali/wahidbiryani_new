@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    @include('admin.blogs._styles')

    <div class="app-content content container-fluid">
        <div class="faq-page">

            <div class="page-header">
                <div>
                    <h1>Add Menu Item</h1>
                    <div class="crumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.menu-items.index') }}">Menu Items</a>
                        <span>›</span>
                        Add Item
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.menu-items.store') }}" method="POST">
                @csrf
                @include('admin.menu-items._form', ['item' => null, 'selectedCategory' => $selectedCategory ?? null])
            </form>

        </div>
    </div>
</div>

@include('admin.footer')