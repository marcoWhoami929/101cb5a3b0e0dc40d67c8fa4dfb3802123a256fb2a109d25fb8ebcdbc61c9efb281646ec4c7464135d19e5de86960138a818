<?php
include_once("conexion.php");

class ModeloInventarios{


	static public function mdlBuscarValores($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT id FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetch();


	}
	static public function mdlBuscarFolioDisponible($tabla, $select, $conditions){

			$stmt = Conexion::conectar()->prepare("SELECT $select from $tabla $conditions");

			$stmt -> execute();

			return $stmt->fetch();


	}
	static public function mdlMostrarListaImportaciones($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT imp.id,imp.descripcion,imp.fechaImportacion,adm.nombre as usuario FROM  $tabla as imp INNER JOIN administradores as adm ON imp.idUsuario = adm.id ORDER BY imp.fechaImportacion DESC");

			$stmt -> execute();

			return $stmt->fetchAll();


	}
	static public function mdlMostrarDatosAlmacenes($tabla, $campos, $parametros){

			$stmt = Conexion::conectar()->prepare("SELECT $campos FROM $tabla $parametros");
			
			$stmt -> execute();

			return $stmt->fetchAll();


	}

	static public function mdlCalcularTotalesPromedio($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT SUM(ultimoCosto*salidasUnidades) as totalPromedio FROM  $tabla");

			$stmt -> execute();

			return $stmt->fetch();


	}

	static public function mdlMostrarProductosPorAgotarse($tabla, $campos, $parametros){

		$stmt = Conexion::conectar()->prepare("SELECT $campos FROM $tabla $parametros");
		//var_dump($stmt);
		$stmt -> execute();

		return $stmt->fetchAll();

		$stmt -> close();
		$stmt = null;

	}

	static public function mdlMostrarFamilias($tabla, $campos){
 
		$stmt = Conexion::conectar()->prepare("SELECT $campos FROM $tabla");

		$stmt -> execute();

		return $stmt->fetchAll();

	}
	/**
	 * MODELO PARA ACTUALIZAR LOS DIAS QUE TARDA EN RESURTIR EL PROVEEDOR
	 */
	static public function mdlActualizarDiasFamilias($tabla, $item, $valor, $item2, $valor2){
 
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2 = :$item2 WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();
		$stmt = null;

	}
	/**
	 * MODELO PARA MOSTRAR INVENTARIO INICIAL, COMOPRAS(SALIDAS) E INVENTARIO FINAL
	 */
	static public function mdlMostrarFinalesFechaActual($table, $campos, $parametros){

		$stmt = Conexion::conectar()->prepare("SELECT $campos FROM $table $parametros");

		$stmt -> execute();

		return $stmt->fetch();

	}
	/**
	 * MODELO PARA ACTUALIZAR EL STOCK MINIMO CUANDO SE ACTUALIZAN LOS DIAS DE SURTIMIENTO
	 */
	static public function mdlActualizarStockMinimo($tabla, $parametro){
 
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $parametro");

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();
		$stmt = null;

	}
	/*
	OBTENER EL NUMERO DE PRODUCTOS POR FAMILIA
	 */
	static public function mdlObtenerTotalProductosFamilia($item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(id) as total FROM productos WHERE $item = :$item");

		$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);

		$stmt-> execute();

		return $stmt -> fetch();

	}
	/**
	 *MODELO PARA MOSTRAR PRODUCTOS Y EXIXTENCIAS
	 */
	static public function mdlMostrarProductosYexistencias($tabla, $campos, $parametros){

		$stmt = Conexion::conectar()->prepare("SELECT $campos FROM $tabla $parametros");
		//var_dump($stmt);
		$stmt -> execute();

		return $stmt->fetchAll();

		$stmt -> close();
		$stmt = null;

	}

}


?>