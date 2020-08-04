<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;

use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;

use App\Post;
use App\Unit;
use App\Group;

use JD\Cloudder\Facades\Cloudder;


class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')
            ->where('user_id', auth()->user()->id)
            ->paginate();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::orderBy('name', 'ASC')->pluck('name', 'id');
        $groups = Group::orderBy('name', 'ASC')->get();
        return view('admin.posts.create', compact('units', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        if(!($request['genially']=='')){
            $request['body']=$request['body'].
                '<h3>Genially</h3>
                <div style="width: 100%;">
                <div style="position: relative; padding-bottom: 56.25%; padding-top: 0; height: 0;">
                <iframe frameborder="0" width="1200px" height="675px" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" src="'.
                    $request['genially'].
                '" type="text/html" allowscriptaccess="always" allowfullscreen="true" scrolling="yes" allownetworking="all">
                </iframe> 
                </div> 
                </div>';
        }

        if(!($request['youtube']=='')){
            $request['body']=$request['body'].
                '<hr>
                <h3>YouTube</h3>
                <div class="embed-responsive embed-responsive-21by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.
                    substr($request['youtube'], 32, 43).
                '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
                </div>';
        }

        if(!($request['soundcloud']=='')){
            $request['body']=$request['body'].
                '<hr>
                <h3>SoundCloud</h3>
                <div class="embed-responsive embed-responsive-21by9">
                <iframe class="embed-responsive-item" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url='.
                    $request['soundcloud'].
                '&color=%23083b66&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
                </div>';
        }

        $post = Post::create($request->all());

        //IMAGE
        if($request->file('image')){
            $image = $request->file('image')->getRealPath();

            Cloudder::upload($image, null, array("folder" => "posts_images"));

            list($width, $height) = getimagesize($image);

            $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);

            $post->fill(['file' => $image_url])->save();

            
        }        
      

        //FILEALL
        if($request->file('filex')){                  
            
            $path = Storage::disk('public')->put('filealls',  $request->file('filex'));           
     
            Cloudder::upload($path, null, array("folder" => "posts_files","resource_type" =>'auto'));

            $result=Cloudder::getResult();          

            $post->fill(['fileall' => $result['url']])->save();
        }

        //GROUPS
        $post->groups()->attach($request->get('groups'));

        return redirect()->route('posts.edit', $post->id)->with('info', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $this->authorize('pass',$post);

        return view ('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post       = Post::find($id);
        $this->authorize('pass',$post);

        $units = Unit::orderBy('name', 'ASC')->pluck('name', 'id');
        $groups = Group::orderBy('name', 'ASC')->get();


        return view('admin.posts.edit', compact('post', 'units', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::find($id);

        $post->fill($request->all())->save();

        //IMAGE
        if($request->file('image')){
            $image = $request->file('image')->getRealPath();

            Cloudder::upload($image, null, array("folder" => "posts_images"));

            list($width, $height) = getimagesize($image);

            $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);

            $post->fill(['file' => $image_url])->save();
        }

        //FILEALL
        if($request->file('filex')){
            $path = Storage::disk('public')->put('filealls',  $request->file('filex'));           
     
            Cloudder::upload($path, null, array("folder" => "posts_files","resource_type" =>'auto'));
            
            $result=Cloudder::getResult();          

            $post->fill(['fileall' => $result['url']])->save();
        }


        //GROUPS
        $post->groups()->sync($request->get('groups'));

        return redirect()->route('posts.edit', $post->id)->with('info', 'Successfully updated post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $this->authorize('pass',$post);

        $post->delete();

        return back()->with('info', 'Properly removed');
    }
}
