@extends('layouts.app')
@section('title', 'Daftar Surat Masuk')
@section('content')
  <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
    <h1>Daftar Surat Masuk</h1>
    @can('manage-letters')
      <a href="{{ route('surat-masuk.create') }}" class="btn-primary">+ Tambah Surat</a>
    @endcan
  </div>

  @if (session('success'))
    <p class="alert-success">{{ session('success') }}</p>
  @endif

  {{-- ===== Form pencarian & filter (P6) ===== --}}
  <form method="GET" action="{{ route('surat-masuk.index') }}" class="card mb-4 flex flex-wrap items-end gap-3">
    <div class="min-w-[220px] flex-1">
        <label class="form-label" for="q">Pencarian</label>
        <input class="form-input" id="q" type="text" name="q" value="{{ request('q') }}"
               placeholder="Nomor, pengirim, atau perihal">
    </div>
    <div class="min-w-[180px]">
        <label class="form-label" for="f_category">Kategori</label>
        <select class="form-input" id="f_category" name="category_id">
            <option value="">Semua kategori</option>
            @foreach ($categories as $kategori)
                <option value="{{ $kategori->id }}" @selected(request('category_id') == $kategori->id)>
                    {{ $kategori->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn-primary">Cari / Filter</button>
    <a href="{{ route('surat-masuk.index') }}" class="btn-secondary">Reset</a>
  </form>

  <div class="table-wrap">
  <table class="table-base">
    <thead>
      <tr>
        <th>No</th>
        <th>Nomor</th>
        <th>Tanggal</th>
        <th>Pengirim</th>
        <th>Perihal</th>
        <th>Kategori</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($suratMasuk as $surat)
        <tr>
          <td>{{ $suratMasuk->firstItem() + $loop->index }}</td>
          <td class="font-medium text-slate-900">{{ $surat->nomor_surat }}</td>
          <td>{{ $surat->tanggal }}</td>
          <td>{{ $surat->pengirim }}</td>
          <td>{{ $surat->perihal }}</td>
          <td>{{ $surat->category?->nama ?? 'Tanpa kategori' }}</td>
          <td>
            <div class="flex items-center gap-3">
              <a href="{{ route('surat-masuk.show', $surat->id) }}" class="link-action">Detail</a>

              @can('manage-letters')
                <a href="{{ route('surat-masuk.edit', $surat->id) }}" class="link-action">Edit</a>
                <form method="POST" action="{{ route('surat-masuk.destroy', $surat->id) }}" class="inline">
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
          <td colspan="7" class="py-10 text-center text-slate-500">Belum ada surat masuk.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
  </div>

  {{-- ===== Navigasi halaman (P6) ===== --}}
  <div class="mt-4">
    {{ $suratMasuk->links() }}
  </div>
@endsection