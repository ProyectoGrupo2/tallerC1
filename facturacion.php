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
  <title>Facturación - Taller de Reparación de Vehículos</title>
  <link rel="stylesheet" href="styilo/stylo.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-9aItFkMmg5zVhfUQTKwuF6m0P3n61%2FbNCb1vhoElq9C6g5oIE0DHEld3B+1fLlt" crossorigin="anonymous">

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

  <div class="list-group">

  </div>

  

  <nav class="fixed-bottom text-center bg-light py-3">
  <a href="inicio.php">Volver a la Página de Inicio</a>
  </nav>


  <footer>
    <p>Derechos de autor &copy; 2024 Taller de Reparación de Vehículos "Grupo 2"</p>
  </footer>
  <!-- Incluir archivos JavaScript de Bootstrap y jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>

    $(document).ready(function(){

        function cargarFacturas(){
          $.ajax({
            type: 'GET',
            url: 'factura/cargarFacturas.php',
            success: function (response) {
                // Agregar los clientes obtenidos a la lista de clientes que esta en la pagina clientes.php
                $('.list-group').html(response);
                // alert(response)
            },
            error: function (xhr, status, error) {
                // Manejar los errores en caso de que ocurran
                alert('Error al obtener los clientes');
                console.error(error);
            }
        });
        }
        cargarFacturas();


        ///pagar factura

        $(document).on('click','.pagarFactura',function(){

          var idFactura = $(this).attr('id').split('_')[1];
          $.ajax({
            type: 'POST',
            url: 'factura/actualizarTotal.php',
            data: { idFactura: idFactura },

            success: function (response) {

               alert("Pago exitoso");
               location.reload();


            }
        })
        })
    })



        function cerrarSesion() {
            // Redirigir al usuario a logout.php al hacer clic en el botón
            window.location.href = "destruirsession.php";
        }
    </script>
</body>
</html>
