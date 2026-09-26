<?php

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = [
        'Fiksi',
        'Non-Fiksi',
        'Teknologi',
        'Sejarah',
        'Pendidikan'
    ];

    return view('categories.index', compact('categories'));
    }
}