window.addEventListener("load", function() {
    var deletes = document.getElementsByClassName('delete');
    var editar = docment.getElementByClassName('editar');
    for (i = 0; i < deletes.length; i++) {
        deletes[i].addEventListener("click", confirmar);
    }
 function confirmar(evt) {
        alert('hola');
    }
    function editar(evt) {
        evt.preventDefault();
        var id = this.getAttribute('data-id');
    }
});