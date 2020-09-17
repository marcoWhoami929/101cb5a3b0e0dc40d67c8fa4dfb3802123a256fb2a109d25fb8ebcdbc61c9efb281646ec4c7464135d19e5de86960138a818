<?php
session_start();
error_reporting(E_ALL);
require_once("../controladores/inventarios.php");
require_once("../modelos/inventarios.php");
class functionsInventory{

	public $idProducto;
	public $cantidad;
	public $campo;
	public $tipodePedido;
	public $idSesion;
	public function actualizarCantidadSolicitada(){

		$idProducto = $this->idProducto;
		$campo = $this->campo;
		$cantidad = $this->cantidad;


		$tipodePedido = $this->tipodePedido;
		$idSesion = $this->idSesion;
		if ($tipodePedido == "pedidoManual") {
			$tabla = "temp_productos";
			$campos = "cantidad_tmp = ".$cantidad;
			$parametros = "id_producto = ".$idProducto." AND idSesion = ".$idSesion;
		}else{
			$tabla = "productos";
			$campos = $campo." = ".$cantidad;
			$parametros = "id = ".$idProducto;
		}

		$respuesta = ModeloInventarios::mdlActualizarCantidadSolicitada($tabla,$campos,$parametros);
		echo json_encode($respuesta);

	}
	public $sesion;
	public function obtenerTotalPedido(){

		$respuesta = $_SESSION["cantidadSolicitada"];
		$respuesta2 = $_SESSION["montoSolicitado"];


		echo json_encode($respuesta."|".$respuesta2);
	}
	public $sesion2;
	public function obtenerDatosPedido(){

		$respuesta = $_SESSION["pedidoSemanal"];

		echo $respuesta;
	}

	public $pedidoSemanal;
	public $sucursal;
	public $unidadesPedido;
	public $montoPedido;
	public $comentarios;
	public $statusTipoPedido;
	public $tipodePedidoHecho;
	public $idSesionUser;
	public function generarNuevoPedido(){
		/**
		 * ELIMINAMOS LOS PRODUCTOS DE LA TABLA TEMPORAL
		 */
		$tipoPedido = $this->tipodePedidoHecho;
		if ($tipoPedido == "pedidoManual") {

			$idSesion = $this->idSesionUser;
			$productoPedido = $this->pedidoSemanal;
			$productoPedido = json_decode($productoPedido, true);

			for ($j=0; $j < count($productoPedido["data"]); $j++) { 
				$idProducto = $productoPedido["data"][$j][0];
				$table = "temp_productos";
				$campos = "";
				$parametros = "WHERE id_producto = ".$idProducto." AND idSesion =".$idSesion;
				
				$eliminarTemp = ModeloInventarios::mdlEliminarTemp($table, $parametros);

			}
			
		}

		$tabla = "pedidossemanales";

		$ultimoPedido = ModeloInventarios::mdlObtenerUltimoFolioPedido();
		$folio = $ultimoPedido["folio"];

		$comment = $this->comentarios;
		$statusTipoPedido = $this->statusTipoPedido;
		if ($comment != "") {
			$comentarios = $comment;
		}else {
			$comentarios = "Sin Observaciones";
		}

		$datos = array(
						"id"=>$folio,
						"descripcion" => "Nuevo Pedido Realizado",
						"sucursal" => $this->sucursal,
						"unidadesPedido" => $this->unidadesPedido,
						"unidadesAprobadas" => $this->unidadesPedido,
						"montoPedido" => $this->montoPedido,
						"montoAprobado" => $this->montoPedido,
						"solicitado" => "1",
						"comentarios" => $comentarios,
						"statusTipoPedido" => $statusTipoPedido,
						"estatus" => "1");

		$generarPedido = ControladorInventarios::ctrGenerarNuevoPedido($tabla,$datos);

		if ($generarPedido == "ok") {
			
			$pedido = $this->pedidoSemanal;
			$pedido = json_decode($pedido, true);
			
			for ($i=0; $i < count($pedido["data"]); $i++) { 
			$tabla = "productospedidos";
			$datosPedido = array(
									"idProducto" =>  $pedido["data"][$i][0],
									"existencias" => $pedido["data"][$i][1],
									"sugerido" => $pedido["data"][$i][2],
									"solicitado" => $pedido["data"][$i][3],
									"unidadesAprobadas" => $pedido["data"][$i][3],
									"montoFaltante" => $pedido["data"][$i][4],
									"montoSolicitado" => $pedido["data"][$i][5],
									"montoAprobado" => $pedido["data"][$i][5],
									"estatus" => "2",
									"idPedido" => $folio);

			$agregarProductosPedido = ControladorInventarios::ctrInsertarProductosPedido($tabla,$datosPedido);

			}
			echo "ok";
		}
	}

