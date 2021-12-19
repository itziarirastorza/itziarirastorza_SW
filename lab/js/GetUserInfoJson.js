$(document).ready(function () {
    $("#Autocompletar").click(function () {
            var encontrado=false;
            var cadena = $.getJSON("../json/Users.json", function (d) {
            $('#tlf').val("");
            $('#fname').val("");
            $('#lname').val("");
            var Vemail = $('#email').val();
            for (l in d.usuarios) {
                if (d.usuarios.hasOwnProperty(l)) {
                    if(Vemail==d.usuarios[l].email){
                        $('#tlf').val(d.usuarios[l].telefono);
                        $('#fname').val(d.usuarios[l].nombre);
                        $('#lname').val(d.usuarios[l].apellido1 + " "+ d.usuarios[l].apellido2 );
                        encontrado=true;
                        break;
                    }
                }
             }
             if(!encontrado){
                alert("¡No se ha encontrado ese correo electrónico!");
            }
        })     
    })
});