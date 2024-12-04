<?php
// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombreCliente = $_POST['nombreCliente'];
    $correoCliente = $_POST['correoCliente'];
    $direccion = $_POST['direccion'];
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

        // Preparar la consulta SQL para insertar un nuevo cliente
        $stmt = $conn->prepare("INSERT INTO clientes (nombre, correo, direccion, vehiculo) VALUES (:nombre, :correo, :direccion, :vehiculo)");

        // Asignar los valores a los parámetros de la consulta
        $stmt->bindParam(':nombre', $nombreCliente);
        $stmt->bindParam(':correo', $correoCliente);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':vehiculo', $vehiculo);

        // Ejecutar la consulta
        $stmt->execute();

        // Redirigir a la página de listado de clientes
        header("Location: clientes.php");
        exit(); // Terminar la ejecución del script después de la redirección
    } catch(PDOException $e) {
        // En caso de error, imprimir el mensaje de error
        echo "Error al agregar el cliente: " . $e->getMessage();
    }

    // Cerrar la conexión
    $conn = null;
} else {
    // Si no se recibieron datos del formulario, mostrar un mensaje de error
    echo "Error: No se recibieron datos del formulario.";
}
?>
 




 