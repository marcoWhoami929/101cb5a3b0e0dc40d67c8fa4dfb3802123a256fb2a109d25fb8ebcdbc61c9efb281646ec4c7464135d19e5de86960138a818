<?php

require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";
require_once "../modelos/administradores.php";
error_reporting(0);

class AjaxFuncionesInventarios{

	/*-----------ACTUALIZAR LOS DIAS DE SURTIMIENTO DEL PROVEEDOR--------------*/
	public $idFamilia;
	public $editarDias;

	public function ajaxActualizarDias(){
		$tabla = "familias";
		$tabla2 = "productos";

		$item = "id";
		$valor = $this->idFamilia;
		$item2 = "diasSurtimiento";
		$valor2 = $this->editarDias;

		$respuesta = ModeloInventarios::mdlActualizarDiasFamilias($tabla, $item, $valor, $item2, $valor2);

		echo json_encode($respuesta);

	}
	/*-----------ACTUALIZAR STOCK MINIMOS POR TIENDA Y POR PRODUCTO--------------*/
	public $idProducto;
	public $elegirAlmacen;
	public function ajaxRecalcularStock(){

		$item = "idProducto";
		$valor = $this->idProducto;

		$almacen = $this->elegirAlmacen;

		if ($almacen == "almacengeneral1") {
			$campo = "stockMinimoGral1";
		}else if($almacen == "almacengeneral2"){
			$campo = "stockMinimoGral2";
		}else if($almacen == "almacensanmanuel1"){
			$campo = "stockMinimoSM1";
		}else if($almacen == "almacensanmanuel2"){
			$campo = "stockMinimoSM2";
		}else if($almacen == "almacenreforma1"){
			$campo = "stockMinimoRf1";
		}else if($almacen == "almacenreforma2"){
			$campo = "stockMinimoRf1";
		}else if($almacen == "almacensantiago1"){
			$campo = "stockMinimoSg1";
		}else if($almacen == "almacensantiago2"){
			$campo = "stockMinimoSg1";
		}else if($almacen == "almacencapu1"){
			$campo = "stockMinimoCp1";
		}else if($almacen == "almacencapu2"){
			$campo = "stockMinimoCp2";
		}else if($almacen == "almacenlastorres1"){
			$campo = "stockMinimoTr1";
		}else if($almacen == "almacenlastorres2"){
			$campo = "stockMinimoTr2";
		}

		$fechaActual = "2020-07-11";
		$fechaSum = date("Y-m-d",strtotime($fechaActual."+ 1 days"));
		$fechaMenosSeis = date("Y-m-d",strtotime($fechaSum."- 6 days"));
			
		$table = $almacen." as al INNER JOIN productos AS p ON al.idProducto = p.id";
		$campos = "SUM(al.salidasUnidades) AS totalSalidas";
		$parametros = "WHERE p.id = ".$valor." AND al.fecha BETWEEN "."'".$fechaMenosSeis."'"." AND "."'".$fechaActual."'"; 

		$respuestaFinales = ModeloInventarios::mdlMostrarFinalesFechaActual($table, $campos, $parametros);
			
		$totalSalidas = $respuestaFinales["totalSalidas"];
		$stockMinimo = $totalSalidas / 6;

		$tabla = "productos";
		$parametro = "".$campo." = ".round($stockMinimo)." WHERE id = ".$valor."";
		$respuesta  = ModeloInventarios::mdlActualizarStockMinimo($tabla, $parametro);

		echo json_encode($respuesta);

	}
	/*-----------ACTIVAR O DESACTIVAR USUARIO--------------*/
	public $activarPerfil;
	public $activarId;

	public function ajaxActivarUsuario(){

		$tabla = "administradores";

		$item1 = "estado";
		$valor1 = $this->activarPerfil;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloAdministradores::mdlActivarUsuario($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}
	/*-----------ACTUALIZAR LOS DATOS DEL USUARIO--------------*/
	public $idPerfil;

	public function ajaxEditarPerfil(){

		$item = "id";
		$valor = $this->idPerfil;

		$respuesta = ModeloAdministradores::mdlMostrarDatosUsuario($item, $valor);

		echo json_encode($respuesta);

	}

}
/*-----------ACTUALIZAR LOS DIAS DE SURTIMIENTO DEL PROVEEDOR--------------*/
if(isset($_POST["idFamilia"])){

    $editarDias = new AjaxFuncionesInventarios();
    $editarDias -> idFamilia = $_POST["idFamilia"];
    $editarDias -> editarDias = $_POST["editarDias"];
    $editarDias -> idProducto = $_POST["idProducto"];
    $editarDias -> ajaxActualizarDias();

}

if(isset($_POST["idProducto"])){

    $recalcularStock = new AjaxFuncionesInventarios();
    $recalcularStock -> idProducto = $_POST["idProducto"];
    $recalcularStock -> elegirAlmacen = $_POST["elegirAlmacen"];
    $recalcularStock -> ajaxRecalcularStock();

}
/*-----------ACTUALIZAR LOS DATOS DEL USUARIO--------------*/
if(isset($_POST["activarPerfil"])){

	$activarPerfil = new AjaxFuncionesInventarios();
	$activarPerfil -> activarPerfil = $_POST["activarPerfil"];
	$activarPerfil -> activarId = $_POST["activarId"];
	$activarPerfil -> ajaxActivarUsuario();

}
/*-----------ACTUALIZAR LOS DATOS DEL USUARIO--------------*/
if(isset($_POST["idPerfil"])){

	$editar = new AjaxFuncionesInventarios();
	$editar -> idPerfil = $_POST["idPerfil"];
	$editar -> ajaxEditarPerfil();
}
