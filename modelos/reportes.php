<?php
require_once "conexion.php";


class ModeloReportes{

	static public function  mdlReporteRequisiciones($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}
	

}


?>