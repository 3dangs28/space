function load(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
        url:'item_ajax.php',
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
      var cat = button.data('cat') // Extraer la información de atributos de datos
      var nombre = button.data('nombre') // Extraer la información de atributos de datos
      var descri = button.data('descri') // Extraer la información de atributos de datos
      var cantidad = button.data('cantidad') // Extraer la información de atributos de datos
      var precio = button.data('precio') // Extraer la información de atributos de datos
      var estatus = button.data('estatus') // Extraer la información de atributos de datos


      var modal = $(this)
      modal.find('.modal-title').text('Modificar item: '+nombre)
      modal.find('.modal-body #id').val(id)
      modal.find('.modal-body #cat').val(cat)
      modal.find('.modal-body #nombre').val(nombre)
      modal.find('.modal-body #cantidad').val(cantidad)
      modal.find('.modal-body #precio').val(precio)
      modal.find('.modal-body #descri').val(descri)
      modal.find('.modal-body #estatus').val(estatus)

      $('.alert').hide();//Oculto alert
    })
    
    $('#dataDelete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#id').val(id)
    })
 
    $('#dataUpload').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#id').val(id)
    })

/*
    $('#upload').click(function(){
      var fd = new FormData();
      var files = $('#file')[0].files[0];
      fd.append('file',files);

      $.ajax({
        url: 'upload.php',
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response){
          if(response != 0){
            // Muestra imagen preview
        //    $("#preview").html(response);
    
        $('#preview').append("<img src='"+response+"' width='100' height='100'>");
          }else{
            alert('file not uploaded');
          }
        }

      });
    });

    */
    

$( "#actualidarDatos" ).submit(function( event ) {
    var parametros = $(this).serialize();
         $.ajax({
                type: "POST",
                url: "items/modificar.php",
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
                url: "items/agregar.php",
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
                url: "items/eliminar.php",
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