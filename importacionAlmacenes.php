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

          $nombreProducto = str_replace('"', 'pul', $emp_record[1]);
          if(mysqli_num_rows($existenciaProducto)){

            $actualizarProducto = "UPDATE productos SET nombreProducto = '".$nombreProducto."',costeo = '".$emp_record[2]."', unidad = '".$emp_record[3]."' where codigoProducto = '".$codigoProducto."' ";
             mysqli_query($conn, $actualizarProducto) or die("database error:". mysqli_error($conn));

          }else{

            $insertarProducto = "INSERT INTO productos(codigoProducto,nombreProducto,costeo,unidad) VALUES('".$emp_record[0]."','".$nombreProducto."','".$emp_record[2]."','".$emp_record[3]."')";
            mysqli_query($conn, $insertarProducto) or die("database error:". mysqli_error($conn));

          }

          /*$almacen = $_POST["almacen"];
          $numeroAlmacen = $_POST["numeroAlmacen"];*/
          $almacen = $_POST["nombreAlmacen"];

          $idUsuario = $_POST["idUsuario"];

          $item = "codigoProducto";
          $valor = $codigoProducto;

          $buscarDatosProducto = ControladorInventarios::ctrBuscarValores($item,$valor);
                   
          $id = $buscarDatosProducto["id"];

          $almacenDatos = $almacen;

          //var_dump("Almacen Datos",$almacenDatos);
          //
          $table = "importaciones";
          $select = "IF(MAX(id) IS NULL,1,MAX(id)+1) as idDisponible";
          $conditions = "";
          $idDisponible = ControladorInventarios::ctrBuscarFolioDisponible($table, $select, $conditions);
                   
          $idImportacion = $idDisponible["idDisponible"];

          //$fechaActual = date("Y-m-d");
          $fechaActual = "2020-07-11";
                    
          $insertarProductoAlmacen = "INSERT INTO almacen".$almacenDatos."(idProducto,inventarioInicialUnidades,entradasUnidades,salidasUnidades,existenciasUnidades,inventarioInicialImportes,entradasImportes,salidasImportes,existenciaImportes,ultimoCosto,totalUltCosto,fecha,idImportacion) VALUES('".$id."','".str_replace(",", "", $emp_record[4])."','".str_replace(",", "", $emp_record[5])."','".str_replace(",", "", $emp_record[6])."','".str_replace(",", "", $emp_record[7])."','".str_replace(",", "", $emp_record[8])."','".str_replace(",", "", $emp_record[9])."','".str_replace(",", "", $emp_record[10])."','".str_replace(",", "", $emp_record[11])."','".str_replace(",", "", $emp_record[12])."','".str_replace(",", "", $emp_record[13])."','".$fechaActual."','".$idImportacion."')";
          mysqli_query($conn, $insertarProductoAlmacen) or die("database error:". mysqli_error($conn));

          if ($almacen == "general1") {
            $campo = "stockMinimoGral1";
          }else if($almacen == "general2"){
            $campo = "stockMinimoGral2";
          }else if($almacen == "sanmanuel1"){
            $campo = "stockMinimoSM1";
          }else if($almacen == "sanmanuel2"){
            $campo = "stockMinimoSM2";
          }else if($almacen == "reforma1"){
            $campo = "stockMinimoRf1";
          }else if($almacen == "reforma2"){
            $campo = "stockMinimoRf1";
          }else if($almacen == "santiago1"){
            $campo = "stockMinimoSg1";
          }else if($almacen == "santiago2"){
            $campo = "stockMinimoSg1";
          }else if($almacen == "capu1"){
            $campo = "stockMinimoCp1";
          }else if($almacen == "capu2"){
            $campo = "stockMinimoCp2";
          }else if($almacen == "lastorres1"){
            $campo = "stockMinimoTr1";
          }else if($almacen == "lastorres2"){
            $campo = "stockMinimoTr2";
          }

          $fechats = strtotime($fechaActual);
          switch (date('w', $fechats)){
            case 0: $day = "Domingo"; break;
            case 1: $day = "Lunes"; break;
            case 2: $day = "Martes"; break;
            case 3: $day = "Miercoles"; break;
            case 4: $day = "Jueves"; break;
            case 5: $day = "Viernes"; break;
            case 6: $day = "Sabado"; break;
          }

          $fechaSum = date("Y-m-d",strtotime($fechaActual."+ 1 days"));

          if ($day == "Sabado") {
            $fechaMenosSeis = date("Y-m-d",strtotime($fechaSum."- 6 days"));
            $diasRestados = "6"; 
          }else if($day == "Viernes"){
            $fechaMenosSeis = date("Y-m-d",strtotime($fechaSum."- 5 days"));
            $diasRestados = "5";  
          }else if($day == "Jueves"){
            $fechaMenosSeis = date("Y-m-d",strtotime($fechaSum."- 4 days"));
            $diasRestados = "4";  
          }else if($day == "Miercoles"){
            $fechaMenosSeis = date("Y-m-d",strtotime($fechaSum."- 3 days"));
            $diasRestados = "3";  
          }else if($day == "Martes"){
            $fechaMenosSeis = date("Y-m-d",strtotime($fechaSum."- 2 days"));
            $diasRestados = "2";  
          }else if($day == "Lunes"){
            $fechaMenosSeis = date("Y-m-d",strtotime($fechaSum."- 1 days"));
            $diasRestados = "1"; 
          }
          
          $sumaSalidas =  "SELECT SUM(al.salidasUnidades) AS totalSalidas FROM almacen".$almacenDatos." as al INNER JOIN productos AS p ON al.idProducto = p.id WHERE p.id = ".$id." AND al.fecha BETWEEN "."'".$fechaMenosSeis."'"." AND "."'".$fechaActual."'";
          $respuestaSalidas = mysqli_query($conn, $sumaSalidas) or die("database error:". mysqli_error($conn));
          $salidasMostradas = mysqli_fetch_array($respuestaSalidas);

          $totalSalidas = $salidasMostradas["totalSalidas"];
          $stockMinimo = $totalSalidas / $diasRestados;

          $actualizarStock = "UPDATE productos SET ".$campo." = ".round($stockMinimo)." WHERE id = ".$id." ";
             mysqli_query($conn, $actualizarStock) or die("database error:". mysqli_error($conn));

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