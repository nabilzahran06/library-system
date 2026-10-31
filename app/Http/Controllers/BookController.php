<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    // STORE: Menyimpan buku baru dengan validasi
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/\S/',
                Rule::unique('books', 'title'),
            ],
            'author' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/\S/',
            ],
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
            'stock' => 'required|integer|min:0|max:1000',
            'category_id' => 'nullable|exists:categories,id',
        ], [
            'title.required' => 'Judul buku wajib diisi.',
            'title.min' => 'Judul buku minimal 3 karakter.',
            'title.max' => 'Judul buku maksimal 255 karakter.',
            'title.regex' => 'Judul buku tidak boleh hanya berisi spasi.',
            'title.unique' => 'Judul buku sudah tersedia.',

            'author.required' => 'Nama penulis wajib diisi.',
            'author.min' => 'Nama penulis minimal 3 karakter.',
            'author.max' => 'Nama penulis maksimal 255 karakter.',
            'author.regex' => 'Nama penulis tidak boleh hanya berisi spasi.',

            'published_year.required' => 'Tahun terbit wajib diisi.',
            'published_year.integer' => 'Tahun terbit harus berupa angka bulat.',
            'published_year.min' => 'Tahun terbit minimal 1000.',
            'published_year.max' => 'Tahun terbit tidak boleh melebihi tahun sekarang.',

            'stock.required' => 'Stok buku wajib diisi.',
            'stock.integer' => 'Stok harus berupa angka bulat.',
            'stock.min' => 'Stok tidak boleh kurang dari 0.',
            'stock.max' => 'Stok maksimal adalah 1000.',

            'category_id.exists' => 'Kategori yang dipilih tidak tersedia.',
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

    // UPDATE: Menyimpan perubahan buku dengan validasi
    public function update(Request $request, int $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/\S/',
                Rule::unique('books', 'title')->ignore($book->id),
            ],
            'author' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/\S/',
            ],
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
            'stock' => 'required|integer|min:0|max:1000',
            'category_id' => 'nullable|exists:categories,id',
        ], [
            'title.required' => 'Judul buku wajib diisi.',
            'title.min' => 'Judul buku minimal 3 karakter.',
            'title.max' => 'Judul buku maksimal 255 karakter.',
            'title.regex' => 'Judul buku tidak boleh hanya berisi spasi.',
            'title.unique' => 'Judul buku sudah digunakan.',

            'author.required' => 'Nama penulis wajib diisi.',
            'author.min' => 'Nama penulis minimal 3 karakter.',
            'author.max' => 'Nama penulis maksimal 255 karakter.',
            'author.regex' => 'Nama penulis tidak boleh hanya berisi spasi.',

            'published_year.required' => 'Tahun terbit wajib diisi.',
            'published_year.integer' => 'Tahun terbit harus berupa angka bulat.',
            'published_year.min' => 'Tahun terbit minimal 1000.',
            'published_year.max' => 'Tahun terbit tidak boleh melebihi tahun sekarang.',

            'stock.required' => 'Stok buku wajib diisi.',
            'stock.integer' => 'Stok harus berupa angka bulat.',
            'stock.min' => 'Stok tidak boleh kurang dari 0.',
            'stock.max' => 'Stok maksimal adalah 1000.',

            'category_id.exists' => 'Kategori yang dipilih tidak tersedia.',
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
