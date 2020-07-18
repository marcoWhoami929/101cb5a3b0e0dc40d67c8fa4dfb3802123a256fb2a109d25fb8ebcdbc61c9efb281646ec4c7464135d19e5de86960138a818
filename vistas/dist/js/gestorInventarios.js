/**
 * TABLA ADMINISTRADORES
 */
tableAdministradores = $(".tableAdministradores").DataTable({
   "ajax":"ajax/tablaAdministradores.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
   "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

   }

});

$(document).ready(function(){
  var perfilUsuario = $('#perfilUsuario').val();
  if (perfilUsuario == 'Administrador General') {
    
  }

  $('body').on('click', '#pills-tab a', function(){

    var areaInventario = $(this).attr('identificador');
    localStorage.setItem("areaInventario", areaInventario);
<<<<<<< HEAD
    var area = localStorage.getItem("areaInventario");
     
=======
     var area = localStorage.getItem("areaInventario");

>>>>>>> devdiego
     for (var i = 1; i <= 2; i++) {
      var tabla = area+i;
      var nombreTabla = tabla.toLowerCase();
      
      tablaPorAgotarse = $(".tablaPorAgotarse"+tabla+"").DataTable({
       "ajax":"ajax/tablaProductosPorAgotarse.ajax.php?almacen="+nombreTabla,
       "deferRender": true,
       "retrieve": true,
       "processing": true,
       "language": {

        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

       }

    });

      tablaAlmacen = $(".tablaAlmacen"+tabla+"").DataTable({
       "ajax":"ajax/tablaAlmacenes.ajax.php?almacen="+nombreTabla,
       "deferRender": true,
       "retrieve": true,
       "processing": true,
       "language": {

        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

       }

    });
        
     }
  })
});
/*=============================================
TABLA IMPORTACIONES
=============================================*/

tablaImportaciones = $(".tablaImportaciones").DataTable({
   "ajax":"ajax/tablaImportaciones.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
   "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

   }

});

/*=============================================
TABLA ALMACENES
=============================================*/
/*=====  Obtener identificador de tabs   ======*/
<<<<<<< HEAD

=======
$(document).ready(function(){

  $('body').on('click', '#pills-tab a', function(){

    var areaInventario = $(this).attr('identificador');
    localStorage.setItem("areaInventario", areaInventario);
     var area = localStorage.getItem("areaInventario");
     for (var i = 1; i <= 2; i++) {
      var tabla = area+i;
      var nombreTabla = tabla.toLowerCase();
      
      tabla = $(".tablaAlmacen"+tabla+"").DataTable({
       "ajax":"ajax/tablaAlmacenes.ajax.php?almacen="+nombreTabla,
       "deferRender": true,
       "retrieve": true,
       "processing": true,
       "language": {

        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

       }

    });
        
     }
  })
});
>>>>>>> devdiego
/**
 * TABLA PEDIDO SEMANAL
 */
$(document).ready(function(){

  tablePedidoSemanal = $(".tablePedidoSemanal").DataTable({
    //"ajax":"ajax/tablaAlmacenes.ajax.php?almacen="+nombreTabla,
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

    }

  });

});
/**
 * TABLA MOSTRAR EXISTENCIAS EN TIENDAS
 */

<<<<<<< HEAD
  var sucursal = localStorage.getItem("sucursal");
  switch (sucursal) {
    case "Sucursal San Manuel":
      var almacen = "sanmanuel";
      break;
    case "Sucursal Capu":
      var almacen = "capu";
      break;
    case "Sucursal Reforma":
      var almacen = "reforma";
      break;
    case "Sucursal Santiago":
      var almacen = "santiago";
      break;
    case "Sucursal Las Torres":
      var almacen = "lastorres";
      break;
  }
  var tablePedidoSemanal = $(".tablePedidoSemanal").DataTable({
    "ajax":"ajax/tablaPedidoSemanal.ajax.php?almacen="+almacen,
=======
  tableExistenciasGenerales = $(".tableExistenciasGenerales").DataTable({
    "ajax":"ajax/tablaExistenciasGenerales.ajax.php?Productos=",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

    }

  });

});

