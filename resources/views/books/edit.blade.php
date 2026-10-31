
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            margin: 0;
            padding: 40px 20px;
            color: #222;
        }

        .container {
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

        h2 {
            margin-top: 0;
        }

        label {
            display: block;
            margin: 18px 0 7px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            font-size: 15px;
        }

        button, .back {
            display: inline-block;
            margin-top: 22px;
            padding: 11px 18px;
            border: none;
            border-radius: 7px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .back {
            background: #6b7280;
        }

        .error {
            color: #dc2626;
            font-size: 14px;
            margin: 6px 0 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Buku</h2>
        <p>Perbarui informasi buku.</p>

        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label>Judul Buku</label>
                <input type="text" name="title"
                    value="{{ old('title', $book->title) }}">

                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label>Penulis</label>
                <input type="text" name="author"
                    value="{{ old('author', $book->author) }}">

                @error('author')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label>Tahun Terbit</label>
                <input type="number" name="published_year"
                    value="{{ old('published_year', $book->published_year) }}">

                @error('published_year')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label>Stok</label>
                <input type="number" name="stock"
                    value="{{ old('stock', $book->stock) }}">

                @error('stock')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label>Kategori</label>
                <select name="category_id">
                    <option value="">-- Pilih Kategori --</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                @error('category_id')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit">Simpan Perubahan</button>
            <a href="{{ route('books.index') }}" class="back">Kembali</a>
        </form>
    </div>
</body>
</html>
