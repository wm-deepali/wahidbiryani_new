{{-- Reuses the FAQ admin stylesheet (same design system) + a few blog-only rules --}}
@include('admin.faqs._styles')
<style>
    .file-input {
        padding: 6px 10px;
        height: auto;
    }

    .img-preview {
        margin-top: 8px;
        width: 100%;
        max-height: 140px;
        object-fit: cover;
        border-radius: var(--radius-sm);
        border: 1px solid var(--border);
        display: block;
    }

    .img-preview-round {
        width: 64px;
        height: 64px;
        border-radius: 50%;
    }

    .blog-thumb {
        width: 56px;
        height: 42px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid var(--border);
        background: var(--bg);
        display: block;
    }

    .field-select {
        appearance: auto;
    }

    .two-col {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    @media(max-width:600px) {
        .two-col {
            grid-template-columns: 1fr;
        }
    }
</style>