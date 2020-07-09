<?php
error_reporting(0);
require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";

class TablaAlmacenes{

 	/*=============================================
  	TABLA ALMACENES
  	=============================================*/ 

	public function mostrarTablas(){	

		$almacen = "almacen".$_GET["almacen"];

 		$almacenes = ControladorInventarios::ctrMostrarDatosAlmacenes($almacen);
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

			$valorTotalPromedio  =$totalPromedio["totalPromedio"];

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

				$participacionFinal +=  $participacionAcumuladaInventario2*100;
			}

			if ($participacionFinal <= 85) {
					
				  $clasificacion = "<span class='badge badge-pill badge-success'>A</span>";		

			}else if($participacionFinal <= 95){

				  $clasificacion = "<span class='badge badge-pill badge-warning'>B</span>";

			}else{

				  $clasificacion = "<span class='badge badge-pill badge-danger'>C</span>";	
			}
		

			$datosJson	 .= '[
				      "'.$almacenes[$i]["id"].'",
				      "'.$almacenes[$i]["codigoProducto"].'",
				      "'.$almacenes[$i]["nombreProducto"].'",
				      "'.$almacenes[$i]["entradasUnidades"].'",
				      "'.$almacenes[$i]["salidasUnidades"].'",
				      "'.$almacenes[$i]["existenciasUnidades"].'",
				      "$ '.number_format($almacenes[$i]["entradasImportes"],2).'",
				      "$ '.number_format($almacenes[$i]["salidasImportes"],2).'",
				      "$ '.number_format($almacenes[$i]["existenciaImportes"],2).'",
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



