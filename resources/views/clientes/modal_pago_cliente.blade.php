<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Clientes | BodyLife</title>
</head>
<body>
<div class="modal fade" id="pagosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pago Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="pago-cliente" name="pago-cliente"  action="{{route('pagos.create')}}">
        @csrf         
                <?php
                  $caracteres = "1234567890";
                  $desordenada = str_shuffle($caracteres);
                  $CH = substr($desordenada, 1, 4);
                ?>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">N°Factura</span>
                <input value="" readonly id="n_factura" name="n_factura" class="form-control form-control-lg" type="text" min="0" placeholder="">
                <span class="text-danger" id="facturaError"></span>
                <br>
              </div>   

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Identificacion</span>
                <input readonly type="text" onkeypress='return validaNumericos(event)' name="identificacionCliente" id="identificacionCliente" class="form-control form-control-lg">
                <span class="text-danger" id="ideError"></span>
              </div>
              
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Nombre</span>    
                <input readonly maxlength="11" id="nombreCliente" name="nombreCliente" class="form-control form-control-lg" type="text" min="0">
                <span class="text-danger" id="nombreError"></span><br>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Apellidos</span>   
                <input  readonly maxlength="20" id="apellidoCliente" name="apellidoCliente" class="form-control form-control-lg" type="text">
                <span class="text-danger" id="apellidoError"></span>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Metodo de pago</span>    
                    <select id="metodo_pago" name="metodo_pago" class="form-select" aria-label="Default select example" tabindex="1">
                        <option value="" selected>Selecciona Opcion</option>
                        <option value="Transferencia">Transferencia</option>
                        <option value="Efectivo">Efectivo</option>
                    </select>
                <span class="text-danger" id="metodoError"></span><br>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Tipo de pago</span>    
                    <select onchange='valPrecio();' class="form-select" id="tipo_pago" name="tipo_pago" aria-label="Default select example" tabindex="2">
                        <option value="" selected>Selecciona Opcion</option>
                        <option value="Diario">Diario</option>
                        <option value="Quincenal">Quincenal</option>
                        <option value="Mensual">Mensual</option>
                    </select>
                <span class="text-danger" id="pagoError"></span><br>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Fecha inicio</span>   
                <input  type="date"  value="" id="fecha_inicio" name="fecha_inicio" class="form-control form-control-lg" tabindex="3">
                <span class="text-danger" id="inicioError"></span><br>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Fecha fin</span>
                <input type="date" value="" id="fecha_fin" name="fecha_fin" class="form-control form-control-lg" tabindex="4">
                <span class="text-danger" id="finError"></span><br>
              </div>

              

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">$COP</span>
                <input  maxlength="7"  id="valor" onkeypress="return valideKey(event);" name="valor" class="form-control" type="text">
                <span class="text-danger" id="valorError"></span><br>
              </div>

        
                <br>
                  </div>
                  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
        </form>
      </div>
      
  </div>
</div>
</body>

<!-- JS -->
<script src="/js/numeroRandom.js"></script>
<script src="/js/validaNumericos.js"></script>
<script src="/js/validarPrecio.js"></script>
<script src="/js/validacionNumero.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</html>