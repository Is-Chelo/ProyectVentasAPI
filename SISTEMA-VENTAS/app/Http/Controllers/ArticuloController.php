<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Categoria;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;



class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = trim($request->search);
        $articulo = DB::table('articulo as a')
            ->join('categoria as c', 'a.idcategoria', '=', 'c.idcategoria')
            ->select('a.idarticulo', 'c.nombre as categoria', 'a.codigo', 'a.nombre', 'a.stock', 'a.descripcion', 'a.imagen', 'a.condicion')
            ->where('a.nombre', 'LIKE', '%' . $search . '%')
            ->paginate(7);
        return view('almacen.articulo.index', ['articulos' => $articulo, 'searchText' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = DB::table('categoria')->where('condicion', '=', 1)->get();
        return view('almacen.articulo.create', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'imagen' => 'required|image|max:2048',
            'stock' => 'integer'
        ]);

        $articulo = new Articulo();
        $articulo->idcategoria = $request->categoria;
        $articulo->codigo = $request->codigo;
        $articulo->nombre = $request->nombre;
        $articulo->stock = $request->stock;
        $articulo->descripcion = $request->descripcion;


        
        //tomamos la imagen
        $imagen = $request->file('imagen');
        //sacamos el nombre de la imagen
        $nombreImagen = $imagen->getClientOriginalName();

        //movemos la imagen a la carpeta *PUBLIC*   imagenes/articulos/ para poder acceder
        $imagen->move('imagenes/articulos', $nombreImagen);

        $articulo->imagen = $nombreImagen;



        $articulo->condicion = 1;
        $articulo->save();
        return redirect('almacen/articulo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articulo = Articulo::findOrFail($id);
        $categorias = DB::table('categoria')->where('condicion', '=', 1)->get();
        return view('almacen.articulo.create', ['articulo' => $articulo, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'imagen' => 'required|image|max:2048',
            'stock' => 'integer'
        ]);

        $articulo = Articulo::findOrFail($id);
        $articulo->idcategoria = $request->categoria;
        $articulo->codigo = $request->codigo;
        $articulo->nombre = $request->nombre;
        $articulo->stock = $request->stock;
        $articulo->descripcion = $request->descripcion;

        //tomamos la imagen
        $imagen = $request->file('imagen');
        //sacamos el nombre de la imagen
        $nombreImagen = $imagen->getClientOriginalName();
        //movemos la imagen a la carper public imagenes / articulos para poder acceder
        $imagen->move('imagenes/articulos', $nombreImagen);


        $articulo->imagen = $nombreImagen;
        $articulo->condicion = 1;
        $articulo->save();
        return redirect('almacen/articulo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::destroy($id);
        return redirect('almacen/articulo');
    }
}
