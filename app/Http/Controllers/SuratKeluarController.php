<?php

namespace App\Http\Controllers;

use App\Models\OutgoingLetter;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratKeluar = OutgoingLetter::all();
        return view('surat-keluar.index', compact('suratKeluar'));
    }

    // Method untuk menampilkan form tambah surat keluar
    public function create()
    {
        return view('surat-keluar.create');
    }

    // Method untuk menyimpan data surat keluar baru ke database
    public function store(Request $request)
    {
        // 1. Validasi input dari form
        $request->validate([
            'nomor_surat' => 'required',
            'tujuan_surat' => 'required',
            'tanggal_keluar' => 'required|date',
            'perihal' => 'required',
            // Tambahkan kolom lain sesuai kebutuhan tabel Anda
        ]);

        // 2. Simpan data ke database
        OutgoingLetter::create($request->all());

        // 3. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('surat-keluar.index')
                         ->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    public function show($id) {
        $surat = OutgoingLetter::findOrFail($id);
        return view('surat-keluar.show', compact('surat'));
    }
}