<?php

require 'query.php';
// Verificar si el correo electrónico está disponible
$email = $_POST['email'];
$nombre = $_POST['nombre'];
$clave = $_POST['registroPassword'];

$agregarRegistro = new Query();
$usuario = new Usuarios();


$usuario->setNombre($nombre);
$usuario->setCorreo($email);
$usuario->setClave($clave);

  echo json_encode($agregarRegistro->insertarRegistro($usuario));



?>
