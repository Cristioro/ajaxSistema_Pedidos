window.addEventListener('load', 
    function() { 
        let parametros = 
        {
            "id_producto" : "",
            "nombre" : "",
            "precio" : "",
            "cantidad" : ""
        };

        $.ajax({
            data: parametros,
            url: 'CRUD/option.php',
            type: 'POST',
            
            //beforesend es una funcion de devolucion de llamada previa a la solicitud
            //que se ejecuta antes de que se envie la solicitud al servidor
            befotesend: function()
            {
                $('#id_producto').html("mensaje antes de Enviar");
            },

            //El eevento ajaxSUccess Es esencialmente una funcion de tipo que se llama cuando 
            success: function(mensaje)
            {
                $('#id_producto').html("<option disabled selected>seleccione una opcion</option>" + mensaje);
            },
        });
    }, false);