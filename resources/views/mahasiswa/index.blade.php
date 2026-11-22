@extends('layouts.app')

@section('judul', 'Data Mahasiswa')

@section('konten')
  <h2 class="text-xl font-semibold mb-4">Data Mahasiswa</h2>

  @if (session('sukses'))
    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded text-sm">
      {{ session('sukses') }}
    </div>
  @endif

  <div class="mb-4">
    <a href="{{ route('mahasiswa.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded text-sm font-medium hover:bg-blue-700">
      + Tambah Mahasiswa Baru
    </a>
  </div>

  <div class="overflow-x-auto">
    <table class="w-full border-collapse border border-gray-300 text-sm">
      <thead class="bg-gray-100">
        <tr>
          <th class="border border-gray-300 px-3 py-2 text-left">No</th>
          <th class="border border-gray-300 px-3 py-2 text-left">NRP</th>
          <th class="border border-gray-300 px-3 py-2 text-left">Nama</th>
          <th class="border border-gray-300 px-3 py-2 text-left">Email</th>
          <th class="border border-gray-300 px-3 py-2 text-left">Program Studi</th>
          <th class="border border-gray-300 px-3 py-2 text-left">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($mahasiswas as $index => $mhs)
          <tr class="hover:bg-gray-50">
            <td class="border border-gray-300 px-3 py-2">{{ $mahasiswas->firstItem() + $index }}</td>
            <td class="border border-gray-300 px-3 py-2">{{ $mhs->nrp }}</td>
            <td class="border border-gray-300 px-3 py-2">{{ $mhs->nama }}</td>
            <td class="border border-gray-300 px-3 py-2">{{ $mhs->email }}</td>
            <td class="border border-gray-300 px-3 py-2">{{ $mhs->prodi }}</td>
            <td class="border border-gray-300 px-3 py-2">
              <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="text-blue-600 hover:underline">Ubah</a>
              <span class="text-gray-400 mx-1">|</span>
              <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data mahasiswa ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="border border-gray-300 px-3 py-4 text-center text-gray-500">Belum ada data mahasiswa.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-4">
    {{ $mahasiswas->links() }}
  </div>
@endsection