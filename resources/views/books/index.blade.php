@extends('layouts.app')

@section('title', 'Books')

@section('content')

    <h2>Daftar Buku</h2>

    <ul>
        @foreach ($books as $book)
            <li>
                {{ $book['title'] }} - {{ $book['author'] }} ({{ $book['year'] }})
            </li>
        @endforeach
    </ul>

@endsection