<?php
// Iniciar sesión si no está iniciada
session_start();

// Datos de conexión a la base de datos
$host = "localhost";
$usuario_bd = "root";
$contrasena_bd = "";
$nombre_bd = "datostaller_reparacion";

// Establecer conexión a la base de datos
$conexion = mysqli_connect($host, $usuario_bd, $contrasena_bd, $nombre_bd);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar si se reciben los datos del formulario
if (isset($_POST['correo']) && isset($_POST['clave'])) {
    // Obtener los datos del formulario
     $correo = $_POST['correo'];
     $clave = $_POST['clave'];

    // Escapar caracteres especiales para evitar inyección SQL
    $correo = mysqli_real_escape_string($conexion, $correo);

    // Consultar la base de datos para obtener los datos del usuario
   $sql = "SELECT id, nombre, correo, contrasena FROM usuarios WHERE correo = '$correo' && contrasena='$clave'";
    $result = mysqli_query($conexion, $sql);

    // Verificar si se encontró un usuario con el correo electrónico proporcionado
    if (mysqli_num_rows($result) == 1) {
        // Obtener los datos del usuario
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row["contrasena"];

        // Verificar si la contraseña proporcionada coincide con la contraseña almacenada
        if (!password_verify($clave, $hashed_password)) {
            // Inicio de sesión exitoso, guardar información del usuario en sesión
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $row["id"];
          $_SESSION["nombre"] = $row["nombre"];
            $_SESSION["correo"] = $row["correo"];

            // Devolver mensaje de éxito
            echo "success";
        } else {
            // La contraseña es incorrecta
            echo "La contraseña es incorrecta.";
        }
    } else {
        // No se encontró un usuario con el correo electrónico proporcionado
        echo "El correo electrónico no está registrado.";
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
