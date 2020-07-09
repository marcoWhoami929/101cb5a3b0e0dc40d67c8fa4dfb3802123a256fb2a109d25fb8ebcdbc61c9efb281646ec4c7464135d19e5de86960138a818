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
					<h4 class="page-title">Mis Recordatorios</h4>
					<div class="ml-auto text-right">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Tablero</a></li>
								<li class="breadcrumb-item active" aria-current="page">Mis Recordatorios</li>
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
								<div class="col-lg-3 border-right p-r-0">
									<div class="card-body border-bottom">
										<h4 class="card-title m-t-10">Arrastrar y Soltar Recordatorio</h4>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div id="calendar-events" class="">
													<div class="calendar-events m-b-20" data-class="bg-info"><i class="fa fa-circle text-info m-r-10"></i>Programar Inventario</div>
													<div class="calendar-events m-b-20" data-class="bg-success"><i class="fa fa-circle text-success m-r-10"></i> Revision de Inventarios</div>
													<div class="calendar-events m-b-20" data-class="bg-danger"><i class="fa fa-circle text-danger m-r-10"></i> Solicitar Inventario</div>
													<div class="calendar-events m-b-20" data-class="bg-warning"><i class="fa fa-circle text-warning m-r-10"></i>Entrega de Material</div>
												</div>

                                             		<!--
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="drop-remove">
                                                        <label class="custom-control-label" for="drop-remove">Remove after drop</label>
                                                    </div>
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn m-t-20 btn-info btn-block waves-effect waves-light">
                                                            <i class="ti-plus"></i> Add New Event
                                                        </a>
                                                    -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                    	<div class="card-body b-l calender-sidebar">
                                    		<div id="calendar"></div>
                                    	</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal none-border" id="my-event">
                	<div class="modal-dialog">
                		<div class="modal-content">
                			<div class="modal-header">
                				<h4 class="modal-title"><strong>Evento</strong></h4>
                				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			</div>
                			<div class="modal-body"></div>
                			<div class="modal-footer">
                				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                				<button type="button" class="btn btn-success save-event waves-effect waves-light">Crear Evento</button>
                				<button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Eliminar</button>
                			</div>
                		</div>
                	</div>
                </div>
                <div class="modal fade none-border" id="add-new-event">
                	<div class="modal-dialog">
                		<div class="modal-content">
                			<div class="modal-header">
                				<h4 class="modal-title"><strong>Add</strong> a category</h4>
                				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			</div>
                			<div class="modal-body">
                				<form>
                					<div class="row">
                						<div class="col-md-6">
                							<label class="control-label">Category Name</label>
                							<input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                						</div>
                						<div class="col-md-6">
                							<label class="control-label">Choose Category Color</label>
                							<select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                								<option value="success">Success</option>
                								<option value="danger">Danger</option>
                								<option value="info">Info</option>
                								<option value="primary">Primary</option>
                								<option value="warning">Warning</option>
                								<option value="inverse">Inverse</option>
                							</select>
                						</div>
                					</div>
                				</form>
                			</div>
                			<div class="modal-footer">
                				<button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                			</div>
                		</div>
                	</div>
                </div>
            </div>
        </div>
    </div>