<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->binary('imagen')->nullable();
            $table->float('costo');
            $table->integer('usuario_id')->unsigned();


            $table->foreign('usuario_id')
                    ->references('id')->on('users')
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
        Schema::drop('productos');
    }

}
