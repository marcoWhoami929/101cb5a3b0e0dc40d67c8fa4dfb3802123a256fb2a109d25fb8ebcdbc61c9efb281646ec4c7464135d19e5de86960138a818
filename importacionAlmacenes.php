<?php
include_once("db_connect.php");
require_once("controladores/inventarios.php");
require_once("modelos/inventarios.php");
error_reporting(E_ALL);
if(isset($_POST['import_data'])){
	
	$file_mimes = array(
		'text/x-comma-separated-values',
		'text/comma-separated-values', 
		'application/octet-stream', 
		'application/vnd.ms-excel', 
		'application/x-csv', 
		'text/x-csv', 
		'text/csv', 
		'application/csv', 
		'application/excel', 
		'application/vnd.msexcel'
	);
  if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$file_mimes)){
      if(is_uploaded_file($_FILES['file']['tmp_name'])){

         $csv_file = fopen($_FILES['file']['tmp_name'], 'r');

         while(($emp_record = fgetcsv($csv_file,10000, ",")) !== FALSE){

                $codigoProducto = $emp_record[0];

                $existenciaProducto =  "SELECT id,codigoProducto,nombreProducto FROM productos WHERE codigoProducto = '".$codigoProducto."'";
                $existenciaProducto = mysqli_query($conn, $existenciaProducto) or die("database error:". mysqli_error($conn));

                if(mysqli_num_rows($existenciaProducto)){

                        $actualizarProducto = "UPDATE productos SET nombreProducto = '".str_replace('"', 'pul', $emp_record[1])."',costeo = '".$emp_record[2]."', unidad = '".$emp_record[3]."' where codigoProducto = '".$codigoProducto."' ";
                        mysqli_query($conn, $actualizarProducto) or die("database error:". mysqli_error($conn));



                }else{

                        $insertarProducto = "INSERT INTO productos(codigoProducto,nombreProducto,costeo,unidad) VALUES('".$emp_record[0]."','".str_replace(",", "", $emp_record[1])."','".$emp_record[2]."','".$emp_record[3]."')";
                        mysqli_query($conn, $insertarProducto) or die("database error:". mysqli_error($conn));



                }

                    /*
                    $almacen = $_POST["almacen"];
                    $numeroAlmacen = $_POST["numeroAlmacen"];
                    */
                    $almacen = $_POST["nombreAlmacen"];

                    $idUsuario = $_POST["idUsuario"];

                    $item = "codigoProducto";
                    $valor = $codigoProducto;

                    $buscarDatosProducto = ControladorInventarios::ctrBuscarValores($item,$valor);
                   
                    $id = $buscarDatosProducto["id"];

                    $almacenDatos = $almacen;

                    $idDisponible = ControladorInventarios::ctrBuscarFolioDisponible();
                   
                    $idImportacion = $idDisponible["idDisponible"];

                    $fechaActual = date("Y-m-d");
                    //$fechaActual = "2020-07-06";
                    
                    $insertarProductoAlmacen = "INSERT INTO almacen".$almacenDatos."(idProducto,inventarioInicialUnidades,entradasUnidades,salidasUnidades,existenciasUnidades,inventarioInicialImportes,entradasImportes,salidasImportes,existenciaImportes,ultimoCosto,totalUltCosto,fecha,idImportacion) VALUES('".$id."','".str_replace(",", "", $emp_record[4])."','".str_replace(",", "", $emp_record[5])."','".str_replace(",", "", $emp_record[6])."','".str_replace(",", "", $emp_record[7])."','".str_replace(",", "", $emp_record[8])."','".str_replace(",", "", $emp_record[9])."','".str_replace(",", "", $emp_record[10])."','".str_replace(",", "", $emp_record[11])."','".str_replace(",", "", $emp_record[12])."','".str_replace(",", "", $emp_record[13])."','".$fechaActual."','".$idImportacion."')";
                    mysqli_query($conn, $insertarProductoAlmacen) or die("database error:". mysqli_error($conn));

            }
                    $descripcion = "Importacion ALMACEN ".strtoupper($almacenDatos); 
                    $insertarImportaciones = "INSERT INTO importaciones(id,descripcion,idUsuario) VALUES('".$idImportacion."','".$descripcion."','".$idUsuario."')";
                    mysqli_query($conn, $insertarImportaciones) or die("database error:". mysqli_error($conn));

            fclose($csv_file);
            $import_status = '?import_status=success';
        } else {
          $import_status = '?import_status=error';
      }
  } else {
      $import_status = '?import_status=invalid_file';
  }
}
//return $import_status;
header("Location: importaciones".$import_status);
?>