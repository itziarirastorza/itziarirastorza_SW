function countQuestions() {
	$.ajax({
		url: "./../json/Questions.json?p=" + new Date().getTime(),
		type: "POST",
		dataType: "JSON",
		success: function(data) {
			var totalQuestions = data.assessmentItems.length;
			var count = 0;

			// Eposta eskuratu
			var url = window.location.search;
			var urlParams = new URLSearchParams(url);
			var user = urlParams.get('email');

			for (var i=0; i < totalQuestions; i++) {
				if (data.assessmentItems[i].author == user) {
					count++;
				}
			}
			
			$("#count").html("Mis preguntas / Preguntas en total (JSON): " + count + "/" + totalQuestions);
		}
	});
}

$(document).ready(function(){
	countQuestions();
	setInterval(countQuestions,10000);
});