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

  $('body').on('click', '#pills-tab a', function(){

    var areaInventario = $(this).attr('identificador');
     var area = localStorage.getItem("areaInventario");
     for (var i = 1; i <= 2; i++) {
      var tabla = area+i;
      var nombreTabla = tabla.toLowerCase();

      
      tabla = $(".tablaPorAgotarse"+tabla+"").DataTable({
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

$(document).ready(function(){

  var perfilUsuario = $('#perfilUsuario').val();
  if (perfilUsuario == 'Administrador General') {
    
  }
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
/**
 * TABLA PRODUCTOS POR AGOTARSE
 */
/*$(document).ready(function(){

  tablePorAgotarse = $(".tablePorAgotarse").DataTable({
    "ajax":"ajax/tablaProductosPorAgotarse.ajax.php",
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

});*/
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