<?php

require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";
require_once "../modelos/administradores.php";

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

		if ($respuesta == "ok") {

			$item3 = "idFamilia";
			$valor3 = $this->idFamilia;

			$respuestaFinales = ModeloInventarios::mdlMostrarFinales($item3, $valor3);

			for($i = 0; $i < count($respuestaFinales); $i++){

				$idProducto = $respuestaFinales[$i]["idProducto"];
			
				$inicial = $respuestaFinales[$i]["inicial"];
				$salidas = $respuestaFinales[$i]["salidas"];
				$final = $respuestaFinales[$i]["final"];

				$consumo = ($inicial + $salidas) - $final;

				$stockMinimo = $consumo * $valor2;

				$datos = array("id" => $idProducto,
							   "stockMinimoGral1" => $stockMinimo );

				$respuestaActualizarStockMinimo = ModeloInventarios::mdlActualizarStockMinimo($tabla2, $datos);
			}
			
		}

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

    $editar2 = new AjaxFuncionesInventarios();
    $editar2 -> idFamilia = $_POST["idFamilia"];
    $editar2 -> editarDias = $_POST["editarDias"];
    $editar2 -> ajaxActualizarDias();

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