/**
 * TABLA FISICO VS ADMIN
 */
$(document).ready(function(){

  $("#nombreUsuario").val();
  var nombreUsuario = $("#nombreUsuario").val();
  //console.log(nombreUsuario);

  tableFisicoVSadmin = $(".tableFisicoVSadmin").DataTable({
    //"ajax":"ajax/tablaFisicoVSadmin.ajax.php?nombreUsuario="+nombreUsuario,
>>>>>>> devdiego
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

    }

  });

<<<<<<< HEAD
=======
});

>>>>>>> devdiego
/**
 * MODIFICAR DIAS QUE TARDA EL PROVEEDOR EN RESURTIR
 */
$("#editarTiempo").click(function(){
  var idFamilia = $("#elegirFamilia").val();
  var editarDias = $("#editarDias").val();
  var idProducto = $("#elegirProducto").val();

  var datos = new FormData();
  datos.append("idFamilia",idFamilia);
  datos.append("editarDias",editarDias);
  datos.append("idProducto",idProducto);

  $.ajax({
    url:"ajax/funcionesInventario.ajax.php",  
    method:"POST",
    data:datos,
    cache:false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){
   
      if (respuesta == "ok") {
        swal({
            type: "success",
            title: "Los datos han sido guardados",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result) {
              if (result.value) {
                window.location = "configuraciones";

              }
            })
      }else{
        swal({
            type: "warning",
            title: "No se pudo Procesar",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result) {
              if (result.value) {
                window.location = "configuraciones";

              }
            })
      }
    }
  })
});
$("#recalcularStok").click(function(){
  var idProducto = $("#elegirProducto").val();
  var elegirAlmacen = $("#elegirAlmacen").val();
  
  var datos = new FormData();
  datos.append("idProducto",idProducto);
  datos.append("elegirAlmacen",elegirAlmacen);

  $.ajax({
    url:"ajax/funcionesInventario.ajax.php",  
    method:"POST",
    data:datos,
    cache:false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){
   
      if (respuesta == "ok") {
        swal({
            type: "success",
            title: "Los datos han sido guardados",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result) {
              if (result.value) {
                window.location = "configuraciones";

              }
            })
      }else{
        swal({
            type: "warning",
            title: "No se pudo Procesar",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result) {
              if (result.value) {
                window.location = "configuraciones";

              }
            })
      }
    }
  })
});

/**
 * ACTIVAR O DESACTIVAR USUARIO
 */
$(".tableAdministradores").on("click", ".btnActivar", function(){

  var idUsuario = $(this).attr("idUsuario");
  var estadoPerfil = $(this).attr("estadoPerfil");

  var datos = new FormData();
  datos.append("activarId", idUsuario);
  datos.append("activarPerfil", estadoPerfil);

  $.ajax({

    url:"ajax/funcionesInventario.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta){
    }

  })

    if(estadoPerfil == 0){

      $(this).removeClass('btn-success');
      $(this).addClass('btn-danger');
      $(this).html('Desactivado');
      $(this).attr('estadoPerfil',1);

    }else{

      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');
      $(this).html('Activado');
      $(this).attr('estadoPerfil',0);

    }

});
/**
 * MOSTRAR LOS DATOS DE LOS USUARIOS EN LA MODAL PARA EDITAR
 */
$(".tableAdministradores").on("click", ".btnEditarPerfil", function(){

  var idPerfil = $(this).attr("idPerfil");
  var datos = new FormData();
  datos.append("idPerfil", idPerfil);

  $.ajax({

    url:"ajax/funcionesInventario.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 

      $("#editarNombre").val(respuesta["nombre"]);
      $("#idPerfil").val(respuesta["id"]);
      $("#editarEmail").val(respuesta["email"]);
      $("#passwordActual").val(respuesta["password"]);
      $("#editarGrupo").val(respuesta["grupo"]);
      $("#editarPerfil").val(respuesta["perfil"])

      if(respuesta["foto"] != ""){

        $(".previsualizar").attr("src", respuesta["foto"]);

      }


    }


  })


})

