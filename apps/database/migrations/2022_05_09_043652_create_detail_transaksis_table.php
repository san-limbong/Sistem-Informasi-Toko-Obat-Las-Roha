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
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->id("id_detail_transaksi");
            $table->foreignId("id_barang")->references("id")->on("barangs")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("id_header_transaksi")->references("id_header_transaksi")->on("header_transaksis")->onDelete("cascade")->onUpdate("cascade");
            // $table->integer("user_id");
            $table->integer("hargasatuan");
            $table->integer("jumlahbarang");
            $table->integer("totalharga");
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
        Schema::dropIfExists('detail_transaksis');
    }
};
