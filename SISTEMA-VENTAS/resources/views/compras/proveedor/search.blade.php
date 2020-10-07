<form action="{{route('proveedor.index')}}" method="GET" class="form-group">
    <!-- @csrf -->
    @method('GET')
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Buscar..." value="">
        <span class="input-group-btn"><button class="btn btn-primary ">Buscar</button></span> 
    </div>
</form>