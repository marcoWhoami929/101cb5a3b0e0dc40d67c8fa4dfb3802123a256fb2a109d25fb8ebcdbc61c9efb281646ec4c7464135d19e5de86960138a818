<?php

class ControladorInventarios{


	static public function ctrBuscarValores($item,$valor){

			$tabla = "productos";

			$respuesta = ModeloInventarios::mdlBuscarValores($tabla,$item,$valor);

			return $respuesta;


	}
	static public function ctrBuscarFolioDisponible(){

			$tabla = "importaciones";

			$respuesta = ModeloInventarios::mdlBuscarFolioDisponible($tabla);

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



}


?>