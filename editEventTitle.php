<?php
// Conexion a la base de datos
require_once('bdd.php');
if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = "DELETE FROM recordatorios WHERE id = $id";
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Error');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	  die ('Error al ejecutar');
	}
	
}elseif (isset($_POST['titulo']) && isset($_POST['color']) && isset($_POST['id']) && isset($_POST['idSucursal'])){
	
	$id = $_POST['id'];
	$titulo = $_POST['titulo'];
	$color = $_POST['color'];
	$idSucursal = $_POST["idSucursal"];
	
	$sql = "UPDATE recordatorios SET  titulo = '$titulo', color = '$color', idSucursal = '$idSucursal' WHERE id = $id ";

	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Error');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Error al ejecutar');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
