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

     public function scopeBuscarpor($query, $tipo, $buscar)
     {
        if($tipo && $buscar)
        {
            return $query->join('autors', 'libros.id_A', '=', 'autors.id')->select('aut_nombre', 'lbr_titulo',
            'lbr_like', 'lbr_imagen', 'lbr_slug')->where("$tipo", 'LIKE', "%$buscar%")->orderby('libros.id', 'desc');
        }
     }

     public function scopeBuscarporgroup($query, $tipo, $buscar, $idgroup){

        if($tipo && $buscar)
        {
            return $query->join('autors', 'libros.id_A', '=', 'autors.id')->select('aut_nombre', 'lbr_titulo',
            'lbr_like', 'lbr_imagen', 'lbr_slug', 'id_G')
            ->where("$tipo", 'LIKE', "%$buscar%")
            ->where('id_G', '=', $idgroup)
            ->orderby('libros.id', 'desc');
        }

     }
}