	public $idRequisicion;
	public function obtenerDatosRequisicion(){

		$item = "id";
		$valor = $this->idRequisicion;
		$tabla = "pedidossemanales";

		$respuesta = ControladorInventarios::ctrObtenerDatosRequisicion($tabla,$item,$valor);

		echo json_encode($respuesta);
	}

	/*=============================================
	ACTIVAR REVISION PEDIDO
	=============================================*/	
	public $idRequisicionRevision;
	public $estadoRequisicion;

	public function habilitarPedidoRevision(){
		date_default_timezone_set("America/Mexico_City");
		$tabla = "pedidossemanales";

		$item1 = "revision";
		$valor1 = $this->estadoRequisicion;

		$item2 = "id";
		$valor2 = $this->idRequisicionRevision;

		$item3 = "fechaRevision";
		$valor3 = date('Y-m-d H:i:s');

		$respuesta = ModeloInventarios::mdlHabilitarPedidoRevision($tabla, $item1, $valor1, $item2, $valor2,$item3,$valor3);

		echo $respuesta;

	}

	/*=============================================
	ACTUALIZAR ESTATUS PEDIDO
	=============================================*/	
	public $idProductoRequisicion;
	public $estadoProducto;

	public function actualizarEstatusProducto(){
		
		$tabla = "productospedidos";

		$item1 = "estatus";
		$valor1 = $this->estadoProducto;

		$item2 = "id";
		$valor2 = $this->idProductoRequisicion;


		$respuesta = ModeloInventarios::mdlActualizarEstatusproducto($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}

	public $idProductoAprobar;
	public $cantidadAprobar;
	
	public function actualizarCantidadAprobada(){

		$item = "id";
		$valor = $this->idProductoAprobar;

		$item2 = "unidadesAprobadas";
		$valor2 = $this->cantidadAprobar;
		$tabla = "productospedidos";

		$respuesta = ModeloInventarios::mdlActualizarCantidadAprobada($tabla,$item,$valor,$item2,$valor2);
		echo json_encode($respuesta);

	}

	public $sesion3;
	public function obtenerDatosRequisicionAprobada(){

		$respuesta = $_SESSION["cantidadAprobada"];
		$respuesta2 = $_SESSION["montoAprobado"];


		echo json_encode($respuesta."|".$respuesta2);
	}

	/*
	APROBAR REQUISICION
	 */
	public $idRequisicionAprobada;
	public $observaciones;
	public $unidadesPedidoAprobadas;
	public $montoPedidoAprobado;
	public function aprobarRequisicion(){

		$tabla = "pedidossemanales";
		$fecha  = date('Y-m-d H:i:s');

		$datos = array(
						"idRequisicionAprobada" => $this->idRequisicionAprobada,
						"observaciones" => $this->observaciones,
						"unidadesAprobadas" => $this->unidadesPedidoAprobadas,
						"montoAprobado" => $this->montoPedidoAprobado,
						"aprobado" => "1",
						"fechaAprobado" => $fecha);

		$aprobarRequisicion = ControladorInventarios::ctrAprobarRequisicion($tabla,$datos);

		echo $aprobarRequisicion;

	}

	/*
	CONCLUIR REQUISICION
	 */
	public $idRequisicionConcluida;
	public $observacionesRequisicion;
	
	public function concluirRequisicion(){

		$tabla = "pedidossemanales";
		$fecha  = date('Y-m-d H:i:s');

		$datos = array(
						"idRequisicionConcluida" => $this->idRequisicionConcluida,
						"observacionesRequisicion" => $this->observacionesRequisicion,
						"concluido" => "1",
						"fechaConcluido" => $fecha);

		$concluir = ControladorInventarios::ctrConcluirRequisicion($tabla,$datos);

		echo $concluir;

	}

	/**
	 * CONSULTAR TABLA DE TEMPORALES ANTES DE PASAR A GENERAR PEDIDO
	 */
	public $idSesionTemp;
	public function consultarTemporal(){
		$idSesionTemp = $this->idSesionTemp;
		$tabla = "temp_productos";
		$campos = "COUNT(id_tmp) AS existentes";
		$parametros = "WHERE idSesion = ".$idSesionTemp;

		$respuesta = ModeloInventarios::mdlConsultarTemp($tabla,$campos,$parametros);

		echo json_encode($respuesta);

	}

	/**
	 * ACTUALIZAR CANTIDAD FISICA
	 */
	public $idProductoF;
	public $idTabla;
	public $cantidadFisico;
	public $tablaFisico;
	public $datoTabla;
	public $fechaActualF;
	public function actualizarCantidadFisica(){

		$table = $this->tablaFisico;
		$dato = $this->datoTabla;
		$cantidadF = $this->cantidadFisico;
		$idP = $this->idProductoF;
		$idT = $this->idTabla;
		$fechaActualF = $this->fechaActualF;

		$tabla = $table;
		$campos = $dato." = ".$cantidadF.", fechaInventarioFisico = '".$fechaActualF."'";
		$parametros = "id = ".$idT." AND idProducto =".$idP;

		$respuesta = ModeloInventarios::mdlActualizarCantidadSolicitada($tabla,$campos,$parametros);

		echo json_encode($respuesta);

	}

	/**
	 * OBTENER LOS DATOS DE LOS PRODUCTOS CON INVENTARIO FISICO
	 */
	public $tablaFisico2;
	public $statusInventarioF;
	public $nameUser;
	public $tipoFisico;
	public $familiaF;
	public $stadoInventario;
	public function inventarioFisicoRevisado(){

		$table = $this->tablaFisico2;
		$statusInventarioF = $this->statusInventarioF;
		$nameUser = $this->nameUser;

		$tipoInventarioF = $this->tipoFisico;
		$idFamilia = $this->familiaF;

		$status = $this->stadoInventario;

		$descripcion = "Inventario Fisico Realizado en Almacén de tipo ".$status;
		$fechaHoy = date('Y-m-d');

		$tablaInsertar = "inventariofisico";
		$datos = array("descripcion" => $descripcion,
			"tipoInventario" => $tipoInventarioF,
			"idFamilia" => $idFamilia,
			"sucursal" => $nameUser,
		);

		$insertarInventarioFisico = ModeloInventarios::mdlInsertarInventarioFisico($tablaInsertar,$datos);

		if ($insertarInventarioFisico == "ok") {

			$ultimoFolioFisico = ModeloInventarios::mdlObtenerUltimoFolioInventarioFisico();
			$folioFisico = $ultimoFolioFisico["folio"];

			$tabla = $table." AS al INNER JOIN productos AS p ON al.idProducto = p.id";
			$campos = "al.id, al.idProducto, p.codigoProducto, p.nombreProducto, al.entradasUnidades, al.salidasUnidades, al.existenciasUnidades, al.existenciaFisica";
			$parametros = "al.existenciaFisica != '' AND al.fechaInventarioFisico = '".$fechaHoy."' AND al.idImportacion = (SELECT MAX(al.idImportacion) FROM ".$table." AS al)";

			$verProductosInventarioFisico = ModeloInventarios::mdlVerProductosInventarioFisico($tabla,$campos,$parametros);

			for ($i = 0; $i < count($verProductosInventarioFisico); $i++) { 

				$idProducto = $verProductosInventarioFisico[$i]["idProducto"];
				$entradasUnidades = $verProductosInventarioFisico[$i]["entradasUnidades"];
				$salidasUnidades = $verProductosInventarioFisico[$i]["salidasUnidades"];
				$existenciasUnidades = $verProductosInventarioFisico[$i]["existenciasUnidades"];
				$existenciaFisica = $verProductosInventarioFisico[$i]["existenciaFisica"];

				$datos = array("idProducto" => $idProducto,
								"entradas" => $entradasUnidades,
								"salidas" => $salidasUnidades,
								"existencias" => $existenciasUnidades,
								"existenciasFisicas" => $existenciaFisica,
								"idFisico" => $folioFisico*1);

				
				$respuesta = ModeloInventarios::mdlInsertarProdutosFisico($datos);

			}
			
			if ($respuesta == "ok") {
				$tabla = $table;
				$campos = "existenciaFisica = '', fechaInventarioFisico = ''";
				$parametros = "existenciaFisica != '' AND fechaInventarioFisico = '".$fechaHoy."' AND idImportacion = (SELECT MAX(al.idImportacion) FROM ".$table." AS al)";

				$respuestaEditar = ModeloInventarios::mdlActualizarCantidadSolicitada($tabla,$campos,$parametros);
			}
			
		}

		echo json_encode($respuesta);

	}

	/**
	 * BORRAR LOS DATOS QUE SE INGRESARON EN EL INVENTARIO FISICO SI EL USUARIO DECIDE ABANDONAR LA PAGINA SIN 
	 * CONCLUIR EL REVISADO DEL INVENTARIO FISICO
	 */
	public $fechaActualFisico;
	public $tablaInFisico;
	public function borrarFisicosIngresados(){

		$fechaActual = $this->fechaActualFisico;
		$table = $this->tablaInFisico;

		$tabla = $table;
		$campos = "existenciaFisica = '', fechaInventarioFisico = ''";
		$parametros = "existenciaFisica != '' AND fechaInventarioFisico = '".$fechaActual."' AND idImportacion = (SELECT MAX(al.idImportacion) FROM ".$table." AS al)";

		$respuesta = ModeloInventarios::mdlActualizarCantidadSolicitada($tabla,$campos,$parametros);

		echo json_encode($respuesta);

	}

}

if (isset($_POST["idProducto"])) {
	$actualizarSolicitado = new functionsInventory();
	$actualizarSolicitado -> idProducto = $_POST["idProducto"];
	$actualizarSolicitado -> campo = $_POST["campo"];
	$actualizarSolicitado -> cantidad = $_POST["cantidad"];
	$actualizarSolicitado -> tipodePedido = $_POST["tipodePedido"];
	$actualizarSolicitado -> idSesion = $_POST["idSesion"];
	$actualizarSolicitado -> actualizarCantidadSolicitada();
}

if (isset($_POST["sesion"])) {
	$actualizarSolicitado = new functionsInventory();
	$actualizarSolicitado -> sesion = $_POST["sesion"];
	$actualizarSolicitado -> obtenerTotalPedido();
}

if (isset($_POST["sesion2"])) {
	$actualizarSolicitado = new functionsInventory();
	$actualizarSolicitado -> sesion2 = $_POST["sesion2"];
	$actualizarSolicitado -> obtenerDatosPedido();
}
if (isset($_POST["sucursal"])) {
	$generarPedido = new functionsInventory();
	$generarPedido -> sucursal = $_POST["sucursal"];
	$generarPedido -> unidadesPedido = $_POST["unidadesPedido"];
	$generarPedido -> montoPedido = $_POST["montoPedido"];
	$generarPedido -> pedidoSemanal = $_POST["pedidoSemanal"];
	$generarPedido -> comentarios = $_POST["comentarios"];
	$generarPedido -> statusTipoPedido = $_POST["statusTipoPedido"];
	$generarPedido -> tipodePedidoHecho = $_POST["tipodePedido"];
	$generarPedido -> idSesionUser = $_POST["idSesion"];
	$generarPedido -> generarNuevoPedido();
}
if (isset($_POST["idRequisicion"])) {
	$obtenerDatos = new functionsInventory();
	$obtenerDatos -> idRequisicion = $_POST["idRequisicion"];
	$obtenerDatos -> obtenerDatosRequisicion();
}
if(isset($_POST["idRequisicionRevision"])){

	$revisionPedido = new functionsInventory();
	$revisionPedido -> idRequisicionRevision = $_POST["idRequisicionRevision"];
	$revisionPedido -> estadoRequisicion = $_POST["estadoRequisicion"];
	$revisionPedido -> habilitarPedidoRevision();

}
if(isset($_POST["idProductoRequisicion"])){

	$actualizarProducto = new functionsInventory();
	$actualizarProducto -> idProductoRequisicion = $_POST["idProductoRequisicion"];
	$actualizarProducto -> estadoProducto = $_POST["estadoProducto"];
	$actualizarProducto -> actualizarEstatusProducto();

}

if (isset($_POST["idProductoAprobar"])) {
	$aprobarProducto = new functionsInventory();
	$aprobarProducto -> idProductoAprobar = $_POST["idProductoAprobar"];
	$aprobarProducto -> cantidadAprobar = $_POST["cantidadAprobar"];
	$aprobarProducto -> actualizarCantidadAprobada();
}
if (isset($_POST["sesion3"])) {
	$actualizarSolicitado = new functionsInventory();
	$actualizarSolicitado -> sesion3 = $_POST["sesion3"];
	$actualizarSolicitado -> obtenerDatosRequisicionAprobada();
}
if (isset($_POST["idRequisicionAprobada"])) {
	$aprobarRequisicion = new functionsInventory();
	$aprobarRequisicion -> idRequisicionAprobada = $_POST["idRequisicionAprobada"];
	$aprobarRequisicion -> unidadesPedidoAprobadas = $_POST["unidadesPedidoAprobadas"];
	$aprobarRequisicion -> montoPedidoAprobado = $_POST["montoPedidoAprobado"];
	$aprobarRequisicion -> observaciones = $_POST["observaciones"];
	$aprobarRequisicion -> aprobarRequisicion();
}
if (isset($_POST["idRequisicionConcluida"])) {
	$concluirRequisicion = new functionsInventory();
	$concluirRequisicion -> idRequisicionConcluida = $_POST["idRequisicionConcluida"];
	$concluirRequisicion -> observacionesRequisicion = $_POST["observacionesRequisicion"];
	$concluirRequisicion -> concluirRequisicion();
}

if (isset($_POST["idSesion"])) {
	$consultarTemporal = new functionsInventory();
	$consultarTemporal -> idSesionTemp = $_POST["idSesion"];
	$consultarTemporal -> consultarTemporal();
}

if (isset($_POST["idProductoF"])) {
	$actualizarCantidadFisica = new functionsInventory();
	$actualizarCantidadFisica -> idProductoF = $_POST["idProductoF"];
	$actualizarCantidadFisica -> idTabla = $_POST["idTabla"];
	$actualizarCantidadFisica -> cantidadFisico = $_POST["cantidadFisico"];
	$actualizarCantidadFisica -> tablaFisico = $_POST["tablaFisico"];
	$actualizarCantidadFisica -> datoTabla = $_POST["datoTabla"];
	$actualizarCantidadFisica -> fechaActualF = $_POST["fechaActualF"];
	$actualizarCantidadFisica -> actualizarCantidadFisica();
}

if (isset($_POST["tablaFisico2"])) {
	$inventarioFisico = new functionsInventory();
	$inventarioFisico -> tablaFisico2 = $_POST["tablaFisico2"];
	$inventarioFisico -> statusInventarioF = $_POST["statusInventarioF"];
	$inventarioFisico -> nameUser = $_POST["nameUser"];
	$inventarioFisico -> tipoFisico = $_POST["tipoFisico"];
	$inventarioFisico -> familiaF = $_POST["familiaF"];
	$inventarioFisico -> stadoInventario = $_POST["stadoInventario"];
	$inventarioFisico -> inventarioFisicoRevisado();
}

if (isset($_POST["fechaActualFisico"])) {
	$borrarFisicosIngresados = new functionsInventory();
	$borrarFisicosIngresados -> fechaActualFisico = $_POST["fechaActualFisico"];
	$borrarFisicosIngresados -> tablaInFisico = $_POST["tablaInFisico"];
	$borrarFisicosIngresados -> borrarFisicosIngresados(); 
}

?>