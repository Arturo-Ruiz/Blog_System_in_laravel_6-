<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');

            //Metodo unsigned se traduce a metodo sin signo
            //quiere decir que el campo user id no puede tener numeros negativos
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('category_id')->unsigned();

            $table->string('name', 128);
            //Los Campos Unicos deben tener una longitud para seguir el estandar
            //Al crear un campo unico lo que quiero decir es que su contenido no se puede repetir en esta tabla
            $table->string('slug', 128)->unique();

            //Los Cambos Nullables Quiere decir que este campo es opcional se puede agregar o no
            //Si no se agrega no hay problema ni afecta en nada
            $table->mediumText('excerpt')->nullable();
            $table->text('body');

            //el metodo default lo que quiere decir es que este campo por defecto tendra draft si no se
            //especifica, esto puede ser aplicado a cualquier campo no solo del tipo enum, los valores deben ir
            //en mayuscula porque se trata de una constante porque no pueden cambiar
            //o es publicado o es borrador
            //Si fuese del tipo string si puedo colocarlo en mayuscula o lo que sea porque el admite todo en
            //teoria, esto se hace para seguir con el estandar global de laravel
            $table->enum('status', ['PUBLISHED', 'DRAFT'])->default('DRAFT');

            $table->string('file', 128)->nullable();

            $table->timestamps();

            //RELACIONES

            //Creo una llave foranea donde digo que el campo user_id de esta tabla hace referencia al id
            //de la tabla usuarios
            $table->foreign('user_id')->references('id')->on('users')
            //Esto dice que si elimino un usuario se eliminan todos los post que tengan que ver con ese
            //usuario
            ->onDelete('cascade')
            ->onUpdate('cascade');


            $table->foreign('category_id')->references('id')->on('categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
