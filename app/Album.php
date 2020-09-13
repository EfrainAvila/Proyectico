<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table="Albums";
    protected $primaryKey = "AlbumId";
    public $timestamps = false;
}
