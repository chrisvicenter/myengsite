<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\Unit;
use App\Group;
use App\Libro;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{

    public function vclass()
    {
        $posts = Post::orderBy('id', 'ASC')->where('status', 'PUBLISHED')->paginate(3);
        return view('web.posts', compact('posts'));
    }

    public function post($slug,$grpid)
    {
        $post = Post::where('slug', $slug)->first();

        $libros=Post::join('libros', 'posts.id', '=', 'libros.id_P')
        ->join('autors', 'autors.id', '=', 'libros.id_A')
        ->select('aut_nombre', 'lbr_titulo', 'lbr_like', 'lbr_imagen', 'lbr_slug', 'id_G')
        ->where('posts.slug', $slug)->where('libros.id_G',$grpid)
        ->OrderBy('libros.id', 'DESC')->paginate(3);

        return view('web.post', compact('post', 'libros'));
    }

    public function unit($slug)
    {
        $unit = Unit::where('slug', $slug)->pluck('id')->first();
        $posts = Post::where('unit_id', $unit)->orderBy('id', 'ASC')->where('status', 'PUBLISHED')->paginate(3);
        return view('web.posts', compact('posts'));
    }

    public function group($slug)
    {
        $posts = Post::whereHas('groups', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);
        return view('web.posts', compact('posts'));
    }
    //Se buscan los grupos
    public function allgroup()
    {
        $allgroup = Group::orderBy('id')->paginate(5);
        return view('web.allgroup', compact('allgroup'));
    }
    //Se buscan las unidades
    public function allunit()
    {
        $allunit = Unit::orderBy('id')->paginate(3);
        return view('web.allunit', compact('allunit'));;
    }
    //Se filtran los posts deacuerdo al grupo y la unidad
    public function filtro($grpsl, $slug)
    {
        $unit = Unit::where('slug', $slug)->pluck('id')->first();
        $posts = Post::whereHas('groups', function ($query) use ($grpsl) {
            $query->where('slug', $grpsl);
        })->where('unit_id', $unit)->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);
        return view('web.posts', compact('posts'));
    }
}
