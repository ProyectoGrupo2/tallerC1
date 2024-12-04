<?php
// Iniciar sesión si no está iniciada
session_start();

// Verificar si la sesión no está iniciada
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // Redirigir al usuario a la página de inicio de sesión u otra página de acceso denegado
    header("location: index.php");
    exit;
}

?>




<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clientes - Taller de Reparación de Vehículos</title>
  <!-- Incluir archivos CSS de Bootstrap -->
  <link rel="stylesheet" href="styilo/stylo.css">
  <script src="js/jquery.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-9aItFkMmg5zVhfUQTKwuF6m0P3n61%2FbNCb1vhoElq9C6g5oIE0DHEld3B+1fLlt" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/jquery.js"></script>
  <!-- <script src="js/jsR.js"></script> -->
  <script src="js/clientes.js"></script>

</head>





</style>
    <style>
    /* Estilos personalizados */
    .navbar {
      background-color: black;
      color: #fff;
    }
    .navbar-brand img {
      height: 40px; /* Ajusta el tamaño del logotipo según sea necesario */
    }
    .nav-item {
      margin-left: 10px; /* Espaciado entre los botones */
    }
  </style>


  
  <header >
  <nav class="navbar navbar-expand-lg navbar" style='border-bottom: 1px solid  black;'>
    <div class="container">
      <a class="navbar-brand" href="#">
      <h4><i class="fas fa-cog"></i>Reparacion Vehiculo  </h4>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <h4><a class="nav-link" href="clientes.php">Clientes </a></h4>
          </li>
          <li class="nav-item">
          <h4><a class="nav-link" href="ordenes_trabajo.php">Orden de trabajo </a></h4>
          </li>
          <li class="nav-item">
          <h4> <a class="nav-link" href="inventario.php">Iventario </a></h4>
          </li>
          <li class="nav-item">
          <h4>  <a class="nav-link" href="facturacion.php">Facturacion</a></h4>
          </li>
          <li class="nav-item">
          <h6>   <button  class="btn btn-primary"onclick="cerrarSesion()">Cerrar Sesión</button></h6>
          </li>
         
        </ul>
      </div>
    </div>
  </nav>
        <?php 
            echo $idUsuario = $_SESSION["correo"];
          
          ?>
  </header>
  <br>
  <hr>

  
  <hr>
  <body style='background:#404040;'>

  <section class="container my-5">
    <div class="row justify-content-center mb-8">
      <div class="col-md-12">
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#crearClienteModal">
          <i class="fas fa-plus"></i> Agregar cliente
        </button>
      </div>
    </div>

    <!-- Ventana modal para agregar cliente -->
    <div class="modal fade" id="crearClienteModal" tabindex="-1" role="dialog" aria-labelledby="crearClienteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="crearClienteModalLabel">Crear Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <!-- Formulario modal para agregar cliente -->
            <form>
              <div class="form-group">
                <label for="nombreCliente">Nombre:</label>
                <input type="text" class="form-control" id="nombreCliente" placeholder="Ingrese el nombre del cliente">
              </div>
              <div class="form-group">
                <label for="correoCliente">Correo electrónico:</label>
                <input type="email" class="form-control" id="correoCliente" placeholder="Ingrese el correo electrónico del cliente">
              </div>
              <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" placeholder="Ingrese la dirección del cliente">
              </div>
              <div class="form-group">
                <label for="vehiculo">Vehículo:</label>
                <input type="text" class="form-control" id="vehiculo" placeholder="Ingrese el vehículo del cliente">
              </div>
              <!-- Agrega más campos según tus necesidades -->
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" id='guardarClienteBtn' class="btn btn-primary">Guardar</button>
            <input type="text" class="form-control" id="nnn" placeholder="">
           
          </div>
        </div>
      </div>
    </div>
<!-- ========================================================-->
<!-- Ventana modal para agregar cliente -->
<div class="modal fade" id="crearClienteModall" tabindex="-1" role="dialog" aria-labelledby="crearClienteModalLabell" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="crearClienteModalLabel">Actualizar Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Formulario para agregar cliente -->
            <form>
              <div class="form-group">
                <label for="nombreCliente">Nombre:</label>
                <input type="text" class="form-control" id="nombreCliente1" placeholder="Ingrese el nombre del cliente">
              </div>
              <div class="form-group">
                <label for="correoCliente">Correo electrónico:</label>
                <input type="email" class="form-control" id="correoCliente1" placeholder="Ingrese el correo electrónico del cliente">
              </div>
              <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion1" placeholder="Ingrese la dirección del cliente">
              </div>
              <div class="form-group">
                <label for="vehiculo">Vehículo:</label>
                <input type="text" class="form-control" id="vehiculo1" placeholder="Ingrese el vehículo del cliente">
                <input type="hidden" class="form-control" id="id" placeholder="Ingrese el vehículo del cliente">
              </div>
              <!-- Agrega más campos según tus necesidades -->
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" id='guardarClienteBtn1' class="btn btn-primary">Guardar</button>
        
           
          </div>
        </div>
      </div>
    </div>
    <!-- ========================================================-->
     <!-- ========================boton y modal que hace la orden de trabajo================================-->
     <!-- Botón de activación del modal -->


