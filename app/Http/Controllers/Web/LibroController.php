<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Libro;
use App\Curso;
use App\Autor;
use Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Exception\NotReadableException;
use Intervention\Image\ImageServiceProvider;
use Illuminate\Support\Str;


class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Si exite una petición buscamos por el campo "buscar"
        //y lo mandamos a la vista 'IMAGENES'
        if($request)
        {
            $titulo=strtoupper($request->get('buscarpor'));

            $imagenlibro['libros']=Libro::where('lbr_titulo', 'LIKE', "%$titulo%")->orderby('id', 'asc')
            ->paginate(5);

        }
        return view('web.read', $imagenlibro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos=Curso::orderBy('id', 'ASC')->pluck('id');

        return view('web.write', \compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $image= $request->file('lbr_imagen');
       // $filename = $request->name.'.'.$image->getClientOriginalExtension();
        //$foto=Image::make($image)->resize(720,480)->save(Storage::disk('public')->put('images/libros', $image ));
        $path= Storage::disk('public')->put('images/libros',  $image);
       //capturamos el nombre del autor
       //y luego buscamos su id
        $Autor=$request->id_A;
        $id_A=null;
        if($Autor !=null)
        {
            $Aut=new Autor();
            $Aut->aut_nombre=$Autor;
            $Aut->save();
            $id_A=Autor::select('id')->OrderBy('id', 'DESC')->where('aut_nombre', $Autor)->first();
            $id_A=$id_A->id;
        }
        else
        {
            $id_A=1;
        }
        $Libro= new Libro();
        $Libro->lbr_titulo=strtoupper($request->name);
        $Libro->lbr_imagen=asset($path);
        $Libro->lbr_slug=Str::slug($request->name);
        $Libro->lbr_body=$request->body;
        $Libro->id_C=$request->id_C+1;
        $Libro->id_A=$id_A;
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
        $ID_A=null;
        foreach($contenido as $cont)
        {
            $ID_A=$cont->id_A;
        }
        $autnom= Autor::where('id', $ID_A)->pluck('aut_nombre');
        $autnom=$autnom[0];
        $body= Libro::select('lbr_body')->where('lbr_slug', $slug)->get();
        $bodylbr="";
        foreach ($body as $lbody)
        {
            $bodylbr=$lbody->lbr_body;
        }

        return view('web.librocontenido', compact('contenido', 'bodylbr', 'autnom') );
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

}