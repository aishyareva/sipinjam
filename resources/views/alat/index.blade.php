@extends('layouts.app')

@section('judul', 'Daftar Alat')

@section('konten')
  <h2 class="text-xl font-semibold mb-4">Daftar Alat</h2>

  @if (session('sukses'))
    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded text-sm">
      {{ session('sukses') }}
    </div>
  @endif

  <div class="mb-4 flex flex-wrap items-center justify-between gap-3">
    <a href="{{ route('alat.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded text-sm font-medium hover:bg-blue-700">
      + Tambah Alat Baru
    </a>

    <form action="{{ route('alat.index') }}" method="GET" class="flex items-center gap-2">
      <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari nama, kode, kategori, atau lokasi..." class="border border-gray-300 rounded px-3 py-1.5 text-sm">
      <button type="submit" class="bg-gray-800 text-white px-3 py-1.5 rounded text-sm hover:bg-gray-700">Cari</button>
      @if (request('cari'))
        <a href="{{ route('alat.index') }}" class="text-sm text-gray-600 hover:underline ml-1">Reset</a>
      @endif
    </form>
  </div>

  <div class="overflow-x-auto">
    <table class="w-full border-collapse border border-gray-300 text-sm">
      <thead class="bg-gray-100">
        <tr>
          <th class="border border-gray-300 px-3 py-2 text-left">Kode</th>
          <th class="border border-gray-300 px-3 py-2 text-left">Nama Alat</th>
          <th class="border border-gray-300 px-3 py-2 text-left">Kategori</th>
          <th class="border border-gray-300 px-3 py-2 text-left">Lokasi</th>
          <th class="border border-gray-300 px-3 py-2 text-left">Stok</th>
          <th class="border border-gray-300 px-3 py-2 text-left">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($alat as $item)
          <tr class="hover:bg-gray-50">
            <td class="border border-gray-300 px-3 py-2">{{ $item->kode }}</td>
            <td class="border border-gray-300 px-3 py-2">{{ $item->nama }}</td>
            <td class="border border-gray-300 px-3 py-2">{{ $item->kategori }}</td>
            <td class="border border-gray-300 px-3 py-2">{{ $item->lokasi }}</td>
            <td class="border border-gray-300 px-3 py-2">
              @if ($item->stok == 0)
                <span class="text-red-600 font-bold">0 (Habis)</span>
              @else
                {{ $item->stok }}
              @endif
            </td>
            <td class="border border-gray-300 px-3 py-2">
              <a href="{{ route('alat.edit', $item->id) }}" class="text-blue-600 hover:underline">Ubah</a>
              <span class="text-gray-400 mx-1">|</span>
              <form action="{{ route('alat.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus alat ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="border border-gray-300 px-3 py-4 text-center text-gray-500">Data alat tidak ditemukan.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-4">
    {{ $alat->links() }}
  </div>
@endsection