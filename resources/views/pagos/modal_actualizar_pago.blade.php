<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Pagos | BodyLife</title>
</head>
<body>
<div class="modal fade" id="actualizarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Pago</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editar-pago" name="editar-pago">
        @csrf
        
        <input type="text" readonly value="" id="idPersona" name="idPersona"  class="form-control form-control-lg">
        <br>

        <?php
                  $caracteres = "1234567890";
                  $desordenada = str_shuffle($caracteres);
                  $CH = substr($desordenada, 1, 4);
                ?>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">N°Factura</span>
                <input readonly value="<?php echo $CH ?>" readonly id="n_facturaPago" name="n_facturaPago" class="form-control form-control-lg" type="number" min="0" placeholder="" tabindex="1">
                <span class="text-danger" id="facturaError"></span>
                <br>
              </div>   

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Identificacion</span>
                <input readonly type="text" onkeypress='return validaNumericos(event)' name="idect" id="idect" class="form-control form-control-lg" placeholder="" tabindex="1">
                <span class="text-danger" id="ideError"></span>
              </div>
              
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Nombre</span>    
                <input  readonly maxlength="11" id="nombrePago" name="nombrePago" class="form-control form-control-lg" type="text" min="0" placeholder="" tabindex="2">
                <span class="text-danger" id="nombreError"></span><br>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Apellidos</span>   
                <input  readonly maxlength="20" id="apellidoPago" name="apellidoPago" class="form-control form-control-lg" type="text" placeholder="" tabindex="3">
                <span class="text-danger" id="apellidoError"></span>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Fecha Inicio</span>
                <input type="date" id="f_inicio" name="f_inicio" step="1" class="form-control form-control-lg">
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Fecha fin</span>
                <input type="date" id="f_fin" name="f_fin" step="1" class="form-control form-control-lg">
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Metodo de pago</span>    
                    <select id="m_pago" name="m_pago" class="form-select" aria-label="Default select example">
                        <option selected>Selecciona Opcion</option>
                        <option value="Transferencia">Transferencia</option>
                        <option value="Efectivo">Efectivo</option>
                    </select>
                <span class="text-danger" id="metodoError"></span><br>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Tipo de pago</span>    
                    <select onchange='valPrecio();' class="form-select" id="t_pago" name="t_pago" aria-label="Default select example">
                        <option selected>Selecciona Opcion</option>
                        <option value="Diario">Diario</option>
                        <option value="Quincenal">Quincenal</option>
                        <option value="Mensual">Mensual</option>
                    </select>
                <span class="text-danger" id="pagoError"></span><br>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">$COP</span>
                <input readonly maxlength="7" onkeypress="return valideKey(event);" id="val" name="val" class="form-control" type="text" placeholder="" tabindex="7">
                <span class="text-danger" id="valorError"></span><br>
              </div>

                  </div>
                  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
        </form>
      </div>
      
  </div>
</div>
</body>

<!-- JS -->
<script src="/js/validaNumericos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</html>