<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create($produk_id) {
    $produk = \App\Models\Produk::findOrFail($produk_id);
    return view('transaksi.create', compact('produk'));
}

public function store(Request $request) {
    $data = $request->validate([
        'produk_id' => 'required|exists:produks,id',
        'jumlah' => 'required|integer|min:1',
        'metode_pembayaran' => 'required|string'
    ]);

    $produk = \App\Models\Produk::findOrFail($data['produk_id']);
    $total = $produk->harga * $data['jumlah'];

    \App\Models\Transaksi::create([
        'user_id' => auth()->id(),
        'produk_id' => $produk->id,
        'jumlah' => $data['jumlah'],
        'total_harga' => $total,
        'metode_pembayaran' => $data['metode_pembayaran'],
        'status_pembayaran' => 'belum dibayar'
    ]);

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
}

}
