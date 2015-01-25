var map;

function main() {

    map = new GMaps({
        div: '#mapa',
        lat: 37.178617,
        lng: -3.591816
    });
    map.addMarker({
            lat: 37.178617,
            lng: -3.591816,
            title: 'Con-rong'
});
    document.getElementById("bt1").addEventListener("click", function () {
        if (navigator.geolocation) { // Nos aseguramos de que el navegador soporta la API Geolocation
            //navigator.geolocation.getCurrentPosition(visualizar, errorSituacion); 
            navigator.geolocation.getCurrentPosition(trazarRuta, errorSituacion); //Llamamos al método getCurrentPosition y le pasamos una función manejadora

        } else {
            alert("No hay soporte de geolocalización");
        }


    });

}
function errorSituacion() {}
function trazarRuta(posicion) {
    lat = posicion.coords.latitude;
    lon = posicion.coords.longitude;
   
    map.drawRoute({
        origin: [lat, lon],
        destination: [37.178617, -3.591816],
        travelMode: 'driving',
  strokeColor: '#131540',
  strokeOpacity: 0.6,
  strokeWeight: 6
    });
}
window.addEventListener("load", main);