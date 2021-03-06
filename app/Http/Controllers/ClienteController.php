<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Response;
use Illuminate\Support\Facades\Storage;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = Cliente::select('id','ide','nombre','apellido','direccion','telefono','correo','created_at')->get();
        return datatables()->of($cliente)->toJson();

        
    }
    public function __construct(){


        $this->middleware('auth.admin');


    }

    public function cantClientes()
    {
        $contador = Cliente::select('ide')->count();
        $contPagos = Pagos::select('n_factura')->count();
        $sumPago = Pagos::select('valor')->sum('valor');
        return view('clientes.index',compact('contador','contPagos','sumPago'));
    }

    public function mostrar()
    {
        return view('clientes.index');
    }

    /* public function registros()
    {
        $clientes = Clientes::withCount(['ide'])->get();
        return view('admin.index',compact('clientes'));
    } */
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
            'ide' => 'required|max:12',
            'nombre' => 'required|min:3|max:25',
            'apellido' => 'required|min:3|max:30',            
            'telefono' => 'required|min:7|max:12',            
        ]);
        $cliente = new Cliente();
        $cliente->ide = $request->post('ide');
        $cliente->nombre = $request->post('nombre');
        $cliente->apellido = $request->post('apellido');
        $cliente->telefono = $request->post('telefono');
        $cliente->direccion = $request->post('direccion');
        $cliente->correo = $request->post('correo');
        $cliente->save();
        return Response::json($cliente);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* return view('clientes.index', [
            'clientes' => Cliente::find($id);
        ]); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idCliente = array('id' => $id);
        $cliente  = Cliente::where($idCliente)->first();
        return Response::json($cliente);
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
            'telefono' => 'required|min:7|max:13',
            
        ]);
        $cliente = Cliente::find($id);
        $cliente ->fill($request->all());
        
        $cliente->save();
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
        Cliente::findOrFail($id)->delete($id);
        return response()->json([
        'success' => 'Record deleted successfully!'
        ]); 
    }

}
