@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Produk</h1>
    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

    <div class="row">
        @foreach($produks as $produk)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $produk->nama }}</h5>
                    <p class="card-text">{{ $produk->deskripsi }}</p>
                    <p class="card-text"><strong>Rp{{ number_format($produk->harga, 0, ',', '.') }}</strong></p>
                    <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                    <a href="{{ route('transaksi.create', $produk->id) }}" class="btn btn-success btn-sm">Beli</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
