<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;

class PageController extends Controller
{
    public function vclass(){
        $posts = Post::orderBy('id','ASC')->where('status','PUBLISHED')->paginate(3);
        return view('web.posts', compact('posts'));
    }

    public function post($slug){
        $post = Post::where('slug', $slug)->first();

        return view('web.post', compact('post'));
    }
}
