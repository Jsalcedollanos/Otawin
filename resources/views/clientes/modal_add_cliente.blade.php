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
<div class="modal fade" id="clienteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-cliente" name="form-cliente" action="{{route('clientes.create')}}">
        @csrf        
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Identificacion</span>
                <input type="text" onkeypress='return validaNumericos(event)' name="ide" id="ide" class="form-control form-control-lg" placeholder="" tabindex="1">
                <span class="text-danger" id="ideError"></span>
              </div>
              
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Nombre</span>    
                <input  maxlength="40" id="nombre" name="nombre" class="form-control form-control-lg" type="text" min="0" placeholder="" tabindex="2">
                <span class="text-danger" id="nombreError"></span><br>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Apellidos</span>   
                <input  maxlength="40" id="apellido" name="apellido" class="form-control form-control-lg" type="text" placeholder="" tabindex="3">
                <span class="text-danger" id="apellidoError"></span>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Correo</span>   
                <input  maxlength="40"  id="correo" name="correo" class="form-control form-control-lg" type="email" placeholder="" tabindex="4">
                <span class="text-danger" id="correoError"></span>
              </div>

              <div class="input-group mb-3">     
                <span class="input-group-text" id="basic-addon2">Telefono</span> 
                <input  maxlength="10"  id="telefono" name="telefono" class="form-control form-control-lg" type="text" min="0" placeholder="" tabindex="5">
                <span class="text-danger" id="telefonoError"></span><br>

                <span class="input-group-text" id="basic-addon2">Direccion</span>
                <input  maxlength="40"  id="direccion" name="direccion" class="form-control form-control-lg" type="text" placeholder="" tabindex="6">
                <span class="text-danger" id="direccionError"></span><br>
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
<script src="/js/validaNumericos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</html>