<?php
session_start();
require 'conexion/conexion.php';
require 'usuarios/usuario.php';

class Query {

    function __construct() {  }


    // Método para insertar usuarios en la base de datos
    public function insertarUsuario($objUsuario) 
{
    global $conexion;

    $nombre     = $objUsuario->getNombre();
    $correo     = $objUsuario->getCorreo();
    $direccion  = $objUsuario->getDireccion();
    $vehiculo   = $objUsuario->getVehiculo();
    // Obtener el ID de usuario de la sesión
    $idUsuario = $_SESSION["id"];

    $sql = "INSERT INTO clientes (id_usuario, nombre, correo, direccion, vehiculo) VALUES ('$idUsuario', '$nombre', '$correo', '$direccion', '$vehiculo')";
    mysqli_query($conexion->cone, $sql) or die("Error al insertar usuario: " . mysqli_error($conexion->cone));
}



    ///////////////REGISTRAR USUARIO  UQE VA A FACTURAR OSEA EL EMPLEADO/////////////////////////////
    public function insertarRegistro($objUsuario) {
        global $conexion;
    
        $nombre = $objUsuario->getNombre();
        $correo = $objUsuario->getCorreo();
        $clave = $objUsuario->getClave();
    
        // Verificar si el correo electrónico ya existe en la base de datos
        $sql_check = "SELECT correo FROM usuarios WHERE correo = '$correo'";
        $result_check = mysqli_query($conexion->cone, $sql_check);
    
        if (mysqli_num_rows($result_check) > 0) {
            // El correo electrónico ya está en uso, mostrar mensaje de error o tomar alguna acción apropiada
            echo "El correo electrónico ya está en uso.";
        } else {
            // El correo electrónico no está en uso, proceder con la inserción
            $sql_insert = "INSERT INTO usuarios(nombre, correo, contrasena) VALUES ('$nombre', '$correo', '$clave')";
            mysqli_query($conexion->cone, $sql_insert) or die("Error al insertar usuario: " . mysqli_error($conexion->cone));
        }
    }

    //agregar inventario
    public function agregarinvemtario($objUsuario) {
        global $conexion;
    
        $codigo = $objUsuario->getCodigo();
        $descriccion = $objUsuario->getDescripcionV();
        $cantidad = $objUsuario->getCantidad();
        $precio = $objUsuario->getPrecioUnitario();
    
       
            // El correo electrónico no está en uso, proceder con la inserción
           echo $sql_insert = "INSERT INTO inventario(codigo,descripcion,cantidad,precio_unitario) VALUES ('$codigo', '$descriccion', '$cantidad','$precio')";
            mysqli_query($conexion->cone, $sql_insert) or die("Error al insertar usuario: " . mysqli_error($conexion->cone));
        
    }
    


   
    

