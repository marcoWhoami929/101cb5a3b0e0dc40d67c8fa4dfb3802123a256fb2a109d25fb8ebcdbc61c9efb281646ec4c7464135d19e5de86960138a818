<?php 
class ControladorReportes{


	public function ctrReporteRequisiciones(){

		if(isset($_GET["requisiciones"])){
			
			$tabla = $_GET["requisiciones"];

			$reporte = ModeloReportes::mdlReporteRequisiciones($tabla);

			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$nombreArchivo = "Reporte Requisiciones";
			$nombre = $nombreArchivo.'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header('Content-type: application/vnd.ms-excel');// Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$nombre.'"');
			header("Content-Transfer-Encoding: binary");
			

			/*=============================================
		
			=============================================*/

			if($_GET["requisiciones"] == "pedidossemanales"){	

				$camposTabla = ['Estatus','Sucursal','Descripción','Clasificacion del Pedido','Unidades Solicitadas','Unidades Aprovadas','Monto Solicitado','Fecha','Nivel de Surtimiento','Observaciones Aprovada','Observaciones Concluida'];

				echo utf8_decode("<table>");
				echo "<tr>
					<th colspan='11' style='font-weight:bold; background:#17202A; color:white;'>SAN FRANCISCO DEKKERLAB</th>
					</tr>

					<tr>
					<th colspan='11' style='font-weight:bold; background:#17202A; color:white;'>R E P O R T E &nbsp; R E Q U I S I C I O N E S&nbsp</th>
					</tr>";
				echo utf8_decode("<tr>");
				for ($i=0; $i < count($camposTabla); $i++) { 
					echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'></td>");
					
				}
				echo utf8_decode("</tr>");
				echo utf8_decode("<tr>");

				foreach ($camposTabla as $key => $value) {
						
						echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'>".$value."</td>");
	
				}
				echo utf8_decode("</tr>");

				foreach ($reporte as $key => $value) {

					if ($value["solicitado"] == 1 and $value["revision"] == 0 and $value["aprobado"] == 0 and $value["concluido"] == 0) {

			 			$estatus = "Pedido Solicitado";

			 		}else if ($value["solicitado"] == 1 and $value["revision"] == 1 and $value["aprobado"] == 0 and $value["concluido"] == 0){

			 			$estatus = "Pedido en Revisión";

			 		}else if ($value["solicitado"] == 1 and $value["revision"] == 1 and $value["aprobado"] == 1 and $value["concluido"] == 0){

			 			$estatus = "Pedido Aprovado";

			 		}else if ($value["solicitado"] == 1 and $value["revision"] == 1 and $value["aprobado"] == 1 and $value["concluido"] == 1){

			 			$estatus = "Pedido Concluido";
			 		}

			 		if ($value["observacionesAprobado"] == "") {
	 			
			 			$observacionesAprobado = "Sin observaciones";
			 		}else{
			 			$observacionesAprobado = $value["observacionesAprobado"];
			 		}

			 		if ($value["observacionesConcluido"] == "") {
	 			
			 			$observacionesConcluido = "Sin observaciones";
			 		}else{
			 			$observacionesConcluido = $value["observacionesConcluido"];
			 		}

			 		$nivelSurtimiento = ($value["unidadesSolicitadas"]*100)/$value["unidadesAprobadas"];

			 		if ($value["statusTipoPedido"] == 0) {
			 			$clasificacionPedido = "Urgente";
			 		}else{
			 			$clasificacionPedido = "Extraurgente";
			 		}

					echo utf8_decode("<tr>
										<td style='color:black;'>".$estatus."</td>
										<td style='color:black;'>".$value["sucursal"]."</td>
										<td style='color:black;'>".$value["descripcion"]."</td>
										<td style='color:black;'>".$clasificacionPedido."</td>
										<td style='color:black;'>".$value["unidadesSolicitadas"]."</td>
										<td style='color:black;'>".$value["unidadesSolicitadas"]."</td>
										<td style='color:black;'>".$value["montoSolicitado"]."</td>
										<td style='color:black;'>".$value["fecha"]."</td>
										<td style='color:black;'>".number_format($nivelSurtimiento,2)." %</td>
										<td style='color:black;'>".$observacionesAprobado."</td>
										<td style='color:black;'>".$observacionesConcluido."</td>
							
										</tr>");
	
				}

			echo "</table>";

			}
			/****FIN DE LA TABLA***/
		}
	}
	/*******************REPORTE REQUISICION TIENDAS********************/
	public function ctrReporteRequisicionesTiendas(){

		if(isset($_GET["requisicionesTiendas"])){
			
			$tabla = $_GET["requisicionesTiendas"];

			$item = "sucursal";
			$valor = $_GET["sucursal"];

			$reporte = ModeloReportes::mdlReporteRequisicionesTienda($tabla,$item,$valor);

			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$nombreArchivo = "Reporte Requisiciones";
			$nombre = $nombreArchivo.'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header('Content-type: application/vnd.ms-excel');// Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$nombre.'"');
			header("Content-Transfer-Encoding: binary");
			

			/*=============================================
		
			=============================================*/

			if($_GET["requisicionesTiendas"] == "pedidossemanales"){	

				$camposTabla = ['Estatus','Descripción','Observaciones Solicitud','Clasificacion del Pedido','Unidades Solicitadas','Unidades Aprovadas','Fecha','Nivel de Surtimiento','Observaciones Aprovada','Observaciones Concluida'];

				echo utf8_decode("<table>");
				echo "<tr>
					<th colspan='10' style='font-weight:bold; background:#17202A; color:white;'>SAN FRANCISCO DEKKERLAB</th>
					</tr>

					<tr>
					<th colspan='10' style='font-weight:bold; background:#17202A; color:white;'>R E P O R T E &nbsp; R E Q U I S I C I O N E S&nbsp</th>
					</tr>";
				echo utf8_decode("<tr>");
				for ($i=0; $i < count($camposTabla); $i++) { 
					echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'></td>");
					
				}
				echo utf8_decode("</tr>");
				echo utf8_decode("<tr>");

				foreach ($camposTabla as $key => $value) {
						
						echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'>".$value."</td>");
	
				}
				echo utf8_decode("</tr>");

				foreach ($reporte as $key => $value) {

					if ($value["solicitado"] == 1 and $value["revision"] == 0 and $value["aprobado"] == 0 and $value["concluido"] == 0) {

			 			$estatus = "Pedido Solicitado";

			 		}else if ($value["solicitado"] == 1 and $value["revision"] == 1 and $value["aprobado"] == 0 and $value["concluido"] == 0){

			 			$estatus = "Pedido en Revisión";

			 		}else if ($value["solicitado"] == 1 and $value["revision"] == 1 and $value["aprobado"] == 1 and $value["concluido"] == 0){

			 			$estatus = "Pedido Aprovado";

			 		}else if ($value["solicitado"] == 1 and $value["revision"] == 1 and $value["aprobado"] == 1 and $value["concluido"] == 1){

			 			$estatus = "Pedido Concluido";
			 		}
			 		if ($value["statusTipoPedido"] == 0) {
			 			$clasificacionPedido = "Urgente";
			 		}else{
			 			$clasificacionPedido = "Extraurgente";
			 		}

			 		if ($value["observacionesAprobado"] == "") {
	 			
			 			$observacionesAprobado = "Sin observaciones";
			 		}else{
			 			$observacionesAprobado = $value["observacionesAprobado"];
			 		}

			 		if ($value["observacionesConcluido"] == "") {
	 			
			 			$observacionesConcluido = "Sin observaciones";
			 		}else{
			 			$observacionesConcluido = $value["observacionesConcluido"];
			 		}
			 		$nivelSurtimiento = ($value["unidadesSolicitadas"]*100)/$value["unidadesAprobadas"];


					echo utf8_decode("<tr>
										<td style='color:black;'>".$estatus."</td>
										<td style='color:black;'>".$value["descripcion"]."</td>
										<td style='color:black;'>".$value["comentarios"]."</td>
										<td style='color:black;'>".$clasificacionPedido."</td>
										<td style='color:black;'>".$value["unidadesSolicitadas"]."</td>
										<td style='color:black;'>".$value["unidadesAprobadas"]."</td>
										<td style='color:black;'>".$value["fecha"]."</td>
										<td style='color:black;'>".number_format($nivelSurtimiento,2)." %</td>
										<td style='color:black;'>".$observacionesAprobado."</td>
										<td style='color:black;'>".$observacionesConcluido."</td>
										
							
										</tr>");
	
				}

			echo "</table>";

			}
			/****FIN DE LA TABLA***/
		}
	}

}


 ?>