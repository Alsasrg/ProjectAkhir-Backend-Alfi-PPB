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
        Schema::create('doas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_doa');
            $table->unsignedBigInteger('id_kategori');
            $table->text('isi_doa');   
                     
        $table->timestamps();
        $table->foreign('id_kategori')
        ->references('id')
        ->on('kategoris') // Gantilah 'kategoris' dengan nama tabel kategori yang sesuai
        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doas');
    }
};
