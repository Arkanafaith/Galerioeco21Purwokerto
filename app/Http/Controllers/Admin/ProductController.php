<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        $filterBest = $request->query('best');
        if ($filterBest) {
            $query->where('is_best', true);
        }
        $products = $query->orderBy('created_at','desc')->paginate(20)->appends(['best'=>$filterBest]);
        return view('admin.products.index', compact('products', 'filterBest'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'tokopedia_link' => 'nullable|url',
            'shopee_link' => 'nullable|url',
            'is_best' => 'sometimes|boolean',
        ]);
        $data['is_best'] = $request->has('is_best') && $request->is_best;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\-\.]/', '_', $file->getClientOriginalName());
            $file->move(public_path('images/products'), $filename);
            $data['image'] = 'images/products/' . $filename;
        }

        Product::create($data);
        return redirect()->route('admin.products.index')->with('success','Product created');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'tokopedia_link' => 'nullable|url',
            'shopee_link' => 'nullable|url',
            'is_best' => 'sometimes|boolean',
        ]);
        $data['is_best'] = $request->has('is_best') && $request->is_best;
        if ($request->hasFile('image')) {
            // remove old
            if ($product->image && file_exists(public_path($product->image))) {
                @unlink(public_path($product->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\-\.]/', '_', $file->getClientOriginalName());
            $file->move(public_path('images/products'), $filename);
            $data['image'] = 'images/products/' . $filename;
        }

        $product->update($data);
        return redirect()->route('admin.products.index')->with('success','Product updated');
    }

    public function destroy(Product $product)
    {
        // remove file if exists
        if ($product->image && file_exists(public_path($product->image))) {
            @unlink(public_path($product->image));
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success','Product deleted');
    }
}
