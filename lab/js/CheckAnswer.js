$(document).ready(function() {
    $("#submit").click(function(){
        var formData = new FormData(quiz);
        $.ajax({
            type: "POST",
            data: formData,
            cache: false,
            url: "./../php/CheckAnswer.php",
            contentType: false,
            processData: false,
            success: function(data) {
                alert(data);
                var correcta = data.includes("La respuesta es correcta");

                $("#resultado").html('');
                if (db) {   
                    $("<p align='center'> La respuesta es correcta. </p>").appendTo($("#resultado"));
                } else {
                    $("<p align='center'> La respuesta no es correcta. </p>").appendTo($("#resultado"));
                }

            }
        });
    });
});