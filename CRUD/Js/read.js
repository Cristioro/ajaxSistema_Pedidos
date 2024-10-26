function listarUsuarios()
    {
        const $tHead = document.getElementById('TheadUsuarios')
        const $btnList = document.getElementById('BtnListUsuarios')
        if ($tHead.style.display == 'none' ) {
            $tHead.style.display = null;
            $btnList.value = 'Ocultar' ;
        } else {
            $tHead.style.display = 'none' ;
            $btnList.value = 'Listar Usuarios' ;
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
            url: '../CRUD/Read/readUsuarios.php',
            type: 'POST',
            
            //beforesend es una funcion de devolucion de llamada previa a la solicitud
            //que se ejecuta antes de que se envie la solicitud al servidor
            befotesend: function()
            {
                $('#mostrar_mensajeUsuarios').html("mensaje antes de Enviar");
            },

            //El eevento ajaxSUccess Es esencialmente una funcion de tipo que se llama cuando 
            success: function(mensaje)
            {
                $('#mostrar_mensajeUsuarios').html(mensaje);
            },
        });
    }

    function listarProductos()
    {
        const $tHead = document.getElementById('TheadProductos')
        const $btnList = document.getElementById('BtnListProductos')
        if ($tHead.style.display == 'none' ) {
            $tHead.style.display = null;
            $btnList.value = 'Ocultar' ;
        } else {
            $tHead.style.display = 'none' ;
            $btnList.value = 'Listar Productos' ;
        }


        
        let parametros = 
        {
            "nombre" : "",
            "precio" : "",
            "cantidad" : "",
        };

        $.ajax({
            data: parametros,
            url: '../CRUD/Read/readProductos.php',
            type: 'POST',
            
            //beforesend es una funcion de devolucion de llamada previa a la solicitud
            //que se ejecuta antes de que se envie la solicitud al servidor
            befotesend: function()
            {
                $('#mostrar_mensajeProductos').html("mensaje antes de Enviar");
            },

            //El eevento ajaxSUccess Es esencialmente una funcion de tipo que se llama cuando 
            success: function(mensaje)
            {
                $('#mostrar_mensajeProductos').html(mensaje);
            },
        });
    }

    function listarPedidos()
    {
        const $tHead = document.getElementById('TheadPedidos')
        const $btnList = document.getElementById('BtnListPedidos')
        if ($tHead.style.display == 'none' ) {
            $tHead.style.display = null;
            $btnList.value = 'Ocultar' ;
        } else {
            $tHead.style.display = 'none' ;
            $btnList.value = 'Listar Pedidos' ;
        }


        
        let parametros = 
        {
            "id_pedido" : "",
            "producto" : "",
            "valor_total" : "",
            "cantidad" : "",
        };

        $.ajax({
            data: parametros,
            url: '../CRUD/Read/readPedidos.php',
            type: 'POST',
            
            //beforesend es una funcion de devolucion de llamada previa a la solicitud
            //que se ejecuta antes de que se envie la solicitud al servidor
            befotesend: function()
            {
                $('#mostrar_mensajePedidos').html("mensaje antes de Enviar");
            },

            //El eevento ajaxSUccess Es esencialmente una funcion de tipo que se llama cuando 
            success: function(mensaje)
            {
                $('#mostrar_mensajePedidos').html(mensaje);
            },
        });
    }