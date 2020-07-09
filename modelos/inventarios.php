<?php
include_once("conexion.php");

class ModeloInventarios{


	static public function mdlBuscarValores($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT id FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetch();


	}
	static public function mdlBuscarFolioDisponible($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT IF(MAX(id) IS NULL,1,MAX(id)+1) as idDisponible from $tabla");

			$stmt -> execute();

			return $stmt->fetch();


	}
	static public function mdlMostrarListaImportaciones($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT imp.id,imp.descripcion,imp.fechaImportacion,adm.nombre as usuario FROM  $tabla as imp INNER JOIN administradores as adm ON imp.idUsuario = adm.id");

			$stmt -> execute();

			return $stmt->fetchAll();


	}
	static public function mdlMostrarDatosAlmacenes($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT alm.id,prod.codigoProducto,prod.nombreProducto,alm.entradasUnidades,alm.salidasUnidades,alm.existenciasUnidades,alm.entradasImportes,alm.salidasImportes,alm.existenciaImportes,alm.ultimoCosto,alm.totalUltCosto FROM  $tabla as alm INNER JOIN productos as prod ON alm.idProducto = prod.id");

			$stmt -> execute();

			return $stmt->fetchAll();


	}
	static public function mdlCalcularTotalesPromedio($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT SUM(ultimoCosto*salidasUnidades) as totalPromedio FROM  $tabla");

			$stmt -> execute();

			return $stmt->fetch();


	}

	static public function mdlMostrarProductosPorAgotarse($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT p.codigoProducto, p.nombreProducto, p.stockMinimoGral1, a1.inventarioInicialUnidades, a1.ultimoCosto FROM productos AS p LEFT OUTER JOIN $tabla AS a1 ON p.id = a1.idProducto WHERE a1.inventarioInicialUnidades != 0 ");

		$stmt -> execute();

		return $stmt->fetchAll();

	}

	static public function mdlMostrarFamilias($tabla){
 
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

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
	static public function mdlMostrarFinales($item3, $valor3){
 
		$stmt = Conexion::conectar()->prepare("SELECT a1.idProducto, a1.inventarioInicialUnidades AS inicial, a1.salidasUnidades AS salidas, a1.existenciasUnidades AS final FROM almacengeneral1 AS a1 LEFT OUTER JOIN productos AS p ON a1.idProducto = p.id RIGHT OUTER JOIN familias as f ON p.idFamilia = f.id WHERE a1.salidasUnidades != 0 AND f.id = :$item3");

		$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt->fetchAll();

	}
	/**
	 * MODELO PARA ACTUALIZAR EL STOCK MINIMO CUANDO SE ACTUALIZAN LOS DIAS DE SURTIMIENTO
	 */
	static public function mdlActualizarStockMinimo($tabla2, $datos){
 
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 SET stockMinimoGral1 = :stockMinimoGral1 WHERE id = :id");

		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":stockMinimoGral1", $datos["stockMinimoGral1"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();
		$stmt = null;

	}

}


?>