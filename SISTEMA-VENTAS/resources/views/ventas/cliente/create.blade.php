@extends('layout.admin')

@section('contenido')
<div class="container">
    <div class="row">

        <div class="col-md-11 col-lg-11">
            <div class="text-center mb-5">
                @if(isset($persona))
                    <h3>Actualizar Cliente {{ $persona->nombre}}</h3>
                @else
                    <h3>Agregar Cliente</h3>
                @endif
            </div>
            <form action="{{ isset($persona)? route('cliente.update', $persona->idpersona):route('cliente.store') }}" method="post">
                @if(isset($persona))
                    @csrf
                    @method('PUT')
                @else
                    @csrf
                    @method('POST')
                @endif
                <div class="col-xs-12 col-md-6 ">
                <div class="form-group">
                    <label for="nombre">Nombre(*):</label>
                    <input type="text" class="form-control" name="nombre" value="{{isset($persona)?$persona->nombre:'' }}" placeholder="Nombre..."  required>
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion(*):</label>
                    <input type="text" class="form-control" name="direccion" value="{{isset($persona)?$persona->direccion:'' }}" placeholder="Direccion..."  required>
                </div>

                <div class="form-group">
                    <label for="email">Email(*):</label>
                    <input type="text" class="form-control" name="email" value="{{isset($persona)?$persona->email:'' }}" placeholder="correo@gmail.com"   >
                </div>
                </div>

                <div class="col-xs-12 col-md-6 ">
                <div class="form-group">
                    <label for="">Tipo de Documento(*):</label>
                    <select type="text" class="form-control" name="tipo_documento" required>
                        @if(isset($persona))
                            @if($persona->tipo_documento == 'CI')
                            <option selected value="CI">CI</option>
                            <option value="DNI">DNI</option>
                            @else
                            <option  value="CI">CI</option>
                            <option selected value="DNI">DNI</option>
                            @endif
                        @else
                            <option  value="CI">CI</option>
                            <option value="DNI">DNI</option>
                        @endif

                    </select>
                </div>
                <div class="form-group">
                    <label for="">Numero de Documento(*):</label>
                    <input type="text" class="form-control" name="num_documento" value="{{isset($persona)?$persona->num_documento:'' }}" placeholder="Numero de Documento..." required>
                </div>

                <div class="form-group">
                    <label for="">Telefono(*):</label>
                    <input type="text" class="form-control" name="telefono" value="{{isset($persona)?$persona->telefono:'' }}" placeholder="Telefono..."  required>
                </div>
                
                </div>

                

                <input type="submit" value="Guardar" class="btn btn-primary">
                <a href="{{ route('cliente.index') }}" value="Cerrar" class="btn btn-danger">Cerrar</a>
            </form>
        </div>
    </div>
</div>

@endsection