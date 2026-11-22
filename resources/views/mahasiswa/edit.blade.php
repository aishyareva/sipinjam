@extends('layouts.app')
@section('judul', 'Ubah Data Mahasiswa')

@section('konten')
  <h2>Ubah Data Mahasiswa</h2>

  @if ($errors->any())
    <ul style="color:red">
      @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  @endif

  @php
    $prodiList = ['Teknologi Rekayasa Multimedia', 'Teknik Informatika', 'Teknik Komputer', 'Teknik Elektronika'];
  @endphp

  <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa) }}">
    @csrf
    @method('PUT')
    <p>NRP (10 digit): <input name="nrp" value="{{ old('nrp', $mahasiswa->nrp) }}"></p>
    <p>Nama: <input name="nama" value="{{ old('nama', $mahasiswa->nama) }}"></p>
    <p>Email: <input name="email" type="email" value="{{ old('email', $mahasiswa->email) }}"></p>
    <p>Program Studi:
      <select name="prodi">
        @foreach ($prodiList as $p)
          <option value="{{ $p }}" {{ old('prodi', $mahasiswa->prodi) === $p ? 'selected' : '' }}>{{ $p }}</option>
        @endforeach
      </select>
    </p>
    <button type="submit">Perbarui</button>
    <a href="{{ route('mahasiswa.index') }}">Batal</a>
  </form>
@endsection