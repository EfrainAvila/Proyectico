<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $table = "artists";
    protected $primaryKey = "ArtistId";
    public $timestamps = false;

    
    //Relación Artistas - Albumes
    //Relación 1 * : utilizando hasMany: Metodo Eloquent
    public function albumes(){
        return $this->hasMany('App\Album', 'ArtistId');
    }

}