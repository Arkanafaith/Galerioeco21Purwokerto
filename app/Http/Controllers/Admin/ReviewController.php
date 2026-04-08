<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of all reviews.
     */
    public function index(Request $request)
    {
        $query = Review::with('product')->orderBy('created_at', 'desc');
        
        // Filter by visibility
        if ($request->has('filter')) {
            if ($request->filter === 'visible') {
                $query->where('is_visible', true);
            } elseif ($request->filter === 'hidden') {
                $query->where('is_visible', false);
            }
        }
        
        // Filter by product
        if ($request->has('product_id') && $request->product_id) {
            $query->where('product_id', $request->product_id);
        }
        
        $reviews = $query->paginate(20)->appends($request->query());
        $products = Product::orderBy('name')->get();
        
        return view('admin.reviews.index', compact('reviews', 'products'));
    }

    /**
     * Remove the specified review from public view (soft delete/hide).
     */
    public function hide(Review $review)
    {
        $review->update(['is_visible' => false]);
        return redirect()->route('admin.reviews.index')
                        ->with('success', 'Ulasan berhasil disembunyikan dari publik.');
    }

    /**
     * Restore the specified review to public view.
     */
    public function show(Review $review)
    {
        $review->update(['is_visible' => true]);
        return redirect()->route('admin.reviews.index')
                        ->with('success', 'Ulasan berhasil ditampilkan kembali.');
    }

    /**
     * Permanently delete the specified review.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')
                        ->with('success', 'Ulasan berhasil dihapus permanen.');
    }
}