    /////agregar orden para cliente,//////
    public function agregarOrden($id,$objUsuario) 
    {

        global $conexion;

        //$nombre     = $objUsuario->getNombre();
        //$vechiculo     = $objUsuario->getVehiculo();

        $descripcion  = $objUsuario->getDescripcion();
        $fechaEntrega   = $objUsuario->getFechaEntrega();
        $fechaRecivida   = $objUsuario->getFecharecivida();
        $cambio_aceite = $objUsuario->getCambioAceite();
        $cambio_filtro_aceite = $objUsuario->getCambioFiltroAceite();
        $cambio_filtro_aire = $objUsuario->getCambioFiltroAire();
        $cambio_bujias = $objUsuario->getCambioBujias();
        $alineacion_ruedas = $objUsuario->getAlineacionRuedas();
        $balanceo_ruedas = $objUsuario->getBalanceoRuedas();
        $revision_luces = $objUsuario->getRevisionLuces();
        $revision_frenos = $objUsuario->getRevisionFrenos();
        $revision_suspension = $objUsuario->getRevisionSuspension();
        $revision_direccion = $objUsuario->getRevisionDireccion();
        $revision_refrigeracion = $objUsuario->getRevisionRefrigeracion();
        $cambio_pastillas_freno = $objUsuario->getCambioPastillasFreno();
        $cambio_discos_freno = $objUsuario->getCambioDiscosFreno();
        $cambio_amortiguadores = $objUsuario->getCambioAmortiguadores();
        $cambio_bateria = $objUsuario->getCambioBateria();
        $cambio_neumaticos = $objUsuario->getCambioNeumaticos();
        $revision_sistema_combustible = $objUsuario->getRevisionSistemaCombustible();
        $revision_transmision = $objUsuario->getRevisionTransmision();
        $cambio_correas = $objUsuario->getCambioCorreas();
        $total = $objUsuario->getTotal();

            //$sql = "INSERT INTO ordenes_trabajo (cliente_id, descripcion, fecha_inicio, fecha_entrega,total,cambio_aceite,cambio_filtro_aceite,cambio_filtro_aire,cambio_bujias) VALUES ('$id', '$descriccion', '$fechaRecivida', '$fechaEntrega','$total')";
            $sql = "INSERT INTO ordenes_trabajo 
            (cliente_id, descripcion, fecha_inicio, fecha_entrega, total,subtotal, cambio_aceite, cambio_filtro_aceite, cambio_filtro_aire, cambio_bujias, alineacion_ruedas, balanceo_ruedas, revision_luces, revision_frenos, revision_suspension, revision_direccion, revision_refrigeracion, cambio_pastillas_freno, cambio_discos_freno, cambio_amortiguadores, cambio_bateria, cambio_neumaticos, revision_sistema_combustible, revision_transmision, cambio_correas) 
            VALUES 
            ('$id', '$descripcion', '$fechaRecivida', '$fechaEntrega', '$total','$total', '$cambio_aceite', '$cambio_filtro_aceite', '$cambio_filtro_aire', '$cambio_bujias', '$alineacion_ruedas', '$balanceo_ruedas', '$revision_luces', '$revision_frenos', '$revision_suspension', '$revision_direccion', '$revision_refrigeracion', '$cambio_pastillas_freno', '$cambio_discos_freno', '$cambio_amortiguadores', '$cambio_bateria', '$cambio_neumaticos', '$revision_sistema_combustible', '$revision_transmision', '$cambio_correas');
            ";
           
            mysqli_query($conexion->cone, $sql) or die("Error al insertar usuario: " . mysqli_error($conexion->cone));
    }



    // Método para actualizar usuarios en la base de datos
    public function actualizarUsuario($objUsuario,$id)
     {

        global $conexion;
      

        $nombre     = $objUsuario->getNombre();
        $correo     = $objUsuario->getCorreo();
        $direccion  = $objUsuario->getDireccion();
        $vehiculo   = $objUsuario->getVehiculo();

            $sql = "UPDATE clientes SET nombre='$nombre', correo='$correo', direccion='$direccion', vehiculo='$vehiculo' WHERE id='$id'";
             mysqli_query($conexion->cone, $sql) or die("Error al actualizar usuario: " . mysqli_error($conexion->cone));
    }

    /////agregar cliente con la orden de trabajo ///////

