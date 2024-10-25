
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
        success: function(response) {
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
    id_producto = $("#id_producto").val();

    var parametros = {
        "buscar": "1",
        "id_producto": id_producto
    };
    $.ajax({
        data: parametros,
        dataType: 'json',
        url: 'Onblur.php',
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
        success: function (valores) {
            if (valores.existe == "1") {
                $("#precio").val(valores.precio);
                $("#showCantidad").val(valores.showCantidad);
            } else {
                alert("El producto no existe")
            }

        }
    })
}

function limpiar() {
    $("#id").val("");
    $("#nombre").val("");
    $("#cantidad").val("");
    $("#precio").val("");
}

function guardar() {
    var parametros = {
        "guardar": "1",
        "id": $("#id").val(),
        "nombre": $("#nombre").val(),
        "cantidad": $("#cantidad").val(),
        "precio": $("#precio").val()
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
        }
    })
    limpiar();
}

function actualizar() {
    var parametros = {
        "actualizar": "1",
        "documento": $("#documento").val(),
        "nombre": $("#nombre").val(),
        "direccion": $("#direccion").val(),
        "correo": $("#correo").val()
    };

    console.log("Parámetros enviados:", parametros);

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





