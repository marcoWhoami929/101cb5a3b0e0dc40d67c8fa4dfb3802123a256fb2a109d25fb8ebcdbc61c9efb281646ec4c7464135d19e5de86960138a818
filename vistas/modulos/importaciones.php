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
					<h4 class="page-title">Importaciones</h4>
					<div class="ml-auto text-right">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Tablero</a></li>
								<li class="breadcrumb-item active" aria-current="page">Importaciones</li>
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

                                         <div  class="col-lg-6 col-md-6 col-sm-6">
                                            <select name="almacenElegido" id="almacenElegido" class="form-control" onchange="elegirAlmacen();">
                                                <option value="">Elegir Almacén</option>
                                                <option value="general1">Almacén General 1</option>
                                                <option value="general2">Almacén General 2</option>
                                                <option value="sanmanuel1">Sucursal San Manuel 1</option>
                                                <option value="sanmanuel2">Sucursal San Manuel 2</option>
                                                <option value="santiago1">Sucursal Santiago 1</option>
                                                <option value="santiago2">Sucursal Santiago 2</option>
                                                <option value="reforma1">Sucursal Reforma 1</option>
                                                <option value="reforma2">Sucursal Reforma 2</option>
                                                <option value="capu1">Sucursal Capu 1</option>
                                                <option value="capu2">Sucursal Capu 2</option>
                                                <option value="lastorres1">Sucursal Las Torres 1</option>
                                                <option value="lastorres2">Sucursal Las Torres 2</option>



                                            </select>
                                        </div>
                                        <div  class="col-lg-6 col-md-6 col-sm-6">
                                            <form action="importacionAlmacenes.php" method="post" enctype="multipart/form-data" id="importacionAlmacenes">

                                                <div  class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <input type="hidden" name="nombreAlmacen" id="nombreAlmacen">
                                                        <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION["id"]?>">
                                                        <input type="file" name="file" id="inputFile" />
                                                        <input type="submit" class="btn btn-success" name="import_data" value="IMPORTAR">
                                                    </div>

                                                </div>

                                            </form>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <table class="table table-bordered table-striped dt-responsive tablaImportaciones" width="100%" id="importaciones" style="border: 2px solid #1F262D">

                                              <thead style="background:#1F262D;color: white">

                                                 <tr>

                                                   <th style="border:none">Folio</th>
                                                   <th style="border:none">Descripción</th>
                                                   <th style="border:none">Fecha</th>
                                                   <th style="border:none">Usuario</th>

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
   </div>
</div>
<script>
    /**
     * Funcion que captura las variables pasados por GET
     * Devuelve un array de clave=>valor
     */
     function getGET()
     {
        // capturamos la url
        var loc = document.location.href;

        // si existe el interrogante
        if(loc.indexOf('?')>0)
        {
            // cogemos la parte de la url que hay despues del interrogante
            var getString = loc.split('?')[1];
            // obtenemos un array con cada clave=valor
            var GET = getString.split('&');
            var get = {};

            // recorremos todo el array de valores
            for(var i = 0, l = GET.length; i < l; i++){
                var tmp = GET[i].split('=');
                get[tmp[0]] = unescape(decodeURI(tmp[1]));
            }
            return get;
        }
    }

    window.onload = function()
    {
        // Cogemos los valores pasados por get
        var valores=getGET();

        if(valores)
        {
            // hacemos un bucle para pasar por cada indice del array de valores
            for(var index in valores)
            {

                if (valores[index] == "success") {

                  swal({

                      type: "success",
                      title: "¡Los datos han sido ingresados correctamente!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"

                  }).then(function(result){
                    var url = document.location.href;
                    var urlNew =  url.split('?')[0];
                    history.pushState(null, "", urlNew);
                    tablaImportaciones.ajax.reload();


                });
              }else if (valores[index] == "error") {
                  swal({

                    type: "error",
                    title: "¡UPPS! Hubo un error durante la ejecución",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                }).then(function(result){

                    var url = document.location.href;
                    var urlNew =  url.split('?')[0];
                    history.pushState(null, "", urlNew);
                    tablaImportaciones.ajax.reload();


                });
            }else if (valores[index] == "invalid_file") {
              swal({

                type: "error",
                title: "¡UPPS!El formato del archivo es inválido",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            }).then(function(result){

                var url = document.location.href;
                var urlNew =  url.split('?')[0];
                history.pushState(null, "", urlNew);
                tablaImportaciones.ajax.reload();


            });
        }
    }
}
}
</script>