
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
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabGeneral" data-toggle="pill" href="#pillGeneral" role="tab"  aria-selected="false" identificador = "General">Almacén General</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabSanManuel" data-toggle="pill" href="#pillSanManuel" role="tab"  aria-selected="false" identificador = "SanManuel">San Manuel</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabReforma" data-toggle="pill" href="#pillReforma" role="tab"  aria-selected="false" identificador = "Reforma">Reforma</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabSantiago" data-toggle="pill" href="#pillSantiago" role="tab"  aria-selected="false" identificador = "Santiago">Santiago</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabCapu" data-toggle="pill" href="#pillCapu" role="tab"  aria-selected="false" identificador = "Capu">Capu</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabTorres" data-toggle="pill" href="#pillTorres" role="tab"  aria-selected="false" identificador = "LasTorres">Las Torres</a>
                                        </li>
                                    </ul>
                                </div>
                                ';
                            }else if ($_SESSION["perfil"]== "Tiendas" && $_SESSION["nombre"] == "Sucursal San Manuel") {
                               echo '
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabSanManuel" data-toggle="pill" href="#pillSanManuel" role="tab"  aria-selected="true" identificador = "SanManuel">Ver Tablas de Almacen</a>
                                        </li>                                 
                                    </ul>
                                </div>

                               ';
                               echo '<style>#contentGr { display:none;}</style>';

                            }else if ($_SESSION["perfil"]== "Tiendas" && $_SESSION["nombre"] == "Sucursal Reforma") {
                               echo '
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabReforma" data-toggle="pill" href="#pillReforma" role="tab"  aria-selected="false" identificador = "Reforma">Ver Tablas de Almacen</a>
                                        </li>                                 
                                    </ul>
                                </div>

                               ';
                               echo '<style>#contentGr { display:none;}</style>';

                            }else if ($_SESSION["perfil"]== "Tiendas" && $_SESSION["nombre"] == "Sucursal Santiago") {
                               echo '
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabSantiago" data-toggle="pill" href="#pillSantiago" role="tab"  aria-selected="false" identificador = "Santiago">Ver Tablas de Almacen</a>
                                        </li>                                 
                                    </ul>
                                </div>

                               ';
                               echo '<style>#contentGr { display:none;}</style>';

                            }else if ($_SESSION["perfil"]== "Tiendas" && $_SESSION["nombre"] == "Sucursal Capu") {
                               echo '
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabCapu" data-toggle="pill" href="#pillCapu" role="tab"  aria-selected="false" identificador = "Capu">Ver Tablas de Almacen</a>
                                        </li>                                 
                                    </ul>
                                </div>

                               ';
                               echo '<style>#contentGr { display:none;}</style>';

                            }else if ($_SESSION["perfil"]== "Tiendas" && $_SESSION["nombre"] == "Sucursal Las Torres") {
                               echo '
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                             <a class="nav-link" id="tabTorres" data-toggle="pill" href="#pillTorres" role="tab"  aria-selected="false" identificador = "LasTorres">Ver Tablas de Almacen</a>
                                        </li>                                 
                                    </ul>
                                </div>

                               ';
                               echo '<style>#contentGr { display:none;}</style>';

                            }
                         ?>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 border-right p-r-0">


									
									<div class="card-body">
										<div class="row">

                      						<div class="col-lg-12 col-md-12 col-sm-12">

                        						<h3>Fisico VS Admin</h3>
                        						<table class="table table-bordered table-striped dt-responsive tableFisicoVSadmin" width="100%" id="existenciasGenerales" style="border: 2px solid #1F262D">

                          							<thead style="background:#1F262D;color: white">

							                            <tr>
							                            	<th style="border:none">#</th>
							                            	<th style="border:none">Codigo</th>
							                            	<th style="border:none">Producto</th>
							                            	<th style="border:none">Existencias</th>
							                            	<th style="border:none">Entradas</th>
							                            	<th style="border:none">Salidas</th>
							                            	<th style="border:none">Fisico</th>
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
  	</div>
</div>