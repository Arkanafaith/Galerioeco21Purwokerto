<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function index(Request $request)
    {
        $query = Review::with('product')->orderBy('created_at', 'desc');
        
        // Filters
        if ($request->filled('filter')) {
            if ($request->filter === 'visible') {
                $query->where('is_visible', true);
            } elseif ($request->filter === 'hidden') {
                $query->where('is_visible', false);
            }
        }
        
        if ($request->filled('product_id')) {
            $query->where('product_id', $request->product_id);
        }
        
        $reviews = $query->paginate(20);
        $products = Product::pluck('name', 'id');
        
        return view('admin.reviews.index', compact('reviews', 'products'));
    }

    public function hide(Review $review)
    {
        $review->update(['is_visible' => false]);
        return back()->with('success', 'Review disembunyikan');
    }

    public function show(Review $review)
    {
        $review->update(['is_visible' => true]);
        return back()->with('success', 'Review ditampilkan');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return back()->with('success', 'Review dihapus permanen');
    }
}
?>
