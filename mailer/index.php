<?php
  if(isset($_POST['submit'])) {

    require 'PHPMailerAutoload.php';
    require 'credential.php';
    $mail = new PHPMailer(true);
    $mail->Mailer = "smtp";
    $mail->SMTPDebug = 4;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = "serwer2028708.home.pl ";  // Specify main and backup SMTP servers
    $mail->SMTPAuth = TRUE;                               // Enable SMTP authentication
    $mail->Username = 'kontakt@aoia.com.pl';                 // SMTP username
    $mail->Password = "!ammn!A!wb!94";                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    $mail->setFrom('kontakt@aoia.com.pl', 'Kontakt AOIA');
    $mail->addAddress('kontakt@aoia.com.pl', 'Kontakt AOIA'); 
    $mail->addReplyTo($_POST['email']); ///!!!!!!!!!!!!! mozliwy blad
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'New AOIA client request!';
    $content = "<b>You've received an email from</b>".$_POST['name']."<b>:</b>"."\n".$_POST['message']."\n".$_POST["email"];
    $mail->AltBody = $_POST['message'];

    $mail->MsgHTML($content); 
    if(!$mail->Send()) {
      echo "Error while sending Email.";
      // var_dump($mail);
      header('Location: thank_you.html'); 
    } else {
      echo'<script>window.location.href="https://www.aoia.com.pl/thank_you.html"; </script>';
    }
  }

