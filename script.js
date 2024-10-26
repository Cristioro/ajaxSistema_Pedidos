
function login() {
    var parametros = {
        "correo": $("#loginCorreo").val(),
        "contrasena": $("#loginContrasena").val()
    };

    $.ajax({
        data: parametros,
        url: "CRUD/login.php",
        type: "post",
        dataType: "json",
        success: function (response) {
            if (response.success) {
                window.location.href = response.redirect;
            } else {
                $("#loginMessage").text("Error: " + response.message).removeClass('text-success').addClass('text-danger');
            }
        }
    });
}


// Registro
function register() {
    var parametros = {
        "documento": $("#registerDocumento").val(),
        "nombre": $("#registerNombre").val(),
        "direccion": $("#registerDireccion").val(),
        "correo": $("#registerCorreo").val(),
        "contrasena": $("#registerContrasena").val()
    }

    $.ajax({
        data: parametros,
        url: "CRUD/register.php",
        type: "post",
        dataType: "json",
        success: function (response) {
            if (response.success) {
                $("#registerMessage").text("Registro exitoso.").removeClass('text-danger').addClass('text-success');
            } else {
                $("#registerMessage").text("Error: " + response.message).removeClass('text-success').addClass('text-danger');
            }
        }
    });
};

function buscar_datos() {
    var id_producto = $("#id_producto").val(); // Agregado var para declarar la variable

    var parametros = {
        "buscar": "1",
        "id_producto": id_producto
    };

    $.ajax({
        data: parametros,
        dataType: 'json',
        url: 'onChange.php',
        type: 'post',
        beforeSend: function () {
            $('.formulario').hide();
            $('.cargando').show();
        },
        error: function () {
            alert("Error al realizar la solicitud");
        },
        complete: function () {
            $('.formulario').show();
            $('.cargando').hide();
        },
        success: function (valores) {
            if (valores.existe == "1") {
                $("#precio").val(valores.precio);
                $("#showCantidad").text("hay " + valores.cantidad + " unidades disponibles");
                $("#cantidad").attr("max", valores.cantidad); // Limita el max a valores.cantidad

                // Limitar el valor actual del input a max
                const currentQuantity = parseInt($("#cantidad").val(), 10);
                if (currentQuantity > valores.cantidad) {
                    $("#cantidad").val(valores.cantidad); // Establecer el valor al máximo permitido
                }

                // Validación adicional en el evento input
                $("#cantidad").on('input', function () {
                    const value = parseInt(this.value, 10);
                    if (value < 1 || value > valores.cantidad) {
                        alert("Por favor, ingrese un número entre 1 y " + valores.cantidad);
                        this.value = ''; // Opcional: Limpiar el campo si el valor es inválido
                    }
                });
            } else {
                alert("El producto no existe");
            }
        }
    });
}


function limpiar() {
    $("#id_producto").val("");
    $("#cantidad").val("");
    $("#precio").val("");
    $("#showCantidad").text("");
}

function guardar() {

    var parametros = {
        "guardar": "1",
        "id_producto": $("#id_producto").val(),
        "precio": $("#precio").val(),
        "cantidad": $("#cantidad").val(),
        "documento": $("#documento").val()
    };

    $.ajax({
        data: parametros,
        url: 'CRUD/Create.php',
        type: 'post',
        beforeSend: function () {
            $('.formulario').hide();
            $('.cargando').show();

        },
        error: function () {
            alert("Error");
        },
        complete: function () {
            $('.formulario').show();
            $('.cargando').hide();

        },
        success: function (mensaje) {
            $('.resultados').html(mensaje);
            alert("El producto Fue Comprado Exitosamente");
            window.location.href = "vista.php";
            limpiar();
        }
    })
}

function actualizar() {
    var parametros = {
        "actualizar": "1",
        "documento": $("#documento").val(),
        "nombre": $("#nombre").val(),
        "direccion": $("#direccion").val(),
        "correo": $("#correo").val()
    };

    $.ajax({
        data: parametros,
        url: '../CRUD/Update.php',
        type: 'POST',
        dataType: 'json',
        beforeSend: function () {
            $('.formulario').hide();
            $('.cargando').show();
        },
        error: function () {
            alert("Error en la petición");
            $('.formulario').show();
            $('.cargando').hide();
        },
        complete: function () {
            $('.formulario').show();
            $('.cargando').hide();
        },
        success: function (response) {
            if (response.status === 'success') {
                alert(response.message);
                window.location.href = "admin.php";  // Redirige a admin.php tras el éxito
            } else {
                alert(response.message);  // Muestra mensaje de error
            }
        }
    });
}

function actualizarProducto() {
    // Obtener los datos del formulario
    var parametros = {
    'id_producto' : $('#id_producto').val(),
    'nombre' : $('#nombre').val(),
    'precio' : $('#precio').val(),
    'cantidad' : $('#cantidad').val()
    };
    // Enviar datos con AJAX
    $.ajax({
        url: '../CRUD/update_producto.php',
        type: 'POST',
        data: parametros,
        success: function (response) {
            alert(response);
            window.location.href = 'admin.php'; // Redirigir tras la actualización
        },
        error: function () {
            alert("Error en la solicitud. No se pudo actualizar el producto.");
        }
    });
}


function mostrarPedidoMayor() {
    $.ajax({
        url: '../CRUD/get_pedido_mayor.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                $('#resultadoPedido').text("Pedido Mayor: " + response.valor_total);
            } else {
                alert("No se pudo obtener el pedido mayor");
            }
        },
        error: function() {
            alert("Error en la solicitud para obtener el pedido mayor");
        }
    });
}

function mostrarPedidoMenor() {
    $.ajax({
        url: '../CRUD/get_pedido_menor.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                $('#resultadoPedido').text("Pedido Menor: " + response.valor_total);
            } else {
                alert("No se pudo obtener el pedido menor");
            }
        },
        error: function() {
            alert("Error en la solicitud para obtener el pedido menor");
        }
    });
}

function crearProducto() {
    var parametros = {
        'nombre': $('#nombre').val(),
        'precio': $('#precio').val(),
        'cantidad': $('#cantidad').val()
    };

    $.ajax({
        url: '../CRUD/create_producto.php',
        type: 'POST',
        data: parametros,
        success: function (response) {
            alert(response);
            window.location.href = '../admin/admin.php'; // Redirige a la página de administración
        },
        error: function () {
            alert("Error al crear el producto.");
        }
    });
}




