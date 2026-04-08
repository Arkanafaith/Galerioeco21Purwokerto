@extends('admin.layout')

@section('title','Products')

@section('content')
    <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px">
        <div>
            <a href="{{ route('admin.products.index') }}" class="btn" style="background:{{ empty($filterBest) ? '#3b82f6' : '#e5e7eb' }};color:{{ empty($filterBest) ? 'white' : '#1f2937' }}">All Products</a>
            <a href="{{ route('admin.products.index', ['best'=>1]) }}" class="btn" style="background:{{ $filterBest ? '#3b82f6' : '#e5e7eb' }};color:{{ $filterBest ? 'white' : '#1f2937' }}">Best Products</a>
        </div>
        <a href="{{ route('admin.products.create', $filterBest ? ['best'=>1] : []) }}" class="btn">Add Product</a>
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:18px;margin-top:16px">
        @forelse($products as $product)
            <div style="background:white;border-radius:10px;padding:12px;box-shadow:0 6px 18px rgba(0,0,0,0.06);display:flex;flex-direction:column">
                <div style="height:140px;display:flex;align-items:center;justify-content:center;background:#f8f8f8;border-radius:8px;overflow:hidden">
                    @if($product->image)
                        <img src="/{{ $product->image }}" alt="{{ $product->name }}" style="max-width:100%;max-height:100%">
                    @else
                        <div style="font-weight:700;color:#444">No Image</div>
                    @endif
                </div>
                <div style="flex:1;padding-top:10px">
                    <div style="font-weight:700">{{ $product->name }}</div>
                    <div style="color:#666;margin-top:6px">Rp{{ number_format($product->price,0,',','.') }}</div>
                </div>
                <div style="display:flex;gap:8px;justify-content:flex-end;margin-top:12px">
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn" style="background:#3b82f6">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Hapus produk ini?');">@csrf @method('DELETE')<button class="btn" style="background:#ef4444">Delete</button></form>
                </div>
            </div>
        @empty
            <div>No products yet.</div>
        @endforelse
    </div>

    <div style="margin-top:16px">{{ $products->links() }}</div>
@endsection
