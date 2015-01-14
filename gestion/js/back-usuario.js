function mostrarMod() {
    var aniadir = document.getElementById('mod-perfil');
    aniadir.classList.toggle('oculto');
}
function mostrarChangePass() {
    var aniadir = document.getElementById('change-pass');
    aniadir.classList.toggle('oculto');
}
function mostrarChangeCorreo() {
    var aniadir = document.getElementById('change-correo');
    aniadir.classList.toggle('oculto');
}
function mostrarChangeFoto() {
    var aniadir = document.getElementById('foto-add');
    aniadir.classList.toggle('oculto');

}

function main() {
    document.getElementById('m1').addEventListener("click", mostrarMod);
    document.getElementById('m2').addEventListener("click", mostrarChangeCorreo);
    document.getElementById('m3').addEventListener("click", mostrarChangePass);
    document.getElementById('fot').addEventListener("click", mostrarChangeFoto);
}

window.addEventListener("load", main);