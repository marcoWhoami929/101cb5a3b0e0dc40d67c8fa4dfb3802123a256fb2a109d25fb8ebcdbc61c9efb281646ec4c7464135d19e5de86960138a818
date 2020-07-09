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
					<h4 class="page-title">Configuraciones</h4>
					<div class="ml-auto text-right">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Tablero</a></li>
								<li class="breadcrumb-item active" aria-current="page">Configuraciones</li>
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

					                     	<div class="row col-lg-12 col-md-12 col-sm-12">
					                     		<div class="col-lg-2 col-md-2 col-sm-2 ">
						                     		<span><strong>Seleciona Una Familia:</strong></span>
						                     		<?php 
						                     			error_reporting(E_ALL);
														require_once "controladores/inventarios.php";
														require_once "modelos/inventarios.php";

														$verFamilias = ControladorInventarios::ctrMostrarFamilias();

														echo '<select class="form-control" id="elegirFamilia">';

															for($i = 0; $i < count($verFamilias); $i++){

																$id = $verFamilias[$i]["id"];
																$nombre = $verFamilias[$i]["nombre"];

											                    echo '<option value="'.$id.'">'.$nombre.'</option>';
											                }
										      
										                echo '</select>';

														//$fechaActual = date("Y-m-d");

														//echo date("Y-m-d",strtotime($fechaActual."- 2 days")); 

						                     		 ?>

						                     		
						                     		
					                        	</div>

					                        	<div class="col-lg-2 col-md-2 col-sm-2">
					                        		<span><strong>Introduce cuantos Dias</strong></span>
					                        		<input type="text" class="form-control" id="editarDias" name="editarDias" placeholder="Ingrese los Dias">
					                        	</div>
					                        	
					                        	<div class="col-lg-3 col-md-3 col-sm-3 ">
					                        		<span><strong><br></strong></span>
													<button type="button" class="btn btn-secondary" id="editarTiempo">Enviar</button>
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