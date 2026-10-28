{{-- Shared by create & edit. Expects: $outlet (Outlet|null) --}}
@php
    $isEdit        = !empty($outlet) && $outlet->exists;
    $currentStatus = old('status', $outlet->status ?? 1);
    $isFlagship    = old('is_flagship', $outlet->is_flagship ?? 0);

    $amenities = old('amenities', $outlet->amenities ?? []);
    if (empty($amenities)) {
        $amenities = [['icon' => 'fa-solid fa-award', 'label' => '']];
    }
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

        <!-- Basic details -->
        <div class="section-card">
            <div class="section-card-header"><h5>Outlet Details</h5></div>
            <div class="section-card-body">

                <div class="field-group">
                    <label class="field-label" for="name">Outlet Name <span class="req">*</span></label>
                    <input type="text" name="name" id="name" class="field-input"
                        value="{{ old('name', $outlet->name ?? '') }}" placeholder="e.g. Aminabad Outlet" required>
                    <div class="field-hint">Shown in the header popup, contact page and footer.</div>
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

                <div class="field-group">
                    <label class="field-label" for="timings">Opening Hours</label>
                    <input type="text" name="timings" id="timings" class="field-input"
                        value="{{ old('timings', $outlet->timings ?? '12:30 PM – 10:30 PM') }}" placeholder="12:30 PM – 10:30 PM">
                </div>

            </div>
        </div>

        <!-- Online ordering -->
        <div class="section-card">
            <div class="section-card-header"><h5>Online Ordering</h5></div>
            <div class="section-card-body">
                <div class="two-col">
                    <div class="field-group">
                        <label class="field-label" for="swiggy_url">Swiggy Link</label>
                        <input type="url" name="swiggy_url" id="swiggy_url" class="field-input"
                            value="{{ old('swiggy_url', $outlet->swiggy_url ?? '') }}" placeholder="https://www.swiggy.com/...">
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="zomato_url">Zomato Link</label>
                        <input type="url" name="zomato_url" id="zomato_url" class="field-input"
                            value="{{ old('zomato_url', $outlet->zomato_url ?? '') }}" placeholder="https://www.zomato.com/...">
                    </div>
                </div>
                <div class="field-hint">Leave both empty if the outlet is not on Swiggy / Zomato — the popup will show a "Call Now" button instead.</div>
            </div>
        </div>

        <!-- Our Outlets page content -->
        <div class="section-card">
            <div class="section-card-header"><h5>Our Outlets Page Content</h5></div>
            <div class="section-card-body">

                <div class="two-col">
                    <div class="field-group">
                        <label class="field-label" for="title">Heading</label>
                        <input type="text" name="title" id="title" class="field-input"
                            value="{{ old('title', $outlet->title ?? '') }}" placeholder="Wahid Biryani Aminabad">
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="urdu_name">Urdu Name</label>
                        <input type="text" name="urdu_name" id="urdu_name" class="field-input" dir="rtl"
                            value="{{ old('urdu_name', $outlet->urdu_name ?? '') }}" placeholder="امین آباد">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="subtitle">Sub Heading</label>
                    <input type="text" name="subtitle" id="subtitle" class="field-input"
                        value="{{ old('subtitle', $outlet->subtitle ?? '') }}" placeholder="The Real Taste of Mughlai Cuisine">
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Description</label>
                    <textarea name="description" id="description" class="field-textarea" style="min-height:120px"
                        placeholder="Short paragraph about this outlet">{{ old('description', $outlet->description ?? '') }}</textarea>
                </div>

                <div class="two-col">
                    <div class="field-group">
                        <label class="field-label" for="badge_text">Badge Text</label>
                        <input type="text" name="badge_text" id="badge_text" class="field-input"
                            value="{{ old('badge_text', $outlet->badge_text ?? '') }}" placeholder="Since 1955 • Pride of Lucknow">
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="badge_icon">Badge Icon</label>
                        <input type="text" name="badge_icon" id="badge_icon" class="field-input" list="iconList"
                            value="{{ old('badge_icon', $outlet->badge_icon ?? 'fa-solid fa-hotel') }}" placeholder="fa-solid fa-hotel">
                    </div>
                </div>

                <div class="toggle-row" style="margin-bottom:18px">
                    <div>
                        <div class="toggle-label">Flagship Outlet</div>
                        <div class="toggle-sub">Highlights the badge with the flagship style</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="hidden" name="is_flagship" value="0">
                        <input type="checkbox" name="is_flagship" value="1" {{ $isFlagship ? 'checked' : '' }}>
                        <span class="toggle-track"></span>
                    </label>
                </div>

                <div class="field-group">
                    <label class="field-label">Amenities</label>
                    <div id="amenityList">
                        @foreach($amenities as $i => $a)
                            <div class="amenity-row" style="display:flex;gap:8px;margin-bottom:8px">
                                <input type="text" name="amenities[{{ $i }}][icon]" class="field-input" list="iconList"
                                    style="flex:1" value="{{ $a['icon'] ?? '' }}" placeholder="fa-solid fa-award">
                                <input type="text" name="amenities[{{ $i }}][label]" class="field-input"
                                    style="flex:1" value="{{ $a['label'] ?? '' }}" placeholder="Label e.g. ISO Certified">
                                <button type="button" class="action-btn action-btn-danger" onclick="removeAmenity(this)" title="Remove">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn-secondary-dash" onclick="addAmenity()" style="margin-top:4px">
                        <i class="fa fa-plus"></i> Add Amenity
                    </button>
                    <div class="field-hint">Icon is a Font Awesome class (e.g. <code>fa-solid fa-award</code>). Rows without a label are ignored.</div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="prep_time">Food Preparation Time</label>
                    <input type="text" name="prep_time" id="prep_time" class="field-input"
                        value="{{ old('prep_time', $outlet->prep_time ?? '15 – 20 Minutes') }}" placeholder="15 – 20 Minutes">
                </div>

            </div>
        </div>

        <!-- Map -->
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
                        <div class="toggle-sub">Show this outlet on the website</div>
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

        <div class="section-card">
            <div class="section-card-header"><h5>Outlet Image</h5></div>
            <div class="section-card-body">
                @if($isEdit && $outlet->image)
                    <img src="{{ asset($outlet->image) }}" alt="Current image" id="imagePreview"
                        style="width:100%;border-radius:10px;margin-bottom:12px;object-fit:cover;max-height:200px">
                @else
                    <img src="" alt="" id="imagePreview"
                        style="display:none;width:100%;border-radius:10px;margin-bottom:12px;object-fit:cover;max-height:200px">
                @endif

                <div class="field-group">
                    <input type="file" name="image" id="image" class="field-input" accept="image/*">
                    <div class="field-hint">Shown on the Our Outlets page. JPG/PNG/WebP, max 3 MB.@if($isEdit && $outlet->image) Leave empty to keep the current image.@endif</div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="tag_text">Image Tag Text</label>
                    <input type="text" name="tag_text" id="tag_text" class="field-input"
                        value="{{ old('tag_text', $outlet->tag_text ?? '') }}" placeholder="✦ Aminabad Outlet • Since 1955">
                </div>

                <div class="field-group">
                    <label class="field-label" for="tag_icon">Image Tag Icon</label>
                    <input type="text" name="tag_icon" id="tag_icon" class="field-input" list="iconList"
                        value="{{ old('tag_icon', $outlet->tag_icon ?? 'fa-solid fa-star') }}" placeholder="fa-solid fa-star">
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

