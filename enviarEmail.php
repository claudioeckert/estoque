<?php
function email(){

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
    // Primeiro buscar os dados no banco comparando o e-mail informado com os cadastrados no banco


    $mail->From = "claudio.j.mano@bol.com.br"; 
    $mail->FromName = "SisCoEst -- Senha --"; 

    $mail->addAddress("claudio.j.mano@bol.com.br"); // email do destinatario.

    $mail->Subject = "Aqui vai o assunto do email, pode vim atraves de variavel."; 
    $mail->Body = "Aqui vai a mensagem, que tambem pode vim por variavel.";


    if(!$mail->Send()){
        echo "Erro ao enviar Email:" . $mail->ErrorInfo;
    }else{
        echo "<script>alert('Email enviado com Sucesso!);</script>";
    }

}
?>
