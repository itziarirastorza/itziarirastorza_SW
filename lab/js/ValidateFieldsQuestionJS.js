
function validateForm(f) {
    
    var Vemail = f.email.value;
    var Venunciado = f.enunciado.value;
    var Vcorrecta = f.correcta.value;
    var Vincorrecta1 = f.incorrecta1.value;
    var Vincorrecta2 = f.incorrecta2.value;
    var Vincorrecta3 = f.incorrecta3.value;
    var Vtema = f.tema.value;
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
    if (Venunciado.length < 10) {
      err+="El enunciado debe tener 10 caracteres como mínimo.\n";
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
      alert(err)
      return false;
    }else{
        return true;
    }
  }