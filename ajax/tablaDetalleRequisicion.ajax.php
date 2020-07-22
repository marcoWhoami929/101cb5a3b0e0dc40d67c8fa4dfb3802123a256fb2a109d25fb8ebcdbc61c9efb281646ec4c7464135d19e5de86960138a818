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

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}


$activar = new TablaDetalleRequisicion();
$activar -> mostrarTablas();



