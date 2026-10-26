@php
    $services   = config('faq_pages.services');
    $industries = config('faq_pages.industries');

    $curType     = old('type', $faq->type ?? \App\Models\Faq::TYPE_GENERAL);
    $curService  = old('service', $faq->service ?? '');
    $curSub      = old('sub_service', $faq->sub_service ?? '');
    $curIndustry = old('industry', $faq->industry ?? '');
    $curOrder    = old('sort_order', $faq->sort_order ?? ($nextOrder ?? 0));
    $statusOn    = session()->hasOldInput() ? old('status') !== null : ($faq->status ?? true);
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

    <!-- LEFT -->
    <div>

        <!-- Where to show -->
        <div class="section-card">
            <div class="section-card-header">
                <h5>Show This FAQ On</h5>
            </div>
            <div class="section-card-body">

                <div class="type-tabs">
                    @foreach(\App\Models\Faq::TYPES as $key => $label)
                        <label class="type-tab">
                            <input type="radio" name="type" value="{{ $key }}" {{ $curType === $key ? 'checked' : '' }}>
                            <span>{{ $label }}</span>
                        </label>
                    @endforeach
                </div>

                <div class="field-hint" id="hint-general" style="margin-top:0">
                    Shown on the home page and the main FAQ page.
                </div>

                <!-- Service -->
                <div id="group-service">
                    <div class="field-group">
                        <label class="field-label">Service <span class="req">*</span></label>
                        <select name="service" id="serviceSelect" class="field-input">
                            <option value="">Select a service</option>
                            @foreach($services as $key => $service)
                                <option value="{{ $key }}" {{ $curService === $key ? 'selected' : '' }}>
                                    {{ $service['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field-group">
                        <label class="field-label">Sub Service</label>
                        <select name="sub_service" id="subServiceSelect" class="field-input"
                            data-selected="{{ $curSub }}">
                            <option value="">Main service page (no sub service)</option>
                        </select>
                        <div class="field-hint">Leave empty to show this FAQ on the main service page.</div>
                    </div>
                </div>

                <!-- Industry -->
                <div id="group-industry">
                    <div class="field-group">
                        <label class="field-label">Industry <span class="req">*</span></label>
                        <select name="industry" id="industrySelect" class="field-input">
                            <option value="">Select an industry</option>
                            @foreach($industries as $key => $name)
                                <option value="{{ $key }}" {{ $curIndustry === $key ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
        </div>

        <!-- Content -->
        <div class="section-card">
            <div class="section-card-header">
                <h5>FAQ Content</h5>
            </div>
            <div class="section-card-body">

                <div class="field-group">
                    <label class="field-label">Question <span class="req">*</span></label>
                    <input type="text" name="question" class="field-input" required maxlength="255"
                        value="{{ old('question', $faq->question ?? '') }}"
                        placeholder="e.g. What is your return policy?">
                </div>

                <div class="field-group">
                    <label class="field-label">Answer <span class="req">*</span></label>
                    <textarea name="answer" class="field-textarea" required
                        placeholder="Write a clear and helpful answer…">{{ old('answer', $faq->answer ?? '') }}</textarea>
                </div>

            </div>
        </div>
    </div>

    <!-- RIGHT -->
    <div>

        <div class="section-card">
            <div class="section-card-header">
                <h5>Settings</h5>
            </div>
            <div class="section-card-body" style="padding:16px 20px">
                <div class="toggle-row">
                    <div>
                        <div class="toggle-label">Active</div>
                        <div class="toggle-sub">Visible to customers</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" name="status" id="status" value="1" {{ $statusOn ? 'checked' : '' }}>
                        <span class="toggle-track"></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="section-card">
            <div class="section-card-header">
                <h5>Display Order</h5>
            </div>
            <div class="section-card-body" style="padding:16px 20px">
                <div class="field-group">
                    <label class="field-label">Sort Order</label>
                    <input type="number" name="sort_order" class="field-input" min="0" value="{{ $curOrder }}">
                    <div class="field-hint">Lower numbers appear first.</div>
                </div>
            </div>
        </div>

        @if($faq)
            <div class="section-card">
                <div class="section-card-header">
                    <h5>Record Info</h5>
                </div>
                <div class="section-card-body" style="padding:14px 20px">
                    <div class="info-row">
                        <span class="info-label">FAQ ID</span>
                        <span class="info-value" style="font-family:'SF Mono','Fira Code',monospace;font-size:12px;color:var(--accent)">#{{ $faq->id }}</span>
                    </div>
                    @if($faq->created_at)
                        <div class="info-row">
                            <span class="info-label">Created</span>
                            <span class="info-value">{{ $faq->created_at->format('d M Y') }}</span>
                        </div>
                    @endif
                    @if($faq->updated_at)
                        <div class="info-row">
                            <span class="info-label">Last Updated</span>
                            <span class="info-value">{{ $faq->updated_at->format('d M Y') }}</span>
                        </div>
                    @endif
                </div>
            </div>
        @endif

    </div>
</div>