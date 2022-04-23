<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Seguimiento | BodyLife</title>
</head>
<body>
<div class="modal fade" id="seguimientoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seguimiento Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <h5>¿Esta seguro de generar el seguimiento de: <br>
        <span id="nombre" name="nombre"></span>
        <span id="apellido" name="apellido"></span>
        <span>con modalidad de pago </span>
        <span id="modalidad" name="modalidad"></span>
      ?</h5>
      

        <form id="seguimiento-cliente" name="seguimiento-cliente"  action="{{route('seguimiento.create')}}">
        @csrf     
        
        

          <div hidden>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">N°Factura</span>
                <input value="" readonly id="n_facturaSeg" name="n_facturaSeg" class="form-control form-control-lg" type="text" min="0" placeholder="">
                <span class="text-danger" id="facturaError"></span>
                <br>
              </div>   

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Identificacion</span>
                <input readonly type="text" onkeypress='return validaNumericos(event)' name="identificacionClienteSeg" id="identificacionClienteSeg" class="form-control form-control-lg">
                <span class="text-danger" id="ideError"></span>
              </div>
              
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Nombre</span>    
                <input readonly maxlength="11" id="nombreClienteSeg" name="nombreClienteSeg" class="form-control form-control-lg" type="text" min="0">
                <span class="text-danger" id="nombreError"></span><br>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Apellidos</span>   
                <input  readonly maxlength="20" id="apellidoClienteSeg" name="apellidoClienteSeg" class="form-control form-control-lg" type="text">
                <span class="text-danger" id="apellidoError"></span>
              </div>


              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Fecha inicio</span>   
                <input readonly type="date"  value="" id="fecha_inicioSeg" name="fecha_inicioSeg" class="form-control form-control-lg" >
                <span class="text-danger" id="inicioError"></span><br>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Fecha fin</span>
                <input readonly type="date" value="" id="fecha_finSeg" name="fecha_finSeg" class="form-control form-control-lg">
                <span class="text-danger" id="finError"></span><br>
              </div>

            
          </div>    
        
                <br>
                  </div>
                  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" tabindex="2">Cancelar</button>
        <button type="submit" class="btn btn-primary" tabindex="3">Generar</button>
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