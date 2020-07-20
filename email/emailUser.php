<?php
include('../environment/environment.php');
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['email'], $_POST['nome'], $_POST['assunto'], $_POST['message'])) {
  // Load Composer's autoloader
  require '../vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);

  $email = $_POST['email'];
  $nome = $_POST['nome'];
  $assunto = $_POST['assunto'];
  $message = $_POST['message'];
  
  try {
      //Server settings
//      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $mail->isSMTP();                                              // Send using SMTP
      $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );                 
      $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = $email_project;                   // SMTP username
      $mail->Password   = $email_pass;                           // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
  
      //Recipients
      $mail->setFrom($email_project, 'Equipa JJ');
      $mail->addAddress($email, $nome);                           // Add a recipient
  
      // Content
      $mail->isHTML(true);                                        // Set email format to HTML
      $mail->Subject = $assunto;
      $mail->Body    = $message;
//    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();
      echo "<script>alert('A mensagem foi enviada com sucesso!')
      window.location.href = '../index.php?p=Home'; 
      </script>";
  } catch (Exception $e) {
      echo "<script></script>";
      header('Location: ../index.php?p=Contacto');
      echo "<script>alert('A mensagem não pode ser enviada!' ERRO - {$mail->ErrorInfo});
      window.location.href = '../index.php?p=Contacto'; 
      </script>";
  }
} else {
  header('Location: ../index.php');
  exit;
}