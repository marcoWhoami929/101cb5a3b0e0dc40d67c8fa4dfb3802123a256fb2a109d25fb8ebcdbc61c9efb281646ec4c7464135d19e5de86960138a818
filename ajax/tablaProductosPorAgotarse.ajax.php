<?php
error_reporting(0);
session_start();
require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";

class TablaProductosPorAgotarse{


	public function mostrarTablas(){

		$tablaInicial = "almacen".$_GET["almacen"];
		$almacen = $_GET["almacen"];

		if ($tablaInicial == "almacengeneral1") {
            $campo = "stockMinimoGral1";
          }else if($tablaInicial == "almacengeneral2"){
            $campo = "stockMinimoGral2";
          }else if($tablaInicial == "almacensanmanuel1"){
            $campo = "stockMinimoSM1";
          }else if($tablaInicial == "almacensanmanuel2"){
            $campo = "stockMinimoSM2";
          }else if($tablaInicial == "almacenreforma1"){
            $campo = "stockMinimoRf1";
          }else if($tablaInicial == "almacenreforma2"){
            $campo = "stockMinimoRf2";
          }else if($tablaInicial == "almacensantiago1"){
            $campo = "stockMinimoSg1";
          }else if($tablaInicial == "almacensantiago2"){
            $campo = "stockMinimoSg2";
          }else if($tablaInicial == "almacencapu1"){
            $campo = "stockMinimoCp1";
          }else if($tablaInicial == "almacencapu2"){
            $campo = "stockMinimoCp2";
          }else if($tablaInicial == "almacenlastorres1"){
            $campo = "stockMinimoTr1";
          }else if($tablaInicial == "almacenlastorres2"){
            $campo = "stockMinimoTr2";
          }
		//$fechaActual = date("Y-m-d");
		$fechaActual = "2020-08-05";
		$fechaFinal = date("Y-m-d", strtotime($fechaActual));

		$table = $tablaInicial;
		$select = "MAX(idImportacion) AS ultimoId";
		$conditions = "WHERE fecha = '".$fechaFinal."'";
		$idDisponible = ControladorInventarios::ctrBuscarFolioDisponible($table, $select, $conditions);
		$ultimoId = $idDisponible["ultimoId"];

		$tabla = "productos AS p INNER JOIN ".$tablaInicial." AS al ON p.id = al.idProducto";
		$campos = "p.codigoProducto, p.nombreProducto, p.".$campo." AS StockMinimoTabla, al.existenciasUnidades, al.ultimoCosto, al.fecha";
    	$parametros = "WHERE al.existenciasUnidades != 0 AND al.idImportacion = ".$ultimoId." AND al.fecha = '".$fechaFinal."'";	

 		$porAgotarse = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);
 		
 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($porAgotarse); $i++){

	 		$stockMinimo = $porAgotarse[$i]["StockMinimoTabla"];
	 		$existencias = $porAgotarse[$i]["existenciasUnidades"];
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
	 			$enStock = "pedir";
	 		}else if($existencias == $indicador2){
	 			$indicadorColor = "<button class='btn btn-warning btn-xs'>Surtir</button>";
	 			$enStock = "surtir";
	 		}else if($existencias >= $indicador2){
	 			$indicadorColor = "<button class='btn btn-success btn-xs'>En Stock</button>";
	 			$enStock = "enStock";
	 		}

	 		$fech = $porAgotarse[$i]["fecha"];
	 		$fecha = date("d/m/Y", strtotime($fech));
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			if ($_SESSION["grupo"] == "Administrador") {

				if ($enStock != "enStock") {
					$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$porAgotarse[$i]["codigoProducto"].'",
				      "'.$porAgotarse[$i]["nombreProducto"].'",
				      "'.$stockMinimo.'",
				      "'.number_format($existencias,2).'",
				      "'.$faltantantesUnidad.'",
				      "'.$faltanteMonto.'",
				      "'.$fecha.'",
				      "'.$indicadorColor.'"
				    ],';
				}else{

				}
			}else{
				if ($enStock != "enStock") {
					$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$porAgotarse[$i]["codigoProducto"].'",
				      "'.$porAgotarse[$i]["nombreProducto"].'",
				      "'.$stockMinimo.'",
				      "'.number_format($existencias,2).'",
				      "'.$faltantantesUnidad.'",
				      "'.$fecha.'",
				      "'.$indicadorColor.'"
				    ],';
				}

			}

			

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

$activar = new TablaProductosPorAgotarse();
$activar -> mostrarTablas();