$(".tableAdministradores").on("click", ".btnEliminarPerfil", function(){

  var idPerfil = $(this).attr("idPerfil");
  var fotoPerfil = $(this).attr("fotoPerfil");
  var nombre = $(this).attr("nombre");
  swal({
    title: '¿Está seguro de borrar el Usuario?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Usuario!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=administradores&idPerfil="+idPerfil+"&fotoPerfil="+fotoPerfil+"&nombre="+nombre;

    }

  })

});
<<<<<<< HEAD
/**
 * ACCIONES PARA SOLICITAR PEDIDO SEMANAL
 */
$("#btnSolicitarPedido").click(function(){
      window.location.href = "generarNuevoPedido";
});
 var sucursal = localStorage.getItem("sucursal");
  switch (sucursal) {
    case "Sucursal San Manuel":
      var almacen = "sanmanuel";
      break;
    case "Sucursal Capu":
      var almacen = "capu";
      break;
    case "Sucursal Reforma":
      var almacen = "reforma";
      break;
    case "Sucursal Santiago":
      var almacen = "santiago";
      break;
    case "Sucursal Las Torres":
      var almacen = "lastorres";
      break;
  }
  tablaSolicitudPedido = $(".tablaSolicitudPedido").DataTable({
    "ajax":"ajax/tablaSolicitudPedido.ajax.php?almacen="+almacen,
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

    }

  });



function cargarCantidad(id){

    var id = id;

    let idProducto = $("#"+id+"").attr("idProducto");
    let cantidad = $("#"+id+"").val();

    var almacen = localStorage.getItem("sucursal");
    switch (almacen) {
 
      case 'Sucursal San Manuel':
        var campo = "solicitadoSM1";
        break;
      case 'Sucursal Reforma':
        var campo = "solicitadoRf1";
        break;
      case 'Sucursal Santiago':
        var campo = "solicitadoSg1";
        break;
      case 'Sucursal Capu':
        var campo = "solicitadoCp1";
        break;
      case 'Sucursal Las Torres':
        var campo = "solicitadoTr1";
        break;
      
      
    }
    
    var datos = new FormData();
    datos.append("idProducto",idProducto);
    datos.append("campo",campo);
    datos.append("cantidad",cantidad);

    $.ajax({
        url: "ajax/functions.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
           
          
            var response = respuesta;
            var responseFinal = response.replace(/['"]+/g, '');
            if (responseFinal == "ok") {

               tablaSolicitudPedido.ajax.reload();

               var datos = new FormData();
               datos.append("sesion","1");

                 $.ajax({
                    url: "ajax/functions.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(respuesta) {
                      var response = respuesta;
                      var unidades = response.split("|");

                      var unidadesPedido = unidades[0];
                      var montoPedido = unidades[1];

                      var unidadesPedido = unidadesPedido.replace('"','')*1;
                      var montoPedido = montoPedido.replace('"','') * 1;

                      $("#unidadesPedido").html(unidadesPedido);
                      $("#montoPedido").html("$"+montoPedido.toFixed(2));

                      localStorage.setItem("unidadesPedido", unidadesPedido);
                      localStorage.setItem("montoPedido",montoPedido);

                      if (montoPedido > 50000) {

                        var botonGenerar = document.getElementById("btnGenerarPedido");
                        botonGenerar.disabled = true;
                      }else{

                       var botonGenerar = document.getElementById("btnGenerarPedido");
                       botonGenerar.disabled = false;
                      }

                    }
                })


            }
        
        }
    })
      
  }

  $("#btnGenerarPedido").click(function(){
         var datos = new FormData();
               datos.append("sesion2","1");

                 $.ajax({
                    url: "ajax/functions.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(respuesta) {

                      localStorage.setItem("pedidoSemanal", respuesta);

                      var sucursal = localStorage.getItem("sucursal");
                      var unidadesPedido = localStorage.getItem("unidadesPedido");
                      var montoPedido = localStorage.getItem("montoPedido");
                      $("#progresoGenerarPedido").modal("show");
                       $("#progreso").html("Procesando pedido...");
                  
                      
                      var datos = new FormData();
                      datos.append('pedidoSemanal',respuesta);
                      datos.append('sucursal',sucursal);
                      datos.append('unidadesPedido',unidadesPedido);
                      datos.append('montoPedido',montoPedido);

                      $.ajax({
                          url: "ajax/functions.ajax.php",
                          method: "POST",
                          data: datos,
                          cache: false,
                          contentType: false,
                          processData: false,
                          success: function(respuesta) {

                               var response = respuesta;
                               var responseFinal = response.replace(/['"]+/g, '');

                               if (responseFinal == "ok") {
                                  var progreso = document.getElementById("progreso");
                                  progreso.setAttribute("style", "color:#168CAC");
                                  
                                  localStorage.removeItem("unidadesPedido");
                                  localStorage.removeItem("montoPedido");
                                  localStorage.removeItem("pedidoSemanal");
                                  setTimeout(() => {
                                    $("#progresoGenerarPedido").modal("hide");
                                    $("#progreso").html("Pedido Procesado...");
                                     window.location.href = "requisiciones";
                                  }, 3000);
                                 
                                  

                               }

                           
                          }
                      })
                      

   
                      
                    }
                })
  })
  /*
  TABLA REQUISICIONES
   */
   var tablaRequisiciones = $(".tablaRequisiciones").DataTable({
    "ajax":"ajax/tablaRequisiciones.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

    }

  });

