<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiteContentController extends Controller
{
    /** Urutan tampilan di Kelola Konten (link sosial dikecualikan). */
    private const SECTION_ORDER = [
        'hero',
        'stats',
        'about',
        'showcase',
        'advantages',
        'products',
        'testimonial',
        'cta',
        'follow',
        'gambar_beranda',
    ];

    /** Judul section ramah untuk admin */
    private const SECTION_LABELS = [
        'hero' => 'Hero (atas beranda)',
        'stats' => 'Statistik',
        'about' => 'Tentang kami',
        'showcase' => 'Showcase / keunggulan',
        'advantages' => 'Accordion keunggulan produk',
        'products' => 'Judul section produk',
        'testimonial' => 'Form ulasan beranda',
        'cta' => 'Ajakan hubungi (CTA)',
        'follow' => 'Section ikuti kami (teks)',
        'gambar_beranda' => 'Gambar beranda',
    ];

    /**
     * Display all site content organized by sections
     */
    public function index()
    {
        $rawSections = SiteContent::query()
            ->where('section', '!=', 'social_links')
            ->distinct()
            ->pluck('section')
            ->filter()
            ->values();

        $sections = $rawSections->sortBy(function ($section) {
            $idx = array_search($section, self::SECTION_ORDER, true);

            return $idx !== false ? $idx : 100;
        })->values();

        $contents = [];
        foreach ($sections as $section) {
            $contents[$section] = SiteContent::getBySection($section);
        }

        $sectionLabels = self::SECTION_LABELS;

        return view('admin.content.index', compact('contents', 'sections', 'sectionLabels'));
    }

    /**
     * Show form to edit a specific content
     */
    public function edit(SiteContent $content)
    {
        return view('admin.content.edit', ['siteContent' => $content]);
    }

    /**
     * Display a specific content (required by route)
     */
    public function show(SiteContent $content)
    {
        return view('admin.content.edit', ['siteContent' => $content]);
    }

    /**
     * Update content
     */
    public function update(Request $request, SiteContent $content)
    {
        $data = [];

        if ($content->content_type === 'image') {
            if ($request->hasFile('image')) {
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
                return redirect()
                    ->route('admin.content.edit', $content)
                    ->with('info', 'Gambar tidak diubah — pilih file baru untuk mengganti gambar.');
            }
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
