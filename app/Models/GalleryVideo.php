<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GalleryVideo extends Model
{
    public const PLATFORM_UPLOAD = 'upload';

    protected $fillable = [
        'title',
        'subtitle',
        'video_url',
        'video_file',
        'platform',
        'thumbnail',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'status'     => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    public function isUpload(): bool
    {
        return $this->platform === self::PLATFORM_UPLOAD;
    }

    /**
     * Recognises a YouTube / Facebook / Instagram link.
     * Returns ['platform' => ..., 'embed_url' => ..., 'youtube_id' => ...|null] or null if the link isn't supported.
     */
    public static function analyze(?string $url): ?array
    {
        $url = trim((string) $url);

        if ($url === '') {
            return null;
        }

        // YouTube: watch?v=, youtu.be/, shorts/, embed/, live/
        if (preg_match('~(?:youtu\.be/|youtube(?:-nocookie)?\.com/(?:watch\?(?:.*&)?v=|embed/|shorts/|live/))([A-Za-z0-9_-]{11})~i', $url, $m)) {
            return [
                'platform'   => 'youtube',
                'embed_url'  => 'https://www.youtube.com/embed/' . $m[1],
                'youtube_id' => $m[1],
            ];
        }

        // Instagram: reel / reels / p / tv
        if (preg_match('~instagram\.com/(?:[^/?#]+/)?(reels?|p|tv)/([A-Za-z0-9_-]+)~i', $url, $m)) {
            $type = strtolower($m[1]) === 'reels' ? 'reel' : strtolower($m[1]);

            return [
                'platform'   => 'instagram',
                'embed_url'  => 'https://www.instagram.com/' . $type . '/' . $m[2] . '/embed',
                'youtube_id' => null,
            ];
        }

        // Facebook: facebook.com/... (videos, reel, watch, share) or fb.watch
        if (preg_match('~^https?://(?:[a-z0-9-]+\.)?(?:facebook\.com|fb\.watch)/~i', $url)) {
            return [
                'platform'   => 'facebook',
                'embed_url'  => 'https://www.facebook.com/plugins/video.php?href=' . urlencode($url) . '&show_text=false&width=560',
                'youtube_id' => null,
            ];
        }

        return null;
    }

    private function fileUrl(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        if (Str::startsWith($path, ['assets/', 'uploads/'])) {
            return asset($path);
        }

        return asset('storage/' . ltrim($path, '/'));
    }

    // Embed URL for link videos; null for uploaded videos
    public function getEmbedUrlAttribute(): ?string
    {
        if ($this->isUpload()) {
            return null;
        }

        return static::analyze($this->video_url)['embed_url'] ?? null;
    }

    // Public URL of the uploaded video file (upload videos only)
    public function getVideoFileUrlAttribute(): ?string
    {
        return $this->fileUrl($this->video_file);
    }

    // Where "open" should point: the uploaded file or the original link
    public function getOpenUrlAttribute(): ?string
    {
        return $this->isUpload() ? $this->video_file_url : $this->video_url;
    }

    // Uploaded thumbnail first; otherwise YouTube's own thumbnail; Instagram/Facebook/uploads have none without an upload
    public function getThumbnailUrlAttribute(): ?string
    {
        if ($this->thumbnail) {
            return $this->fileUrl($this->thumbnail);
        }

        if ($this->isUpload()) {
            return null;
        }

        $youtubeId = static::analyze($this->video_url)['youtube_id'] ?? null;

        return $youtubeId ? 'https://img.youtube.com/vi/' . $youtubeId . '/hqdefault.jpg' : null;
    }

    public function getPlatformLabelAttribute(): string
    {
        return $this->isUpload() ? 'Uploaded' : ucfirst((string) $this->platform);
    }
}