/* JavaScript utilizado en Admin Panel.
 * Definimos varias funciones para trabajar con el, confirmacion para borrar, 
 * validacion de formulario en el lado del cliente, mostrar algun menu.
 * 
 * */
function confirmReset(){
    confirm("Va a reiniciar el formulario ¿desea hacerlo?");
}
function valEnvio(){
    
}
function mostrarAdd(){
    var aniadir = document.getElementById('aniadir');
    aniadir.classList.toggle('oculto');
}
function addMenu(){
     var ver = document.getElementById('lista-acc');
    ver.classList.toggle('oculto');
}

function init (){
    var botoReset = document.getElementById('reinicio');
    var botoEnviar = document.getElementById('enviar');    
    var menuadd = document.getElementById('inmuebles-ad');
    var elementoAniadir = document.getElementById('m-add');
    botoReset.addEventListener("click", confirmReset, false);
    botoEnviar.addEventListener("click", valEnvio, false);
    menuadd.addEventListener('click',addMenu,true);
    elementoAniadir.addEventListener('click',mostrarAdd,true);
}

window.addEventListener("load",init);