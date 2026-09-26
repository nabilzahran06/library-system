<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = 5;
        $totalCategories = 5;
        $totalMembers = 5;

        return view('dashboard.index', compact(
            'totalBooks',
            'totalCategories',
            'totalMembers'
        ));
    }
}