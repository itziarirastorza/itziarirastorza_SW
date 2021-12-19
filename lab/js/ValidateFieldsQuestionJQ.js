$(document).ready(function() { 
 
    $('#submit').click(function() {  
        var Vemail = $('#email').val();
        var Venunciado = $('#enunciado').val();
        var tamano = Venunciado.length;
        var Vcorrecta = $('#correcta').val();
        var Vincorrecta1 = $('#incorrecta1').val();
        var Vincorrecta2 = $('#incorrecta2').val();
        var Vincorrecta3 = $('#incorrecta3').val();
        var Vtema = $('#tema').val();
        var err= "";
        var cadena =/^(([a-z]+[0-9]{3}@ikasle[.]ehu[.](eus|es))|([a-z]+[.]{0,1}[a-z]+@ehu[.](eus|es)))$/; 
        
        if ( Vemail == "") {
            err+="Debes introducir un correo electrónico.\n";
          }else{
           if(!cadena.test(Vemail)){
            err+="El formato del correo electrónico no es válido.\n";
           }
          }
          
          if (Venunciado == "") {
            err+="Debes introducir un enunciado.\n";
          }
          if(tamano < 10){
            err+= "El enunciado debe tener 10 caracteres como mínimo\n";
          }
          if (Vcorrecta == "") {
            err+="El campo de respuesta correcta no puede estar vacio \n";
          }
          if (Vincorrecta1 == "") {
            err+="El campo de respuesta incorrecta 1 no puede estar vacio\n";
          }
          if (Vincorrecta2 == "") {
            err+="El campo de respuesta incorrecta 2 no puede estar vacio\n";
          }
          if (Vincorrecta3 == "") {
            err+="El campo de respuesta incorrecta 2 no puede estar vacio\n";
          }
          if (Vtema == "") {
            err+="Debes introducir un tema.\n";
          }
          if(err!=""){
            alert(err);
            return false;
          }else{
              return true;
          }
 
    });
});