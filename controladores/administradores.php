<?php

class ControladorAdministradores{

	/*=============================================
	login DE ADMINISTRADOR
	=============================================*/

	public function ctrIngresoAdministrador(){

		if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){
			   
			$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
						
			$tabla = "administradores";
			$item = "email";
			$valor = $_POST["ingEmail"];

			$respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

			if($respuesta["email"] == $_POST["ingEmail"] && $respuesta["password"] == $encriptar){

				if($respuesta["estado"] == 1 && $respuesta["grupo"] == "Administrador"){

					$_SESSION["validarSesionBackend"] = "ok";
					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["nombre"] = $respuesta["nombre"];
					$_SESSION["foto"] = $respuesta["foto"];
					$_SESSION["email"] = $respuesta["email"];
					$_SESSION["password"] = $respuesta["password"];
					$_SESSION["grupo"] = $respuesta["grupo"]; 
					$_SESSION["perfil"] = $respuesta["perfil"];
					$_SESSION["departamento"] = $respuesta["departamento"];

					echo '<script>

						window.location = "dashboard";

					</script>';

				}else if($respuesta["estado"] == 1 && $respuesta["grupo"] == "Sucursales"){

					$_SESSION["validarSesionBackend"] = "ok";
					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["nombre"] = $respuesta["nombre"];
					$_SESSION["foto"] = $respuesta["foto"];
					$_SESSION["email"] = $respuesta["email"];
					$_SESSION["password"] = $respuesta["password"];
					$_SESSION["grupo"] = $respuesta["grupo"]; 
					$_SESSION["perfil"] = $respuesta["perfil"];
					$_SESSION["departamento"] = $respuesta["departamento"];

					echo '<script>

						window.location = "dashboard";

					</script>';

				}else{
					echo '<script>
						swal({

							type: "error",
							title: "¡Este usuario aún no está activado!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){
								
								window.location = "login";

							}

						});
						
					</script>';	
				}

			}else{
				echo '<script>
					swal({

					type: "error",
					title: "¡Contraseña incorrecta!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"

				}).then(function(result){

					if(result.value){
						
						window.location = "login";

					}

				});

				</script>';	

			}
		}
	}

	static public function ctrMostrarAdministradores(){

		$tabla = "administradores";
		$item = null;
		$valor = null;

		$respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

		return $respuesta;
	}

	/**
	 * CREAR NUEVO USUARIO
	 */
	static public function ctrCrearUsuario(){

		if(isset($_POST["nuevoPerfil"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

			   	/*----VALIDAR IMAGEN----*/

				$ruta = "";

				if(isset($_FILES["nuevaFoto"]["tmp_name"]) && !empty($_FILES["nuevaFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;


					/*----DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP----*/

					if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

						/*----GUARDAMOS LA IMAGEN EN EL DIRECTORIO----*/
						$aleatorio = mt_rand(100,999);
						$ruta = "vistas/img/users/".$aleatorio.".jpg";
						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaFoto"]["type"] == "image/png"){

						/*----GUARDAMOS LA IMAGEN EN EL DIRECTORIO---*/
						$aleatorio = mt_rand(100,999);
						$ruta = "vistas/img/users/".$aleatorio.".png";
						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $ruta);

					}

				}

				$tabla = "administradores";

				$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datos = array("nombre" => $_POST["nuevoNombre"],
					           "email" => $_POST["nuevoEmail"],
					           "password" => $encriptar,
					           "grupo" => $_POST["nuevoGrupo"],
					           "perfil" => $_POST["nuevoPerfil"],			       
					           "foto"=>$ruta,
					           "estado" => 1);

				$respuesta = ModeloAdministradores::mdlIngresarUsuario($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>
					swal({

						type: "success",
						title: "¡El Usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "administradores";

						}

					});
					</script>';
				}	

			}else{

				echo '<script>
					swal({

						type: "error",
						title: "¡El perfil no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "administradores";

						}

					});
				</script>';

			}
		}
	}
	/**
	 * EDITAR DATOS DEL USUARIO
	 */
	static public function ctrEditarUsuario(){

		if(isset($_POST["idPerfil"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				/*----VALIDAR IMAGEN----*/
				$ruta = $_POST["fotoActual"];

				if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*----PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD----*/
					if(!empty($_POST["fotoActual"])){

						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755);

					}	

					/*----DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP----*/
					if($_FILES["editarFoto"]["type"] == "image/jpeg"){

						/*----GUARDAMOS LA IMAGEN EN EL DIRECTORIO----*/
						$aleatorio = mt_rand(100,999);
						$ruta = "vistas/img/users/".$aleatorio.".jpg";
						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarFoto"]["type"] == "image/png"){

						/*----GUARDAMOS LA IMAGEN EN EL DIRECTORIO----*/
						$aleatorio = mt_rand(100,999);
						$ruta = "vistas/img/users/".$aleatorio.".png";
						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $ruta);

					}

				}

				$tabla = "administradores";

				if($_POST["editarPassword"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

						$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					}else{

						echo'<script>
								swal({
									  type: "error",
									  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar"
									  }).then(function(result) {
										if (result.value) {

										window.location = "perfiles";

										}
									})
						  	</script>';

					}

				}else{

					$encriptar = $_POST["passwordActual"];

				}

				$datos = array("id" => $_POST["idPerfil"],
							   "nombre" => $_POST["editarNombre"],
							   "email" => $_POST["editarEmail"],
							   "password" => $encriptar,
							   "grupo" => $_POST["editarGrupo"],
							   "perfil" => $_POST["editarPerfil"],
							   "foto" => $ruta);

				$respuesta = ModeloAdministradores::mdlEditarUsuario($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Usuario ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "administradores";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "administradores";

							}
						})

			  	</script>';

			}
		}
	}
	/**
	 * ELIMINAR DATOS DEL USUARIO
	 */
	static public function ctrEliminarUsuario(){

		if(isset($_GET["idPerfil"])){

			$tabla ="administradores";
			$datos = $_GET["idPerfil"];

			if($_GET["fotoPerfil"] != ""){

				unlink($_GET["fotoPerfil"]);
			
			}

			$respuesta = ModeloAdministradores::mdlEliminarUsuario($tabla, $datos);

			if($respuesta == "ok"){

				$respuestaRegresarId = ModeloAdministradores::mdlRegresarId($tabla);
				echo'<script>

				swal({
					  type: "success",
					  title: "El perfil ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "administradores";

								}
							})

				</script>';

			}		
		}
	}



}