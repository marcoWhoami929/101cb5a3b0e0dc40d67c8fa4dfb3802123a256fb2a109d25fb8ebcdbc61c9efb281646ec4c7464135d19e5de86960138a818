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
					<h4 class="page-title">Lista de Requisiciones</h4>
					<div class="ml-auto text-right">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Tablero</a></li>
								<li class="breadcrumb-item active" aria-current="page">Lista de Requisiciones</li>
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
									    <div class="d-md-flex align-items-center">
			                                <div>
			                                	<a href="vistas/modulos/reportes.php?requisiciones=pedidossemanales" >
			                                		<button type="button" class="btn btn-success btn-sm">
			                                        <i class="fas fa-file-excel fa-2x"></i></button>
			                                    </a><br><br>
			                                    <h4 class="card-title">Estatus</h4>
			                                    <button type='button' class='btn btn-primary btn-sm'><i class="far fa-paper-plane fa-2x"></i></button> <strong>Pedido Solicitado</strong>
			                                    <button type='button' class='btn btn-success btn-sm'><i class="fab fa-searchengin fa-2x"></i></button> <strong>Pedido En Revisión</strong>
			                                    <button type='button' class='btn btn-danger btn-sm'><i class='fa fa-vote-yea fa-2x'></i></button> <strong>Pedido Aprobado</strong>
			                                    <button type='button' class='btn btn-warning btn-sm'><i class="fa fa-clipboard-list fa-2x"></i></button> <strong>Pedido Concluido</strong>
			                                  
			                                </div>
			                            </div>
			                            <br>
			                            <br>
										<div class="row">

											<div class="col-lg-12 col-md-12 col-sm-12 table-responsive">
											
												<table class="table table-bordered table-striped dt-responsive tablaListaRequisiciones" width="100%"  style="border: 2px solid #1F262D">

													<thead style="background:#1F262D;color: white">

														<tr>
															<th style="border:none">Estatus</th>
															<th style="border:none"></th>
															<th style="border:none">Id</th>
															<th style="border:none">Sucursal</th>
															<th style="border:none">Descripción</th>
															<th style="border:none">Unidades Solicitadas</th>
															<th style="border:none">monto Solicitado</th>
															<th style="border:none">Fecha</th>
															<th style="border:none">Detalle</th>
															<th style="border:none">Nivel Surtimiento</th>
															<th style="border:none">Obervaciones Aprobada</th>
															<th style="border:none">Observaciones Concluida</th>
														
														</tr> 

													</thead>
												</table>
											</div>

										</div>
										<br>

									</div>
								</div>
							</div>
						</div>
					</div>

						<!--=====================================
						
						======================================-->
						<div id="modalNivelSurtimiento" class="modal fade" role="dialog">
				  			<div class="modal-dialog" >
				    			<div class="modal-content">

				      				<form role="form" method="post" enctype="multipart/form-data">
							        <!-- CABEZA DEL MODAL-->
					        			<div class="modal-header" style="background:#1F262D; color:white">

					          				<h4 class="modal-title">Nivel de Surtimiento</h4>
					          				<button type="button" class="close" data-dismiss="modal">&times;</button>

					        			</div>
								        <!--CUERPO DEL MODAL-->
					        			<div class="modal-body">
					          				<div class="box-body">
					            				

					            				<div class="col-lg-12 col-md-12 col-sm-12" id="cargarSurtimiento">
												<?php include("vistas/modulos/graficos/graficoNivelSurtimiento.php");?>

					            				</div>

					          				</div>
					        			</div>
					        			<!-- PIE DEL MODAL-->
								        <div class="modal-footer">

								          	<button type="button" class="btn btn-dark pull-left" data-dismiss="modal">Salir</button>
								          	

								        </div>
								        


				     				</form>
				    			</div>
				  			</div>
						</div>
		

				</div>
			</div>
		</div>
	</div>
</div>