<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagos;
use App\Models\Seguimiento;
use App\Models\Cliente;
use Response;
use Illuminate\Support\Facades\Storage;
class SeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seguimiento = Seguimiento::select('id','n_factura','ide','nombre','apellido','dia','fecha_inicio','fecha_fin','estado')->get();
        return datatables()->of($seguimiento)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
        public function mostrar()
    {
        return view('seguimiento.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request -> validate([
            'ide' => 'required|min:8|max:11',
            'nombre' => 'required|min:3|max:25',
            'apellido' => 'required|min:3|max:30',                               
            'fecha_inicio' => 'required',            
            'fecha_fin' => 'required',            
                    
        ]);
        $seguimiento = new Seguimiento();
        $seguimiento->n_factura = $request->post('n_factura');
        $seguimiento->ide = $request->post('ide');
        $seguimiento->nombre = $request->post('nombre');
        $seguimiento->apellido = $request->post('apellido');
        $seguimiento->fecha_inicio = $request->post('fecha_inicio');        
        $seguimiento->fecha_fin = $request->post('fecha_fin');
        $seguimiento->save();
        return Response::json($seguimiento);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idpago = array('id' => $id);
        $seguimiento  = Pagos::where($idpago)->first();
        return Response::json($seguimiento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $seguimiento = Seguimiento::find($id);
        $seguimiento ->fill($request->all());        
        $seguimiento->save();
        return response()->json([
            "mensaje" => "listo"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Seguimiento::find($id)->delete($id);
        return response()->json([
        'success' => 'Record deleted successfully!'
        ]); 
    }
}
