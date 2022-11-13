<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->string('name');
            $table->string('merek');
            $table->integer('stok')->nullable();
            $table->integer('minimal_stok');
            $table->integer('jumlahrencana')->nullable();
            $table->string('kadaluwarsa');
            $table->string('harga');
            $table->string('gambar');
            $table->text('deskripsi');
            $table->string('vendor');
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
        Schema::dropIfExists('barang');
    }
};
