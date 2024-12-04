<?php 

error_reporting(0);

/**
 * 
 */
class Conexion
{
	 public $cone;

	function __construct()
	{
		$host   = "localhost";
		$user   = "root";
		$pass   = "";
		$Db_n   = "datostaller_reparacion";
        
        $this->cone = mysqli_connect( $host,$user,$pass,$Db_n) or die(" Error al conetar con la base de datos");
	}
}

$conexion = new Conexion();

?>