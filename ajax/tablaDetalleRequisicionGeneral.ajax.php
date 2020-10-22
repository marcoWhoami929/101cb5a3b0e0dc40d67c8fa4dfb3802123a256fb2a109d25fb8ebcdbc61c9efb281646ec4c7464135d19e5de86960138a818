<?php
error_reporting(E_ALL);
session_start();
require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";

class TablaDetalleRequisicionGeneral{


	public function mostrarTablas(){	

		$item = "idPedido";
		$valor = $_GET["idRequisicion"];
		
 		$detalleRequisicion = ControladorInventarios::ctrMostrarDetalleRequisicion($item,$valor);
 		$arregloUnidades = 0;
 		$arregloMonto = 0;

 		$datosJson = '{
		 
	 	"data": [ ';


	 	for($i = 0; $i < count($detalleRequisicion); $i++){

			
			if ($detalleRequisicion[$i]["estatus"] == 0) {

				$estatus = "<button type='button' class='btn btn-danger btn-sm btnEstatusProducto' idProductoRequisicion='".$detalleRequisicion[$i]["id"]."' estadoProducto='1' ><i class='fa fa-boxes'></i></button>";

			}else  if ($detalleRequisicion[$i]["estatus"] == 1){

				$estatus = "<button type='button' class='btn btn-success btn-sm btnEstatusProducto' idProductoRequisicion='".$detalleRequisicion[$i]["id"]."' estadoProducto='0'><i class='fa fa-truck-loading' ></i></button>";
			}


			$cantidadAprobada = "<input type='text' class='form-control cantidadPedidoAprobado' id='cantidadAprobada$i' idProducto='".$detalleRequisicion[$i]["id"]."' value='".$detalleRequisicion[$i]["unidadesAprobadas"]."' onChange='actualizarCantidad(this.id);' >";

			$arregloUnidades += $detalleRequisicion[$i]["unidadesAprobadas"];
	 		$arregloMonto +=$detalleRequisicion[$i]["montoAprobado"];

	 		if ($detalleRequisicion[$i]["contratipo"] == 0) {

				$cambio = "<button type='button' class='btn btn-secondary btnCargarContratipo' data-toggle='modal' data-target='#verContratipo' disabled><i class='mdi mdi-cloud-sync'></i> </button>";
			}else{
				$cambio = "<button type='button' class='btn btn-secondary btnCargarContratipo' idProductoPedido='".$detalleRequisicion[$i]["id"]."' idPedido='".$detalleRequisicion[$i]["idPedido"]."' idProducto='".$detalleRequisicion[$i]["idProducto"]."' idMovimiento='".$detalleRequisicion[$i]["id"]."' contratipo = '".$detalleRequisicion[$i]["contratipo"]."' solicitado='".$detalleRequisicion[$i]["solicitado"]."' montoSolicitado='".$detalleRequisicion[$i]["montoSolicitado"]."'  data-toggle='modal' data-target='#verContratipo' ><i class='mdi mdi-cloud-sync'></i> </button>";
			}

			$datosJson	 .= '[
					  "'.$estatus.'",
					  "'.$detalleRequisicion[$i]["codigo"].'",
				      "'.$detalleRequisicion[$i]["producto"].'",
				      "'.$detalleRequisicion[$i]["existencias"].'",
				      "'.$cambio.'",
				      "'.$detalleRequisicion[$i]["solicitado"].'",
				      "'.$cantidadAprobada.'",
				      "'.$detalleRequisicion[$i]["pendiente"].'",
				      "$ '.number_format($detalleRequisicion[$i]["montoFaltante"],2).'",
				      "$ '.number_format($detalleRequisicion[$i]["montoSolicitado"],2).'",
				      "$ '.number_format($detalleRequisicion[$i]["montoAprobado"],2).'",
				      "$ '.number_format($detalleRequisicion[$i]["montoPendiente"],2).'"
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 
		$_SESSION["cantidadAprobada"] = $arregloUnidades;
		$_SESSION["montoAprobado"] = $arregloMonto;
		echo $datosJson;

 	}

}


$activar = new TablaDetalleRequisicionGeneral();
$activar -> mostrarTablas();



