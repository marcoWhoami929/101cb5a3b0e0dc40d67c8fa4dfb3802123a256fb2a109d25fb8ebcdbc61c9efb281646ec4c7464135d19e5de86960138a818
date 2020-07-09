<?php
/**************CONTROLADORES*******************/
require_once "controladores/plantilla.php";
require_once "controladores/administradores.php";
require_once "controladores/inventarios.php";

/***************MODELOS*******************/

require_once "modelos/plantilla.php";
require_once "modelos/administradores.php";
require_once "modelos/rutas.php";
require_once "modelos/inventarios.php";


$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();