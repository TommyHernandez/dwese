/* 
 * Main principal para ahcer las llamadas AJAX y todo lo que tenga que ver con el movimiento de la web
 * Este es un JavaScript personalizado, usando Jquery.
 *
 */
var pagina = 0;
/* == MENSAJES DE ERROR == */
function tostada(mensaje, tipo) {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "progressBar": true,
        "positionClass": "toast-top-full-width",
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    if (mensaje !== '') {
        if (tipo == '2') {
            html
            toastr.warning(mensaje);
        } else if (tipo == '3') {
            toastr.error(mensaje);
        } else {
            toastr.success(mensaje);
        }
    }
}
/*==========================================*/
/* == Funciones == */
function manejadorLogin() {
    var login = "admin";
    var clave = "admin";
    ajaxLog();
}

function ajaxLog() {
    $.ajax({
        url: "ajaxlogin.php?user=admin&pass=admin",
        success: function (result) {
            if (result.log) {
                $("#master").removeClass("maestro");
                $("#login-form").addClass("maestro");
                tostada("conectado correctamente");
            } else {
                tostada("No es un usuario correcto", 2);
            }
        },
        error: function () {
            tostada("No se ha recibido Nada del servidor", 3);
        }
    });
}
function enviarPlato() {
    $.ajax({
        url: "ajaxadd.php",
        type: "POST",
        data: {
            nombre: document.getElementById("nombre").value,
            descripcion: document.getElementById("descp").value,
            precio: document.getElementById("precio").value,
            tipo: 1
        },
        success: function (result) {
            if (result.status) {
                tostada("Añadido correctamente");
            } else {
                tostada("No se pudo añadir");
            }
        },
        error: function () {
            tostada("No se estableció conexion o algo falló", 3);
        }
    });
}
function getListaPlatos(pagina) {
    var pagina = pagina;
    $.ajax({
        url: "ajaxselect.php?pagina=" + pagina,
        success: function (result) {
            alert(result);
            destruirTabla();
            construirTabla(result);
            var enlaces = document.getElementsByClassName("enlace");
            for (var i = 0; i < enlaces.length; i++)
                agregarEvento(enlaces[i]);
        },
        error: function () {
            tostada("Algo ha salido mal", 3);
        }
    });
}
function destruirTabla() {
    var div = document.getElementById("lista-platos");
    while (div.hasChildNodes()) {
        div.removeChild(div.firstChild);
    }
}
function verEditar(){
    $("#add-plato").deleteClass("oculto");
    var id = this.getAttribute('data-editar');
    $.ajax({
            url: "ajaxget.php?id=" + id,
            success: function (result) {
                var nombre = document.getElementById('nombre').value = result.login;
                var descripcion = document.getElementById('descp').value = "";
                var precio = document.getElementById('precio').value = result.nombre;
               for (var i = 0;i < result.rutas.lenght; i++) {
                var img = $("<img/>").addClass("thumb");
                img.attr("src",result.rutas.ruta);
                $("#list").append(img);
            }

            },
            error: function () {
                tostada("AJAX FALLO al procesar al usuario", 3);
            }
        });
}
function construirTabla(datos) {
    var tabla = document.getElementById("lista-platos");
    var tr, td;
    for (var i = 0; i < datos.platos.length; i++) {
        if (i === 0) {
            tr = document.createElement("tr");
            for (var j in datos.platos[i]) {
                td = document.createElement("th");
                td.textContent = j;
                tr.appendChild(td);
            }
            tabla.appendChild(tr);
        }

        tr = document.createElement("tr");
        for (var j in datos.platos[i]) {
            td = document.createElement("td");
            td.textContent = datos.platos[i][j];
            tr.appendChild(td);
        }
        td = document.createElement("td");
        td.innerHTML = "<a  class='enlace_editar' data-editar='" + datos.platos[i].id + "'>EDITAR</a>";
        tr.appendChild(td);
        td = document.createElement("td");
        td.innerHTML = "<a  class='enlace_borrar' data-borrar='" + datos.platos[i].id + "'>BORRAR</a>";
        tr.appendChild(td);
        tabla.appendChild(tr);
    }
    /*paginacion*/
    tr = document.createElement("tr");
    td = document.createElement("th");
    td.setAttribute("colspan", 10);
    td.innerHTML += "<a class='enlace' data-href='" + datos.paginas.inicio + "'>&lt;&lt;</a> ";
    td.innerHTML += "<a class='enlace' data-href='" + datos.paginas.anterior + "'>&lt;</a> ";
    if (datos.paginas.primero !== -1)
        td.innerHTML += "<a  class='enlace' data-href='" + datos.paginas.primero + "'>" + (parseInt(datos.paginas.primero) + 1) + "</a> ";
    if (datos.paginas.segundo !== -1)
        td.innerHTML += "<a  class='enlace' data-href='" + datos.paginas.segundo + "'>" + (parseInt(datos.paginas.segundo) + 1) + "</a> ";
    if (datos.paginas.actual !== -1)
        td.innerHTML += "<a  class='enlace' data-href='" + datos.paginas.actual + "'>" + (parseInt(datos.paginas.actual) + 1) + "</a> ";
    if (datos.paginas.cuarto !== -1)
        td.innerHTML += "<a  class='enlace' data-href='" + datos.paginas.cuarto + "'>" + (parseInt(datos.paginas.cuarto) + 1) + "</a> ";
    if (datos.paginas.quinto !== -1)
        td.innerHTML += "<a  class='enlace' data-href='" + datos.paginas.quinto + "'>" + (parseInt(datos.paginas.quinto) + 1) + "</a> ";
    td.innerHTML += "<a  class='enlace' data-href='" + datos.paginas.siguiente + "'>&gt;</a> ";
    td.innerHTML += "<a  class='enlace' data-href='" + datos.paginas.ultimo + "'>&gt;&gt;</a> ";
    tr.appendChild(td);
    tabla.appendChild(tr);
    definirBorrar("enlace_borrar");
    definirEditar("enlace_editar");
}
function agregarEvento(elemento) {
    var datahref = elemento.getAttribute("data-href");
    elemento.onclick = function (e) {
        cargarPagina(datahref)
    };
}
function confirmar(event, mensaje) {
    if (confirm("desea borrar " + mensaje)) {
        $.ajax({
            url: "ajaxdelete.php?login=" + mensaje + "&pagina=" + pagina,
            success: function (result) {
                if (result.estado) {
                    tostada("Se ha borrado a " + mensaje + " correctametne");

                } else {

                }
            },
            error: function () {
                tostada("Ha fallado el borrado", 3);
            }
        });
    }
}
function definirEditar(clase) {
    var elementos, i;
    elementos = document.getElementsByClassName(clase);
    for (i = 0; i < elementos.length; i = i + 1) {
        mensaje = elementos[i].getAttribute("data-editar");
        elementos[i].onclick = verEditar;
    }
}
function definirBorrar(clase) {
    var elementos, i;
    elementos = document.getElementsByClassName(clase);
    for (i = 0; i < elementos.length; i = i + 1) {
        mensaje = elementos[i].getAttribute("data-borrar");
        elementos[i].onclick = function () {
            confirmar(event, mensaje);
        };
    }
}
/** ========== */

/* == INICIAL == */

$(document).ready(function () {
    $("#btn-login").on("click", manejadorLogin);
    $("#p-add").on("click", function () {
        $("#add-plato").toggleClass("oculto");
    });
    $("#p-listar").on("click", function () {
        getListaPlatos(0);
    });
    $("#enviar-plato").on("click", enviarPlato);
    function handleFileSelect(evt) {
        var files = evt.target.files; // FileList object

        // Loop through the FileList and render image files as thumbnails.
        for (var i = 0, f; f = files[i]; i++) {

            // Only process image files.
            if (!f.type.match('image.*')) {
                continue;
            }

            var reader = new FileReader();

            // Closure to capture the file information.
            reader.onload = (function (theFile) {
                return function (e) {
                    // Render thumbnail.
                    var span = document.createElement('span');
                    span.innerHTML = ['<img class="thumb" src="', e.target.result,
                        '" title="', escape(theFile.name), '"/>'].join('');
                    document.getElementById('list').insertBefore(span, null);
                };
            })(f);

            // Read in the image file as a data URL.
            reader.readAsDataURL(f);
        }
    }

    document.getElementById('files').addEventListener('change', handleFileSelect, false);
});
