<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagos;
use App\Models\Seguimientos;
use App\Models\Cliente;
use Response;
class SeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seguimiento = new Seguimientos();
        $seguimiento->n_factura = $request->post('n_factura');
        $seguimiento->ide = $request->post('ide');
        $seguimiento->nombre = $request->post('nombre');
        $seguimiento->apellido = $request->post('apellido');
        $seguimiento->dia = $request->post('dia')->default('1');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
