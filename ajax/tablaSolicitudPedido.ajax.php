<?php
error_reporting(0);
session_start();

//$session_id= session_id();
require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";

class TablaSolicitudPedido{


	public function mostrarTablas(){
		$idSesion = $_SESSION["id"];

		$fechaActual = date("Y-m-d");
		//$fechaActual = "2020-08-05";
		$fechaFinal = date("Y-m-d", strtotime($fechaActual));

		$tipoPedido = $_GET["tipodePedido"];

		$tablaInicial = "almacen".$_GET["almacen"]."1";

		switch ($_GET["almacen"]) {
			case 'general':
				$almacen = "solicitadoGral1";
				$campo = "stockMinimoGral1";
				break;
			case 'sanmanuel':
				$almacen = "solicitadoSM1";
				$campo = "stockMinimoSM1";
				break;
			case 'reforma':
				$almacen = "solicitadoRf1";
				$campo = "stockMinimoRf1";
				break;
			case 'santiago':
				$almacen = "solicitadoSg1";
				$campo = "stockMinimoSg1";
				break;
			case 'capu':
				$almacen = "solicitadoCp1";
				$campo = "stockMinimoCp1";
				break;
			case 'lastorres':
				$almacen = "solicitadoTr1";
				$campo = "stockMinimoTr1";
				break;
			
			
		}

		if ($tipoPedido == "pedidoManual") {

			$tabla = "productos AS p INNER JOIN temp_productos AS t ON p.id = t.id_producto INNER JOIN ".$tablaInicial." AS al ON p.id = al.idProducto";
			$campos = "p.id AS idProducto,p.codigoProducto AS codigoProducto, p.nombreProducto AS nombreProducto, p.".$campo." AS stockMinimo, t.cantidad_tmp AS solicitado, al.existenciasUnidades AS existenciasUnidades, al.ultimoCosto AS ultimoCosto, al.fecha AS fecha";
			$parametros = "WHERE t.idSesion = ".$idSesion." AND al.idImportacion = (SELECT MAX(al.idImportacion) FROM ".$tablaInicial." as al WHERE al.idProducto = t.id_producto)";
			
		}else{

			$tabla = "productos AS p INNER JOIN ".$tablaInicial." AS al ON p.id = al.idProducto";
			$campos = " MAX(p.id) as idProducto,MAX(p.codigoProducto) as codigoProducto, MAX(p.nombreProducto) as nombreProducto, MAX(p.".$campo.") as stockMinimo, MAX(al.existenciasUnidades) as existenciasUnidades, MAX(al.ultimoCosto) as ultimoCosto, MAX(al.fecha) as fecha,p.".$almacen." as solicitado";
    		$parametros = "WHERE  al.existenciasUnidades != 0 AND al.fecha = '".$fechaFinal."' group by p.codigoProducto";
			
		}

 		$pedido = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);

 		$arregloUnidades = 0;
 		$arregloMonto = 0;
 		
 		$datosJson = '{
		 
