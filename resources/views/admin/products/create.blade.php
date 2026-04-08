@extends('admin.layout')

@section('title','Create Product')

@section('content')
    <h3>Create Product</h3>
    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @csrf
        <div style="margin-bottom:10px">
            <label>Name</label><br>
            <input name="name" required style="width:100%;padding:8px" value="{{ old('name') }}">
        </div>
        <div style="margin-bottom:10px">
            <label>Price</label><br>
            <input name="price" required type="number" step="0.01" style="width:100%;padding:8px" value="{{ old('price') }}">
        </div>
        <div style="margin-bottom:10px">
            <label>Description</label><br>
            <textarea name="description" style="width:100%;padding:8px">{{ old('description') }}</textarea>
        </div>
        <div style="margin-bottom:10px">
            <label>Tokopedia Link (optional)</label><br>
            <input name="tokopedia_link" type="url" style="width:100%;padding:8px" placeholder="https://tokopedia.com/..." value="{{ old('tokopedia_link') }}">
        </div>
        <div style="margin-bottom:10px">
            <label>Shopee Link (optional)</label><br>
            <input name="shopee_link" type="url" style="width:100%;padding:8px" placeholder="https://shopee.co.id/..." value="{{ old('shopee_link') }}">
        </div>
        <div style="margin-bottom:10px">
            <label>Image (optional)</label><br>
            <input type="file" name="image" accept="image/*">
        </div>
        <div style="margin-bottom:10px">
            <label><input type="checkbox" name="is_best" value="1" {{ old('is_best', request('best')) ? 'checked' : '' }}> Mark as Best Product</label>
        </div>
        <button class="btn" type="submit">Save</button>
    </form>
@endsection