    // Método para eliminar usuario de la base de datos
    public function eliminarUsuario($id)
     {
        global $conexion;
      
// Suponiendo que $conexion es tu objeto de conexión a la base de datos


// Consulta para eliminar las filas relacionadas en la tabla ordenes_trabajo
$sql_delete_secundaria = "DELETE FROM ordenes_trabajo WHERE cliente_id = '$id'";
mysqli_query($conexion->cone, $sql_delete_secundaria) or die("Error al eliminar las órdenes de trabajo: " . mysqli_error($conexion->cone));

// Consulta para eliminar el cliente en la tabla clientes
$sql = "DELETE FROM clientes WHERE id='$id'";
mysqli_query($conexion->cone, $sql) or die("Error al eliminar el cliente: " . mysqli_error($conexion->cone));

// Mensaje de éxito si todo fue exitoso
echo "Cliente y sus órdenes de trabajo asociadas eliminados correctamente.";

}


/////////eliminarOrden////////////////////////
public function eliminarOrden($id)
{
   global $conexion;
 
// Suponiendo que $conexion es tu objeto de conexión a la base de datos


// Consulta para eliminar las filas relacionadas en la tabla ordenes_trabajo
$sql_delete_secundaria = "DELETE FROM ordenes_trabajo WHERE id = '$id'";
mysqli_query($conexion->cone, $sql_delete_secundaria) or die("Error al eliminar las órdenes de trabajo: " . mysqli_error($conexion->cone));

// Consulta para eliminar el cliente en la tabla clientes
//$sql = "DELETE FROM clientes WHERE id='$id'";
//mysqli_query($conexion->cone, $sql) or die("Error al eliminar el cliente: " . mysqli_error($conexion->cone));

// Mensaje de éxito si todo fue exitoso
echo "orden de trabajo eliminada";

}
   

    //////mossstrarrr

    public function mostrarUsuarios1()
     {
        global $conexion;   
        $idUsuario = $_SESSION["id"];
       
        $sql = "SELECT * FROM clientes where id_usuario = '$idUsuario'";
        $res = mysqli_query($conexion->cone, $sql) or die("Error al mostrar usuarios: " . mysqli_error($conexion->cone));
        $usuarios = array();
    
        // Mostrar la estructura HTML para la lista de clientes
        echo '<section class="container my-12">';
        
        echo '<div class="row">';
        echo '<div class="col-md-12 mx-auto">';
        echo '<ul class="list-group">';
    
        while ($cliente = mysqli_fetch_assoc($res)) {
            $usuarios[] = $cliente;
    
            echo '<br><li class="list-group-item">';
            echo '<h3 class="">' . htmlspecialchars($cliente['nombre']) . '</h3>';
            echo '<p><strong>Correo electrónico:</strong> ' . htmlspecialchars($cliente['correo']) . '</p>';
            echo '<p class="h"><strong>Dirección:</strong> ' . htmlspecialchars($cliente['direccion']) . '</p>';
            echo '<p><strong>Vehículo:</strong> ' . htmlspecialchars($cliente['vehiculo']) . '</p>';
            echo '<h5 class="">' . htmlspecialchars($cliente['id']) . '</h5>';
            // Aquí puedes agregar funcionalidad de edición y eliminación si es necesario
            echo ' <div class="content">';
           echo '<div class="row">';
           echo ' <div class="col-md-4"><button id="guardarClienteBtn1" class="btn editar btn-success" data-toggle="modal" data-target="#crearClienteModall">Editar</button></div>';
           echo ' <div class="col-md-4"><button class="btn hola btn-eliminar btn-danger">Eliminar</button></div>';
           echo ' <div class="col-md-4"><button class="btn AgregarOrden btn-eliminars btn-primary" data-toggle="modal" data-target="#ordenTrabajoModal">Agregar Orden</button></div>';
           echo ' </div>';
           echo '</div>';
            echo '</li>';
        }
    
        echo '</ul>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
    
        return $usuarios;
    } 
    

