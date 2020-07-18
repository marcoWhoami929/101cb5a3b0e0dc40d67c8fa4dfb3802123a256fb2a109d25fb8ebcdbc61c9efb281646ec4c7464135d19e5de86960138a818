<?php
error_reporting(E_ALL);
require_once('bdd.php');


$sql = "SELECT id, titulo, idSucursal,color,fechaInicial, fechaFinal FROM recordatorios ";

$req = $bdd->prepare($sql);
$req->execute();

$recordatorios = $req->fetchAll();

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
										<h4 class="card-title m-t-10">Recordatorio</h4>
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
                                    		<div id="calendario"></div>
                                    	</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <form class="form-horizontal" method="POST" action="addEvent.php">
                        
                          <div class="modal-header" style="background: #141619">
                           
                            <h4 class="modal-title titulo" id="myModalLabel">Nuevo Recordatorio</h4>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          </div>
                          <div class="modal-body">
                            
                              <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Titulo</label>
                                <div class="col-sm-12">
                                  <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Titulo">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="color" class="col-sm-2 control-label">Recordatorio</label>
                                <div class="col-sm-12">
                                  <select name="color" class="form-control" id="color">
                                                  <option value="">Seleccionar</option>
                                      <option style="color:#0071c5;" value="#0071c5">&#9724; Programar Inventario</option>
                                      <option style="color:#008000;" value="#008000">&#9724; Revisión de Inventario</option>                       
                                      <option style="color:#FF8C00;" value="#FF8C00">&#9724; Entrega de Material</option>
                                      <option style="color:#FF0000;" value="#FF0000">&#9724; Solicitar Inventario</option>
                                      
                                    </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="color" class="col-sm-2 control-label">Sucursal</label>
                                <div class="col-sm-12">
                                  <select name="idSucursal" class="form-control" id="idSucursal">
                                      <option value="">Seleccionar</option>
                                      <option style="color:#0071c5;" value="5">San Manuel</option>
                                      <option style="color:#008000;" value="6">Santiago</option>                       
                                      <option style="color:#FF8C00;" value="7">Las Torres</option>
                                      <option style="color:#FF0000;" value="8">Reforma</option>
                                      <option style="color:#FF0000;" value="9">Capu</option>
                                      
                                    </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="start" class="col-sm-8 control-label">Fecha Inicial</label>
                                <div class="col-sm-12">
                                  <input type="text" name="fechaInicial" class="form-control" id="fechaInicial" readonly>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="end" class="col-sm-8 control-label">Fecha Final</label>
                                <div class="col-sm-12">
                                  <input type="text" name="fechaFinal" class="form-control" id="fechaFinal" readonly>
                                </div>
                              </div>
                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                    
                    
                    
                    <!-- Modal -->
                    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <form class="form-horizontal" method="POST" action="editEventTitle.php">
                          <div class="modal-header" style="background: #141619">
                           
                            <h4 class="modal-title titulo" id="myModalLabel">Editar Recordatorio</h4>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          </div>
                          <div class="modal-body">
                            
                              <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Titulo</label>
                                <div class="col-sm-12">
                                  <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Titulo">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="color" class="col-sm-2 control-label">Recordatorio</label>
                                <div class="col-sm-12">
                                  <select name="color" class="form-control" id="color">
                                                  <option value="">Seleccionar</option>
                                      <option style="color:#0071c5;" value="#0071c5">&#9724; Programar Inventario</option>
                                      <option style="color:#008000;" value="#008000">&#9724; Revisión de Inventario</option>                       
                                      <option style="color:#FF8C00;" value="#FF8C00">&#9724; Entrega de Material</option>
                                      <option style="color:#FF0000;" value="#FF0000">&#9724; Solicitar Inventario</option>
                                      
                                    </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="color" class="col-sm-2 control-label">Sucursal</label>
                                <div class="col-sm-12">
                                  <select name="idSucursal" class="form-control" id="idSucursal">
                                      <option value="">Seleccionar</option>
                                      <option style="color:#0071c5;" value="5">San Manuel</option>
                                      <option style="color:#008000;" value="6">Santiago</option>                       
                                      <option style="color:#FF8C00;" value="7">Las Torres</option>
                                      <option style="color:#FF0000;" value="8">Reforma</option>
                                      <option style="color:#FF0000;" value="9">Capu</option>
                                      
                                    </select>
                                </div>
                              </div>
                                <div class="form-group">
                                <label for="start" class="col-sm-8 control-label">Fecha Inicial</label>
                                <div class="col-sm-12">
                                  <input type="text" name="fechaInicial" class="form-control" id="fechaInicial" readonly>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="end" class="col-sm-8 control-label">Fecha Final</label>
                                <div class="col-sm-12">
                                  <input type="text" name="fechaFinal" class="form-control" id="fechaFinal" readonly>
                                </div>
                              </div>
                                <div class="form-group"> 
                                    <div class="col-sm-offset-2 col-sm-12">
                                      <div class="checkbox">
                                        <label class="text-danger"><input type="checkbox"  name="delete"> Eliminar Evento</label>
                                      </div>
                                    </div>
                                </div>
                              
                              <input type="hidden" name="id" class="form-control" id="id">
                            
                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
            </div>
        </div>
    </div>

    <script>

    $(document).ready(function() {

        var date = new Date();
       var yyyy = date.getFullYear().toString();
       var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
       var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
        
        $('#calendario').fullCalendar({
           dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
            dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            buttonText: {
                today:    'Hoy',
                month:    'Mes',
                week:     'Semana',
                day:      'Día',
                list:     'Lista'
            },
            header: {
                 language: 'es',
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,listDay,agendaDay,agendaFiveDay'
     

            },
            defaultDate: yyyy+"-"+mm+"-"+dd,
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            select: function(start, end) {
                
                $('#ModalAdd #fechaInicial').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd #fechaFinal').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd').modal('show');
            },
            eventRender: function(event, element) {
                element.bind('dblclick', function() {
                    $('#ModalEdit #id').val(event.id);
                    $('#ModalEdit #titulo').val(event.title);
                    $('#ModalEdit #color').val(event.color);
                    $('#ModalEdit #fechaInicial').val(event.fechaInicial);
                    $('#ModalEdit #fechaFinal').val(event.fechaFinal);
                    $('#ModalEdit #idSucursal').val(event.idSucursal);

                    $('#ModalEdit').modal('show');
                });
            },
            eventDrop: function(event, delta, revertFunc) { // si changement de position

                edit(event);

            },
            eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

                edit(event);

            },
            events: [
            <?php foreach($recordatorios as $recordatorio): 
            
                $start = explode(" ", $recordatorio['fechaInicial']);
                $end = explode(" ", $recordatorio['fechaFinal']);
                if($start[1] == '00:00:00'){
                    $start = $start[0];
                }else{
                    $start = $recordatorio['fechaInicial'];
                }
                if($end[1] == '00:00:00'){
                    $end = $end[0];
                }else{
                    $end = $recordatorio['fechaFinal'];
                }
            ?>
                {
                    id: '<?php echo $recordatorio['id']; ?>',
                    title: '<?php echo $recordatorio['titulo']; ?>',
                    idSucursal: '<?php echo $recordatorio['idSucursal']; ?>',
                    start: '<?php echo $start; ?>',
                    end: '<?php echo $end; ?>',
                    fechaInicial: '<?php echo $recordatorio['fechaInicial']; ?>',
                    fechaFinal: '<?php echo $recordatorio['fechaFinal']; ?>',
                    color: '<?php echo $recordatorio['color']; ?>',
                },
            <?php endforeach; ?>
            ]
        });
        
        function edit(event){
            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end){
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }else{
                end = start;
            }
            
            id =  event.id;
            
            Event = [];
            Event[0] = id;
            Event[1] = start;
            Event[2] = end;
            
            $.ajax({
             url: 'editEventDate.php',
             type: "POST",
             data: {Event:Event},
             success: function(rep) {
                    if(rep == 'OK'){
                        alert('Fecha De Recordatorio Actualizada');
                    }else{
                        alert('No se pudo guardar. Inténtalo de nuevo.'); 
                    }
                }
            });
        }
        
    });

</script>