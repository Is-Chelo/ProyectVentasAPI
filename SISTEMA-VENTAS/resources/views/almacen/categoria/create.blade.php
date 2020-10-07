@extends('layout.admin')

@section('contenido')
<div class="container">
    <div class="row">

        <div class="col-md-11 col-lg-11">
            <div class="text-center">@if(isset($categoria))
            <h3>Actualizar Categoria: {{ $categoria->nombre }}</h3>
            @else
            <h3>Agregar Categoria</h3>
            @endif
            </div>
            <form action="{{ isset($categoria)?route('categoria.update', $categoria->idcategoria):route('categoria.store')}}" method="post">
                @if(isset($categoria))
                    @csrf
                    @method('PATCH')
                @else
                    @csrf
                    @method('POST')
                @endif
                <input type="hidden" name="id" value="{{ isset($categoria)? $categoria->id:'' }}">
                <div class="form-group">
                    <label for="nombre">Nombre(*):</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{ isset($categoria)?$categoria->nombre:'' }}" required>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripcion(*):</label>
                    <input type="text" class="form-control" name="descripcion" placeholder="Descripcion" value="{{ isset($categoria)?$categoria->descripcion:'' }}" required>
                </div>

                <input type="submit" value="Guardar" class="btn btn-primary">
                <a href="{{ route('categoria.index') }}" value="Cerrar" class="btn btn-danger">Cerrar</a>
            </form>
        </div>
    </div>
</div>

@endsection