$(".tablaRequisiciones").on("click",".btnVisualizarDetalleRequisicion",function(){

      var idRequisicion = $(this).attr("idRequisicion");
      localStorage.setItem("requisicion", idRequisicion);
      

      var datos =  new FormData();
      datos.append('idRequisicion',idRequisicion);

      $.ajax({
                          url: "ajax/functions.ajax.php",
                          method: "POST",
                          data: datos,
                          cache: false,
                          contentType: false,
                          processData: false,
                          success: function(respuesta) {

                            var json = JSON.parse(respuesta);
                   
                            var unidadesAprobadas = json[0] * 1;
                            var montoAprobado = json[1] * 1;
                            localStorage.setItem("unidadesAprobadas", unidadesAprobadas);
                            localStorage.setItem("montoAprobado", montoAprobado);
                            
                            window.location.href = "detalleRequisicion";
                           
                          }
                      })



      
})

$(".tablaListaRequisiciones").on("click",".btnVisualizarDetalleRequisicion",function(){

      var idRequisicion = $(this).attr("idRequisicion");
      localStorage.setItem("requisicionGeneral", idRequisicion);
      

      var datos =  new FormData();
      datos.append('idRequisicion',idRequisicion);

      $.ajax({
                          url: "ajax/functions.ajax.php",
                          method: "POST",
                          data: datos,
                          cache: false,
                          contentType: false,
                          processData: false,
                          success: function(respuesta) {

                            var json = JSON.parse(respuesta);
                   
                            var unidadesAprobadas = json[0] * 1;
                            var montoAprobado = json[1] * 1;
                            localStorage.setItem("unidadesAprobadas", unidadesAprobadas);
                            localStorage.setItem("montoAprobado", montoAprobado);
                            
                            window.location.href = "detalleRequisicionGeneral";
                           
                          }
                      })



      
});
var requisicion = localStorage.getItem("requisicion");

if (requisicion == null) {
  
}else{

  var tablaDetalleRequisicion = $(".tablaDetalleRequisicion").DataTable({
        "ajax":"ajax/tablaDetalleRequisicion.ajax.php?idRequisicion="+requisicion,
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "language": {

        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
              "sFirst":    "Primero",
              "sLast":     "Último",
              "sNext":     "Siguiente",
              "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

        }

  });
}

 /*
  TABLA REQUISICIONES
   */
   tablaListaRequisiciones = $(".tablaListaRequisiciones").DataTable({
    "ajax":"ajax/tablaListaRequisiciones.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

    }

  });
