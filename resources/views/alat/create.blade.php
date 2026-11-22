@extends('layouts.app')
@section('judul', 'Tambah Alat')

@section('konten')
  @if ($errors->any())
    <ul style="color:red">
      @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  @endif

  <form method="POST" action="{{ route('alat.store') }}">
    @csrf
    <p>Kode: <input name="kode" value="{{ old('kode') }}"></p>
    <p>Nama: <input name="nama" value="{{ old('nama') }}"></p>
    <p>Stok: <input name="stok" type="number" value="{{ old('stok') }}"></p>
    <p>Kondisi:
      <select name="kondisi">
        <option value="baik" {{ old('kondisi') == 'baik' ? 'selected' : '' }}>baik</option>
        <option value="rusak ringan" {{ old('kondisi') == 'rusak ringan' ? 'selected' : '' }}>rusak ringan</option>
        <option value="rusak berat" {{ old('kondisi') == 'rusak berat' ? 'selected' : '' }}>rusak berat</option>
      </select>
    </p>
    <p>Lokasi: <input name="lokasi" value="{{ old('lokasi', 'Lab Multimedia') }}"></p>
    <button type="submit">Simpan</button>
    <a href="{{ route('alat.index') }}">Batal</a>
  </form>
@endsection