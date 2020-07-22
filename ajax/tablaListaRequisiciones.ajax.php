<?php
error_reporting(E_ALL);
session_start();
require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";

class TablaLlistaRequisiciones{


	public function mostrarTablas(){	
		

 		$listaRequisiciones = ControladorInventarios::ctrMostrarRequisicionesGenerales();


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($listaRequisiciones); $i++){

	 		if ($listaRequisiciones[$i]["solicitado"] == 1 and $listaRequisiciones[$i]["revision"] == 0 and $listaRequisiciones[$i]["aprobado"] == 0 and $listaRequisiciones[$i]["concluido"] == 0) {

	 			$estatus = "<button type='button' class='btn btn-primary btn-sm'><i class='far fa-paper-plane'></i></button>";

	 		}else if ($listaRequisiciones[$i]["solicitado"] == 1 and $listaRequisiciones[$i]["revision"] == 1 and $listaRequisiciones[$i]["aprobado"] == 0 and $listaRequisiciones[$i]["concluido"] == 0){

	 			$estatus = "<button type='button' class='btn btn-success btn-sm'><i class='fab fa-searchengin'></i></button>";

	 		}else if ($listaRequisiciones[$i]["solicitado"] == 1 and $listaRequisiciones[$i]["revision"] == 1 and $listaRequisiciones[$i]["aprobado"] == 1 and $listaRequisiciones[$i]["concluido"] == 0){

	 			$estatus = " <button type='button' class='btn btn-danger btn-sm'><i class='fa fa-vote-yea'></i></button>";

	 		}else if ($listaRequisiciones[$i]["solicitado"] == 1 and $listaRequisiciones[$i]["revision"] == 1 and $listaRequisiciones[$i]["aprobado"] == 1 and $listaRequisiciones[$i]["concluido"] == 1){

	 			$estatus = "<button type='button' class='btn btn-warning btn-sm'><i class='fa fa-clipboard-list'></i></button>";

	 		}


			if ($listaRequisiciones[$i]["revision"] != 0) {
				$habilitado = "<button type='button' class='btn btn-success btn-sm btnEnRevision' idRequisicion='".$listaRequisiciones[$i]["id"]."' estado='0' disabled><i class='fa fa-eye'></i></button>";
			}else{

				$habilitado = "<button type='button' class='btn btn-danger btn-sm btnEnRevision' idRequisicion='".$listaRequisiciones[$i]["id"]."' estado='1'><i class='fa fa-eye' ></i></button>";
			}
	 		$acciones = "<button type='button' class='btn btn-info btn-sm btnVisualizarDetalleRequisicion' idRequisicion='".$listaRequisiciones[$i]["id"]."'><i class='fa fa-eye fa-1x'></i>Detalle</button>";
	 		

	 		if ($listaRequisiciones[$i]["observacionesAprobado"] == "") {
	 			
	 			$aprobada = "Sin observaciones";
	 		}else{
	 			$aprobada = $listaRequisiciones[$i]["observacionesAprobado"];
	 		}


	 		if ($listaRequisiciones[$i]["observacionesConcluido"] == "") {
	 			
	 			$concluida = "Sin observaciones";
	 		}else{
	 			$concluida = $listaRequisiciones[$i]["observacionesConcluido"];
	 		}

			$datosJson	 .= '[
					  "'.$estatus.'",
					   "'.$habilitado.'",
				      "'.$listaRequisiciones[$i]["id"].'",
				      "'.$listaRequisiciones[$i]["sucursal"].'",
				      "'.$listaRequisiciones[$i]["descripcion"].'",
				      "'.$listaRequisiciones[$i]["unidadesSolicitadas"].'",
				      "$ '.$listaRequisiciones[$i]["montoSolicitado"].'",
				      "'.$listaRequisiciones[$i]["fecha"].'",
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


$activar = new TablaLlistaRequisiciones();
$activar -> mostrarTablas();



