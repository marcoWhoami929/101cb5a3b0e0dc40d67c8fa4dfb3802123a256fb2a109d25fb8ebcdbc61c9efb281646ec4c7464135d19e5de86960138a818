<?php
error_reporting(0);
require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";

class TablaAlmacenes{

 	/*=============================================
  	TABLA ALMACENES
  	=============================================*/ 

	public function mostrarTablas(){
		//$fechaActual = date("Y-m-d");
		$fechaActual = "2020-07-11";
		$fechaFinal = date("Y-m-d", strtotime($fechaActual));	

		$almacen = "almacen".$_GET["almacen"];

		if ($almacen == "almacengeneral1") {
				$campo = "stockMinimoGral1";
			}else if($almacen == "almacengeneral2"){
				$campo = "stockMinimoGral2";
			}else if($almacen == "almacensanmanuel1"){
				$campo = "stockMinimoSM1";
			}else if($almacen == "almacensanmanuel2"){
				$campo = "stockMinimoSM2";
			}else if($almacen == "almacenreforma1"){
				$campo = "stockMinimoRf1";
			}else if($almacen == "almacenreforma2"){
				$campo = "stockMinimoRf1";
			}else if($almacen == "almacensantiago1"){
				$campo = "stockMinimoSg1";
			}else if($almacen == "almacensantiago2"){
				$campo = "stockMinimoSg1";
			}else if($almacen == "almacencapu1"){
				$campo = "stockMinimoCp1";
			}else if($almacen == "almacencapu2"){
				$campo = "stockMinimoCp2";
			}else if($almacen == "almacenlastorres1"){
				$campo = "stockMinimoTr1";
			}else if($almacen == "almacenlastorres2"){
				$campo = "stockMinimoTr2";
			}

		$tabla = $almacen." as alm INNER JOIN productos as prod ON alm.idProducto = prod.id";

		$campos = "COUNT(IF(alm.salidasUnidades > 0,1,null)) AS conteo, alm.id, alm.idProducto, prod.codigoProducto, prod.nombreProducto, SUM(alm.entradasUnidades) AS totalEntradas, alm.entradasUnidades,SUM(alm.salidasUnidades) AS totalSalidas,alm.salidasUnidades, prod.".$campo." AS stockMinimo, SUM(alm.existenciasUnidades) AS totalExistencias, MAX(alm.existenciasUnidades) AS existenciasUnidades, MAX(alm.entradasImportes) AS entradasImportes, MAX(alm.salidasImportes) AS salidasImportes, MAX(alm.existenciaImportes) AS existenciaImportes, MAX(alm.ultimoCosto) AS ultimoCosto, MAX(alm.totalUltCosto) AS totalUltCosto";
		$parametros = "GROUP BY alm.idProducto";

 		$almacenes = ControladorInventarios::ctrMostrarDatosAlmacenes($tabla, $campos, $parametros);
 		$totalPromedio = ControladorInventarios::ctrCalcularTotalesPromedio($almacen);

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($almacenes); $i++){

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$costoPromedio = $almacenes[$i]["ultimoCosto"];
			$salidas = $almacenes[$i]["salidasUnidades"];
			$valorTotal = $costoPromedio * $salidas;

			$valorTotalPromedio  = $totalPromedio["totalPromedio"];

			$participacionRelativaInventario = $valorTotal / $valorTotalPromedio;

			if ($i == 0) {

				$participacionAcumuladaInventario2 = $participacionRelativaInventario;
				$participacionFinal += $participacionAcumuladaInventario2*100;

			}else{

				$puntero = $i-1;
				$costoPromedio2 = $almacenes[$puntero]["ultimoCosto"];
				$salidas2 = $almacenes[$puntero]["salidasUnidades"];
				$valorTotal2 = $costoPromedio2 * $salidas2;

				$valorTotalPromedio2  =$totalPromedio["totalPromedio"];

				$participacionRelativaInventario2 = $valorTotal2 / $valorTotalPromedio2;

				$participacionAcumuladaInventario2 = $participacionRelativaInventario;

				$participacionFinal += $participacionAcumuladaInventario2*100;
			}
			$stockMinimo = $almacenes[$i]["stockMinimo"];
			if ($participacionFinal <= 85) {
					
				  $clasificacion = "<span class='badge badge-pill badge-success'>A</span>";		
				  $stockMaximo = $stockMinimo * 1.5;
			}else if($participacionFinal <= 95){

				  $clasificacion = "<span class='badge badge-pill badge-warning'>B</span>";
				  $stockMaximo = $stockMinimo * 1.25;
			}else{

				  $clasificacion = "<span class='badge badge-pill badge-danger'>C</span>";
				  $stockMaximo = $stockMinimo * 1;
			}
			$seguro = ($stockMaximo - $stockMinimo)/2;
			$stockSeguridad = $seguro + $stockMinimo;

			$conteo = $almacenes[$i]["conteo"];
			$divicion = (1/6) * $conteo;
			$porcentaje = $divicion * 100;

			if ($porcentaje > 74.999 && $porcentaje <= 100) {
				$clasificacionJ = "<span class='badge badge-pill badge-success'>A</span>";
				$rotacion = "<button class='btn btn-success btn-xs'>Buena</button>";	
			}else if ($porcentaje < 75 && $porcentaje > 49.999) {
				$clasificacionJ = "<span class='badge badge-pill badge-warning'>B</span>";
				$rotacion = "<button class='btn btn-warning btn-xs'>Mediana</button>";	
			}else if ($porcentaje < 50 && $porcentaje > 24.999) {
				$clasificacionJ = "<span class='badge badge-pill badge-danger'>C</span>";
				$rotacion = "<button class='btn btn-danger btn-xs'>Regular</button>";
			}else if($porcentaje < 25 && $porcentaje >= 0){
				$clasificacionJ = "<span class='badge badge-pill badge-primary'>D</span>";
				$rotacion = "<button class='btn btn-primary btn-xs'>Mala</button>";
			}

			$datosJson	 .= '[
				      "'.$almacenes[$i]["id"].'",
				      "'.$almacenes[$i]["codigoProducto"].'",
				      "'.$almacenes[$i]["nombreProducto"].'",
				      "'.$almacenes[$i]["totalEntradas"].'",
				      "'.$almacenes[$i]["entradasUnidades"].'",
				      "'.$almacenes[$i]["totalSalidas"].'",
				      "'.$almacenes[$i]["salidasUnidades"].'",
				      "'.number_format($almacenes[$i]["totalExistencias"],2).'",
				      "'.number_format($almacenes[$i]["existenciasUnidades"],2).'",
				      "'.$stockMinimo.'",
				      "'.round($stockSeguridad).'",
				      "'.round($stockMaximo).'",
				      "$ '.number_format($almacenes[$i]["entradasImportes"],2).'",
				      "$ '.number_format($almacenes[$i]["salidasImportes"],2).'",
				      "$ '.number_format($almacenes[$i]["existenciaImportes"],2).'",
				      "'.number_format($porcentaje,3).'",
				      "'.$rotacion.'",
				      "'.$clasificacionJ.'",
				      "'.$clasificacion.'"


				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
 TABLA DE ALMACENES
=============================================*/ 
$activar = new TablaAlmacenes();
$activar -> mostrarTablas();



