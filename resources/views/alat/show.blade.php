@extends('layouts.app')
@section('judul', 'Detail Alat')

@section('konten')
  <h2>Detail Data Alat</h2>
  <table border="1" cellpadding="6" cellspacing="0">
    <tr><th>Kode</th><td>{{ $alat->kode }}</td></tr>
    <tr><th>Nama</th><td>{{ $alat->nama }}</td></tr>
    <tr>
      <th>Stok</th>
      <td>
        @if ($alat->stok == 0)
          <span style="color:red; font-weight:bold;">0 (Habis)</span>
        @else
          {{ $alat->stok }}
        @endif
      </td>
    </tr>
    <tr><th>Kondisi</th><td>{{ $alat->kondisi }}</td></tr>
    <tr><th>Lokasi</th><td>{{ $alat->lokasi }}</td></tr>
    <tr><th>Dibuat pada</th><td>{{ $alat->created_at }}</td></tr>
    <tr><th>Diperbarui pada</th><td>{{ $alat->updated_at }}</td></tr>
  </table>
  <p><a href="{{ route('alat.index') }}">&laquo; Kembali ke Daftar Alat</a></p>
@endsection