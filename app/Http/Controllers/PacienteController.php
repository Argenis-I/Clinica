<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['pacientes']=Paciente::paginate(5);
        return view('paciente.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paciente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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

        $datosPaciente = request()->except('_token');
            Paciente::insert($datosPaciente);
            return redirect('paciente')->with('mensaje','Paciente agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente=Paciente::findOrFail($id);
        return view('paciente.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
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

        $datosPaciente = request()->except(['_token','_method']);
        Paciente::where('id','=',$id)->update($datosPaciente);
        $paciente=Paciente::findOrFail($id);
        //return view('paciente.edit', compact('paciente'));
        return redirect('paciente')->with('mensaje','Paciente Modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paciente::destroy($id);
        return redirect('paciente')->with('mensaje','Paciente Borrado con exito');
    }
}
