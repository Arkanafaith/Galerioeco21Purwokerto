<?php

namespace Database\Seeders;

use App\Models\SiteContent;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hero Section (teks)
        SiteContent::firstOrCreate(
            ['key' => 'hero_title'],
            [
                'content_type' => 'textarea',
                'content' => 'Oleh-oleh <span class="highlight">Khas Banyumas</span> Asli!',
                'section' => 'hero',
                'order' => 1,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'hero_subtitle'],
            [
                'content_type' => 'textarea',
                'content' => 'Nikmati kelezatan khas Banyumas, langsung dari UMKM lokal kepercayaan Anda',
                'section' => 'hero',
                'order' => 2,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'hero_stock_text'],
            [
                'content_type' => 'text',
                'content' => '10k+ Pelanggan Mempercayai',
                'section' => 'hero',
                'order' => 3,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'hero_cta_label'],
            [
                'content_type' => 'text',
                'content' => 'Order Sekarang',
                'section' => 'hero',
                'order' => 4,
            ]
        );

        // Stats Section
        SiteContent::firstOrCreate(
            ['key' => 'stats_card1_label'],
            [
                'content_type' => 'text',
                'content' => 'Berdiri',
                'section' => 'stats',
                'order' => 1,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'stats_year'],
            [
                'content_type' => 'text',
                'content' => '2021',
                'section' => 'stats',
                'order' => 2,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'stats_card1_unit'],
            [
                'content_type' => 'text',
                'content' => 'Tahun',
                'section' => 'stats',
                'order' => 3,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'stats_card2_label'],
            [
                'content_type' => 'text',
                'content' => 'Total Pelanggan',
                'section' => 'stats',
                'order' => 4,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'stats_customers'],
            [
                'content_type' => 'text',
                'content' => '100k+',
                'section' => 'stats',
                'order' => 5,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'stats_card2_unit'],
            [
                'content_type' => 'text',
                'content' => 'Produk',
                'section' => 'stats',
                'order' => 6,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'stats_card3_label'],
            [
                'content_type' => 'text',
                'content' => 'Produksi',
                'section' => 'stats',
                'order' => 7,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'stats_card3_value'],
            [
                'content_type' => 'text',
                'content' => 'Harian',
                'section' => 'stats',
                'order' => 8,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'stats_card3_unit'],
            [
                'content_type' => 'text',
                'content' => 'Oleh-oleh',
                'section' => 'stats',
                'order' => 9,
            ]
        );

        // About Section
        SiteContent::firstOrCreate(
            ['key' => 'about_title'],
            [
                'content_type' => 'text',
                'content' => 'Tentang',
                'section' => 'about',
                'order' => 1,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'about_title_highlight'],
            [
                'content_type' => 'text',
                'content' => 'Kami',
                'section' => 'about',
                'order' => 2,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'about_subtitle'],
            [
                'content_type' => 'text',
                'content' => 'Selamat Datang di Galeri Eco 21',
                'section' => 'about',
                'order' => 3,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'about_description'],
            [
                'content_type' => 'textarea',
                'content' => 'Galeri Eco21 adalah pusat oleh-oleh khas Purwokerto/Banyumas yang berlokasi di Jl. Mayjend Sutoyo No.27, Sokanegara. Tempat ini menyediakan berbagai jenis makanan khas, seperti getuk, gethuk goreng, mendoan, carang-carang, makanan khas, dan mendoan, menjadikannya destinasi belanja lengkap dan modern bagi wisatawan.',
                'section' => 'about',
                'order' => 4,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'about_feature_1_title'],
            [
                'content_type' => 'text',
                'content' => 'Dikurasi Dengan Hati',
                'section' => 'about',
                'order' => 5,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'about_feature_1_desc'],
            [
                'content_type' => 'textarea',
                'content' => 'Hanya produk dengan standar rasa dan kebersihan terbaik yang masuk ke rak kami.',
                'section' => 'about',
                'order' => 6,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'about_feature_2_title'],
            [
                'content_type' => 'text',
                'content' => 'Pemberdayaan Lokal',
                'section' => 'about',
                'order' => 7,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'about_feature_2_desc'],
            [
                'content_type' => 'textarea',
                'content' => 'Mendukung ekonomi warga dengan reseller langsung dari produsen pertama.',
                'section' => 'about',
                'order' => 8,
            ]
        );

        // Showcase (accordion + judul)
        SiteContent::firstOrCreate(
            ['key' => 'showcase_title_part1'],
            [
                'content_type' => 'text',
                'content' => 'Temukan',
                'section' => 'showcase',
                'order' => 1,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'showcase_title_highlight'],
            [
                'content_type' => 'text',
                'content' => 'Keunggulan',
                'section' => 'showcase',
                'order' => 2,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'showcase_title_part2'],
            [
                'content_type' => 'text',
                'content' => 'Produk Kami',
                'section' => 'showcase',
                'order' => 3,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'advantage_1_title'],
            [
                'content_type' => 'text',
                'content' => 'Buatan Lokal!',
                'section' => 'advantages',
                'order' => 1,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'advantage_1_desc'],
            [
                'content_type' => 'textarea',
                'content' => 'Diproduksi oleh UMKM lokal Banyumas dengan bahan berkualitas dan cita rasa autentik yang terpercaya.',
                'section' => 'advantages',
                'order' => 2,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'advantage_2_title'],
            [
                'content_type' => 'text',
                'content' => 'Harga Terjangkau',
                'section' => 'advantages',
                'order' => 3,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'advantage_2_desc'],
            [
                'content_type' => 'textarea',
                'content' => 'Harga bersahabat untuk semua kalangan dengan kualitas terjamin.',
                'section' => 'advantages',
                'order' => 4,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'advantage_3_title'],
            [
                'content_type' => 'text',
                'content' => 'Lengkap & Terpercaya',
                'section' => 'advantages',
                'order' => 5,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'advantage_3_desc'],
            [
                'content_type' => 'textarea',
                'content' => 'Koleksi produk terlengkap dan telah dipercaya oleh ribuan pelanggan.',
                'section' => 'advantages',
                'order' => 6,
            ]
        );

        // Ikuti kami (teks saja; link tetap dari Pengaturan Media Sosial)
        SiteContent::firstOrCreate(
            ['key' => 'follow_section_heading'],
            [
                'content_type' => 'textarea',
                'content' => 'Ikuti Eco 21 dan dapatkan update produk terbaru.',
                'section' => 'follow',
                'order' => 1,
            ]
        );

        // Gambar beranda (satu section untuk admin — menggantikan daftar link social di Kelola Konten)
        $order = 1;
        foreach ([
            'hero_image' => 'images/toko/foto_depan_toko.jpg',
            'about_image_1' => 'images/toko/foto1.jpg',
            'about_image_2' => 'images/toko/foto2.jpg',
            'showcase_image' => 'images/toko/foto4.jpg',
            'social_follow_image' => 'images/toko/foto_depan_toko.jpg',
        ] as $key => $path) {
            SiteContent::firstOrCreate(
                ['key' => $key],
                [
                    'content_type' => 'image',
                    'image_path' => $path,
                    'section' => 'gambar_beranda',
                    'order' => $order++,
                ]
            );
        }

        // Link sosial (hanya lewat admin/settings/social — tidak tampil di Kelola Konten)
        $socialDefaults = [
            'social_tiktok_link' => 'https://www.tiktok.com',
            'social_whatsapp_link' => 'https://wa.me/6281234567890',
            'social_tokopedia_link' => 'https://www.tokopedia.com',
            'social_instagram_link' => 'https://www.instagram.com',
            'social_linkedin_link' => 'https://www.linkedin.com',
            'social_shopee_link' => 'https://shopee.co.id',
            'social_google_maps_link' => 'https://maps.app.goo.gl/oCyAwKJt9XZQbJaHA',
        ];
        $sOrder = 1;
        foreach ($socialDefaults as $key => $url) {
            SiteContent::firstOrCreate(
                ['key' => $key],
                [
                    'content_type' => 'text',
                    'content' => $url,
                    'section' => 'social_links',
                    'order' => $sOrder++,
                ]
            );
        }
    }
}
