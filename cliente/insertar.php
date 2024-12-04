<?php
require '../query.php';


$query = new Query();
$clientes = new Usuarios();

$nombreCliente = $_POST['nombreCliente'];
$correoCliente = $_POST['correoCliente'];
$direccion = $_POST['direccion'];
$vehiculo = $_POST['vehiculo'];

$clientes->setNombre($nombreCliente);
$clientes->setCorreo($correoCliente);
$clientes->setDireccion($direccion);
$clientes->setVehiculo($vehiculo);
$query->insertarUsuario($clientes);

echo "Exito al agregar";




?>
