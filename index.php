
<?php
// Iniciar sesión si no está iniciada
session_start();

// Verificar si la sesión está iniciada
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    // Si la sesión está iniciada, redirigir al usuario a otra página
    header("location: clientes.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Registro y Inicio de Sesión</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-9aItFkMmg5zVhfUQTKwuF6m0P3n61%2FbNCb1vhoElq9C6g5oIE0DHEld3B+1fLlt" crossorigin="anonymous">
<script src="js/jquery.js"></script>
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
        </ul>
      </div>
    </div>
  </nav>


<hr>
  <div class="container">
    <div class="row mt-5">
      <!-- Pantalla de Registro -->
      <div class="col-md-6">
        <div id="registroForm" class="card">
          <div class="card-header">
            Registro
          </div>
          <div class="card-body">
            <form id="formRegistro">
              <div class="form-group">
                <label for="registroNombre">Nombre:</label>
                <input type="text" class="form-control" id="registroNombre"  required>
                <label for="" style="color:red;" id="nombreError"></label>
              </div>
              <div class="form-group">
                <label for="registroEmail">Correo electrónico:</label>
                <input type="email" class="form-control" id="registroEmail" required>
                <label for="" style="color:red;" id="emailError"></label>
              </div>
              <div class="form-group">
                <label for="registroPassword">Contraseña:</label>
                <input type="password" class="form-control" id="registroPassword" required>
                <label for="" style="color:red;" id="claveError"></label>
              </div>
              <button type="submit" class="btn registrarse btn-primary">Registrarse</button>
            </form>
          </div>
        </div>
      </div>
      <!-- Pantalla de Inicio de Sesión -->
      <div class="col-md-6">
        <div id="loginForm" class="card">
          <div class="card-header">
            Iniciar Sesión
          </div>
          <div class="card-body">
            <form id="formLogin">
              <div class="form-group">
                <label for="loginEmail">Correo electrónico:</label>
                <input type="email" class="form-control" id="loginEmail" required>
              </div>
              <div class="form-group">
                <label for="loginPassword">Contraseña:</label>
                <input type="password" class="form-control" id="loginPassword" required >
              </div>
              <button type="submit" class="btn sessioLo btn-primary">Iniciar Sesión</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- <footer>
    <p>Derechos de autor &copy; 2024 Taller de Reparación de Vehículos "Grupo 2"</p>
  </footer> -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="js/jquery.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Aquí puedes incluir tu propio script para manejar el registro y el inicio de sesión -->



  <Script>

$(document).ready(function(){

  $(document).on('click', '.registrarse', function() {
    // Obtener los valores de los campos
    var nombre = $('#registroNombre').val();
    var email = $('#registroEmail').val();
    var registroPassword = $('#registroPassword').val();

    // Verificar si los campos están vacíos
    if (nombre === "" || email === "" || registroPassword === "") {
        // Mostrar un mensaje de error indicando que no pueden haber campos vacíos
        alert("No pueden haber campos vacíos");
    } else {
        // Si los campos no están vacíos, enviar la solicitud AJAX
        $.ajax({
            type: 'POST',
            url: 'registro.php',
            data: {
                nombre: nombre,
                email: email,
                registroPassword: registroPassword
            },
            success: function(response) {
                alert(response);
            }
        });
    }
});


$(document).on('click', '.sessioLo', function() {
    var correo = $('#loginEmail').val();
    var clave = $('#loginPassword').val();

    $.ajax({
        type: 'POST',
        url: 'login.php',
        data: { correo: correo, clave: clave },
        success: function(response) {
            if (response === "success") {
                // Redireccionar a la página de inicio después del inicio de sesión exitoso
                window.location.href = 'inicio.php';
            } else {
                // Mostrar mensaje de error si el inicio de sesión falló
                alert(response);
            }
        },
        error: function(xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });
});







});
  </Script>
</body>
</html>