/*=============================================
HABILITAR PEDIDO EN REVISION
=============================================*/
$(".tablaListaRequisiciones").on("click", ".btnEnRevision", function(){

  var idRequisicion = $(this).attr("idRequisicion");
  var estadoRequisicion= $(this).attr("estado");

  var datos = new FormData();
    datos.append("idRequisicionRevision", idRequisicion);
    datos.append("estadoRequisicion", estadoRequisicion);

    $.ajax({

    url:"ajax/functions.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

        tablaListaRequisiciones.ajax.reload();
       
      }

    })

    if(estadoRequisicion== 0){

      $(this).removeClass('btn-success');
      $(this).addClass('btn-danger');
      $(this).html('<i class="fa fa-eye"></i>');
      $(this).attr('estado',1);

    }else{

      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');
      $(this).html('<i class="fa fa-eye"></i>');
      $(this).attr('estado',0);

    }

});

var requisicionGeneral = localStorage.getItem("requisicionGeneral");

if (requisicionGeneral == null) {
  
}else{

  tablaDetalleRequisicionGeneral = $(".tablaDetalleRequisicionGeneral").DataTable({
        "ajax":"ajax/tablaDetalleRequisicionGeneral.ajax.php?idRequisicion="+requisicionGeneral,
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "language": {

        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
              "sFirst":    "Primero",
              "sLast":     "Último",
              "sNext":     "Siguiente",
              "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

        }

  });
}
function actualizarCantidad(id){

    var id = id;

    let idProducto = $("#"+id+"").attr("idProducto");
    let cantidad = $("#"+id+"").val();
    
    var datos = new FormData();
    datos.append("idProductoAprobar",idProducto);
    datos.append("cantidadAprobar",cantidad);

    $.ajax({
        url: "ajax/functions.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
           
          
            var response = respuesta;
            var responseFinal = response.replace(/['"]+/g, '');
            if (responseFinal == "ok") {

               tablaDetalleRequisicionGeneral.ajax.reload();

               var datos = new FormData();
               datos.append("sesion3","1");

                 $.ajax({
                    url: "ajax/functions.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(respuesta) {
                      var response = respuesta;
                      var unidades = response.split("|");

                      var unidadesPedido = unidades[0];
                      var montoPedido = unidades[1];

                      var unidadesPedido = unidadesPedido.replace('"','')*1;
                      var montoPedido = montoPedido.replace('"','') * 1;

                      $("#unidadesPedidoAprobadas").html(unidadesPedido);
                      $("#montoPedidoAprobado").html("$"+montoPedido.toFixed(2));

                      localStorage.setItem("unidadesPedidoAprobadas", unidadesPedido);
                      localStorage.setItem("montoPedidoAprobado",montoPedido);

                    }
                })


            }
        
        }
    })
      
  }
