<?php
include_once("db_connect.php");
require_once("controladores/inventarios.php");
require_once("modelos/inventarios.php");

error_reporting(0);
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

          $almacen = $_POST["nombreAlmacen"];
          $periodoImportacion = $_POST["periodoSeleccionado"];
          $mesElegido = $_POST["mesElegido"];

          $idUsuario = $_POST["idUsuario"];

          $item = "codigoProducto";
          $valor = $codigoProducto;

          $buscarDatosProducto = ControladorInventarios::ctrBuscarValores($item,$valor);
                   
          $id = $buscarDatosProducto["id"];

          $almacenDatos = $almacen;

          $table = "importaciones";
          $select = "IF(MAX(id) IS NULL,1,MAX(id)+1) as idDisponible";
          $conditions = "";
          $idDisponible = ControladorInventarios::ctrBuscarFolioDisponible($table, $select, $conditions);
                     
          $idImportacion = $idDisponible["idDisponible"];

          $verificarAnterior = "SELECT al.existenciasUnidades FROM almacen".$almacen." AS al INNER JOIN productos AS p ON al.idProducto = p.id WHERE codigoProducto = '".$codigoProducto."' AND al.idImportacion = (SELECT MAX(al.idImportacion) FROM almacen".$almacen." AS al WHERE p.codigoProducto = '".$codigoProducto."')";
          $respuestaVerificar = mysqli_query($conn, $verificarAnterior) or die("database error:". mysqli_error($conn));
          $verAnterior = mysqli_fetch_array($respuestaVerificar);

          $existenciaAnterior = $verAnterior["existenciasUnidades"];

          $unidadesInicial = str_replace(",", "", $emp_record[4]);

          if ($existenciaAnterior == $unidadesInicial || $existenciaAnterior == "") {
             $descripcion = "Importacion ALMACEN ".strtoupper($almacenDatos); 

            $fechaActual1 = date("Y-m-d");
            //$fechaActual1 = "2020-08-05";
          
            if ($periodoImportacion == "mes") {
              $numeroMes = $mesElegido;
            }else{
              $mesFecha = strtotime($fechaActual1);
              $numeroMes = date('n', $mesFecha);
            }
                    
            $insertarProductoAlmacen = "INSERT INTO almacen".$almacenDatos."(idProducto,inventarioInicialUnidades,entradasUnidades,salidasUnidades,existenciasUnidades,inventarioInicialImportes,entradasImportes,salidasImportes,existenciaImportes,ultimoCosto,totalUltCosto,fecha,idImportacion, numeroMes) VALUES('".$id."','".str_replace(",", "", $emp_record[4])."','".str_replace(",", "", $emp_record[5])."','".str_replace(",", "", $emp_record[6])."','".str_replace(",", "", $emp_record[7])."','".str_replace(",", "", $emp_record[8])."','".str_replace(",", "", $emp_record[9])."','".str_replace(",", "", $emp_record[10])."','".str_replace(",", "", $emp_record[11])."','".str_replace(",", "", $emp_record[12])."','".str_replace(",", "", $emp_record[13])."','".$fechaActual1."','".$idImportacion."','".$numeroMes."')";
            mysqli_query($conn, $insertarProductoAlmacen) or die("database error:". mysqli_error($conn));

            if ($periodoImportacion == "mes") {
              $ultimoMes = "SELECT MAX(numeroMes) AS ultimoMes FROM almacen".$almacenDatos."";
              $respuestaMes = mysqli_query($conn, $ultimoMes) or die("database error:". mysqli_error($conn));
              $respuestaUltimoMes = mysqli_fetch_array($respuestaMes);

              $fechaActual = $respuestaUltimoMes["ultimoMes"];
              $mesF = $fechaActual +1;
              $fechaAnterior = $mesF - 6;

              $parametros = "WHERE p.id = ".$id." AND al.numeroMes BETWEEN "."'".$fechaAnterior."'"." AND "."'".$fechaActual."'";

            }else{

              $fechats = strtotime($fechaActual1);
              switch (date('w', $fechats)){
                case 0: $day = "Domingo"; break;
                case 1: $day = "Lunes"; break;
                case 2: $day = "Martes"; break;
                case 3: $day = "Miercoles"; break;
                case 4: $day = "Jueves"; break;
                case 5: $day = "Viernes"; break;
                case 6: $day = "Sabado"; break;
              }
              $fechaSum = date("Y-m-d",strtotime($fechaActual1."+ 1 days"));

              if ($day == "Sabado") {
                $fechaAnterior = date("Y-m-d",strtotime($fechaSum."- 6 days"));
              }else{
                $fechaAnterior = date("Y-m-d",strtotime($fechaSum."- 7 days"));
              }

              $parametros = "WHERE p.id = ".$id." AND al.fecha BETWEEN "."'".$fechaAnterior."'"." AND "."'".$fechaActual1."'";

            }

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
              $campo = "stockMinimoRf2";
            }else if($almacen == "santiago1"){
              $campo = "stockMinimoSg1";
            }else if($almacen == "santiago2"){
              $campo = "stockMinimoSg2";
            }else if($almacen == "capu1"){
              $campo = "stockMinimoCp1";
            }else if($almacen == "capu2"){
              $campo = "stockMinimoCp2";
            }else if($almacen == "lastorres1"){
              $campo = "stockMinimoTr1";
            }else if($almacen == "lastorres2"){
              $campo = "stockMinimoTr2";
            }
          
            $sumaSalidas =  "SELECT SUM(al.salidasUnidades) AS totalSalidas FROM almacen".$almacenDatos." as al INNER JOIN productos AS p ON al.idProducto = p.id ".$parametros."";
            $respuestaSalidas = mysqli_query($conn, $sumaSalidas) or die("database error:". mysqli_error($conn));
            $salidasMostradas = mysqli_fetch_array($respuestaSalidas);

            $totalSalidas = $salidasMostradas["totalSalidas"];
            $stockMinimo = $totalSalidas / 6;

            $actualizarStock = "UPDATE productos SET ".$campo." = ".round($stockMinimo)." WHERE id = ".$id." ";
            mysqli_query($conn, $actualizarStock) or die("database error:". mysqli_error($conn));

            $import_status = '?import_status=success';

           } else if ($existenciaAnterior != $unidadesInicial) {

            $import_status = '?import_status=diferencias';
            $descripcion = "Error de Importación en ALMACEN ".strtoupper($almacenDatos)." hubo diferencias con las Existencias";

          }else{

          }

        }
        
        
        $insertarImportaciones = "INSERT INTO importaciones(id,descripcion,idUsuario) VALUES('".$idImportacion."','".$descripcion."','".$idUsuario."')";
        mysqli_query($conn, $insertarImportaciones) or die("database error:". mysqli_error($conn));

        fclose($csv_file);
        //$import_status = '?import_status=success';
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