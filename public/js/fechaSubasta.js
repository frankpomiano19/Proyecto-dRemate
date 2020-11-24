function pasar() {
    var inicioSubasta = document.getElementById("fechaInicio");
    var fechaHoy = new Date();

    var inicioSubastaF = fechaHoy.getFullYear() + "-" + (fechaHoy.getMonth() +1 + "-" + fechaHoy.getDate());
    inicioSubasta.setAttribute("min",inicioSubastaF);

    //
    var inicioSubastaF = document.getElementById("fechaInicioF");
    var fechaHoyF = new Date();

    var inicioSubastaFF = fechaHoyF.getFullYear() + "-" + (fechaHoyF.getMonth() +1 + "-" + fechaHoyF.getDate());
    inicioSubastaF.setAttribute("min",inicioSubastaFF);

}

pasar();