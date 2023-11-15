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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anggota_id');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('buku_id');
            $table->timestamp('tanggal_pinjam');
            $table->timestamp('tanggal_kembali')->nullable();
            $table->timestamps();

            $table->foreign('anggota_id')->references('id')->on('members');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('buku_id')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
