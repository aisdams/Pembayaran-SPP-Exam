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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('spps_id')->nullable();
            $table->datetime('tgl_bayar');
            $table->string('bulan_bayar')->default('');
            $table->integer('jumlah_bayar');
            $table->enum('status', ['lunas','belum lunas']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('spps_id')->references('id')->on('spps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
