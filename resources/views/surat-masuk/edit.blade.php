@extends('layouts.app')
@section('title', 'Edit Surat Masuk')
@section('content')
<h1 class="mb-6">Edit Surat Masuk</h1>
<div class="card max-w-2xl">
<form action="{{ route('surat-masuk.update', $surat->id) }}" method="POST" enctype="multipart/form-data" class="grid gap-5">
    @csrf
    @method('PUT')
        <div>
            <label class="form-label" for="nomor_surat">Nomor Surat</label>
            <input class="form-input" id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat', $surat->nomor_surat) }}">
            @error('nomor_surat') <span class="form-error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="form-label" for="tanggal">Tanggal</label>
            <input class="form-input" id="tanggal" type="date" name="tanggal" value="{{ old('tanggal', $surat->tanggal) }}">
            @error('tanggal') <span class="form-error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="form-label" for="pengirim">Pengirim</label>
            <input class="form-input" id="pengirim" name="pengirim" value="{{ old('pengirim', $surat->pengirim) }}">
            @error('pengirim') <span class="form-error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="form-label" for="perihal">Perihal</label>
            <input class="form-input" id="perihal" name="perihal" value="{{ old('perihal', $surat->perihal) }}">
            @error('perihal') <span class="form-error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="form-label" for="keterangan">Keterangan</label>
            <textarea class="form-input" id="keterangan" name="keterangan" rows="4">{{ old('keterangan', $surat->keterangan) }}</textarea>
            @error('keterangan') <span class="form-error">{{ $message }}</span> @enderror
        </div>

        {{-- ===== Tambahan P6 ===== --}}
        <div>
            <label class="form-label" for="category_id">Kategori</label>
            <select class="form-input" id="category_id" name="category_id">
                <option value="">-- Tanpa kategori --</option>
                @foreach ($categories as $kategori)
                    <option value="{{ $kategori->id }}"
                        @selected(old('category_id', $surat->category_id) == $kategori->id)>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <span class="form-error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="form-label" for="lampiran">Lampiran (PDF/JPG/PNG, maks. 2 MB)</label>
            <input class="form-input" id="lampiran" type="file" name="lampiran" accept=".pdf,.jpg,.jpeg,.png">
            @if ($surat->lampiran)
                <p class="mt-1 text-xs text-slate-500">
                    Lampiran saat ini:
                    <a href="{{ asset('storage/'.$surat->lampiran) }}" target="_blank" rel="noopener" class="link-action">lihat</a>.
                    Unggah file baru untuk menggantinya.
                </p>
            @endif
            @error('lampiran') <span class="form-error">{{ $message }}</span> @enderror
        </div>
        {{-- ===== Akhir tambahan ===== --}}

    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="btn-primary">Simpan Perubahan</button>
        <a href="{{ route('surat-masuk.index') }}" class="btn-secondary">Batal</a>
    </div>
</form>
</div>
@endsection