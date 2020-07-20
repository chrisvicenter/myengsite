<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id('id');
            $table->string('lbr_titulo', 255)->unique();
            $table->string('lbr_slug', 255)->unique();
            $table->text('lbr_body');
            $table->integer('lbr_like')->default(0);
            $table->integer('lbr_smile')->default(0);
            $table->integer('lbr_sorpess')->default(0);
            $table->string('lbr_imagen');
            $table->foreignId('id_A');
            $table->foreignId('id_C');
            $table->timestamps();

            $table->foreign('id_A')
            ->references('id')->on('autors')
            ->onDelete('cascade');

            $table->foreign('id_C')
            ->references('id')->on('cursos')
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
        Schema::dropIfExists('libros');
    }
}
