<?php
error_reporting(E_ALL);

require_once('bdd.php');

if ($_SESSION["perfil"] == "Tiendas") {

  $idUsuario = $_SESSION["id"];

  $sql = "SELECT id, titulo, idSucursal,color,fechaInicial, fechaFinal FROM recordatorios where idSucursal = '$idUsuario' ";
  
}else{


  $sql = "SELECT id, titulo, idSucursal,color,fechaInicial, fechaFinal FROM recordatorios";

}


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
										<h4 class="card-title m-t-10"> Recordatorio</h4>
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
               
            </div>
        </div>
    </div>

    <script>

    $(document).ready(function() {

        var date = new Date();
       var yyyy = date.getFullYear().toString();
       var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
       var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
        
        $('#calendar').fullCalendar({
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
        
     
        
    });

</script>