<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

bdregis();
enviarRegistroExitoso();

function enviarRegistroExitoso(){
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['repass'])){
        //
        $name = $_POST['name'];
        $email = $_POST['email'];
    
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 2;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp-relay.sendinblue.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'oscar.caro1601@alumnos.ubiobio.cl';                     //SMTP username
            $mail->Password   = 'HXsSThzJLM5P0pxD';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('oscar.caro1601@alumnos.ubiobio.cl', 'COMUNIDAD EMPRENDE');
            $mail->addAddress('oscarecaroc@gmail.com', 'SERVER VALIDACION');     //Add a recipient
            $mail->addAddress($_POST['email']);
            //$mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('tomas.montecinos1601@alumnos.ubiobio.cl');
            $mail->addBCC('eduardo.hernandez1601@alumnos.ubiobio.cl');
        
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'TE HAS REGISTRADO EXITOSAMENTE A COMUNIDAD EMPRENDE';
            $mail->Body    = '<b>Nombre:</b>' . $name . '<br/>Correo:' . $email;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
            
    }
}

?>