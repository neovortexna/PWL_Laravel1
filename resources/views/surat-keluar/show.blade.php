<!-- resources/views/surat-masuk/show.blade.php -->
@extends('layouts.app')

@section('title', 'Detail Surat Keluar')

@section('content')
    <h1 class="mb-6">Detail Surat keluar</h1>

    <div class="card max-w-2xl">
    @if ($surat)
        <div class="divide-y divide-slate-100">
            <p class="grid gap-1 py-3 sm:grid-cols-3">
                <strong class="font-medium text-slate-500">Nomor Surat:</strong>
                <span class="sm:col-span-2 text-slate-900">{{ $surat->nomor_surat }}</span>
            </p>

            <p class="grid gap-1 py-3 sm:grid-cols-3">
                <strong class="font-medium text-slate-500">Tanggal:</strong>
                <span class="sm:col-span-2 text-slate-900">{{ $surat->tanggal }}</span>
            </p>

            <p class="grid gap-1 py-3 sm:grid-cols-3">
                <strong class="font-medium text-slate-500">Pengirim:</strong>
                <span class="sm:col-span-2 text-slate-900">{{ $surat->pengirim }}</span>
            </p>

            <p class="grid gap-1 py-3 sm:grid-cols-3">
                <strong class="font-medium text-slate-500">Perihal:</strong>
                <span class="sm:col-span-2 text-slate-900">{{ $surat->perihal }}</span>
            </p>

            <p class="grid gap-1 py-3 sm:grid-cols-3">
                <strong class="font-medium text-slate-500">Keterangan:</strong>
                <span class="sm:col-span-2 text-slate-900">{{ $surat->keterangan }}</span>
            </p>
        </div>
    @else
        <p>Surat tidak ditemukan.</p>
    @endif

    <a href="{{ route('surat-keluar.index') }}" class="btn-secondary mt-4">
        &larr; Kembali ke Daftar Surat
    </a>
    </div>
@endsection
