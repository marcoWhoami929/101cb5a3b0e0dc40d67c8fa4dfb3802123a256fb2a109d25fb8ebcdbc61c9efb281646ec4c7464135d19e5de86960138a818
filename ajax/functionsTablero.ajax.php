<?php
session_start();
error_reporting(E_ALL);
require_once("../controladores/inventarios.php");
require_once("../modelos/inventarios.php");
class functionsTablero{
	/*
	 *OBTENER DATOS PARA CAMBIAR EL COLOR DEL SEMAFORO ALM GRAL
	 */
	public $almacenGR1;
	public function statusSemaforoGr(){

		$table = $this->almacenGR1;
		$fechaActual = "2020-08-05";
        $fechaFinal = date("Y-m-d", strtotime($fechaActual)); 

		$tabla = "productos AS p INNER JOIN ".$table." AS al ON p.id = al.idProducto";
		$campos = "SUM(al.entradasUnidades) AS entradas,SUM(salidasUnidades) AS salidas, SUM(existenciasUnidades) AS existencias, SUM(al.ultimoCosto) AS ultimoCosto";
		$parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = (SELECT MAX(al.idImportacion) FROM ".$table." AS al) AND al.fecha = '".$fechaFinal."'";

		$respuesta = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla,$campos,$parametros);

		echo json_encode($respuesta);

	}

	public $almacenSM;
	public function statusSemaforoSM(){

		$table = $this->almacenSM;
		$fechaActual = "2020-08-05";
        $fechaFinal = date("Y-m-d", strtotime($fechaActual)); 

		$tabla = "productos AS p INNER JOIN ".$table." AS al ON p.id = al.idProducto";
		$campos = "SUM(al.entradasUnidades) AS entradas,SUM(salidasUnidades) AS salidas, SUM(existenciasUnidades) AS existencias, SUM(al.ultimoCosto) AS ultimoCosto";
		$parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = (SELECT MAX(al.idImportacion) FROM ".$table." AS al) AND al.fecha = '".$fechaFinal."'";

		$respuesta = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla,$campos,$parametros);

		echo json_encode($respuesta);

	}
	public $almacenRF;
	public function statusSemaforoRF(){

		$table = $this->almacenRF;
		$fechaActual = "2020-08-05";
        $fechaFinal = date("Y-m-d", strtotime($fechaActual)); 

		$tabla = "productos AS p INNER JOIN ".$table." AS al ON p.id = al.idProducto";
		$campos = "SUM(al.entradasUnidades) AS entradas,SUM(salidasUnidades) AS salidas, SUM(existenciasUnidades) AS existencias, SUM(al.ultimoCosto) AS ultimoCosto";
		$parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = (SELECT MAX(al.idImportacion) FROM ".$table." AS al) AND al.fecha = '".$fechaFinal."'";

		$respuesta = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla,$campos,$parametros);

		echo json_encode($respuesta);

	}
	public $almacenSG;
	public function statusSemaforoSG(){

		$table = $this->almacenSG;
		$fechaActual = "2020-08-05";
        $fechaFinal = date("Y-m-d", strtotime($fechaActual)); 

		$tabla = "productos AS p INNER JOIN ".$table." AS al ON p.id = al.idProducto";
		$campos = "SUM(al.entradasUnidades) AS entradas,SUM(salidasUnidades) AS salidas, SUM(existenciasUnidades) AS existencias, SUM(al.ultimoCosto) AS ultimoCosto";
		$parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = (SELECT MAX(al.idImportacion) FROM ".$table." AS al) AND al.fecha = '".$fechaFinal."'";

		$respuesta = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla,$campos,$parametros);

		echo json_encode($respuesta);

	}
	public $almacenCP;
	public function statusSemaforoCP(){

		$table = $this->almacenCP;
		$fechaActual = "2020-08-05";
        $fechaFinal = date("Y-m-d", strtotime($fechaActual)); 

		$tabla = "productos AS p INNER JOIN ".$table." AS al ON p.id = al.idProducto";
		$campos = "SUM(al.entradasUnidades) AS entradas,SUM(salidasUnidades) AS salidas, SUM(existenciasUnidades) AS existencias, SUM(al.ultimoCosto) AS ultimoCosto";
		$parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = (SELECT MAX(al.idImportacion) FROM ".$table." AS al) AND al.fecha = '".$fechaFinal."'";

		$respuesta = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla,$campos,$parametros);

		echo json_encode($respuesta);

	}
	public $almacenTR;
	public function statusSemaforoTR(){

		$table = $this->almacenTR;
		$fechaActual = "2020-08-05";
        $fechaFinal = date("Y-m-d", strtotime($fechaActual)); 

		$tabla = "productos AS p INNER JOIN ".$table." AS al ON p.id = al.idProducto";
		$campos = "SUM(al.entradasUnidades) AS entradas,SUM(salidasUnidades) AS salidas, SUM(existenciasUnidades) AS existencias, SUM(al.ultimoCosto) AS ultimoCosto";
		$parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = (SELECT MAX(al.idImportacion) FROM ".$table." AS al) AND al.fecha = '".$fechaFinal."'";

		$respuesta = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla,$campos,$parametros);

		echo json_encode($respuesta);

	}

}

if (isset($_POST["almacenGR1"])) {
	$statusSemaforoGr = new functionsTablero();
	$statusSemaforoGr -> almacenGR1 = $_POST["almacenGR1"];
	$statusSemaforoGr -> statusSemaforoGr(); 
}
if (isset($_POST["almacenSM"])) {
	$statusSemaforoSM = new functionsTablero();
	$statusSemaforoSM -> almacenSM = $_POST["almacenSM"];
	$statusSemaforoSM -> statusSemaforoSM(); 
}
if (isset($_POST["almacenRF"])) {
	$statusSemaforoRF = new functionsTablero();
	$statusSemaforoRF -> almacenRF = $_POST["almacenRF"];
	$statusSemaforoRF -> statusSemaforoRF(); 
}
if (isset($_POST["almacenSG"])) {
	$statusSemaforoSG = new functionsTablero();
	$statusSemaforoSG -> almacenSG = $_POST["almacenSG"];
	$statusSemaforoSG -> statusSemaforoSG(); 
}
if (isset($_POST["almacenCP"])) {
	$statusSemaforoCP = new functionsTablero();
	$statusSemaforoCP -> almacenCP = $_POST["almacenCP"];
	$statusSemaforoCP -> statusSemaforoCP(); 
}
if (isset($_POST["almacenTR"])) {
	$statusSemaforoTR = new functionsTablero();
	$statusSemaforoTR -> almacenTR = $_POST["almacenTR"];
	$statusSemaforoTR -> statusSemaforoTR(); 
}
?>