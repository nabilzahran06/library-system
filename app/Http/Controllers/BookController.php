<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // READ: Menampilkan daftar buku
    public function index()
    {
        $books = Book::with('category')->get();

        return view('books.index', compact('books'));
    }

    // READ: Menampilkan detail buku
    public function show(int $id)
    {
        $book = Book::with('category')->findOrFail($id);

        return view('books.show', compact('book'));
    }

    // CREATE: Menampilkan form tambah buku
    public function create()
    {
        $categories = Category::all();

        return view('books.create', compact('categories'));
    }

    // STORE: Menyimpan buku baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
            'stock' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    // UPDATE: Menampilkan form edit buku
    public function edit(int $id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();

        return view('books.edit', compact('book', 'categories'));
    }

    // UPDATE: Menyimpan perubahan buku
    public function update(Request $request, int $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
            'stock' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    // DELETE: Menghapus buku
    public function destroy(int $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}
