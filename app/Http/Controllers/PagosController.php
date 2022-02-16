<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagos;
use App\Models\Cliente;
use Response;


class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pago = Pagos::select('id','n_factura','ide','nombre','apellido','metodo_pago','tipo_pago','valor','created_at','fecha_fin','estado')->get();
        return datatables()->of($pago)->toJson();
    }

    public function __construct(){


        $this->middleware('auth.admin');


    }
public function mostrar()
{
    return view('pagos.index');
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
        $request -> validate([
            'ide' => 'required|min:8|max:11',
            'nombre' => 'required|min:3|max:25',
            'apellido' => 'required|min:3|max:30',            
        ]);
        $pago = new Pagos();
        $pago->n_factura = $request->post('n_factura');
        $pago->ide = $request->post('ide');
        $pago->nombre = $request->post('nombre');
        $pago->apellido = $request->post('apellido');
        $pago->tipo_pago = $request->post('tipo_pago');
        $pago->metodo_pago = $request->post('metodo_pago');
        $pago->valor = $request->post('valor');        
        $pago->fecha_fin = $request->post('fecha_fin');        
        $pago->save();
        return Response::json($pago);     
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
        $pago  = Pagos::where($idpago)->first();
        return Response::json($pago);
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
        $request -> validate([
            'nombre' => 'required|min:3|max:25',
            'apellido' => 'required|min:3|max:30',
            'ide' => 'required|min:8|max:12',
            
        ]);
        $pago = Pagos::find($id);
        $pago ->fill($request->all());
        
        $pago->save();
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
        Pagos::find($id)->delete($id);
        return response()->json([
        'success' => 'Record deleted successfully!'
        ]); 
    }
}
