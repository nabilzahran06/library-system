@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
<div style="max-width: 800px; margin: 40px auto; padding: 25px; background: white; border: 1px solid #e5e5e5; border-radius: 12px;">

    <h2>Detail Buku</h2>
    <p style="color: #777;">Informasi lengkap buku perpustakaan.</p>

    <hr>

    <p><strong>ID Buku:</strong> #{{ $book->id }}</p>
    <p><strong>Judul Buku:</strong> {{ $book->title }}</p>
    <p><strong>Penulis:</strong> {{ $book->author }}</p>
    <p><strong>Tahun Terbit:</strong> {{ $book->published_year ?? '-' }}</p>
    <p><strong>Stok:</strong> {{ $book->stock }} unit</p>
    <p><strong>Kategori:</strong> {{ $book->category->name ?? '-' }}</p>

    <a href="{{ route('books.index') }}"
       style="display: inline-block; margin-top: 15px; padding: 10px 18px; background: #6b7280; color: white; text-decoration: none; border-radius: 6px;">
        Kembali
    </a>

</div>
@endsection