    //mostrar los inventaios
    public function mostrarInventario()
{
    global $conexion;
    

    $sql = "SELECT * FROM inventario";
    $res = mysqli_query($conexion->cone, $sql) or die("Error al mostrar el inventario: " . mysqli_error($conexion->cone));

    // Mostrar la estructura HTML para la tabla de inventario
    echo '<h2>Inventario de Repuestos</h2>';
    echo '<table class="table table-bordered" style="color:white;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Código</th>';
    echo '<th>Descripción</th>';
    echo '<th>Cantidad</th>';
    echo '<th>Precio Unitario</th>';
    echo '<th>Acciones</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($inventario = mysqli_fetch_assoc($res)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($inventario['codigo']) . '</td>';
        echo '<td>' . htmlspecialchars($inventario['descripcion']) . '</td>';
        echo '<td>' . htmlspecialchars($inventario['cantidad']) . '</td>';
        echo '<td>' . htmlspecialchars($inventario['precio_unitario']) . '</td>';
        echo '<td>';
        // echo '<button class="btn btn-success actualizarInventario" data-toggle="modal" data-target="#agregarRepuestoModal" id="actualizarInevantario_' . htmlspecialchars($inventario['id']) . '">Editar</button>';
        echo '<button class="btn btn-danger eliminarIneventario" id="eliminarInevantario_' . htmlspecialchars($inventario['id']) . '" >Eliminar</button>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}

//eliminar productos de inventarrio
public function eliminarInventario($id)
{
   global $conexion;
 
// Suponiendo que $conexion es tu objeto de conexión a la base de datos


// Consulta para eliminar las filas relacionadas en la tabla ordenes_trabajo
$sql_delete_secundaria = "DELETE FROM inventario WHERE id = '$id'";
mysqli_query($conexion->cone, $sql_delete_secundaria) or die("Error al eliminar las órdenes de trabajo: " . mysqli_error($conexion->cone));

// Consulta para eliminar el cliente en la tabla clientes
//$sql = "DELETE FROM clientes WHERE id='$id'";
//mysqli_query($conexion->cone, $sql) or die("Error al eliminar el cliente: " . mysqli_error($conexion->cone));

// Mensaje de éxito si todo fue exitoso
echo "producto de inventario eliminado";

}


    

    /////////////////mostrar ordenes de trabajo////
    public function MostrarOrdentrabajo()
    {
       global $conexion; 
       $idUsuario = $_SESSION["id"];  
      
   // $sql1 = "SELECT c.nombre AS nombre_cliente, c.correo, c.direccion, c.vehiculo,
     //  ot.id AS id_orden, ot.descripcion, ot.fecha_inicio, ot.fecha_entrega
//FROM clientes c
//JOIN ordenes_trabajo ot ON c.id = ot.cliente_id";

$sql1 = "SELECT 
c.nombre AS nombre_cliente, 
c.correo, 
c.direccion, 
c.vehiculo,
ot.id AS id_orden, 
cliente_id,
ot.descripcion, 
ot.fecha_inicio, 
ot.fecha_entrega,
ot.total,
ot.cambio_aceite,
ot.cambio_filtro_aceite,
ot.cambio_filtro_aire,
ot.cambio_bujias,
ot.alineacion_ruedas,
ot.balanceo_ruedas,
ot.revision_luces,
ot.revision_frenos,
ot.revision_suspension,
ot.revision_direccion,
ot.revision_refrigeracion,
ot.cambio_pastillas_freno,
ot.cambio_discos_freno,
ot.cambio_amortiguadores,
ot.cambio_bateria,
ot.cambio_neumaticos,
ot.revision_sistema_combustible,
ot.revision_transmision,
ot.cambio_correas
FROM 
clientes c
JOIN 
ordenes_trabajo ot ON c.id = ot.cliente_id where id_usuario = '$idUsuario'";




       //$sql = "SELECT * FROM clientes";
       $res = mysqli_query($conexion->cone, $sql1) or die("Error al mostrar usuarios: " . mysqli_error($conexion->cone));
       $usuarios = array();
   
       // Mostrar la estructura HTML para la lista de clientes
       echo '<section class="container my-12">';
       echo '<h2 class="text-center mb-4">Listado de Clientes</h2>';
       echo '<div class="row">';
       echo '<div class="col-md-12 mx-auto">';
       echo '<ul class="list-group1">';
   
       while ($cliente = mysqli_fetch_assoc($res)) {
           $usuarios[] = $cliente;

         
        
           
           
           echo '<br><li class="list-group-item">';
           echo '<h3 class="">' . htmlspecialchars($cliente['nombre']) . '</h3>';
            echo '<p id="clienteNombre"><strong>Cliente:</strong> ' . htmlspecialchars($cliente['nombre_cliente']) . '</p>';
           echo '<p><strong>Vehiculo:</strong> ' . htmlspecialchars($cliente['vehiculo']) . '</p>';
           echo '<p class="h"><strong>Servicios Agregados a la orden:</strong> ' . htmlspecialchars($cliente['descripcion']) . '</p>';
           echo '<p ><strong >Cambio Aceite:---------------------------------------------------------</strong> ' . htmlspecialchars($cliente['cambio_aceite']) . '</p>';
           echo '<p><strong>Cambio Filtro Aceite:--------------------------------------------------</strong> ' . htmlspecialchars($cliente['cambio_filtro_aceite']) . '</p>';
           echo '<p><strong>Cambio Filtro Aire:----------------------------------------------------</strong> ' . htmlspecialchars($cliente['cambio_filtro_aire']) . '</p>';
           echo '<p id="hk1"><strong>Cambio Bujias:---------------------------------------------------------</strong> ' . htmlspecialchars($cliente['cambio_bujias']) . '</p>';
           echo '<p><strong>Alineacion Ruedas:-----------------------------------------------------</strong> ' . htmlspecialchars($cliente['balanceo_ruedas']) . '</p>';
           echo '<p><strong>Revision luces:--------------------------------------------------------</strong> ' . htmlspecialchars($cliente['revision_luces']) . '</p>';
           echo '<p><strong>Revision Frenos:-------------------------------------------------------</strong> ' . htmlspecialchars($cliente['revision_frenos']) . '</p>';
           echo '<p><strong>Revision Susencion:----------------------------------------------------</strong> ' . htmlspecialchars($cliente['revision_suspension']) . '</p>';
           echo '<p><strong>Revicion Direccion:----------------------------------------------------</strong> ' . htmlspecialchars($cliente['revision_direccion']) . '</p>';
           echo '<p><strong  >Revicion Refrigeracion:------------------------------------------------</strong> ' . htmlspecialchars($cliente['revision_refrigeracion']) . '</p>';
         
         
          
           
  
           

          // echo'<a href="" id="hk">'. htmlspecialchars($cliente['cambio_bujias']) .'</a>';
          
           
          
           

           echo '<p><strong>fecha_inicio:</strong> ' . htmlspecialchars($cliente['fecha_inicio']) . '</p>';
           echo '<p><strong>fecha_entrega:</strong> ' . htmlspecialchars($cliente['fecha_entrega']) . '</p>';
           echo ' <hr style="color:black;">';
           echo '<p><strong><h5>TOTAL:</h5></strong> ' . htmlspecialchars($cliente['total']) . '</p>';
           echo '<h5 class="">' . htmlspecialchars($cliente['id']) . '</h5>';
           // Aquí puedes agregar funcionalidad de edición y eliminación si es necesario
           echo ' <hr style="color:black;">';
           echo ' <div class="content">';
          echo '<div class="row">';
          echo ' <div class="col-md-2"></div>';          
        //   echo ' <div class="col-md-2"><button id=" " class="btn  btn-success"  data-toggle="modal" data-target="#ordenTrabajoModal12">Editar</button></div>';
          echo '<button id="eliminarOrden_' . htmlspecialchars($cliente['id_orden']) . '" class="btn eliminarOrden btn-eliminar btn-danger">Eliminar</button>';

          echo ' <div class="col-md-3"></button></div>';
          echo ' <div class="col-md-2"></div>';  
          echo ' </div>';
          echo '</div>';
           echo '</li>';
       }
   
       echo '</ul>';
       echo '</div>';
       echo '</div>';
       echo '</section>';
   
       return $usuarios;
   } 


   ////cargar facturas
   
  
    



   public function mostrarfacturas(){
    global $conexion;
    $idUsuario = $_SESSION["id"]; 

    // Consulta SQL para obtener los datos de las facturas y los detalles de las órdenes de trabajo y clientes asociados
    $sql = "SELECT 
                ot.id AS id_orden_trabajo,
                ot.fecha_inicio,
                ot.fecha_entrega,
                ot.total,
                c.nombre AS nombre_cliente
            FROM 
                ordenes_trabajo ot
            LEFT JOIN 
                clientes c ON ot.cliente_id = c.id where id_usuario='$idUsuario'";

    $res = mysqli_query($conexion->cone, $sql) or die("Error al mostrar las facturas: " . mysqli_error($conexion->cone));

    // Mostrar la estructura HTML para la lista de facturas
    echo '<section class="container">';
    echo '<div class="row">';
    echo '<div class="col-md-8 mx-auto">';
    echo '<h2 class="mb-4">Lista de Facturas</h2>';
    echo '<ul class="list-unstyled">';

    while ($factura = mysqli_fetch_assoc($res)) {
        echo '<li class="media border-bottom py-3">';
        echo '<div class="media-body">';
        echo '<h3 class="mt-0 mb-1">Factura #' . htmlspecialchars($factura['id_orden_trabajo']) . '</h3>';
        echo '<p><strong>Cliente:</strong> ' . htmlspecialchars($factura['nombre_cliente']) . '</p>';
        echo '<p><strong>Fecha Inicio:</strong> ' . htmlspecialchars($factura['fecha_inicio']) . '</p>';
        echo '<p><strong>Fecha Entrega:</strong> ' . htmlspecialchars($factura['fecha_entrega']) . '</p>';
        echo '<p><strong>Total:</strong> ';

        // Agregar estilos condicionales basados en el estado de la factura
        if ($factura['total'] > 0) {
            echo '<span class="text-danger font-weight-bold">' . htmlspecialchars($factura['total']) . '</span>';
        } else {
            echo '<span class="text-success font-weight-bold">' . htmlspecialchars($factura['total']) . '</span>';
        }

        echo '</p>';

        // Agregar lógica para determinar si la factura está pendiente de cobro o pagada
        if ($factura['total'] > 0) {
            echo '<p><strong>Estado:</strong> <span class="text-danger font-weight-bold">Pendiente Cobrar</span></p>';
        } else {
            echo '<p><strong>Estado:</strong> <span class="text-success font-weight-bold">Pagada</span></p>';
        }
        echo '<button type="button" class="btn btn-primary pagarFactura"  id="factura_' . htmlspecialchars($factura['id_orden_trabajo']) . '">Recibir Pago Factura</button>';
        echo '</div>';
        echo '</li>';

        // Modal para pagar la factura
        echo '<div class="modal fade" id="facturaModall_' . htmlspecialchars($factura['id_orden_trabajo']) . '" tabindex="-1" role="dialog" aria-labelledby="facturaModalLabel_' . htmlspecialchars($factura['id_orden_trabajo']) . '" aria-hidden="true">';
        echo '<div class="modal-dialog" role="document">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<h5 class="modal-title" id="facturaModalLabel_' . htmlspecialchars($factura['id_orden_trabajo']) . '">Recibir Pago de Factura</h5>';
        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
        echo '<div class="modal-body">';
        echo '<p>Aquí puedes añadir los campos y el formulario para recibir el pago de la factura.</p>';
        echo '</div>';
        echo '<div class="modal-footer">';
        // echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

    }

    echo '</ul>';
    echo '</div>';
    echo '</div>';
    echo '</section>';
}


// /actualizar total

public function actualizarTotal($id)
     {

        global $conexion;
      

      
      

            $sql = "UPDATE ordenes_trabajo SET total=0 WHERE id='$id'";
             mysqli_query($conexion->cone, $sql) or die("Error al actualizar usuario: " . mysqli_error($conexion->cone));
    }





}







?>