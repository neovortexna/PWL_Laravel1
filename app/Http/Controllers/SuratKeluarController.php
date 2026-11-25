<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OutgoingLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    private function rules(): array
    {
        return [
            'nomor_surat' => 'required|string|max:255',
            'tanggal'     => 'required|date',
            'pengirim'    => 'required|string|max:255',
            'perihal'     => 'required|string|max:255',
            'keterangan'  => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'lampiran'    => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ];
    }

    public function index(Request $request)
    {
        $query = OutgoingLetter::with('category');

        if ($request->filled('q')) {
            $q = $request->input('q');
            $query->where(function ($builder) use ($q) {
                $builder->where('nomor_surat', 'like', "%{$q}%")
                        ->orWhere('pengirim', 'like', "%{$q}%")
                        ->orWhere('perihal', 'like', "%{$q}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        $suratKeluar = $query->latest('id')->paginate(5)->appends($request->query());
        $categories  = Category::orderBy('nama')->get();

        return view('surat-keluar.index', compact('suratKeluar', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('nama')->get();
        return view('surat-keluar.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran-surat', 'public');
        }

        OutgoingLetter::create($validated);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    public function show($id)
    {
        $surat = OutgoingLetter::with('category')->findOrFail($id);
        return view('surat-keluar.show', compact('surat'));
    }

    public function edit($id)
    {
        $surat = OutgoingLetter::findOrFail($id);
        $categories = Category::orderBy('nama')->get();
        return view('surat-keluar.edit', compact('surat', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $surat = OutgoingLetter::findOrFail($id);
        $validated = $request->validate($this->rules());

        if ($request->hasFile('lampiran')) {
            $pathLama = $surat->lampiran;
            $pathBaru = $request->file('lampiran')->store('lampiran-surat', 'public');
            $validated['lampiran'] = $pathBaru;

            try {
                $surat->update($validated);
            } catch (\Throwable $e) {
                Storage::disk('public')->delete($pathBaru); // bersihkan file yatim
                throw $e;
            }

            if ($pathLama) Storage::disk('public')->delete($pathLama);
        } else {
            unset($validated['lampiran']); // pertahankan lampiran lama
            $surat->update($validated);
        }

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $surat = OutgoingLetter::findOrFail($id);
        $path = $surat->lampiran;
        $surat->delete();
        if ($path) Storage::disk('public')->delete($path);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil dihapus.');
    }
}