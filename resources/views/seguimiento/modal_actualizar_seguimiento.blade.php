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
        <h5 class="modal-title" id="exampleModalLabel">Actualizar seguimiento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h5>¿Esta seguro de generar el seguimiento de: <br>
        <span id="nombre" name="nombre"></span>
      ?</h5>  
      
        <form id="editar-seguimiento" name="editar-seguimiento">
        @csrf
        
        
        <input hidden type="text" readonly value="" id="idPersona" name="idPersona"  class="form-control form-control-lg">
        <br>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Dia</span>    
                    <select class="form-select" id="dia" name="dia" aria-label="Default select example">
                        <option selected>Selecciona Dia</option>
                        <option value="1">Dia 1</option>                        
                        <option value="2">Dia 2</option>                        
                        <option value="3">Dia 3</option>                        
                        <option value="4">Dia 4</option>                        
                        <option value="5">Dia 5</option>                        
                        <option value="6">Dia 6</option>                        
                        <option value="7">Dia 7</option>                        
                        <option value="8">Dia 8</option>                        
                        <option value="9">Dia 9</option>                        
                        <option value="10">Dia 10</option>                        
                        <option value="11">Dia 11</option>                        
                        <option value="12">Dia 12</option>                        
                        <option value="13">Dia 13</option>                        
                        <option value="14">Dia 14</option>                        
                        <option value="15">Dia 15</option>                        
                    </select>
                <span class="text-danger" id="diaError"></span><br>
              </div>

                  </div>
                  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Añadir</button>
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