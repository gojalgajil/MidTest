@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Barang</h1>

    <!-- Form Pencarian -->
    <form method="GET" action="{{ route('barang.index') }}" class="mb-3 d-flex align-items-center gap-2">
        <input type="text" name="search" class="form-control w-auto" placeholder="Cari barang..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary btn-sm">Cari</button>
        <a href="{{ route('barang.exportPDF') }}" class="btn btn-danger btn-sm">Export PDF</a>
        <a href="{{ route('barang.create') }}" class="btn btn-success btn-sm">Tambah Barang</a>
    </form>

    <!-- Alert sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabel Barang -->
    @if ($barangs->count())
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th style="width: 160px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $barang)
                    <tr>
                        <td>{{ $barang->nama }}</td>
                        <td>{{ $barang->deskripsi }}</td>
                        <td>{{ $barang->stok }}</td>
                        <td>Rp {{ number_format($barang->harga, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Hapus barang ini?')" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        {{ $barangs->links() }}

    @else
        <div class="alert alert-info">Tidak ada data barang ditemukan.</div>
    @endif
</div>
@endsection
