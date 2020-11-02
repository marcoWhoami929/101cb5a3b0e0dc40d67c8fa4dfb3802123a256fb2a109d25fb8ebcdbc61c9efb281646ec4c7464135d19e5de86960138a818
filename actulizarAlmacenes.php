<?php
error_reporting(0);
include_once("conexion_comercial.php");

if(isset($_POST['update_data'])){
    $nameSesion = $_POST["nameSesion"];
    $idUser = $_POST["idUsuario"];
    $almacen = $_POST["nameAlmacenActualizar"];

    $mostrarFacturas = "SELECT * FROM dbo.admExistenciaCosto";
    $ejecutarConsulta = sqlsrv_query($conn,$mostrarFacturas);
    $i = 0;
          
    if (sqlsrv_has_rows($ejecutarConsulta) === false) {
        echo null;
    }else{
        while ($value = sqlsrv_fetch_array($ejecutarConsulta)) {
              
             $facturas[$i] = array("idProducto" => $value["CIDPRODUCTO"],
                            "idAlmacen" => $value["CIDALMACEN"],
                            "entradasIniciales" => $value["CENTRADASINICIALES"],
                            "salidasIniciales" => $value["CSALIDASINICIALES"]);
            $i++;
        }
        echo json_encode($facturas);
    }
}

?>