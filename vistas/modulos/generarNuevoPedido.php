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
								<li class="breadcrumb-item active" aria-current="page">Detalle Pedido</li>
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
												<h3>Detalle Pedido Semanal</h3>
												<small>A continuación se debe elegir las unidades a solicitar del pedido sugerido.</small>
												<br>
												Unidades Solicitadas:<span id="unidadesPedido"></span>
												<br>
												Monto Pedido :<span id="montoPedido"></span>
												<br>
												<button type="button" class="btn btn-success" id="btnGenerarPedido">Generar Pedido</button>
												<br>

												<small>Agregar Observaciones <em>(opcional)</em></small>
												<textarea class="form-control" rows="2" id="comentarios"></textarea>

												<br>
												<div class="table-responsive">
													<table class="table table-bordered table-striped dt-responsive tablaSolicitudPedido" width="100%"  style="border: 2px solid #1F262D">

													<thead style="background:#1F262D;color: white">

														<tr>
															
															<th style="border:none"><span class="verticalTextTable">Codigo</span></th>
															<th style="border:none"><span class="verticalTextTable">Producto</span></th>
															<th style="border:none"><span class="verticalTextTable">Existencias</span></th>
															<th style="border:none"><span class="verticalTextTable">Sugerido</span></th>
															<th style="border:none"><span class="verticalTextTable">Solicitado</span></th>
															<!--<th style="border:none"><span class="verticalTextTable">Faltante Monto</span></th>
															<th style="border:none"><span class="verticalTextTable">Solicitado Monto</span></th>-->
															<th style="border:none"><span class="verticalTextTable">estatus</span></th>

														
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
<script type="text/javascript">
	
$(document).ready(function(){

  var datos = new FormData();
  datos.append("sesion","1");

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

                      $("#unidadesPedido").html(unidadesPedido);
                      $("#montoPedido").html("$"+montoPedido.toFixed(2));

                      localStorage.setItem("unidadesPedido", unidadesPedido);
                      localStorage.setItem("montoPedido",montoPedido);

                       if (montoPedido > 50000) {

                        var botonGenerar = document.getElementById("btnGenerarPedido");
                        botonGenerar.disabled = true;
                      }else{

                       var botonGenerar = document.getElementById("btnGenerarPedido");
                       botonGenerar.disabled = false;
                      }


                    }
                })
               

})
</script>