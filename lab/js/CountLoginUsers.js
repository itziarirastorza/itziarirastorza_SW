function CountLoginUsers() {
	$.ajax({
		url: "./../xml/UserCounter.xml?p="+ new Date().getTime(),
		dataType: "XML",
		type: "POST",
		cache: false,
		success: function(data) {
			var cuantos = $(data).find("user").length;
			$("#users").html("Usuarios logeados: " + cuantos);
		}
	});
}

$(document).ready(function(){
	CountLoginUsers();
	setInterval(CountLoginUsers, 10000);
});