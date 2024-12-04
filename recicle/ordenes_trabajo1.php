<!DOCTYPE html>


<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Órdenes de Trabajo - Taller de Reparación de Vehículos</title>
  <link rel="stylesheet" href="styilo/stylo.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-9aItFkMmg5zVhfUQTKwuF6m0P3n61%2FbNCb1vhoElq9C6g5oIE0DHEld3B+1fLlt" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
</head>
<body>
  <header>
    
    <div class="container">
        <div class="row">
            <div class="col-md-3"><h1><i class="fas fa-cog"></i> </h1></div>
            <div class="col-md-1"></div>
            <div class="col-md-6"><h1>Órdenes de Trabajo</h1></div>
            <div class="col-md-2"></div>
        </div>
      
    </div>
  </header>
  <hr>
  <div class="content">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-2"><a href="clientes.php" target="" class="btn btn-dark">Clientes</a></div>
      <div class="col-md-2"><a href="ordenes_trabajo.php" target="" class="btn btn-dark">Órdenes de Trabajo</a></div>
      <div class="col-md-2"><a href="inventario.php" target="" class="btn btn-dark">Inventario</a></div>
      <div class="col-md-2"><a href="facturacion.php" target="" class="btn btn-dark">Facturación</a></div>
      <div class="col-md-2"></div>
    </div>
  </div>
  <hr>
 


  <div class='content'>
    <div class="row">
        
        <div class="col-md-3"></div>
        <div class="col-md-6">
               
        <section>
  <h2>Listado de Órdenes de Trabajo</h2>
  <ul>
  <hr style='border:solid 2px black;'>
    <li class="listo">
      <h3>Orden de Trabajo #1</h3>
      <p><strong>Cliente:</strong> Juan Pérez</p>
      <p><strong>Vehículo:</strong> Toyota Corolla</p>
      <p><strong>Descripción:</strong> Revisión de frenos</p>
      <p><strong>Fecha de Ingreso:</strong> 2024-04-01</p>
      <p><strong>Fecha de Entrega:</strong> 2024-04-03</p>
      <button class='btn btn-success' onclick="editarCliente(1)">Editar</button>
      <button class='btn btn-danger' onclick="eliminarCliente(1)">Eliminar</button>
    </li>
    <hr style='border:solid 2px black;'>
    <li>
      <h3>Orden de Trabajo #2</h3>
      <p><strong>Cliente:</strong> María García</p>
      <p><strong>Vehículo:</strong> Honda Civic</p>
      <p><strong>Descripción:</strong> Cambio de aceite</p>
      <p><strong>Fecha de Ingreso:</strong> 2024-04-02</p>
      <p><strong>Fecha de Entrega:</strong> 2024-04-04</p>
      <button class='btn btn-success' onclick="editarCliente(1)">Editar</button>
      <button class='btn btn-danger' onclick="eliminarCliente(1)">Eliminar</button>
    </li>
    <hr style='border:solid 2px black;'>
    <li>
      <h3>Orden de Trabajo #3</h3>
      <p><strong>Cliente:</strong> Luis Hernández</p>
      <p><strong>Vehículo:</strong> Ford Mustang</p>
      <p><strong>Descripción:</strong> Reparación de motor</p>
      <p><strong>Fecha de Ingreso:</strong> 2024-04-03</p>
      <p><strong>Fecha de Entrega:</strong> 2024-04-06</p>
      <button class='btn btn-success' onclick="editarCliente(1)">Editar</button>
      <button class='btn btn-danger' onclick="eliminarCliente(1)">Eliminar</button>
    </li>
    <hr style='border:solid 2px black;'>
    <!-- Puedes añadir más elementos de la lista según sea necesario -->
  </ul>
  <!-- Botón de activación del modal -->
<button type="button" class="btn AgregarOrden btn-primary" data-toggle="modal" data-target="#ordenTrabajoModal">
  <i class="fas fa-plus"></i> Nueva Orden de Trabajo
</button>

<!-- Ventana modal -->
<div class="modal fade" id="ordenTrabajoModal" tabindex="-1" role="dialog" aria-labelledby="ordenTrabajoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ordenTrabajoModalLabel">Nueva Orden de Trabajo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulario para ingresar información de la orden de trabajo -->
        <form>
          <div class="form-group">
            <label for="titulo">Cliente:</label>
            <input type="text" class="form-control" id="ClienteO" placeholder="Ingrese el título de la orden de trabajo">
          </div>
          <div class="form-group">
            <label for="titulo">Vehiculo:</label>
            <input type="text" class="form-control" id="VehiculoO" placeholder="Ingrese la marca del vehiculo de la orden de trabajo">
          </div>
          <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcionO" rows="3" placeholder="Ingrese la descripción de la orden de trabajo"></textarea>
          </div>
          <div class="form-group">
            <label for="fecha">Fecha de inicio:</label>
            <input type="date" class="form-control" id="fechaO" placeholder="Seleccione la fecha de inicio">
          </div>
          <div class="form-group">
            <label for="fecha">Fecha de Entrega:</label>
            <input type="date" class="form-control" id="fechaEntregaO" placeholder="Seleccione la fecha de entrega">
          </div>
          <!-- Agregar más campos según sea necesario -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</section>



  <nav>
    <a href="index.php">Volver a la Página de Inicio</a>
  </nav>



        </div>
        <div class="col-md-3"></div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




<script>
  $(document).ready(function() {
//////////mostrar orden en paginas
  
 function cargarOrden(){

 
 }

 cargarOrden();

});
</script>
</body>
</html>