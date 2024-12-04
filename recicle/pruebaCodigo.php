<?php
class Database {
    // Propiedades para almacenar la información de la conexión
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "datostaller_reparacion";
    private $conn;

    // Variable estática para almacenar la única instancia de la clase
    private static $instance;

    // Constructor privado para evitar que se pueda instanciar la clase directamente
    private function __construct() {}

    // Método estático para obtener la instancia de la clase (implementación del patrón Singleton)
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Método para realizar la conexión a la base de datos
    public function connect() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
        return $this->conn;
    }

    // Método para agregar un nuevo cliente a la base de datos
    public function agregarCliente($nombre, $correo, $direccion, $vehiculo) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO clientes (nombre, correo, direccion, vehiculo) VALUES (:nombre, :correo, :direccion, :vehiculo)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':vehiculo', $vehiculo);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Error al agregar el cliente: " . $e->getMessage();
            return false;
        }
    }
}

// Uso de la clase Database y el patrón Singleton para agregar un cliente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombreCliente = $_POST['nombreCliente'];
    $correoCliente = $_POST['correoCliente'];
    $direccion = $_POST['direccion'];
    $vehiculo = $_POST['vehiculo'];

    // Obtener la instancia de la clase Database
    $db = Database::getInstance();

    // Realizar la conexión a la base de datos
    $conn = $db->connect();

    // Agregar el cliente utilizando el método de la clase
    if ($conn && $db->agregarCliente($nombreCliente, $correoCliente, $direccion, $vehiculo)) {
        header("Location: clientes.php");
        exit();
    } else {
        echo "Error al agregar el cliente.";
    }
} else {
    echo "Error: No se recibieron datos del formulario.";
}
?>
