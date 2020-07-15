<?php
error_reporting(0);
require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";

class TablaProductosPorAgotarse{

 	/*=============================================
  	TABLA IMPORTACIONES
  	=============================================*/ 

	public function mostrarTablas(){

		//$fechaActual = date("Y-m-d");
		$fechaActual = "2020-07-11";
		$fechaFinal = date("Y-m-d", strtotime($fechaActual));

		$tablaInicial = "almacen".$_GET["almacen"];

		$tabla = "productos AS p INNER JOIN ".$tablaInicial." AS al ON p.id = al.idProducto";
		$campos = "p.codigoProducto, p.nombreProducto, p.stockMinimoGral1, al.existenciasUnidades, al.ultimoCosto, al.fecha";
    	$parametros = "WHERE al.existenciasUnidades != 0 AND al.fecha = "."'".$fechaFinal."'";	

 		$porAgotarse = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);
 		//var_dump($porAgotarse);
 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($porAgotarse); $i++){

	 		$stockMinimo = $porAgotarse[$i]["stockMinimoGral1"];
	 		$existencias = $porAgotarse[$i]["existenciasUnidades"];
	 		$ultimoCosto = $porAgotarse[$i]["ultimoCosto"];

	 		if ($stockMinimo > $existencias) {
	 			$faltantantesUnidad = $stockMinimo - $existencias;
	 			$faltanteM = $ultimoCosto * $faltantantesUnidad;
	 			$faltanteMonto = "$ ".$faltanteM;
	 		}else{
	 			$faltantantesUnidad = "<button class='btn btn-info btn-xs'>No hay Faltante</button>";
	 			$faltanteMonto = "<button class='btn btn-info btn-xs'>No hay Faltante</button>";
	 		}

	 		$indicador = $stockMinimo + 1;
	 		$indicador2 = $stockMinimo + 2;

	 		if ($existencias <= $indicador) {
	 			$indicadorColor = "<button class='btn btn-danger btn-xs'>Pedir</button>";
	 		}else if($existencias == $indicador2){
	 			$indicadorColor = "<button class='btn btn-warning btn-xs'>Surtir</button>";
	 		}else if($existencias > $indicador2){
	 			$indicadorColor = "<button class='btn btn-success btn-xs'>En Stock</button>";
	 		}

	 		$fech = $porAgotarse[$i]["fecha"];
	 		$fecha = date("d/m/Y", strtotime($fech));
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
				      "'.$fecha.'",
				      "'.$indicadorColor.'"
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



