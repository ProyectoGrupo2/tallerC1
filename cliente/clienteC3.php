<?php
// Verificar si se recibió el ID del cliente a editar
if (isset($_POST['idEditar'])) {
    $editar = $_POST['idEditar'];
    
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

        // Preparar la consulta SQL para obtener los detalles del cliente
        $stmt = $conn->prepare("SELECT * FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $editar);
        $stmt->execute();
        
        // Obtener los detalles del cliente
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        // Devolver los detalles del cliente en formato JSON
        echo json_encode($cliente);
        
    } catch(PDOException $e) {
        // En caso de error, imprimir el mensaje de error
        echo json_encode(array('error' => "Error al obtener los detalles del cliente: " . $e->getMessage()));
    }

    // Cerrar la conexión
    $conn = null;
}
?>
