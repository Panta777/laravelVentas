<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use sisVentas\Http\Requests\ArticuloFormRequest;
use sisVentas\Articulo;
use DB;


class ArticuloController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $Articulos=DB::table('articulo as a')
            ->join('categoria as c', 'a.idcategoria','=', 'c.idcategoria')
            ->select('a.idarticulo','a.nombre', 'a.codigo', 'a.stock', 'c.nombre as categoria', 'a.descripcion', 'a.imagen', 'a.estado')
            ->where('a.nombre','LIKE','%'.$query.'%')
            ->orwhere('a.codigo','LIKE','%'.$query.'%')
            ->orderBy('a.idarticulo','desc')
            ->paginate(7);
            return view('almacen.articulo.index',["articulos"=>$Articulos,"searchText"=>$query]);
        }
    }
    public function create()
    {

    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();
        return view("almacen.articulo.create",["categorias"=>$categorias]);
    }
    public function store (ArticuloFormRequest $request)
    {
        $Articulo=new Articulo;	
        $Articulo->idcategoria=$request->get('idcategoria');
        $Articulo->codigo=$request->get('codigo');
        $Articulo->nombre=$request->get('nombre');
        $Articulo->stock=$request->get('stock');
        $Articulo->descripcion=$request->get('descripcion');
        $Articulo->estado='Activo';

        if(Input::hasFile('imagen'))
        {
        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
        	$Articulo->imagen=$file->getClientOriginalName();

        }

        $Articulo->save();
        return Redirect::to('almacen/articulo');

    }
    public function show($id)
    {
        return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);
    }
    public function edit($id)
    {
    	$articulo = Articulo::findOrFail($id);
    	$categorias=DB::table('categoria')->where('condicion', '='. '1')->get();	
        return view("almacen.articulo.edit",["articulo"=>$articulo,"categorias"=>$categorias]);
    }

    public function update(ArticuloFormRequest $request,$id)
    {
        $Articulo=Articulo::findOrFail($id);
        $Articulo->idcategoria=$request->get('idcategoria');
        $Articulo->codigo=$request->get('codigo');
        $Articulo->nombre=$request->get('nombre');
        $Articulo->stock=$request->get('stock');
        $Articulo->descripcion=$request->get('descripcion');

        if(Input::hasFile('imagen'))
        {
        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
        	$Articulo->imagen=$file->getClientOriginalName();

        }
        $Articulo->update();
        return Redirect::to('almacen/articulo');
    }
    public function destroy($id)
    {
        $Articulo=Articulo::findOrFail($id);
        $Articulo->estado='Inactivo';
        $Articulo->update();
        return Redirect::to('almacen/articulo');
    }
}
