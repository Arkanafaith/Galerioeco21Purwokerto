<?php

namespace App\Helpers;

use App\Models\SiteContent;

class ContentHelper
{
    /**
     * Get content value by key
     */
    public static function get($key, $default = null)
    {
        $content = SiteContent::getByKey($key);
        return $content ? $content->content : $default;
    }

    /**
     * Get image path by key
     */
    public static function getImage($key, $default = null)
    {
        $content = SiteContent::getByKey($key);
        if ($content && $content->image_path) {
            return asset($content->image_path);
        }
        return $default;
    }

    /**
     * Get all content by section
     */
    public static function getSection($section)
    {
        return SiteContent::getBySection($section);
    }
}
