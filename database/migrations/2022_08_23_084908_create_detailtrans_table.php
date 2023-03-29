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
        Schema::create('detailtrans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('project_id')
                    ->constrained()->onUpdate('cascade') ->onDelete('cascade');
            $table->foreignId('transaksi_id')
                    ->constrained()->onUpdate('cascade') ->onDelete('cascade');
            // $table->string('harga_jual');
            // $table->tinyInteger('diskon')->nullable();
            // $table->string('subtotal');
            // $table->string('jumlah');
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
        Schema::dropIfExists('detailtrans');
    }
};
