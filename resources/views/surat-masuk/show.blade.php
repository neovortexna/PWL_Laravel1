@extends('layouts.app')
@section('title', 'Detail Surat Masuk')
@section('content')
<h1 class="mb-6">Detail Surat Masuk</h1>
<div class="card max-w-2xl">
    <div class="divide-y divide-slate-100">
        <p class="grid gap-1 py-3 sm:grid-cols-3"><span class="font-medium text-slate-500">Nomor:</span> <span class="sm:col-span-2 text-slate-900">{{ $surat->nomor_surat }}</span></p>
        <p class="grid gap-1 py-3 sm:grid-cols-3"><span class="font-medium text-slate-500">Tanggal:</span> <span class="sm:col-span-2 text-slate-900">{{ $surat->tanggal }}</span></p>
        <p class="grid gap-1 py-3 sm:grid-cols-3"><span class="font-medium text-slate-500">Pengirim:</span> <span class="sm:col-span-2 text-slate-900">{{ $surat->pengirim }}</span></p>
        <p class="grid gap-1 py-3 sm:grid-cols-3"><span class="font-medium text-slate-500">Perihal:</span> <span class="sm:col-span-2 text-slate-900">{{ $surat->perihal }}</span></p>
        <p class="grid gap-1 py-3 sm:grid-cols-3"><span class="font-medium text-slate-500">Keterangan:</span> <span class="sm:col-span-2 text-slate-900">{{ $surat->keterangan ?? '-'}}</span></p>
    </div>
    <a href="{{route('surat-masuk.index') }}" class="btn-secondary mt-4">&larr; Kembali</a>
</div>
@endsection
