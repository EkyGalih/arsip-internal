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
        Schema::create('files', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->text('nama_files');
            $table->enum('kategori', ['biasa','rapat'])->default('biasa');
            $table->string('bidang_id', 40)->nullable()->index();
            $table->foreign('bidang_id')
                ->references('id')
                ->on('bidang')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->text('diupload_oleh')->nullable();
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
        Schema::drop('files');
    }
};
