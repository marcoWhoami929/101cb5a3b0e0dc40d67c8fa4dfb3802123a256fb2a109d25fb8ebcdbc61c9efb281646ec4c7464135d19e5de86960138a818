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
	 * MODELO PARA CONSULTAR ID'S DE PRODUCTOS RELACIONADOS A FAMILIA EDITADA
	 */
	static public function mdlObtenerDatos($tabla, $campos, $parametros){
 
		$stmt = Conexion::conectar()->prepare("SELECT $campos FROM $tabla $parametros");
		$stmt -> execute();

		return $stmt->fetchAll();

	}
	static public function mdlObtenerDatosSumas($tabla, $campoSuma, $parametroSuma){
 
		$stmt = Conexion::conectar()->prepare("SELECT $campoSuma FROM $tabla $parametroSuma");
		$stmt -> execute();

		return $stmt->fetch();

	}
	static public function mdlEditarStock($tabla, $camposEdicion, $parametroEdicion){
 
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $camposEdicion $parametroEdicion");

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
	 *ACTUALIZAR CANTIDAD SOLICITADA DE PEDIDO
	 */
	static public function mdlActualizarCantidadSolicitada($tabla,$item,$valor,$item2,$valor2){
 
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2 = :$item2 WHERE $item = :$item");

		$stmt-> bindParam(":".$item,$valor,PDO::PARAM_INT);
		$stmt-> bindParam(":".$item2,$valor2,PDO::PARAM_STR);


		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();
		$stmt = null;

	}
		/*
	OBTENER EL ULTIMO FOLIO DE PEDIDO
	 */
	static public function mdlObtenerUltimoFolioPedido(){

		$stmt = Conexion::conectar()->prepare("SELECT IF(MAX(id) IS NULL,1,MAX(id)+1) as folio FROM pedidossemanales");

		$stmt-> execute();

		return $stmt -> fetch();

	}
	/**
	 * GENERAR NUEVO PEDIDO
	 */
	static public function mdlGenerarNuevoPedido($tabla, $datos){
 
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id,descripcion,comentarios,sucursal,unidadesSolicitadas,unidadesAprobadas,montoSolicitado,montoAprobado,solicitado,estatus) VALUES(:id,:descripcion,:comentarios,:sucursal,:unidadesPedido,:unidadesAprobadas,:montoPedido,:montoAprobado,:solicitado,:estatus)");

		$stmt->bindParam(":id",$datos["id"],PDO::PARAM_STR);
		$stmt->bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
		$stmt->bindParam(":comentarios",$datos["comentarios"],PDO::PARAM_STR);
		$stmt->bindParam(":sucursal",$datos["sucursal"],PDO::PARAM_STR);
		$stmt->bindParam(":unidadesPedido",$datos["unidadesPedido"],PDO::PARAM_STR);
		$stmt->bindParam(":unidadesAprobadas",$datos["unidadesAprobadas"],PDO::PARAM_STR);
		$stmt->bindParam(":montoPedido",$datos["montoPedido"],PDO::PARAM_STR);
		$stmt->bindParam(":montoAprobado",$datos["montoAprobado"],PDO::PARAM_STR);
		$stmt->bindParam(":solicitado",$datos["solicitado"],PDO::PARAM_INT);
		$stmt->bindParam(":estatus",$datos["estatus"],PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}
	}
	/**
	 *MODELO PARA MOSTRAR PRODUCTOS Y EXIXTENCIAS
	 */
	static public function mdlMostrarProductosYexistencias($tabla, $campos, $parametros){

		$stmt = Conexion::conectar()->prepare("SELECT $campos FROM $tabla $parametros");
		
		$stmt -> execute();

		return $stmt->fetchAll();


		$stmt -> close();
		$stmt = null;

	}
	/**
	 * INSERTAR PRODUCTOS PEDIDO
	 */
	static public function mdlInsertarProductosPedido($tabla, $datos){
 		

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idProducto,existencias,sugerido,solicitado,unidadesAprobadas,montoFaltante,montoSolicitado,montoAprobado,estatus,idPedido) VALUES(:idProducto,:existencias,:sugerido,:solicitado,:unidadesAprobadas,:montoFaltante,:montoSolicitado,:montoAprobado,:estatus,:idPedido)");

		$stmt->bindParam(":idProducto",$datos["idProducto"],PDO::PARAM_STR);
		$stmt->bindParam(":existencias",$datos["existencias"],PDO::PARAM_STR);
		$stmt->bindParam(":sugerido",$datos["sugerido"],PDO::PARAM_STR);
		$stmt->bindParam(":solicitado",$datos["solicitado"],PDO::PARAM_STR);
		$stmt->bindParam(":unidadesAprobadas",$datos["unidadesAprobadas"],PDO::PARAM_STR);
		$stmt->bindParam(":montoFaltante",$datos["montoFaltante"],PDO::PARAM_STR);
		$stmt->bindParam(":montoSolicitado",$datos["montoSolicitado"],PDO::PARAM_STR);
		$stmt->bindParam(":montoAprobado",$datos["montoAprobado"],PDO::PARAM_STR);
		$stmt->bindParam(":estatus",$datos["estatus"],PDO::PARAM_STR);
		$stmt->bindParam(":idPedido",$datos["idPedido"],PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();
		$stmt = null;

	}
	/*
	MOSTRAR REQUISICIONES TIENDA
	 */
	static public function mdlMostrarRequisicionesTienda($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();


	}
	/*
	MOSTRAR REQUISICIONES TIENDA
	 */
	static public function mdlMostrarDetalleRequisicion($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT pp.*,p.nombreProducto as producto,p.codigoProducto as codigo FROM $tabla as pp INNER JOIN productos as p ON pp.idProducto = p.id WHERE pp.$item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetchAll();


	}
	/*
	MOSTRAR DATOS REQUISICION
	 */
	static public function mdlObtenerDatosRequisicion($tabla,$item,$valor){

			$stmt = Conexion::conectar()->prepare("SELECT unidadesAprobadas,montoAprobado FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt->fetch();


	}
	/*
	MOSTRAR REQUISICIONES GENERALES
	 */
	static public function mdlMostrarRequisicionesGenerales($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt->fetchAll();


	}
	/*=============================================
    REVISION PEDIDO
	=============================================*/

	static public function mdlHabilitarPedidoRevision($tabla, $item1, $valor1, $item2, $valor2,$item3,$valor3){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1, $item3 = :$item3 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
    ACTUALIZAR ESTATUS PRODUCTO
	=============================================*/

	static public function mdlActualizarEstatusproducto($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	/**	
	 *ACTUALIZAR CANTIDAD APROBADA
	 */
	static public function mdlActualizarCantidadAprobada($tabla,$item,$valor,$item2,$valor2){
 
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2 = :$item2, pendiente = solicitado - unidadesAprobadas,montoAprobado = ((montoSolicitado/solicitado)*unidadesAprobadas),montoPendiente = montoSolicitado - montoAprobado WHERE $item = :$item");

		$stmt-> bindParam(":".$item,$valor,PDO::PARAM_INT);
		$stmt-> bindParam(":".$item2,$valor2,PDO::PARAM_STR);


		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();
		$stmt = null;

	}
	/*=============================================
   APROBAR REQUISICION
	=============================================*/

	static public function mdlAprobarRequisicion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET observacionesAprobado = :observaciones,unidadesAprobadas = :unidadesAprobadas, montoAprobado = :montoAprobado, aprobado = :aprobado, fechaAprobado = :fechaAprobado WHERE id = :idRequisicionAprobada");

		$stmt -> bindParam(":idRequisicionAprobada",$datos["idRequisicionAprobada"], PDO::PARAM_INT);
		$stmt -> bindParam(":observaciones",$datos["observaciones"], PDO::PARAM_STR);
		$stmt -> bindParam(":unidadesAprobadas",$datos["unidadesAprobadas"], PDO::PARAM_STR);
		$stmt -> bindParam(":montoAprobado",$datos["montoAprobado"], PDO::PARAM_STR);
		$stmt -> bindParam(":aprobado",$datos["aprobado"], PDO::PARAM_STR);
		$stmt -> bindParam(":fechaAprobado",$datos["fechaAprobado"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
   	CONCLUIR REQUISICION
	=============================================*/

	static public function mdlConcluirRequisicion($tabla, $datos){	

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET observacionesConcluido = :observacionesRequisicion,concluido = :concluido, fechaConcluido = :fechaConcluido WHERE id = :idRequisicionConcluida");

		$stmt -> bindParam(":idRequisicionConcluida",$datos["idRequisicionConcluida"], PDO::PARAM_INT);
		$stmt -> bindParam(":observacionesRequisicion",$datos["observacionesRequisicion"], PDO::PARAM_STR);
		$stmt -> bindParam(":concluido",$datos["concluido"], PDO::PARAM_STR);
		$stmt -> bindParam(":fechaConcluido",$datos["fechaConcluido"], PDO::PARAM_STR);

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