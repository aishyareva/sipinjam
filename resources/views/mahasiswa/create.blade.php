@extends('layouts.app')
@section('judul', 'Tambah Mahasiswa')

@section('konten')
  <h2>Tambah Data Mahasiswa</h2>

  @if ($errors->any())
    <ul style="color:red">
      @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  @endif

  @php
    $prodiList = ['Teknologi Rekayasa Multimedia', 'Teknik Informatika', 'Teknik Komputer', 'Teknik Elektronika'];
  @endphp

  <form method="POST" action="{{ route('mahasiswa.store') }}">
    @csrf
    <p>NRP (10 digit): <input name="nrp" value="{{ old('nrp') }}"></p>
    <p>Nama: <input name="nama" value="{{ old('nama') }}"></p>
    <p>Email: <input name="email" type="email" value="{{ old('email') }}"></p>
    <p>Program Studi:
      <select name="prodi">
        <option value="">-- Pilih Program Studi --</option>
        @foreach ($prodiList as $p)
          <option value="{{ $p }}" {{ old('prodi') === $p ? 'selected' : '' }}>{{ $p }}</option>
        @endforeach
      </select>
    </p>
    <button type="submit">Simpan</button>
    <a href="{{ route('mahasiswa.index') }}">Batal</a>
  </form>
@endsection