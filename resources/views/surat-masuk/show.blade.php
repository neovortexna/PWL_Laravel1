@extends('layouts.app')

@section('title', 'Detail Surat Masuk')

@section('content')
    <h1 class="mb-6">Detail Surat Masuk</h1>

    <div class="card max-w-2xl">
        @if ($surat)
            <div class="divide-y divide-slate-100">
                <p class="grid gap-1 py-3 sm:grid-cols-3">
                    <strong class="font-medium text-slate-500">Nomor:</strong>
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
                    <span class="sm:col-span-2 text-slate-900">{{ $surat->keterangan ?? '-' }}</span>
                </p>

                {{-- ===== Tambahan P6 ===== --}}
                <p class="grid gap-1 py-3 sm:grid-cols-3">
                    <strong class="font-medium text-slate-500">Kategori:</strong>
                    <span class="sm:col-span-2 text-slate-900">{{ $surat->category?->nama ?? 'Tanpa kategori' }}</span>
                </p>

                @if ($surat->lampiran)
                    <p class="grid gap-1 py-3 sm:grid-cols-3">
                        <strong class="font-medium text-slate-500">Lampiran:</strong>
                        <span class="sm:col-span-2">
                            <a href="{{ asset('storage/' . $surat->lampiran) }}" target="_blank" rel="noopener" class="link-action">
                                Lihat lampiran
                            </a>
                        </span>
                    </p>
                @endif
                {{-- ===== Akhir tambahan ===== --}}
            </div>
        @else
            <p>Surat tidak ditemukan.</p>
        @endif

        <a href="{{ route('surat-masuk.index') }}" class="btn-secondary mt-4">
            &larr; Kembali
        </a>
    </div>
@endsection