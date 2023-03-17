<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('kelas_id')->nullable();
                $table->unsignedBigInteger('spps_id')->nullable();
                $table->string('id_petugas')->nullable();
                $table->string('nisn')->nullable();
                $table->string('nis')->nullable();
                $table->string('username')->nullable();
                $table->string('nama')->nullable();
                $table->string('nama_petugas')->nullable();
                $table->enum('level', ['admin', 'petugas', 'siswa']);
                $table->text('alamat')->nullable();
                $table->string('no_telp')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();

                $table->foreign('kelas_id')->references('id')->on('kelas');
                $table->foreign('spps_id')->references('id')->on('spps');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
