@extends('adminlte::page')

@section('Pagos', 'BodyLife')

@section('content_header')
<link rel="stylesheet" href="/css/estilos_clientes.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <h1>Otawin</h1>
@stop

@section('content')

@include('pagos.modal_add_pago')
@include('pagos.modal_eliminar_pago')
@include('pagos.modal_actualizar_pago')

    <p>Pagos - Body Life.</p>
    
            <div id="content-boton">
                <i id="btnPago" type="button" class="bi bi-credit-card-2-back-fill"></i>
                <p>Agregar Pago</p>
            </div> 

    <table class="table table-dark table-striped " id="pagos">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ide</th>
            <th scope="col">N_factura</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>                 
            <th scope="col">M-pago</th>                 
            <th scope="col">T-pago</th>                 
            <th scope="col">Valor</th>                 
            <th scope="col">Ingreso</th>                                
            <th scope="col">Final</th>                                
            <th scope="col">Editar</th>                                
            <th scope="col">Eliminar</th>                                                               
            <th scope="col">Ver</th>                                                               
        </tr>
    </thead>
</table>
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
    var table = $('#pagos').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{route('pagos.index')}}",     
        "columns": [
            {data: 'id'},
            {data: 'ide'},
            {data: 'n_factura'},            
            {data: 'nombre'},
            {data: 'apellido'},
            {data: 'metodo_pago'},
            {data: 'tipo_pago'},
            {data: 'valor'},
            {data: 'created_at'},
            {data: 'fecha_fin'},
            {data:'id', "render": function (data) {
            return "<button id=\"" + data + "\" type=\"button\" name=\"btnEditar\" class=\"btnEditar btn btn-warning botonEditar\"><span class=\"material-icons\">edit</span></button>";
            }},

            {data:'id', "render": function (data) {
                var ide = data;
            return "<button  id=\"" + data + "\" type=\"button\" name=\"eliminar\"  class=\"eliminar btn btn-warning\"> <span class=\"material-icons\">delete</span></button>";
            }},

            {data:'id', "render": function (data) {
                var ide = data;
            return "<button  id=\"" + data + "\" type=\"button\" name=\"ver\"  class=\"ver btn btn-info\"> <span class=\"bi bi-eye-fill\"></span></button>";
            }},        
        ]       
    });
    

    /* ELIMINAR PAGO */
    var id_pago;
    $(document).on('click','.eliminar',function(){
        var id_pago = $(this).attr('id');
        $('#eliminarModal').modal('show');
        $('#btnEliminar').on('click',function(){
            $.ajax({
            url:"eliminar/"+id_pago,
                success:function(data){
                    setTimeout(function(){
                    toastr.success('El cliente se ha eliminado satifactoriamente', 'Atencion!', {timeOut: 5000});
                        $('#eliminarModal').modal('hide');
                        $(this).removeData('eliminarModal');
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
    /* FIN ELIMINAR PAGO */

    /* EDITAR PAGO */
    $('#editar-pago').submit(function(e){
    e.preventDefault();
    var idp = $('#idPersona').val();
    var n_factura = $('#n_facturaPago').val();
    var idect = $('#idect').val();
    var nombrep = $('#nombrePago').val();
    var apellidop = $('#apellidoPago').val();
    var tipo_pago = $('#t_pago').val();
    var metodo_pago = $('#m_pago').val();
    var valor = $('#val').val();
    var fecha_fin = $('#f_fin').val();
    var fecha_ini = $('#f_ini').val();
        $.ajax({
            url:"update/"+idp,
            type: 'PUT',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            typedata: 'json',
            data:{
                n_factura:n_factura,
                ide:idect,
                nombre:nombrep,
                apellido:apellidop,
                fecha_fin:fecha_fin,
                fecha_ini:fecha_ini,
                tipo_pago:tipo_pago,
                metodo_pago:metodo_pago,
                valor:valor,                
            },
           
            success:function(data){
                    setTimeout(function(){
                    $('#actualizarModal').modal('hide');
                    toastr.success('El pago se ha actualizado satifactoriamente', 'Atencion!', {timeOut: 5000});
                    table.ajax.reload();
                    }, 200);
            },
            error:function(response){
                toastr.error('Opps Algunos errores no permiten actualizar tu pago, Corrigelos!',{timeOut:5000});
                /* $('#editarIdeError').text(response.responseJSON.errors.ide);
                $('#editarNombreError').text(response.responseJSON.errors.nombre);
                $('#editarApellidosError').text(response.responseJSON.errors.apellido);
                $('#editarDireccionError').text(response.responseJSON.errors.direccion);
                $('#editarTelefonoError').text(response.responseJSON.errors.telefono);
                $('#editarCorreoError').text(response.responseJSON.errors.correo); */
            }
            
        })

    });
    /* EDITAR PAGO */
});
</script>
<!-- LISTAR PAGO PARA EDITAR -->
<script>
    let id_pago;
    $(document).ready(function(){
        $(document).on('click','.btnEditar',function(){
            id_pago = $(this).attr('id');
                $.ajax({
                    url:"editar/"+id_pago,
                    type:'get',
                success:function(data){
                    $('#idPersona').val(data.id),
                    $('#idect').val(data.ide),
                    $('#n_facturaPago').val(data.n_factura),
                    $('#nombrePago').val(data.nombre),
                    $('#apellidoPago').val(data.apellido),
                    $('#m_pago').val(data.metodo_pago),
                    $('#t_pago').val(data.tipo_pago),
                    $('#val').val(data.valor),
                    $('#f_fin').val(data.fecha_fin),
                    $('#f_ini').val(data.fecha_ini),
                    $('#actualizarModal').modal('show');
                }
            });
        });
    });
</script>
<!-- FIN DE LISTAR PAGO -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.11.4/api/sum().js"></script>
@stop