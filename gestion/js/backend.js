/* JavaScript utilizado en Admin Panel.
 * Definimos varias funciones para trabajar con el, confirmacion para borrar,
 * validacion de formulario en el lado del cliente, mostrar algun menu.
 *
 * */
function confirmReset(evt) {
    if (confirm("Va a reiniciar el formulario ¿desea hacerlo?")) {

    } else {
        evt.preventDefault();
    }
}

function confirmDel(evt) {
    if (confirm("Va a eliminar este elemento, no podra recuperarlo despues ¿ Desea Continuar?")) {

    } else {
        evt.preventDefault();
    }
}

function valEnvio() {

}

function mostrarAdd() {
    var aniadir = document.getElementById('aniadir');
    aniadir.classList.toggle('oculto');
}


function init() {
    var botoReset = document.getElementById('reinicio');
    var botoEnviar = document.getElementById('enviar');
    var menu = document.getElementById('m1');
    var eliminadores = document.getElementsByClassName('eliminador');

    botoReset.addEventListener("click", confirmReset, false);
    botoEnviar.addEventListener("click", valEnvio, false);
   menu.addEventListener("click",mostrarAdd);
    for (var pos = 0; eliminadores.length; pos++) {
        eliminadores[pos].addEventListener('click', confirmDel, true);
    }

}

window.addEventListener("load", init);