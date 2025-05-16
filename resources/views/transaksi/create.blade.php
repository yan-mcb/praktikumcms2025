@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Form Pembelian</h1>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ $produk->nama }}</h5>
            <p class="card-text">{{ $produk->deskripsi }}</p>
            <p class="card-text"><strong>Rp{{ number_format($produk->harga, 0, ',', '.') }}</strong></p>
        </div>
    </div>

    <form method="POST" action="{{ route('transaksi.store') }}">
        @csrf
        <input type="hidden" name="produk_id" value="{{ $produk->id }}">
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" min="1" required>
        </div>
        <div class="mb-3">
            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
            <select class="form-control" name="metode_pembayaran" required>
                <option value="">-- Pilih Metode --</option>
                <option value="transfer_bank">Transfer Bank</option>
                <option value="e-wallet">E-Wallet</option>
                <option value="cod">Bayar di Tempat</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Lanjutkan Pembayaran</button>
        <a href="{{ route('home') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
