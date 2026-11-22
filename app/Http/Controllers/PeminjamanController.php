<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with('alat')->latest()->paginate(10);
        return view('peminjaman.index', compact('peminjamans'));
    }

    public function create()
    {
        $alats = Alat::where('stok', '>', 0)->orderBy('nama')->get();
        return view('peminjaman.create', compact('alats'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'alat_id'        => ['required', 'exists:alats,id'],
            'peminjam'       => ['required', 'string', 'min:3', 'max:100'],
            'jumlah'         => ['required', 'integer', 'min:1'],
            'tanggal_pinjam' => ['required', 'date'],
        ], [
            'alat_id.required'        => 'Pilih alat yang dipinjam.',
            'peminjam.required'       => 'Nama peminjam wajib diisi.',
            'jumlah.min'              => 'Jumlah pinjam minimal 1.',
            'tanggal_pinjam.required' => 'Tanggal pinjam wajib diisi.',
        ]);

        Peminjaman::create($data + ['status' => 'dipinjam']);

        return redirect()->route('peminjaman.index')
            ->with('sukses', 'Transaksi peminjaman berhasil dicatat.');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')
            ->with('sukses', 'Data peminjaman dihapus.');
    }
}