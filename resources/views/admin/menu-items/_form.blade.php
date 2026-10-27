{{-- Shared by create & edit. Expects: $item (MenuItem|null), $categories, $selectedCategory --}}
@php
    $isEdit = !empty($item) && $item->exists;
    $currentStatus = old('status', $item->status ?? 1);
    $currentCategory = old('menu_category_id', $item->menu_category_id ?? $selectedCategory ?? '');
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
            <div class="section-card-header"><h5>Item Details</h5></div>
            <div class="section-card-body">

                <div class="field-group">
                    <label class="field-label" for="menu_category_id">Category <span class="req">*</span></label>
                    <select name="menu_category_id" id="menu_category_id" class="field-input field-select" required>
                        <option value="">— Select category —</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ (string) $currentCategory === (string) $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">Dish Name <span class="req">*</span></label>
                    <input type="text" name="title" id="title" class="field-input"
                        value="{{ old('title', $item->title ?? '') }}" placeholder="e.g. Wahid Chicken Biryani" required>
                </div>

                <div class="two-col">
                    <div class="field-group">
                        <label class="field-label" for="serving">Serving</label>
                        <input type="text" name="serving" id="serving" class="field-input"
                            value="{{ old('serving', $item->serving ?? '') }}" placeholder="Half (2 pcs)">
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="price">Price</label>
                        <input type="text" name="price" id="price" class="field-input"
                            value="{{ old('price', $item->price ?? '') }}" placeholder="180 or MRP">
                        <div class="field-hint">Numbers get the currency symbol automatically. Text like "MRP" is shown as is.</div>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Description</label>
                    <textarea name="description" id="description" class="field-textarea" style="min-height:110px"
                        placeholder="Short description shown on the menu card">{{ old('description', $item->description ?? '') }}</textarea>
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
                        <div class="toggle-sub">Show this item on the menu</div>
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
                        value="{{ old('sort_order', $item->sort_order ?? 0) }}">
                    <div class="field-hint">Lower numbers appear first within the category.</div>
                </div>
            </div>
        </div>

        @if($isEdit)
            <div class="section-card">
                <div class="section-card-header"><h5>Record Info</h5></div>
                <div class="section-card-body">
                    <div class="info-row">
                        <span class="info-label">Created</span>
                        <span class="info-value">{{ optional($item->created_at)->format('d M Y') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Updated</span>
                        <span class="info-value">{{ optional($item->updated_at)->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="action-bar">
    <a href="{{ route('admin.menu-items.index') }}" class="btn-secondary-dash">Cancel</a>
    <button type="submit" class="btn-primary-dash" id="saveBtn">
        <i class="fa fa-check"></i> {{ $isEdit ? 'Update Item' : 'Save Item' }}
    </button>
</div>

<script>
document.querySelector('.faq-page form').addEventListener('submit', function () {
    var btn = document.getElementById('saveBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';
});
</script>