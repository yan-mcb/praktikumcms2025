<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
    $produks = \App\Models\Produk::all();
    return view('produk.index', compact('produks'));
}

public function create() {
    return view('produk.create');
}

public function store(Request $request) {
    $data = $request->validate([
        'nama' => 'required|string',
        'deskripsi' => 'nullable',
        'harga' => 'required|numeric',
        'gambar' => 'nullable|image'
    ]);

    if ($request->hasFile('gambar')) {
        $data['gambar'] = $request->file('gambar')->store('produk', 'public');
    }

    \App\Models\Produk::create($data);
    return redirect()->route('produk.index');
}

public function edit($id)
{
    $produk = \App\Models\Produk::findOrFail($id);
    return view('produk.edit', compact('produk'));
}

public function update(Request $request, $id)
{
    $produk = \App\Models\Produk::findOrFail($id);

    $data = $request->validate([
        'nama' => 'required|string',
        'deskripsi' => 'nullable',
        'harga' => 'required|numeric',
        'gambar' => 'nullable|image'
    ]);

    if ($request->hasFile('gambar')) {
        $data['gambar'] = $request->file('gambar')->store('produk', 'public');
    }

    $produk->update($data);

    return redirect()->route('produk.index');
}

public function destroy($id)
{
    $produk = \App\Models\Produk::findOrFail($id);
    $produk->delete();

    return redirect()->route('produk.index');
}


}
