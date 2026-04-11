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
        // Hero Section
        SiteContent::firstOrCreate(
            ['key' => 'hero_title'],
            [
                'content_type' => 'text',
                'content' => 'Oleh-oleh Khas Banyumas Asli!',
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

        // Stats Section
        SiteContent::firstOrCreate(
            ['key' => 'stats_year'],
            [
                'content_type' => 'text',
                'content' => '2021',
                'section' => 'stats',
                'order' => 1,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'stats_customers'],
            [
                'content_type' => 'text',
                'content' => '100k+',
                'section' => 'stats',
                'order' => 2,
            ]
        );

        // About Section
        SiteContent::firstOrCreate(
            ['key' => 'about_title'],
            [
                'content_type' => 'text',
                'content' => 'Tentang Kami',
                'section' => 'about',
                'order' => 1,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'about_subtitle'],
            [
                'content_type' => 'text',
                'content' => 'Selamat Datang di Galeri Eco 21',
                'section' => 'about',
                'order' => 2,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'about_description'],
            [
                'content_type' => 'textarea',
                'content' => 'Galeri Eco21 adalah pusat oleh-oleh khas Purwokerto/Banyumas yang berlokasi di Jl. Mayjend Sutoyo No.27, Sokanegara. Tempat ini menyediakan berbagai jenis makanan khas, seperti getuk, gethuk goreng, mendoan, carang-carang, makanan khas, dan mendoan, menjadikannya destinasi belanja lengkap dan modern bagi wisatawan.',
                'section' => 'about',
                'order' => 3,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'about_feature_1_title'],
            [
                'content_type' => 'text',
                'content' => 'Dikurasi Dengan Hati',
                'section' => 'about',
                'order' => 4,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'about_feature_1_desc'],
            [
                'content_type' => 'textarea',
                'content' => 'Hanya produk dengan standar rasa dan kebersihan terbaik yang masuk ke rak kami.',
                'section' => 'about',
                'order' => 5,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'about_feature_2_title'],
            [
                'content_type' => 'text',
                'content' => 'Pemberdayaan Lokal',
                'section' => 'about',
                'order' => 6,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'about_feature_2_desc'],
            [
                'content_type' => 'textarea',
                'content' => 'Mendukung ekonomi warga dengan reseller langsung dari produsen pertama.',
                'section' => 'about',
                'order' => 7,
            ]
        );

        // Product Advantages (Showcase Section)
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

        // CTA Section
        SiteContent::firstOrCreate(
            ['key' => 'cta_title'],
            [
                'content_type' => 'text',
                'content' => 'Cari oleh-oleh yang berkesan?',
                'section' => 'cta',
                'order' => 1,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'cta_subtitle'],
            [
                'content_type' => 'text',
                'content' => 'Kami punya pilihan istimewa untuk dibawa pulang.',
                'section' => 'cta',
                'order' => 2,
            ]
        );

        // Hero Image
        SiteContent::firstOrCreate(
            ['key' => 'hero_image'],
            [
                'content_type' => 'image',
                'image_path' => 'images/toko/foto_depan_toko.jpg',
                'section' => 'hero',
                'order' => 4,
            ]
        );

        // About Images
        SiteContent::firstOrCreate(
            ['key' => 'about_image_1'],
            [
                'content_type' => 'image',
                'image_path' => 'images/toko/foto1.jpg',
                'section' => 'about',
                'order' => 8,
            ]
        );

        SiteContent::firstOrCreate(
            ['key' => 'about_image_2'],
            [
                'content_type' => 'image',
                'image_path' => 'images/toko/foto2.jpg',
                'section' => 'about',
                'order' => 9,
            ]
        );

        // Showcase Image
        SiteContent::firstOrCreate(
            ['key' => 'showcase_image'],
            [
                'content_type' => 'image',
                'image_path' => 'images/toko/foto4.jpg',
                'section' => 'showcase',
                'order' => 1,
            ]
        );

        // Social Follow Image
        SiteContent::firstOrCreate(
            ['key' => 'social_follow_image'],
            [
                'content_type' => 'image',
                'image_path' => 'images/toko/foto_depan_toko.jpg',
                'section' => 'social',
                'order' => 1,
            ]
        );
    }
}
