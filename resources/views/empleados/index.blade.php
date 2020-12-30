@extends('layouts.app')

@section('content')

@if(Session::has('mensaje'))

<div class="alert alert-warning alert-dismissible fade show" role="alert">
{{Session::get('mensaje')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<a class="btn btn-warning mb-3  float-md-right" href="{{url('/empleados/create')}}">Agregar empleado</a>
<div class="table-responsive">
<table  class="table table-hover table-bordered  text-center">
<thead class="table-dark">
<tr >
<td>Foto</td>
<td>Nombre</td>
<td>Email</td>
<td>Accion</td>
</tr>
</thead>
<tbody>
    @foreach($empleados as $empleado)
    <tr >
        <td>
            <img  class="img-fluid"  style="max-width: 150px"
            src="{{asset('storage').'/'.$empleado->foto}}" alt="{{$empleado->foto}}" >
        </td>
        <td>{{$empleado->Nombre}}
        {{$empleado->ApellidoMaterno}}
        {{$empleado->ApellidoPaterno}}</td>
        <td>{{$empleado->email}}</td>
        <td>
            <a data-toggle="modal" data-target="#exampleModal"
            class="btn btn-primary" href="{{url('/empleados/'.$empleado->id .'/edit')}}"> Editar</a>

            <form  style="display:inline-table;"
             action="{{url('/empleados/'.$empleado->id)}}" method="post" >
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" onclick=" return confirm('eliminar??');">Borrar</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
{{$empleados->links()}}
</div>








@endsection



