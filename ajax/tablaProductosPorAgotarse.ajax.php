<?php
error_reporting(0);
require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";

class TablaProductosPorAgotarse{


	public function mostrarTablas(){

		$tablaInicial = "almacen".$_GET["almacen"];
		//$fechaActual = date("Y-m-d");
		$fechaActual = "2020-07-11";
		$fechaFinal = date("Y-m-d", strtotime($fechaActual));

		$table = $tablaInicial;
		$select = "MAX(idImportacion) AS ultimoId";
		$conditions = "WHERE fecha = '".$fechaFinal."'";
		$idDisponible = ControladorInventarios::ctrBuscarFolioDisponible($table, $select, $conditions);
		$ultimoId = $idDisponible["ultimoId"];

		$tabla = "productos AS p INNER JOIN ".$tablaInicial." AS al ON p.id = al.idProducto";
		$campos = "p.codigoProducto, p.nombreProducto, p.stockMinimoGral1, al.existenciasUnidades, al.ultimoCosto, al.fecha";
    	$parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = ".$ultimoId." AND al.fecha = '".$fechaFinal."'";	

 		$porAgotarse = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);
 		//var_dump($porAgotarse);
 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($porAgotarse); $i++){

	 		$stockMinimo = $porAgotarse[$i]["stockMinimoGral1"];
	 		$existencias = number_format($porAgotarse[$i]["existenciasUnidades"],2);
	 		$ultimoCosto = $porAgotarse[$i]["ultimoCosto"];

	 		if ($stockMinimo > $existencias) {
	 			$faltantantesU = $stockMinimo - $existencias;
	 			$faltantantesUnidad = number_format($faltantantesU,2);
	 			$faltanteM = $ultimoCosto * $faltantantesUnidad;
	 			$faltanteMonto = "$ ".number_format($faltanteM,2);
	 		}else{
	 			$faltantantesUnidad = "<button class='btn btn-info btn-xs'>No hay Faltante</button>";
	 			$faltanteMonto = "<button class='btn btn-info btn-xs'>No hay Faltante</button>";
	 		}

	 		$indicador = $stockMinimo - 1;
	 		$indicador2 = $stockMinimo - 2;

	 		if ($existencias <= $indicador) {
	 			$indicadorColor = "<button class='btn btn-danger btn-xs'>Pedir</button>";
	 		}else if($existencias == $indicador2){
	 			$indicadorColor = "<button class='btn btn-warning btn-xs'>Surtir</button>";
	 		}else if($existencias >= $indicador2){
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

$activar = new TablaProductosPorAgotarse();
$activar -> mostrarTablas();



