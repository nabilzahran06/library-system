
@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<style>
    .books-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
        font-family: Arial, sans-serif;
        color: #222;
    }

    .books-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 28px;
    }

    .books-header h2 {
        margin: 0;
        font-size: 28px;
        font-weight: 700;
    }

    .books-header p {
        color: #777;
        margin: 8px 0 0;
        font-size: 14px;
    }

    .books-summary {
        display: flex;
        gap: 12px;
        margin-bottom: 22px;
        flex-wrap: wrap;
    }

    .summary-card {
        flex: 1;
        min-width: 150px;
        padding: 18px 20px;
        background: #fff;
        border: 1px solid #e5e5e5;
        border-radius: 12px;
    }

    .summary-card span {
        display: block;
        color: #777;
        font-size: 13px;
        margin-bottom: 8px;
    }

    .summary-card strong {
        font-size: 25px;
        color: #222;
    }

    .books-card {
        background: #fff;
        border: 1px solid #e5e5e5;
        border-radius: 12px;
        overflow: hidden;
    }

    .table-header {
        padding: 18px 20px;
        border-bottom: 1px solid #eee;
    }

    .table-header h3 {
        margin: 0;
        font-size: 17px;
    }

    .table-header p {
        margin: 6px 0 0;
        font-size: 13px;
        color: #888;
    }

    .books-table-wrapper {
        overflow-x: auto;
    }

    .books-table {
        width: 100%;
        min-width: 1050px;
        border-collapse: collapse;
    }

    .books-table th,
    .books-table td {
        padding: 16px 18px;
        text-align: left;
        border-bottom: 1px solid #eee;
        font-size: 14px;
        vertical-align: middle;
    }

    .books-table th {
        background: #f8f8f8;
        color: #666;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .4px;
        white-space: nowrap;
    }

    .books-table tbody tr {
        transition: background .2s ease;
    }

    .books-table tbody tr:hover {
        background: #fafafa;
    }

    .books-table tbody tr:last-child td {
        border-bottom: none;
    }

    .book-number,
    .book-id {
        color: #888;
    }

    .book-title {
        font-weight: 600;
        color: #222;
    }

    .book-author {
        color: #666;
    }

    .book-category {
        display: inline-block;
        padding: 5px 10px;
        background: #f0f0f0;
        border-radius: 6px;
        font-size: 12px;
        color: #555;
    }

    .book-stock {
        display: inline-block;
        padding: 5px 10px;
        background: #eef5ee;
        color: #387343;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
    }

    .book-actions {
        display: flex;
        align-items: center;
        gap: 6px;
        flex-wrap: wrap;
    }

    .action-btn {
        display: inline-block;
        padding: 7px 10px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        white-space: nowrap;
    }

    .action-detail {
        background: #e8f1ff;
        color: #2563eb;
    }

    .action-edit {
        background: #fff4df;
        color: #b7791f;
    }

    .action-delete {
        background: #feecec;
        color: #dc2626;
    }

    .action-btn:hover {
        opacity: .8;
    }

    .books-empty {
        padding: 45px 20px;
        text-align: center;
        color: #777;
    }

    .books-footer {
        padding: 15px 20px;
        border-top: 1px solid #eee;
        color: #888;
        font-size: 12px;
    }

    .add-book-btn {
        display: inline-block;
        padding: 11px 16px;
        background: #2563eb;
        color: #fff;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }

    .add-book-btn:hover {
        background: #1d4ed8;
    }

    .delete-form {
        display: inline;
        margin: 0;
    }

    @media (max-width: 600px) {
        .books-container {
            padding: 0 10px;
            margin: 24px auto;
        }

        .books-header h2 {
            font-size: 24px;
        }

        .summary-card {
            min-width: 120px;
        }
    }
</style>

<div class="books-container">

    {{-- Header --}}
    <div class="books-header">
        <div>
            <h2>Daftar Buku</h2>
            <p>Kelola dan lihat koleksi buku perpustakaan.</p>
        </div>

        <a href="{{ route('books.create') }}" class="add-book-btn">
            + Tambah Buku
        </a>
    </div>

    {{-- Ringkasan --}}
    <div class="books-summary">
        <div class="summary-card">
            <span>Total Buku</span>
            <strong>{{ $books->count() }}</strong>
        </div>

        <div class="summary-card">
            <span>Total Stok</span>
            <strong>{{ $books->sum('stock') }}</strong>
        </div>
    </div>

    {{-- Tabel Buku --}}
    <div class="books-card">

        <div class="table-header">
            <h3>Koleksi Buku</h3>
            <p>Data buku yang tersimpan dalam database.</p>
        </div>

        @if ($books->isEmpty())
            <div class="books-empty">
                Belum ada data buku.
            </div>
        @else
            <div class="books-table-wrapper">
                <table class="books-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Tahun Terbit</th>
                            <th>Stok</th>
                            <th>Kategori</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td class="book-number">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="book-id">
                                    #{{ $book->id }}
                                </td>

                                <td class="book-title">
                                    {{ $book->title }}
                                </td>

                                <td class="book-author">
                                    {{ $book->author }}
                                </td>

                                <td>
                                    {{ $book->published_year ?? '-' }}
                                </td>

                                <td>
                                    <span class="book-stock">
                                        {{ $book->stock }} unit
                                    </span>
                                </td>

                                <td>
                                    <span class="book-category">
                                        {{ $book->category->name ?? '-' }}
                                    </span>
                                </td>

                                <td>
                                    <div class="book-actions">
                                        <a href="{{ route('books.show', $book->id) }}"
                                           class="action-btn action-detail">
                                            Detail
                                        </a>

                                        <a href="{{ route('books.edit', $book->id) }}"
                                           class="action-btn action-edit">
                                            Edit
                                        </a>

                                        <form action="{{ route('books.destroy', $book->id) }}"
                                              method="POST"
                                              class="delete-form"
                                              onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="action-btn action-delete">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="books-footer">
            Menampilkan {{ $books->count() }} data buku.
        </div>

    </div>
</div>
@endsection
