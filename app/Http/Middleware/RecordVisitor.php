<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\SiteVisitCount;

class RecordVisitor
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Record visit for every page view (except admin)
        // Skip if table doesn't exist yet
        try {
            if (!$request->is('admin/*')) {
                SiteVisitCount::recordVisit();
            }
        } catch (\Exception $e) {
            // Table doesn't exist yet, skip recording
        }
        
        return $next($request);
    }
}

