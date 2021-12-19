$(document).ready(function() {
    $("#submit").click(function(){
        var formData = new FormData(fquestion);
        $.ajax({
            type: "POST",
            data: formData,
            cache: false,
            url: "./../php/AddQuestionWithImage.php",
            contentType: false,
            processData: false,
            success: function(data) {
                alert(data);
                var db = data.includes("Se ha guardado bien en la base de datos.");
                var xml = data.includes("Se ha guardado bien en XML.");
                var json = data.includes("Se ha guardado bien en JSON.");
                $("#resultado").html('');
                if (db) {   
                    $("<p align='center'> Se ha guardado bien en la base de datos. </p>").appendTo($("#resultado"));
                } else {
                    $("<p align='center'> No se ha guardado en la base de datos. </p>").appendTo($("#resultado"));
                }

                if (xml) {
                    $("<p align='center'> Se ha guardado bien en XML. </p>").appendTo($("#resultado"));
                } else {
                    $("<p align='center'> No se ha guardado en XML. </p>").appendTo($("#resultado"));
                }

                if (json) {
                    $("<p align='center'> Se ha guardado bien en JSON. </p>").appendTo($("#resultado"));
                } else {
                    $("<p align='center'> No se ha guardado en JSON. </p>").appendTo($("#resultado"));
                }

                if (!db && !xml && !json) {
                    $("<p align='center' style='color:red;'> Revise que todos los campos sean correctos. </p>").appendTo($("#resultado"));
                }
            }
        });
    });
});