<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card mb-6 bg-gradient-to-r from-indigo-600 to-indigo-800 !ring-0">
        <h1 class="!text-white">Dashboard</h1>
        <p class="mt-2 text-indigo-100">
            Selamat datang di Sistem Informasi Surat.
        </p>
    </div>

    <div class="grid gap-6 sm:grid-cols-2">
        <a href="{{ route('surat-masuk.index') }}"
            class="card group block transition hover:-translate-y-0.5 hover:shadow-md">
            <span class="mb-3 flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-100 text-xl text-indigo-600">📥</span>
            <span class="font-semibold text-slate-900 group-hover:text-indigo-700">
                Lihat Daftar Surat Masuk
            </span>
        </a>
        <a href="{{ route('surat-keluar.index') }}"
            class="card group block transition hover:-translate-y-0.5 hover:shadow-md">
            <span class="mb-3 flex h-11 w-11 items-center justify-center rounded-xl bg-amber-100 text-xl text-amber-600">📤</span>
            <span class="font-semibold text-slate-900 group-hover:text-amber-700">
                Lihat Daftar Surat Keluar
            </span>
        </a>
    </div>
@endsection