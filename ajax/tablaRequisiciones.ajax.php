<?php
error_reporting(E_ALL);
session_start();
require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";

class TablaRequisiciones{


	public function mostrarTablas(){	
		$item = "sucursal";
		$valor = $_SESSION["nombre"];

 		$requisicion = ControladorInventarios::ctrMostrarRequisicionesTienda($item,$valor);


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($requisicion); $i++){

	 		if ($requisicion[$i]["solicitado"] == 1 and $requisicion[$i]["revision"] == 0 and $requisicion[$i]["aprobado"] == 0 and $requisicion[$i]["concluido"] == 0) {

	 			$estatus = "<button type='button' class='btn btn-primary btn-sm'><i class='far fa-paper-plane'></i></button>";

	 		}else if ($requisicion[$i]["solicitado"] == 1 and $requisicion[$i]["revision"] == 1 and $requisicion[$i]["aprobado"] == 0 and $requisicion[$i]["concluido"] == 0){

	 			$estatus = "<button type='button' class='btn btn-success btn-sm'><i class='fab fa-searchengin'></i></button>";

	 		}else if ($requisicion[$i]["solicitado"] == 1 and $requisicion[$i]["revision"] == 1 and $requisicion[$i]["aprobado"] == 1 and $requisicion[$i]["concluido"] == 0){

	 			$estatus = " <button type='button' class='btn btn-danger btn-sm'><i class='fa fa-vote-yea'></i></button>";

	 		}else if ($requisicion[$i]["solicitado"] == 1 and $requisicion[$i]["revision"] == 1 and $requisicion[$i]["aprobado"] == 1 and $requisicion[$i]["concluido"] == 1){

	 			$estatus = "<button type='button' class='btn btn-warning btn-sm'><i class='fa fa-clipboard-list'></i></button>";

	 		}

	 		$acciones = "<button type='button' class='btn btn-info btn-sm btnVisualizarDetalleRequisicion' idRequisicion='".$requisicion[$i]["id"]."'><i class='fa fa-eye fa-1x'></i>Detalle</button>";
	 		

	 		if ($requisicion[$i]["observacionesAprobado"] == "") {
	 			
	 			$aprobada = "Sin observaciones";
	 		}else{
	 			$aprobada = $requisicion[$i]["observacionesAprobado"];
	 		}


	 		if ($requisicion[$i]["observacionesConcluido"] == "") {
	 			
	 			$concluida = "Sin observaciones";
	 		}else{
	 			$concluida = $requisicion[$i]["observacionesConcluido"];
	 		}
			$datosJson	 .= '[
					  "'.$estatus.'",
				      "'.$requisicion[$i]["id"].'",
				      "'.$requisicion[$i]["descripcion"].'",
				      "'.$requisicion[$i]["unidadesSolicitadas"].'",
				      "$ '.$requisicion[$i]["montoSolicitado"].'",
				      "'.$requisicion[$i]["fecha"].'",
				      "'.$acciones.'",
				      "'.$aprobada.'",
				      "'.$concluida.'"
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}


$activar = new TablaRequisiciones();
$activar -> mostrarTablas();



