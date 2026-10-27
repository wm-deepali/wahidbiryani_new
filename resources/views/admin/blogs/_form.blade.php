{{-- Shared by create & edit. Expects: $blog (Blog|null) --}}
@php
    $isEdit = !empty($blog) && $blog->exists;
    $currentStatus = old('status', $blog->status ?? 1);
    $publishedAt = old('published_at', optional($blog->published_at ?? null)->format('Y-m-d') ?? now()->format('Y-m-d'));
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

    <!-- ============ Left column ============ -->
    <div>

        <div class="section-card">
            <div class="section-card-header"><h5>Basic Details</h5></div>
            <div class="section-card-body">

                <div class="field-group">
                    <label class="field-label" for="title">Title <span class="req">*</span></label>
                    <input type="text" name="title" id="title" class="field-input"
                        value="{{ old('title', $blog->title ?? '') }}" placeholder="Enter blog title" required>
                </div>

                <div class="field-group">
                    <label class="field-label" for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="field-input"
                        value="{{ old('slug', $blog->slug ?? '') }}" placeholder="auto-generated-from-title">
                    <div class="field-hint">Leave empty to generate from the title.</div>
                </div>

                <div class="two-col">
                    <div class="field-group">
                        <label class="field-label" for="category">Category</label>
                        <input type="text" name="category" id="category" class="field-input"
                            value="{{ old('category', $blog->category ?? '') }}" placeholder="Heritage, Recipes">
                        <div class="field-hint">Separate multiple with commas. The first one shows on the card.</div>
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="urdu_accent">Urdu Accent Line</label>
                        <input type="text" name="urdu_accent" id="urdu_accent" class="field-input" dir="rtl"
                            value="{{ old('urdu_accent', $blog->urdu_accent ?? '') }}" placeholder="روایتی مضامین">
                        <div class="field-hint">Small line above the heading on the article page.</div>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="short_description">Short Description</label>
                    <textarea name="short_description" id="short_description" class="field-textarea"
                        style="min-height:90px" placeholder="Shown on the blog card and under the article heading">{{ old('short_description', $blog->short_description ?? '') }}</textarea>
                </div>

            </div>
        </div>

        <div class="section-card">
            <div class="section-card-header"><h5>Article Content</h5></div>
            <div class="section-card-body">
                <div class="field-group">
                    <label class="field-label" for="content">Content <span class="req">*</span></label>
                    <textarea name="content" id="content" class="field-textarea">{{ old('content', $blog->content ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div class="section-card">
            <div class="section-card-header"><h5>SEO</h5></div>
            <div class="section-card-body">
                <div class="field-group">
                    <label class="field-label" for="meta_title">Meta Title</label>
                    <input type="text" name="meta_title" id="meta_title" class="field-input"
                        value="{{ old('meta_title', $blog->meta_title ?? '') }}">
                </div>
                <div class="field-group">
                    <label class="field-label" for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" class="field-textarea"
                        style="min-height:90px">{{ old('meta_description', $blog->meta_description ?? '') }}</textarea>
                </div>
            </div>
        </div>

    </div>

    <!-- ============ Right column ============ -->
    <div>

        <div class="section-card">
            <div class="section-card-header"><h5>Publish</h5></div>
            <div class="section-card-body">
                <div class="toggle-row">
                    <div>
                        <div class="toggle-label">Active</div>
                        <div class="toggle-sub">Show this blog on the website</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="hidden" name="status" value="0">
                        <input type="checkbox" name="status" value="1" {{ $currentStatus ? 'checked' : '' }}>
                        <span class="toggle-track"></span>
                    </label>
                </div>

                <div class="field-group" style="margin-top:18px">
                    <label class="field-label" for="published_at">Published Date</label>
                    <input type="date" name="published_at" id="published_at" class="field-input" value="{{ $publishedAt }}">
                </div>

                <div class="two-col">
                    <div class="field-group">
                        <label class="field-label" for="read_time">Read Time (min)</label>
                        <input type="number" min="1" name="read_time" id="read_time" class="field-input"
                            value="{{ old('read_time', $blog->read_time ?? 5) }}">
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="sort_order">Sort Order</label>
                        <input type="number" min="0" name="sort_order" id="sort_order" class="field-input"
                            value="{{ old('sort_order', $blog->sort_order ?? 0) }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="section-card">
            <div class="section-card-header"><h5>Images</h5></div>
            <div class="section-card-body">
                <div class="field-group">
                    <label class="field-label" for="image">Card Image</label>
                    <input type="file" name="image" id="image" class="field-input file-input" accept="image/*">
                    <div class="field-hint">Shown on the blog listing. JPG/PNG/WebP, max 2 MB.</div>
                    @if($isEdit && $blog->image_url)
                        <img src="{{ $blog->image_url }}" class="img-preview" id="image_preview" alt="">
                    @else
                        <img src="" class="img-preview" id="image_preview" alt="" style="display:none">
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="banner_image">Featured Image</label>
                    <input type="file" name="banner_image" id="banner_image" class="field-input file-input" accept="image/*">
                    <div class="field-hint">Large image on the article page. Uses the card image if empty.</div>
                    @if($isEdit && $blog->banner_image_url)
                        <img src="{{ $blog->banner_image_url }}" class="img-preview" id="banner_image_preview" alt="">
                    @else
                        <img src="" class="img-preview" id="banner_image_preview" alt="" style="display:none">
                    @endif
                </div>
            </div>
        </div>

        <div class="section-card">
            <div class="section-card-header"><h5>Author</h5></div>
            <div class="section-card-body">
                <div class="field-group">
                    <label class="field-label" for="author_name">Author Name</label>
                    <input type="text" name="author_name" id="author_name" class="field-input"
                        value="{{ old('author_name', $blog->author_name ?? 'Wahid Archives') }}">
                </div>
                <div class="field-group">
                    <label class="field-label" for="author_title">Author Title</label>
                    <input type="text" name="author_title" id="author_title" class="field-input"
                        value="{{ old('author_title', $blog->author_title ?? 'Culinary Historian') }}">
                </div>
                <div class="field-group">
                    <label class="field-label" for="author_image">Author Image</label>
                    <input type="file" name="author_image" id="author_image" class="field-input file-input" accept="image/*">
                    @if($isEdit && $blog->author_image_url)
                        <img src="{{ $blog->author_image_url }}" class="img-preview img-preview-round" id="author_image_preview" alt="">
                    @else
                        <img src="" class="img-preview img-preview-round" id="author_image_preview" alt="" style="display:none">
                    @endif
                </div>
            </div>
        </div>

        @if($isEdit)
            <div class="section-card">
                <div class="section-card-header"><h5>Record Info</h5></div>
                <div class="section-card-body">
                    <div class="info-row">
                        <span class="info-label">Created</span>
                        <span class="info-value">{{ optional($blog->created_at)->format('d M Y') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Updated</span>
                        <span class="info-value">{{ optional($blog->updated_at)->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>

<!-- Action bar -->
<div class="action-bar">
    <a href="{{ route('admin.blogs.index') }}" class="btn-secondary-dash">Cancel</a>
    <button type="submit" class="btn-primary-dash" id="saveBtn">
        <i class="fa fa-check"></i> {{ $isEdit ? 'Update Blog' : 'Save Blog' }}
    </button>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
(function () {
    // Rich text editor
    if (window.CKEDITOR) {
        CKEDITOR.replace('content', { height: 420 });
    }

    // Live image previews
    ['image', 'banner_image', 'author_image'].forEach(function (name) {
        var input = document.getElementById(name);
        var preview = document.getElementById(name + '_preview');
        if (!input || !preview) return;
        input.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                preview.src = URL.createObjectURL(this.files[0]);
                preview.style.display = 'block';
            }
        });
    });

    // Prevent double submit
    document.querySelector('.faq-page form').addEventListener('submit', function () {
        var btn = document.getElementById('saveBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';
    });
})();
</script>