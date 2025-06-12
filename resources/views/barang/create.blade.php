@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($barang) ? 'Edit' : 'Tambah' }} Barang</h1>

    <form action="{{ isset($barang) ? route('barang.update', $barang) : route('barang.store') }}" method="POST">
        @csrf
        @if(isset($barang))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $barang->nama ?? '') }}">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $barang->deskripsi ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ old('stok', $barang->stok ?? '') }}">
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control" value="{{ old('harga', $barang->harga ?? '') }}">
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
