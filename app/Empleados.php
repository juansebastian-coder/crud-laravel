<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleados extends Model

{

    use SoftDeletes;
    protected $fillable=['id','Nombre','ApellidoMaterno','ApellidoPaterno','email','foto'];
    protected $hidden=['deleted_at'];
    protected $dates = ['deleted_at'];
}
