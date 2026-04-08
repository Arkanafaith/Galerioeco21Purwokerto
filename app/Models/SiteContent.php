<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
    use HasFactory;

    protected $table = 'site_content';

    protected $fillable = [
        'key',
        'content_type',
        'content',
        'image_path',
        'section',
        'order',
    ];

    /**
     * Get content by key
     */
    public static function getByKey($key)
    {
        return self::where('key', $key)->first();
    }

    /**
     * Get content by key, return just the content value
     */
    public static function getValue($key, $default = null)
    {
        $item = self::where('key', $key)->first();
        return $item ? $item->content : $default;
    }

    /**
     * Get all content by section
     */
    public static function getBySection($section)
    {
        return self::where('section', $section)->orderBy('order')->get();
    }

    /**
     * Get content by section and key
     */
    public static function getBySectionAndKey($section, $key)
    {
        return self::where('section', $section)->where('key', $key)->first();
    }
}
