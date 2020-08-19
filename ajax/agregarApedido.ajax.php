<?php

	include_once("../db_connect.php");
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
	
         $q = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
         $sesion = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['sesion'], ENT_QUOTES)));
         $grupoSesion = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['grupoSesion'], ENT_QUOTES)));
         $idSesion = mysqli_real_escape_string($conn,(strip_tags($_REQUEST['idSesion'], ENT_QUOTES)));

         /*if ($grupoSesion == "Administradores") {
         	$almacen = "almacengeneral1"
         }else if ($grupoSesion == "Sucursales") {
         	if ($sesion = "Sucursal San Manuel") {
         		$almacen = "almacensanManuel1";
         	}else if ($sesion == "Sucursal Santiago") {
         		$almacen = "almacensantiago1";
         	}else if ($sesion == "Sucursal Las Torres") {
         		$almacen = "almacenlastorres1";
         	}else if ($sesion == "Sucursal Reforma") {
         		$almacen = "almacenreforma1";
         	}else if ($sesion == "Sucursal Capu") {
         		$almacen = "almacencapu1";
         	}
         }*/

		 $aColumns = array('codigoProducto', 'nombreProducto');
		 $sTable = "productos";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
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

		//$sesion = $_GET["sesion"];
	
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table dt-responsive">
			  	<thead style="background:#1F262D;color: white">
				<tr  class="warning">
					<th>Código</th>
					<th>Producto</th>
					<th><span class="pull-right">Cant.</span></th>
					
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
						<input type="text" class="form-control" style="text-align:center;width: 30%;" id="cantidad_<?php echo $id; ?>"  value="1" >
						</div></td>

						<td ><span class="pull-right"><a href="#" onclick="agregar('<?php echo $id ?>')"><span class="mdi mdi-plus"></span></a></span></td>
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
			</div>
			<?php
		}
	}
?>