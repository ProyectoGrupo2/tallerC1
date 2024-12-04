<?php
require '../query.php';

$idTotal  = $_POST['idFactura'];

$mostrarFacturas = new Query();


$mostrarFacturas->actualizarTotal($idTotal);






?>