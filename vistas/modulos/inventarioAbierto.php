<?php
	session_start();
 	$url =  'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

  	$parametros = parse_url($url);
           
    if (isset($parametros['query'])) {
    	parse_str($parametros['query'], $parametro);
    	$inventario = $parametro['statusInventario'];
    	$clasificar = $parametro['clasificarInventario'];
   		$familia = $parametro['familia'];
    }else{
    }
    $grupo = $_SESSION["grupo"];
    $sesion = $_SESSION["nombre"];
    if ($grupo == "Administrador") {
    	$almacen = "Almacen General";
    }else{
	    if ($sesion = "Sucursal San Manuel") {
	        $almacen = "San Manuel";
	    }else if ($sesion == "Sucursal Santiago") {
	        $almacen = "Santiago";
	    }else if ($sesion == "Sucursal Las Torres") {
	        $almacen = "Las Torres";
	    }else if ($sesion == "Sucursal Reforma") {
	        $almacen = "Reforma";
	    }else if ($sesion == "Sucursal Capu") {
	        $almacen = "Capu";
	    }
	}

	$fechaActual = date("Y-m-d");

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
					<h4 class="page-title">Inventario Abierto <?php echo $almacen; ?></h4>
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

			        							<div class="card border-dark mb-3" >
									                
													<div class="card-body table-responsive">
														<div class="col-sm-12">
															<form action="inventarioAbierto" method="GET">
																<div class="form-group row">
																	<input type="hidden" name="statusInventario" id="statusInventario" value="abierto">
																	<div class="col-sm-3">
																		<span><strong>Seleciona Una Opción:</strong></span>
																		<select class="form-control" name="clasificarInventario" id="clasificarInventario">
																			<option value="">Elegir</option>
																			<option value="general">En General</option>
																			<option value="porFamilia">Por Familia</option>
																		</select>
																	</div>
																	<div class="col-sm-3" id="seleccionFamilia" style="display: none;">
																		<?php 
													                    error_reporting(0);
																		require_once "controladores/inventarios.php";
																		require_once "modelos/inventarios.php";

																		$tabla = "familias";
																		$campos = "*";
																		$verFamilias = ControladorInventarios::ctrMostrarDatosF($tabla, $campos);

																		echo '<span><strong>Seleciona Una Familia:</strong></span>
																			<select class="form-control" name="familia" id="familia">
																				<option value="">Seleccione</option>';

																				for($i = 0; $i < count($verFamilias); $i++){

																					$id = $verFamilias[$i]["id"];
																					$nombre = $verFamilias[$i]["nombre"];
																					$dias = $verFamilias[$i]["diasSurtimiento"];

																		        echo '<option value="'.$id.'">'.$nombre.'</option>';
																		                }
																	      
																	    echo '</select>';
																	     ?>
																	</div>
																	<div class="col-sm-4">
																		<span><strong><br></strong></span>
																		<button type="submit" class="btn btn-secondary">Buscar</button>
																		<button type="button" class="btn btn-secondary" id="terminarRevision">Terminar</button>
																	</div>
																</div>
								                			</form>
														</div>
														<input type="hidden" name="seleccion" id="seleccion">
														<input type="hidden" name="tipo" id="tipo" value="<?php echo $clasificar ?>">

														<input type="hidden" name="clasificacionFamilia" id="clasificacionFamilia" value="<?php echo $familia ?>">
														<input type="hidden" name="tipoInventario" id="tipoInventario" value="<?php echo $inventario ?>">
														<input type="hidden" name="fechaActual" id="fechaActual" value="<?php echo $fechaActual ?>">
														<input type="hidden" name="fechaActual" id="fechaActual" value="<?php echo $fechaActual ?>">
														

														
														<table class="table table-bordered table-striped dt-responsive tablaInventarioFisico" width="100%" id="inventarioFisico" style="border: 2px solid #1F262D">

													    	<thead style="background:#1F262D;color: white">

													        	<tr>
													                <th style="border:none">#</th>
													                <th style="border:none">Codigo</th>
													                <th style="border:none">Producto</th>
													                <th style="border:none">Entradas</th>
													                <th style="border:none">Salidas</th>
													                <th style="border:none">Existencias</th>
													                <th style="border:none">Fisico</th>
													                <th style="border:none">Diferencia</th>
													                <th style="border:none">Status</th>
													               <!--  <th style="border:none">Diferencia</th> -->
													            </tr> 

													    	</thead>
										            	</table>
										        	</div>
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
<script type="text/javascript">
	$(function(){
        $(document).on('click','#clasificarInventario',function(){
           var tipoSeleccion = $("#seleccion").val();
           if (tipoSeleccion == "porFamilia") {
            div1 = document.getElementById("seleccionFamilia");
            div1.style.display = "";
           }else{
            div1 = document.getElementById("seleccionFamilia");
            div1.style.display = "none";

            input = document.getElementById("seleccion");
            input.value = "";

            select = document.getElementById("familia");
            select.value = "";
           }
        });
  });
</script>