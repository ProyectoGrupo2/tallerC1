<?php
require 'query.php';

$editar = new Query();
$actualizar = new Usuarios();


    
    //$nombreCliente = $_POST['nombreCliente'];
    //$vehiculo = $_POST['vehiculo'];
    $descriccion = $_POST['descriccion'];
    $fechaReciviada = $_POST['fechaRecivida'];
    $fechaentrega = $_POST['fechaEntrega'];
    $idCliente = $_POST['idCliente'];

    $cambio_aceite = $_POST['cambio_aceite'];
    $cambio_filtro_aceite = $_POST['cambio_filtro_aceite'];
    $cambio_filtro_aire = $_POST['cambio_filtro_aire'];
    $cambio_bujias = $_POST['cambio_bujias'];
    $alineacion_ruedas = $_POST['alineacion_ruedas'];
    $balanceo_ruedas = $_POST['balanceo_ruedas'];
    $revision_luces = $_POST['revision_luces'];
    $revision_frenos = $_POST['revision_frenos'];
    $revision_suspension = $_POST['revision_suspension'];
    $revision_direccion = $_POST['revision_direccion'];
    $revision_refrigeracion = $_POST['revision_refrigeracion'];
    $total = $_POST['total'];

    $actualizar->setDescripcion($descriccion);
    $actualizar->setFechaRecivido($fechaReciviada);
    $actualizar->SetFechaEntrega($fechaentrega);
    $actualizar->setCambioAceite($cambio_aceite);
    $actualizar->setCambioFiltroAceite($cambio_filtro_aceite);
    $actualizar->setCambioFiltroAire($cambio_filtro_aire);
    $actualizar->setCambioBujias($cambio_bujias);
    $actualizar->setAlineacionRuedas($alineacion_ruedas);
    $actualizar->setBalanceoRuedas($balanceo_ruedas);
    $actualizar->setRevisionLuces($revision_luces);
    $actualizar->setRevisionFrenos($revision_frenos);
    $actualizar->setRevisionSuspension($revision_suspension);
    $actualizar->setRevisionDireccion($revision_direccion);
    $actualizar->setRevisionRefrigeracion($revision_refrigeracion);
    $actualizar->setCambioPastillasFreno($cambio_pastillas_freno);
    $actualizar->setCambioDiscosFreno($cambio_discos_freno);
    $actualizar->setCambioAmortiguadores($cambio_amortiguadores);
    $actualizar->setCambioBateria($cambio_bateria);
    $actualizar->setCambioNeumaticos($cambio_neumaticos);
    $actualizar->setRevisionSistemaCombustible($revision_sistema_combustible);
    $actualizar->setRevisionTransmision($revision_transmision);
    $actualizar->setCambioCorreas($cambio_correas);
    $actualizar->setTotal($total);

   
    $editar->agregarOrden($idCliente,$actualizar);
    

 




?>
