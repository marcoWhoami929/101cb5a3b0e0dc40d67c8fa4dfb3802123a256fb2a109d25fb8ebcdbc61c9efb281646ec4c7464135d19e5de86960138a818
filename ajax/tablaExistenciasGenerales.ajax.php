<?php
error_reporting(0);
require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";

class TablaExistenciasGenerales{

 	/*=============================================
  	TABLA PRODUCTOS
  	=============================================*/ 

	public function mostrarTablas(){

		$tabla = "productos";
		$campos = "id, codigoProducto, nombreProducto";
    	$parametros = "";	

 		$existencias = ControladorInventarios::ctrMostrarProductosYexistencias($tabla, $campos, $parametros);
 		//var_dump($porAgotarse);
 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($existencias); $i++){

	 		$ver = "<button type='button' class='btn btn-secondary btn-md btnVerExistencias' idProducto='".$existencias[$i]["id"]."' nombreProducto='".$existencias[$i]["nombreProducto"]."' data-toggle='modal' data-target='#modalVer'><span class='mdi mdi-eye'></span></button>";

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$existencias[$i]["codigoProducto"].'",
				      "'.$existencias[$i]["nombreProducto"].'",
				      "'.$ver.'"
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

 	/*=============================================
  	TABLA PRODUCTOS
  	=============================================*/ 
  	public $existencias;
	public function mostrarExistencias(){

		$idProducto = $this->existencias;
		
		//var_dump("Id Producto: ",$idProducto);

		$tabla = "almacengeneral1 AS gr1 INNER JOIN productos as p ON gr1.idProducto = p.id INNER JOIN almacengeneral2 AS gr2 ON gr2.idProducto = p.id INNER JOIN almacensanmanuel1 AS sm1 ON sm1.idProducto = p.id INNER JOIN almacensanmanuel2 AS sm2 ON sm2.idProducto = p.id INNER JOIN almacensantiago1 AS st1 ON st1.idProducto = p.id INNER JOIN almacensantiago2 AS st2 ON st2.idProducto = p.id INNER JOIN almacenreforma1 AS rf1 ON rf1.idProducto = p.id INNER JOIN almacenreforma2 AS rf2 ON rf2.idProducto = p.id INNER JOIN almacencapu1 AS cp1 ON cp1.idProducto = p.id INNER JOIN almacencapu2 AS cp2 ON cp2.idProducto = p.id INNER JOIN almacenlastorres1 AS lt1 ON lt1.idProducto = p.id INNER JOIN almacenlastorres2 AS lt2 ON lt2.idProducto = p.id";
		
		$campos = "gr1.existenciasUnidades As existenciasGeneral1, gr2.existenciasUnidades AS existenciasGeneral2, sm1.existenciasUnidades AS existenciasSanmanuel1, sm2.existenciasUnidades AS existenciasSanmanuel2, st1.existenciasUnidades AS existenciasSantiago1, st2.existenciasUnidades AS existenciasSantiago2, rf1.existenciasUnidades AS existenciasReforma1,rf2.existenciasUnidades AS existenciasReforma2, cp1.existenciasUnidades AS existenciasCapu1, cp2.existenciasUnidades AS existenciasCapu2, lt1.existenciasUnidades AS existenciasLastorres1, lt2.existenciasUnidades AS existenciasLastorres2";
    	$parametros = "WHERE gr1.id = (SELECT MAX(gr1.id) FROM almacengeneral1 AS gr1 WHERE gr1.idProducto = ".$idProducto.") AND gr2.id = (SELECT MAX(gr2.id) FROM almacengeneral2 AS gr2 WHERE gr2.idProducto = ".$idProducto.") AND sm1.id = (SELECT MAX(sm1.id) FROM almacensanmanuel1 AS sm1 WHERE sm1.idProducto = ".$idProducto.") AND sm2.id = (SELECT MAX(sm2.id) FROM almacensanmanuel2 AS sm2 WHERE sm2.idProducto = ".$idProducto.") AND st1.id = (SELECT MAX(st1.id) FROM almacensantiago1 AS st1 WHERE st1.idProducto = ".$idProducto.") AND st2.id = (SELECT MAX(st2.id) FROM almacensantiago2 AS st2 WHERE st2.idProducto = ".$idProducto.")AND rf1.id = (SELECT MAX(rf1.id) FROM almacenreforma1 AS rf1 WHERE rf1.idProducto = ".$idProducto.") AND rf2.id = (SELECT MAX(rf2.id) FROM almacenreforma2 AS rf1 WHERE rf2.idProducto = ".$idProducto.") AND lt1.id = (SELECT MAX(lt1.id) FROM almacenlastorres1 AS lt1 WHERE lt1.idProducto = ".$idProducto.") AND lt2.id = (SELECT MAX(lt2.id) FROM almacenlastorres2 AS lt1 WHERE lt2.idProducto = ".$idProducto.")";

 		$veExistencias = ControladorInventarios::ctrMostrarProductosYexistencias($tabla, $campos, $parametros);
 		//var_dump($veExistencias);

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($veExistencias); $i++){

	 		$ver = "<button type='button' class='btn btn-secondary btn-md btnVerExistencias' idProducto='".$existencias[$i]["id"]."'  data-toggle='modal' data-target='#modalVer'><span class='mdi mdi-eye'></span></button>";

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.number_format($veExistencias[$i]["existenciasGeneral1"],2).'",
				      "'.number_format($veExistencias[$i]["existenciasGeneral2"],2).'",
				      "'.number_format($veExistencias[$i]["existenciasSanmanuel1"],2).'",
				      "'.number_format($veExistencias[$i]["existenciasSanmanuel2"],2).'",
				      "'.number_format($veExistencias[$i]["existenciasSantiago1"],2).'",
				      "'.number_format($veExistencias[$i]["existenciasSantiago2"],2).'",
				      "'.number_format($veExistencias[$i]["existenciasReforma1"],2).'",
				      "'.number_format($veExistencias[$i]["existenciasReforma2"],2).'",
				      "'.number_format($veExistencias[$i]["existenciasCapu1"],2).'",
				      "'.number_format($veExistencias[$i]["existenciasCapu2"],2).'",
				      "'.number_format($veExistencias[$i]["existenciasLastorres1"],2).'",
				      "'.number_format($veExistencias[$i]["existenciasLastorres2"],2).'"
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
if (isset($_GET["Productos"])) { 
$activar = new TablaExistenciasGenerales();
$activar -> mostrarTablas();
}else if (isset($_POST["Existencias"])) { 
$activar = new TablaExistenciasGenerales();
$activar -> existencias = $_POST["Existencias"];
$activar -> mostrarExistencias();
}


