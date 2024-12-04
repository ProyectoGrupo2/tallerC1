<?php
require '../query.php';

$editar = new Query();
$actualizar = new Usuarios();

    $direccion = $_POST['direccion'];
    $nombreCliente = $_POST['nombreCliente'];
    $correoCliente = $_POST['correoCliente'];
    $vehiculo = $_POST['vehiculo'];
    $idCliente = $_POST['idCliente'];

    $actualizar->setNombre($nombreCliente);
    $actualizar->setCorreo($correoCliente);
    $actualizar->setDireccion($direccion);
    $actualizar->setVehiculo($vehiculo);
    

 echo $editar->actualizarUsuario($actualizar,$idCliente);





?>
