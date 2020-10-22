<?php
error_reporting(0);

	include_once("../db_connect.php");
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$sesion = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['sesion'], ENT_QUOTES)));
		$grupoSesion = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['grupoSesion'], ENT_QUOTES)));
		$idSesionUser = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['idSesion'], ENT_QUOTES)));
	
        $idContratipo = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['idContratipo'], ENT_QUOTES)));
        $idProducto = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['idProducto'], ENT_QUOTES)));
        $solicitado = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['solicitado'], ENT_QUOTES)));
        $idPedido = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['idPedido'], ENT_QUOTES)));
        $montoSolicitado = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['montoSolicitado'], ENT_QUOTES)));
        $idProductoPedido = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['idProductoPedido'], ENT_QUOTES)));
        $fecha = date('Y-m-d');

		$sTable = "productos";
		$sWhere = "WHERE contratipo = '".$idContratipo."'";
			
		include 'pagination.php'; 
		
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 5; 
		$adjacents  = 4; 
		$offset = ($page - 1) * $per_page;
		
		$count_query   = mysqli_query($conn, "SELECT count(*) AS numrows FROM $sTable  $sWhere");


		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
	
		$total_pages = ceil($numrows/$per_page);
		$reload = './vistas/modulos/crearPedido.php';

		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($conn, $sql);
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table dt-responsive contratipos">
			  	<thead style="background:#1F262D;color: white">
				<tr  class="warning">
					<th>Código</th>
					<th>Producto</th>
					<th><span class="pull-right">Cant. Solicitada</span></th>
					
					<th style="width: 36px;"></th>
				</tr>
				</thead>
				<?php
				while ($row=mysqli_fetch_array($query)){
					$id=$row['id'];
					$codigo=$row['codigoProducto'];
					$descripcion=utf8_encode($row['nombreProducto']);
					//$precio_venta=number_format($precio_venta,5);
					?>
					<tr>
						<td><?php echo $codigo; ?></td>
						<td><?php echo $descripcion; ?></td>
						<td class='col-xs-1'>
						<div class="pull-right">
						<input type="text" class="form-control" style="text-align:center;width: 30%;" id="cantidad_<?php echo $id; ?>"  value="<?php echo $solicitado; ?>" disabled >
						</div></td>

						<td >

							<button type="button" class="btn btn-success btnAgregarContratipo" idContratipo="<?php echo $id; ?>" idProducto="<?php echo $idProducto; ?>" idUsuario="<?php echo $idSesionUser; ?>" idPedido="<?php echo $idPedido; ?>" montoSolicitado="<?php echo $montoSolicitado; ?>" solicitado="<?php echo $solicitado ?>" fecha="<?php echo $fecha; ?>" nameSesion="<?php echo $sesion ?>" grupoSesion="<?php echo $grupoSesion ?>" idProductoPedido="<?php echo $idProductoPedido; ?>"><i class="mdi mdi-plus"></i> </button>
						</td>
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=5><span class="pull-right"><?
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
				<script>
		
					$(".contratipos").on("click", ".btnAgregarContratipo", function(){

						var nameSesion = $(this).attr("nameSesion");
						var grupoSesion = $(this).attr("grupoSesion");

						var idPedido = $(this).attr("idPedido");
						var idProdSustituir = $(this).attr("idProducto");
						var idUsuario = $(this).attr("idUsuario");
						var idContratipo = $(this).attr("idContratipo");
						var solicitado = $(this).attr("solicitado");
						var montoSolicitado = $(this).attr("montoSolicitado");
						var fecha = $(this).attr("fecha");
						var idProductoPedido = $(this).attr("idProductoPedido");

						var datos = new FormData();
						datos.append('idPedido',idPedido);
						datos.append('idProdSustituir',idProdSustituir);
						datos.append('idUsuario',idUsuario);
						datos.append('idContratipo',idContratipo);
						datos.append('solicitado',solicitado);
						datos.append('montoSolicitado',montoSolicitado);
						datos.append('fecha',fecha);
						datos.append('nameSesion',nameSesion);
						datos.append('grupoSesion',grupoSesion);
						datos.append('idProductoPedido',idProductoPedido);


						$.ajax({
						    url: "ajax/funcionesInventario.ajax.php",
						    method: "POST",
						    data: datos,
						    cache: false,
						    contentType: false,
						    processData: false,
						    dataType: "json",
						    success: function(respuesta) {

						    	if (respuesta == 'ok') {
						    		swal({
					                  type: "success",
					                  title: "Exito!!",
					                  text: "Cambio Exitoso.",
					                  showConfirmButton: true,
					                  confirmButtonText: "Cerrar"
					                  }).then(function(result) {
					                    window.location = "detalleRequisicionGeneral";
					                  })
						    		
						    	}else{
						    		alert("Ha ocurrido un Error...");
						    	}
						    	
						      
						    }
						});

					});
				</script>
			</div>
			<?php
		}
	}
?>

