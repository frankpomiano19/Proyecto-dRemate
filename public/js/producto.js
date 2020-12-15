$(function () {
    $('#demo-form').parsley().on('field:validated', function () {
        var ok = $('.parsley-error').length === 0;
        $('.bs-callout-info').toggleClass('hidden', !ok);
        $('.bs-callout-warning').toggleClass('hidden', ok);
    })
        .on('form:submit', function () {
            return false; // Don't submit form for this demo
        });
});

// add the rule here
// $.validator.addMethod("valueNotEquals", function (value, element, arg) {
//     return arg !== value;
// }, "Value must not equal arg.");

// configure your validation
// $("form").validate({
//     rules: {
//         SelectName: { valueNotEquals: "default" }
//     },
//     messages: {
//         SelectName: { valueNotEquals: "Please select an item!" }
//     }
// });

// window.Parsley
//   .addValidator('multipleOf', {
//     requirementType: 'integer',
//     validateNumber: function(value, requirement) {
//       return 0 === value % requirement;
//     },
//     messages: {
//       en: 'This value should be a multiple of %s',
//       fr: 'Cette valeur doit être un multiple de %s'
//     }
//   });


//------------------------------Select---------------------------------
//Select
function cambia()
{
  var sel_departamento = document.getElementsByName("selectDepartamento")[0];
  var sel_provincia = document.getElementsByName("selectProvincia")[0];
  var sel_distrito = document.getElementsByName("selectDistrito")[0];
  
 var opt_Amazonas = new Array ("Seleccione la Provincia", "Bagua", "Bongará", "Chachapoyas", "Condorcanqui","Luya","Rodríguez de Mendoza","Utcubamba");

 var opt_Amazonas_value = new Array ("Seleccione la Provincia", "Bagua", "Bongará", "Chachapoyas", "Condorcanqui","Luya","Rodríguez_de_Mendoza","Utcubamba");

 var opt_Ancash = new Array ("Seleccione la Provincia", "Aija", "Antonio Raymondi", "Asunción", "Bolognesi","Carhuaz","Carlos Fermín Fitzcarrald","Casma","Corongo","Huaraz","Huari","Huarmey","Huaylas","Mariscal Luzuriaga","Ocros","Pallasca","Pomabamba","Recuay","Santa","Sihuas","Yungay");

 var opt_Ancash_value = new Array ("Seleccione la Provincia", "Aija", "Antonio_Raymondi", "Asunción", "Bolognesi","Carhuaz","Carlos_Fermín_Fitzcarrald","Casma","Corongo","Huaraz","Huari","Huarmey","Huaylas","Mariscal_Luzuriaga","Ocros","Pallasca","Pomabamba","Recuay","Santa","Sihuas","Yungay");
  
 var opt_Apurímac = new Array ("Seleccione la Provincia", "Abancay", "Andahuaylas", "Antabamba", "Aymaraes","Cotabambas","Chincheros","Grau");
 var opt_Apurímac_value = new Array ("Seleccione la Provincia", "Abancay", "Andahuaylas", "Antabamba", "Aymaraes","Cotabambas","Chincheros","Grau");

 var opt_Arequipa = new Array ("Seleccione la Provincia", "Arequipa", "Camaná", "Caravelí", "Castilla","Caylloma","Condesuyos","Islay","La Unión");
 var opt_Arequipa_value = new Array ("Seleccione la Provincia", "Arequipa", "Camaná", "Caravelí", "Castilla","Caylloma","Condesuyos","Islay","La_Unión");

 var opt_Ayacucho = new Array ("Seleccione la Provincia", "Cangallo","Huamanga","Huanca Sancos", "Huanta","La Mar","Lucanas","Parinacochas","Páucar del Sara Sara","Sucre","Víctor Fajardo","Vilcashuamán");
 var opt_Ayacucho_value = new Array ("Seleccione la Provincia", "Cangallo","Huamanga","Huanca_Sancos", "Huanta","La_Mar","Lucanas","Parinacochas","Páucar_del_Sara_Sara","Sucre","Víctor_Fajardo","Vilcashuamán");

 var opt_Cajamarca = new Array ("Seleccione la Provincia", "Cajabamba","Cajamarca ","Celendín", "Contumazá","Cutervo","Chota","Hualgayoc","Jaén","Santa Cruz","San Miguel","San Ignacio","San Marcos","San Pablo");
 var opt_Cajamarca_value = new Array ("Seleccione la Provincia", "Cajabamba","Cajamarca ","Celendín", "Contumazá","Cutervo","Chota","Hualgayoc","Jaén","Santa_Cruz","San_Miguel","San_Ignacio","San_Marcos","San_Pablo");

 var opt_Callao = new Array ("Seleccione la Provincia", "Callao");
 var opt_Callao_value = new Array ("Seleccione la Provincia", "Callao");

 var opt_Cuzco = new Array ("Seleccione la Provincia", "Acomayo","Anta ","Calca", "Canas","Canchis","Chumbivilcas","Cuzco","Espinar","La Convención","Paruro","Paucartambo","Quispicanchi","Urubamba");
 var opt_Cuzco_value = new Array ("Seleccione la Provincia", "Acomayo","Anta ","Calca", "Canas","Canchis","Chumbivilcas","Cuzco","Espinar","La_Convención","Paruro","Paucartambo","Quispicanchi","Urubamba");

 var opt_Huancavelica = new Array ("Seleccione la Provincia", "Acobamba","Angaraes ","Castrovirreyna", "Churcampa","Huancavelica","Huaytará","Tayacaja");
 var opt_Huancavelica_value = new Array ("Seleccione la Provincia", "Acobamba","Angaraes ","Castrovirreyna", "Churcampa","Huancavelica","Huaytará","Tayacaja");

 var opt_Huánuco = new Array ("Seleccione la Provincia", "Ambo","Dos de Mayo","Huacaybamba", "Huánuco","Huamalíes","Leoncio Prado","Marañón","Pachitea","Puerto Inca","Lauricocha","Yarowilca");
 var opt_Huánuco_value = new Array ("Seleccione la Provincia", "Ambo","Dos_de_Mayo","Huacaybamba", "Huánuco","Huamalíes","Leoncio_Prado","Marañón","Pachitea","Puerto_Inca","Lauricocha","Yarowilca");

 var opt_Ica = new Array ("Seleccione la Provincia","Chincha","Ica","Nazca","Palpa","Pisco");
 var opt_Ica_value = new Array ("Seleccione la Provincia","Chincha","Ica","Nazca","Palpa","Pisco");

 var opt_Junín = new Array ("Seleccione la Provincia", "Concepción","Chanchamayo","Chupaca","Huancayo","Jauja","Junín","Satipo","Tarma","Yauli");
 var opt_Junín_value = new Array ("Seleccione la Provincia", "Concepción","Chanchamayo","Chupaca","Huancayo","Jauja","Junín","Satipo","Tarma","Yauli");
  
 var opt_La_Libertad= new Array ("Seleccione la Provincia", "Ascope","Bolívar","Chepén","Gran Chimú","Julcán","Otuzco","Pacasmayo","Pataz","Sánchez Carrión","Santiago de Chuco","Trujillo","Virú");
 var opt_La_Libertad_value= new Array ("Seleccione la Provincia","Ascope","Bolívar","Chepén","Gran_Chimú","Julcán","Otuzco","Pacasmayo","Pataz","Sánchez_Carrión","Santiago_de_Chuco","Trujillo","Virú");
  
 var opt_Lambayeque= new Array ("Seleccione la Provincia", "Chiclayo","Ferreñafe","Lambayeque");
 var opt_Lambayeque_value= new Array ("Seleccione la Provincia", "Chiclayo","Ferreñafe","Lambayeque");

 var opt_Lima= new Array ("Seleccione la Provincia","Barranca","Cajatambo","Canta","Cañete","Huaral","Huarochirí","Huaura","Lima","Oyón","Yauyos");
 var opt_Lima_value= new Array ("Seleccione la Provincia","Barranca","Cajatambo","Canta","Cañete","Huaral","Huarochirí","Huaura","Lima","Oyón","Yauyos");

 var opt_Loreto= new Array ("Seleccione la Provincia","Alto Amazonas","Datem del Marañón","Loreto","Maynas","Mariscal Ramón Castilla","Putumayo","Requena","Ucayali");
 var opt_Loreto_value= new Array ("-","Alto_Amazonas","Datem_del_Marañón","Loreto","Maynas","Mariscal_Ramón_Castilla","Putumayo","Requena","Ucayali");

 var opt_Madre_de_Dios=new Array("Seleccione Provincia","Manu","Tambopata","Tahuamanu");
 var opt_Madre_de_Dios_value=new Array("Seleccione Provincia","Manu","Tambopata","Tahuamanu");

 var opt_Moquegua=new Array("Seleccione Provincia","General Sánchez Cerro","Ilo","Mariscal Nieto");
 var opt_Moquegua_value=new Array("Seleccione Provincia","General_Sánchez_Cerro","Ilo","Mariscal_Nieto");

 var opt_Pasco=new Array("Seleccione Provincia","Daniel Alcides Carrión","Oxapampa","Pasco");
 var opt_Pasco_value=new Array("Seleccione Provincia","Daniel_Alcides_Carrión","Oxapampa","Pasco");

 var opt_Piura=new Array("Seleccione Provincia","Ayabaca","Huancabamba","Morropón","Paita","Piura","Sechura","Sullana","Talara");
 var opt_Piura_value=new Array("Seleccione Provincia","Ayabaca","Huancabamba","Morropón","Paita","Piura","Sechura","Sullana","Talara");

 var opt_Puno=new Array("Seleccione Provincia","Azángaro","Carabaya","Chucuito","El Collao","Huancané","Lampa","Melgar","Moho","Puno","San Antonio de Putina","San Román","Sandia","Yunguyo");
 var opt_Puno_value=new Array("Seleccione Provincia","Azángaro","Carabaya","Chucuito","El_Collao","Huancané","Lampa","Melgar","Moho","Puno","San_Antonio_de_Putina","San_Román","Sandia","Yunguyo");

 var opt_San_Martín=new Array("Seleccione Provincia","Bellavista","El Dorado","Huallaga","Lamas","Mariscal Cáceres","Moyobamba","Picota","Rioja","San Martín","Tocache");
 var opt_San_Martín_value=new Array("Seleccione Provincia","Bellavista","El_Dorado","Huallaga","Lamas","Mariscal_Cáceres","Moyobamba","Picota","Rioja","San_Martín","Tocache");

 var opt_Tacna=new Array("Seleccione Provincia","Candarave","Jorge Basadre","Tacna","Tarata");
 var opt_Tacna_value=new Array("Seleccione Provincia","Candarave","Jorge_Basadre","Tacna","Tarata");

 var opt_Tumbes=new Array("Seleccione Provincia","Contralmirante Villar","Tumbes","Zarumilla");
 var opt_Tumbes_value=new Array("Seleccione Provincia","Contralmirante_Villar","Tumbes","Zarumilla");
 
 var opt_Ucayali=new Array("Seleccione Provincia","Atalaya","Coronel Portillo","Padre Abad","Purús");
 var opt_Ucayali_value=new Array("Seleccione Provincia","Atalaya","Coronel_Portillo","Padre_Abad","Purús");


   var cosa;
  
 selectDepartamento = sel_departamento.options[sel_departamento.selectedIndex].value;

 
 if(selectDepartamento!=0)
 {
     mis_opts=eval("opt_" + selectDepartamento);
     mis_value=eval("opt_" + selectDepartamento +"_value");

     num_opts=mis_opts.length;

     sel_provincia.length = num_opts;
            
     for(i=0; i<num_opts; i++)
     {
      sel_provincia.options[0].value="";
      sel_provincia.options[0].text="Seleccione la Provincia";
      

        sel_provincia.options[i].value=mis_value[i];
        sel_provincia.options[i].text=mis_opts[i];
     }

     sel_distrito.length = 1;
     sel_distrito.options[0].value=" ";
     sel_distrito.options[0].text="Seleccione el Distrito";


   }
   else
   {
     sel_provincia.length = 1;
     sel_provincia.options[0].value="";
     sel_provincia.options[0].text="Seleccione la Provincia";
   }
    sel_provincia.options[0].selected = true;
    sel_distrito.options[0].selected = true; 
}

function cambiaDistrito()
{
    var cosa;
    var sel_departamento = document.getElementsByName("selectDepartamento")[0];
    var sel_provincia = document.getElementsByName("selectProvincia")[0];
    var sel_distrito = document.getElementsByName("selectDistrito")[0];
  
    selectProvincia = sel_provincia.options[sel_provincia.selectedIndex].value;

 if(selectProvincia!=0)
 {
  mis_opts=eval("opt_" + selectProvincia);
  num_opts=mis_opts.length;

  sel_distrito.length = num_opts;

  for(i=0; i<num_opts; i++)
  {
   sel_distrito.options[0].value="";
   sel_distrito.options[0].text="Seleccione el Distrito";

   sel_distrito.options[i].value=mis_opts[i];
   sel_distrito.options[i].text=mis_opts[i];
  }
 }
 else
 {
  sel_distrito.length = 1;
  sel_distrito.options[0].value="-";
  sel_distrito.options[0].text="-";
 }
 sel_distrito.options[0].selected = true;     
}

