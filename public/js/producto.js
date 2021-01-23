// if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(mostrarUbicacion);
// }
  
// function mostrarUbicacion (ubicacion) {
//     var lng = ubicacion.coords.longitude;
//     var lat = ubicacion.coords.latitude;
// }
//Para una localización cerca

var mymap = L.map('inputmapa').setView([-12.0621065,-77.0365256], 11);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibXlzdGljYWx0dXJ0bGUiLCJhIjoiY2tpeHVnajEyMHI4ODJxbXk0MHk2dW41biJ9.3j9sAGykKUhTh5pN81XD9w', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 15,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'your.mapbox.access.token'
}).addTo(mymap);


var inputLongi = document.getElementById("longitud");
var inputLati = document.getElementById("latitud");
var marcador = {};

function cambia(latitud,longitud){

    var sel = document.getElementById('departamento');

    var zoom = 0;

    if(sel.value =="Amazonas"){

        var latitud = -6.230835;
        var longitud = -77.871217;
        zoom = 1;

    }else if(sel.value =="Ancash"){

        var latitud = -9.529993;
        var longitud = -77.531704;
        zoom = 2;
        
    }else if(sel.value =="Apurímac"){

        var latitud = -13.636756;
        var longitud = -72.879491;
        zoom = 2;

    }else if(sel.value =="Arequipa"){

        var latitud = -16.400518;
        var longitud = -71.535961;
        zoom = 1;

    }else if(sel.value =="Ayacucho"){

        var latitud = -13.161174;
        var longitud = -74.225245;
        zoom = 1;

    }else if(sel.value =="Cajamarca"){

        var latitud = -7.158863;
        var longitud = -78.516059;
        zoom = 1;

    }else if(sel.value =="Callao"){

        var latitud = -12.052975;
        var longitud = -77.139002;
        zoom = 1;

    }else if(sel.value =="Cuzco"){

        var latitud = -13.522511;
        var longitud = -71.970643;
        zoom = 1;
        
    }else if(sel.value =="Huancavelica"){

        var latitud = -12.787027;
        var longitud = -74.972583;
        zoom = 1;

    }else if(sel.value =="Huánuco"){

        var latitud = -9.93092;
        var longitud = -76.239481;
        zoom = 2;

    }else if(sel.value =="Ica"){

        var latitud = -14.06493;
        var longitud = -75.728827;
        zoom = 1;

    }else if(sel.value =="Junín"){

        var latitud = -12.076365;
        var longitud = -75.207026;
        zoom = 2;

    }else if(sel.value =="La_Libertad"){

        var latitud = -8.110216;
        var longitud = -79.030574;
        zoom = 2;

    }else if(sel.value =="Lambayeque"){

        var latitud = -6.770989 ;
        var longitud = -79.843396;
        zoom = 2;

    }else if(sel.value =="Lima"){

        var latitud = -12.0621065;
        var longitud = -77.0365256;
        zoom = 2;

    }else if(sel.value =="Loreto"){

        var latitud = -3.749153;
        var longitud = -73.245523;
        zoom = 2;

    }else if(sel.value =="Madre_de_Dios"){

        var latitud = -12.59254;
        var longitud = -69.188191;
        zoom = 2;

    }else if(sel.value =="Moquegua"){

        var latitud = -17.193767;
        var longitud = -70.934527;
        zoom = 1;

    }else if(sel.value =="Pasco"){

        var latitud = -10.666344;
        var longitud = -76.255141;
        zoom = 1;

    }else if(sel.value =="Piura"){

        var latitud = -5.195464;
        var longitud = -80.630873;
        zoom = 2;

    }else if(sel.value =="Puno"){

        var latitud = -15.841802;
        var longitud = -70.028841;
        zoom = 2;

    }else if(sel.value =="San_Martín"){

        var latitud = -6.488505;
        var longitud = -76.359318;
        zoom = 2;

    }else if(sel.value =="Tacna"){

        var latitud = -18.0138521;
        var longitud = -70.2511614;
        zoom = 2;

    }else if(sel.value =="Tumbes"){

        var latitud = -3.565364;
        var longitud = -80.456874;
        zoom = 1;

    }else if(sel.value =="Ucayali"){

        var latitud = -8.383393;
        var longitud = -74.538623;
        zoom = 2;

    }

    if(zoom==1){
        mymap.flyTo([latitud,longitud],14);
    }else if(zoom==2){
        mymap.flyTo([latitud,longitud],12);
    }else{
        mymap.flyTo([latitud,longitud],10);
    }


}

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
