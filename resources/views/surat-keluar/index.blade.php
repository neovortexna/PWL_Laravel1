@extends('layouts.app')
@section('title', 'Daftar Surat Keluar')
@section('content')
  <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
    <h1>Daftar Surat Keluar</h1>
    @can('manage-letters')
      <a href="{{ route('surat-keluar.create') }}" class="btn-primary">+ Tambah Surat</a>
    @endcan
  </div>
  @if (session('success'))
    <p class="alert-success">{{ session('success') }}</p>
  @endif
  <div class="table-wrap">
  <table class="table-base">
    <thead>
      <tr>
        <th>No</th>
        <th>Nomor</th>
        <th>Tanggal</th>
        <th>Pengirim</th>
        <th>Perihal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($suratKeluar as $surat)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td class="font-medium text-slate-900">{{ $surat->nomor_surat }}</td>
          <td>{{ $surat->tanggal }}</td>
          <td>{{ $surat->pengirim }}</td>
          <td>{{ $surat->perihal }}</td>
          <td>
            <div class="flex items-center gap-3">
              <a href="{{ route('surat-keluar.show', $surat->id) }}" class="link-action">Detail</a>

              @can('manage-letters')
                <a href="{{ route('surat-keluar.edit', $surat->id) }}" class="link-action">Edit</a>
                <form method="POST" action="{{ route('surat-keluar.destroy', $surat->id) }}" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-danger btn-sm">Hapus</button>
                </form>
              @endcan
            </div>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="py-10 text-center text-slate-500">Belum ada surat keluar .</td>
        </tr>
      @endforelse
    </tbody>
  </table>
  </div>
@endsection
