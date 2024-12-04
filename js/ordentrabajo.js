$(document).ready(function() {
    //////////mostrar orden en paginas
      
    $(document).on('click', '.eliminarOrden', function() {
        var idCliente = $(this).attr('id').split('_')[1];
       
    
        $.ajax({  type:'POST',
                url:'ordentrabajo/eliminarOrden.php',
                data:{idCliente:idCliente},
                success:function(response){
    
                  alert(response)
                  location.reload();
                }
    
                
    
    
    
        })
    });
    
    
    // $(document).on('click','#actualizarOrden',function(){
    //   var idCliente = $(this).attr('id').split('_')[1];
    
    //   alert(idCliente);
    // })
    
    });
    
  
      $(document).ready(function() {
    //////////mostrar orden en paginas
      
     function cargarOrden(){
    
    $.ajax({
        type:'GET',
        url:'ordentrabajo/mostrarOrden1.php',
        success:function(response){
    
            $('.list-group1').html(response);
          
        }
    
    })
      
    
    
     
     }
    
     cargarOrden();
    
    });