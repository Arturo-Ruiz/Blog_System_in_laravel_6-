<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name', 128);
            //Los Campos Unicos deben tener una longitud para seguir el estandar
            //Al crear un campo unico lo que quiero decir es que su contenido no se puede repetir en esta tabla
            $table->string('slug', 128)->unique;
            //Los Cambos Nullables Quiere decir que este campo es opcional se puede agregar o no
            //Si no se agrega no hay problema ni afecta en nada
            $table->mediumText('body')->nullable();

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
        Schema::dropIfExists('categories');
    }
}
