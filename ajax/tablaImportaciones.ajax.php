<?php
error_reporting(0);
require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";

class TablaImportaciones{

 	/*=============================================
  	TABLA IMPORTACIONES
  	=============================================*/ 

	public function mostrarTablas(){	

 		$importaciones = ControladorInventarios::ctrMostrarListaImportaciones();


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($importaciones); $i++){

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.$importaciones[$i]["id"].'",
				      "'.$importaciones[$i]["descripcion"].'",
				      "'.$importaciones[$i]["fechaImportacion"].'",
				      "'.$importaciones[$i]["usuario"].'"
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
$activar = new TablaImportaciones();
$activar -> mostrarTablas();



