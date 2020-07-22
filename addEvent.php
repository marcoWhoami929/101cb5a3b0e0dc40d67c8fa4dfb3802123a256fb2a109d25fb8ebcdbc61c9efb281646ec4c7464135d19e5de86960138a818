<?php

// Conexion a la base de datos
require_once('bdd.php');

if (isset($_POST['titulo']) && isset($_POST['fechaInicial']) && isset($_POST['fechaFinal']) && isset($_POST['color']) && isset($_POST['idSucursal'])){
	
	$titulo = $_POST['titulo'];
	$fechaInicial = $_POST['fechaInicial'];
	$fechaFinal = $_POST['fechaFinal'];
	$color = $_POST['color'];
	$idSucursal = $_POST['idSucursal'];

	$sql = "INSERT INTO recordatorios(titulo, fechaInicial, fechaFinal, color,idSucursal) values ('$titulo', '$fechaInicial', '$fechaFinal', '$color','$idSucursal')";
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Error');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Error al executar');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
