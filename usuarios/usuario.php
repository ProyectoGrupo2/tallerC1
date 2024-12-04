<?php 
 //require 'conexion.php';
 /**
  * 
  */
 class Usuarios
 {
 	 public $nombre;

     public $clave;
	 public $descriccion;
	 public $fechaentrega;
	 public $fechaReciviada;
 	 public $correo;
	  public $direccion;
 	 public $vehiculo;
	 
	  public $cambioAceite;
	  public $cambioFiltroAceite;
	  public $cambioFiltroAire;
	  public $cambioBujias;
	  public $alineacionRuedas;
	  public $balanceoRuedas;
	  public $revisionLuces;
	  public $revisionFrenos;
	  public $revisionSuspension;
	  public $revisionDireccion;
	  public $revisionRefrigeracion;
	  public $cambioPastillasFreno;
	  public $cambioDiscosFreno;
	  public $cambioAmortiguadores;
	  public $cambioBateria;
	  public $cambioNeumaticos;
	  public $revisionSistemaCombustible;
	  public $revisionTransmision;
	  public $cambioCorreas;
	  public $total;

      //inventario
      public $codigo;
      public $descripcion;
      public $cantidad;
      public $preciounitario;
      
 	

 	function __construct()
 	{
 		
 	}

    // set paara inventario
    public function setCodigo($valor){$this->codigo = $valor;   }
    public function setDescripcionV($valor){$this->descripcion = $valor;}

    public function setCantidad($valor){$this->cantidad = $valor;}

    public function setPrecioUnitario($valor){$this->preciounitario = $valor;}

    ///get para inventario
    public function getCodigo(){ return $this->codigo;}
    public function getDescripcionV(){ return $this->descripcion;}

    public function getCantidad(){return  $this->cantidad;}

    public function getPrecioUnitario(){return $this->preciounitario;}



//metdos para obtener valores de usuarios
 	public function setNombre($valor){ $this->nombre = $valor;	}
     public function setClave($valor){ $this->clave = $valor;	}

 	public function setDescripcion($valor){ $this->descriccion = $valor;	}
	 public function setFechaRecivido($valor){ $this->fechaReciviada = $valor;	}
	 public function SetFechaEntrega($valor){ $this->fechaentrega = $valor;	}
	 public function setCorreo($valor){ $this->correo = $valor;	}
	 public function setDireccion($valor){ $this->direccion = $valor;	}

 	public function setVehiculo($valor){ $this->vehiculo = $valor;	}
	 public function setCambioAceite($valor) {
        $this->cambioAceite = $valor;
    }

    public function setCambioFiltroAceite($valor) {
        $this->cambioFiltroAceite = $valor;
    }

    public function setCambioFiltroAire($valor) {
        $this->cambioFiltroAire = $valor;
    }

    public function setCambioBujias($valor) {
        $this->cambioBujias = $valor;
    }

    public function setAlineacionRuedas($valor) {
        $this->alineacionRuedas = $valor;
    }

    public function setBalanceoRuedas($valor) {
        $this->balanceoRuedas = $valor;
    }

    public function setRevisionLuces($valor) {
        $this->revisionLuces = $valor;
    }

    public function setRevisionFrenos($valor) {
        $this->revisionFrenos = $valor;
    }

    public function setRevisionSuspension($valor) {
        $this->revisionSuspension = $valor;
    }

    public function setRevisionDireccion($valor) {
        $this->revisionDireccion = $valor;
    }

    public function setRevisionRefrigeracion($valor) {
        $this->revisionRefrigeracion = $valor;
    }

    public function setCambioPastillasFreno($valor) {
        $this->cambioPastillasFreno = $valor;
    }

    public function setCambioDiscosFreno($valor) {
        $this->cambioDiscosFreno = $valor;
    }

    public function setCambioAmortiguadores($valor) {
        $this->cambioAmortiguadores = $valor;
    }

    public function setCambioBateria($valor) {
        $this->cambioBateria = $valor;
    }

    public function setCambioNeumaticos($valor) {
        $this->cambioNeumaticos = $valor;
    }

    public function setRevisionSistemaCombustible($valor) {
        $this->revisionSistemaCombustible = $valor;
    }

    public function setRevisionTransmision($valor) {
        $this->revisionTransmision = $valor;
    }

    public function setCambioCorreas($valor) {
        $this->cambioCorreas = $valor;
    }

    public function setTotal($valor) {
        $this->total = $valor;
    }


	//////get
//metodos para devolver valores
 	public function getNombre(){ return $this->nombre; }
     public function getClave(){ return $this->clave; }

	 public function getDescripcion(){ return $this->descriccion; }
	 public function getFechaEntrega(){ return $this->fechaentrega; }
	 public function getFecharecivida(){ return $this->fechaReciviada; }

 	public function getCorreo(){ return $this->correo; }
	 public function getDireccion(){ return $this->direccion; }

 	public function getVehiculo(){ return $this->vehiculo; }

	 public function getCambioAceite() {
        return $this->cambioAceite;
    }

    public function getCambioFiltroAceite() {
        return $this->cambioFiltroAceite;
    }

    public function getCambioFiltroAire() {
        return $this->cambioFiltroAire;
    }

    public function getCambioBujias() {
        return $this->cambioBujias;
    }

    public function getAlineacionRuedas() {
        return $this->alineacionRuedas;
    }

    public function getBalanceoRuedas() {
        return $this->balanceoRuedas;
    }

    public function getRevisionLuces() {
        return $this->revisionLuces;
    }

    public function getRevisionFrenos() {
        return $this->revisionFrenos;
    }

    public function getRevisionSuspension() {
        return $this->revisionSuspension;
    }

    public function getRevisionDireccion() {
        return $this->revisionDireccion;
    }

    public function getRevisionRefrigeracion() {
        return $this->revisionRefrigeracion;
    }

    public function getCambioPastillasFreno() {
        return $this->cambioPastillasFreno;
    }

    public function getCambioDiscosFreno() {
        return $this->cambioDiscosFreno;
    }

    public function getCambioAmortiguadores() {
        return $this->cambioAmortiguadores;
    }

    public function getCambioBateria() {
        return $this->cambioBateria;
    }

    public function getCambioNeumaticos() {
        return $this->cambioNeumaticos;
    }

    public function getRevisionSistemaCombustible() {
        return $this->revisionSistemaCombustible;
    }

    public function getRevisionTransmision() {
        return $this->revisionTransmision;
    }

    public function getCambioCorreas() {
        return $this->cambioCorreas;
    }

    public function getTotal() {
        return $this->total;
    }
 	



 }

 ?>