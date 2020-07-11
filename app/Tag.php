<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];


    //Mediante esta funcion le digo a Laravel que existe una relacion de post y etiquetas
    //La relacion es de tipo muchos a muchos
    //Con BelongsToMany Le digo Que este post pertenece y tiene muchas etiquetas pasandole
    //la clase entre Parentesis
    public function posts(){
        return $this->belongsToMany(Post::class);
    }

}
