<?php
// Verificar si se recibió el ID del cliente a eliminar
if (isset($_POST['idCliente'])) {
    $idCliente = $_POST['idCliente'];

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

        // Preparar la consulta SQL para eliminar el cliente
        $stmt = $conn->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $idCliente);
        // Ejecutar la consulta
        $stmt->execute();
    } catch(PDOException $e) {
        // En caso de error, imprimir el mensaje de error
        echo "Error al eliminar el cliente: " . $e->getMessage();
    }

    // Cerrar la conexión
    $conn = null;
}
?>