	 	"data": [ ';

	 	$datosJson2 = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($pedido); $i++){

	 		$stockMinimo = $pedido[$i]["stockMinimo"];
	 		$existencias = $pedido[$i]["existenciasUnidades"];
	 		$ultimoCosto = $pedido[$i]["ultimoCosto"];

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

	 		if ($pedido[$i]["solicitado"] == "0") {
	 			$cantidadSolicitada = "<input type='text' class='form-control cantidadPedidoSolicitado' id='cantidad$i' idProducto='".$pedido[$i]["idProducto"]."' value='".$faltantantesUnidad."' onChange='cargarCantidad(this.id);'>";
	 			$montoFaltanteSolicitado =  $faltantantesUnidad * $ultimoCosto;

	 			$unidades = number_format($faltantantesUnidad,2, '.', '');

	 			$monto = number_format($montoFaltanteSolicitado,2, '.', '');
	 		}else{
	 			$cantidadSolicitada = "<input type='text' class='form-control cantidadPedidoSolicitado' id='cantidad$i' idProducto='".$pedido[$i]["idProducto"]."' value='".$pedido[$i]["solicitado"]."' onChange='cargarCantidad(this.id);'>";
	 			$montoFaltanteSolicitado =  $pedido[$i]["solicitado"] * $ultimoCosto;

	 			$unidades = number_format($pedido[$i]["solicitado"],2, '.', '');

	 			$monto = number_format($montoFaltanteSolicitado,2, '.', '');
	 		}
	 		

	 		
	 		$montoSolicitado = "<input type='text' class='form-control importePedidoSolicitado' id='importeSolicitado$i' value='".number_format($montoFaltanteSolicitado,2, '.', '')."' disabled>";

	 		$arregloUnidades += $unidades;
	 		$arregloMonto += $monto;

	 		if (number_format($faltantantesUnidad) == $unidades) {
	 			$estatus = "<button type='button' class='btn btn-success'></button>";
	 		}else if (number_format($faltantantesUnidad) > $unidades){
	 			$estatus = "<button type='button' class='btn btn-warning'></button>";
	 		}else if (number_format($faltantantesUnidad) < $unidades){
	 			$estatus = "<button type='button' class='btn btn-danger'></button>";
	 		}
	 		


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			if ($_SESSION["grupo"] == "Administrador") {

				if ($tipoPedido == "pedidoManual") {
					$datosJson	 .= '[
						   
						      "<strong>'.$pedido[$i]["codigoProducto"].'</strong>",
						      "'.$pedido[$i]["nombreProducto"].'",
						      "'.$existencias.'",
						      "'.$faltantantesUnidad.'",
						      "'.$cantidadSolicitada.'",
						      "$ '.number_format($faltanteMonto,2).'",
						      "$ '.$montoSolicitado.'",
						      "'.$estatus.'"
						    ],';

					$datosJson2	 .= '[
						   	  "'.$pedido[$i]["idProducto"].'",
						      "'.$existencias.'",
						      "'.$faltantantesUnidad.'",
						      "'.$unidades.'",
						      "'.number_format($faltanteMonto,2,'.', '').'",
						      "'.number_format($montoFaltanteSolicitado,2,'.', '').'"
						    ],';
				}else{

					if ($indicadorFaltante == "1" and $indicadorEstatusFaltante == "0") {
				
						$datosJson	 .= '[
							   
							      "<strong>'.$pedido[$i]["codigoProducto"].'</strong>",
							      "'.$pedido[$i]["nombreProducto"].'",
							      "'.$existencias.'",
							      "'.$faltantantesUnidad.'",
							      "'.$cantidadSolicitada.'",
							      "$ '.number_format($faltanteMonto,2).'",
							      "$ '.$montoSolicitado.'",
							      "'.$estatus.'"
							    ],';

						$datosJson2	 .= '[
							   	  "'.$pedido[$i]["idProducto"].'",
							      "'.$existencias.'",
							      "'.$faltantantesUnidad.'",
							      "'.$unidades.'",
							      "'.number_format($faltanteMonto,2,'.', '').'",
							      "'.number_format($montoFaltanteSolicitado,2,'.', '').'"
							    ],';
					}else{
							
					}

				}
				
				
			}else{
				if ($tipoPedido == "pedidoManual") {

					$datosJson	 .= '[
						   
						      "<strong>'.$pedido[$i]["codigoProducto"].'</strong>",
						      "'.$pedido[$i]["nombreProducto"].'",
						      "'.$existencias.'",
						      "'.$faltantantesUnidad.'",
						      "'.$cantidadSolicitada.'",
						      
						      "'.$estatus.'"
						    ],';

					$datosJson2	 .= '[
						   	  "'.$pedido[$i]["idProducto"].'",
						      "'.$existencias.'",
						      "'.$faltantantesUnidad.'",
						      "'.$unidades.'",
						      "'.number_format($faltanteMonto,2,'.', '').'",
						      "'.number_format($montoFaltanteSolicitado,2,'.', '').'"
						    ],';

				}else{

					if ($indicadorFaltante == "1" and $indicadorEstatusFaltante == "0") {
				
						$datosJson	 .= '[
							   
							      "<strong>'.$pedido[$i]["codigoProducto"].'</strong>",
							      "'.$pedido[$i]["nombreProducto"].'",
							      "'.$existencias.'",
							      "'.$faltantantesUnidad.'",
							      "'.$cantidadSolicitada.'",
							      
							      "'.$estatus.'"
							    ],';

						$datosJson2	 .= '[
							   	  "'.$pedido[$i]["idProducto"].'",
							      "'.$existencias.'",
							      "'.$faltantantesUnidad.'",
							      "'.$unidades.'",
							      "'.number_format($faltanteMonto,2,'.', '').'",
							      "'.number_format($montoFaltanteSolicitado,2,'.', '').'"
							    ],';
					}else{
							
					}

				}

			}

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		$datosJson2 = substr($datosJson2, 0, -1);

		$datosJson2.=  ']
			  
		}'; 
		$_SESSION["cantidadSolicitada"] = $arregloUnidades;
		$_SESSION["montoSolicitado"] = $arregloMonto;
		$_SESSION["pedidoSemanal"] = $datosJson2;

		echo $datosJson;


 	}

}

$activar = new TablaSolicitudPedido();
$activar -> mostrarTablas();



