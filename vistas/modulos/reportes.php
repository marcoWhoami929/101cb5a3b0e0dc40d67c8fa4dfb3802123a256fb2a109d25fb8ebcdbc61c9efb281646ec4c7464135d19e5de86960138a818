<?php

require_once "../../controladores/reportes.php";
require_once "../../modelos/reportes.php";

require_once "../../controladores/inventarios.php";
require_once "../../modelos/inventarios.php";

if (isset($_GET["requisiciones"])) {
	$reporteSeguimientos = new ControladorReportes();
	$reporteSeguimientos -> ctrReporteRequisiciones();
}

?>