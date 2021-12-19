$(document).ready(function() {
	$("#email").on('change', function(){
		var email = $('#email').val();
		$.ajax({
			type: "GET",
			cache: false,
			url: "./../php/ClientVerifyEnrollment.php?email=" + email,
			contentType: false,
			processData: false,
			success: function(data) {
				var si = data.includes("SI");
				var no = data.includes("NO");
				if (si) {	
					$("#resultado").html('Si está matriculado');
					$("#resultado").css('color', 'green');
					$("#submit").prop("disabled", false);
				} 

				if (no) {
					$("#resultado").html('No está matriculado');
					$("#resultado").css('color', 'red');
					$("#submit").prop("disabled", true);
				} 
			}
		});
	});
});