<?php
require '../query.php';

$eliminarInventario = new Query();

$id_eliminar = $_POST['idCliente'];

echo $eliminarInventario->eliminarInventario($id_eliminar);





?>