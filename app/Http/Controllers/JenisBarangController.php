<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisBarang;

class JenisBarangController extends Controller
{
    public function index()
    {
        $jenisBarang = JenisBarang::all();
        return view('master.jenisbarang.index', compact('jenisBarang'));
    }

    public function create()
    {
        return view('master.jenisbarang.create');
    }

    public function store(Request $request)
    {
        // Validasi request jika diperlukan
        $validatedData = $request->validate([
            'nama_jenis' => 'required|string|max:255',
        ]);

        // Simpan data ke dalam database
        JenisBarang::create($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('jenisbarang.index')->with('success', 'Jenis barang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jenisBarang = JenisBarang::findOrFail($id);
        return view('master.jenisbarang.edit', compact('jenisBarang'));
    }

    public function update(Request $request, $id)
    {
        // Validasi request jika diperlukan
        $validatedData = $request->validate([
            'nama_jenis' => 'required|string|max:255',
        ]);

        // Ambil data jenis barang berdasarkan ID
        $jenisBarang = JenisBarang::findOrFail($id);

        // Update data jenis barang
        $jenisBarang->update($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('jenisbarang.index')->with('success', 'Jenis barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data jenis barang berdasarkan ID
        $jenisBarang = JenisBarang::findOrFail($id);
        $jenisBarang->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('jenisbarang.index')->with('success', 'Jenis barang berhasil dihapus.');
    }
}
