<?php
require '../query.php';


$idCliente = $_POST['idCliente'];

$eliminar = new Query();

$eliminar->eliminarUsuario($idCliente);





?>