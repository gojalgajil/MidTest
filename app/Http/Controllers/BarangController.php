<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $query = Barang::query();

        // Filter pencarian berdasarkan nama atau deskripsi
        if ($request->has('search')) {
            $query->where('nama', 'like', "%{$request->search}%")
                  ->orWhere('deskripsi', 'like', "%{$request->search}%");
        }

        $barangs = $query->paginate(10);
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }

    public function exportPDF()
    {
        $barangs = Barang::all();

        // Pastikan kamu sudah membuat view resources/views/barang/pdf.blade.php
        $pdf = Pdf::loadView('barang.pdf', compact('barangs'));

        return $pdf->download('daftar-barang.pdf');
    }
}

