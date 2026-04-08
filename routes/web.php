<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Models\Product;
use App\Models\SiteContent;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    // Fetch dynamic content from database
    $siteContent = SiteContent::all()->groupBy('section');
    
    // Show best products first if any, otherwise latest
    // Only show products explicitly marked as best. Do not fall back to latest products.
    $topProducts = Product::where('is_best', true)
                    ->orderBy('updated_at','desc')
                    ->take(3)
                    ->get();
    $products = Product::orderBy('created_at','desc')->get();
    return view('welcome', compact('topProducts','products', 'siteContent'));
});

// public product detail page
Route::get('product/{product}', function (App\Models\Product $product) {
    // Load only visible reviews with product
    $product->load(['reviews' => function($query) {
        $query->where('is_visible', true)->orderBy('created_at', 'desc');
    }]);
    return view('product', compact('product'));
})->name('product.show');

// Review submission route
Route::post('product/{product}/review', [ReviewController::class, 'store'])->name('review.store');

// Admin routes: simple session-based auth + admin middleware
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SiteContentController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;

Route::prefix('admin')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login.post');

    Route::middleware(['auth','admin'])->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
        Route::get('/', function () { return redirect()->route('admin.dashboard'); });
        Route::get('dashboard', function () { return view('admin.dashboard'); })->name('admin.dashboard');
        
        // Settings routes
        Route::get('settings', [AuthController::class, 'showSettings'])->name('admin.settings');
        Route::post('settings', [AuthController::class, 'updateSettings'])->name('admin.settings.update');

        // Social media settings routes
        Route::get('settings/social', [SiteContentController::class, 'showSocialSettings'])->name('admin.settings.social');
        Route::put('settings/social', [SiteContentController::class, 'updateSocialSettings'])->name('admin.settings.social.update');

        Route::resource('products', ProductController::class, ['as' => 'admin']);
        Route::get('content', [SiteContentController::class, 'index'])->name('admin.content.index');
        Route::get('content/{content}/edit', [SiteContentController::class, 'edit'])->name('admin.content.edit');
        Route::put('content/{content}', [SiteContentController::class, 'update'])->name('admin.content.update');
        Route::get('content/{content}', [SiteContentController::class, 'show'])->name('admin.content.show');

        // Review management routes
        Route::get('reviews', [AdminReviewController::class, 'index'])->name('admin.reviews.index');
        Route::post('reviews/{review}/hide', [AdminReviewController::class, 'hide'])->name('admin.reviews.hide');
        Route::post('reviews/{review}/show', [AdminReviewController::class, 'show'])->name('admin.reviews.show');
        Route::delete('reviews/{review}', [AdminReviewController::class, 'destroy'])->name('admin.reviews.destroy');


    });
});
