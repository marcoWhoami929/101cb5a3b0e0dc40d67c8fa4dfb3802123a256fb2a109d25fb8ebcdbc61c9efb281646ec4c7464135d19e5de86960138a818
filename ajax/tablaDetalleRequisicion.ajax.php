<?php
error_reporting(E_ALL);
session_start();
require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";

class TablaDetalleRequisicion{


	public function mostrarTablas(){	

		$item = "idPedido";
		$valor = $_GET["idRequisicion"];
		
 		$detalleRequisicion = ControladorInventarios::ctrMostrarDetalleRequisicion($item,$valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($detalleRequisicion); $i++){

	 		if ($detalleRequisicion[$i]["estatus"] == 0) {
	 			
	 			$estatus = "<button type='button' class='btn btn-danger btn-sm'><i class='fa fa-boxes'></i></button>";

	 		}else if ($detalleRequisicion[$i]["estatus"] == 1) {
	 			
	 			$estatus = "<button type='button' class='btn btn-warning btn-sm'><i class='fa fa-open'></i></button>";

	 		}else if ($detalleRequisicion[$i]["estatus"] == 2) {
	 			$estatus = "<button type='button' class='btn btn-success btn-sm'><i class='fa fa-truck-loading '></i></button>";
	 		}
	 	
	 		

			$cantidadAprobada = "<input type='text' class='form-control cantidadPedidoAprobado' id='cantidadAprobada$i' idProducto='".$detalleRequisicion[$i]["idProducto"]."' value='".$detalleRequisicion[$i]["unidadesAprobadas"]."' onChange='actualizarCantidad(this.id);' disabled>";

			if ($detalleRequisicion[$i]["sustituido"] == 1) {
				$observacionCambio = "<button type='button' class='btn btn-secondary btn-sm btnInfoContratipo' idProducto='".$detalleRequisicion[$i]["idProducto"]."' idPedido='".$detalleRequisicion[$i]["idPedido"]."' idProductoPedido='".$detalleRequisicion[$i]["id"]."' data-toggle='modal' data-target='#informacionContratipo'><i class='fas fa-info'></i></button>";
			}else{
				$observacionCambio = "";
			}
			

			

			if ($_SESSION["grupo"] == "Administrador") {

				$datosJson	 .= '[
					  "'.$estatus.'",
					  "'.$detalleRequisicion[$i]["codigo"].'",
				      "'.$detalleRequisicion[$i]["producto"].'",
				      "'.$detalleRequisicion[$i]["existencias"].'",
				      
				      "'.$detalleRequisicion[$i]["solicitado"].'",
				      "'.$cantidadAprobada.'",
				      "'.$detalleRequisicion[$i]["pendiente"].'",
				      "$ '.$detalleRequisicion[$i]["montoFaltante"].'",
				      "$ '.$detalleRequisicion[$i]["montoSolicitado"].'",
				      "$ '.$detalleRequisicion[$i]["montoAprobado"].'",
				      "$ '.$detalleRequisicion[$i]["montoPendiente"].'"
				    ],';

			}else{

				$datosJson	 .= '[
					  "'.$estatus.'",
					  "'.$detalleRequisicion[$i]["codigo"].'",
				      "'.$detalleRequisicion[$i]["producto"].'&nbsp;&nbsp;'.$observacionCambio.'",
				      "'.$detalleRequisicion[$i]["existencias"].'",
				      "'.$detalleRequisicion[$i]["solicitado"].'",
				      "'.$cantidadAprobada.'",
				      "'.$detalleRequisicion[$i]["pendiente"].'"
				    ],';

			}

			

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

 	public function mostrarProductoSustituido(){	

		$idPedido = $_GET["idPedidoCambio"];
		$id = $_GET["idProductoPedido"];

		$tabla = "productos AS p INNER JOIN sustituidos AS s ON p.id = s.idProducto";
		$campos = "p.nombreProducto,s.cantidad,s.monto,s.fecha";
		$parametros = "WHERE s.id = ".$idPedido;

		$productoSustituido = ControladorInventarios::ctrMostrarProductoCambiado($tabla,$campos,$parametros);

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($productoSustituido); $i++){


				$datosJson	 .= '[
					  "'.$productoSustituido[$i]["nombreProducto"].'",
					  "'.$productoSustituido[$i]["cantidad"].'",
					  "'.$productoSustituido[$i]["monto"].'",
					  "'.$productoSustituido[$i]["fecha"].'"
				     
				    ],';
			

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

if (isset($_GET["DetalleRequisicion"])) { 

	$activar = new TablaDetalleRequisicion();
	$activar -> mostrarTablas();

}else if (isset($_GET["ModalProductoRemplazado"])) { 

	$verProductoCambiado = new TablaDetalleRequisicion();
	$verProductoCambiado -> mostrarProductoSustituido();

}

/*
$activar = new TablaDetalleRequisicion();
$activar -> mostrarTablas();
*/


