@extends('layout.admin')

@section('contenido')
<div class="container">
    <div class="row">

        <div class="col-md-11 col-lg-11">
            <div class="text-center">@if(isset($articulo))
                <h3>Actualizar Articulo: {{ $articulo->nombre }}</h3>
                @else
                <h3>Agregar Articulo</h3>
                @endif
            </div>
            <form action="{{ isset($articulo)?route('articulo.update', $articulo->idarticulo):route('articulo.store')}}" method="post" enctype="multipart/form-data">
                <!-- enctype permite al formulario mandar imagenes -->
                @if(isset($articulo))
                    @csrf
                    @method('PATCH')
                @else
                    @csrf
                    @method('POST')
                @endif
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label for="nombre">Nombre(*):</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre..." value="{{ isset($articulo)? $articulo->nombre:''}}" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripcion(*):</label>
                        <input type="text" class="form-control" name="descripcion" placeholder="Descripcion..." value="{{ isset($articulo)? $articulo->descripcion:'' }}" >
                    </div>

                    <div class="form-group">
                        <label for="codigo">Codigo(*):</label>
                        <input type="text" class="form-control" name="codigo" value="{{isset($articulo)? $articulo->codigo:''}}" placeholder="Codigo..." required>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label for="categoria">Categoria(*):</label>
                        <select type="text" class="form-control" name="categoria" required >
                            @if(isset($articulo))
                                @foreach($categorias as $cat)
                                    @if($cat->idcategoria==$articulo->idcategoria)
                                        <option value="{{ $cat->idcategoria }}" selected>{{ $cat->nombre }}</option>
                                    @else
                                        <option value="{{ $cat->idcategoria }}">{{ $cat->nombre }}</option> 
                                    @endif
                                @endforeach
                            @else
                                @foreach($categorias as $cat)
                                    <option value="{{ $cat->idcategoria }}">{{ $cat->nombre }}</option>  
                                @endforeach
                            @endif

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock(*):</label>
                        <input type="text" class="form-control" name="stock" placeholder="Stock..." value="{{isset($articulo)?$articulo->stock:''}}" required >
                        @error('stock')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="imagen">Imagen:</label>
                        <input type="file" class="form-control" name="imagen" accept="image/*" >
                        
                        @error('imagen')
                            <small class="text-danger">{{$message}}</small>
                        @enderror

                        @if(isset($articulo))
                             <img src="{{ asset('imagenes/articulos/'.$articulo->imagen) }}" alt="" width="100" height="100">
                        @endif
                        
                    </div>
                </div>
                <input type="submit" value="Guardar" class="btn btn-primary">
                <a href="{{ route('articulo.index') }}" value="Cerrar" class="btn btn-danger">Cerrar</a>
            </form>
        </div>
    </div>
</div>

@endsection