<!-- Ventana modal -->
<div class="modal fade" id="ordenTrabajoModal1" tabindex="-1" role="dialog" aria-labelledby="ordenTrabajoModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ordenTrabajoModalLabel1">Nueva Orden de Trabajo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulario para ingresar información de la orden de trabajo -->
        <form>
          <div class="form-group">
            <label for="titulo">Cliente:</label>
            <input type="text" class="form-control" id="ClienteOm" placeholder="Ingrese el título de la orden de trabajo">
          </div>
          <div class="form-group">
            <label for="titulo">Vehiculo:</label>
            <input type="text" class="form-control" id="VehiculoOm" placeholder="Ingrese la marca del vehiculo de la orden de trabajo">
          </div>
          <div class="form-group">
    <label>Servicios para vehículos:</label><br>
   

          <div class="form-group">
            <label for="fecha">Fecha de inicio:</label>
            <input type="date" class="form-control" id="fechaOm" placeholder="Seleccione la fecha de inicio">
          </div>
          <div class="form-group">
            <label for="fecha">Fecha de Entrega:</label>
            <input type="date" class="form-control" id="fechaEntregaOm" placeholder="Seleccione la fecha de entrega">
          </div>
          <!-- Agregar más campos según sea necesario -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" id="guardarOrdenf" class="btn guardarOrdenf btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</section>
      <!-- ========================================================-->
    

  <section class="container my-3">
   
    <div class="row">
        <div class="col-md-12 mx-auto">
            <ul class="list-group">
                <!-- Aquí se mostrarán los clientes -->
            </ul>
        </div>
    </div>
</section>


  <nav class="bg-light p-4 mt-5">
    <div class="container text-center">
      <a href="inicio.php">Volver a la Página de Inicio</a>
    </div>
  </nav>



    <!-- prueba de modal ---->



<div class="modal fade" id="ordenTrabajoModal" tabindex="-1" role="dialog" aria-labelledby="ordenTrabajoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
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
            <label>Servicios para vehículos:</label><br>
            <div class="checkboxes">
            <div class="checkboxes">
        <div class="form-check">
            <input class="form-check-input" data-precio="2100" type="checkbox" id="cambio_aceite" name="servicio[]" value="Cambio de aceite">
            <label class="form-check-label" for="cambio_aceite">Cambio de aceite - $2100</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" data-precio="700" type="checkbox" id="cambio_filtro_aceite" name="servicio[]" value="Cambio de filtro de aceite">
            <label class="form-check-label" for="cambio_filtro_aceite">Cambio de filtro de aceite - $700</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" data-precio="500" type="checkbox" id="cambio_filtro_aire" name="servicio[]" value="Cambio de filtro de aire">
            <label class="form-check-label" for="cambio_filtro_aire">Cambio de filtro de aire - $500</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" data-precio="1400" type="checkbox" id="cambio_bujias" name="servicio[]" value="Cambio de bujías">
            <label class="form-check-label" for="cambio_bujias">Cambio de bujías - $1400</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" data-precio="650" type="checkbox" id="alineacion_ruedas" name="servicio[]" value="Alineación de ruedas">
            <label class="form-check-label" for="alineacion_ruedas">Alineación de ruedas - $650</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" data-precio="500" type="checkbox" id="balanceo_ruedas" name="servicio[]" value="Balanceo de ruedas">
            <label class="form-check-label" for="balanceo_ruedas">Balanceo de ruedas - $500</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" data-precio="300" type="checkbox" id="revision_luces" name="servicio[]" value="Revisión de luces">
            <label class="form-check-label" for="revision_luces">Revisión de luces - $300</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" data-precio="400" type="checkbox" id="revision_frenos" name="servicio[]" value="Revisión de frenos">
            <label class="form-check-label" for="revision_frenos">Revisión de frenos - $400</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" data-precio="200" type="checkbox" id="revision_suspension" name="servicio[]" value="Revisión de suspensión">
            <label class="form-check-label" for="revision_suspension">Revisión de suspensión - $200</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" data-precio="200" type="checkbox" id="revision_direccion" name="servicio[]" value="Revisión de sistema de dirección">
            <label class="form-check-label" for="revision_direccion">Revisión de sistema de dirección - $200</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" data-precio="800" type="checkbox" id="revision_refrigeracion" name="servicio[]" value="Revisión de sistema de refrigeración">
            <label class="form-check-label" for="revision_refrigeracion">Revisión de sistema de refrigeración - $800</label>
        </div>
      
        
    </div>
</div>

<div class="content">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    </div>
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
        <!-- Div para mostrar el total de los servicios seleccionados -->
        <div class="form-group">
          <b styilo="margin-left:20px;"><label>Total:</label></b>
          <div id="total">$0</div>
        </div>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
      
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" id="guardarOrden" class="btn guardarOrden btn-primary">Guardar</button>
      </div>
      </div>
    </div>
  </div>
</div>

<script>
  // Función para calcular el total de los servicios seleccionados
  function calcularTotalServicios() {
    var total = 0;
    // Obtener todos los elementos checkbox seleccionados
    var checkboxes = document.querySelectorAll('input[name="servicio[]"]:checked');
    checkboxes.forEach(function(checkbox) {
      // Sumar el precio de cada servicio seleccionado
      total += parseInt(checkbox.dataset.precio);
    });
    return total;
  }

  // Función para actualizar el total en el modal
  function actualizarTotal() {
    var total = calcularTotalServicios();
    document.getElementById('total').textContent = "$" + total;
  }

  // Agregar evento change a todos los checkboxes para actualizar el total cuando cambie la selección
  var checkboxes = document.querySelectorAll('input[name="servicio[]"]');
  checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
      actualizarTotal();
    });
  });
</script>





















    
    <!-- prueba de modal ---->



  
 
    <footer>
    <p>Derechos de autor &copy; 2024 Taller de Reparación de Vehículos "Grupo 2"</p>
  </footer>
    <!-- Botón para cerrar sesión -->
  

    <script>
        function cerrarSesion() {
            // Redirigir al usuario a logout.php al hacer clic en el botón
            window.location.href = "destruirsession.php";
        }
    </script>





</body>
</html>


  <!-- Incluir archivos JavaScript de Bootstrap y jQuery -->
  <script src="js/jquery.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/jquery.js"></script>



</body>


</html>

