function listar()
    {
        const $tHead = document.getElementById('Thead')
        const $btnList = document.getElementById('BtnList')
        if ($tHead.style.display == 'none' ) {
            $tHead.style.display = null;
            $btnList.value = 'Ocultar' ;
        } else {
            $tHead.style.display = 'none' ;
            $btnList.value = 'Listar' ;
        }


        
        let parametros = 
        {
            "documento" : "",
            "nombre" : "",
            "direccion" : "",
            "correo" : "",
            "id_pedido" : "",
            "admin" : ""
        };

        $.ajax({
            data: parametros,
            url: '../CRUD/Read.php',
            type: 'POST',
            
            //beforesend es una funcion de devolucion de llamada previa a la solicitud
            //que se ejecuta antes de que se envie la solicitud al servidor
            befotesend: function()
            {
                $('#mostrar_mensaje').html("mensaje antes de Enviar");
            },

            //El eevento ajaxSUccess Es esencialmente una funcion de tipo que se llama cuando 
            success: function(mensaje)
            {
                $('#mostrar_mensaje').html(mensaje);
            },
        });
    }