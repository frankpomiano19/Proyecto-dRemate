var mymap = L.map('inputmapa').setView([-11.932861,-77.0391], 11);
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

var Amazonas = ["Amazonas",-5,-78];
var Ancash = ["Ancash",-9.5,-77.75];
var Apurímac = ["Apurímac",-14,-73];
var Arequipa = ["Arequipa",-16.3988667,-71.5369607];
var Ayacucho = ["Ayacucho",-14,-74];
var Cajamarca = ["Cajamarca",-6.25,-78.833333];
var Callao = ["Callao",-12.0522626,-77.1391133];
var Cuzco = ["Cuzco",-13.5170887,-71.9785356];
var Huancavelica = ["Huancavelica",-13,-75];
var Huánuco = ["Huánuco",-9.5,-75.833333];
var Ica = ["Ica",-14.338611,-75.648333];
var Junín = ["Junín",-11.5,-75];
var La_Libertad = ["La_Libertad",-8,-78.5];
var Lambayeque = ["Lambayeque",-6.333333,-80];
var Lima = ["Lima",-12.0621065,-77.0365256];
var Loreto = ["Loreto",-5,-75];
var Madre_de_Dios = ["Madre_de_Dios",-12,-70.25];
var Moquegua = ["Moquegua",-16.833333,-70.916667];
var Pasco = ["Pasco",-10.5,-75.25];
var Piura = ["Piura",-5.1949018,-80.6323];
var Puno = ["Puno",-15,-70];
var San_Martín = ["San_Martín",-7,-76.833333];
var Tacna = ["Tacna",-18.0138521,-70.2511614];
var Tumbes = ["Tumbes",-3.833333,-80.5];
var Ucayali = ["Ucayali",-9,-73.5];


