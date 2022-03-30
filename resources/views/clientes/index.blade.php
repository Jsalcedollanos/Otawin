@extends('adminlte::page')

@section('Panel', 'BodyLife')

@section('content_header')
<link rel="stylesheet" href="/css/estilos_clientes.css">
<link rel="stylesheet" href="/fonts/fontawesome-free-6.1.1-web/css/all.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <h1>Ingreso de clientes Body Life</h1>
@stop
@section('content')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <div id="menu">
            <div class="btnGuardar">
                <i id="btnGuardar" type="button" class="fa-solid fa-person-circle-plus"></i>
                <p>Agregar cliente</p>
            </div> 
    
            <div class="btnBalance">
                <i id="btnBalance" data-toggle="modal"  data-target="#balanceModal" type="button"class="fas fa-balance-scale"></i>
                <p>Ver Balance</p>
            </div> 
        </div> 

@include('clientes.modal_add_cliente')
@include('clientes.modal_eliminar_cliente')
@include('clientes.modal_actualizar_cliente')

    <table class="table table-dark table-striped " id="clients">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Direccion</th>
            <th scope="col">Telefono</th>
            <th scope="col">Correo</th>                 
            <th scope="col">Fecha de ingreso</th>                                                               
            <th scope="col">Editar</th>                                
            <th scope="col">Eliminar</th>                                
            <th scope="col">Pago</th>                                
        </tr>
    </thead>
</table>

<!-- resultado cantidad pacientes -->
<div id="content-total">
    <label for="">Cantidad de clientes registrados: </label>
    <span id="total"></span>
</div>
<!-- fin -->

@include('clientes.modal_pago_cliente')
@include('clientes.modal_balance_pagos')
@stop



@section('css')
    <script src="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"></script>
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Boostrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!-- Fin Boostrap 5 -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>  
<script src="//cdn.datatables.net/plug-ins/1.11.4/api/sum().js"></script>
<!-- Validacion solo numero -->

