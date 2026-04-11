<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Foto section ulasan tidak dikelola lewat Kelola Konten.
     */
    public function up(): void
    {
        DB::table('site_content')->where('key', 'testimonial_image')->update(['section' => 'cms_excluded']);
    }

    public function down(): void
    {
        DB::table('site_content')->where('key', 'testimonial_image')->update(['section' => 'gambar_beranda']);
    }
};
