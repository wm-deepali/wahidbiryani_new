@extends('layouts.app')

@section('body_class', 'heritage-page')

@section('content')

    @php
        $platformIcons = [
            'youtube'   => 'fa-youtube',
            'facebook'  => 'fa-facebook-f',
            'instagram' => 'fa-instagram',
        ];
    @endphp

    <style>
        .vg-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 24px; }
        .vg-card { position: relative; aspect-ratio: 9 / 14; border-radius: 16px; overflow: hidden; cursor: pointer;
            background: linear-gradient(160deg, var(--color-primary, #5a1a24), #1d1d1d); border: 1px solid rgba(196, 154, 69, 0.35);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12); transition: transform .35s ease, box-shadow .35s ease; outline: none; }
        .vg-card:hover, .vg-card:focus-visible { transform: translateY(-6px); box-shadow: 0 18px 40px rgba(0, 0, 0, 0.2); }
        .vg-card .vg-thumb { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; transition: transform .6s ease; }
        .vg-card:hover .vg-thumb { transform: scale(1.05); }
        .vg-card .vg-fallback-icon { position: absolute; inset: 0; display: flex; align-items: center; justify-content: center;
            font-size: 4rem; color: var(--color-accent, #C49A45); opacity: .35; }
        .vg-card .vg-shade { position: absolute; inset: 0; background: linear-gradient(to top, rgba(0, 0, 0, .8) 0%, rgba(0, 0, 0, .05) 55%, rgba(0, 0, 0, .25) 100%); }
        .vg-badge { position: absolute; top: 14px; left: 14px; z-index: 2; display: inline-flex; align-items: center; gap: 6px;
            padding: 5px 12px; border-radius: 999px; font-size: .75rem; font-weight: 600; letter-spacing: .04em; color: #fff;
            background: rgba(0, 0, 0, .45); backdrop-filter: blur(4px); }
        .vg-badge i { color: var(--color-accent, #C49A45); }
        .vg-play { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2; width: 64px; height: 64px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center; font-size: 1.3rem; color: var(--color-primary, #5a1a24);
            background: var(--color-accent, #C49A45); box-shadow: 0 0 0 8px rgba(196, 154, 69, .25); transition: transform .3s ease; }
        .vg-card:hover .vg-play { transform: translate(-50%, -50%) scale(1.1); }
        .vg-info { position: absolute; left: 0; right: 0; bottom: 0; z-index: 2; padding: 18px; color: #fff; }
        .vg-info h3 { font-size: 1.1rem; line-height: 1.35; margin: 0 0 4px; color: #fff; }
        .vg-info span { font-size: .8rem; opacity: .85; }
        .vg-frame-box { width: 100%; background: #000; border-radius: 12px; overflow: hidden; }
        .vg-frame-box.vg-wide { aspect-ratio: 16 / 9; }
        .vg-frame-box.vg-tall { height: 70vh; max-height: 680px; }
        .vg-frame-box iframe { width: 100%; height: 100%; border: 0; display: block; }
        .vg-frame-box video { width: 100%; height: 100%; background: #000; display: none; object-fit: contain; }
    </style>

    <!-- Page Header -->
    <section class="section-padding text-center heritage-page-header position-relative overflow-hidden bg-ivory"
        style="padding-top: 180px;">

        <!-- Subtle Pattern -->
        <div class="sig-jaali-overlay" style="opacity: 0.05; z-index: 1;"></div>

        <div class="container position-relative" style="z-index: 5;">
            <div class="heritage-title-box">

                <!-- Royal Breadcrumb -->
                <nav aria-label="breadcrumb" class="reveal-up mb-4 d-flex justify-content-center">
                    <div class="royal-breadcrumb-wrapper"
                        style="background: rgba(196,154,69,0.05); border-color: rgba(196,154,69,0.25);">
                        <ul class="royal-breadcrumb-list">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="separator">✦</li>
                            <li><a href="{{ route('image-gallery') }}">Gallery</a></li>
                            <li class="separator">✦</li>
                            <li class="active text-primary" style="color: var(--color-primary) !important;">Video Gallery</li>
                        </ul>
                    </div>
                </nav>

                <span class="urdu-accent reveal-up text-accent">ویڈیو گیلری</span>
                <h1 class="section-title split-words text-primary" style="font-size: clamp(2.5rem, 4vw, 3.75rem);">Cinematic
                    Heritage</h1>
                <p class="section-desc reveal-up mx-auto text-dark" style="max-width: 600px; opacity: 0.85;">Watch the magic
                    unfold. See the bustling kitchens, the charcoal sigris, and the legacy of our chefs in motion.</p>

                <div class="hero-ornament reveal-up" style="opacity: 1; transform: none; margin-top: 30px;">
                    <svg width="220" height="20" viewBox="0 0 220 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="ornament-line" d="M10 10H100C105 5 110 1 110 1C110 1 115 5 120 10H210" stroke="#C49A45"
                            stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Gallery -->
    <section class="section-padding bg-ivory" style="padding-top: 40px; padding-bottom: 80px;">
        <div class="container">

            @if($videos->count())
                <div class="vg-grid">
                    @foreach($videos as $video)
                        @php $isUpload = $video->isUpload(); @endphp
                        <div class="vg-card reveal-scale" role="button" tabindex="0"
                            data-source="{{ $isUpload ? 'file' : 'embed' }}"
                            data-embed="{{ $video->embed_url }}" data-file="{{ $video->video_file_url }}"
                            data-platform="{{ $video->platform }}"
                            data-title="{{ $video->title }}" data-url="{{ $video->open_url }}">

                            @if($video->thumbnail_url)
                                <img class="vg-thumb" loading="lazy" src="{{ $video->thumbnail_url }}" alt="{{ $video->title }}">
                            @elseif($isUpload)
                                {{-- no thumbnail uploaded: show the video's first frame --}}
                                <video class="vg-thumb" src="{{ $video->video_file_url }}#t=0.5" preload="metadata" muted playsinline></video>
                            @else
                                <div class="vg-fallback-icon"><i class="fa-brands {{ $platformIcons[$video->platform] ?? 'fa-youtube' }}"></i></div>
                            @endif

                            <div class="vg-shade"></div>

                            <span class="vg-badge">
                                @if($isUpload)
                                    <i class="fa-solid fa-film"></i>
                                    Video
                                @else
                                    <i class="fa-brands {{ $platformIcons[$video->platform] ?? 'fa-youtube' }}"></i>
                                    {{ $video->platform_label }}
                                @endif
                            </span>

                            <div class="vg-play"><i class="fa-solid fa-play"></i></div>

                            <div class="vg-info">
                                <h3>{{ $video->title }}</h3>
                                @if($video->subtitle)
                                    <span>{{ $video->subtitle }}</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-dark opacity-75">Our videos will be available soon.</p>
            @endif

        </div>
    </section>

    <!-- Video Modal -->
    <div class="modal fade" id="vgModal" tabindex="-1" aria-labelledby="vgModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" id="vgDialog" style="max-width: 900px;">
            <div class="modal-content">
                <div class="modal-header py-2 px-3">
                    <h5 class="modal-title" id="vgModalLabel" style="font-size: 1.05rem;">Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <div class="vg-frame-box vg-wide" id="vgFrameBox">
                        <iframe id="vgFrame" src="" title="Video player" loading="lazy"
                            allow="autoplay; encrypted-media; picture-in-picture; fullscreen" allowfullscreen></iframe>
                        <video id="vgVideo" controls playsinline preload="metadata"></video>
                    </div>
                    <div class="text-end mt-3">
                        <a href="#" id="vgOpenLink" target="_blank" rel="noopener"
                            class="btn btn-gold-outline btn-sm py-2 px-3">Open on <span id="vgOpenLabel">platform</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modalEl = document.getElementById('vgModal');
            if (!modalEl) return;

            var modal = new bootstrap.Modal(modalEl);
            var dialog = document.getElementById('vgDialog');
            var box = document.getElementById('vgFrameBox');
            var frame = document.getElementById('vgFrame');
            var player = document.getElementById('vgVideo');
            var title = document.getElementById('vgModalLabel');
            var openLink = document.getElementById('vgOpenLink');
            var openLabel = document.getElementById('vgOpenLabel');

            var labels = { youtube: 'YouTube', facebook: 'Facebook', instagram: 'Instagram' };

            function resetPlayers() {
                frame.src = '';
                frame.style.display = '';
                player.pause();
                player.removeAttribute('src');
                player.load();
                player.style.display = 'none';
            }

            function openVideo(card) {
                var platform = card.dataset.platform;
                resetPlayers();
                title.textContent = card.dataset.title;

                if (card.dataset.source === 'file') {
                    // Uploaded video file -> native player
                    box.className = 'vg-frame-box vg-wide';
                    dialog.style.maxWidth = '900px';
                    frame.style.display = 'none';
                    player.style.display = 'block';
                    player.src = card.dataset.file;
                    openLink.parentNode.style.display = 'none';
                    modal.show();
                    player.play().catch(function () { /* autoplay blocked: user can press play */ });
                    return;
                }

                // Link video -> embed
                var src = card.dataset.embed;

                if (platform === 'youtube') {
                    src += '?autoplay=1&rel=0';
                    box.className = 'vg-frame-box vg-wide';
                    dialog.style.maxWidth = '900px';
                } else {
                    if (platform === 'facebook') src += '&autoplay=true';
                    box.className = 'vg-frame-box vg-tall';
                    dialog.style.maxWidth = '440px';
                }

                openLink.href = card.dataset.url;
                openLabel.textContent = labels[platform] || 'platform';
                openLink.parentNode.style.display = '';
                frame.src = src;
                modal.show();
            }

            document.querySelectorAll('.vg-card').forEach(function (card) {
                card.addEventListener('click', function () { openVideo(card); });
                card.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        openVideo(card);
                    }
                });
            });

            // Stop playback when the modal closes
            modalEl.addEventListener('hidden.bs.modal', resetPlayers);
        });
    </script>

@endpush