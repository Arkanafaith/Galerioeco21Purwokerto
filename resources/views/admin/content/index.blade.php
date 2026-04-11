@extends('admin.layout')

@section('title', 'Kelola Konten Website')

@section('content')
<div class="admin-header">
    <h1>📝 Kelola Konten Website (Edit Only)</h1>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(count($contents) === 0)
    <div class="alert alert-warning">Belum ada konten untuk diedit.</div>
@else
    @foreach($sections as $section)
        @if(isset($contents[$section]) && count($contents[$section]) > 0)
            <div class="content-section">
                <h2>{{ ucfirst(str_replace('_', ' ', $section)) }}</h2>
                
                <div class="content-list">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Key</th>
                                <th>Type</th>
                                <th>Preview</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contents[$section] as $content)
                                <tr>
                                    <td>
                                        <strong>{{ $content->key }}</strong>
                                    </td>
                                    <td>
                                        <span class="badge badge-{{ $content->content_type }}">
                                            {{ ucfirst($content->content_type) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($content->content_type === 'image')
                                            @if($content->image_path)
                                                <img src="{{ asset($content->image_path) }}" alt="{{ $content->key }}" style="max-height: 50px; max-width: 100px;">
                                            @else
                                                <span class="text-muted">Tidak ada gambar</span>
                                            @endif
                                        @else
                                            {{ Str::limit($content->content, 50) }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.content.edit', $content) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @endforeach
@endif

<style>
    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .content-section {
        margin-bottom: 3rem;
    }

    .content-section h2 {
        border-bottom: 2px solid #007bff;
        padding-bottom: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
    }

    .table tbody tr:hover {
        background-color: #f9f9f9;
    }

    .badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 0.25rem;
        font-size: 0.875rem;
        font-weight: 600;
    }

    .badge-text {
        background-color: #e7f3ff;
        color: #004085;
    }

    .badge-textarea {
        background-color: #fff3cd;
        color: #856404;
    }

    .badge-image {
        background-color: #d1e7dd;
        color: #0f5132;
    }

    .badge-number {
        background-color: #e2e3e5;
        color: #383d41;
    }

    .btn {
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 0.25rem;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #212529;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }

    .alert {
        padding: 0.75rem 1.25rem;
        margin-bottom: 1.5rem;
        border: 1px solid transparent;
        border-radius: 0.25rem;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }

    .alert-info {
        color: #0c5460;
        background-color: #d1ecf1;
        border-color: #bee5eb;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

    .text-muted {
        color: #6c757d;
    }
</style>

@endsection
