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
					<h4 class="page-title">Administradores</h4>
					<div class="ml-auto text-right">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Tablero</a></li>
								<li class="breadcrumb-item active" aria-current="page">Administradores</li>
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
						                        <center><h3>Administrar Usuarios</h3></center>
						                        <button class="btn btn-secondary" data-toggle="modal" data-target="#modalAgregarPerfil"><i class="fas fa-user-plus"></i> &nbsp;Agregar Usuario</button><br><br>
						                        <table class="table table-bordered table-striped dt-responsive tableAdministradores" width="100%" id="administradores" style="border: 2px solid #1F262D">

                          							<thead style="background:#1F262D;color: white">

							                            <tr>
							                             	<th style="border:none">#</th>
							                             	<th style="border:none">Nombre</th>
							                             	<th style="border:none">Email</th>
							                             	<th style="border:none">Foto</th>
							                             	<th style="border:none">Grupo</th>
							                             	<th style="border:none">Perfil</th>
							                             	<th style="border:none">Estado</th>
							                             	<th style="border:none">Acciones</th>
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
		<div id="modalAgregarPerfil" class="modal fade" role="dialog">
  			<div class="modal-dialog" >
    			<div class="modal-content">

      				<form role="form" method="post" enctype="multipart/form-data">
			        <!-- CABEZA DEL MODAL-->
	        			<div class="modal-header" style="background:#1F262D; color:white">

	          				<h4 class="modal-title">Agregar Perfil</h4>
	          				<button type="button" class="close" data-dismiss="modal">&times;</button>

	        			</div>
				        <!--CUERPO DEL MODAL-->
	        			<div class="modal-body">
	          				<div class="box-body">
	            				<!-- ENTRADA PARA EL NOMBRE -->
	            				<div class="form-group">
	              
	               					<span style="font-weight: bold">Nombre de Usuario</span>
	              					<div class="input-group">
	                
	                					<span class="input-group-addon"><i class="fa fa-user fa-2x"></i></span>&nbsp; 
	                					<input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

	              					</div>
	           					</div>
	            				<!-- ENTRADA PARA EL EMAIL -->
					            <div class="form-group">
					              
					            	<span style="font-weight: bold">Email</span>
					             	<div class="input-group">
					              
					                	<span class="input-group-addon"><i class="fa fa-envelope fa-2x"></i></span>&nbsp; 
					                	<input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar Email" id="nuevoEmail" required>

					              	</div>
					            </div>
					            <!-- ENTRADA PARA LA CONTRASEÑA -->
					            <div class="form-group">
					              
					               	<span style="font-weight: bold">Contraseña</span>
					              	<div class="input-group">
					              
					                	<span class="input-group-addon"><i class="fa fa-lock fa-2x"></i></span>&nbsp; 
					                	<input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

					              	</div>
					            </div>
					            <!-- ENTRADA PARA SELECCIONAR SU GRUPO -->
					            <div class="form-group">
					              
					              	<span style="font-weight: bold">Grupo de Usuario</span>
					              	<div class="input-group">

					                	<span class="input-group-addon"><i class="fa fa-users fa-2x"></i></span>&nbsp; 
					                	<select class="form-control input-lg" name="nuevoGrupo" id="nuevoGrupo">

					                  		<option value="">Selecionar grupo</option>
					                  		<option value="Administrador">Administrador</option>
					                  		<option value="Sucursales">Sucursales</option>
					                  		<option value="Inventarios">Inventarios</option>

					                	</select>

					              	</div>
					            </div>
					            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->
					            <div class="form-group">
					              
					              	<span style="font-weight: bold">Perfil de Usuario</span>
					              	<div class="input-group">
					              
					                	<span class="input-group-addon"><i class="fa fa-users fa-2x"></i></span>&nbsp; 
					                	<select class="form-control input-lg" name="nuevoPerfil">
					                  
					                  		<option value="">Selecionar perfil</option>
					                  		<option value="Administrador General">Administrador General</option>
					                  		<option value="Tiendas">Tiendas</option>
					                  		<option value="Inventarios">Inventarios</option>

					                	</select>

					             	</div>
					            </div>
					            <!-- ENTRADA PARA SUBIR FOTO -->
					            <div class="form-group">
					              	<div class="panel"><span style="font-weight: bold">SUBIR FOTO</span></div>
					              	<input type="file" class="nuevaFoto" name="nuevaFoto">
					              	<p class="help-block">Peso máximo de la foto 2MB</p>
					              	<img src="vistas/img/users/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
					            </div>

	          				</div>
	        			</div>
	        			<!-- PIE DEL MODAL-->
				        <div class="modal-footer">

				          	<button type="button" class="btn btn-dark pull-left" data-dismiss="modal">Salir</button>
				          	<button type="submit" class="btn btn-dark">Guardar Perfil</button>

				        </div>
				        <?php

				          $crearPerfil = new ControladorAdministradores();
				          $crearPerfil -> ctrCrearUsuario();


				        ?>


     				</form>
    			</div>
  			</div>
		</div>

		<!--=====================================
		MODAL EDITAR PERFIL
		======================================-->

		<div id="modalEditarPerfil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  		<div class="modal-dialog" role="document">
	    		<div class="modal-content">
	      			<form role="form" method="post" enctype="multipart/form-data">
				        <!--=====================================
				        CABEZA DEL MODAL
				        ======================================-->
	        			<div class="modal-header" style="background:#1F262D; color:white">

	        				<h4 class="modal-title">Editar Perfil</h4>
	          				<button type="button" class="close" data-dismiss="modal">&times;</button>

	        			</div>
				        <!--=====================================
				        CUERPO DEL MODAL
				        ======================================-->
	        			<div class="modal-body">
	         				<div class="box-body">
	            				<!-- ENTRADA PARA EL NOMBRE -->
	            
	            				<div class="form-group">
	               					<span style="font-weight: bold">Nombre de Usuario</span>
	              					<div class="input-group">
	              
						                <span class="input-group-addon"><i class="fa fa-user fa-2x"></i></span>&nbsp;
						                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
						                <input type="hidden" id="idPerfil" name="idPerfil">

						            </div>
						        </div>

	            				<!-- ENTRADA PARA EL EMAIL -->
	             				<div class="form-group">
	               					<span style="font-weight: bold">Email</span>
	              					<div class="input-group">
	              
	                					<span class="input-group-addon"><i class="fa fa-envelope fa-2x"></i></span>&nbsp; 
	                					<input type="email" class="form-control input-lg" id="editarEmail" name="editarEmail" value="" required>

	              					</div>

	            				</div>

	            				<!-- ENTRADA PARA LA CONTRASEÑA -->
	             				<div class="form-group">
	               					<span style="font-weight: bold">Contraseña</span>
	              					<div class="input-group">
	              
	                					<span class="input-group-addon"><i class="fa fa-lock fa-2x"></i></span>&nbsp; 
	                					<input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">
	                					<input type="hidden" id="passwordActual" name="passwordActual">

	              					</div>
	            				</div>
								
								 <!-- ENTRADA PARA SELECCIONAR SU GRUPO -->
	            				<div class="form-group">
	              					<span style="font-weight: bold">Grupo de Usuario</span>
	              					<div class="input-group">
	               	 					<span class="input-group-addon"><i class="fa fa-users fa-2x"></i></span>&nbsp;  
	                					<select class="form-control input-lg" name="editarGrupo" id="editarGrupo">
	                  
	                  						<option value="" id="editarGrupo">Selecionar grupo</option>
	                  						<option value="Administrador">Administrador</option>
	                  						<option value="Sucursales">Sucursales</option>
	                  						<option value="Inventarios">Inventarios</option>

	                					</select>

	              					</div>
	            				</div>

	            				<!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

	            				<div class="form-group">
						            <span style="font-weight: bold">Perfil de Usuario</span>
						            <div class="input-group">
	                					<span class="input-group-addon"><i class="fa fa-users fa-2x"></i></span>&nbsp;  
	                					<select class="form-control input-lg" name="editarPerfil" id="editarPerfil">

	                  						<option value="" id="editarPerfil">Selecionar perfil</option>
	                  						<option value="Administrador General">Administrador General</option>
	                  						<option value="Tiendas">Tiendas</option>
	                  						<option value="Inventarios">Inventarios</option>

	                					</select>

	              					</div>
	            				</div>

	            				<!-- ENTRADA PARA SUBIR FOTO -->
					            <div class="form-group">
					             	<div class="panel"><span style="font-weight: bold">SUBIR FOTO</span></div>
					              		<input type="file" class="nuevaFoto" name="editarFoto">
					              		<p class="help-block">Peso máximo de la foto 2MB</p>
					              		<img src="vistas/img/users/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
					              		<input type="hidden" name="fotoActual" id="fotoActual">
					            </div>

	          				</div>
	        			</div>
				        <!--=====================================
				        PIE DEL MODAL
				        ======================================-->

	        			<div class="modal-footer">

	          				<button type="button" class="btn btn-dark pull-left" data-dismiss="modal">Salir</button>
	          				<button type="submit" class="btn btn-dark">Modificar Perfil</button>

	        			</div>

					    <?php

					        $editarPerfil = new ControladorAdministradores();
					        $editarPerfil -> ctrEditarUsuario();

					    ?> 

	      			</form>
	    		</div>
	  		</div>
		</div>

		<?php

		  $eliminarUsuario = new ControladorAdministradores();
		  $eliminarUsuario -> ctrEliminarUsuario();

		?> 
  	</div>
</div>