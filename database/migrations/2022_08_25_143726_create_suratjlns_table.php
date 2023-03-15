<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratjlns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('pelanggan_id')
                    ->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('no_suratjln')->unique();
            $table->string('tanggal_kirim');
            $table->string('bibit_suratjln');
            $table->integer('qty');
            $table->string('satuan_suratjln');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suratjlns');
    }
};
