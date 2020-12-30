@extends('layouts.app')


@section('content')
<div class="d-flex justify-content-center">
<form class="w-50 " action="{{url('/empleados')}}" method="post" enctype="multipart/form-data">
@csrf
@include('empleados.form', ['modo'=>'crear'])


</form>
</div>

@endsection


