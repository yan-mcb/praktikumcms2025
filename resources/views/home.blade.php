@extends('layouts.app')
@php use Illuminate\Support\Str; @endphp

@section('title', 'Beranda - Toko Bunga Florence')

@section('content')
    <div class="text-center mb-5">
        <h1>Selamat Datang di Toko Bunga Florence</h1>
        <p class="lead">Temukan bunga terbaik untuk momen spesial Anda</p>
        @guest
            <a href="{{ route('login') }}" class="btn btn-primary">Login untuk Membeli</a>
        @endguest
    </div>

    <h3 class="mb-4">Katalog Produk Bunga</h3>

    <div class="row">
        @forelse ($produks as $produk)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if ($produk->gambar)
                        <img src="{{ asset('storage/' . $produk->gambar) }}" class="card-img-top" alt="{{ $produk->nama }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $produk->nama }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($produk->deskripsi, 100) }}</p>
                        <p class="card-text"><strong>Rp{{ number_format($produk->harga, 0, ',', '.') }}</strong></p>
                        @auth
                            <form action="{{ route('transaksi.store') }}" method="POST" class="mt-auto">
                                @csrf
                                <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                <input type="number" name="jumlah" value="1" min="1" class="form-control mb-2" placeholder="Jumlah">
                                <button type="submit" class="btn btn-success w-100">Beli</button>
                            </form>
                        @else
                            <p class="text-center mt-auto"><small><a href="{{ route('login') }}">Login untuk membeli</a></small></p>
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <p>Tidak ada produk tersedia saat ini.</p>
        @endforelse
    </div>
@endsection
