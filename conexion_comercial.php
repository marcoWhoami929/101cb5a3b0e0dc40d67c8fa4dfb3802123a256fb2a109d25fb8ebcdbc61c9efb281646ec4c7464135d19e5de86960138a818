<?php

	$serverName = "192.168.1.222";
	$connectionInfo = array("Database"=>"adNEURAL_CODE", "UID"=>"sa", "PWD"=>"Whoami929","CharacterSet"=>"UTF-8");

	$conn = sqlsrv_connect($serverName,$connectionInfo);

	if ($conn) {
		
		echo "Conexion exitosa";

	}else{

		echo "Fallo en la conexion";
		die(print_r(sqlsrv_errors(),true));

	}

?>