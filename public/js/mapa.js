var mymap = L.map('inputmapa').setView([-12.0557992,-77.041157], 13);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibXlzdGljYWx0dXJ0bGUiLCJhIjoiY2tpeHVnajEyMHI4ODJxbXk0MHk2dW41biJ9.3j9sAGykKUhTh5pN81XD9w', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'your.mapbox.access.token'
}).addTo(mymap);

var inputLongi = document.getElementById("longitud");
var inputLati = document.getElementById("latitud");
var marcador = {};

function onMapClick(e) {
    if (marcador != undefined) {
        mymap.removeLayer(marcador);
    }

    marcador = L.marker(e.latlng, {draggable: true}).addTo(mymap);
    inputLongi.value = e.latlng.toString().match(/(?<=\ )(.*?)(?=\))/g);
    inputLati.value = e.latlng.toString().match(/(?<=\()(.*?)(?=\,)/g);
    
    marcador.on('drag', function (e) {
        inputLongi.value = e.latlng.toString().match(/(?<=\ )(.*?)(?=\))/g);
        inputLati.value = e.latlng.toString().match(/(?<=\()(.*?)(?=\,)/g);
    });
}

mymap.on('click', onMapClick);
