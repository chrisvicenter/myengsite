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
        if(!($request['youtube']=='')){
            $request['body']=$request['body'].
                '<div class="embed-responsive embed-responsive-21by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.
                    substr($request['youtube'], 32, 43).
                '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
                </div>';
        }

        $post = Post::create($request->all());

        //IMAGE
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $post->fill(['file' => asset($path)])->save();
        }

        //FILEALL
        if($request->file('filex')){
            $path = Storage::disk('public')->put('filealls',  $request->file('filex'));
            $post->fill(['fileall' => asset($path)])->save();
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
        $groups       = Group::orderBy('name', 'ASC')->get();


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
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $post->fill(['file' => asset($path)])->save();
        }

        //FILEALL
        if($request->file('filex')){
            $path = Storage::disk('public')->put('filealls',  $request->file('filex'));
            $post->fill(['fileall' => asset($path)])->save();
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
