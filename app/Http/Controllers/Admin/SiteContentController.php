<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiteContentController extends Controller
{
    /**
     * Section yang muncul di Kelola Konten (teks + gambar beranda).
     * Bukan: CTA, ulasan, judul/kategori kartu produk, link sosial (halaman terpisah).
     */
    private const CMS_SECTIONS = [
        'hero',
        'stats',
        'about',
        'showcase',
        'advantages',
        'follow',
        'gambar_beranda',
    ];

    /** Gambar beranda yang boleh diganti admin (bukan foto produk / bukan ulasan). */
    private const CMS_HOMEPAGE_IMAGE_KEYS = [
        'hero_image',
        'about_image_1',
        'about_image_2',
        'showcase_image',
        'social_follow_image',
    ];

    private const SECTION_LABELS = [
        'hero' => 'Hero (atas beranda)',
        'stats' => 'Statistik',
        'about' => 'Tentang kami',
        'showcase' => 'Showcase — judul besar',
        'advantages' => 'Showcase — accordion keunggulan',
        'follow' => 'Section ikuti kami (teks)',
        'gambar_beranda' => 'Gambar beranda (ganti foto)',
    ];

    private const IMAGE_KEY_LABELS = [
        'hero_image' => 'Foto hero (besar di kanan)',
        'about_image_1' => 'Tentang kami — gambar kiri',
        'about_image_2' => 'Tentang kami — gambar kanan',
        'showcase_image' => 'Showcase — foto di kiri',
        'social_follow_image' => 'Section ikuti kami — foto kanan',
    ];

    /**
     * Apakah konten ini boleh diedit lewat Kelola Konten?
     */
    public static function isCmsManaged(SiteContent $content): bool
    {
        if ($content->section === 'social_links') {
            return false;
        }

        if (in_array($content->section, ['cta', 'testimonial', 'products'], true)) {
            return false;
        }

        if (! in_array($content->section, self::CMS_SECTIONS, true)) {
            return false;
        }

        if ($content->content_type === 'image') {
            return in_array($content->key, self::CMS_HOMEPAGE_IMAGE_KEYS, true);
        }

        return true;
    }

    /**
     * Display all site content organized by sections
     */
    public function index()
    {
        $contents = [];
        foreach (self::CMS_SECTIONS as $section) {
            $query = SiteContent::query()
                ->where('section', $section)
                ->orderBy('order');

            if ($section === 'gambar_beranda') {
                $query->whereIn('key', self::CMS_HOMEPAGE_IMAGE_KEYS);
            }

            $rows = $query->get()->filter(fn (SiteContent $c) => self::isCmsManaged($c))->values();
            if ($rows->isNotEmpty()) {
                $contents[$section] = $rows;
            }
        }

        $sections = collect(array_keys($contents));
        $sectionLabels = self::SECTION_LABELS;
        $imageKeyLabels = self::IMAGE_KEY_LABELS;

        return view('admin.content.index', compact('contents', 'sections', 'sectionLabels', 'imageKeyLabels'));
    }

    /**
     * Show form to edit a specific content
     */
    public function edit(SiteContent $content)
    {
        if (! self::isCmsManaged($content)) {
            abort(404);
        }

        return view('admin.content.edit', [
            'siteContent' => $content,
            'imageKeyLabel' => $content->content_type === 'image'
                ? (self::IMAGE_KEY_LABELS[$content->key] ?? null)
                : null,
        ]);
    }

    /**
     * Display a specific content (required by route)
     */
    public function show(SiteContent $content)
    {
        return $this->edit($content);
    }

    /**
     * Update content — gambar hanya bisa diganti (upload baru), tidak boleh dihapus / dikosongkan.
     */
    public function update(Request $request, SiteContent $content)
    {
        if (! self::isCmsManaged($content)) {
            abort(404);
        }

        $data = [];

        if ($content->content_type === 'image') {
            if (! $request->hasFile('image')) {
                return redirect()
                    ->route('admin.content.edit', $content)
                    ->with('info', 'Gambar tidak diubah. Pilih file baru untuk mengganti foto — foto tidak boleh dihapus, hanya diganti.');
            }

            $request->validate([
                'image' => 'required|image|max:5120',
            ]);

            $dir = public_path('images/content');
            if (! File::isDirectory($dir)) {
                File::makeDirectory($dir, 0755, true);
            }

            $old = $content->image_path;
            if ($old && str_starts_with($old, 'images/content/') && file_exists(public_path($old))) {
                @unlink(public_path($old));
            }

            $file = $request->file('image');
            $filename = time().'_'.preg_replace('/[^A-Za-z0-9\-\.]/', '_', $file->getClientOriginalName());
            $file->move($dir, $filename);
            $data['image_path'] = 'images/content/'.$filename;
        } else {
            $request->validate([
                'content' => 'required|string|max:15000',
            ]);
            $data['content'] = $request->input('content');
        }

        if ($data !== []) {
            $content->update($data);
        }

        return redirect()->route('admin.content.index')->with('success', 'Konten berhasil diupdate');
    }

    /**
     * Show social media settings form
     */
    public function showSocialSettings()
    {
        $tiktok = SiteContent::getValue('social_tiktok_link', 'https://www.tiktok.com');
        $whatsapp = SiteContent::getValue('social_whatsapp_link', 'https://wa.me/6281234567890');
        $tokopedia = SiteContent::getValue('social_tokopedia_link', 'https://www.tokopedia.com');
        $instagram = SiteContent::getValue('social_instagram_link', 'https://www.instagram.com');
        $linkedin = SiteContent::getValue('social_linkedin_link', 'https://www.linkedin.com');
        $shopee = SiteContent::getValue('social_shopee_link', 'https://shopee.co.id');
        $googleMaps = SiteContent::getValue('social_google_maps_link', 'https://maps.app.goo.gl/oCyAwKJt9XZQbJaHA');

        return view('admin.social-settings', compact('tiktok', 'whatsapp', 'tokopedia', 'instagram', 'linkedin', 'shopee', 'googleMaps'));
    }

    /**
     * Update social media settings
     */
    public function updateSocialSettings(Request $request)
    {
        $request->validate([
            'social_tiktok_link' => 'nullable|url|max:500',
            'social_whatsapp_link' => 'nullable|url|max:500',
            'social_tokopedia_link' => 'nullable|url|max:500',
            'social_instagram_link' => 'nullable|url|max:500',
            'social_linkedin_link' => 'nullable|url|max:500',
            'social_shopee_link' => 'nullable|url|max:500',
            'social_google_maps_link' => 'nullable|url|max:500',
        ]);

        $fields = [
            'social_tiktok_link' => $request->input('social_tiktok_link'),
            'social_whatsapp_link' => $request->input('social_whatsapp_link'),
            'social_tokopedia_link' => $request->input('social_tokopedia_link'),
            'social_instagram_link' => $request->input('social_instagram_link'),
            'social_linkedin_link' => $request->input('social_linkedin_link'),
            'social_shopee_link' => $request->input('social_shopee_link'),
            'social_google_maps_link' => $request->input('social_google_maps_link'),
        ];

        foreach ($fields as $key => $value) {
            $row = SiteContent::where('key', $key)->first();

            if ($row) {
                $row->update(['content' => $value, 'section' => 'social_links']);
            } else {
                SiteContent::create([
                    'key' => $key,
                    'content' => $value,
                    'content_type' => 'text',
                    'section' => 'social_links',
                    'order' => 0,
                ]);
            }
        }

        return redirect()->route('admin.settings.social')->with('success', 'Link media sosial berhasil diperbarui!');
    }
}
