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
										<strong style="font-size:14pt;"><em>Almacen General:</em></strong>
										<div class="row">

					                     	<div class="row col-lg-12 col-md-12 col-sm-12">
					                     		<div class="col-lg-2 col-md-2 col-sm-2 ">

						                     		<span><strong>Seleciona Una Familia:</strong></span>
						                     		<?php 
						                     			error_reporting(0);
														require_once "controladores/inventarios.php";
														require_once "modelos/inventarios.php";

														$tabla = "familias";
														$campos = "*";
														$verFamilias = ControladorInventarios::ctrMostrarDatosF($tabla, $campos);

														echo '<select class="form-control" id="elegirFamilia">
																<option value="">Seleccione</option>';

															for($i = 0; $i < count($verFamilias); $i++){

																$id = $verFamilias[$i]["id"];
																$nombre = $verFamilias[$i]["nombre"];
																$dias = $verFamilias[$i]["diasSurtimiento"];

											                    echo '<option value="'.$dias.'" idFamilia="'.$id.'">'.$nombre.'</option>';
											                }
										      
										                echo '</select>';
										                //$fechaActual = "2020-08-01";
										                //$fechaSum = date("Y-m-d",strtotime($fechaActual."+ 1 days"));
														//$fechaActual = date("Y-m-d");
														//$fechaMenosUno = date("Y-m-d",strtotime($fechaSum."- 6 days"));
														//echo $fechaMenosUno; 
														
														//$dias = array("domingo","lunes","martes","miércoles","jueves","viernes","sábado");
														//echo "Buenos días, hoy es ".$dias[date('w')];

															/*$fechats = strtotime($fechaActual);
															switch (date('w', $fechats)){
															    case 0: $day = "Domingo"; break;
															    case 1: $day = "Lunes"; break;
															    case 2: $day = "Martes"; break;
															    case 3: $day = "Miercoles"; break;
															    case 4: $day = "Jueves"; break;
															    case 5: $day = "Viernes"; break;
															    case 6: $day = "Sabado"; break;
															} 
															$mes = date('n', $fechats);
															$numero = 3;
															$valor = 'days';

															$fechaSum = date("Y-m-d",strtotime($fechaActual."+ ".$numero." ".$valor.""));
															echo ($fechaSum);*/

						                     		 ?>

						                     		
						                     		
					                        	</div>

					                        	<div class="col-lg-2 col-md-2 col-sm-2">
					                        		<span><strong>Introduce Cantidad</strong></span>
					                        		<?php 
					                        		echo '<input type="text" class="form-control" id="editarDias" name="editarDias" placeholder="Ingrese los Dias" value="'.$verFamilias[0]["diasSurtimiento"].'" required="true">';
					                        		 ?>
					                        		
					                        	</div>

					                        	<div class="col-lg-2 col-md-2 col-sm-2 ">
						                     		<span><strong>Elegir Periodo:</strong></span>
						                     		<select name="elegirrPeriodo" id="elegirrPeriodo" class="form-control">

						                                  <option value="">Seleccione</option>
						                                  <option value="month">Por Mes</option>
						                                  <option value="days">Por Dias</option>
						                                  

						                                </select>
						                     	</div>
					                        	<div class="col-lg-2 col-md-2 col-sm-2 ">
						                     		<span><strong>Elegir almacen:</strong></span>
						                     		<select name="elegirAlmacenGR" id="elegirAlmacenGR" class="form-control">

						                                  <option value="">Elegir Almacén</option>
						                                  <option value="almacengeneral1">Almacén General 1</option>
						                                  <option value="almacengeneral2">Almacén General 2</option>
						                                  <option value="almacensanmanuel1">Sucursal San Manuel 1</option>
						                                  <option value="almacensanmanuel2">Sucursal San Manuel 2</option>
						                                  <option value="almacenreforma1">Sucursal Reforma 1</option>
						                                  <option value="almacenreforma2">Sucursal Reforma 2</option>
						                                  <option value="almacensantiago1">Sucursal Santiago 1</option>
						                                  <option value="almacensantiago2">Sucursal Santiago 2</option>
						                                  <option value="almacencapu1">Sucursal Capu 1</option>
						                                  <option value="almacencapu2">Sucursal Capu 2</option>
						                                  <option value="almacenlastorres1">Sucursal Las Torres 1</option>
						                                  <option value="almacenlastorres2">Sucursal Las Torres 2</option>
						                                  

						                                </select>
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

	          		<div class="card">
						<div class="">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 border-right p-r-0">
									<div class="card-body">
										<div class="row">

					                     	<div class="row col-lg-12 col-md-12 col-sm-12">
					                     		
					                        	<div class="col-lg-2 col-md-2 col-sm-2 ">
						                     		<span><strong>Selecionar Producto:</strong></span>
						                     		<?php 
						                     			error_reporting(E_ALL);
														require_once "controladores/inventarios.php";
														require_once "modelos/inventarios.php";

														$tabla = "productos";
														$campos = "*";

														$verFamilias = ControladorInventarios::ctrMostrarDatosF($tabla, $campos);

														echo '<select class="selectpicker form-control" data-live-search="true" id="elegirProducto">';

															for($i = 0; $i < count($verFamilias); $i++){

																$id = $verFamilias[$i]["id"];
																$nombre = $verFamilias[$i]["nombreProducto"];
																

											                    echo '<option value="'.$id.'" >'.$nombre.'</option>';
											                }
										      
										                echo '</select>';

						                     		 ?>

						                     		 
					                        	</div>
					                        	<div class="col-lg-2 col-md-2 col-sm-2 ">
						                     		<span><strong>Elegir almacen:</strong></span>
						                     		<select name="elegirAlmacen" id="elegirAlmacen" class="form-control">

						                                  <option value="">Elegir Almacén</option>
						                                  <option value="almacengeneral1">Almacén General 1</option>
						                                  <option value="almacengeneral2">Almacén General 2</option>
						                                  <option value="almacensanmanuel1">Sucursal San Manuel 1</option>
						                                  <option value="almacensanmanuel2">Sucursal San Manuel 2</option>
						                                  <option value="almacenreforma1">Sucursal Reforma 1</option>
						                                  <option value="almacenreforma2">Sucursal Reforma 2</option>
						                                  <option value="almacensantiago1">Sucursal Santiago 1</option>
						                                  <option value="almacensantiago2">Sucursal Santiago 2</option>
						                                  <option value="almacencapu1">Sucursal Capu 1</option>
						                                  <option value="almacencapu2">Sucursal Capu 2</option>
						                                  <option value="almacenlastorres1">Sucursal Las Torres 1</option>
						                                  <option value="almacenlastorres2">Sucursal Las Torres 2</option>

						                                </select>
						                     	</div>
					                        	
					                        	<div class="col-lg-3 col-md-3 col-sm-3 ">
					                        		<span><strong><br></strong></span>
													<button type="button" class="btn btn-secondary" id="recalcularStok">Recalcular</button>
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

<script>

	$(function(){
	  	$(document).on('change','#elegirFamilia',function(){
	    	var value = $(this).val();
	      $('#editarDias').val(value);
	    });
  });
</script>