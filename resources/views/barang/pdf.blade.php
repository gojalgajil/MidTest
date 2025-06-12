<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        td, th { border: 1px solid black; padding: 8px; }
    </style>
</head>
<body>
    <h2>Daftar Barang</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Stok</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $barang)
            <tr>
                <td>{{ $barang->nama }}</td>
                <td>{{ $barang->deskripsi }}</td>
                <td>{{ $barang->stok }}</td>
                <td>Rp {{ number_format($barang->harga, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
