<?php

namespace App\Http\Controllers;

use App\Models\Nomina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class NominaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if($request){
            $query = $request->buscar;
            $nominas = Nomina::where('nombreEmpleado','LIKE','%'.$query.'%')
                            ->orderBy('nombreEmpleado','asc')
                            ->get();
            return view('nominas.index', compact('nominas', 'query'));
        }
        // $buscarpor=$request->get('buscarpor');
        // $nominas=Nomina::where('nombreEmpleado','=','1')->where('nombreEmpleado','like','%'.$buscarpor.'%')->paginate();
         $nominas = Nomina::orderBy('nombreEmpleado', 'asc')->get();

        return view('nominas.index', compact('nominas','buscar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nominas.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombreEmpleado' => 'required',
            'cedula' => 'required',
            'salario' => 'required',
            'diasTrabajados' => 'required',

        ]);

        $contadorEmpleado = DB::table('nominas')
            ->select()->count('*');

        // echo $contadorEmpleado++;

        $Nomina = Nomina::create($request->all());

        $id = $Nomina->id;
        $nomina = Nomina::findOrFail($id);
        $auxTransporte = 0;
        $prima = 0;
        $salarioMinimo = 1000000;

        if ($nomina->salario < ($salarioMinimo * 2)) {
            $auxTransporte = 97_032;
            $nomina->salario = ($nomina->salario + $auxTransporte);
        }

        if ($nomina->diasTrabajados  <= 179) {
            $prima = (($nomina->salario  * $nomina->diasTrabajados) / 360);
        } else if ($nomina->diasTrabajados  == 180) {
            $prima = ($nomina->salario)  / 2;
        }
        DB::table('nominas')
            ->where('id', $id)    // se guarda la variables
            ->update(['prima' => $prima]);

        DB::table('nominas')
            ->where('id', $id)
            ->update(['auxTransporte' => $auxTransporte]);


        return redirect()->route('nominas.index')->with('exito', 'Se ha guardado el empleado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nomina  $nomina
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nomina = Nomina::FindOrFail($id);

        $nominas = Nomina::all(); // se hace el foreach

        $alta = 0;
        $baja = 999_999_999;
        $total = 0;
        $nombreMayor = "";
        $nombreMenor = "";
        $promedio = 0;
        $contador = 0;


        foreach ($nominas as $Nomina) {
            $contador++;

            if ($Nomina->prima > $alta) {
                $alta = $Nomina->prima;
                $nombreMayor = $Nomina->nombreEmpleado;
            }
            if ($Nomina->prima < $baja) {
                $baja = $Nomina->prima;
                $nombreMenor = $Nomina->nombreEmpleado;
            }
            $total += $Nomina->prima;
            $promedio = $total / $contador;
        }
        return view('nominas.view', compact('nomina', 'nombreMayor', 'nombreMenor', 'total', 'promedio', 'nominas', 'contador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nomina  $nomina
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nomina = Nomina::FindOrFail($id);

        return view('nominas.edit', compact('nomina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Nomina  $nomina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'nombreEmpleado' => 'required',
            'cedula' => 'required',
            'salario' => 'required',
            'diasTrabajados' => 'required',

        ]);
        $prima=0;
        $salarioMinimo = 1000000;
        $auxTransporte = 97_032;


        $nomina = Nomina::FindOrFail($id);
        $nomina->update($request->all());

        if ($nomina->salario < ($salarioMinimo * 2)) {
            $auxTransporte = 97_032;
            $nomina->salario = ($nomina->salario + $auxTransporte);
        }

        if ($nomina->diasTrabajados  <= 179) {
            $prima = (($nomina->salario  * $nomina->diasTrabajados) / 360);
        } else if ($nomina->diasTrabajados  == 180) {
            $prima = ($nomina->salario)  / 2;
        }

        DB::table('nominas')
        ->where('id','$id')
        ->update(['prima' =>$prima]);

        DB::table(('nominas'))
        ->where('id','$id')
        ->update(['auxTransporte' =>$auxTransporte]);


        return redirect()->route('nominas.index')->with('exito', 'Se ha modificado el empleado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nomina  $nomina
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $nomina = Nomina::FindOrFail($id);
        $nomina->delete();
        return redirect()->route('nominas.index')->with('exito', 'Se ha eliminado el empleado correctamente.');
    }
}
