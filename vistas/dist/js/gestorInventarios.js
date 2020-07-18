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
    localStorage.setItem("areaInventario", areaInventario);
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
$(document).ready(function(){

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