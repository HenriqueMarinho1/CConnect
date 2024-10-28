<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

include '../../configuracao/conexao.php';
header('Content-Type: application/json');


$para = $_POST['email'];

$sql = $conn->prepare('SELECT * FROM usuarios WHERE email = :email');
$sql->bindValue(':email', $para);
$sql->execute();
$sql->fetch();
if($sql->rowCount()>0){
    $code = rand(100000, 999999);
    $titulo = 'Seu codigo de verificacao';
    $mensagem = 'Seu codigo de verificação é: ' . $code;

    $emailFrom = 'cconnectofc@gmail.com';
    $emailFromName = 'CCONNECT';
    $smtpUsername = 'cconnectofc@gmail.com';
    $smtpPassword = 'dejr exrh amzi byhs';
    $emailTo = $para;
    $emailToName = '';

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->SMTPDebug = 0; 
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUsername;
        $mail->Password = $smtpPassword;
        $mail->setFrom($emailFrom, $emailFromName);
        $mail->addAddress($emailTo, $emailToName);
        $mail->Subject = $titulo;
        $mail->msgHTML($mensagem);
        $mail->AltBody = 'HTML messaging not supported';

        if ($mail->send()) {
            try {
                
                $sql = $conn->prepare('INSERT INTO email_logs (receptor, titulo, mensagem, codigo) VALUES (:receptor, :titulo, :mensagem, :codigo)');
                $sql->bindValue(':receptor', $para);
                $sql->bindValue(':titulo', $titulo);
                $sql->bindValue(':mensagem', $mensagem);
                $sql->bindValue(':codigo', $code);
                $sql->execute();
                echo '[{"status": "sucesso"}]';
            } catch (Exception $e) {
                echo '[{"status": "error"}]';
            }
        } else {
            echo '[{"status": "error"}]';
        }
    } catch (Exception $e) {
        echo '[{"status": "error"}]';
}
}else{
    echo '[{"status": "error"}]';
}

