@extends('layouts.app')
@section('judul', 'Data Peminjaman')

@section('konten')
  <h2>Data Peminjaman Alat</h2>
  <p><a href="{{ route('peminjaman.create') }}">+ Catat Peminjaman</a></p>

  @if (session('sukses'))
    <p style="color:green">{{ session('sukses') }}</p>
  @endif

  <table border="1" cellpadding="6" cellspacing="0">
    <tr>
      <th>Alat (Kode)</th>
      <th>Peminjam</th>
      <th>Jumlah</th>
      <th>Tanggal Pinjam</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
    @forelse ($peminjamans as $p)
      <tr>
        <td>{{ $p->alat->nama }} ({{ $p->alat->kode }})</td>
        <td>{{ $p->peminjam }}</td>
        <td>{{ $p->jumlah }}</td>
        <td>{{ $p->tanggal_pinjam }}</td>
        <td>{{ $p->status }}</td>
        <td>
          <form method="POST" action="{{ route('peminjaman.destroy', $p) }}" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="6">Belum ada data peminjaman.</td></tr>
    @endforelse
  </table>
@endsection