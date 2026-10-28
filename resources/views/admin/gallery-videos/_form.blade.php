{{-- Shared by create & edit. Expects: $video (GalleryVideo|null) --}}
@php
    $isEdit = !empty($video) && $video->exists;
    $currentStatus = old('status', $video->status ?? 1);
    $source = old('source', ($isEdit && $video->isUpload()) ? 'upload' : 'link');
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
            <div class="section-card-header"><h5>Video Details</h5></div>
            <div class="section-card-body">

                <div class="field-group">
                    <label class="field-label" for="title">Title <span class="req">*</span></label>
                    <input type="text" name="title" id="title" class="field-input"
                        value="{{ old('title', $video->title ?? '') }}" placeholder="e.g. The Real Taste of Mughlai Cuisine" required>
                </div>

                <div class="field-group">
                    <label class="field-label" for="subtitle">Sub Title</label>
                    <input type="text" name="subtitle" id="subtitle" class="field-input"
                        value="{{ old('subtitle', $video->subtitle ?? '') }}" placeholder="e.g. Wahid Biryani • Since 1955">
                </div>

                <!-- Source switch -->
                <div class="field-group">
                    <span class="field-label">Video Source <span class="req">*</span></span>
                    <div class="type-tabs" style="grid-template-columns: repeat(2, 1fr); margin-bottom: 0;">
                        <label class="type-tab">
                            <input type="radio" name="source" value="link" {{ $source === 'link' ? 'checked' : '' }}>
                            <span><i class="fa fa-link"></i> Paste a Link</span>
                        </label>
                        <label class="type-tab">
                            <input type="radio" name="source" value="upload" {{ $source === 'upload' ? 'checked' : '' }}>
                            <span><i class="fa fa-upload"></i> Upload a Video</span>
                        </label>
                    </div>
                </div>

                <!-- Link -->
                <div class="field-group" id="linkGroup">
                    <label class="field-label" for="video_url">Video Link <span class="req">*</span></label>
                    <input type="url" name="video_url" id="video_url" class="field-input"
                        value="{{ old('video_url', $video->video_url ?? '') }}"
                        placeholder="https://www.youtube.com/watch?v=... / Facebook video / Instagram reel link">
                    <div class="field-hint">
                        Paste a YouTube, Facebook or Instagram video / reel link.
                        <span id="platformBadge" class="pill pill-type" style="display:none;margin-left:6px"></span>
                    </div>
                </div>

                <!-- Upload -->
                <div class="field-group" id="uploadGroup">
                    <label class="field-label" for="video_file">
                        Video File {!! ($isEdit && $video->isUpload()) ? '' : '<span class="req">*</span>' !!}
                    </label>
                    <input type="file" name="video_file" id="video_file" class="field-input file-input"
                        accept="video/mp4,video/webm,video/quicktime">
                    <div class="field-hint">
                        MP4, WebM or MOV, max 50 MB.
                        @if($isEdit && $video->isUpload()) Leave empty to keep the current video. @endif
                    </div>

                    @if($isEdit && $video->isUpload() && $video->video_file_url)
                        <video src="{{ $video->video_file_url }}" controls preload="metadata"
                            style="margin-top:8px;width:100%;max-height:220px;border-radius:8px;background:#000"></video>
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
                        <div class="toggle-sub">Show this video in the gallery</div>
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
                        value="{{ old('sort_order', $video->sort_order ?? 0) }}">
                    <div class="field-hint">Lower numbers appear first.</div>
                </div>
            </div>
        </div>

        <div class="section-card">
            <div class="section-card-header"><h5>Thumbnail</h5></div>
            <div class="section-card-body">
                <div class="field-group">
                    <label class="field-label" for="thumbnail">Thumbnail Image</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="field-input file-input" accept="image/*">
                    <div class="field-hint">
                        Optional for YouTube (its own thumbnail is used automatically) and for uploaded videos
                        (the first frame is shown). Recommended for Instagram and Facebook, which don't provide one. Max 2 MB.
                    </div>
                    @if($isEdit && $video->thumbnail_url)
                        <img src="{{ $video->thumbnail_url }}" class="img-preview" id="thumbnail_preview" alt="">
                    @else
                        <img src="" class="img-preview" id="thumbnail_preview" alt="" style="display:none">
                    @endif
                </div>

                @if($isEdit && $video->thumbnail)
                    <div class="toggle-row" style="padding-bottom:0">
                        <div class="toggle-label">Remove uploaded thumbnail</div>
                        <label class="toggle-switch">
                            <input type="checkbox" name="remove_thumbnail" value="1">
                            <span class="toggle-track"></span>
                        </label>
                    </div>
                @endif
            </div>
        </div>

        @if($isEdit)
            <div class="section-card">
                <div class="section-card-header"><h5>Record Info</h5></div>
                <div class="section-card-body">
                    <div class="info-row">
                        <span class="info-label">Created</span>
                        <span class="info-value">{{ optional($video->created_at)->format('d M Y') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Updated</span>
                        <span class="info-value">{{ optional($video->updated_at)->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="action-bar">
    <a href="{{ route('admin.gallery-videos.index') }}" class="btn-secondary-dash">Cancel</a>
    <button type="submit" class="btn-primary-dash" id="saveBtn">
        <i class="fa fa-check"></i> {{ $isEdit ? 'Update Video' : 'Save Video' }}
    </button>
</div>

<script>
(function () {
    var hasExistingFile = {{ ($isEdit && $video->isUpload()) ? 'true' : 'false' }};

    var linkGroup = document.getElementById('linkGroup');
    var uploadGroup = document.getElementById('uploadGroup');
    var urlInput = document.getElementById('video_url');
    var fileInput = document.getElementById('video_file');
    var badge = document.getElementById('platformBadge');

    // Show only the chosen source
    function applySource() {
        var source = document.querySelector('input[name="source"]:checked').value;
        var isLink = source === 'link';

        linkGroup.style.display = isLink ? '' : 'none';
        uploadGroup.style.display = isLink ? 'none' : '';

        urlInput.required = isLink;
        fileInput.required = !isLink && !hasExistingFile;
    }

    document.querySelectorAll('input[name="source"]').forEach(function (r) {
        r.addEventListener('change', applySource);
    });
    applySource();

    // Detected-platform badge (the server re-checks the link on save)
    function detect(url) {
        if (/youtu\.be\/|youtube(-nocookie)?\.com\//i.test(url)) return 'YouTube';
        if (/instagram\.com\//i.test(url)) return 'Instagram';
        if (/facebook\.com\/|fb\.watch\//i.test(url)) return 'Facebook';
        return '';
    }

    function updateBadge() {
        var platform = detect(urlInput.value.trim());
        badge.textContent = platform;
        badge.style.display = platform ? 'inline-flex' : 'none';
    }

    urlInput.addEventListener('input', updateBadge);
    updateBadge();

    // Thumbnail preview
    var thumb = document.getElementById('thumbnail');
    var preview = document.getElementById('thumbnail_preview');
    thumb.addEventListener('change', function () {
        if (this.files && this.files[0]) {
            preview.src = URL.createObjectURL(this.files[0]);
            preview.style.display = 'block';
        }
    });

    document.querySelector('.faq-page form').addEventListener('submit', function () {
        var btn = document.getElementById('saveBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving... (large videos can take a while)';
    });
})();
</script>