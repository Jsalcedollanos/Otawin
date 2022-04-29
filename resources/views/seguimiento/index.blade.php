@extends('adminlte::page')

@section('Seguimiento', 'BodyLife')

@section('content_header')
<link rel="stylesheet" href="/css/estilos_clientes.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@stop

@section('content')
<!-- VENTANA MODAL -->
@include('seguimiento.modal_eliminar_seguimiento')
@include('seguimiento.modal_actualizar_seguimiento')
<!-- FIN -->
<h3>Seguimientos de clientes</h3><br>
        <!-- CARD DE INFORMACION -->
        <div id="tarjetas" class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box card-pagos">
                    <div class="inner">
                        <h3>0</h3>
                        <p>Vencidos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="/pagos/index" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box card-vendido">
                    <div class="inner">
                        <h3 id="total">0</h3>
                        <p>Activos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="/pagos/index" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>   
        </div>
        <!-- FIN DE CARD DE INFORMACION -->

    <!-- BLOQUE DE BUSQUEDA AVANZADA -->
    <div id="busqueda-avanzada">
        <p class="titulo-filtros">Busqueda Avanzada</p>
        <div class="input-group mb-3 filtros">
            <span class="input-group-text" id="basic-addon1">Fecha Ingreso</span>
            <input type="date" class="form-control filtro_fecha" placeholder="Buscar por fecha" data-column="7">
            <span class="input-group-text" onkeypress="return validaNumericos(event);" id="basic-addon2">ID</span>
            <input type="text" class="form-control filtro_ide" placeholder="Buscar por identificacion" data-column="1">
            <span class="input-group-text" id="basic-addon2">Nombre</span>
            <input type="text" class="form-control filtro_nombre" placeholder="Buscar por Nombre" data-column="3">
        </div>
    </div>
    <!-- FIN DEL BLOQUE DE BUSQUEDA -->
    <table class="table table-dark table-striped " id="seguimiento">
        <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Ide</th>
                <th scope="col">N_factura</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>                                                                  
                <th scope="col">dia</th>                                                                  
                <th scope="col">estado</th>                                                                  
                <th scope="col">fecha Inicio</th>                                                                  
                <th scope="col">fecha Fin</th>                                                                  
                <th scope="col">Editar</th>                                                                                                                             
                <th scope="col">Eliminar</th>                                                                                                                             
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Ide</th>
                <th scope="col">N_factura</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>                                                                  
                <th scope="col">dia</th>                                                                  
                <th scope="col">estado</th>                                                                  
                <th scope="col">fecha Inicio</th>                                                                  
                <th scope="col">fecha Fin</th>                                                                  
                <th scope="col">Editar</th>                                                                                                                             
                <th scope="col">Eliminar</th>                                                                                                                             
            </tr>
        </tfoot>
    </table>
@stop

@section('css')
    
@stop

@section('js')


    <!-- BLOQUE DE MOSTRAR DATOS DE DATATABLE -->
