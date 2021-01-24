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

        $groups=Group::select('id', 'name', 'slug')->orderby('id', 'ASC')->get();

        //Si exite una petición buscamos por el campo "buscar"
        //y lo mandamos a la vista 'IMAGENES'
        if($request)
        {

            $tipo=$request->get('tipo');

            $libros=Libro::join('autors', 'libros.id_A', '=', 'autors.id')->select('aut_nombre', 'lbr_titulo',
            'lbr_like', 'lbr_imagen', 'lbr_slug', 'youtubebody')->orderby('libros.id', 'desc')
            ->paginate(4);

            if($tipo=="Title")
            {
            $titulo=strtoupper($request->get('buscarpor'));
            $tipo="lbr_titulo";
            $libros=Libro::buscarpor($tipo, $titulo)->paginate(4);
            }


            if($tipo=="Autor")
            {
                $nombre=$request->get('buscarpor');
                $tipo="aut_nombre";
                $libros=Libro::buscarpor($tipo, $nombre)->paginate(4);
            }





        }

        return view('web.read',\compact("libros", "groups"));
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
        /////////////
        //Si existe url en Soundcloud
        $Soundcloud=null;
        if(!($request['lbr_soundcloud']=='')){
            $Soundcloud='<hr>
                <h3>SoundCloud</h3>
                <div class="embed-responsive embed-responsive-21by9">
                <iframe class="embed-responsive-item" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url='.
                    $request['lbr_soundcloud'].
                '&color=%23083b66&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
                </div>';
        }

        ////////////////////////

        //si existe url en Genially
        $Genially=null;
        if(!($request['lbr_genially']=='')){
            $Genially='<h3>Genially</h3>
                <div style="width: 100%;">
                <div style="position: relative; padding-bottom: 56.25%; padding-top: 0; height: 0;">
                <iframe frameborder="0" width="1200px" height="675px" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" src="'.
                    $request['lbr_genially'].
                '" type="text/html" allowscriptaccess="always" allowfullscreen="true" scrolling="yes" allownetworking="all">
                </iframe>
                </div>
                </div>';
        }

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


        //creamos el slug
        $slug=Str::slug($request->title);
        //guardamos e titulo en mayúsculas
        $titulo=$request->title;
        /////////////////
        ////////////////
           //guardamos los campos que traemos del request en la tabla libros
        $Libro= new Libro();
        $Libro->lbr_titulo=$titulo;
        $Libro->lbr_imagen=$ruta;
        $Libro->lbr_slug=$slug;
        $Libro->lbr_body=$request->body;
        $Libro->id_G=$grou;
        $Libro->id_A=$id_A;
        $Libro->lbr_youtube=$request->lbr_youtube;
        $Libro->youtubebody=$youtube;
        $Libro->id_P=$IDPOST;
        $Libro->lbr_soundcloud=$Soundcloud;
        $Libro->lbr_genially=$Genially;
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

    public function lbrgroupread(Request $request, $groupname, $idgroup)
    {
       //grupos
        $groups=Group::select('id', 'name', 'slug')->orderby('id', 'ASC')->get();

        //libros que pertenecen al grupo
        $groupslibros=Libro::join('autors', 'libros.id_A', '=', 'autors.id')->
        join('groups', 'libros.id_G', '=', 'groups.id')
        ->select('aut_nombre', 'lbr_titulo',
        'lbr_like', 'lbr_imagen', 'lbr_slug', 'groups.id')
        ->where("groups.id", '=', "$idgroup")->orderby('libros.id', 'desc')
        ->paginate(4);
        //nombre del grupo
        $groupname=Group::select('name')->where('id', '=', $idgroup)->first();

        $tipo=$request->get('tipo');
        //si queremos buscar por medio del filtro
        if($request!=null)
        {
            $titulo=null;
            $nombre=null;
            if($tipo=="Title")
            {
            $titulo=strtoupper($request->get('buscarpor'));
            $tipo="lbr_titulo";
            $groupslibros=Libro::buscarporgroup($tipo, $titulo, $idgroup)->paginate(4);
            }


            if($tipo=="Autor")
            {
                $nombre=$request->get('buscarpor');
                $tipo="aut_nombre";
                $groupslibros=Libro::buscarporgroup($tipo, $nombre,  $idgroup)->paginate(4);
            }

        }

        return view('web.readgrouplbr',\compact("groupslibros", "groups", "groupname", "titulo", "nombre"));


    }

}
