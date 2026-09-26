@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <h2>Selamat datang di Dashboard</h2>

    <p>Selamat datang di halaman Dashboard Library System.</p>

    <h3>Ringkasan Data</h3>

    <ul>
        <li>Total Buku: {{ $totalBooks }}</li>
        <li>Total Kategori: {{ $totalCategories }}</li>
        <li>Total Anggota: {{ $totalMembers }}</li>
    </ul>

@endsection