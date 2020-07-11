<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name', 128);
            //Los Campos Unicos deben tener una longitud para seguir el estandar
            //Al crear un campo unico lo que quiero decir es que su contenido no se puede repetir en esta tabla
            $table->string('slug', 128)->unique;
           

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
        Schema::dropIfExists('tags');
    }
}
