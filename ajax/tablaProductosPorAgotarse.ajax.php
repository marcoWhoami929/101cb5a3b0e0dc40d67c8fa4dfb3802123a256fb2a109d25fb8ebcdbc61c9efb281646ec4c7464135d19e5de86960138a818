<?php
error_reporting(0);
require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";

class TablaProductosPorAgotarse{

 	/*=============================================
  	TABLA IMPORTACIONES
  	=============================================*/ 

	public function mostrarTablas(){	

 		$porAgotarse = ControladorInventarios::ctrMostrarProductosPorAgotarse();


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($porAgotarse); $i++){

	 		$stockMinimo = $porAgotarse[$i]["stockMinimoGral1"];
	 		$existencias = $porAgotarse[$i]["inventarioInicialUnidades"];
	 		$ultimoCosto = $porAgotarse[$i]["ultimoCosto"];

	 		if ($stockMinimo > $existencias) {
	 			$faltantantesUnidad = $stockMinimo - $existencias;
	 			$faltanteMonto = $ultimoCosto * $faltantantesUnidad;
	 		}else{
	 			$faltantantesUnidad = "<button class='btn btn-info btn-xs'>No hay Faltante</button>";
	 			$faltanteMonto = "<button class='btn btn-info btn-xs'>No hay Faltante</button>";
	 		}

	 		$indicador = $stockMinimo + 1;
	 		$indicador2 = $stockMinimo + 2;

	 		if ($existencias <= $indicador) {
	 			$indicadorClor = "<button class='btn btn-danger btn-lg'> </button>";
	 		}else if($existencias == $indicador2){
	 			$indicadorClor = "<button class='btn btn-warning btn-lg'> </button>";
	 		}else if($existencias > $indicador2){
	 			$indicadorClor = "<button class='btn btn-success btn-lg'> </button>";
	 		}
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$porAgotarse[$i]["codigoProducto"].'",
				      "'.$porAgotarse[$i]["nombreProducto"].'",
				      "'.$stockMinimo.'",
				      "'.$existencias.'",
				      "'.$faltantantesUnidad.'",
				      "'.$faltanteMonto.'",
				      "'.$indicadorClor.'"
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
 TABLA DE IMPORTACIONES
=============================================*/ 
$activar = new TablaProductosPorAgotarse();
$activar -> mostrarTablas();



