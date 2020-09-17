<?php
error_reporting(0);
session_start();
require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";

class TablaInventarioFisico{

 	/*=============================================
  	TABLA IMPORTACIONES
  	=============================================*/ 

	public function inventarioFisico(){

		$tipoInventario = $_GET["clasificarInventario"];
		$idFamilia = $_GET["familia"];
		$nameSesion = $_SESSION["nombre"];
		$grupoSesion = $_SESSION["grupo"];
		$statusInventario = $_GET["tipo"];
		

		if ($grupoSesion = "Administrador") {
			if ($statusInventario == "cerrado") {
		    		$almacen = "general1";
		    	}else{
		    		$almacen = "general2";
		    	}
		}

		switch ($nameSesion) {
		    case "Sucursal San Manuel":
		    	if ($statusInventario == "cerrado") {
		    		$almacen = "sanmanuel1";
		    	}else{
		    		$almacen = "sanmanuel2";
		    	}
		      break;
		    case "Sucursal Capu":
		    	if ($statusInventario == "cerrado") {
		    		$almacen = "capu1";
		    	}else{
		    		$almacen = "capu2";
		    	}
		      break;
		    case "Sucursal Reforma":
		    	if ($statusInventario == "cerrado") {
		    		$almacen = "reforma1";
		    	}else{
		    		$almacen = "reforma2";
		    	}
		      break;
		    case "Sucursal Santiago":
		    	if ($statusInventario == "cerrado") {
		    		$almacen = "santiago1";
		    	}else{
		    		$almacen = "santiago2";
		    	}
		      break;
		    case "Sucursal Las Torres":
		    	if ($statusInventario == "cerrado") {
		    		$almacen = "lastorres1";
		    	}else{
		    		$almacen = "lastorres2";
		    	}
		      break;
		  }

		$table = "almacen".$almacen;

		if ($tipoInventario == "") {
		 	$tabla = $table." AS al INNER JOIN productos AS p ON al.idProducto = p.id";
			$campos = "al.id, al.idProducto, p.codigoProducto, p.nombreProducto, al.entradasUnidades, al.salidasUnidades, al.existenciasUnidades, al.existenciaFisica";
    		$parametros = "WHERE idImportacion = (SELECT MAX(al.idImportacion) FROM ".$table." AS al)";
		 } else if ($tipoInventario == "general") {

			$tabla = $table." AS al INNER JOIN productos AS p ON al.idProducto = p.id";
			$campos = "al.id, al.idProducto, p.codigoProducto, p.nombreProducto, al.entradasUnidades, al.salidasUnidades, al.existenciasUnidades, al.existenciaFisica";
    		$parametros = "WHERE idImportacion = (SELECT MAX(al.idImportacion) FROM ".$table." AS al)";
			
		}else{
			$tabla = $table." AS al INNER JOIN productos AS p ON al.idProducto = p.id";
			$campos = "al.id, al.idProducto, p.codigoProducto, p.nombreProducto, al.entradasUnidades, al.salidasUnidades, al.existenciasUnidades, al.existenciaFisica";
    		$parametros = "WHERE p.idFamilia = ".$idFamilia." AND idImportacion = (SELECT MAX(al.idImportacion) FROM ".$table." AS al)";
		}

 		$inventarioFisico = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);
 		
 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($inventarioFisico); $i++){

	 		$existenciaFisica = $inventarioFisico[$i]["existenciaFisica"];
	 		$existenciasUnidades = $inventarioFisico[$i]["existenciasUnidades"];

	 		if ($tipoInventario != "") {
	 			$input = "<input class='form-control input-md' name='cantidadFisico' id='cantidadFisico$i' style='width:100%;text-align:center;' idProductoF='".$inventarioFisico[$i]["idProducto"]."' idTabla='".$inventarioFisico[$i]["id"]."' value='".$existenciaFisica."' onChange='cargarCantidadFisico(this.id);'>";
	 		}else{
	 			$input = "<input class='form-control input-md' name='cantidadFisico' id='cantidadFisico' style='width:100%;text-align:center;' value='".$existenciaFisica."' disabled>";
	 		}

	 		if ($existenciaFisica == "") {
	 		 	$diferencia = 0;
	 		 	$status = "<button class='btn btn-warning btn-xs'>Sin Datos</button>";
	 		 } else if ($existenciaFisica < $existenciasUnidades) {
	 			$diferencia = $existenciasUnidades - $existenciaFisica;
	 			$status = "<button class='btn btn-danger btn-xs'>Faltante</button>";
	 		}else if ($existenciaFisica > $existenciasUnidades) {
	 			$diferencia = $existenciaFisica - $existenciasUnidades;
	 			$status = "<button class='btn btn-info btn-xs'>Sobrante</button>";
	 		}else if ($existenciaFisica == $existenciasUnidades) {
	 			$diferencia = 0;
	 			$status = "<button class='btn btn-success btn-xs'>Equilibrado</button>";
	 		}
	 		
	 		

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$inventarioFisico[$i]["codigoProducto"].'",
				      "'.$inventarioFisico[$i]["nombreProducto"].'",
				      "'.$inventarioFisico[$i]["entradasUnidades"].'",
				      "'.$inventarioFisico[$i]["salidasUnidades"].'",
				      "'.$existenciasUnidades.'",
				      "'.$input.'",
				      "'.$diferencia.'",
				      "'.$status.'"
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
$activar = new TablaInventarioFisico();
$activar -> inventarioFisico();
