<?php

session_start();
error_reporting(0);
$session_id= session_id();
if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['grupoSesion'])){$grupoSesion=$_POST['grupoSesion'];}
if (isset($_POST['sesion'])){$sesion=$_POST['sesion'];}
if (isset($_POST['idSesion'])){$idSesion=$_POST['idSesion'];}

	include_once("../db_connect.php");
	
if (!empty($id) and !empty($cantidad))
{
	$validarExiste = mysqli_query($conn, "SELECT COUNT(id_producto) AS existe FROM temp_productos WHERE id_producto = ".$id."");
	$respuestaExiste = mysqli_fetch_array($validarExiste);

	if ($respuestaExiste["existe"] == 1) {
		$obtenerCantidad = mysqli_query($conn, "SELECT cantidad_tmp AS cantidadExistente FROM temp_productos WHERE id_producto = ".$id."");
		$cantidadExistente = mysqli_fetch_array($obtenerCantidad);
		$existenciaTemp = $cantidadExistente["cantidadExistente"] + $cantidad;
		$actualizarCantidad = mysqli_query($conn, "UPDATE temp_productos SET cantidad_tmp = ".$existenciaTemp." WHERE id_producto = ".$id."");
	}else{
		$insert_tmp=mysqli_query($conn, "INSERT INTO temp_productos (id_producto,cantidad_tmp, temp_idSesion) VALUES ('$id','$cantidad','$idSesion')");	
	}

}
if (isset($_GET['id']))
{
$delete=mysqli_query($conn, "DELETE FROM temp_productos WHERE id_tmp='".mysqli_escape_string($conn,$_GET['id'])."'");
}

?>
<table class="table">
	<tr>
		<thead style="background:#1F262D;color: white">
			<th>codigo</th>
			<th>Producto.</th>
			<th>Stock Minimo</th>
			<th>Existencias</th>
			<th>Cantidad Requerida</th>
			<th>Fecha</th>
			<th>Estado</th>
			<th></th>
		</thead>
	</tr>
<?php

	if ($grupoSesion == "Administrador") {
         	$almacen = "almacengeneral1";
         	$campo = "stockMinimoGral1";
         }else if ($grupoSesion == "Sucursales") {

         	if ($sesion = "Sucursal San Manuel") {
         		$almacen = "almacensanManuel1";
         		$campo = "stockMinimoSM1";

         	}else if ($sesion == "Sucursal Santiago") {

         		$almacen = "almacensantiago1";
         		$campo = "stockMinimoSg1";

         	}else if ($sesion == "Sucursal Las Torres") {

         		$almacen = "almacenlastorres1";
         		$campo = "stockMinimoTr1";

         	}else if ($sesion == "Sucursal Reforma") {

         		$almacen = "almacenreforma1";
         		$campo = "stockMinimoRf1";

         	}else if ($sesion == "Sucursal Capu") {

         		$almacen = "almacencapu1";
         		$campo = "stockMinimoCp1";
         	}
         }

       $fechaActual = date('Y-m-d');


	$sumador_total=0;

	$ultimoIdImportacion = mysqli_query($conn, "SELECT MAX(idImportacion) AS ultimoIdImportacion FROM ".$almacen." WHERE idProducto = ".$id."");
	$idFinal = mysqli_fetch_array($ultimoIdImportacion);

	$ultimoIdImpor = $idFinal["ultimoIdImportacion"];


	$sql=mysqli_query($conn, "SELECT p.codigoProducto, p.nombreProducto, p.".$campo." AS stockMinimo, t.id_tmp, t.id_producto, t.cantidad_tmp, al.existenciasUnidades FROM productos AS p, temp_productos AS t, ".$almacen." AS al WHERE p.id = t.id_producto AND p.id = al.idProducto AND al.idImportacion = ".$ultimoIdImpor." AND t.temp_idSesion =".$idSesion."");
	while ($row=mysqli_fetch_array($sql))
	{
	$id_tmp=$row["id_tmp"];
	$codigo_producto=$row['codigoProducto'];
	$cantidad=$row['cantidad_tmp'];
	$nombre_producto=utf8_encode($row['nombreProducto']);
	$stockMinimo = $row['stockMinimo'];
	$existenciasUnidades = $row['existenciasUnidades'];

	if ($stockMinimo > $existenciasUnidades) {
		$faltantes = $stockMinimo - $existenciasUnidades;
	}else{
		$faltantes = "No Hay Faltante";
	}

	$estado = "<button class='btn btn-secondary btn-xs'>Surtir</button>";
	
	//$sumador_total+=$precio_total_r;
	
		?>
		<tr>
			<td><?php echo $codigo_producto;?></td>
			<td><?php echo $nombre_producto;?></td>
			<td><?php echo $stockMinimo;?></td>
			<td><?php echo $existenciasUnidades ?></td>
			<td><?php echo $cantidad;?></td>
			<td><?php echo $fechaActual; ?></td>
			<td><?php echo $estado; ?></td>
			
			<td><span class="pull-right"><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><span class="mdi mdi-delete-forever"></span></a></span></td>
		</tr>		
		<?php
	}

?>

</table>
					