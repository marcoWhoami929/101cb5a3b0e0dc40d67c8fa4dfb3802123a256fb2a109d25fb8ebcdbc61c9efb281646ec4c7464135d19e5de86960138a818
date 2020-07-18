<?php

class ControladorInventarios{


	static public function ctrBuscarValores($item,$valor){

			$tabla = "productos";

			$respuesta = ModeloInventarios::mdlBuscarValores($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrBuscarFolioDisponible($table, $select, $conditions){

			$tabla = $table;

			$respuesta = ModeloInventarios::mdlBuscarFolioDisponible($tabla, $select, $conditions);

			return $respuesta;


	}
	static public function ctrMostrarListaImportaciones(){

			$tabla = "importaciones";

			$respuesta = ModeloInventarios::mdlMostrarListaImportaciones($tabla);

			return $respuesta;


	}
	static public function ctrMostrarDatosAlmacenes($tabla, $campos, $parametros){

			$tabla = $tabla;

			$respuesta = ModeloInventarios::mdlMostrarDatosAlmacenes($tabla, $campos, $parametros);

			return $respuesta;


	}
	static public function ctrCalcularTotalesPromedio($almacen){

		$tabla = $almacen;

		$respuesta = ModeloInventarios::mdlCalcularTotalesPromedio($tabla);

		return $respuesta;

	}

	/**
	 *CONTROLADOR PARA MOSTRAR LOS PRODUCTOS POR AGOTARSE
	 */
	static public function ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros){

		$tabla = $tabla;

		$respuesta = ModeloInventarios::mdlMostrarProductosPorAgotarse($tabla, $campos, $parametros);

		return $respuesta;
	}

	static public function ctrMostrarDatosF($tabla, $campos){

		$tabla = $tabla;

		$respuesta = ModeloInventarios::mdlMostrarFamilias($tabla, $campos);

		return $respuesta;
	}
<<<<<<< HEAD
	/*
	Generar nuevo pedido
	 */
	static public function ctrGenerarNuevoPedido($tabla, $datos){

		$tabla = $tabla;

		$respuesta = ModeloInventarios::mdlGenerarNuevoPedido($tabla, $datos);

		return $respuesta;
	}
	/*
	INSERTAR PRODUCTOS PEDIDO
	 */
	static public function ctrInsertarProductosPedido($tabla, $datos){

		$tabla = $tabla;

		$respuesta = ModeloInventarios::mdlInsertarProductosPedido($tabla, $datos);

		return $respuesta;
	}
	/*
	MOSTRAR REQUISICIONES TIENDA
	 */
	static public function ctrMostrarRequisicionesTienda($item,$valor){

		$tabla = "pedidossemanales";

		$respuesta = ModeloInventarios::mdlMostrarRequisicionesTienda($tabla, $item,$valor);

		return $respuesta;
	}
	/*
	MOSTRAR DETALLE REQUISICION
	 */
	static public function ctrMostrarDetalleRequisicion($item,$valor){

		$tabla = "productospedidos";

		$respuesta = ModeloInventarios::mdlMostrarDetalleRequisicion($tabla, $item,$valor);

		return $respuesta;
	}
	/*
	MOSTRAR DATOS REQUISICION
	 */
	static public function ctrObtenerDatosRequisicion($tabla,$item,$valor){


		$respuesta = ModeloInventarios::mdlObtenerDatosRequisicion($tabla, $item,$valor);
=======
	/**
	 *CONTROLADOR PARA MOSTRAR LOS PRODUCTOS Y EXISTENCIAS
	 */
	static public function ctrMostrarProductosYexistencias($tabla, $campos, $parametros){

		$tabla = $tabla;

		$respuesta = ModeloInventarios::mdlMostrarProductosYexistencias($tabla, $campos, $parametros);

		return $respuesta;
	}
>>>>>>> devdiego

		return $respuesta;
	}
	/*
	MOSTRAR REQUISICIONES GENERALES
	 */
	static public function ctrMostrarRequisicionesGenerales(){

		$tabla = "pedidossemanales";

		$respuesta = ModeloInventarios::mdlMostrarRequisicionesGenerales($tabla);

		return $respuesta;
	}
	/*
	APROBAR REQUISICION
	 */
	static public function ctrAprobarRequisicion($tabla, $datos){

		$tabla = $tabla;

		$respuesta = ModeloInventarios::mdlAprobarRequisicion($tabla, $datos);

		return $respuesta;
	}
	/*
	CONCLUIR REQUISICION
	 */
	static public function ctrConcluirRequisicion($tabla, $datos){

		$tabla = $tabla;

		$respuesta = ModeloInventarios::mdlConcluirRequisicion($tabla, $datos);

		return $respuesta;
	}

}


?>