<?php

include'../../configuracao/conexao.php';
header('Content-Type: application/json');

$codigo = $_POST['codigo'];
$email = $_POST['email'];

$sql = $conn->prepare('SELECT * FROM email_logs WHERE receptor = :email AND codigo = :codigo');
$sql->bindValue(':email', $email);
$sql->bindValue(':codigo', $codigo);
$sql->execute();

if($sql->rowCount() > 0){
    while($dado = $sql->fetch()){
        $email = $dado['receptor'];
        $codigo = $dado['codigo'];
        $json[]= array('receptor' => $email, 'codigo'=> $codigo);
    }echo json_encode($json, JSON_PRETTY_PRINT);
    $delete = $conn->prepare('DELETE * FROM email_logs WHERE receptor = :email AND codigo = :codigo');
    $delete->bindValue(':email', $email);
    $delete->bindValue(':codigo', $codigo);
    $delete->execute();
}else{
    echo '[{"status": "error"}]';
}