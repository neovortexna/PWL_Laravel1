@extends('layouts.app')
@section('title', 'Tambah Surat Masuk')
@section('content')
<h1 class="mb-6">Tambah Surat Masuk</h1>
<div class="card max-w-2xl">
<form action="{{ route('surat-masuk.store') }}" method="POST" class="grid gap-5">
    @csrf
        <div>
            <label class="form-label" for="nomor_surat">Nomor Surat</label>
            <input class="form-input" id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat') }}">
            @error('nomor_surat') <span class="form-error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="form-label" for="tanggal">Tanggal</label>
            <input class="form-input" id="tanggal" type="date" name="tanggal" value="{{ old('tanggal') }}">
            @error('tanggal') <span class="form-error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="form-label" for="pengirim">Pengirim</label>
            <input class="form-input" id="pengirim" name="pengirim" value="{{ old('pengirim') }}">
            @error('pengirim') <span class="form-error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="form-label" for="perihal">Perihal</label>
            <input class="form-input" id="perihal" name="perihal" value="{{ old('perihal') }}">
            @error('perihal') <span class="form-error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="form-label" for="keterangan">Keterangan</label>
            <textarea class="form-input" id="keterangan" name="keterangan" rows="4">{{ old('keterangan') }}</textarea>
            @error('keterangan') <span class="form-error">{{ $message }}</span> @enderror
        </div>
    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="btn-primary">Simpan</button>
        <a href="{{ route('surat-masuk.index') }}" class="btn-secondary">Batal</a>
    </div>
</form>
</div>
@endsection
