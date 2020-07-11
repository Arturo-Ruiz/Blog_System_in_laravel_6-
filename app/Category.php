<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name', 'slug', 'body'
    ];


    //Mediante esta funcion le digo a Laravel que existe una relacion de categorias y posts
    //La relacion es de tipo uno a muchos
    //Con Hasmany Le digo que una categoria puede tener muchos posts
    //la clase entre Parentesis
    public function posts(){
        return $this->hasMany(Post::class);
    }


    //Relaciones de la DB Tienen que estar aqui como funciones
    // Si son multiples etiquetas, debe de ir en plurar
    // Si son poco , Deben de ir en singular...

}
