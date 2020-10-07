<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // La paginacion no sirve con la funcion all
        // $categorias = Categoria::all()->where('condicion','=','1');
        if($request){
            $search = trim($request->search);
            $categorias = DB::table('categoria')
            ->orderBy('idcategoria','desc')
            ->where('nombre','LIKE','%'.$search.'%')
            ->where('condicion','=','1')->paginate(7);
            // return view('almacen.categoria.index',['categorias'=>$categorias, 'searchText '=>$search]);
            return response()->json($categorias, 200);;
        }   


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('almacen.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->condicion='1';
        $categoria->save();
        // return Redirect::to('almacen/categoria');
        return response()->json($categoria, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);

        // return view('almacen.categoria.create', ['categoria'=>$categoria]);
        return $categoria;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
        // $categoria = DB::table('categoria')->where('id', $id)->first();
        $categoria = Categoria::findOrFail($id);

        // return view('almacen.categoria.create', ['categoria'=>$categoria]);
        return $categoria;
        
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
        $categoria = Categoria::find($id);
        $categoria->nombre=$request->nombre;
        $categoria->descripcion=$request->descripcion;
        $categoria->save();

        // return redirect('almacen/categoria', 302);

        return $categoria;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categoria::destroy($id);
        // return redirect('almacen/categoria');   

        return response()->json(null, 204);
    }
}
