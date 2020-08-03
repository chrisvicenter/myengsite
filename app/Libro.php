<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table= 'libros';

    protected $fillable=['id','lbr_titulo',
     'lbr_imagen', 'lbr_slug', 'id_A', 'lbr_body', 'id_G',
    'lbr_youtube', 'youtubebody', 'lbr_soundcloud', 'lbr_genially', 'id_P'

    ];

     public function autor()
     {
         return $this->belongTo('App\Autor', 'id_A');
     }
     public function grupo()
     {
         return $this->belongTo('App\Group', 'id_G');
     }

     public function post(){
        return $this->belongTo('App\Post', 'id_P');

     }
}
