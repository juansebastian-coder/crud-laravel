<?php

namespace App\Http\Controllers;

use App\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Empleados::paginate(1);
        return view('empleados.index')->with('empleados', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'Nombre'=>'required|max:100|string',
            'ApellidoPaterno'=>'required|max:100|string',
            'ApellidoMaterno'=>'required|string|max:100',
            'email'=>'required|email',
            'foto'=>'required|mimes:png,jpg,jpeg'
        ],
    [
        'required'=>'El campo  :attribute es requerido',
        'max'=>'el campo :attribute solo admite 100 caracteres',
        'email'=>'El campo :attribute debe contener el formato de email',
        'mimes'=>'El campo :attribute solo recibe imagenes en formato png,jpg o jpeg '
    ]);


        $datosEmpleados = $request->except('_token');
        if ($request->hasFile('foto')) {
            $datosEmpleados['foto'] = $request->file('foto')->store('uploads', 'public');
            //$request->foto=$request->file('foto')->getClientOriginalName();
        }
        Empleados::insert($datosEmpleados);
        return redirect('/empleados')->with('mensaje','Empleado agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleados::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'Nombre'=>'required|max:100|string',
            'ApellidoPaterno'=>'required|max:100|string',
            'ApellidoMaterno'=>'required|string|max:100',
            'email'=>'required|email',
            'foto'=>'mimes:png,jpg,jpeg'
        ],
    [
        'required'=>'El campo  :attribute es requerido',
        'max'=>'el campo :attribute solo admite 100 caracteres',
        'email'=>'El campo :attribute debe contener el formato de email',
        'mimes'=>'El campo :attribute solo recibe imagenes en formato png,jpg o jpeg '
    ]);


        $datos = $request->except(['_token', '_method']);
        $empleado = Empleados::where('id', $id)->first();
        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($empleado->foto);
            $datos['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        $empleado->update($datos);
        $empleado->save();
        return redirect('/empleados')->with('mensaje','Empleado editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleados::findOrFail($id);
        Storage::disk('public')->delete($empleado->foto);
        $empleado->delete();
        return redirect('/empleados')->with('mensaje','Empleado eliminado con exito  ');
    }
}
