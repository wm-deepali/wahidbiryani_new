{{-- Shared by create & edit. Expects: $faq (Faq|null) --}}
@php
    $currentStatus = old('status', $faq->status ?? 1);
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
            <div class="section-card-header"><h5>Content</h5></div>
            <div class="section-card-body">
                <div class="field-group">
                    <label class="field-label" for="question">Question <span class="req">*</span></label>
                    <input type="text" name="question" id="question" class="field-input"
                        value="{{ old('question', $faq->question ?? '') }}" placeholder="Enter the question" required>
                </div>

                <div class="field-group">
                    <label class="field-label" for="answer">Answer <span class="req">*</span></label>
                    <textarea name="answer" id="answer" class="field-textarea" placeholder="Enter the answer"
                        required>{{ old('answer', $faq->answer ?? '') }}</textarea>
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
                        <div class="toggle-sub">Show this FAQ on the website</div>
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
                        value="{{ old('sort_order', $faq->sort_order ?? 0) }}">
                    <div class="field-hint">Lower numbers appear first.</div>
                </div>
            </div>
        </div>

        @if(!empty($faq) && $faq->exists)
            <div class="section-card">
                <div class="section-card-header"><h5>Record Info</h5></div>
                <div class="section-card-body">
                    <div class="info-row">
                        <span class="info-label">Created</span>
                        <span class="info-value">{{ optional($faq->created_at)->format('d M Y') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Updated</span>
                        <span class="info-value">{{ optional($faq->updated_at)->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Action bar -->
<div class="action-bar">
    <a href="{{ route('admin.faqs.index') }}" class="btn-secondary-dash">Cancel</a>
    <button type="submit" class="btn-primary-dash" id="saveBtn">
        <i class="fa fa-check"></i> {{ !empty($faq) && $faq->exists ? 'Update FAQ' : 'Save FAQ' }}
    </button>
</div>

<script>
document.querySelector('.faq-page form').addEventListener('submit', function () {
    var btn = document.getElementById('saveBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';
});
</script>