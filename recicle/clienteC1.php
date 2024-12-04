<?php
// Realizar la conexión a la base de datos (reemplaza con tus credenciales)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datostaller_reparacion";

try {
    // Crear una nueva conexión utilizando PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Establecer el modo de error de PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparar la consulta SQL para obtener todos los clientes
    $stmt = $conn->query("SELECT * FROM clientes");

    // Mostrar la estructura HTML para la lista de clientes
    echo '<section class="container my-12">';
    echo '<h2 class="text-center mb-4">Listado de Clientes</h2>';
    echo '<div class="row">';
    echo '<div class="col-md-12 mx-auto">';
    echo '<ul class="list-group">';

    // Recorrer los resultados y mostrar cada cliente
    while ($cliente = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<br><li class="list-group-item">';
        echo '<h3 class="">' . $cliente['nombre'] . '</h3>';
        echo '<p><strong>Correo electrónico:</strong> ' . $cliente['correo'] . '</p>';
        echo '<p class="h"><strong>Dirección:</strong> ' . $cliente['direccion'] . '</p>';
        echo '<p><strong>Vehículo:</strong> ' . $cliente['vehiculo'] . '</p>';
   
        echo '<h5 class="">' .$cliente['id']  . '</h5>';
        echo '<button id="crearClienteModall" data-toggle="modal" data-target="#crearClienteModall"  class="btn editar btn-success">Editar</button>';
        echo '<button id="btn-eliminar"  class="btn hola btn-eliminar btn-danger">Eliminar</button>';
        echo '</li>';
    }

    // Cerrar la estructura HTML
    echo '</ul>';
    echo '</div>';
    echo '</div>';
    echo '</section>';
} catch(PDOException $e) {
    // En caso de error, imprimir el mensaje de error
    echo "Error al obtener los clientes: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;
?>
