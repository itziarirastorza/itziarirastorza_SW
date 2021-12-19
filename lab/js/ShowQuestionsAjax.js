XMLHttpRequestObject = new XMLHttpRequest();
XMLHttpRequestObject.onreadystatechange = function(){
  if(XMLHttpRequestObject.readyState==4){
    var obj = document.getElementById('resultado');
    obj.innerHTML = XMLHttpRequestObject.responseText;
  }
}
function pedirDatos(){
  //XMLHttpRequestObject.open("GET", '../json/Questions.json');
  //$array=json_decode($data);
	XMLHttpRequestObject.open("GET", "../php/verDatosJson.php",true);
  //XMLHttpRequestObject.send();
  XMLHttpRequestObject.send(null);
}