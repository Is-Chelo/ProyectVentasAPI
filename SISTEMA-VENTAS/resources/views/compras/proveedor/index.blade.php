@extends('layout.admin')

@section('contenido')

<div class="col-xs-12 col-sm-8">
    <h3>Listado de Proveedores
        <a href="{{ route('proveedor.create')}}"><button class="btn btn-success">Agregar</button></a>
    </h3>
    @include('compras.proveedor.search')
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
                            <th>Tipo de Doc.</th>
                            <th>Numero de Doc.</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Opciones</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach($personas as $per)
                        <tr>
                            <td>{{$per->idpersona}}</td>
                            <td>{{$per->nombre}}</td>
                            <td>{{$per->tipo_documento}}</td>
                            <td>{{$per->num_documento}}</td>
                            <td>{{$per->telefono}}</td>
                            <td>{{$per->email}}</td>

                            <td>
                                <a href="{{route('proveedor.edit', [$per->idpersona] )}}" class="btn btn-primary">Editar</a>
                                
                                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-id-{{$per->idpersona }}">
                                Eliminar
                                </a>
                                
                            </td>

                        </tr>
                        @include('compras.proveedor.modal')
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tipo de Doc.</th>
                            <th>Numero de Doc.</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Opciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            {{$personas->render()}}
        </div>
    </div>

</div>





@endsection