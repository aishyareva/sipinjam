@extends('layouts.app')
@section('judul', 'Catat Peminjaman')

@section('konten')
  <h2>Catat Peminjaman Alat</h2>

  @if ($errors->any())
    <ul style="color:red">
      @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  @endif

  <form method="POST" action="{{ route('peminjaman.store') }}">
    @csrf
    <p>Pilih Alat:
      <select name="alat_id">
        <option value="">-- Pilih Alat --</option>
        @foreach ($alats as $a)
          <option value="{{ $a->id }}" {{ old('alat_id') == $a->id ? 'selected' : '' }}>
            {{ $a->kode }} - {{ $a->nama }} (Stok: {{ $a->stok }})
          </option>
        @endforeach
      </select>
    </p>
    <p>Nama Peminjam: <input name="peminjam" value="{{ old('peminjam') }}"></p>
    <p>Jumlah: <input type="number" name="jumlah" value="{{ old('jumlah', 1) }}"></p>
    <p>Tanggal Pinjam: <input type="date" name="tanggal_pinjam" value="{{ old('tanggal_pinjam', date('Y-m-d')) }}"></p>
    <button type="submit">Simpan</button>
    <a href="{{ route('peminjaman.index') }}">Batal</a>
  </form>
@endsection