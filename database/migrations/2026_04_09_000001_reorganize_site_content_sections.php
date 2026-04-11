<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Pindahkan gambar beranda ke section gambar_beranda;
     * link media sosial ke social_links (hanya di halaman Pengaturan Media Sosial).
     */
    public function up(): void
    {
        $homepageImages = [
            'hero_image',
            'about_image_1',
            'about_image_2',
            'showcase_image',
            'social_follow_image',
            'testimonial_image',
        ];

        DB::table('site_content')->whereIn('key', $homepageImages)->update(['section' => 'gambar_beranda']);

        $socialLinkKeys = [
            'social_tiktok_link',
            'social_whatsapp_link',
            'social_tokopedia_link',
            'social_instagram_link',
            'social_linkedin_link',
            'social_shopee_link',
            'social_google_maps_link',
        ];

        DB::table('site_content')
            ->whereIn('key', $socialLinkKeys)
            ->update(['section' => 'social_links']);

        // Pisahkan "Tentang Kami" lama menjadi judul + aksen merah
        DB::table('site_content')
            ->where('key', 'about_title')
            ->where('content', 'Tentang Kami')
            ->update(['content' => 'Tentang']);

        if (! DB::table('site_content')->where('key', 'about_title_highlight')->exists()) {
            DB::table('site_content')->insert([
                'key' => 'about_title_highlight',
                'content_type' => 'text',
                'content' => 'Kami',
                'image_path' => null,
                'section' => 'about',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::table('site_content')->where('key', 'hero_title')->update(['content_type' => 'textarea']);
    }

    public function down(): void
    {
        DB::table('site_content')->where('key', 'hero_image')->update(['section' => 'hero']);
        DB::table('site_content')->whereIn('key', ['about_image_1', 'about_image_2'])->update(['section' => 'about']);
        DB::table('site_content')->where('key', 'showcase_image')->update(['section' => 'showcase']);
        DB::table('site_content')->where('key', 'social_follow_image')->update(['section' => 'social']);
        DB::table('site_content')->where('key', 'testimonial_image')->update(['section' => 'testimonial']);

        $socialLinkKeys = [
            'social_tiktok_link',
            'social_whatsapp_link',
            'social_tokopedia_link',
            'social_instagram_link',
            'social_linkedin_link',
            'social_shopee_link',
            'social_google_maps_link',
        ];

        DB::table('site_content')
            ->whereIn('key', $socialLinkKeys)
            ->update(['section' => 'social']);
    }
};