<script>
$(document).ready( function () {
    var table = $('#clients').DataTable({
        drawCallback: function () {
            var api = this.api();
            var total = api.rows().data().count();
            $('#total').text(total);
        },
        
        "processing": true,
        "serverSide": true,
        "ajax": "{{route('clientes.index')}}",
        "columns": [
            {data: 'id'},
            {data: 'ide'},
            {data: 'nombre'},
            {data: 'apellido'},
            {data: 'direccion'},
            {data: 'telefono'},
            {data: 'correo'},
            {data: 'created_at'},
            {data:'id', "render": function (data) {
            return "<button id=\"" + data + "\" type=\"button\" name=\"btnEditar\" class=\"btnEditar btn btn-warning botonEditar\"><span class=\"material-icons\">edit</span></button>";
            }},

            {data:'id', "render": function (data) {
                var ide = data;
            return "<button  id=\"" + data + "\" type=\"button\" name=\"eliminar\"  class=\"eliminar btn btn-warning\"> <span class=\"material-icons\">delete</span></button>";
            }},

            {data:'id', "render": function (data) {
            return "<button id=\"" + data + "\" type=\"button\" name=\"btnPago\" class=\"btnPago btn btn-primary\"><span class=\"bi bi-currency-dollar\"></span></button>";
            }},
        ]
    });
 



    

/* INSTRUCCION AJAX PARA GUARDAR CLIENTES */
$('#btnGuardar').on('click',function(){
    
    /* Restablecer modal al cargar */
    
    $('#ide').val("");
    $('#nombre').val("");
    $('#apellido').val("");
    $('#correo').val("");
    $('#telefono').val("");
    $('#direccion').val("");
    /* fin de este bloque */
    $('#clienteModal').modal('show');
        $('#correo').val('noaplica@gmail.com');
        $('#telefono').val('1111111111');
        $('#direccion').val('noaplica');
    $('#form-cliente').submit(function(e){
        e.preventDefault();    
        let ide = $('#ide').val();
        let nombre = $('#nombre').val();
        let apellido = $('#apellido').val();
        let correo = $('#correo').val();
        let telefono = $('#telefono').val();
        let direccion = $('#direccion').val();
        $.ajax({
            url: '{{route("clientes.create")}}',
            type: "POST",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
        data: {
            ide:ide,
            nombre:nombre,
            apellido:apellido,
            correo:correo,
            telefono:telefono,
            direccion:direccion,
            
        },
            success:function(data){
                setTimeout(function(){
                  $("#clienteModal").find("input,textarea,select,span").val("");
                  $('#clienteModal').modal('hide');
                  toastr.success('La factura se ha guardado satifactoriamente', 'Guardado!', {timeOut: 5000});
                  table.ajax.reload();
                }, 20);
            },
            
            error:function(response){
                
                toastr.error('Opps Algunos errores no permiten guardar tu cliente, Corrigelos!',{timeOut:5000});
                $('#ideError').text(response.responseJSON.errors.ide);
                $('#nombreError').text(response.responseJSON.errors.nombre);
                $('#apellidoError').text(response.responseJSON.errors.apellido);
                $('#correoError').text(response.responseJSON.errors.correo);
                $('#telefonoError').text(response.responseJSON.errors.telefono);
                $('#direccionError').text(response.responseJSON.errors.direccion);
              
            }
        });   
    });    
});
/* Eliminar */
var id_cliente;
$(document).on('click','.eliminar',function(){
    var id_cliente = $(this).attr('id');
    $('#eliminarModal').modal('show');
    $('#btnEliminar').on('click',function(){
       $.ajax({
        url:"eliminar/"+id_cliente,
        success:function(data){
                setTimeout(function(){
                  toastr.success('El cliente se ha eliminado satifactoriamente', 'Atencion!', {timeOut: 5000});
                    $('#eliminarModal').modal('hide');
                    $(this).removeData('modal');
                    table.ajax.reload();
                }, 100);
            },
            error:function(data){
                setTimeout(function(){
                    $('#editarModal').modal('hide');
                    toastr.error('El cliente no se pudo eliminar', 'Atencion!', {timeOut: 5000});
                    table.ajax.reload();
                    }, 200);
                }
            }); 
        });
    });
    
/* BLOQUE DE ACTUALIZAR CLIENTE VIA AJAX */
$('#editar-cliente').submit(function(e){
    e.preventDefault();
    var idc = $('#id').val();
    var idec = $('#editarIde').val();
    var nombrec = $('#editarNombre').val();
    var apellidoc = $('#editarApellido').val();
    var direccionc = $('#editarDireccion').val();
    var telefonoc = $('#editarTelefono').val();
    var correoc = $('#editarCorreo').val();
        $.ajax({
            url:"update/"+idc,
            type: 'PUT',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            typedata: 'json',
            data:{
           
                ide:idec,
                nombre:nombrec,
                apellido:apellidoc,
                direccion:direccionc,
                telefono:telefonoc,
                correo:correoc,
            },
           
            success:function(data){
                    setTimeout(function(){
                    $('#actualizarModal').modal('hide');
                    toastr.success('El cliente se ha actualizado satifactoriamente', 'Atencion!', {timeOut: 5000});
                    table.ajax.reload();
                    }, 200);
            },
            error:function(response){
                toastr.error('Opps Algunos errores no permiten actualizar a tu cliente, Corrigelos!',{timeOut:5000});
                $('#editarIdeError').text(response.responseJSON.errors.ide);
                $('#editarNombreError').text(response.responseJSON.errors.nombre);
                $('#editarApellidoError').text(response.responseJSON.errors.apellido);
                $('#editarDireccionError').text(response.responseJSON.errors.direccion);
                $('#editarTelefonoError').text(response.responseJSON.errors.telefono);
                $('#editarCorreoError').text(response.responseJSON.errors.correo);
            }
            
        })

    });
    /* GUARDAR PAGO */   
        $('#pago-cliente').submit(function(e){
        e.preventDefault();    
        let n_factura = $('#n_factura').val();
        let idencli = $('#identificacionCliente').val();
        let nombrecli = $('#nombreCliente').val();
        let apellidocli = $('#apellidoCliente').val();
        let metodo_pago = $('#metodo_pago').val();
        let tipo_pago = $('#tipo_pago').val();
        let valor = $('#valor').val();
        let fecha_fin = $('#fecha_fin').val();
        let fecha_inicio = $('#fecha_inicio').val();
        
        $.ajax({
            url: '{{route("pagos.create")}}',
            type: "POST",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
        data: 
        {
            n_factura:n_factura,
            ide:idencli,
            nombre:nombrecli,
            apellido:apellidocli,
            metodo_pago:metodo_pago,
            tipo_pago:tipo_pago,
            fecha_inicio:fecha_inicio,
            fecha_fin:fecha_fin,
            valor:valor,            
        },
            success:function(data){
                
                setTimeout(function(){
                  $("#pagosModal").find("input,textarea,select").val("");
                  $('#n_factura').val("");
                  $('#pagosModal').modal('hide');
                  toastr.success('El pago se ha guardado satifactoriamente', 'Guardado!', {timeOut: 5000});
                  table.ajax.reload();
                }, 20);
            },
            
            error:function(response){
                toastr.error('Opps Algunos errores no permiten guardar el pago, Corrigelos!',{timeOut:5000});
                $('#ideError').text(response.responseJSON.errors.ide);                                                  
                $('#nombreError').text(response.responseJSON.errors.nombre);                                                  
                $('#apellidoError').text(response.responseJSON.errors.apellido);                                                  
                $('#valorError').text(response.responseJSON.errors.valor);
                $('#metodoError').text(response.responseJSON.errors.metodo_pago);
                $('#pagoError').text(response.responseJSON.errors.tipo_pago);
                $('#inicioError').text(response.responseJSON.errors.fecha_inicio);
                $('#finError').text(response.responseJSON.errors.fecha_fin);
                                                                                                                  
            }
        });       
});  
/* FIN  GUARDAR PAGO  */  
});
/* Fin */
</script>

