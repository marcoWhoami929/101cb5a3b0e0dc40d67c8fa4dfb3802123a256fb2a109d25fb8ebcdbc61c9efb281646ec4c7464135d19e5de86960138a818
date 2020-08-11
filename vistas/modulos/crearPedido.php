
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
					<h4 class="page-title">Crear Pedido</h4>
					<div class="ml-auto text-right">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Tablero</a></li>
								<li class="breadcrumb-item active" aria-current="page">Crear Pedido</li>
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
										<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal">
						 					<span class="mdi mdi-library-plus"></span> Agregar productos
										</button>
									</div>
								</div>

								<div id="resultados" class='col-md-12'></div>
								
	              			</div>
	            		</div>
	          		</div>

	          		<!-- Modal -->
					<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
						  <div class="modal-header" style="background:#1F262D; color:white">
						  	<h4 class="modal-title" id="myModalLabel">Buscar productos</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							
						  </div>
						  <div class="modal-body">
							<form class="form-horizontal">
							  <div class="form-group">
								<div class="col-sm-6">
								  <input type="text" class="form-control" id="q" placeholder="Buscar productos" onkeyup="load(1)">
								  <input type="hidden" class="form-control" id="grupoSesion" value="<?php echo $_SESSION["grupo"] ?>">
								  <input type="hidden" class="form-control" id="sesion" value="<?php echo $_SESSION["nombre"]; ?>">
								  <input type="text" class="form-control" id="idSesion" value="<?php echo $_SESSION["id"]; ?>">
								</div>
								<button type="button" class="btn btn-dark" onclick="load(1)"><span class='mdi mdi-magnify'></span> Buscar</button>
							  </div>
							</form>
							<div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
							<div class="outer_div" ></div><!-- Datos ajax Final -->
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
							
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
		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			var sesion = $("#sesion").val();
			var grupoSesion = $("#grupoSesion").val();
			var idUser = $("#idSesion").val();
			var idSesion = idUser * 1;

			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/agregarApedido.ajax.php?action=ajax&page='+page+'&q='+q+'&sesion='+sesion+'&grupoSesion='+grupoSesion+'&idSesion='+idSesion,
				 beforeSend: function(objeto){
				 //$('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}
	</script>
	<script>
	
	function agregar (id)
		{
			//var precio_venta=document.getElementById('precio_venta_'+id).value;
			var cantidad=document.getElementById('cantidad_'+id).value;
			var sesion = $("#sesion").val();
			var grupoSesion = $("#grupoSesion").val();
			var idUser = $("#idSesion").val();
			var idSesion = idUser * 1;
			//Inicia validacion
			if (isNaN(cantidad))
			{
			alert('Esto no es un numero');
			document.getElementById('cantidad_'+id).focus();
			return false;
			}
			
			//Fin validacion
			
			$.ajax({
        type: "POST",
        url: "ajax/agregar_Pedido.ajax.php",
        data: "id="+id+"&cantidad="+cantidad+"&grupoSesion="+grupoSesion+"&sesion="+sesion+'&idSesion='+idSesion,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		}
			});
		}
		
			function eliminar (id)
		{
			
			$.ajax({
        type: "GET",
        url: "ajax/agregar_Pedido.ajax.php",
        data: "id="+id,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		}
			});

		}
		
		
	</script>
	