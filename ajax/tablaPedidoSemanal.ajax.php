<?php
error_reporting(0);
require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";

class TablaPedidoSemanal{


	public function mostrarTablas(){

		//$fechaActual = date("Y-m-d");
		$fechaActual = "2020-07-11";
		$fechaFinal = date("Y-m-d", strtotime($fechaActual));

		$tablaInicial = "almacen".$_GET["almacen"]."1";

		/*
		$tabla = "productos AS p INNER JOIN ".$tablaInicial." AS al ON p.id = al.idProducto";
		$campos = "p.codigoProducto, p.nombreProducto, p.stockMinimoGral1, al.existenciasUnidades, al.ultimoCosto, al.fecha";
    	$parametros = "WHERE al.existenciasUnidades != 0 AND al.fecha = "."'".$fechaFinal."'";	
		*/
    	$tabla = "productos AS p INNER JOIN ".$tablaInicial." AS al ON p.id = al.idProducto";
		$campos = " MAX(p.id) as idProducto,MAX(p.codigoProducto) as codigoProducto, MAX(p.nombreProducto) as nombreProducto, MAX(p.stockMinimoGral1) as stockMinimoGral1, MAX(al.existenciasUnidades) as existenciasUnidades, MAX(al.ultimoCosto) as ultimoCosto, MAX(al.fecha) as fecha";
    	$parametros = "WHERE al.existenciasUnidades != 0 AND al.fecha = '".$fechaFinal."' group by p.codigoProducto";	

 		$porAgotarse = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);
 		
 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($porAgotarse); $i++){

	 		$stockMinimo = $porAgotarse[$i]["stockMinimoGral1"];
	 		$existencias = $porAgotarse[$i]["existenciasUnidades"];
	 		$ultimoCosto = $porAgotarse[$i]["ultimoCosto"];

	 		if ($stockMinimo >= $existencias) {
	 			$faltantantesUnidad = $stockMinimo - $existencias;
	 			$faltanteM = $ultimoCosto * $faltantantesUnidad;
	 			$faltanteMonto = $faltanteM;
	 			$indicadorFaltante = "1";
	 		}else{
	 			$indicadorFaltante = "0";
	 			$faltantantesUnidad = "<button class='btn btn-info btn-xs'>No hay Faltante</button>";
	 			$faltanteMonto = "<button class='btn btn-info btn-xs'>No hay Faltante</button>";
	 		}

	 		$indicador = $stockMinimo - 1;
	 		$indicador2 = $stockMinimo - 2;

	 		if ($existencias <= $indicador) {
	 			$indicadorEstatusFaltante = "0";
	 			$indicadorColor = "<button class='btn btn-danger btn-xs'>Pedir</button>";
	 		
	 		}else if($existencias == $indicador2){
	 			$indicadorEstatusFaltante = "1";
	 			$indicadorColor = "<button class='btn btn-warning btn-xs'>Surtir</button>";
	 		}
	 		else if($existencias > $indicador2){
	 			$indicadorEstatusFaltante = "2";
	 			$indicadorColor = "<button class='btn btn-success btn-xs'>En Stock</button>";
	 		}

	 		$fech = $porAgotarse[$i]["fecha"];
	 		$fecha = date("d/m/Y", strtotime($fech));
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			if ($indicadorFaltante == "1" and $indicadorEstatusFaltante == "0") {
				
			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$porAgotarse[$i]["codigoProducto"].'",
				      "'.$porAgotarse[$i]["nombreProducto"].'",
				      "'.$stockMinimo.'",
				      "'.$existencias.'",
				      "'.$faltantantesUnidad.'",
				      "$ '.number_format($faltanteMonto,2).'",
				      "'.$fecha.'",
				      "'.$indicadorColor.'"
				    ],';
			}else{
				
			}

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}


$activar = new TablaPedidoSemanal();
$activar -> mostrarTablas();



