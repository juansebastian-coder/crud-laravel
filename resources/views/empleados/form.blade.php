<div class="form-group">
<label for="nombre">{{'Nombre'}}</label>
<input type="text" name="Nombre" id="nombre" class="form-control {{$errors->has('Nombre')?'is-invalid':''}}" 
value="{{isset($empleado->Nombre)?$empleado->Nombre:old('Nombre')}}">
@if($errors->has('Nombre'))
<span class="text-danger">
{{$errors->first('Nombre')}}
</span>
@endif
</div>

<div class="form-group">
<label for="apellidoP">Apellido Paterno</label>
<input type="text" name="ApellidoPaterno" id="apellidoP" 
class="form-control {{$errors->has('ApellidoPaterno')?'is-invalid':''}}"
value="{{isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:old('ApellidoPaterno')}}">

@if($errors->has('ApellidoPaterno'))
<span class="text-danger">
{{$errors->first('ApellidoPaterno')}}
</span>
@endif
</div>

<div class="form-group">
<label for="apellidoM">Apellido Materno</label>
<input type="text" name="ApellidoMaterno" id="apellidoM"
 class="form-control  {{$errors->has('ApellidoMaterno')?'is-invalid':''}}"
value="{{isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:old('ApellidoMaterno')}}">
<span class="text-danger">
@if($errors->has('ApellidoMaterno'))
{{$errors->first('ApellidoMaterno')}}

</span>
@endif
</div>

<div class="form-group">
<label for="email">Email</label>
<input type="email" name="email" id="email" 
class="form-control {{$errors->has('email')?'is-invalid':''}}"
value="{{isset($empleado->email)?$empleado->email:old('email')}}">
@if($errors->has('email'))
<span class="text-danger">
{{$errors->first('email')}}
</span>
@endif
</div>
<div class="form-group">
<label for="foto">Foto</label>
<br>
@if(isset($empleado->foto))
<img id="img" src="{{isset($empleado->foto)?asset('storage').'/'.$empleado->foto:''}}" style="border:1px solid red;width:100px;display:block;">
@endif
<input type="file" name="foto" id="foto" class="form-control {{$errors->has('foto')?'is-invalid':''}}"   >
@if($errors->has('foto'))
<span class="text-danger">
{{$errors->first('foto')}}
</span>
@endif

</div>

<div class="form-group float-right">
    <button class="btn btn-primary"  type="submit" >{{$modo=='editar'?'editar':'crear'}}</button>
    <a class="btn btn-dark"  href="{{url('/empleados')}}">atras</a>
</div>