<datalist id="iconList">
    <option value="fa-solid fa-crown">
    <option value="fa-solid fa-fire">
    <option value="fa-solid fa-hotel">
    <option value="fa-solid fa-star">
    <option value="fa-solid fa-award">
    <option value="fa-solid fa-certificate">
    <option value="fa-solid fa-bag-shopping">
    <option value="fa-solid fa-oil-can">
    <option value="fa-solid fa-champagne-glasses">
    <option value="fa-solid fa-handshake">
    <option value="fa-solid fa-utensils">
</datalist>

<script>
var amenityIndex = {{ count($amenities) }};

function addAmenity() {
    var row = document.createElement('div');
    row.className = 'amenity-row';
    row.style.cssText = 'display:flex;gap:8px;margin-bottom:8px';
    row.innerHTML =
        '<input type="text" name="amenities[' + amenityIndex + '][icon]" class="field-input" list="iconList" style="flex:1" value="fa-solid fa-check" placeholder="fa-solid fa-award">' +
        '<input type="text" name="amenities[' + amenityIndex + '][label]" class="field-input" style="flex:1" placeholder="Label e.g. ISO Certified">' +
        '<button type="button" class="action-btn action-btn-danger" onclick="removeAmenity(this)" title="Remove"><i class="fa fa-trash"></i></button>';
    document.getElementById('amenityList').appendChild(row);
    amenityIndex++;
}

function removeAmenity(btn) {
    btn.closest('.amenity-row').remove();
}

document.getElementById('image').addEventListener('change', function () {
    var file = this.files[0];
    var preview = document.getElementById('imagePreview');
    if (!file) return;
    preview.src = URL.createObjectURL(file);
    preview.style.display = 'block';
});

document.querySelector('.faq-page form').addEventListener('submit', function () {
    var btn = document.getElementById('saveBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';
});
</script>