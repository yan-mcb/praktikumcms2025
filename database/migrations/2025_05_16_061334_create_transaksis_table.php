<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('transaksis', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('produk_id')->constrained()->onDelete('cascade');
    $table->integer('jumlah');
    $table->decimal('total_harga', 10, 2);
    $table->string('status_pembayaran')->default('belum dibayar');
    $table->string('metode_pembayaran')->nullable();
    $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
