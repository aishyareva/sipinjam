<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->query('cari');

        $alat = Alat::when($cari, function ($query, $cari) {
                return $query->where('nama', 'like', "%{$cari}%")
                             ->orWhere('kode', 'like', "%{$cari}%")
                             ->orWhere('kategori', 'like', "%{$cari}%")
                             ->orWhere('lokasi', 'like', "%{$cari}%");
            })
            ->orderBy('kode')
            ->paginate(10)
            ->withQueryString();

        return view('alat.index', compact('alat', 'cari'));
    }

    public function create()
    {
        return view('alat.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode'     => 'required|unique:alats,kode',
            'nama'     => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'lokasi'   => 'required|string|max:100',
            'stok'     => 'required|integer|min:0',
        ]);

        Alat::create($data);

        return redirect()->route('alat.index')->with('sukses', 'Alat berhasil ditambahkan.');
    }

    public function edit(Alat $alat)
    {
        return view('alat.edit', compact('alat'));
    }

    public function update(Request $request, Alat $alat)
    {
        $data = $request->validate([
            'kode'     => 'required|unique:alats,kode,' . $alat->id,
            'nama'     => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'lokasi'   => 'required|string|max:100',
            'stok'     => 'required|integer|min:0',
        ]);

        $alat->update($data);

        return redirect()->route('alat.index')->with('sukses', 'Data alat berhasil diperbarui.');
    }

    public function destroy(Alat $alat)
    {
        $alat->delete();

        return redirect()->route('alat.index')->with('sukses', 'Alat berhasil dihapus.');
    }
}