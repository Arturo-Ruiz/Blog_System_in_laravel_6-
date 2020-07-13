<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


    protected $fillable = [
        'user_id', 'category_id', 'name', 'slug', 'excerpt', 'body', 'status', 'file'
    ];

    //Mediante esta funcion le digo a laravel que el post pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::tag);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //Mediante esta funcion le digo a Laravel que existe una relacion de post y etiquetas
    //La relacion es de tipo muchos a muchos
    //Con BelongsToMany Le digo Que este post pertenece y tiene muchas etiquetas pasandole
    //la clase entre Parentesis
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }


    //Relaciones de la DB Tienen que estar aqui como funciones
    // Si son multiples etiquetas, debe de ir en plurar
    // Si son poco , Deben de ir en singular...

}
