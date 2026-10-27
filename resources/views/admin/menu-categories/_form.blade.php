{{-- Shared by create & edit. Expects: $category (MenuCategory|null) --}}
@php
    $isEdit = !empty($category) && $category->exists;
    $currentStatus = old('status', $category->status ?? 1);
@endphp

@if($errors->any())
    <div class="form-errors">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="faq-layout">

    <div>
        <div class="section-card">
            <div class="section-card-header"><h5>Category Details</h5></div>
            <div class="section-card-body">
                <div class="field-group">
                    <label class="field-label" for="name">Name <span class="req">*</span></label>
                    <input type="text" name="name" id="name" class="field-input"
                        value="{{ old('name', $category->name ?? '') }}" placeholder="e.g. Biryani &amp; Rice" required>
                    <div class="field-hint">Shown on the filter button on the menu page.</div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="field-input"
                        value="{{ old('slug', $category->slug ?? '') }}" placeholder="auto-generated-from-name">
                    <div class="field-hint">Leave empty to generate from the name. Used internally by the menu filter.</div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="section-card">
            <div class="section-card-header"><h5>Settings</h5></div>
            <div class="section-card-body">
                <div class="toggle-row">
                    <div>
                        <div class="toggle-label">Active</div>
                        <div class="toggle-sub">Show this category and its items</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="hidden" name="status" value="0">
                        <input type="checkbox" name="status" value="1" {{ $currentStatus ? 'checked' : '' }}>
                        <span class="toggle-track"></span>
                    </label>
                </div>

                <div class="field-group" style="margin-top:18px">
                    <label class="field-label" for="sort_order">Sort Order</label>
                    <input type="number" min="0" name="sort_order" id="sort_order" class="field-input"
                        value="{{ old('sort_order', $category->sort_order ?? 0) }}">
                    <div class="field-hint">Lower numbers appear first.</div>
                </div>
            </div>
        </div>

        @if($isEdit)
            <div class="section-card">
                <div class="section-card-header"><h5>Record Info</h5></div>
                <div class="section-card-body">
                    <div class="info-row">
                        <span class="info-label">Created</span>
                        <span class="info-value">{{ optional($category->created_at)->format('d M Y') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Updated</span>
                        <span class="info-value">{{ optional($category->updated_at)->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="action-bar">
    <a href="{{ route('admin.menu-categories.index') }}" class="btn-secondary-dash">Cancel</a>
    <button type="submit" class="btn-primary-dash" id="saveBtn">
        <i class="fa fa-check"></i> {{ $isEdit ? 'Update Category' : 'Save Category' }}
    </button>
</div>

<script>
document.querySelector('.faq-page form').addEventListener('submit', function () {
    var btn = document.getElementById('saveBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';
});
</script>