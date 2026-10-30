<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'published_year' => 2005,
                'stock' => 10,
            ],
            [
                'title' => 'Bumi',
                'author' => 'Tere Liye',
                'published_year' => 2014,
                'stock' => 8,
            ],
            [
                'title' => 'Negeri 5 Menara',
                'author' => 'Ahmad Fuadi',
                'published_year' => 2009,
                'stock' => 12,
            ],
            [
                'title' => 'Dilan 1990',
                'author' => 'Pidi Baiq',
                'published_year' => 2014,
                'stock' => 7,
            ],
            [
                'title' => 'Perahu Kertas',
                'author' => 'Dee Lestari',
                'published_year' => 2009,
                'stock' => 9,
            ],
        ];

        foreach ($books as $book) {
            Book::updateOrCreate(
                ['title' => $book['title']],
                $book
            );
        }
    }
}
