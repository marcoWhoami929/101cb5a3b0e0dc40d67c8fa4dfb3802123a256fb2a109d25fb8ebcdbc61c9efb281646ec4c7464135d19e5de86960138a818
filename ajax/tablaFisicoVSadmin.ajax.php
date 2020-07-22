<?php
error_reporting(0);
require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";

class TablaFisicoVSadmin{

 	/*=============================================
  	TABLA IMPORTACIONES
  	=============================================*/ 

	public function mostrarTablas(){

		$tablaInicial = "almacen".$_GET["almacen"];

		$tabla = $tablaInicial." AS al INNER JOIN productos AS p ON al.idProducto = p.id";
		$campos = "al.id, p.nombreProducto, al.entradasUnidades, al.salidasUnidades, al.existenciasUnidades";
    	$parametros = "WHERE idImportacion = (SELECT MAX(idImportacion) FROM ".$tablaInicial.")";	

 		$fisicoVSadmin = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);
 		//var_dump($fisicoVSadmin);
 		
 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($fisicoVSadmin); $i++){

					                	
	 		$input = "<input class='form-control input-md' name='cantidadFisico' id='cantidadFisico' style='width:50%;'>";
	 		$send = "<button type='button' class='btn btn-success btn-md btnSend' idProducto='".$fisicoVSadmin[$i]["id"]."' nombreProducto='".$fisicoVSadmin[$i]["nombreProducto"]."'><i class='far fa-paper-plane'></i></button>";

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$fisicoVSadmin[$i]["nombreProducto"].'",
				      "'.$fisicoVSadmin[$i]["entradasUnidades"].'",
				      "'.$fisicoVSadmin[$i]["salidasUnidades"].'",
				      "'.$fisicoVSadmin[$i]["existenciasUnidades"].'",
				      "'.$input.'",
				      "'.$send.'"
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
$activar = new TablaFisicoVSadmin();
$activar -> mostrarTablas();



/*if ($nombreUsuario == "almacengeneral1") {
			$nombreUsuario = "almacengeneral1";
		}else if($nombreUsuario == "almacengeneral2"){
			$nombreUsuario = "almacengeneral2";
		}else if($nombreUsuario == "almacensanmanuel1"){
			$nombreUsuario = "almacensanmanuel1";
		}else if($nombreUsuario == "almacensanmanuel2"){
			$nombreUsuario = "almacensanmanuel2";
		}else if($nombreUsuario == "almacenreforma1"){
			$nombreUsuario = "almacenreforma1";
		}else if($nombreUsuario == "almacenreforma2"){
			$nombreUsuario = "almacenreforma2";
		}else if($nombreUsuario == "almacensantiago1"){
			$nombreUsuario = "almacensantiago1";
		}else if($nombreUsuario == "almacensantiago2"){
			$nombreUsuario = "almacensantiago2";
		}else if($nombreUsuario == "almacencapu1"){
			$nombreUsuario = "almacencapu1";
		}else if($nombreUsuario == "almacencapu2"){
			$nombreUsuario = "almacencapu2";
		}else if($nombreUsuario == "almacenlastorres1"){
			$nombreUsuario = "almacenlastorres1";
		}else if($nombreUsuario == "almacenlastorres2"){
			$nombreUsuario = "almacenlastorres2";
		}*/