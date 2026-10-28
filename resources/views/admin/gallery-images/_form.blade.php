{{-- Shared by create & edit. Expects: $image (GalleryImage|null) --}}
@php
    $isEdit = !empty($image) && $image->exists;
    $currentStatus = old('status', $image->status ?? 1);
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
            <div class="section-card-header"><h5>Image Details</h5></div>
            <div class="section-card-body">

                <div class="field-group">
                    <label class="field-label" for="title">Title <span class="req">*</span></label>
                    <input type="text" name="title" id="title" class="field-input"
                        value="{{ old('title', $image->title ?? '') }}" placeholder="e.g. Smiles at the Outlet" required>
                </div>

                <div class="field-group">
                    <label class="field-label" for="subtitle">Sub Title</label>
                    <input type="text" name="subtitle" id="subtitle" class="field-input"
                        value="{{ old('subtitle', $image->subtitle ?? '') }}" placeholder="e.g. Moments">
                    <div class="field-hint">Shown as the small label under the title on the gallery card.</div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="image">Image {!! $isEdit ? '' : '<span class="req">*</span>' !!}</label>
                    <input type="file" name="image" id="image" class="field-input file-input" accept="image/*"
                        {{ $isEdit ? '' : 'required' }}>
                    <div class="field-hint">JPG, PNG or WebP, max 4 MB.{{ $isEdit ? ' Leave empty to keep the current image.' : '' }}</div>
                    @if($isEdit && $image->image_url)
                        <img src="{{ $image->image_url }}" class="img-preview" id="image_preview" alt="">
                    @else
                        <img src="" class="img-preview" id="image_preview" alt="" style="display:none">
                    @endif
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
                        <div class="toggle-sub">Show this image in the gallery</div>
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
                        value="{{ old('sort_order', $image->sort_order ?? 0) }}">
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
                        <span class="info-value">{{ optional($image->created_at)->format('d M Y') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Updated</span>
                        <span class="info-value">{{ optional($image->updated_at)->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="action-bar">
    <a href="{{ route('admin.gallery-images.index') }}" class="btn-secondary-dash">Cancel</a>
    <button type="submit" class="btn-primary-dash" id="saveBtn">
        <i class="fa fa-check"></i> {{ $isEdit ? 'Update Image' : 'Save Image' }}
    </button>
</div>

<script>
(function () {
    var input = document.getElementById('image');
    var preview = document.getElementById('image_preview');
    input.addEventListener('change', function () {
        if (this.files && this.files[0]) {
            preview.src = URL.createObjectURL(this.files[0]);
            preview.style.display = 'block';
        }
    });

    document.querySelector('.faq-page form').addEventListener('submit', function () {
        var btn = document.getElementById('saveBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';
    });
})();
</script>