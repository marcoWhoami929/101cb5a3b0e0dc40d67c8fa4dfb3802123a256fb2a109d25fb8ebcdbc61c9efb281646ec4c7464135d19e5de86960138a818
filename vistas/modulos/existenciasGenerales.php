<style>
    .verticalText {
        writing-mode: vertical-lr;
        transform: rotate(180deg);
    }

</style>
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
					<h4 class="page-title">Existencias Generales</h4>
					<div class="ml-auto text-right">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Tablero</a></li>
								<li class="breadcrumb-item active" aria-current="page">Existencias Generales</li>
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
                        						<h3>Existencias</h3>
                        						<table class="table table-bordered table-striped dt-responsive tableExistenciasGenerales" width="100%" id="existenciasGenerales" style="border: 2px solid #1F262D">

                          							<thead style="background:#1F262D;color: white">

							                            <tr>
							                            	<th style="border:none">#</th>
							                            	<th style="border:none">Codigo</th>
							                            	<th style="border:none">Producto</th>
							                            	<th style="border:none">Ver</th>
							                            </tr> 

                          							</thead>
                        						</table>
                      						</div>

                    					</div><br>
                  					</div>

                				</div>
              				</div>
            			</div>
          			</div>
        		</div>
      		</div>
    	</div>
		
		<!--=====================================
		MODAL AGREGAR PERFIL
		======================================-->
		<div id="modalVer" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">>
  			<div class="modal-dialog modal-lg">
    			<div class="modal-content">

      				<form role="form" method="post" enctype="multipart/form-data">
			        <!-- CABEZA DEL MODAL-->
	        			<div class="modal-header" style="background:#1F262D; color:white">

	          				<h4 class="modal-title">EXISTENCIAS DEL PRODUCTO</h4>
	          				<button type="button" class="close" data-dismiss="modal">&times;</button>

	        			</div>

	        			<div class="modal-body">
	          				<div class="box-body">
	            				<!-- ENTRADA PARA EL NOMBRE -->

	            				<div class="form-group">
	            					<span style="font-weight: bold">Nombre del Producto</span>
	            					<div class="input-group">
		            					<span class="input-group-addon"><i class="fas fa-clipboard-list fa-2x"></i></span>&nbsp; 
		            					<input type="text" class="form-control input-lg" name="nombreProducto" id="nombreProducto" disabled>
		            				</div>
	            				</div>
	            				<div class="form-group">

			                		<div class="table-responsive" id="verExistenciasTable" >
			                            <table class="table table-bordered table-striped dt-responsive" id="tableVerExistencias" style="border: 2px solid #1F262D">
			                                <caption></caption>
			                            </table>
			                        </div>
			                    </div>
			                </div>
			            </div>

	        			<!-- PIE DEL MODAL-->
				        <div class="modal-footer">

				          	<button type="button" class="btn btn-dark pull-left" id="salirVerExistencias" data-dismiss="modal">Salir</button>

				        </div>
     				</form>
    			</div>
  			</div>
		</div>

  	</div>
</div>