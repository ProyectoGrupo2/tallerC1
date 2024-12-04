
$(document).ready(function() {
    $('#inventario').click(guardarRepuesto);
      function guardarRepuesto() {
         // Obtener los datos del formulario
         var codigoRepuesto = $('#codigoRepuesto').val();
            var descripcionRepuesto = $('#descripcionRepuesto').val();
            var cantidadRepuesto = $('#cantidadRepuesto').val();
            var precioRepuesto = $('#precioRepuesto').val();
           
    
            
            // var idCliente     = $('#id').val();

            //para sabbr si alguno de los campos esta vacio
            if (codigoRepuesto === '' || descripcionRepuesto === '' || cantidadRepuesto === '' || precioRepuesto === '') {
              alert('Por favor completa todos los campos');
              return; // Detener la ejecución si hay campos vacíos
          }
    
            // Enviar los datos al servidor utilizando AJAX
            $.ajax({
                type: 'POST',
                url: 'inventario/inventario1.php', // Archivo PHP para procesar la solicitud
                data: {
                    codigoRepuesto: codigoRepuesto,
                    descripcionRepuesto: descripcionRepuesto,
                    cantidadRepuesto: cantidadRepuesto,
                    precioRepuesto: precioRepuesto,
                    // idCliente:idCliente
                },
                success: function (response) {
                    // Aquí puedes manejar la respuesta del servidor
                    // Por ejemplo, podrías mostrar un mensaje de éxito o recargar la página para actualizar la lista de clientes
                    alert('Cliente agregado con éxito');
                  
    
                    location.reload(); // Recargar la página
    
                },
                error: function (xhr, status, error) {
                    // Aquí puedes manejar los errores en caso de que ocurran
                    alert('Error al agregar el cliente');
                    console.error(error);
                }
            });
      }
    
      ///mostrar agregarInvemtario-?agregarinvemtario
      function cargarInventario(){
    
    $.ajax({
        type:'GET',
        url:'inventario/mostrarInvantario.php',
        success:function(response){
    
            $('.list-groupInventario').html(response);
            
          
        }
    
    })
      
    
    
     
     }
    
     cargarInventario();
    
     ///eliminar inventario
     $(document).on('click', '.eliminarIneventario', function() {
        var idCliente = $(this).attr('id').split('_')[1];
        
       
    
        $.ajax({  type:'POST',
                url:'inventario/eliminarInventario.php',
                data:{idCliente:idCliente},
                success:function(response){
    
                  alert(response)
                  location.reload();
                }
    
                
    
    
    
        })
    });
    
    ///dibujar los datos en la ventana modal par aluego actualizarlo
        $(document).on('click','.actualizarInventario',function(){
          var idEditar = $(this).attr('id').split('_')[1];
          alert(idEditar)
       
        $.ajax({
          type: 'POST',
          url: 'actualizarinventario.php',
          data: { idEditar: idEditar },
          dataType: 'json',
    
          success: function (response) {
            $('#codigoRepuesto1').val(response.codigo);
            $('#descripcionRepuesto1').val(response.descripcion);
            $('#cantidadRepuesto1').val(response.cantidad);
            $('#precioRepuesto1').val(response.precio_unitario);
            
            // $('#id').val(response.id);
          }
        });
        })
    })