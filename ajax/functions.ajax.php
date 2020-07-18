<?php
session_start();
error_reporting(E_ALL);
require_once("../controladores/inventarios.php");
require_once("../modelos/inventarios.php");
class functionsInventory{


	public $idProducto;
	public $cantidad;
	public $campo;
	public function actualizarCantidadSolicitada(){

		$item = "id";
		$valor = $this->idProducto;

		$item2 = $this->campo;
		$valor2 = $this->cantidad;
		$tabla = "productos";

		$respuesta = ModeloInventarios::mdlActualizarCantidadSolicitada($tabla,$item,$valor,$item2,$valor2);
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
	public function generarNuevoPedido(){

		$tabla = "pedidossemanales";

		$ultimoPedido = ModeloInventarios::mdlObtenerUltimoFolioPedido();
		$folio = $ultimoPedido["folio"];

		$datos = array(
						"id"=>$folio,
						"descripcion" => "Nuevo Pedido Realizado",
						"sucursal" => $this->sucursal,
						"unidadesPedido" => $this->unidadesPedido,
						"unidadesAprobadas" => $this->unidadesPedido,
						"montoPedido" => $this->montoPedido,
						"montoAprobado" => $this->montoPedido,
						"solicitado" => "1",
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


}

if (isset($_POST["idProducto"])) {
	$actualizarSolicitado = new functionsInventory();
	$actualizarSolicitado -> idProducto = $_POST["idProducto"];
	$actualizarSolicitado -> campo = $_POST["campo"];
	$actualizarSolicitado -> cantidad = $_POST["cantidad"];
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
?>