<?php
// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $clienteId = $_POST['idCliente'];
    $nombreCliente = $_POST['nombreCliente'];
    $correoCliente = $_POST['correoCliente'];
    $vehiculo = $_POST['vehiculo'];

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

        // Preparar la consulta SQL para actualizar los datos del cliente
        $stmt = $conn->prepare("UPDATE clientes SET nombre = :nombre, correo = :correo, vehiculo = :vehiculo WHERE id = :id");
        // Asignar los valores a los parámetros de la consulta
        $stmt->bindParam(':nombre', $nombreCliente);
        $stmt->bindParam(':correo', $correoCliente);
        $stmt->bindParam(':vehiculo', $vehiculo);
        $stmt->bindParam(':id', $clienteId);
        // Ejecutar la consulta
        $stmt->execute();

        // Responder con un mensaje de éxito
        echo "Datos del cliente actualizados correctamente";
    } catch(PDOException $e) {
        // En caso de error, imprimir el mensaje de error
        echo "Error al actualizar los datos del cliente: " . $e->getMessage();
    }

    // Cerrar la conexión
    $conn = null;
} else {
    // Si no se recibieron datos del formulario, mostrar un mensaje de error
    echo "Error: No se recibieron datos del formulario.";
}
?>
