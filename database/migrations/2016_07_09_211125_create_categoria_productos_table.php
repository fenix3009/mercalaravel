<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaProductosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('categoria_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id')->unsigned();
            $table->integer('producto_id')->unsigned();

            $table->foreign('categoria_id')
                    ->references('id')->on('categorias')
                    ->onDelete('cascade');
            $table->foreign('producto_id')
                    ->references('id')->on('productos')
                    ->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('categoria_producto');
    }

}
