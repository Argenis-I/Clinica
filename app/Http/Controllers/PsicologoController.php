<?php

namespace App\Http\Controllers;

use App\Models\Psicologo;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PsicologoController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     * 
     * Controlador del index o lista de Psicólogos
     */
    public function index()
    {
        $datos['psicologos']=Psicologo::paginate(5);
        return view('psicologo.index',$datos);
    }

    /**
     * Controlador de creación de datos
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $psicologo = new Psicologo();
        // $pacientes= Paciente::pluck('id','nombre','apellidoPaterno','apellidoMaterno','correo','telefono');
        $datos = Paciente::all();
        return view('psicologo.create')->with(['datos'=>$datos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * Controlador de almacenamiento de datos
     */
    public function store(Request $request)
    {
        $campos=[
            'nombre'=>'required|string|max:50',
            'apellidoPaterno'=>'required|string|max:50',
            'apellidoMaterno'=>'required|string|max:50',
            'correo'=>'required|string|max:50',
            'telefono'=>'required|string|max:50'
    ];
    $mensaje=[
            'required'=>'El :attribute es requerido'
    ];

    $this->validate($request, $campos, $mensaje);

        //$datosPsicologo = request()->all();
        $datosPsicologo = request()->except('_token');
            Psicologo::insert($datosPsicologo);
            //return response()->json($datosPsicologo);
            return redirect('psicologo')->with('mensaje','Psicologo agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Psicologo  $psicologo
     * @return \Illuminate\Http\Response
     */
    public function show(Psicologo $psicologo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Psicologo  $psicologo
     * @return \Illuminate\Http\Response
     * 
     * Controlador de edición de datos
     */
    public function edit($id)
    {
        $datos = Paciente::all();
        $psicologo=Psicologo::findOrFail($id);
        return view('psicologo.edit', compact('psicologo'))->with(['datos'=>$datos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Psicologo  $psicologo
     * @return \Illuminate\Http\Response
     * 
     * Controlador de actualización de datos
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'nombre'=>'required|string|max:50',
            'apellidoPaterno'=>'required|string|max:50',
            'apellidoMaterno'=>'required|string|max:50',
            'correo'=>'required|string|max:50',
            'telefono'=>'required|string|max:50'
    ];
    $mensaje=[
            'required'=>'El :attribute es requerido'
    ];

    $this->validate($request, $campos, $mensaje);

        $datos = Paciente::all();
        $datosPsicologo = request()->except(['_token','_method']);
        Psicologo::where('id','=',$id)->update($datosPsicologo);
        $psicologo=Psicologo::findOrFail($id);
        //return view('psicologo.edit', compact('psicologo'))->with(['datos'=>$datos]);

        return redirect('psicologo')->with('mensaje','Psicologo Modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Psicologo  $psicologo
     * @return \Illuminate\Http\Response
     * 
     * Controlador de eliminación de datos
     */
    public function destroy($id)
    {
        Psicologo::destroy($id);

        return redirect('psicologo')->with('mensaje','Psicologo Borrado con exito');
    }
}
