<div class="preloader">
	<div class="lds-ripple">
		<div class="lds-pos"></div>
		<div class="lds-pos"></div>
	</div>
</div>
<div id="main-wrapper">
	<div class="page-wrapper">
		<div class="page-breadcrumb">
			<div class="row">
				<div class="col-12 d-flex no-block align-items-center">
					<h4 class="page-title"></h4>
					<div class="ml-auto text-right">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Tablero</a></li>
								<li class="breadcrumb-item active" aria-current="page">Pedido Semanal</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 border-right p-r-0">
									
									<div class="card-body">
										<div class="row">

											<div class="col-lg-12 col-md-12 col-sm-12">
												<h3>Pedido Semanal</h3>
												<small>A continuación se detalla el pedido sugerido que el sistema proporciona.</small>
												<br>
												<button type="button" class="btn btn-warning" id="btnSolicitarPedido" identificador="pedidoSugerido">Solicitar Pedido</button>
												<br>
												<br>
												<table class="table table-bordered table-striped dt-responsive tablePedidoSemanal" width="100%" id="pedidoSemanal" style="border: 2px solid #1F262D">

													<thead style="background:#1F262D;color: white">

														<tr>
															<th style="border:none">#</th>
															<th style="border:none">Codigo</th>
															<th style="border:none">Producto</th>
															<th style="border:none">Stock Minimo</th>
															<th style="border:none">Existencias</th>
															<th style="border:none">Faltante Unidades</th>
															
															<th style="border:none">Fecha</th>
															<th style="border:none">Estado</th>
														</tr> 

													</thead>
													<!--
													<tfoot>
                    
							                            <?php 
							                            
							                                //$fechaActual = date("Y-m-d");
							                                //$fechaActual = "2020-07-11";
							                                //$fechaFinal = date("Y-m-d", strtotime($fechaActual));
							                                //$tabla = "productos AS p INNER JOIN almacensanmanuel1 AS al ON p.id = al.idProducto";
							                                //$campos = "SUM(al.ultimoCosto * (p.stockMinimoGral1-al.existenciasUnidades) ) as faltanteMontos, SUM(al.ultimoCosto) as ultimoCosto,if(p.stockMinimoGral1-al.existenciasUnidades < 0,'0',SUM(p.stockMinimoGral1-al.existenciasUnidades)) as faltantes";
							                                //$parametros = "WHERE al.existenciasUnidades != 0 and if(p.stockMinimoGral1-al.existenciasUnidades < 0,'0',p.stockMinimoGral1-al.existenciasUnidades) >= 1 AND  al.fecha = "."'".$fechaFinal."' group by p.codigoProducto";


							                                //$totales = ControladorInventarios::ctrMostrarProductosPorAgotarse($tabla, $campos, $parametros);

							                             ?>
							                                <tr>
							                                    <th rowspan="2" colspan="3" style="border:none;color: blue;text-align: right;font-size: 15px;">Total General</th>
							                                    <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;"></th>
							                                    <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante Unidades</th>
							                                    <th colspan="2" style="border:none;color: black;text-align: right;font-size: 15px;">Total Faltante en Monto</th>
							                                </tr>
							                                <tr>
							                                

							                                <?php
							                                   	//$ultimoCosto = $totales[0]["ultimoCosto"];
							                                    //$totalFaltantes = $totales[0]["faltantes"];
							                                    //$totalFaltanteMonto = $totales[0]["faltanteMontos"];
							                                     //echo '<th colspan="2" style="border:none;color: blue;text-align:right;"></th>';
							                                    //echo '<th colspan="2" style="border:none;color: blue;text-align:right;">$ '.number_format($totalFaltantes,2).' </th>';
							                                    //echo '<th colspan="2" style="border:none;color: blue;text-align:right;">$ '.number_format($totalFaltanteMonto,2).' </th>';
							                               
							                                 ?>
							                            </tr>
							                        </tfoot>
							                    -->
												</table>
											</div>

										</div>
										<br>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>