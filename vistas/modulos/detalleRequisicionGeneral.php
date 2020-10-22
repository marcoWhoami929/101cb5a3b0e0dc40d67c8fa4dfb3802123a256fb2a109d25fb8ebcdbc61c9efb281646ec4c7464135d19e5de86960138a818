<?php 
session_start();
 ?>
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
								<li class="breadcrumb-item active" aria-current="page">Detalle Requisición</li>
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
												<h3>Detalle Requisición Solicitada</h3>
												<small></small>
												<br>
												Unidades Solicitadas:<span id="unidadesPedidoAprobadas"></span>
												<br>
												Monto Pedido :<span id="montoPedidoAprobado"></span>
												<br>
												<button type="button" class="btn btn-success" id="btnAprobarRequisicion">Aprobar Requisición</button>
												<br>
												<br>
												<textarea id="observacionesRequisicion" name="observacionesRequisicion" rows="4" cols="50" class="form-control"></textarea>
												<br>
												<div>
													
			                                    <h4 class="card-title">Estatus</h4>
			                                    <button type='button' class='btn btn-danger btn-sm'><i class="fas fa-boxes fa-2x" ></i></button> <strong>Solo se enviará lo aprobado</strong>
			                                    <button type='button' class='btn btn-success btn-sm'><i class="fas fa-truck-loading fa-2x"></i></button> <strong>Aprobado Totalmente</strong>
			                                   
			                                  
			                                </div>

												<br>
												<div class="table-responsive">
													<table class="table table-bordered table-striped dt-responsive tablaDetalleRequisicionGeneral" width="100%"  style="border: 2px solid #1F262D">

													<thead style="background:#1F262D;color: white">

														<tr>
															<th style="border:none">Estatus</th>
															<th style="border:none"><span class="verticalTextTable">Codigo</span></th>
															<th style="border:none"><span class="verticalTextTable">Producto</span></th>
															<th style="border:none"><span class="verticalTextTable">Existencias</span></th>
															<th style="border:none"><span class="verticalTextTable">Opciones</span></th>
															<th style="border:none"><span class="verticalTextTable">Solicitado</span></th>
															<th style="border:none"><span class="verticalTextTable">Aprobado</span></th>
															<th style="border:none"><span class="verticalTextTable">Pendiente</span></th>
															<th style="border:none"><span class="verticalTextTable">Faltante Monto</span></th>
															<th style="border:none"><span class="verticalTextTable">Monto Solicitadoo</span></th>
															<th style="border:none"><span class="verticalTextTable">Monto Aprobado</span></th>
															<th style="border:none"><span class="verticalTextTable">Monto Pendiente</span></th>

														
														</tr> 

													</thead>
											
												</table>
												</div>
												
											</div>

										</div>
										<br>

									</div>
								</div>
							</div>
						</div>
					</div>
					
				

					<!-- Modal -->
					<div class="modal fade bs-example-modal-lg" id="verContratipo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
						  <div class="modal-header" style="background:#1F262D; color:white">
						  	<h4 class="modal-title" id="myModalLabel">Contratipos</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							
						  </div>
						  <div class="modal-body">
							<form class="form-horizontal">
							  <div class="input-group">
								<div class="col-sm-6">
								  <input type="hidden" class="form-control" id="q" placeholder="Buscar productos" onkeyup="load(1)">
								  <input type="hidden" class="form-control" id="grupoSesion" value="<?php echo $_SESSION["grupo"] ?>">
								  <input type="hidden" class="form-control" id="sesion" value="<?php echo $_SESSION["nombre"]; ?>">
								  <input type="hidden" class="form-control" id="idSesion" value="<?php echo $_SESSION["id"]; ?>">
								  <input type="hidden" class="form-control" id="detalleIdPedido">
								  <input type="hidden" class="form-control" id="detalleIdProducto">
								  <input type="hidden" class="form-control" id="detalleIdMovimiento">
								  <input type="hidden" class="form-control" id="detalleIdContratipo">
								  <input type="hidden" class="form-control" id="detalleSolicitado">
								  <input type="hidden" class="form-control" id="detalleMontoSolicitado">
								  <input type="hidden" class="form-control" id="detalleIdProductoPedido">
								</div>
							  </div>
							</form>
							<br>
							<div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
							<div class="outer_div" ></div><!-- Datos ajax Final -->
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
							
						  </div>
						</div>
					  </div>
					</div>


				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="progresoGenerarPedido" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<center><h3 id="progreso"></h3></center>
        <div class="loader-container">
		    <div class="loader"></div>
		    <div class="loader2"></div>
		 </div>
      </div>
    
    </div>
  </div>
</div>
<script>


	function load(page){
		var q= $("#q").val();
		var sesion = $("#sesion").val();
		var grupoSesion = $("#grupoSesion").val();
		var idUser = $("#idSesion").val();
		var idSesion = idUser * 1;

		var idContratipo = $("#detalleIdContratipo").val();
		var idProducto = $("#detalleIdProducto").val();
		var solicitado = $("#detalleSolicitado").val();
		var idPedido = $("#detalleIdPedido").val();
		var montoSolicitado = $("#detalleMontoSolicitado").val();
		var idProductoPedido = $("#detalleIdProductoPedido").val();
		
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'ajax/agregarContratipo.ajax.php?action=ajax&page='+page+'&sesion='+sesion+'&grupoSesion='+grupoSesion+'&idSesion='+idSesion+'&idContratipo='+idContratipo+'&idProducto='+idProducto+'&solicitado='+solicitado+"&idPedido="+idPedido+"&montoSolicitado="+montoSolicitado+"&idProductoPedido="+idProductoPedido,
			beforeSend: function(objeto){
				 $('#loader').html('<img src="vistas/img/loader.gif"> Cargando...');
			},
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$('#loader').html('');
					
			}
		})
	}
</script>
<script type="text/javascript">
	$(document).ready(function(){

		var unidadesAprobadas = localStorage.getItem("unidadesAprobadas");
		var montoAprobado = localStorage.getItem("montoAprobado");

		if (montoAprobado == null) {

		}else{

			$("#unidadesPedidoAprobadas").html(unidadesAprobadas);
			$("#montoPedidoAprobado").html("$ "+montoAprobado);

		}

		/*
		
		 */
		var datos = new FormData();
  		datos.append("sesion3","1");

                 $.ajax({
                    url: "ajax/functions.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(respuesta) {
                      var response = respuesta;
                      var unidades = response.split("|");

                      var unidadesPedido = unidades[0];
                      var montoPedido = unidades[1];

                      var unidadesPedido = unidadesPedido.replace('"','')*1;
                      var montoPedido = montoPedido.replace('"','') * 1;

                      $("#unidadesPedidoAprobadas").html(unidadesPedido);
                      $("#montoPedidoAprobado").html("$"+montoPedido.toFixed(2));

                      localStorage.setItem("unidadesPedidoAprobadas", unidadesPedido);
                      localStorage.setItem("montoPedidoAprobado",montoPedido);

                     

                    }
                })

	})

</script>