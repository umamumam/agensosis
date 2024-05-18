<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\JenisBarang;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('jenisBarang')->get();
        return view('master.barang.index', compact('barangs'));
    }

    public function create()
    {
        $jenisBarangs = JenisBarang::all();
        return view('master.barang.create', compact('jenisBarangs'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_jenis' => 'required|exists:tbl_jenis_barang,id',
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        Barang::create($validatedData);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $jenisBarangs = JenisBarang::all();
        return view('master.barang.edit', compact('barang', 'jenisBarangs'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_jenis' => 'required|exists:tbl_jenis_barang,id',
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($validatedData);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
