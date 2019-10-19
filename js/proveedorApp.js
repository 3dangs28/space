function load(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
        url:'proveedor_ajax.php',
        data: parametros,
         beforeSend: function(objeto){
        $("#loader").html("<img src='giphy.gif'>");
        },
        success:function(data){
            $(".outer_div").html(data).fadeIn('slow');
            $("#loader").html("");
        }
    })
} 

    $('#dataUpdate').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var usr = button.data('usr') // Extraer la información de atributos de datos
      var prove = button.data('prove') // Extraer la información de atributos de datos
      var descrip = button.data('descrip') // Extraer la información de atributos de datos
      var tel = button.data('tel') // Extraer la información de atributos de datos
      var correo = button.data('correo') // Extraer la información de atributos de datos
      var dir = button.data('dir') // Extraer la información de atributos de datos
      var estatus = button.data('estatus') // Extraer la información de atributos de datos

      var modal = $(this)
      modal.find('.modal-title').text('Modificar proveedor: '+prove)
      modal.find('.modal-body #id').val(id)
      modal.find('.modal-body #usr').val(usr)
      modal.find('.modal-body #prove').val(prove)
      modal.find('.modal-body #descrip').val(descrip)
      modal.find('.modal-body #tel').val(tel)
      modal.find('.modal-body #correo').val(correo)
      modal.find('.modal-body #dir').val(dir)
      modal.find('.modal-body #estatus').val(estatus)
      $('.alert').hide();//Oculto alert
    })
    
    $('#dataDelete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#id').val(id)
    })

$( "#actualidarDatos" ).submit(function( event ) {
    var parametros = $(this).serialize();
         $.ajax({
                type: "POST",
                url: "proveedores/modificar.php",
                data: parametros,
                 beforeSend: function(objeto){
                    $("#datos_ajax").html("Mensaje: Cargando...");
                  },
                success: function(datos){
                $("#datos_ajax").html(datos);
                
                load(1);
              }
        });
      event.preventDefault();
    });
    
    $( "#guardarDatos" ).submit(function( event ) {
    var parametros = $(this).serialize();
         $.ajax({
                type: "POST",
                url: "proveedores/agregar.php",
                data: parametros,
                 beforeSend: function(objeto){
                    $("#datos_ajax_register").html("Mensaje: Cargando...");
                  },
                success: function(datos){
                $("#datos_ajax_register").html(datos);
                
                load(1);
              }
        });
      event.preventDefault();
    });
    
    $( "#eliminarDatos" ).submit(function( event ) {
    var parametros = $(this).serialize();
         $.ajax({
                type: "POST",
                url: "proveedores/eliminar.php",
                data: parametros,
                 beforeSend: function(objeto){
                    $(".datos_ajax_delete").html("Mensaje: Cargando...");
                  },
                success: function(datos){
                $(".datos_ajax_delete").html(datos);
                
                $('#dataDelete').modal('hide');
                load(1);
              }
        });
      event.preventDefault();
    });