<!-- LISTAR CLIENTE EN MODAL VIA AJAX -->
<script>
    let id_cliente;
$(document).ready(function(){
    $(document).on('click','.btnEditar',function(){
        
        id_cliente = $(this).attr('id');
            $.ajax({
                url:"editar/"+id_cliente,
                type:'get',
            success:function(data){
                $('#id').val(data.id),
                $('#editarIde').val(data.ide),
                $('#editarNombre').val(data.nombre),
                $('#editarApellido').val(data.apellido),
                $('#editarCorreo').val(data.correo),
                $('#editarDireccion').val(data.direccion),
                $('#editarTelefono').val(data.telefono),
                $('#actualizarModal').modal('show');
			    }
            });
    });
    /* FIN DE LISTAR PRODUCTO VIA AJAX */
});   
</script>

<!-- LISTAR CLIENTE PARA PAGO EN MODAL VIA AJAX -->
 <script>
    let id_c;
    $(document).ready(function(){
    $(document).on('click','.btnPago',function(){
        
        id_c = $(this).attr('id');
            $.ajax({
                url:"pago/"+id_c,
                type:'get',
            success:function(data){
                $('#n_factura').val(Math.floor((Math.random() * 5000) + 1000)),
                $('#idc').val(data.id),
                $('#identificacionCliente').val(data.ide),
                $('#nombreCliente').val(data.nombre),
                $('#apellidoCliente').val(data.apellido),
                $('#created_at').val(data.created_at),
                $('#pagosModal').modal('show');
			    }
            });
    });
    /* FIN DE LISTAR PRODUCTO VIA AJAX */
});   
</script>
    <script src="/js/numeroRandom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
@stop