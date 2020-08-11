
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
					<h4 class="page-title">Fisico VS Admin</h4>
					<div class="ml-auto text-right">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Tablero</a></li>
								<li class="breadcrumb-item active" aria-current="page">Fisico VS Admin</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<input type="hidden" name="nombreUsuario" id="nombreUsuario" value="<?php echo $_SESSION["nombre"]?>">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">

							<?php 
                            if ($_SESSION["grupo"] == "Administrador") {

                                $nombreUser = $_SESSION["nombre"];
                                $perfilUser = $_SESSION["perfil"];
                                echo'
                                
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="nav-menu" role="tablist">
                        
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabGeneral" data-toggle="pill" href="#divGeneral" role="tab"  aria-selected="false" identificadorFisico = "General">Almacén General</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabSanManuel" data-toggle="pill" href="#divSanManuel" role="tab"  aria-selected="false" identificadorFisico = "SanManuel">San Manuel</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabReforma" data-toggle="pill" href="#divReforma" role="tab"  aria-selected="false" identificadorFisico = "Reforma">Reforma</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabSantiago" data-toggle="pill" href="#divSantiago" role="tab"  aria-selected="false" identificadorFisico = "Santiago">Santiago</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabCapu" data-toggle="pill" href="#divCapu" role="tab"  aria-selected="false" identificadorFisico = "Capu">Capu</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabTorres" data-toggle="pill" href="#divTorres" role="tab"  aria-selected="false" identificadorFisico = "LasTorres">Las Torres</a>
                                        </li>
                                    </ul>
                                </div>
                                ';
                            }else if ($_SESSION["perfil"]== "Tiendas" && $_SESSION["nombre"] == "Sucursal San Manuel") {
                               echo '
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="nav-menu" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabSanManuel" data-toggle="pill" href="#divSanManuel" role="tab"  aria-selected="true" identificadorFisico = "SanManuel">Ver Tablas de Almacen</a>
                                        </li>                                 
                                    </ul>
                                </div>

                               ';
                               echo '<style>#contentGr { display:none;}</style>';

                            }else if ($_SESSION["perfil"]== "Tiendas" && $_SESSION["nombre"] == "Sucursal Reforma") {
                               echo '
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="nav-menu" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabReforma" data-toggle="pill" href="#divReforma" role="tab"  aria-selected="false" identificadorFisico = "Reforma">Ver Tablas de Almacen</a>
                                        </li>                                 
                                    </ul>
                                </div>

                               ';
                               echo '<style>#contentGr { display:none;}</style>';

                            }else if ($_SESSION["perfil"]== "Tiendas" && $_SESSION["nombre"] == "Sucursal Santiago") {
                               echo '
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="nav-menu" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabSantiago" data-toggle="pill" href="#divSantiago" role="tab"  aria-selected="false" identificadorFisico = "Santiago">Ver Tablas de Almacen</a>
                                        </li>                                 
                                    </ul>
                                </div>

                               ';
                               echo '<style>#contentGr { display:none;}</style>';

                            }else if ($_SESSION["perfil"]== "Tiendas" && $_SESSION["nombre"] == "Sucursal Capu") {
                               echo '
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="nav-menu" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabCapu" data-toggle="pill" href="#divCapu" role="tab"  aria-selected="false" identificadorFisico = "Capu">Ver Tablas de Almacen</a>
                                        </li>                                 
                                    </ul>
                                </div>

                               ';
                               echo '<style>#contentGr { display:none;}</style>';

                            }else if ($_SESSION["perfil"]== "Tiendas" && $_SESSION["nombre"] == "Sucursal Las Torres") {
                               echo '
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="nav-menu" role="tablist">
                                        <li class="nav-item">
                                             <a class="nav-link" id="tabTorres" data-toggle="pill" href="#divTorres" role="tab"  aria-selected="false" identificadorFisico = "LasTorres">Ver Tablas de Almacen</a>
                                        </li>                                 
                                    </ul>
                                </div>

                               ';
                               echo '<style>#contentGr { display:none;}</style>';

                            }
                         ?>
							

            			</div>
          			</div>
        		</div>
      		</div>

			<div class="tab-pane fade" id="divGeneral" role="tabpanel">
	    		<div class="row">

	        		<div class="col-lg-12 col-md-12 col-sm-12">

	        			<div class="card border-dark mb-3" >
							<div class="card-header">
								<h3>Fisico VS Admin General 1
							    	<button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#gr1" style="float: right;"><i class="fas fa-minus-square"></i> </button>
								</h3>
							</div>
							                
							<div class="card-body collapse table-responsive"  id="gr1">
		                
								<table class="table table-bordered table-striped dt-responsive tableFisicoVSadminGeneral1" width="100%" id="fisicoVSadminGeneral1" style="border: 2px solid #1F262D">

							    	<thead style="background:#1F262D;color: white">

							        	<tr>
							                <th style="border:none">#</th>
							                <th style="border:none">Producto</th>
							                <th style="border:none">Entradas</th>
							                <th style="border:none">Salidas</th>
							                <th style="border:none">Existencias</th>
							                <th style="border:none">Fisico</th>
							                <th style="border:none">Send</th>
							            </tr> 

							    	</thead>
				            	</table>
				        	</div>
				    	</div>
				    </div>

				    <div class="col-lg-12 col-md-12 col-sm-12">

	        			<div class="card border-dark mb-3" >
							<div class="card-header">
								<h3>Fisico VS Admin General 1
							    	<button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#gr2" style="float: right;"><i class="fas fa-minus-square"></i> </button>
								</h3>
							</div>
							                
							<div class="card-body collapse table-responsive"  id="gr2">
		                
								<table class="table table-bordered table-striped dt-responsive tableFisicoVSadminGeneral2" width="100%" id="fisicoVSadminGeneral2" style="border: 2px solid #1F262D">

							    	<thead style="background:#1F262D;color: white">

							        	<tr>
							                <th style="border:none">#</th>
							                <th style="border:none">Producto</th>
							                <th style="border:none">Entradas</th>
							                <th style="border:none">Salidas</th>
							                <th style="border:none">Existencias</th>
							                <th style="border:none">Fisico</th>
							                <th style="border:none">Send</th>
							            </tr> 

							    	</thead>
				            	</table>
				        	</div>
				    	</div>
				    </div>


				</div>
			</div>

			<div class="tab-pane fade" id="divSanManuel" role="tabpanel">
    			<div class="row">

    				<div class="col-lg-12 col-md-12 col-sm-12">
	        			<div class="card border-dark mb-3" >
							<div class="card-header">
								<h3>Fisico VS Admin San Manuel 1
							    	<button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#SM1" style="float: right;"><i class="fas fa-minus-square"></i> </button>
								</h3>
							</div>
							                
							<div class="card-body collapse table-responsive"  id="SM1">
		                
								<table class="table table-bordered table-striped dt-responsive tableFisicoVSadminSanManuel1" width="100%" id="fisicoVSadminGeneral1" style="border: 2px solid #1F262D">

							    	<thead style="background:#1F262D;color: white">

							        	<tr>
							                <th style="border:none">#</th>
							                <th style="border:none">Producto</th>
							                <th style="border:none">Entradas</th>
							                <th style="border:none">Salidas</th>
							                <th style="border:none">Existencias</th>
							                <th style="border:none">Fisico</th>
							                <th style="border:none">Send</th>
							            </tr> 

							    	</thead>
				            	</table>
				        	</div>
				    	</div>
				    </div>

				    <div class="col-lg-12 col-md-12 col-sm-12">
	        			<div class="card border-dark mb-3" >
							<div class="card-header">
								<h3>Fisico VS Admin San Manuel 1
							    	<button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#SM2" style="float: right;"><i class="fas fa-minus-square"></i> </button>
								</h3>
							</div>
							                
							<div class="card-body collapse table-responsive"  id="SM2">
		                
								<table class="table table-bordered table-striped dt-responsive tableFisicoVSadminSanManuel2" width="100%" id="fisicoVSadminGeneral2" style="border: 2px solid #1F262D">

							    	<thead style="background:#1F262D;color: white">

							        	<tr>
							                <th style="border:none">#</th>
							                <th style="border:none">Producto</th>
							                <th style="border:none">Entradas</th>
							                <th style="border:none">Salidas</th>
							                <th style="border:none">Existencias</th>
							                <th style="border:none">Fisico</th>
							                <th style="border:none">Send</th>
							            </tr> 

							    	</thead>
				            	</table>
				        	</div>
				    	</div>
				    </div>
	        						
	        	</div>
  			</div>

  			<div class="tab-pane fade" id="divSanManuel" role="tabpanel">
    			<div class="row">

    				<div class="col-lg-12 col-md-12 col-sm-12">
	        			<div class="card border-dark mb-3" >
							<div class="card-header">
								<h3>Fisico VS Admin San Manuel 1
							    	<button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#SM1" style="float: right;"><i class="fas fa-minus-square"></i> </button>
								</h3>
							</div>
							                
							<div class="card-body collapse table-responsive"  id="SM1">
		                
								<table class="table table-bordered table-striped dt-responsive tableFisicoVSadminSanManuel1" width="100%" id="fisicoVSadminGeneral1" style="border: 2px solid #1F262D">

							    	<thead style="background:#1F262D;color: white">

							        	<tr>
							                <th style="border:none">#</th>
							                <th style="border:none">Producto</th>
							                <th style="border:none">Entradas</th>
							                <th style="border:none">Salidas</th>
							                <th style="border:none">Existencias</th>
							                <th style="border:none">Fisico</th>
							                <th style="border:none">Send</th>
							            </tr> 

							    	</thead>
				            	</table>
				        	</div>
				    	</div>
				    </div>

				    <div class="col-lg-12 col-md-12 col-sm-12">
	        			<div class="card border-dark mb-3" >
							<div class="card-header">
								<h3>Fisico VS Admin San Manuel 1
							    	<button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#SM2" style="float: right;"><i class="fas fa-minus-square"></i> </button>
								</h3>
							</div>
							                
							<div class="card-body collapse table-responsive"  id="SM2">
		                
								<table class="table table-bordered table-striped dt-responsive tableFisicoVSadminSanManuel2" width="100%" id="fisicoVSadminGeneral2" style="border: 2px solid #1F262D">

							    	<thead style="background:#1F262D;color: white">

							        	<tr>
							                <th style="border:none">#</th>
							                <th style="border:none">Producto</th>
							                <th style="border:none">Entradas</th>
							                <th style="border:none">Salidas</th>
							                <th style="border:none">Existencias</th>
							                <th style="border:none">Fisico</th>
							                <th style="border:none">Send</th>
							            </tr> 

							    	</thead>
				            	</table>
				        	</div>
				    	</div>
				    </div>
	        						
	        	</div>
  			</div>



    	</div>
  	</div>
</div>