<meta charset="utf-8">
<?php
include 'conexion.php';
$tabla=$mysqli->query("select idfechas FROM semana where activado=1");
$cursoActivo=$tabla->fetch_array()[0];
$bandera=$_POST["bandera"];
//var_dump ($op1);
//echo $nombre." ".$apellidoP." ".$apellidoM." ".$institucion." ".$_POST["rol"];

if($bandera=="none"){    
$nombre = ucwords($_POST["Nombre"]);
$apellidoP = ucwords($_POST["ApellidoP"]);
$apellidoM = ucwords($_POST["ApellidoM"]);
$institucion = ucwords($_POST["Institucion"]);
$rol = $_POST["rol"];
    if(isset($_POST["estudiante"])){
        $estudiante=$_POST["estudiante"];
        }else{
$estudiante="0";
}
if(isset($_POST["becado"])){   
$becado=$_POST["becado"];
}else{
$becado="0";
}
    
if($estudiante=="1"){
$estudiante="true";
}else{
$estudiante="false";
}
    
if($becado=="1"){
$becado="true";
}else{
$becado="false";
}
    
if(isset($_POST["option1"])){    
    $op1 = $_POST["option1"];
}else{
    $op1="";
}
$email=$_POST["email"];
echo $bandera;
    

//echo '&eacute;xito... ' . $mysqli->host_info . "<br>";
$tabla=$mysqli->query("select max(id) FROM asistente");
//printf($tabla->num_rows);
if ($tabla->num_rows > 0) {
    // output data of each row
    while($row = $tabla->fetch_array()) {
       $id=$row[0]+1;
    }
} else {
    $id=1;
}
$folio=substr($nombre,0,1);
$folio.=substr($apellidoP,0,1);
$folio.=substr($apellidoM,0,1);
$folio.="-";
$folio.=rand(1000,9999);
$folio.="-";
$folio.=$id;

$nombre=$mysqli->real_escape_string($nombre);
$apellidoP=$mysqli->real_escape_string($apellidoP);
$apellidoM=$mysqli->real_escape_string($apellidoM);
$institucion=$mysqli->real_escape_string($institucion);
$rol=$mysqli->real_escape_string($rol);
$folio=$mysqli->real_escape_string($folio);
$email=$mysqli->real_escape_string($email);
 
    if(empty($_FILES["rutaIMGcred"]['name'])){
            $target_file="null";
        }
        else{
            include "uploadCred.php"; 
            
        }

//la "fecha" debe ser la semana que se encuentre activa!!.. Cambiar (YEAR(now)). (GRUPAL)
$tabla=$mysqli->query("insert into asistente (Nombre,Apellido_Paterno,Apellido_Materno,Institucion,Tipo,folio,email,verificacion,rutaImg,fecha,estudiante,becado,factura,rutaImgCredencial,semana) values('".htmlentities($nombre)."','".htmlentities($apellidoP)."','".htmlentities($apellidoM)."','".htmlentities($institucion)."','".$rol."','".$folio."','".htmlentities($email)."',0,'null',YEAR(now()),'".$estudiante."','".$becado."',0,'".$target_file."','".$cursoActivo."')");

//obtener el ID del usuario despues de haber sido insertado (GRUPAL). 
//NOTA. Se considera mas adecuado: Insertar al usuario, obtener Id, actualizar datos adicionales (folio, cursos, etc.). (GRUPAL)
//NOTA. Asegurar que los cursos esten asociados a la semana correspondiente activada (GRUPAL). solucion. Agregar campo en la tabla de curso_asistente para la semana activada del curso. Ademas, se debe asociar el curso con la semana que corresponde.


foreach ($op1 as $i){
$tabla=$mysqli->query("insert into curso_asistente (nomCurso, idUsuario) values ('".$i."','".$id."')");
//$table=$mysqli->query("update cursos set Cupo = Cupo-1 where idCurso ='".$i."'");
} 

$mysqli->close();
include "config.php";
require 'class.phpmailer.php';


   
    $mail = new PHPMailer();
    //Luego tenemos que iniciar la validaci&oacute;n por SMTP:
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = $host; // SMTP a utilizar. Por ej. smtp.elserver.com
    $mail->Username = $Username; // Correo completo a utilizar
    $mail->Password = $password; // Contrase&ntilde;a
    $mail->Port = $port; // Puerto a utilizar
    $mail->SMTPSecure = $smtpSecure;
    //Con estas pocas l&iacute;neas iniciamos una conexi&oacute;n con el SMTP. Lo que ahora deber&iacute;amos hacer, es configurar el mensaje a enviar, el //From, etc.
    //$mail->From = "adan.sandez21@live.com.mx"; // Desde donde enviamos (Para mostrar)
    $mail->FromName = $fromName;

    //Estas dos l&iacute;neas, cumplir&iacute;an la funci&oacute;n de encabezado (En mail() usado de esta forma: “From: Nombre <correo@dominio.com>”) de //correo.
    $mail->AddAddress($email); // Esta es la direcci&oacute;n a donde enviamos
    $mail->AddAddress("adrianvo@mat.uson.mx"); // Esta es la direcci&oacute;n a donde enviamos (copia)
    $mail->IsHTML(true); // El correo se env&iacute;a como HTML
    $mail->Subject = "Registro a la SNIDM - Universidad de Sonora"; // Este es el titulo del email.
    $body = "<strong> Hola ".htmlentities($nombre).",<br><br>
    Recuerda que a&uacute;n no completas tu inscripci&oacute;n a la Semana Nacional de Investigaci&oacute;n y Docencia en Matem&aacute;ticas. 
    <br>Debes enviar tu comprobante de pago y esperar el correo de confirmaci&oacute;n por parte del Comit&eacute; Organizador.</strong><br><br>";
    
    $body .= "<strong>Datos Bancarios para realizar el pago:</strong><br>";
    $body .= "<strong>Nombre: </strong> Universidad de Sonora<br>";
    $body .= "<strong>N&uacute;mero de cuenta</strong>: 6-550-17-89-3-98<br>";
    $body .= "<strong>Banco</strong>: Santander <br>";
    $body .= "<strong>CLABE interbancaria</strong>: 014760655017893981<br><br>";

    
    $body .= "<strong>Datos De registro:</strong><br>";
    $body .= "<strong>Folio</strong>:".$folio."<br>";
    $body .= "<strong>Nombre:</strong>".htmlentities($nombre)." ".htmlentities($apellidoP)." ".htmlentities($apellidoM)."<br>";
    $body .= "<strong>Registrado como:</strong>".$rol."<br>";
    $body .= "<strong>Instituci&oacute;n</strong>:".htmlentities($institucion)."<br><br>";    
    
    $body .= "<span>Para cualquier consulta o correci&oacute;n comunicarse a semana@mat.uson.mx</span><br><br>";
    
    $body .= "<span style='color:rgb(68,68,68);font-size:22px;line-height:31px;' >Considera el medio ambiente antes de imprimir este correo</span><br><br><br><br>";

    $body .="<b style='line-height:26px;font-weight:bold'>AVISO DE CONFIDENCIALIDAD Y ALCANCE LEGAL</b><br>"; 

    $body .= "<hr color='#214984' style='line-height:31px'>";

    $body .= "<p style='font-size:10px;'>Este correo electr&oacute;nico es confidencial y para uso exclusivo de la(s) persona(s) a quien(es) se dirige. Si el lector de esta transmisi&oacute;n electr&oacute;nica no es el destinatario, se le notifica que cualquier distribuci&oacute;n o copia de la misma est&aacute; estrictamente prohibida. Si ha recibido este correo por error le solicitamos notificar inmediatamente a la persona que lo envi&oacute; y borrarlo definitivamente de su sistema.</p>

<p style='font-size:10px;'>Los correos electr&oacute;nicos no son necesariamente seguros, por lo que el remitente no ser&aacute; responsable en ning&uacute;n momento por los cambios que se sufra en su transferencia. A&uacute;n cuando se hayan revisado los archivos adjuntos existe siempre la posibilidad de que puedan contener virus o c&oacute;digos maliciosos que da&ntilde;en los sistemas del destinatario, por lo que tampoco se asume ninguna responsabilidad en caso de mutaciones en su transferencia y ser&aacute; siempre necesario revisarlos antes de abrirlos.</p>

<p style='font-size:10px;'>Las opiniones expresadas en este correo electr&oacute;nico deber&aacute;n ser confirmadas por escrito y firmadas por el remitente para tener validez legal, por lo que el correo electr&oacute;nico no es el medio apropiado para emitir opiniones o recomendaciones formales.</p><br>";

$body .="<b style='line-height:26px;font-weight:bold'>CONFIDENTIALITY AND LEGAL NOTICE</b><br>";    
   
$body .="<p style='font-size:10px;'>This electronic mail transmission is confidential, may be privileged and should be read or retained only by the intended recipient. If the reader of this transmission is not the intended recipient, you are hereby notified that any distribution or copying hereof is strictly prohibited. If you have received this transmission in error, please immediately notify the sender and erase it from your system.
</p>
<p style='font-size:10px;'>E-mail as are not necessarily secure, for which reason the sender shall not be responsible at any moment for any changes suffered during its transfer. Also, the files attached to this e-mail may contain viruses that could harm the systems of the recipient, even though it has been reviewed for viruses. The sender will not be responsible for any distortions that occur during its transfer, for which reason they must be reviewed before they are opened.</p>
<p style='font-size:10px;'>The opinions expressed in this email must be confirmed in writing and signed by the sender to have legal validity, so the email is not the appropriate mean to express opinions or formal recommendations.</p>";    
        
        
    $mail->Body = $body; // Mensaje a enviar
    $exito = $mail->Send(); // Env&iacute;a el correo.

    //Tambi&eacute;n podr&iacute;amos agregar simples verificaciones para saber si se envi&oacute;:
    if($exito){
        echo true;
        echo "Se envioF";
    }else{
        echo $mail->ErrorInfo;
    }

header("Location:succes.php?folio=".$folio);

/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
}
else{
$fact_nombre=$_POST["fact_nombre"];
$fact_calle=$_POST["fact_calle"];
$fact_numero=$_POST["fact_numero"];
$fact_colonia=$_POST["fact_colonia"];
$fact_cp=$_POST["fact_cp"];
$fact_municipio=$_POST["fact_municipio"];
$fact_estado=$_POST["fact_estado"];
$fact_rfc=$_POST["fact_rfc"];
$fact_email=$_POST["fact_email"];
$fact_pais=$_POST["fact_pais"];

$nombre = ucwords($_POST["Nombre"]);
$apellidoP = ucwords($_POST["ApellidoP"]);
$apellidoM = ucwords($_POST["ApellidoM"]);
$institucion = ucwords($_POST["Institucion"]);
$rol = $_POST["rol"];
    if(isset($_POST["estudiante"])){
        $estudiante=$_POST["estudiante"];
        }else{
$estudiante="0";
}
if(isset($_POST["becado"])){   
$becado=$_POST["becado"];
}else{
$becado="0";
}
    
if($estudiante=="1"){
$estudiante="true";
}else{
$estudiante="false";
}
    
if($becado=="1"){
$becado="true";
}else{
$becado="false";
}
    
if(isset($_POST["option1"])){    
    $op1 = $_POST["option1"];
}else{
    $op1="";
}
$email=$_POST["email"];
echo $bandera;
    

//echo '&eacute;xito... ' . $mysqli->host_info . "<br>";
$tabla=$mysqli->query("select max(id) FROM asistente");
//printf($tabla->num_rows);
if ($tabla->num_rows > 0) {
    // output data of each row
    while($row = $tabla->fetch_array()) {
       $id=$row[0]+1;
    }
} else {
    $id=1;
}
$folio=substr($nombre,0,1);
$folio.=substr($apellidoP,0,1);
$folio.=substr($apellidoM,0,1);
$folio.="-";
$folio.=rand(1000,9999);
$folio.="-";
$folio.=$id;

$nombre=$mysqli->real_escape_string($nombre);
$apellidoP=$mysqli->real_escape_string($apellidoP);
$apellidoM=$mysqli->real_escape_string($apellidoM);
$institucion=$mysqli->real_escape_string($institucion);
$rol=$mysqli->real_escape_string($rol);
$folio=$mysqli->real_escape_string($folio);
$email=$mysqli->real_escape_string($email);
 
    if(empty($_FILES["rutaIMGcred"]['name'])){
            $target_file="null";
        }
        else{
            include "uploadCred.php"; 
            
        }

$tabla=$mysqli->query("insert into asistente (Nombre,Apellido_Paterno,Apellido_Materno,Institucion,Tipo,folio,email,verificacion,rutaImg,fecha,estudiante,becado,factura,rutaImgCredencial,semana) values('".htmlentities($nombre)."','".htmlentities($apellidoP)."','".htmlentities($apellidoM)."','".htmlentities($institucion)."','".$rol."','".$folio."','".htmlentities($email)."',0,'null',YEAR(now()),'".$estudiante."','".$becado."',1,'".$target_file."','".$cursoActivo."')");

foreach ($op1 as $i){
$tabla=$mysqli->query("insert into curso_asistente (nomCurso, idUsuario) values ('".$i."','".$id."')");
//$table=$mysqli->query("update cursos set Cupo = Cupo-1 where idCurso ='".$i."'");
} 


$fact_nombre=$mysqli->real_escape_string($fact_nombre);
$fact_calle=$mysqli->real_escape_string($fact_calle);
$fact_numero=$mysqli->real_escape_string($fact_numero);
$fact_colonia=$mysqli->real_escape_string($fact_colonia);
$fact_cp=$mysqli->real_escape_string($fact_cp);
$fact_municipio=$mysqli->real_escape_string($fact_municipio);
$fact_estado=$mysqli->real_escape_string($fact_estado);
$fact_rfc=$mysqli->real_escape_string($fact_rfc);
$fact_email=$mysqli->real_escape_string($fact_email);    
$fact_pais=$mysqli->real_escape_string($fact_pais);
    
if(isset($_POST["desglosado"])){    
$fact_desglosado=$_POST["desglosado"];
}else{
$fact_desglosado="0";
}
    
if($fact_desglosado=="1"){
$fact_desglosado="Si";
}else{
$fact_desglosado="No";
}    
    
$tabla=$mysqli->query("insert into factura (Nombre,calle,numero,colonia,cp,municipio,estado,RFC,idUsuario,FactEmail,pais,iva_desglosado,verificacion) values ('".htmlentities($fact_nombre)."','".htmlentities($fact_calle)."','".htmlentities($fact_numero)."','".htmlentities($fact_colonia)."','".htmlentities($fact_cp)."','".htmlentities($fact_municipio)."','".htmlentities($fact_estado)."','".htmlentities($fact_rfc)."','".htmlentities($id)."','".htmlentities($fact_email)."','".htmlentities($fact_pais)."','".$fact_desglosado."',0)");
$mysqli->close();

    
include "config.php";
require 'class.phpmailer.php';


   
    $mail = new PHPMailer();
    //Luego tenemos que iniciar la validaci&oacute;n por SMTP:
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = $host; // SMTP a utilizar. Por ej. smtp.elserver.com
    $mail->Username = $Username; // Correo completo a utilizar
    $mail->Password = $password; // Contrase&ntilde;a
    $mail->Port = $port; // Puerto a utilizar
    $mail->SMTPSecure = $smtpSecure;
    //Con estas pocas l&iacute;neas iniciamos una conexi&oacute;n con el SMTP. Lo que ahora deber&iacute;amos hacer, es configurar el mensaje a enviar, el //From, etc.
    //$mail->From = "adan.sandez21@live.com.mx"; // Desde donde enviamos (Para mostrar)
    $mail->FromName = $fromName;

    //Estas dos l&iacute;neas, cumplir&iacute;an la funci&oacute;n de encabezado (En mail() usado de esta forma: “From: Nombre <correo@dominio.com>”) de //correo.
    $mail->AddAddress($email); // Esta es la direcci&oacute;n a donde enviamos
    $mail->IsHTML(true); // El correo se env&iacute;a como HTML
    $mail->Subject = "Registro a la SNIDM - Universidad de Sonora"; // Este es el titulo del email.
    $body = "<strong> Hola ".htmlentities($nombre).",<br><br>
    Recuerda que a&uacute;n no completas tu inscripci&oacute;n a la Semana Nacional de Investigaci&oacute;n y Docencia en Matem&aacute;ticas. 
    <br>Debes enviar tu comprobante de pago y esperar el correo de confirmaci&oacute;n por parte del Comit&eacute; Organizador.</strong><br><br>";
    
    $body .= "<strong>Datos Bancarios para realizar el pago:</strong><br>";
    $body .= "<strong>Nombre: </strong> Universidad de Sonora<br>";
    $body .= "<strong>N&uacute;mero de cuenta</strong>: 6-550-17-89-3-98<br>";
    $body .= "<strong>Banco</strong>: Santander <br>";
    $body .= "<strong>CLABE interbancaria</strong>: 014760655017893981<br><br>";

    
    $body .= "<strong>Datos De registro:</strong><br>";
    $body .= "<strong>Folio</strong>:".$folio."<br>";
    $body .= "<strong>Nombre:</strong>".htmlentities($nombre)." ".htmlentities($apellidoP)." ".htmlentities($apellidoM)."<br>";
    $body .= "<strong>Registrado como:</strong>".$rol."<br>";
    $body .= "<strong>Instituci&oacute;n</strong>:".htmlentities($institucion)."<br><br>";   
    
    
    $body .= "<strong>Datos De Facturaci&oacute;n:</strong><br>";
    $body .= "<strong>Nombre</strong>:".htmlentities($fact_nombre)."<br>";
    $body .= "<strong>Calle</strong>:".htmlentities($fact_calle)."<br>";
    $body .= "<strong>N&uacute;mero</strong>:".htmlentities($fact_numero)."<br>";    
    $body .= "<strong>Colonia</strong>:".htmlentities($fact_colonia)."<br>";
    $body .= "<strong>C.P.</strong>:".htmlentities($fact_cp)."<br>";
    $body .= "<strong>Municipio</strong>:".htmlentities($fact_municipio)."<br>";
    $body .= "<strong>Estado</strong>:".htmlentities($fact_estado)."<br>";
    $body .= "<strong>Pa&iacute;s</strong>:".htmlentities($fact_pais)."<br>";
    $body .= "<strong>R.F.C</strong>:".htmlentities($fact_rfc)."<br>";
    $body .= "<strong>Iva desglosado: </strong>".htmlentities($fact_desglosado)."<br>";
    $body .= "<strong>E-mail</strong>:".htmlentities($fact_email)."<br><br>";
    $body .= "<span>Para cualquier consulta o correcion comunicarse a semana@mat.uson.mx</span><br><br><br><br>";
    
    $body .= "<span style='color:rgb(68,68,68);font-size:22px;line-height:31px;' >Considera el medio ambiente antes de imprimir este correo</span><br><br><br><br>";

    $body .="<b style='line-height:26px;font-weight:bold'>AVISO DE CONFIDENCIALIDAD Y ALCANCE LEGAL</b><br>"; 

    $body .= "<hr color='#214984' style='line-height:31px'>";

    $body .= "<p style='font-size:10px;'>Este correo electr&oacute;nico es confidencial y para uso exclusivo de la(s) persona(s) a quien(es) se dirige. Si el lector de esta transmisi&oacute;n electr&oacute;nica no es el destinatario, se le notifica que cualquier distribuci&oacute;n o copia de la misma est&aacute; estrictamente prohibida. Si ha recibido este correo por error le solicitamos notificar inmediatamente a la persona que lo envi&oacute; y borrarlo definitivamente de su sistema.</p>

<p style='font-size:10px;'>Los correos electr&oacute;nicos no son necesariamente seguros, por lo que el remitente no ser&aacute; responsable en ning&uacute;n momento por los cambios que se sufra en su transferencia. A&uacute;n cuando se hayan revisado los archivos adjuntos existe siempre la posibilidad de que puedan contener virus o c&oacute;digos maliciosos que da&ntilde;en los sistemas del destinatario, por lo que tampoco se asume ninguna responsabilidad en caso de mutaciones en su transferencia y ser&aacute; siempre necesario revisarlos antes de abrirlos.</p>

<p style='font-size:10px;'>Las opiniones expresadas en este correo electr&oacute;nico deber&aacute;n ser confirmadas por escrito y firmadas por el remitente para tener validez legal, por lo que el correo electr&oacute;nico no es el medio apropiado para emitir opiniones o recomendaciones formales.</p><br>";

$body .="<b style='line-height:26px;font-weight:bold'>CONFIDENTIALITY AND LEGAL NOTICE</b><br>";    
   
$body .="<p style='font-size:10px;'>This electronic mail transmission is confidential, may be privileged and should be read or retained only by the intended recipient. If the reader of this transmission is not the intended recipient, you are hereby notified that any distribution or copying hereof is strictly prohibited. If you have received this transmission in error, please immediately notify the sender and erase it from your system.
</p>
<p style='font-size:10px;'>E-mail as are not necessarily secure, for which reason the sender shall not be responsible at any moment for any changes suffered during its transfer. Also, the files attached to this e-mail may contain viruses that could harm the systems of the recipient, even though it has been reviewed for viruses. The sender will not be responsible for any distortions that occur during its transfer, for which reason they must be reviewed before they are opened.</p>
<p style='font-size:10px;'>The opinions expressed in this email must be confirmed in writing and signed by the sender to have legal validity, so the email is not the appropriate mean to express opinions or formal recommendations.</p>";    
        
        
    $mail->Body = $body; // Mensaje a enviar
    $exito = $mail->Send(); // Env&iacute;a el correo.

    //Tambi&eacute;n podr&iacute;amos agregar simples verificaciones para saber si se envi&oacute;:
    if($exito){
        echo true;
        echo "Se envio";
    }else{
        echo $mail->ErrorInfo;
    }

header("Location:succes.php?folio=".$folio);

}

?>