<script>
    $(document).ready( function () {
        jQuery.fn.dataTable.Api.register( 'sum()', function ( ) {
        return this.flatten().reduce( function ( a, b ) {
            if ( typeof a === 'string' ) {
                a = a.replace(/[^\d.-]/g, '') * 1;
            }
            if ( typeof b === 'string' ) {
                b = b.replace(/[^\d.-]/g, '') * 1;
            }
            return a + b;
        }, 0);
    });

        var table = $('#seguimiento').DataTable({
            drawCallback: function () {
                var api = this.api();
                var total = api.column(5,{"filter":"applied"}).data().count();
                $('#total').text(total);
            },
            
            
            "ajax": "{{route('seguimiento.index')}}", 
                
            "columns": [
                {data: 'id'},
                {data: 'ide'},
                {data: 'n_factura'},            
                {data: 'nombre'},
                {data: 'apellido'},
                {data: 'dia'},
                {data: 'estado'},
                {data: 'fecha_inicio'},
                {data: 'fecha_fin'}, 
                {data:'id', "render": function (data) {
                return "<button id=\"" + data + "\" type=\"button\" name=\"btnEditar\" class=\"btnEditar btn btn-info botonEditar\"><span class=\"bi bi-calendar-check-fill\"></span></button>";
                }},
                {data:'id', "render": function (data) {
                    var ide = data;
                return "<button  id=\"" + data + "\" type=\"button\" name=\"eliminar\"  class=\"btnEliminar btn btn-danger\"> <span class=\"bi bi-trash-fill\"></span></button>";
                }},                    
            ]        
        });

    /* FIN DEL BLOQUE DE MOSTRAR DATOS */


    /* BUSQUEDA AVANZADA */
    $('.filtro_fecha').keyup(function(){
            table.column($(this).data('column'))
            .search($(this).val())
            .draw();
        });

        $('.filtro_ide').keyup(function(){
            table.column($(this).data('column'))
            .search($(this).val())
            .draw();
        });

        $('.filtro_nombre').keyup(function(){
            table.column($(this).data('column'))
            .search($(this).val())
            .draw();
        });
        /* FIN DEL BLOQUE DE BUSQUEDA AVANZADA */

    /* ELIMINAR SEGUIMIENTO */
    var id_seguimiento;
    $(document).on('click','.btnEliminar',function(){
        var id_seguimiento = $(this).attr('id');
        $('#eliminarModal').modal('show');
        $('#btnEliminar').on('click',function(){
            $.ajax({
            url:"eliminar/"+id_seguimiento,
                success:function(data){
                    setTimeout(function(){
                    toastr.success('El seguimiento se ha eliminado satifactoriamente', 'Atencion!', {timeOut: 5000});
                        $('#eliminarModal').modal('hide');
                        $(this).removeData('eliminarModal');
                        table.ajax.reload();
                    }, 100);
                },
                error:function(data){
                    setTimeout(function(){
                        $('#eliminarModal').modal('hide');
                        toastr.error('El seguimiento no se pudo eliminar', 'Atencion!', {timeOut: 5000});
                        table.ajax.reload();
                        }, 200);
                }
            }); 
        });
    });
    /* FIN ELIMINAR PAGO */

    /* EDITAR PAGO */
    $('#editar-seguimiento').submit(function(e){
    e.preventDefault();
    var idp = $('#idPersona').val();
    var diap = $('#dia').val();
        $.ajax({
            url:"update/"+idp,
            type: 'PUT',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            typedata: 'json',
            data:{
                dia:diap,                
            },           
            success:function(data){
                    setTimeout(function(){
                    $('#actualizarModal').modal('hide');
                    toastr.success('Se ha sumado otro dia al seguimiento.', 'Atencion!', {timeOut: 5000});
                    table.ajax.reload();
                    }, 200);
            },
            error:function(response){
                toastr.error('Opps Algunos errores no permiten actualizar tu pago, Corrigelos!',{timeOut:5000});
                $('#diaError').text(response.responseJSON.errors.dia);                
            }
            
        })

    });
    /* EDITAR SEGUIMIENTO */

    });  
</script>

<!-- LISTAR seguimiento PARA EDITAR -->
<script>
    let id_seguimiento;
    $(document).ready(function(){
        $(document).on('click','.btnEditar',function(){
            id_seguimiento = $(this).attr('id');
                $.ajax({
                    url:"editar/"+id_seguimiento,
                    type:'get',
                success:function(data){
                    $('#idPersona').val(data.id),
                    $('#nombre').val(data.nombre),
                    $('#dia').val(data.dia),
                    $('#actualizarModal').modal('show');
                }
            });
        });
    });
</script>


    <!-- LIBRERIAS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Boostrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- Fin Boostrap 5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>  
    <script src="//cdn.datatables.net/plug-ins/1.11.4/api/sum().js"></script>
    <!-- FIN LIBRERIAS -->
    <script src="/js/validaNumericos.js"></script>
    
@stop



