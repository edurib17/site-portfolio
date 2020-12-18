<?php

$name= utf8_decode($_POST['name']);
$email= utf8_decode($_POST['email']);
$message= utf8_decode($_POST['message']);

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();

//Configuraçoes do Servidor de e-mail
$mail->CharSet = 'UTF-8';
$mail->Host = "smtp.gmail.com";
$mail->Port = '587';
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = "true";
$mail->Username = "example@gmail.com";
$mail->Password = "senha";

//Configuração da messagem
$mail->setFrom($mail->Username,"Eduardo");//Remetente
$mail->addAddress("example@gmail.com");//Destinatário
$mail->Subject = "Fale Conosco"; //Assunto do Email

$conteudo_email = "
  Você Recebeu uma mensagem de $name
  E-mail: $email;
  <br><br>
   
  Mensagem:<br>
  $message
";

$mail->IsHTML(true);
$mail->Body = $conteudo_email;

if($mail->send()){
    header('location: ../index.php?status=sucesso');
} else{
    header('location: ../index.php?status=erro');
}

