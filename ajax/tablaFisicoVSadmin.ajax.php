<?php
error_reporting(0);
require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";

class TablaFisicoVSadmin{

 	/*=============================================
  	TABLA IMPORTACIONES
  	=============================================*/ 

	public function mostrarTablas(){

		$nombreUsuario = $_GET["nombreUsuario"];

		 if($nombreUsuario == "Sucursal San Manuel"){
			$tabla = "almacensanmanuel1";
		}else if($nombreUsuario == "Sucursal Reforms"){
			$tabla = "almacenreforma1";
		}else if($nombreUsuario == "Sucursal Santiago"){
			$tabla = "almacensantiago1";
		}else if($nombreUsuario == "Sucursal Capu"){
			$tabla = "almacencapu1";
		}else if($nombreUsuario == "Sucursal Las Torres"){
			$tabla = "almacenlastorres1";
		}


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
 		/*
 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($porAgotarse); $i++){

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*//*

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

		echo $datosJson;*/


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