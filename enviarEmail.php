<?php
function email($email, $senha){

    require_once('phpmailer.php'); //chama a classe de onde você a colocou.
    require_once('smtp.php'); //chama a classe de onde você a colocou.
    require_once('pop3.php'); //chama a classe de onde você a colocou.


    $mail = new phpmailer\PHPMailer\PHPMailer(); // instancia a classe PHPMailer

    $mail->IsSMTP();

    //configuração do gmail
    $mail->Port = '465'; //porta usada pelo gmail.
    $mail->Host = 'smtp.gmail.com'; 
    $mail->IsHTML(true); 
    $mail->Mailer = 'smtp'; 
    $mail->SMTPSecure = 'ssl';

    //configuração do usuário do gmail
    $mail->SMTPAuth = true; 
    $mail->Username = 'relembrarsenha@gmail.com'; // usuario gmail.   
    $mail->Password = 'relembrarsenha@2019'; // senha do email.

    $mail->SingleTo = true; 

    // configuração do email a ver enviado.
    $mail->From = "$email"; 
    $mail->FromName = "SisCoEst -- Senha --"; 

    $mail->addAddress("$email");//Email para encaminhar a senha cadastrada no banco

    $mail->Subject = "Relembrando senha."; //Aqui vai o assunto do email, pode vim atraves de variavel.
    $comentario = "Sabemos que imprevistos acontecem, conforme solicitado seguem os dados para logar no sistema.\n E-mail: $email\nSenha: $senha";//Aqui vai a mensagem, que tambem pode vim por variavel.;
    $mail->Body = nl2br($comentario);


    if(!$mail->Send()){
        return "erro";
        //echo "Erro ao enviar Email, informe o administrador!:\n" . $mail->ErrorInfo;
    }else{
        return "ok";
        //echo "<script>alert('Email enviado com Sucesso!);</script>";
    }

}
?>
