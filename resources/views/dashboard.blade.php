<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>
    <p>
        Selamat datang di Sistem Informasi Surat.
    </p>

    <p>
        <a href="{{ route('surat-masuk.index') }}">
            Lihat Daftar Surat Masuk
        </a>
    </p>
    <p>
        <a href="{{ route('surat-keluar.index') }}">
            Lihat Daftar Surat Keluar
        </a>
    </p>
@endsection