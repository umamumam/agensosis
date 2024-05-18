<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diskon;

class DiskonController extends Controller
{
    public function index()
    {
        $diskons = Diskon::all();
        return view('diskon.index', compact('diskons'));
    }

    public function create()
    {
        return view('diskon.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'total_belanja' => 'required|numeric',
            'diskon' => 'nullable|numeric',
        ]);

        Diskon::create($validatedData);

        return redirect()->route('diskon.index')->with('success', 'Diskon berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $diskon = Diskon::findOrFail($id);
        return view('diskon.edit', compact('diskon'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'total_belanja' => 'required|numeric',
            'diskon' => 'nullable|numeric',
        ]);

        $diskon = Diskon::findOrFail($id);
        $diskon->update($validatedData);

        return redirect()->route('diskon.index')->with('success', 'Diskon berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $diskon = Diskon::findOrFail($id);
        $diskon->delete();

        return redirect()->route('diskon.index')->with('success', 'Diskon berhasil dihapus.');
    }
}
