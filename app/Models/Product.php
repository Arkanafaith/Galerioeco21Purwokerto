<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'is_best',
        'tokopedia_link',
        'shopee_link',
    ];

    protected $casts = [
        'is_best' => 'boolean',
    ];

    /**
     * Get the reviews for this product
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get average rating for this product
     */
    public function getAverageRatingAttribute()
    {
        if ($this->reviews->count() == 0) {
            return 0;
        }
        return round($this->reviews->avg('rating'), 1);
    }

    /**
     * Get review count
     */
    public function getReviewCountAttribute()
    {
        return $this->reviews->count();
    }
}
