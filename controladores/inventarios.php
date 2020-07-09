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
	static public function ctrMostrarDatosAlmacenes($almacen){

			$tabla = $almacen;

			$respuesta = ModeloInventarios::mdlMostrarDatosAlmacenes($tabla);

			return $respuesta;


	}
	static public function ctrCalcularTotalesPromedio($almacen){

			$tabla = $almacen;

			$respuesta = ModeloInventarios::mdlCalcularTotalesPromedio($tabla);

			return $respuesta;


	}

	static public function ctrMostrarProductosPorAgotarse(){

		$tabla = "almacengeneral1";

		$respuesta = ModeloInventarios::mdlMostrarProductosPorAgotarse($tabla);

		return $respuesta;
	}

	static public function ctrMostrarFamilias(){

		$tabla = "familias";

		$respuesta = ModeloInventarios::mdlMostrarFamilias($tabla);

		return $respuesta;
	}



}


?>