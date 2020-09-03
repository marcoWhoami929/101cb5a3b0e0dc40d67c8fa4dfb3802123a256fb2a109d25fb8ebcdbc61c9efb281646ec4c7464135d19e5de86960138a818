<?php
error_reporting(0);
session_start();
require_once "../controladores/inventarios.php";
require_once "../modelos/inventarios.php";

class TablaRevision{

 	/*=============================================
  	TABLA REVISION INVENTARIO FISICO
  	=============================================*/ 

	public function revisionInventarioFisico(){

		
		$tabla = "inventariofisico AS i LEFT OUTER JOIN familias AS f ON i.idFamilia = f.id";
		$campos = "i.*, f.nombre";
    	$parametros = "";

 		$revision = ControladorInventarios::ctrRevisionFisicos($tabla, $campos, $parametros);
 		
 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($revision); $i++){

	 		$acciones = "<button type='button' class='btn btn-secondary btn-sm btnVerDetalleinvFisico' idRevision='".$revision[$i]["id"]."'><i class='fa fa-eye fa-1x'></i>Detalle</button>";

	 		

	 		if ($revision[$i]["nombre"] != "") {
	 			$nombre = $revision[$i]["nombre"];
	 		}else{
	 			$nombre = "<button class='btn btn-info btn-xs'>No Hay Datos</button>";
	 		}


	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$revision[$i]["sucursal"].'",
				      "'.$revision[$i]["descripcion"].'",
				      "'.$revision[$i]["tipoInventario"].'",
				      "'.$nombre.'",
				      "'.$revision[$i]["fecha"].'",
				      "'.$acciones.'"
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

 	/*=============================================
  	TABLA REVISION INVENTARIO FISICO
  	=============================================*/ 

	public function detalleRevisionInventarioFisico(){

		$idRevision = $_GET["idFisico"];
		$tabla = "productoscnfisico AS al INNER JOIN productos AS p ON al.idProducto = p.id";
		$campos = "al.idProducto, p.codigoProducto, p.nombreProducto, al.entradas, al.salidas, al.existencias, al.existenciasFisicas, al.fechaInventarioFisico";
    	$parametros = "WHERE al.idFisico = ".$idRevision;

 		$revision = ControladorInventarios::ctrDetalleRevisionFisicos($tabla, $campos, $parametros);
 		
 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($revision); $i++){

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			$existencias = $revision[$i]["existencias"];
			$existenciasFisicas = $revision[$i]["existenciasFisicas"];

			if ($existencias < $existenciasFisicas) {
				$diferencia = $existenciasFisicas - $existencias;
				$status = "<button class='btn btn-info btn-xs'>Sobrante</button>";
			}else if ($existenciasFisicas < $existencias) {
				$diferencia = $existencias - $existenciasFisicas;
				$status = "<button class='btn btn-danger btn-xs'>Faltante</button>";
			}else if ($existenciasFisicas == $existencias) {
				$diferencia = 0;
				$status = "<button class='btn btn-success btn-xs'>Equilibrado</button>";
			}

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$revision[$i]["codigoProducto"].'",
				      "'.$revision[$i]["nombreProducto"].'",
				      "'.$revision[$i]["entradas"].'",
				      "'.$revision[$i]["salidas"].'",
				      "'.$existencias.'",
				      "'.$existenciasFisicas.'",
				      "'.$diferencia.'",
				      "'.$status.'",
				      "'.$revision[$i]["fechaInventarioFisico"].'"
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}
}

if (isset($_GET["Revision"])) {
	$activar = new TablaRevision();
	$activar -> revisionInventarioFisico();

}else if (isset($_GET["Detalle"])) {
	$activar = new TablaRevision();
	$activar -> detalleRevisionInventarioFisico();
}
