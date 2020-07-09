<?php
error_reporting(0);
require_once "../controladores/administradores.php";
require_once "../modelos/administradores.php";

class TablaProductosPorAgotarse{

 	/*=============================================
  	TABLA IMPORTACIONES
  	=============================================*/ 

	public function mostrarTablas(){


 		$administradores = ControladorAdministradores::ctrMostrarAdministradores();


 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($administradores); $i++){

	 		if($administradores[$i]["estado"] != 0){

               	$estado = "<button type='button' class='btn btn-success btn-xs btnActivar' idUsuario='".$administradores[$i]["id"]."' estadoPerfil='0' >Activado</button>";

            }else{

                $estado = "<button type='button' class='btn btn-danger btn-xs btnActivar' idUsuario='".$administradores[$i]["id"]."' estadoPerfil='1' >Desactivado</button>";

            }

            if ($administradores[$i]["foto"] != "") {
            	$foto = "<img src='".$administradores[$i]["foto"]."' class='img-thumbnail' width='40px'></td>";
            }else{
            	$foto = "<img src='vistas/img/users/default/anonymous.png' class='img-thumbnail' width='40px'></td>";
            }

            $acciones = "<button type='button' class='btn btn-warning btnEditarPerfil' idPerfil='".$administradores[$i]["id"]."' nombreUsuario='".$administradores[$i]["nombre"]."' data-toggle='modal' data-target='#modalEditarPerfil'><i class='mdi mdi-pencil'></i> </button><button class='btn btn-danger btnEliminarPerfil' idPerfil='".$administradores[$i]["id"]."' fotoPerfil='".$administradores[$i]["foto"]."' nombre='".$administradores[$i]["nombre"]."'><i class='mdi mdi-delete-forever mdi-2x'></i></button>";

            

	 		//$acciones = "Nada por el momento";
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$administradores[$i]["nombre"].'",
				      "'.$administradores[$i]["email"].'",
				      "'.$foto.'",
				      "'.$administradores[$i]["grupo"].'",
				      "'.$administradores[$i]["perfil"].'",
				      "'.$estado.'",
				      "'.$acciones.'"
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



