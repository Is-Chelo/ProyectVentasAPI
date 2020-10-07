@extends('layout.admin')

@section('contenido')
<div class="container">
    <div class="col-xs-12 col-sm-8">
        <h3>Listado de Articulo
            <a href="{{ route('articulo.create')}}"><button class="btn btn-success">Agregar</button></a>
        </h3>
        @include('almacen.articulo.search')
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-response">

                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Categoria</th>
                                <th>Codigo</th>
                                <th>Stock</th>
                                <th>Imagen</th>
                                <th>Opciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articulos as $art)
                            <tr>
                                <td>{{$art->idarticulo}}</td>
                                <td>{{$art->nombre}}</td>
                                <td>{{$art->descripcion}}</td>
                                <td>{{$art->categoria}}</td>
                                <td>{{$art->codigo}}</td>
                                <td>{{$art->stock}}</td>
                                <td><img src="{{ asset('imagenes/articulos/'.$art->imagen) }}" alt="" width="50" height="50"></td>
                                <td>
                                    <a href="{{route('articulo.edit', [$art->idarticulo])}}" class="btn btn-primary">Editar</a>

                                    <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-id-{{ $art->idarticulo }}">
                                        Eliminar
                                    </a>

                                </td>
                            </tr>
                            @include('almacen.articulo.modal')
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Categoria</th>
                                <th>Codigo</th>
                                <th>Stock</th>
                                <th>Imagen</th>
                                <th>Opciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                {{$articulos->render()}}
            </div>
        </div>

    </div>
</div>




@endsection