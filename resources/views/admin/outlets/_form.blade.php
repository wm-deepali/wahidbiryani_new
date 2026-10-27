{{-- Shared by create & edit. Expects: $outlet (Outlet|null) --}}
@php
    $isEdit = !empty($outlet) && $outlet->exists;
    $currentStatus = old('status', $outlet->status ?? 1);
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

    <!-- Left column -->
    <div>
        <div class="section-card">
            <div class="section-card-header"><h5>Outlet Details</h5></div>
            <div class="section-card-body">

                <div class="field-group">
                    <label class="field-label" for="name">Outlet Name <span class="req">*</span></label>
                    <input type="text" name="name" id="name" class="field-input"
                        value="{{ old('name', $outlet->name ?? '') }}" placeholder="e.g. Aminabad Outlet" required>
                </div>

                <div class="field-group">
                    <label class="field-label" for="address">Address <span class="req">*</span></label>
                    <textarea name="address" id="address" class="field-textarea" style="min-height:90px"
                        placeholder="Full outlet address" required>{{ old('address', $outlet->address ?? '') }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="email">Email</label>
                    <input type="email" name="email" id="email" class="field-input"
                        value="{{ old('email', $outlet->email ?? '') }}" placeholder="Leave empty to use the support email from Settings">
                </div>

                <div class="two-col">
                    <div class="field-group">
                        <label class="field-label" for="phones">Phone Numbers</label>
                        <input type="text" name="phones" id="phones" class="field-input"
                            value="{{ old('phones', $outlet->phones ?? '') }}" placeholder="0522-2611878, +91 92366 13111">
                        <div class="field-hint">Separate multiple numbers with commas.</div>
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="whatsapp">WhatsApp Number</label>
                        <input type="text" name="whatsapp" id="whatsapp" class="field-input"
                            value="{{ old('whatsapp', $outlet->whatsapp ?? '') }}" placeholder="+91 92366 13111">
                    </div>
                </div>

            </div>
        </div>

        <div class="section-card">
            <div class="section-card-header"><h5>Google Map</h5></div>
            <div class="section-card-body">
                <div class="field-group">
                    <label class="field-label" for="map_url">Map Embed Link</label>
                    <textarea name="map_url" id="map_url" class="field-textarea" style="min-height:90px"
                        placeholder="https://www.google.com/maps/embed?pb=...">{{ old('map_url', $outlet->map_url ?? '') }}</textarea>
                    <div class="field-hint">Google Maps → Share → Embed a map. Paste the link or the full iframe code.</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right column -->
    <div>
        <div class="section-card">
            <div class="section-card-header"><h5>Settings</h5></div>
            <div class="section-card-body">
                <div class="toggle-row">
                    <div>
                        <div class="toggle-label">Active</div>
                        <div class="toggle-sub">Show this outlet on the contact page</div>
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
                        value="{{ old('sort_order', $outlet->sort_order ?? 0) }}">
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
                        <span class="info-value">{{ optional($outlet->created_at)->format('d M Y') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Updated</span>
                        <span class="info-value">{{ optional($outlet->updated_at)->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Action bar -->
<div class="action-bar">
    <a href="{{ route('admin.outlets.index') }}" class="btn-secondary-dash">Cancel</a>
    <button type="submit" class="btn-primary-dash" id="saveBtn">
        <i class="fa fa-check"></i> {{ $isEdit ? 'Update Outlet' : 'Save Outlet' }}
    </button>
</div>

<script>
document.querySelector('.faq-page form').addEventListener('submit', function () {
    var btn = document.getElementById('saveBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';
});
</script>