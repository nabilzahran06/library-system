<?php

namespace App\Http\Controllers;

class BookController extends Controller
{
    public function index()
    {
        $books = [
            [
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'year' => 2005
            ],
            [
                'title' => 'Bumi',
                'author' => 'Tere Liye',
                'year' => 2014
            ],
            [
                'title' => 'Negeri 5 Menara',
                'author' => 'Ahmad Fuadi',
                'year' => 2009
            ],
            [
                'title' => 'Dilan 1990',
                'author' => 'Pidi Baiq',
                'year' => 2014
            ],
            [
                'title' => 'Perahu Kertas',
                'author' => 'Dee Lestari',
                'year' => 2009
            ]
        ];

                return view('books.index', compact('books'));
    }

    public function show($id)
    {
        return view('books.show', compact('id'));
    }
}