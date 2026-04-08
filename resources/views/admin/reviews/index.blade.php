@extends('admin.layout')

@section('title', 'Kelola Ulasan')

@section('content')
<div class="dashboard-header">
    <div>
        <h2>Kelola Ulasan</h2>
        <p class="breadcrumb">Admin › Ulasan</p>
    </div>
</div>

<!-- Filter Section -->
<div class="filter-section" style="background: white; padding: 20px; border-radius: 12px; margin-bottom: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.07);">
    <form method="GET" action="{{ route('admin.reviews.index') }}" style="display: flex; gap: 16px; flex-wrap: wrap; align-items: flex-end;">
        <div style="flex: 1; min-width: 200px;">
            <label style="display: block; margin-bottom: 6px; font-weight: 600; color: #374151; font-size: 13px;">Filter Status</label>
            <select name="filter" style="width: 100%; padding: 10px 14px; border: 2px solid #e5e7eb; border-radius: 10px; font-size: 14px;">
                <option value="">Semua</option>
                <option value="visible" {{ request('filter') == 'visible' ? 'selected' : '' }}>Tampilkan</option>
                <option value="hidden" {{ request('filter') == 'hidden' ? 'selected' : 'hidden' }}>Sembunyikan</option>
            </select>
        </div>
        <div style="flex: 1; min-width: 200px;">
            <label style="display: block; margin-bottom: 6px; font-weight: 600; color: #374151; font-size: 13px;">Filter Produk</label>
            <select name="product_id" style="width: 100%; padding: 10px 14px; border: 2px solid #e5e7eb; border-radius: 10px; font-size: 14px;">
                <option value="">Semua Produk</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ request('product_id') == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="btn-primary-admin" style="padding: 10px 20px;">
                🔍 Filter
            </button>
        </div>
    </form>
</div>

<!-- Reviews Table -->
<div class="table-container" style="background: white; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); overflow: hidden;">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #f9fafb; border-bottom: 2px solid #e5e7eb;">
                <th style="padding: 16px; text-align: left; font-weight: 600; color: #374151; font-size: 13px;">Produk</th>
                <th style="padding: 16px; text-align: left; font-weight: 600; color: #374151; font-size: 13px;">Pengguna</th>
                <th style="padding: 16px; text-align: left; font-weight: 600; color: #374151; font-size: 13px;">Rating</th>
                <th style="padding: 16px; text-align: left; font-weight: 600; color: #374151; font-size: 13px;">Ulasan</th>
                <th style="padding: 16px; text-align: left; font-weight: 600; color: #374151; font-size: 13px;">Status</th>
                <th style="padding: 16px; text-align: left; font-weight: 600; color: #374151; font-size: 13px;">Tanggal</th>
                <th style="padding: 16px; text-align: center; font-weight: 600; color: #374151; font-size: 13px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reviews as $review)
                <tr style="border-bottom: 1px solid #f3f4f6;">
                    <td style="padding: 16px;">
                        <a href="{{ route('product.show', $review->product) }}" target="_blank" style="color: #4f46e5; text-decoration: none; font-weight: 500;">
                            {{ $review->product->name }}
                        </a>
                    </td>
                    <td style="padding: 16px;">
                        <div style="font-weight: 500; color: #111827;">{{ $review->name }}</div>
                        <div style="font-size: 12px; color: #9ca3af;">{{ $review->email }}</div>
                    </td>
                    <td style="padding: 16px;">
                        <div style="display: flex; gap: 2px;">
                            @for($i = 1; $i <= 5; $i++)
                                <span style="color: {{ $i <= $review->rating ? '#f59e0b' : '#d1d5db' }}; font-size: 14px;">★</span>
                            @endfor
                        </div>
                    </td>
                    <td style="padding: 16px; max-width: 250px;">
                        <p style="margin: 0; color: #374151; font-size: 14px; line-height: 1.5; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $review->comment }}">
                            {{ $review->comment }}
                        </p>
                    </td>
                    <td style="padding: 16px;">
                        @if($review->is_visible)
                            <span style="display: inline-block; padding: 4px 12px; background: #d1fae5; color: #065f46; border-radius: 20px; font-size: 12px; font-weight: 600;">
                                ✓ Tampil
                            </span>
                        @else
                            <span style="display: inline-block; padding: 4px 12px; background: #fee2e2; color: #991b1b; border-radius: 20px; font-size: 12px; font-weight: 600;">
                                ✕ Sembunyi
                            </span>
                        @endif
                    </td>
                    <td style="padding: 16px; color: #6b7280; font-size: 13px;">
                        {{ $review->created_at->format('d M Y') }}
                    </td>
                    <td style="padding: 16px; text-align: center;">
                        <div style="display: flex; gap: 8px; justify-content: center;">
                            @if($review->is_visible)
                                <form method="POST" action="{{ route('admin.reviews.hide', $review) }}">
                                    @csrf
                                    <button type="submit" title="Sembunyikan" style="background: #fef3c7; color: #92400e; border: none; padding: 8px 12px; border-radius: 8px; cursor: pointer; font-size: 12px; font-weight: 500;">
                                        👁️ Sembunyikan
                                    </button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('admin.reviews.show', $review) }}">
                                    @csrf
                                    <button type="submit" title="Tampilkan" style="background: #d1fae5; color: #065f46; border: none; padding: 8px 12px; border-radius: 8px; cursor: pointer; font-size: 12px; font-weight: 500;">
                                        ✓ Tampilkan
                                    </button>
                                </form>
                            @endif
                            <form method="POST" action="{{ route('admin.reviews.destroy', $review) }}" onsubmit="return confirm('Yakin ingin hapus ulasan ini permanen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Hapus Permanen" style="background: #fee2e2; color: #991b1b; border: none; padding: 8px 12px; border-radius: 8px; cursor: pointer; font-size: 12px; font-weight: 500;">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="padding: 40px; text-align: center; color: #6b7280;">
                        <div style="font-size: 48px; margin-bottom: 12px;">📭</div>
                        <p>Belum ada ulasan</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
@if($reviews->hasPages())
    <div style="margin-top: 24px; display: flex; justify-content: center;">
        {{ $reviews->links() }}
    </div>
@endif

<style>
    /* Style untuk pagination Laravel */
    .pagination {
        display: flex;
        gap: 8px;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .pagination li {
        margin: 0;
    }
    .pagination li a,
    .pagination li span {
        display: block;
        padding: 8px 14px;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        color: #374151;
        text-decoration: none;
        font-size: 14px;
        transition: all 0.2s;
    }
    .pagination li a:hover {
        background: #f3f4f6;
        border-color: #d1d5db;
    }
    .pagination li.active span {
        background: #fbbf24;
        border-color: #fbbf24;
        color: #1f2937;
        font-weight: 600;
    }
    .pagination li.disabled span {
        color: #9ca3af;
        background: #f9fafb;
    }
</style>
@endsection

