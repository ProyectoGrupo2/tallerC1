<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Taller de Reparación de Vehículos</title>
  <link rel="stylesheet" href="styilo/stylo.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-9aItFkMmg5zVhfUQTKwuF6m0P3n61%2FbNCb1vhoElq9C6g5oIE0DHEld3B+1fLlt" crossorigin="anonymous">

</head>
<body>
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
  <nav class="navbar navbar-expand-lg navbar-dark" style='border-bottom: 1px solid  black;'>
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
  <br>
  <div class="gallery-container">
        <div class="gallery-item">
            <img src="img/carro1.jpg" alt="Imagen 1">
        </div>
        <div class="gallery-item">
            <img src="img/carro2.jpg">
        </div>
        <div class="gallery-item">
            <img src="img/carros3.jpg" alt="Imagen 3">
        </div>
        <div class="gallery-item">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/AIfHvHPwack" frameborder="0" allowfullscreen></iframe>
</div>

    </div>
  
<hr>
<br>
    <style>
      .gallery-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
}

.gallery-item {
    margin: 10px;
}

.gallery-item img {
    max-width: 700px;
    max-height: 500px;
}

    </style>
  <footer>
    <p>Derechos de autor &copy; 2024 Taller de Reparación de Vehículos "Grupo 2"</p>
  </footer>
  <script>
        function cerrarSesion() {
            // Redirigir al usuario a logout.php al hacer clic en el botón
            window.location.href = "destruirsession.php";
        }
    </script>

</body>
</html>




