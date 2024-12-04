<?php

require '../query.php';

$queryEliminar = new Query();

$id_eliminar = $_POST['idCliente'];

$queryEliminar->eliminarOrden($id_eliminar);





?>