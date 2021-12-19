
const $seleccionArchivos = document.querySelector("#file"),
  $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");
  $(document).ready(function(){
    $("#clear").click(function(){
      $("#clear").hide();
      $("#imagenPrevisualizacion").hide();
      $("#file").val("");
    });
    $("#reset").click(function(){
      $("#clear").hide();
      $("#imagenPrevisualizacion").hide();
    });
    $("#file").change(function(){
      if (this.files.length > 0) {
        $("#clear").show();
        $("#imagenPrevisualizacion").show();
      } else {
        $("#clear").hide();
      }
    });
    
  });
//$buttonClear = document.getElementById("#clear");

//$buttonClear.hidden=true;
$seleccionArchivos.addEventListener("change", () => {
  const archivos = $seleccionArchivos.files;
  if (!archivos || !archivos.length) {
    $imagenPrevisualizacion.src = "";
    return;
  }
  const primerArchivo = archivos[0];
  const objectURL = URL.createObjectURL(primerArchivo);
  $imagenPrevisualizacion.src = objectURL;
  const $buttonClear = document.getElementById("#clear");
 // $buttonClear.show();
  $buttonClear.hidden=false;
});

