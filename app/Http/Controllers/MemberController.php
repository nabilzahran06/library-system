<?php

namespace App\Http\Controllers;

class MemberController extends Controller
{
    public function index()
    {
        $members = [
            'Nabil Zahran',
            'Luthfiyah Putri',
            'Ilham',
            'Zhilan',
            'Jeki'
        ];

        return view('members.index', compact('members'));
    }
}