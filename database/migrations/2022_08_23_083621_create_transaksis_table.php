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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('pelanggan_id')
                    ->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal_transaksi');
            // $table->string('invoice')->unique();
            // $table->bigInteger('total_harga');
            // $table->tinyInteger('diskon')->nullable();
            // $table->integer('ongkir')->nullable();
            // $table->integer('dp')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('transaksis');
    }
};
