<?php
include("../sis.php");
include("$path/libs/conexion.php");
include("$path/libs/PHPMailer/PHPMailerAutoload.php");
/*Datos de quien envia*/
$objUsuarioActual = new poolConnecion();
$Sql="Select Nombre,Apellidos,Email From Usuarios Where Id='$_POST[idusuario]'";
$con=$objUsuarioActual->ConexionSQLNorthwind();
$RSet=$objUsuarioActual->QuerySQLNorthwind($Sql,$con);
 while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
       {
              $NombreUsuario = "$fila[Nombre] $fila[Apellidos]";
              $EmailUsuario="$fila[Email]";
        }
 $objUsuarioActual->CerrarSQLNorthwind($RSet,$con);
/*Datos Factura*/
function avatar($Id)
{
      #Obtenemos el avatar
      $objAvatar = new poolConnecion();
      $Sql="SELECT [Avatar] FROM [Northwind].[dbo].[Usuarios] Where Id='$Id'";
      $con=$objAvatar->ConexionSQLNorthwind();
      $RSet=$objAvatar->QuerySQLNorthwind($Sql,$con);
       while($filaA=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
             {
                $Av = $filaA[Avatar];
             }
      if (!empty($Av))
      {

      }
      else
       {
        $Av = "http://187.188.109.47:82/administracion/img/av1.png";
      }
      return $Av;
}
$objTimeLine = new poolConnecion();
$Sql="SELECT Mensaje,Usuario,IdUsuario,Convert(varchar(11),[Fecha],11) As Fechas FROM [SAP].[dbo].[AACobranzaBlog] Where IdFacturacion='$_GET[IdFacturacion]' order by Id desc";
$con=$objTimeLine->ConexionSQLSAP();
$RSet=$objTimeLine->QuerySQLSAP($Sql,$con);
 while($fila=sqlsrv_fetch_array($RSet,SQLSRV_FETCH_ASSOC))
       {

          $Mensaje = $fila[Mensaje];
          $Usuario = $fila[Usuario];
          $Fecha = $fila[Fechas];
          $IdUsuario = $fila[IdUsuario];
          $Avatar = avatar($IdUsuario);
          $TimeLine .= "<tr>
            <td align=\"center\" valign=\"top\" style=\"border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%;\" class=\"list-item\"><table align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: inherit; margin: 0; padding: 0; border-collapse: collapse; border-spacing: 0;\">
                <!-- LIST ITEM IMAGE -->
                <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 -->
                <td align=\"left\" valign=\"top\" style=\"border-collapse: collapse; border-spacing: 0;
                  padding-top: 30px;
                  padding-right: 20px;\"><img
                border=\"0\" vspace=\"0\" hspace=\"0\" style=\"padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;
                  color: #000000;\"
                  src=\"$Avatar\"
                  alt=\"H\" title=\"Highly compatible\"
                  width=\"50\" height=\"50\"></td>
                <!-- LIST ITEM TEXT -->
                <!-- Set text color and font family (\"sans-serif\" or \"Georgia, serif\"). Duplicate all text styles in links, including line-height -->
                <td align=\"left\" valign=\"top\" style=\"font-size: 17px; font-weight: 400; line-height: 160%; border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
                  padding-top: 25px;
                  color: #000000;
                  font-family: sans-serif;\" class=\"paragraph\">
                    <b style=\"color: #333333;\">$Usuario $Fecha</b><br/>
                    $Mensaje
                </td></tr>";
       }
 $objTimeLine->CerrarSQLSAP($RSet,$con);

 echo $mjs = "<html xmlns=\"http://www.w3.org/1999/xhtml\">
 <head>
  <meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0;\">
    <meta name=\"format-detection\" content=\"telephone=no\"/>
  <style>
 /* Reset styles */
 body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
 body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
 table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
 img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
 #outlook a { padding: 0; }
 .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
 .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }

 /* Rounded corners for advanced mail clients only */
 @media all and (min-width: 560px) {
  .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px;}
 }

 /* Set color for auto links (addresses, dates, etc.) */
 a, a:hover {
  color: #127DB3;
 }
 .footer a, .footer a:hover {
  color: #999999;
 }

    </style>

  <!-- MESSAGE SUBJECT -->
  <title>Notificaciones Forta</title>

 </head>

 <!-- BODY -->
 <!-- Set message background color (twice) and text color (twice) -->
 <body topmargin=\"0\" rightmargin=\"0\" bottommargin=\"0\" leftmargin=\"0\" marginwidth=\"0\" marginheight=\"0\" width=\"100%\" style=\"border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
  background-color: #F0F0F0;
  color: #000000;\"
  bgcolor=\"#F0F0F0\"
  text=\"#000000\">
 <!-- SECTION / BACKGROUND -->
 <!-- Set message background color one again -->
 <table width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;\" class=\"background\"><tr><td align=\"center\" valign=\"top\" style=\"border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;\"
  bgcolor=\"#F0F0F0\">
 <!-- WRAPPER -->
 <!-- Set wrapper width (twice) -->
 <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\"
  width=\"560\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
  max-width: 560px;\" class=\"wrapper\">

  <tr>
    <td align=\"center\" valign=\"top\" style=\"border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
      padding-top: 20px;
      padding-bottom: 20px;\">
      <!-- PREHEADER -->
      <!-- Set text color to background color -->
    </td>
  </tr>

 <!-- End of WRAPPER -->
 </table>

 <!-- WRAPPER / CONTEINER -->
 <!-- Set conteiner background color -->
 <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\"
  bgcolor=\"#FFFFFF\"
  width=\"560\" style=\"border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
  max-width: 560px;\" class=\"container\">

  <!-- HEADER -->
  <!-- Set text color and font family (\"sans-serif\" or \"Georgia, serif\") -->
  <tr>
    <td align=\"center\" valign=\"top\" style=\"border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
      padding-top: 25px;
      color: #000000;
      font-family: sans-serif;\" class=\"header\">
        $_POST[Factura]
    </td>
  </tr>
  <!-- LINE -->
  <!-- Set line color -->
  <tr>
    <td align=\"center\" valign=\"top\" style=\"border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
      padding-top: 25px;\" class=\"line\"><hr
      color=\"#E0E0E0\" align=\"center\" width=\"100%\" size=\"1\" noshade style=\"margin: 0; padding: 0;\" />
    </td>
  </tr>
  $TimeLine
    </table>
  </td>
  </tr>

  <!-- LINE -->
  <!-- Set line color -->
  <tr>
    <td align=\"center\" valign=\"top\" style=\"border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
      padding-top: 25px;\" class=\"line\"><hr
      color=\"#E0E0E0\" align=\"center\" width=\"100%\" size=\"1\" noshade style=\"margin: 0; padding: 0;\" />
    </td>
  </tr>
 <!-- End of WRAPPER -->
 </table>

    </td>
  </tr>


 <!-- End of WRAPPER -->
 </table>

 <!-- End of SECTION / BACKGROUND -->
 </td></tr></table>

 </body>
 </html>";


 $mail = new PHPMailer;
 //Tell PHPMailer to use SMTP
 $mail->isSMTP();
 //Enable SMTP debugging
 // 0 = off (for production use)
 // 1 = client messages
 // 2 = client and server messages
 $mail->SMTPDebug = 0;
 //Ask for HTML-friendly debug output
 $mail->Debugoutput = 'html';
 //Set the hostname of the mail server
 //Set the SMTP port number - likely to be 25, 465 or 587
 $mail->SMTPSecure = 'tls';
 $mail->Host = 'smtp.1and1.mx';
 $mail->Port = 587;
 //Whether to use SMTP authentication
 $mail->SMTPAuth = true;
 //Username to use for SMTP authentication
 $mail->Username = "ventas@fortaingenieria.mx";
 //Password to use for SMTP authentication
 $mail->Password = "fortaMX010205**";
 //Set who the message is to be sent from
 $mail->setFrom($EmailUsuario, $NombreUsuario);
 //Set an alternative reply-to address
 $mail->addReplyTo($EmailUsuario,$NombreUsuario);
 //Set who the message is to be sent to
 $mail->addAddress($_POST[email],'Armando Aguilar L.');
 //Set the subject line
 $mail->Subject = $_POST[Factura];
 //Read an HTML message body from an external file, convert referenced images to embedded,
 //convert HTML into a basic plain-text alternative body
 $mail->msgHTML($mjs);
 //send the message, check for errors
 /*if (!$mail->send())
  {
     echo "Mailer Error: " . $mail->ErrorInfo;
   }
else
  {
     echo "Message sent!";
   }*/

  ?>
