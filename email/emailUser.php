<?php
include('../environment/environment.php');
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['email'], $_POST['password'], $_POST['user_name'])) {
  // Load Composer's autoloader
  require '../vendor/autoload.php';

  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);

  $email = $_POST['email'];
  $nome = $_POST['user_name'];
  $password = $_POST['password'];

  try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
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
    $mail->Username   = '';                   // SMTP username
    $mail->Password   = '';                           // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('', 'Equipa JJ');
    $mail->addAddress($email, $nome);                           // Add a recipient

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = 'Cadastro Petfinder';
    $mail->Body    = '<h2>Bem vindo ao Petfinder!</h2><p>Você foi cadastrado com sucesso!</p><ul><li>Email: $email</li><li>Senha: $password</li></ul>';
    //    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'has been send';
  } catch (Exception $e) {
    echo $e;
  }
} else {
  header('Location: ../index.php');
}
