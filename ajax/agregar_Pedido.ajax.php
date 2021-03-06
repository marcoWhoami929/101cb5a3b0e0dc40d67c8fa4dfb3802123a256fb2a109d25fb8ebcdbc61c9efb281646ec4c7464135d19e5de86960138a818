<?php

session_start();
error_reporting(E_ALL);
$session_id= session_id();
include_once("../db_connect.php");
if (isset($_POST["idDelete"])) {
	if (isset($_POST['idDelete'])){$id=$_POST['idDelete'];}
	if (isset($_POST['grupoSesion'])){$grupoSesion=$_POST['grupoSesion'];}
	if (isset($_POST['sesion'])){$sesion=$_POST['sesion'];}
	if (isset($_POST['idSesion'])){$idSesion=$_POST['idSesion'];}

	$delete=mysqli_query($conn, "DELETE FROM temp_productos WHERE id_tmp='".mysqli_escape_string($conn,$_POST['idDelete'])."'");
	
}if(isset($_POST["idUpdate"])){

	if (isset($_POST['idUpdate'])){$id=$_POST['idUpdate'];}
	if (isset($_POST['cantidadTemp'])){$cantidadTemp=$_POST['cantidadTemp'];}
	if (isset($_POST['grupoSesion'])){$grupoSesion=$_POST['grupoSesion'];}
	if (isset($_POST['sesion'])){$sesion=$_POST['sesion'];}
	if (isset($_POST['idSesion'])){$idSesion=$_POST['idSesion'];}

	$actualizarCantidad = mysqli_query($conn, "UPDATE temp_productos SET cantidad_tmp = ".$cantidadTemp." WHERE id_tmp = ".$id."" ) or die(mysqli_error());


}else{

	if (isset($_POST['id'])){$id=$_POST['id'];}
	if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
	if (isset($_POST['grupoSesion'])){$grupoSesion=$_POST['grupoSesion'];}
	if (isset($_POST['sesion'])){$sesion=$_POST['sesion'];}
	if (isset($_POST['idSesion'])){$idSesion=$_POST['idSesion'];}


	
if (!empty($id) and !empty($cantidad)){

	$validarExiste = mysqli_query($conn, "SELECT COUNT(id_producto) AS existe FROM temp_productos WHERE id_producto = ".$id." and idSesion = ".$idSesion."");
	$respuestaExiste = mysqli_fetch_array($validarExiste);

	if ($respuestaExiste["existe"] == 1) {
		$obtenerCantidad = mysqli_query($conn, "SELECT cantidad_tmp AS cantidadExistente FROM temp_productos WHERE id_producto = ".$id." and idSesion = ".$idSesion."");
		$cantidadExistente = mysqli_fetch_array($obtenerCantidad);
		$existenciaTemp = $cantidadExistente["cantidadExistente"] + $cantidad;
		$actualizarCantidad = mysqli_query($conn, "UPDATE temp_productos SET cantidad_tmp = ".$existenciaTemp." WHERE id_producto = ".$id." and idSesion = ".$idSesion."" );
	}else{
		$insert_tmp=mysqli_query($conn, "INSERT INTO temp_productos (id_producto,cantidad_tmp, temp_idSesion, idSesion) VALUES ('$id','$cantidad','$session_id', '$idSesion')");	
	}

}


}


?>
<table class="table table-striped dt-responsive" style="border: 2px solid #1F262D">
	
	<thead style="background:#1F262D;color: white">
		<tr>
			<th>codigo</th>
			<th>Producto.</th>
			<th>Stock Minimo</th>
			<th>Existencias</th>
			<th>Cantidad Requerida</th>
			<th>Fecha</th>
			<th>Estado</th>
			<th></th>
		</tr>
	</thead>
	
<?php

	if ($grupoSesion == "Administrador") {
        $almacen = "almacengeneral1";
        $campo = "stockMinimoGral1";
    }else{
        
    }

    if ($sesion = "Sucursal San Manuel") {
         	$almacen = "almacensanmanuel1";
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

    $fechaActual = date('Y-m-d');

    if (isset($_POST["idDelete"])) {
    	
    }else{
	    $ultimoIdImportacion = mysqli_query($conn, "SELECT MAX(idImportacion) AS ultimoIdImportacion FROM ".$almacen." WHERE idProducto = ".$id."");
		$idFinal = mysqli_fetch_array($ultimoIdImportacion);

		$ultimoIdImpor = $idFinal["ultimoIdImportacion"];

    }



	$sql=mysqli_query($conn, "SELECT p.codigoProducto, p.nombreProducto, p.".$campo." AS stockMinimo, t.id_tmp, t.id_producto, t.cantidad_tmp, al.existenciasUnidades FROM productos AS p INNER JOIN temp_productos AS t ON p.id = t.id_producto INNER JOIN ".$almacen." AS al ON p.id = al.idProducto WHERE  t.temp_idSesion = '".$session_id."' AND al.idImportacion = (SELECT MAX(al.idImportacion) FROM ".$almacen." as al WHERE al.idProducto = t.id_producto)") or die(mysqli_error());

	$totalProductos = 0;
	while ($row=mysqli_fetch_array($sql)){

		$id_tmp=$row["id_tmp"];
		$codigo_producto=$row['codigoProducto'];
		$cantidad=$row['cantidad_tmp'];
		$nombre_producto=utf8_encode($row['nombreProducto']);
		$stockMinimo = $row['stockMinimo'];
		$existenciasUnidades = $row['existenciasUnidades'];
		$totalProductos +=$cantidad; 

		if ($stockMinimo > $existenciasUnidades) {
			$faltantes = $stockMinimo - $existenciasUnidades;
		}else{
			$faltantes = "No Hay Faltante";
		}

		$estado = "<button class='btn btn-secondary btn-xs'>Surtir</button>";
	
	?>
	<tr>
		<td><?php echo $codigo_producto;?></td>
		<td><?php echo $nombre_producto;?></td>
		<td><?php echo $stockMinimo;?></td>
		<td><?php echo $existenciasUnidades ?></td>
		<td><input type="text" id="cantidadTemp<?php echo $id_tmp;?>" value="<?php echo $cantidad;?>" style="border:none" onChange="updateCantidad('<?php echo $id_tmp?>')"></td>
		<td><?php echo $fechaActual; ?></td>
		<td><?php echo $estado; ?></td>
			
		<td><span class="pull-right"><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><span class="mdi mdi-delete-forever"></span></a></span></td>
	</tr>		
<?php
	}

?>


</table>
					