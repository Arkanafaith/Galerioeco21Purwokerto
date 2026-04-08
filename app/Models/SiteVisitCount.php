<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteVisitCount extends Model
{
    use HasFactory;

    protected $table = 'site_visits_counts';

    protected $fillable = [
        'count',
        'date',
    ];

    protected $casts = [
        'count' => 'integer',
        'date' => 'date',
    ];

    /**
     * Increment today's visit count
     */
    public static function recordVisit()
    {
        $today = now()->toDateString();
        
        $visit = self::where('date', $today)->first();
        
        if ($visit) {
            $visit->increment('count');
        } else {
            self::create([
                'count' => 1,
                'date' => $today,
            ]);
        }
    }

    /**
     * Get total visits
     */
    public static function getTotalVisits()
    {
        return self::sum('count');
    }

    /**
     * Get today's visits
     */
    public static function getTodayVisits()
    {
        $today = now()->toDateString();
        return self::where('date', $today)->value('count') ?? 0;
    }
}

