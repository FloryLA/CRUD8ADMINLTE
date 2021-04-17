

   <div class="form-group">
    <label for="">Codigo</label>
    <input type="text" class="form-control {{$errors->has('codigo')?'is-invalid':'' }}"
    name="codigo" value="{{isset($articulo->codigo) ? $articulo->codigo:old('codigo') }}">
    {!! $errors->first('codigo','<div class="invalid-feedback">:message</div>')!!}
    </div>
    <div class="form-group">
    <label for="">Descripcion  </label>
    <input type="text" class="form-control  {{$errors->has('descripcion')?'is-invalid':'' }}
    " name="descripcion" value="{{isset($articulo->descripcion) ? $articulo->descripcion:old('apellidopaterno') }}">
    {!! $errors->first('descripcion','<div class="invalid-feedback">:message</div>')!!}
</div>
    <div class="form-group">
    <label for="">Cantidad </label>
    <input type="number" class="form-control  {{$errors->has('cantidad')?'is-invalid':'' }}"
    name="cantidad" value="{{isset($articulo->cantidad) ? $articulo->cantidad:old('cantidad') }}">
    {!! $errors->first('cantidad','<div class="invalid-feedback">:message</div>')!!}
</div>
    <div class="form-group">
    <label for="">Precio</label>
    <input type="number" class="form-control {{$errors->has('precio')?'is-invalid':'' }} "
    name="precio" step= 'any' value="{{isset($articulo->precio) ? $articulo->precio:old('precio') }}">
   {!! $errors->first('precio','<div class="invalid-feedback">:message</div>')!!}

</div>

    <div class="form-group">
    <label for="">Foto </label>
    <br>
    @if(isset($articulo->foto))
    <img src=" {{ asset('storage').'/'.$articulo->foto }}" alt="{{ $articulo->descripcion }}" width="100" class="img-thumbail img-fluid">
    @endif
    <input  class="form-control {{$errors->has('foto')?'is-invalid':'' }}"
    type="file" name="foto" value="">
    {!! $errors->first('foto','<div class="invalid-feedback">:message</div>')!!}
    </div>
    <input type="submit" class="btn btn-primary" value="{{$Modo=='Registrar' ? 'Registrar' : 'Actualizar'}} ">
