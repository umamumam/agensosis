<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        
        $transaksis = Transaksi::all();
        $details = DetailTransaksi::all();
        

        return view('transaksi.index', compact('transaksis', 'details'));
    }

    public function create()
    {
        // Tampilkan form untuk membuat transaksi baru
        return view('transaksi.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            // Atur validasi sesuai kebutuhan
            'no_transaksi' => 'required|unique:tbl_transaksi',
            'tgl_transaksi' => 'required|date',
            'diskon' => 'nullable|integer',
            'total_bayar' => 'nullable|integer',
            'uang_pembeli' => 'nullable|integer',
            'kembalian' => 'nullable|integer',
        ]);

        // Buat transaksi baru
        $transaksi = Transaksi::create($request->all());

        // Jika berhasil, redirect ke halaman index transaksi
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function show($id)
    {
        // Tampilkan detail transaksi
        $transaksi = Transaksi::find($id);
    
        // Ambil daftar barang
        $barangs = Barang::all(); // Ganti dengan metode untuk mengambil daftar barang sesuai kebutuhan Anda
    
        // Tampilkan view detail transaksi beserta kode yang telah disempurnakan sebelumnya
        return view('transaksi.show', compact('transaksi', 'barangs'));
    }

    public function edit($id)
    {
        // Tampilkan form untuk mengedit transaksi
        $transaksi = Transaksi::find($id);
        return view('transaksi.edit', compact('transaksi'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            // Atur validasi sesuai kebutuhan
            'tgl_transaksi' => 'required|date',
            'diskon' => 'nullable|integer',
            'total_bayar' => 'nullable|integer',
            'uang_pembeli' => 'nullable|integer',
            'kembalian' => 'nullable|integer',
        ]);

        // Perbarui data transaksi yang ada
        $transaksi = Transaksi::find($id);
        $transaksi->update($request->all());

        // Jika berhasil, redirect ke halaman index transaksi
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Hapus transaksi berdasarkan ID
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        // Jika berhasil, redirect ke halaman index transaksi
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }
    public function storeDetail(Request $request)
{
    // Validasi data yang dikirim dari form
    $request->validate([
        'id_transaksi' => 'required|exists:transaksis,id',
        'id_barang' => 'required|exists:barangs,id',
        'qty' => 'required|integer|min:1',
    ]);

    // Buat detail transaksi baru
    DetailTransaksi::create($request->all());

    // Jika berhasil, kembalikan respon berhasil
    return response()->json(['success' => true, 'message' => 'Detail transaksi berhasil disimpan']);
}

}
