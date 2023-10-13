<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AlumnoRepository;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $alumnos;
    public function __construct(AlumnoRepository $alumnos)
    {
        $this->alumnos=$alumnos;
    }
    public function index()
    {
        //
        $alumnos=$this->alumnos->obtenerAlumnos();
        return view('alumnos.lista',['alumnos'=>$alumnos]);
    }
    public function create()
    {
        return view('alumno.crear');
    }
    public function store(Request $request)
    {
$this->alumnos->insertarAlumno($request);
return redirect()->action([AlumnosController::class,'index']);
    }
    public function show(string $id)
    {
        $alumno = $this->alumnos->obtenerAlumnoPorId($id);
        return view('alumnos.ver', ['alumno' => $alumno]);
    }



    public function edit($id)
{
$alumno = $this->alumnos->obtenerAlumnoPorId($id);
return view('alumnos.editar', ['alumno' => $alumno]);
}



public function update(Request $request, $id)
{
$this->alumnos->actualizarAlumno($request, $id);
return redirect()->action([AlumnoController::class, 'index']);
}


public function destroy($id)
{
$this->alumnos->eliminarAlumno($id);
return redirect()->action([AlumnoController::class, 'index']);
}




    
}
