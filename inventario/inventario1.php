<?php
 
 require '../query.php';

 $agregarInvemtario = new Query();
 $usuario = new Usuarios();


  $codigoRepuesto = $_POST['codigoRepuesto'];
  $descripcionRepuesto = $_POST['descripcionRepuesto'];
  $cantidadRepuesto = $_POST['cantidadRepuesto'];
  $precioRepuesto = $_POST['precioRepuesto'];

 $usuario->setCodigo($codigoRepuesto);
 $usuario->setDescripcionV($descripcionRepuesto);
 $usuario->setCantidad($cantidadRepuesto);
 $usuario->setPrecioUnitario($precioRepuesto);

  $agregarInvemtario->agregarinvemtario($usuario);

 



?>