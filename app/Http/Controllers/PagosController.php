<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagos;
use App\Models\Seguimientos;
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
        $pago = Pagos::select('id','n_factura','ide','nombre','apellido','metodo_pago','tipo_pago','valor','fecha_inicio','fecha_fin','estado')->get();
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
            'tipo_pago' => 'required',            
            'metodo_pago' => 'required',            
            'valor' => 'required',            
            'fecha_inicio' => 'required',            
            'fecha_fin' => 'required',            
                    
        ]);
        $pago = new Pagos();
        $pago->n_factura = $request->post('n_factura');
        $pago->ide = $request->post('ide');
        $pago->nombre = $request->post('nombre');
        $pago->apellido = $request->post('apellido');
        $pago->tipo_pago = $request->post('tipo_pago');
        $pago->metodo_pago = $request->post('metodo_pago');
        $pago->valor = $request->post('valor');        
        $pago->fecha_inicio = $request->post('fecha_inicio');        
        $pago->fecha_fin = $request->post('fecha_fin'); 
        $pago->save();  

        /* $seguimiento = new Seguimientos();
        $seguimiento->n_factura = $request->post('n_factura');
        $seguimiento->ide = $request->post('ide');
        $seguimiento->nombre = $request->post('nombre');
        $seguimiento->apellido = $request->post('apellido');
        $seguimiento->dia = $request->post('dia')->default('1');
        $seguimiento->fecha_inicio = $request->post('fecha_inicio');        
        $seguimiento->fecha_fin = $request->post('fecha_fin');
        $seguimiento->save(); */
        
        return Response::json($pago);  

        /* DB::transaction(function () use ($request){
            $pago = Pagos::create([
                'n_factura' => $request['n_factura'],
                'ide' => $request['ide'],
                'nombre' => $request['nombre'],
                'apellido' => $request['apellido'],
                'fecha_inicio' => $request['fecha_inicio'],
                'fecha_fin' => $request['fecha_fin'],
                'tipo_pago' => $request['tipo_pago'],
                'metodo_pago' => $request['metodo_pago'],
                'valor' => $request['valor'],
            ]);

            $pago->seguimiento()->create([
                'n_factura' => $request['n_factura'],
                'ide' => $request['ide'],
                'nombre' => $request['nombre'],
                'apellido' => $request['apellido'],
                'dia' => $request['dia'],
                'fecha_inicio' => $request['fecha_inicio'],
                'fecha_fin' => $request['fecha_fin']
            ]);
            return Response::json($pago);
        }); */
        
       

        



           
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
