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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_hewan');
            $table->string('jenis_hewan');
            $table->string('ras');
            $table->date('tanggal_lahir');
            $table->string('nama_pemilik');
            $table->string('kontak_pemilik');
            $table->enum('status', ['aktif', 'tidak aktif']);
            $table->softDeletes(); // untuk soft delete
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
