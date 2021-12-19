$(document).ready(function() {
    $('#Autocompletar').click(function(){
        var encontrado=false;
        $.get('../xml/Users.xml', function(d){
            $('#tlf').val("");
            $('#fname').val("");
            $('#lname').val("");
            var listacorreos = $(d).find('email');
            var listanombres = $(d).find('nombre');
            var listapellido1 = $(d).find('apellido1');
            var listapellido2 = $(d).find('apellido2');
            var listatlfs = $(d).find('telefono');
            var Vemail = $('#email').val();
            for (var i = 0; i <= listacorreos.length; i++)
            {   if(Vemail==listacorreos[i].childNodes[0].nodeValue){
                    $('#tlf').val(listatlfs[i].childNodes[0].nodeValue);
                    $('#fname').val(listanombres[i].childNodes[0].nodeValue);
                    $('#lname').val(listapellido1[i].childNodes[0].nodeValue + " "+ listapellido2[i].childNodes[0].nodeValue );
                    encontrado=true;
                    break;
                };
            }
            if(!encontrado){
                alert("¡No se ha encontrado ese correo electrónico!");
            }

        })
    })
    });