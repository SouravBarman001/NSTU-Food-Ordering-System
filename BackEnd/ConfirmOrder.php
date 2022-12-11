<?php
  include('connect.php');
  session_start();
  $type=$_SESSION['type'];
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  
  function sendMail($email,$v_code){
      require ("../BackEnd/phpMailer/Exception.php");
      require ("../BackEnd/phpMailer/PHPMailer.php");
      require ("../BackEnd/phpMailer/SMTP.php");

      $mail= new PHPMailer(true);
      try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'piashpiash222@gmail.com';                     //SMTP username
        $mail->Password   = 'djsumdlwrnewvkrf';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('piashpiash222@gmail.com', 'NSTU FOS Confirmation');
        $mail->addAddress($email);     //Add a recipient
        $mail->From = 'piashpiash222@gmail.com';
        $mail->Sender = $email;

    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification';
        $mail->Body    = "Thanks for registration!<br>
        Click the link to verify your email address <a href='http://localhost/NSTU_FOS/Final_Project/BackEnd/verify.php?email=$email&v_code=$v_code'>Verify</a>
        ";
    
        $mail->send();
       return true;
    } catch (Exception $e) {
        return false;
    }
}
?>