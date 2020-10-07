@extends('layout.admin')

@section('contenido')

<div class="col-xs-12 col-sm-8">
    <h3>Listado de Categoria
        <a href="{{ route('categoria.create')}}"><button class="btn btn-success">Agregar</button></a>
    </h3>
    @include('almacen.categoria.search')
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
                            <th>Opcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $cat)
                        <tr>
                            <td>{{$cat->idcategoria}}</td>
                            <td>{{$cat->nombre}}</td>
                            <td>{{$cat->descripcion}}</td>
                            <td>
                                <a href="{{route('categoria.edit', [$cat->idcategoria])}}" class="btn btn-primary">Editar</a>
                                
                                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-id-{{ $cat->idcategoria }}">
                                Eliminar
                                </a>
                                
                            </td>
                        </tr>
                        @include('almacen.categoria.modal')
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Opcion</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            {{$categorias->render()}}
        </div>
    </div>

</div>





@endsection