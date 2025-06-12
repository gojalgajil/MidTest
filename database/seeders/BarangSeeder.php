<?php

// database/seeders/BarangSeeder.php
use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run()
    {
        Barang::create([
            'nama' => 'Contoh Barang',
            'deskripsi' => 'Ini deskripsi',
            'stok' => 10,
            'harga' => 15000,
        ]);
    }
}

