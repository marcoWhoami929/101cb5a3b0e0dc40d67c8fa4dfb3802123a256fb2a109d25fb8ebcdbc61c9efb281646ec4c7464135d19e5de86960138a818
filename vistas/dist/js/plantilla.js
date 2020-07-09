/* FUNCION PARA OBTENER EL VALOR DEL SELECTOR */

function elegirAlmacen(){

    var almacen = document.getElementById("almacenElegido").value;
    
    $("#nombreAlmacen").val(almacen);

}
/*==================================================
=            MANDAR DATOS A IMPORTACION            =
==================================================*/
/*
$(document).ready(function(){   
    $("#import_data").click(function() { 

        var data = {
            "file" : $("#inputFile")[0].files[0],
            "nombreAlmacen" : $("#nombreAlmacen").val(),
            "idUsuario" : $("#idUsuario").val()
        }

        $.ajax({  
            type : 'POST',
            url  : 'importacionAlmacenes.php',
            data:  data, 

            success:function(response) {  
                $('#respuesta').html(response).fadeIn();
            }  
        });
        
        return false;
   });
});
*/

/*=====  End of MANDAR DATOS A IMPORTACION  ======*/