/*=============================================
ACTUALIZAR ESTATUS PRODUCTO
=============================================*/
$(".tablaDetalleRequisicionGeneral").on("click", ".btnEstatusProducto", function(){

  var idProductoRequisicion = $(this).attr("idProductoRequisicion");
  var estadoProducto= $(this).attr("estadoProducto");

  var datos = new FormData();
    datos.append("idProductoRequisicion", idProductoRequisicion);
    datos.append("estadoProducto", estadoProducto);
    
    $.ajax({

    url:"ajax/functions.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

        tablaDetalleRequisicionGeneral.ajax.reload();
       
      }

    })
    

    if(estadoProducto == 0){

      $(this).removeClass('btn-danger');
      $(this).addClass('btn-warning');
      $(this).html('<i class="fa fa-box-open"></i>');
      $(this).attr('estadoProducto',1);

    }else if(estadoProducto == 1){
      $(this).removeClass('btn-warning');
      $(this).addClass('btn-success');
      $(this).html('<i class=" fa fa-truck-loading"></i>');
      $(this).attr('estadoProducto',2);
    }
    else{

      $(this).addClass('btn-danger');
      $(this).removeClass('btn-success');
      $(this).html('<i class="fa fa-boxes"></i>');
      $(this).attr('estadoProducto',0);

    }

});
$("#btnAprobarRequisicion").click(function(){

  var idRequisicion = localStorage.getItem("requisicionGeneral");
  var unidadesPedidoAprobadas = localStorage.getItem("unidadesPedidoAprobadas");
  var montoPedidoAprobado = localStorage.getItem("montoPedidoAprobado");
  var observaciones = $("#observacionesRequisicion").val();
  $("#progresoGenerarPedido").modal("show");
  $("#progreso").html("Procesando Aprobacion...");


  var datos = new FormData();

  datos.append('idRequisicionAprobada',idRequisicion);
  datos.append('unidadesPedidoAprobadas',unidadesPedidoAprobadas);
  datos.append('montoPedidoAprobado',montoPedidoAprobado);
  datos.append('observaciones',observaciones);

  $.ajax({
    url: "ajax/functions.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta) {

     var response = respuesta;
     var responseFinal = response.replace(/['"]+/g, '');

     if (responseFinal == "ok") {
      var progreso = document.getElementById("progreso");
      progreso.setAttribute("style", "color:#168CAC");
      localStorage.removeItem("montoPedido");
      localStorage.removeItem("montoPedidoAprobado");
      localStorage.removeItem("montoAprobado");
      localStorage.removeItem("requisicionGeneral");
      localStorage.removeItem("unidadesAprobadas");
      localStorage.removeItem("unidadesPedido");
      localStorage.removeItem("unidadesPedidoAprobadas");

      setTimeout(() => {
        $("#progresoGenerarPedido").modal("hide");
        $("#progreso").html("Requisición Aprobada..");
        window.location.href = "listaRequisiciones";
      }, 3000);



    }


  }
})

})
$("#btnConcluirRequisicion").click(function(){

  var idRequisicion = localStorage.getItem("requisicion");
  var observaciones = $("#observaciones").val();
  $("#progresoGenerarPedido").modal("show");
  $("#progreso").html("Concluyendo Requisición...");


  var datos = new FormData();

  datos.append('idRequisicionConcluida',idRequisicion);
  datos.append('observacionesRequisicion',observaciones);

  $.ajax({
    url: "ajax/functions.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta) {

     var response = respuesta;
     var responseFinal = response.replace(/['"]+/g, '');

     if (responseFinal == "ok") {
      var progreso = document.getElementById("progreso");
      progreso.setAttribute("style", "color:#168CAC");
      localStorage.removeItem("montoPedido");
      localStorage.removeItem("montoAprobado");
      localStorage.removeItem("unidadesAprobadas");
      localStorage.removeItem("unidadesPedido");

      setTimeout(() => {
        $("#progresoGenerarPedido").modal("hide");
        $("#progreso").html("Requisición Concluida..");
        window.location.href = "requisiciones";
      }, 3000);



    }


  }
})

})
=======

/**
 * MOSTRAR LOS DATOS DE LOS USUARIOS EN LA MODAL PARA EDITAR
 */
$(".tableExistenciasGenerales").on("click", ".btnVerExistencias", function(){

  var idProducto = $(this).attr("idProducto");
  var nombreProducto = $(this).attr("nombreProducto");
  //console.log(nombreProducto);
  $("#nombreProducto").val(nombreProducto);
           
  var datos = new FormData(); 
  datos.append("Existencias",idProducto);
  $.ajax({
      url: "ajax/tablaExistenciasGenerales.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta) {

          var json = JSON.parse(respuesta);
          //alert(json["data"][0][0]);

          var listaCabeceras = ['Almacén Gr1','Almacén GR2','Almacén SM1','Almacén SM2','Almacén SG1','Almacén SG1','Almacén RF1','Almacén RF2','Almacén CP1','Almacén CP2','Almacén LT1','Almacén LT2'];

          body = document.getElementById("tableVerExistencias");

          thead = document.createElement("thead");
          thead.setAttribute('style','background:#1F262D;color: white;');

          theadTr = document.createElement("tr");

          

          for (var h = 0; h < listaCabeceras.length; h++) {

            span = document.createElement("span");
            span.setAttribute('class','verticalText');
                                
              var celdaThead = document.createElement("th");
              var textoCeldaThead = document.createTextNode(listaCabeceras[h]);
              span.appendChild(textoCeldaThead);
              celdaThead.appendChild(span);
              theadTr.appendChild(celdaThead);

          }
                          
          thead.appendChild(theadTr);
          tblBody = document.createElement("tbody");
          var hilera = document.createElement("tr");
           
            var celda = document.createElement("td");
            var textoCelda = document.createTextNode(json["data"][0][0]);
            celda.appendChild(textoCelda);
            hilera.appendChild(celda);

            var celda = document.createElement("td");
            var textoCelda = document.createTextNode(json["data"][0][1]);
            celda.appendChild(textoCelda);
            hilera.appendChild(celda);

            var celda = document.createElement("td");
            var textoCelda = document.createTextNode(json["data"][0][2]);
            celda.appendChild(textoCelda);
            hilera.appendChild(celda);

            var celda = document.createElement("td");
            var textoCelda = document.createTextNode(json["data"][0][3]);
            celda.appendChild(textoCelda);
            hilera.appendChild(celda);

            var celda = document.createElement("td");
            var textoCelda = document.createTextNode(json["data"][0][4]);
            celda.appendChild(textoCelda);
            hilera.appendChild(celda);

            var celda = document.createElement("td");
            var textoCelda = document.createTextNode(json["data"][0][5]);
            celda.appendChild(textoCelda);
            hilera.appendChild(celda);

            var celda = document.createElement("td");
            var textoCelda = document.createTextNode(json["data"][0][6]);
            celda.appendChild(textoCelda);
            hilera.appendChild(celda);

            var celda = document.createElement("td");
            var textoCelda = document.createTextNode(json["data"][0][7]);
            celda.appendChild(textoCelda);
            hilera.appendChild(celda);

            var celda = document.createElement("td");
            var textoCelda = document.createTextNode(json["data"][0][8]);
            celda.appendChild(textoCelda);
            hilera.appendChild(celda);

            var celda = document.createElement("td");
            var textoCelda = document.createTextNode(json["data"][0][9]);
            celda.appendChild(textoCelda);
            hilera.appendChild(celda);

            var celda = document.createElement("td");
            var textoCelda = document.createTextNode(json["data"][0][10]);
            celda.appendChild(textoCelda);
            hilera.appendChild(celda);

            var celda = document.createElement("td");
            var textoCelda = document.createTextNode(json["data"][0][11]);
            celda.appendChild(textoCelda);
            hilera.appendChild(celda);

            /*var listaTablas = ['almacengeneral1','almacengeneral2','almacensanmanuel1','almacensanmanuel2','almacenreforma1','almacenreforma2','almacensantiago1','almacensantiago2','almacencapu1','almacencapu2','almacenlastorres1','almacenlastorres2'];
            tfoot = document.createElement("tfoot");

            for (var j = 0; j < listaTablas.length; j++) {
                                
              var celdatfoot = document.createElement("th");
              var booton = document.createElement("button"[j]);

              booton.setAttribute("type", "button");
              booton.setAttribute("class", "btn btn-success");
              booton.setAttribute("id",[j]);
              booton.setAttribute("nameTable",listaTablas[j]);
              booton.setAttribute("idProducto",idProducto);

              booton.setAttribute("onclick","obtenerIdButton(this)");

              var spaniBtn = document.createElement("i");
              spaniBtn.setAttribute("class","far fa-paper-plane");

              var cantidad = document.createElement("input");
              cantidad.setAttribute("class","form-control input-xs");
              cantidad.setAttribute("idInput","input"+[j]);


              booton.appendChild(spaniBtn);
              celdatfoot.appendChild(cantidad);
              celdatfoot.appendChild(booton);
              tfoot.appendChild(celdatfoot);

          }*/

          tblBody.appendChild(hilera);
          body.appendChild(tblBody);
          body.appendChild(thead);
          //body.appendChild(tfoot);
                            
                           
          }
  })
});

$("#salirVerExistencias").click(function(){

  var nodos = document.getElementById("tableVerExistencias");
  while(nodos.firstChild){
    nodos.removeChild(nodos.firstChild);
  }

});

/*function obtenerIdButton(valor){
  let id = valor.id;
  var nameTable = $("#"+id+"").attr("nameTable");
  var idProducto = $("#"+id+"").attr("idProducto");
  //ar cantidad = $("#"+id+"").attr("cantidad");

  //console.log(nameTable);
}*/
>>>>>>> devdiego
