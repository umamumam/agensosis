<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use App\Models\Barang;

class DetailTransaksiController extends Controller
{
    // Display a listing of the detail transactions
    public function index()
    {
        $details = DetailTransaksi::with('barang')->get();
        return view('detailtransaksi.index', compact('details'));
    }

    // Show the form for creating a new detail transaction
    public function create()
    {
        $barangs = Barang::all();
        return view('detailtransaksi.create', compact('barangs'));
    }

    // Store a newly created detail transaction in storage
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'no_transaksi' => 'required',
            'id_barang' => 'required',
            'qty' => 'required|numeric',
        ]);

        // Create new detail transaction
        try {
            DetailTransaksi::create($validatedData);
            return redirect()->route('detailtransaksi.index')->with('success', 'Detail transaksi berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('detailtransaksi.index')->with('error', 'Gagal menyimpan detail transaksi: ' . $e->getMessage());
        }
    }

    // Remove the specified detail transaction from storage
    public function destroy($id)
    {
        $detail = DetailTransaksi::findOrFail($id);
        $detail->delete();

        return redirect()->route('detailtransaksi.index')->with('success', 'Detail transaksi berhasil dihapus.');
    }

    // Show the form for editing the specified detail transaction
    public function edit($id)
    {
        $detail = DetailTransaksi::findOrFail($id);
        $barangs = Barang::all();
        return view('detailtransaksi.edit', compact('detail', 'barangs'));
    }

    // Update the specified detail transaction in storage
    public function update(Request $request, $id)
    {
        // Validate input
        $validatedData = $request->validate([
            'qty' => 'required|numeric',
        ]);

        // Update detail transaction
        $detail = DetailTransaksi::findOrFail($id);
        $detail->qty = $validatedData['qty'];
        $detail->save();

        // Redirect user to index page after successful update
        return redirect()->route('detailtransaksi.index')->with('success', 'Detail transaksi berhasil diperbarui.');
    }

    // Other methods if needed
}
