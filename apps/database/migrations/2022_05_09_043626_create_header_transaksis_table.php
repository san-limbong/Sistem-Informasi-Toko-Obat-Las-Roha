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
        Schema::create('header_transaksis', function (Blueprint $table) {
            $table->id("id_header_transaksi");
            $table->integer("customer_id");
            $table->integer("karyawan_id")->nullable();
            $table->enum('status', ['Diterima','Dibatalkan'])->nullable();
            $table->date("tanggal_transaksi");
            $table->softDeletes();
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
        Schema::dropIfExists('header_transaksis');
    }
};
