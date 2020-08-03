<?php

namespace App\Http\Controllers\Web;
use App\Http\Requests\LibroStoreRequest;
use App\Http\Controllers\Controller;
use App\Libro;
use App\Post;
use App\Group;
use App\Autor;
use Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Exception\NotReadableException;
use Intervention\Image\ImageServiceProvider;
use Illuminate\Support\Str;
use JD\Cloudder\Facades\Cloudder;


class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //$autnom=Libro::all();
        //Si exite una petición buscamos por el campo "buscar"
        //y lo mandamos a la vista 'IMAGENES'
        if($request)
        {
            $titulo=strtoupper($request->get('buscarpor'));

            $libros=Libro::join('autors', 'libros.id_A', '=', 'autors.id')->select('aut_nombre', 'lbr_titulo',
            'lbr_like', 'lbr_imagen', 'lbr_slug', 'youtubebody')->where('lbr_titulo', 'LIKE', "%$titulo%")->orderby('libros.id', 'desc')
            ->paginate(4);


        }

        return view('web.read',\compact("libros"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //llamamos a los grupos que esten disponibles para guardarlos en libros
        $groups = Group::orderBy('name', 'ASC')->pluck('name', 'id');
        $idpost=null;
        return view('web.write', \compact('groups', 'idpost'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibroStoreRequest $request)
    {
        //dd($request);
        //iniciamos el post
        $IDPOST=null;
        if($request->id_P)
        {
            $IDPOST=$request->id_P;
        }
        //grou= el id del grupo (se pasa a id_G en el campo de libros)
        $grou=$request->group_id;
        /////////////////
        //iniciamos la ruta de la imagen
        $ruta=null;
        //si existe imagen--->
        if($request->file('lbr_imagen'))
        {
             $image = $request->file('lbr_imagen')->getRealPath();

             Cloudder::upload($image, null, array("folder"=>"storys_images"));

             list($width, $height) = getimagesize($image);

             $ruta= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
        }
        else //caso contrario
        {
            $ruta='https://res.cloudinary.com/hoefoxwrd/image/upload/v1595882294/storys_images/logofinalJPG_sdusmn.jpg';
        }
        ///////////////
        //////////////
        //si existe url en youtube
        if(!($request['lbr_youtube']=='')){
            $request['youtubebody']=$request['youtubebody'].
                '<div class="embed-responsive embed-responsive-21by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.
                    substr($request['lbr_youtube'], 32, 43).
                '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
                </div>';
        }
       //guardamos el body de youtube
        $youtube=$request['youtubebody'];
        //////////////

       //capturamos el nombre del autor
       //y luego buscamos su id
        $Autor=$request->student;
        $id_A=null;
        if($Autor !=null)
        {
            //creamos un autor
            $Aut=new Autor();
            $Aut->aut_nombre=$Autor;
            $Aut->save();
            $id_A=Autor::select('id')->OrderBy('id', 'DESC')->where('aut_nombre', $Autor)->first();
            $id_A=$id_A->id;
        }

        //guardamos los campos que traemos del request en la tabla libros
        $Libro= new Libro();
        $Libro->lbr_titulo=strtoupper($request->title);
        $Libro->lbr_imagen=$ruta;
        $Libro->lbr_slug=Str::slug($request->title);
        $Libro->lbr_body=$request->body;
        $Libro->id_G=$grou;
        $Libro->id_A=$id_A;
        $Libro->lbr_youtube=$request->lbr_youtube;
        $Libro->youtubebody=$youtube;
        $Libro->id_P=$IDPOST;
        $Libro->save();
        return redirect()->route('write.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $contenido = Libro::where('lbr_slug', $slug)->get();

        //toammos el id del autor en el libro
        $ID_A=null;
        foreach($contenido as $cont)
        {
            $ID_A=$cont->id_A;
        }
        //extaremos el autor del libro y lo guardamos en autnom
        $autnom= Autor::where('id', $ID_A)->pluck('aut_nombre');
        $autnom=$autnom[0];
        //extraemos el body de la consulta
        $body= Libro::select('lbr_body')->where('lbr_slug', $slug)->get();
        $bodylbr="";
        foreach ($body as $lbody)
        {
            $bodylbr=$lbody->lbr_body;
        }
        //extaremos el contenido de youtube de la consulta
        $conyoutube=Libro::select('youtubebody')->where('lbr_slug', $slug)->get();
        $youtube="";
        foreach ($conyoutube as $you)
        {
            $youtube=$you->youtubebody;
        }
        return view('web.librocontenido', compact('contenido', 'bodylbr', 'autnom', 'youtube') );
    }

    public function like($idlike, $like)
    {
        $like=$like+1;
        $slug=Libro::Select('lbr_slug')->where('id', '=', $idlike)->get();
        Libro::where('id', '=', $idlike)->update(['lbr_like'=>$like]);
        foreach($slug as $slu)
        {
            $slug=$slu->lbr_slug;
        }

        return redirect("/read/{$slug}");

    }
    public function smile($idsmile, $smile)
    {
        $smile=$smile+1;
        $slug=Libro::Select('lbr_slug')->where('id', '=', $idsmile)->get();
        Libro::where('id', '=', $idsmile)->update(['lbr_smile'=>$smile]);
        foreach($slug as $slu)
        {
            $slug=$slu->lbr_slug;
        }

        return redirect("/read/{$slug}");


    }
    public function sorpess($idsorpess, $sorpess)
    {
        $sorpess=$sorpess+1;
        $slug=Libro::Select('lbr_slug')->where('id', '=', $idsorpess)->get();
        Libro::where('id', '=',$idsorpess)->update(['lbr_sorpess'=>$sorpess]);
        foreach($slug as $slu)
        {
            $slug=$slu->lbr_slug;
        }

        return redirect("/read/{$slug}");



    }

    public function libropost($idpost, $namepost){
       //llamamos a los grupos que esten disponibles para guardarlos en libros
        $groups = Group::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('web.write', \compact('groups', 'idpost', 'namepost'));
    }

}
