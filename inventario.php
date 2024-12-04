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
  <title>Inventario - Taller de Reparación de Vehículos</title>
  <link rel="stylesheet" href="styilo/stylo.css">
  <!-- Incluir archivos CSS de Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-9aItFkMmg5zVhfUQTKwuF6m0P3n61%2FbNCb1vhoElq9C6g5oIE0DHEld3B+1fLlt" crossorigin="anonymous">
  <script src="js/jquery.js"></script>
  <script src="js/inventario.js"></script>
</head>
<body>
  <header>
    
  <link rel="stylesheet" href="styilo/stylo.css">
  <style>
    /* Estilos personalizados */
    body {
      background-color: #333;
      color: #fff;
    }
    .card {
      background-color: #000;
      border: 2px solid #fff;
      color: #fff;
    }
    .card-header {
      background-color: #000;
      border-bottom: 2px solid #fff;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
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






</head>
<body>
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
          <h4>   <button  class="btn btn-primary"onclick="cerrarSesion()">Cerrar Sesión</button></h4>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php 
            echo $idUsuario = $_SESSION["correo"];
          
          ?>
  </header>
 <section>
  

  <div class='list-groupInventario'>

  </div>
 
  <div class="text-center mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarRepuestoModal">
      Agregar Repuesto
    </button>
  </div>
</section>

<nav>
<a href="inicio.php">Volver a la Página de Inicio</a>
</nav>

<!-- Modal para agregar repuesto -->
<div class="modal fade" id="agregarRepuestoModal" tabindex="-1" role="dialog" aria-labelledby="agregarRepuestoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="agregarRepuestoModalLabel">Agregar Repuesto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulario para agregar repuesto -->
        <form id="formAgregarRepuesto">
          <div class="form-group">
            <label for="codigoRepuesto">Código:</label>
            <input type="text" class="form-control" id="codigoRepuesto" placeholder="Ingrese el código del repuesto">
          </div>
          <div class="form-group">
            <label for="descripcionRepuesto">Descripción:</label>
            <input type="text" class="form-control" id="descripcionRepuesto" placeholder="Ingrese la descripción del repuesto">
          </div>
          <div class="form-group">
            <label for="cantidadRepuesto">Cantidad:</label>
            <input type="text" class="form-control" id="cantidadRepuesto" placeholder="Ingrese la cantidad del repuesto">
          </div>
          <div class="form-group">
            <label for="precioRepuesto>">Precio Unitario:</label>
            <input type="text" class="form-control" id="precioRepuesto" placeholder="Ingrese el precio unitario del repuesto">
          </div>
          <!-- Agregar más campos según sea necesario -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="inventario">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- actualizar inventario -->

<!-- Botón para abrir el modal -->


<!-- Modal para agregar repuesto -->
<!-- Modal para agregar repuesto -->
<div class="modal fade" id="agregarRepuestoModal" tabindex="-1" role="dialog" aria-labelledby="agregarRepuestoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agregarRepuestoModalLabel">Agregar Repuesto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulario para agregar repuesto -->
        <form id="formAgregarRepuesto">
          <div class="form-group">
            <label for="codigoRepuesto">codigo:</label>
            <input type="text" class="form-control" id="codigoRepuesto1" placeholder="Ingrese el código del repuesto">
          </div>
          <div class="form-group">
            <label for="descripcionRepuesto">Descripción:</label>
            <input type="text" class="form-control" id="descripcionRepuesto1" placeholder="Ingrese la descripción del repuesto">
          </div>
          <div class="form-group">
            <label for="cantidadRepuesto">Cantidad:</label>
            
            <input type="text" class="form-control" id="cantidadRepuesto1" placeholder="Ingrese la cantidad del repuesto">
          </div>
          <div class="form-group">
            <label for="precioRepuesto">Precio Unitario:</label>
            <input type="text" class="form-control" id="precioRepuesto1" placeholder="Ingrese el precio unitario del repuesto">
          </div>
          <!-- Agregar más campos según sea necesario -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary actualizarInventario" id="guardarRepuesto">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script>
  
</script>


<footer>
    <p>Derechos de autor &copy; 2024 Taller de Reparación de Vehículos "Grupo 2"</p>
  </footer>

<!-- Incluir archivos JavaScript de Bootstrap y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>


// $(document).ready(function() {
// $('#inventario').click(guardarRepuesto);
//   function guardarRepuesto() {
//      // Obtener los datos del formulario
//      var codigoRepuesto = $('#codigoRepuesto').val();
//         var descripcionRepuesto = $('#descripcionRepuesto').val();
//         var cantidadRepuesto = $('#cantidadRepuesto').val();
//         var precioRepuesto = $('#precioRepuesto').val();
       

        
//         // var idCliente     = $('#id').val();

//         // Enviar los datos al servidor utilizando AJAX
//         $.ajax({
//             type: 'POST',
//             url: 'inventario1.php', // Archivo PHP para procesar la solicitud
//             data: {
//                 codigoRepuesto: codigoRepuesto,
//                 descripcionRepuesto: descripcionRepuesto,
//                 cantidadRepuesto: cantidadRepuesto,
//                 precioRepuesto: precioRepuesto,
//                 // idCliente:idCliente
//             },
//             success: function (response) {
//                 // Aquí puedes manejar la respuesta del servidor
//                 // Por ejemplo, podrías mostrar un mensaje de éxito o recargar la página para actualizar la lista de clientes
//                 alert('Cliente agregado con éxito');
//                 alert(response);

//                 location.reload(); // Recargar la página

//             },
//             error: function (xhr, status, error) {
//                 // Aquí puedes manejar los errores en caso de que ocurran
//                 alert('Error al agregar el cliente');
//                 console.error(error);
//             }
//         });
//   }

//   ///mostrar agregarInvemtario-?agregarinvemtario
//   function cargarInventario(){

// $.ajax({
//     type:'GET',
//     url:'mostrarInvantario.php',
//     success:function(response){

//         $('.list-groupInventario').html(response);
        
      
//     }

// })
  


 
//  }

//  cargarInventario();

//  ///eliminar inventario
//  $(document).on('click', '.eliminarIneventario', function() {
//     var idCliente = $(this).attr('id').split('_')[1];
    
   

//     $.ajax({  type:'POST',
//             url:'eliminarInventario.php',
//             data:{idCliente:idCliente},
//             success:function(response){

//               alert(response)
//               location.reload();
//             }

            



//     })
// });

// ///dibujar los datos en la ventana modal par aluego actualizarlo
//     $(document).on('click','.actualizarInventario',function(){
//       var idEditar = $(this).attr('id').split('_')[1];
//       alert(idEditar)
   
//     $.ajax({
//       type: 'POST',
//       url: 'actualizarinventario.php',
//       data: { idEditar: idEditar },
//       dataType: 'json',

//       success: function (response) {
//         $('#codigoRepuesto1').val(response.codigo);
//         $('#descripcionRepuesto1').val(response.descripcion);
//         $('#cantidadRepuesto1').val(response.cantidad);
//         $('#precioRepuesto1').val(response.precio_unitario);
//         alert(response.precio_unitario);
//         // $('#id').val(response.id);
//       }
//     });
//     })
// })
</script>
<script>
        function cerrarSesion() {
            // Redirigir al usuario a logout.php al hacer clic en el botón
            window.location.href = "destruirsession.php";
        }
    </script>

</body>
</html>

