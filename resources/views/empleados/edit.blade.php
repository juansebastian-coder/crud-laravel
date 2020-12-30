@extends('layouts.app')


@section('content')

      <form action="{{url('/empleados/'.$empleado->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')
@include('empleados.form',['modo'=>'editar'])

</form>


@endsection





