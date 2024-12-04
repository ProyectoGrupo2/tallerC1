

$(document).ready(function () {
    // Función para guardar un nuevo cliente en la base de datos

    /////////////////////////////////////////////INSERTAR/////////////////////////////////////////////
    function guardarCliente() {
        // Obtener los datos del formulario
        var nombreCliente = $('#nombreCliente').val();
        var correoCliente = $('#correoCliente').val();
        var direccion = $('#direccion').val();
        var vehiculo = $('#vehiculo').val();
        
        if (nombreCliente.trim() === '' || correoCliente.trim() === '' || direccion.trim() === '' || vehiculo.trim() === '') {
            alert('Por favor, complete todos los campos del formulario.');
            return;
        }

        $.ajax({
            type: 'POST',
            url: 'cliente/insertar.php', // Archivo PHP para procesar la solicitud
            data: {
                nombreCliente: nombreCliente,
                correoCliente: correoCliente,
                direccion: direccion,
                vehiculo: vehiculo
            },
            success: function (response) {
                //aqui se maneja la respuesta del servidor
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

    // Asignar la función guardarCliente al evento click del botón Guardar
    $('#guardarClienteBtn').click(guardarCliente);

    ////////////////////////////////////////MOSTRAR DATOS///////////////////////////////////////////////////////////
    // Función para cargar y mostrar los clientes desde el servidor
    function cargarClientes() {

        $.ajax({
            type: 'GET',
            url: 'cliente/mostrar.php',
            success: function (response) {
                // Agregar los clientes obtenidos a la lista de clientes que esta en la pagina clientes.php
                $('.list-group').html(response);
                // alert(response)
            },
            error: function (xhr, status, error) {
                // Manejar los errores en caso de que ocurran
                alert('Error al obtener los clientes');
                console.error(error);
            }
        });
    }
    cargarClientes();

    ////////////////////////////////ELIMINAR//////////////////////////////////////////////////////////


    // Evento click para el botón "Eliminar" utilizando delegación de eventos
    $(document).on('click', '.hola', function () {

        var idCliente = $(this).closest('li').find('h5').text();

        $.ajax({
            type: 'POST',
            url: 'cliente/eliminar.php',
            data: { idCliente: idCliente },
            success: function (response) {

                // alert('Cliente eliminado correctamente');
                alert(response)
                location.reload();
            },
            error: function (xhr, status, error) {
                alert('Error al eliminar el cliente');
                console.error(error);
            }
        });
    });


    //////////////////////////////EDITAR PRIIMERA PARTE//////////////////////////////////////////////////////////////////////////////////////


    //function para editar cliente esta funcion me permite cuando le doy al boton
    //editar que me muestre una ventana modal con los datos del cleinte a editar//
    //para luego por medio de otra funcion actualizarlo
    $(document).on('click', '.editar', function () {

        var idEditar = $(this).closest('li').find('h5').text();
        $.ajax({
            type: 'POST',
            url: 'cliente/clienteC3.php',
            data: { idEditar: idEditar },
            dataType: 'json',

            success: function (response) {

                $('#nombreCliente1').val(response.nombre);
                $('#correoCliente1').val(response.correo);
                $('#direccion1').val(response.direccion);
                $('#vehiculo1').val(response.vehiculo);
                $('#id').val(response.id);


            }
        })

    });


    /////////Boton agregar orden libera el modal con el nombre del cliente ya preescrito anteriormente
    //este no lo agtega como tal pero si le damos al cliente ya creado solo quedaria poner la fecha de estrenga y de recivida
    ///y la descriccion de lo que se le hara al vehciulo
    $(document).on('click', '.AgregarOrden', function () {

        var idEditar = $(this).closest('li').find('h5').text();
        $.ajax({
            type: 'POST',
            url: 'cliente/clienteC3.php',
            data: { idEditar: idEditar },
            dataType: 'json',

            success: function (response) {

                $('#ClienteO').val(response.nombre);
                $('#VehiculoO').val(response.vehiculo);
                $('#direccion1').val(response.direccion);
                $('#vehiculo1').val(response.vehiculo);
                $('#id').val(response.id);


            }
        })

    });


    //////////////////////////EDITAR COMPLETA////////////////////////////////////////////////////////////////////////////////////////////////
    //este es la funtion para actualizar clientes,esta funcion es la que actualiza 

    function guardarCliente1() {
        // Obtener los datos del formulario
        var nombreCliente = $('#nombreCliente1').val();
        var correoCliente = $('#correoCliente1').val();
        var direccion = $('#direccion1').val();
        var vehiculo = $('#vehiculo1').val();
        var idCliente = $('#id').val();

        // Enviar los datos al servidor utilizando AJAX
        $.ajax({
            type: 'POST',
            url: 'cliente/editar.php', // Archivo PHP para procesar la solicitud
            data: {
                nombreCliente: nombreCliente,
                correoCliente: correoCliente,
                direccion: direccion,
                vehiculo: vehiculo,
                idCliente: idCliente
            },
            success: function (response) {
                // Aquí puedes manejar la respuesta del servidor
                // Por ejemplo, podrías mostrar un mensaje de éxito o recargar la página para actualizar la lista de clientes
                alert('Cliente actualizo con éxito');
              

                location.reload(); // Recargar la página

            },
            error: function (xhr, status, error) {
                // Aquí puedes manejar los errores en caso de que ocurran
                alert('Error al agregar el cliente');
                console.error(error);
            }
        });
    }



    ///esta parte agregaremos la parte de agregar las carateristicas nueva del cliente al que le agregaremos la orden

    function guardarOrden1() {
        // Obtener los datos del formulario
        // var nombreCliente = $('#ClienteO').val();
        // var vehiculo = $('#VehiculoO').val();
        var descriccion = $('#descripcionO').val();
        var fechaRecivida = $('#fechaO').val();
        var fechaEntrega = $('#fechaEntregaO').val();
        var idCliente = $('#id').val();

        ////
        var cambio_aceite = $('#cambio_aceite').is(':checked') ? 1 : 0;
        var cambio_filtro_aceite = $('#cambio_filtro_aceite').is(':checked') ? 1 : 0;
        var cambio_filtro_aire = $('#cambio_filtro_aire').is(':checked') ? 1 : 0;
        var cambio_bujias = $('#cambio_bujias').is(':checked') ? 1 : 0;
        var alineacion_ruedas = $('#alineacion_ruedas').is(':checked') ? 1 : 0;
        var balanceo_ruedas = $('#balanceo_ruedas').is(':checked') ? 1 : 0;
        var revision_luces = $('#revision_luces').is(':checked') ? 1 : 0;
        var revision_frenos = $('#revision_frenos').is(':checked') ? 1 : 0;
        var revision_suspension = $('#revision_suspension').is(':checked') ? 1 : 0;
        var revision_direccion = $('#revision_direccion').is(':checked') ? 1 : 0;
        var revision_refrigeracion = $('#revision_refrigeracion').is(':checked') ? 1 : 0;
        alert(cambio_aceite)
        // Enviar los datos al servidor utilizando AJAX
        $.ajax({
            type: 'POST',
            url: 'agregarOrden.php', // Archivo PHP para procesar la solicitud
            data: {
                //nombreCliente: nombreCliente,
                //vehiculo: vehiculo,
                descriccion: descriccion,
                fechaRecivida: fechaRecivida,
                fechaEntrega: fechaEntrega,
                idCliente: idCliente
            },
            success: function (response) {
                // Aquí puedes manejar la respuesta del servidor
                // Por ejemplo, podrías mostrar un mensaje de éxito o recargar la página para actualizar la lista de clientes
                alert('Orden agregada con éxito');
                alert(response)
                location.reload(); // Recargar la página

            },
            error: function (xhr, status, error) {
                // Aquí puedes manejar los errores en caso de que ocurran
                alert('Error al agregar el cliente');
                console.error(error);
            }
        });
    }



    // function guardarOrden() {
    //     // Obtener los datos del formulario
    //     var descriccion = $('#descripcionO').val();
    //     var fechaRecibida = $('#fechaO').val();
    //     var fechaEntrega = $('#fechaEntregaO').val();
    //     var idCliente = $('#id').val();

    //     // Obtener el estado de los checkboxes y sumar los precios
    //     var cambio_aceite = $('#cambio_aceite').is(':checked') ? 2100 : 0;
    //     var cambio_filtro_aceite = $('#cambio_filtro_aceite').is(':checked') ? 700 : 0;
    //     var cambio_filtro_aire = $('#cambio_filtro_aire').is(':checked') ? 500 : 0;
    //     var cambio_bujias = $('#cambio_bujias').is(':checked') ? 1400 : 0;
    //     var alineacion_ruedas = $('#alineacion_ruedas').is(':checked') ? 650 : 0;
    //     var balanceo_ruedas = $('#balanceo_ruedas').is(':checked') ? 500 : 0;
    //     var revision_luces = $('#revision_luces').is(':checked') ? 300 : 0;
    //     var revision_frenos = $('#revision_frenos').is(':checked') ? 400 : 0;
    //     var revision_suspension = $('#revision_suspension').is(':checked') ? 200 : 0;
    //     var revision_direccion = $('#revision_direccion').is(':checked') ? 200 : 0;
    //     var revision_refrigeracion = $('#revision_refrigeracion').is(':checked') ? 800 : 0;

    //     // Calcular el total
    //     var total = cambio_aceite + cambio_filtro_aceite + cambio_filtro_aire + cambio_bujias +
    //         alineacion_ruedas + balanceo_ruedas + revision_luces + revision_frenos +
    //         revision_suspension + revision_direccion + revision_refrigeracion;

    //     // Enviar los datos al servidor utilizando AJAX
    //     $.ajax({
    //         type: 'POST',
    //         url: 'agregarOrden.php', // Archivo PHP para procesar la solicitud
    //         data: {
    //             descriccion: descriccion,
    //             fechaRecivida: fechaRecibida,
    //             fechaEntrega: fechaEntrega,
    //             idCliente: idCliente,
    //             cambio_aceite: cambio_aceite,
    //             cambio_filtro_aceite: cambio_filtro_aceite,
    //             cambio_filtro_aire: cambio_filtro_aire,
    //             cambio_bujias: cambio_bujias,
    //             alineacion_ruedas: alineacion_ruedas,
    //             balanceo_ruedas: balanceo_ruedas,
    //             revision_luces: revision_luces,
    //             revision_frenos: revision_frenos,
    //             revision_suspension: revision_suspension,
    //             revision_direccion: revision_direccion,
    //             revision_refrigeracion: revision_refrigeracion,
    //             total: total // También enviamos el total al servidor
    //         },
    //         success: function (response) {
    //             // Aquí puedes manejar la respuesta del servidor
    //             // Por ejemplo, podrías mostrar un mensaje de éxito o recargar la página para actualizar la lista de clientes
    //             alert('Orden agregada con éxito');

    //             location.reload(); // Recargar la página
    //         },
    //         error: function (xhr, status, error) {
    //             // Aquí puedes manejar los errores en caso de que ocurran
    //             alert('Error al agregar la orden de trabajo');
    //             console.error(error);
    //         }
    //     });
    // }
  

    function guardarOrden() {
        // Obtener los datos del formulario
        var descripcion = $('#descripcionO').val();
        var fechaRecibida = $('#fechaO').val();
        var fechaEntrega = $('#fechaEntregaO').val();
        var idCliente = $('#id').val();
    
        // Validar que las fechas no estén vacías
        if (fechaRecibida === '' || fechaEntrega === '') {
            alert('Por favor completa los campos de fecha');
            return;
        }
    
        // Validar que al menos un servicio esté seleccionado
        var serviciosSeleccionados = [
            $('#cambio_aceite'),
            $('#cambio_filtro_aceite'),
            $('#cambio_filtro_aire'),
            $('#cambio_bujias'),
            $('#alineacion_ruedas'),
            $('#balanceo_ruedas'),
            $('#revision_luces'),
            $('#revision_frenos'),
            $('#revision_suspension'),
            $('#revision_direccion'),
            $('#revision_refrigeracion')
        ];
        var alMenosUnoSeleccionado = serviciosSeleccionados.some(function(servicio) {
            return servicio.is(':checked');
        });
        if (!alMenosUnoSeleccionado) {
            alert('Por favor selecciona al menos un servicio');
            return;
        }
    
        // Obtener el estado de los checkboxes y sumar los precios
        var cambio_aceite = $('#cambio_aceite').is(':checked') ? 2100 : 0;
        var cambio_filtro_aceite = $('#cambio_filtro_aceite').is(':checked') ? 700 : 0;
        var cambio_filtro_aire = $('#cambio_filtro_aire').is(':checked') ? 500 : 0;
        var cambio_bujias = $('#cambio_bujias').is(':checked') ? 1400 : 0;
        var alineacion_ruedas = $('#alineacion_ruedas').is(':checked') ? 650 : 0;
        var balanceo_ruedas = $('#balanceo_ruedas').is(':checked') ? 500 : 0;
        var revision_luces = $('#revision_luces').is(':checked') ? 300 : 0;
        var revision_frenos = $('#revision_frenos').is(':checked') ? 400 : 0;
        var revision_suspension = $('#revision_suspension').is(':checked') ? 200 : 0;
        var revision_direccion = $('#revision_direccion').is(':checked') ? 200 : 0;
        var revision_refrigeracion = $('#revision_refrigeracion').is(':checked') ? 800 : 0;
    
        // Calcular el total
        var total = cambio_aceite + cambio_filtro_aceite + cambio_filtro_aire + cambio_bujias +
            alineacion_ruedas + balanceo_ruedas + revision_luces + revision_frenos +
            revision_suspension + revision_direccion + revision_refrigeracion;
    
        // Enviar los datos al servidor utilizando AJAX
        $.ajax({
            type: 'POST',
            url: 'agregarOrden.php', // Archivo PHP para procesar la solicitud
            data: {
                descripcion: descripcion,
                fechaRecibida: fechaRecibida,
                fechaEntrega: fechaEntrega,
                idCliente: idCliente,
                cambio_aceite: cambio_aceite,
                cambio_filtro_aceite: cambio_filtro_aceite,
                cambio_filtro_aire: cambio_filtro_aire,
                cambio_bujias: cambio_bujias,
                alineacion_ruedas: alineacion_ruedas,
                balanceo_ruedas: balanceo_ruedas,
                revision_luces: revision_luces,
                revision_frenos: revision_frenos,
                revision_suspension: revision_suspension,
                revision_direccion: revision_direccion,
                revision_refrigeracion: revision_refrigeracion,
                total: total // También enviamos el total al servidor
            },
            success: function (response) {
                // Aquí puedes manejar la respuesta del servidor
                // Por ejemplo, podrías mostrar un mensaje de éxito o recargar la página para actualizar la lista de clientes
                alert('Orden agregada con éxito');
    
                location.reload(); // Recargar la página
            },
            error: function (xhr, status, error) {
                // Aquí puedes manejar los errores en caso de que ocurran
                alert('Error al agregar la orden de trabajo');
                console.error(error);
            }
        });
    }
    
    


    // Asignar la función guardarCliente al evento click del botón Guardar
    $('#guardarOrden').click(guardarOrden);
    $('#guardarClienteBtn1').click(guardarCliente1);



});





















function calcularTotalServicios() {
    var total = 0;
    // Obtener todos los elementos checkbox seleccionados
    var checkboxes = document.querySelectorAll('input[name="servicio[]"]:checked');
    checkboxes.forEach(function (checkbox) {
        // Sumar el precio de cada servicio seleccionado
        total += parseInt(checkbox.dataset.precio);
    });
    return total;
}

// Función para actualizar el total en el modal
function actualizarTotal() {
    var total = calcularTotalServicios();
    document.getElementById('total').textContent = "$" + total;
}

// Agregar evento change a todos los checkboxes para actualizar el total cuando cambie la selección
var checkboxes = document.querySelectorAll('input[name="servicio[]"]');
checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
        actualizarTotal();
    });
});