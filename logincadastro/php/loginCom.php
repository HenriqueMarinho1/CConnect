<?php

include'../../configuracao/conexao.php';
header('Content-Type: application/json');

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = $conn->prepare('SELECT * FROM moradia WHERE email = :email AND senha = :senha');
$sql->bindvalue(':email', $email);
$sql->bindvalue(':senha', $senha);
$sql->execute();

if($sql->rowCount() > 0){
    while($dado = $sql->fetch()){
    $email = $dado['email'];
    $senha = $dado['senha'];
    $cep = $dado['cep'];
    $json[] = array('email'=> $email, 'senha'=> $senha, 'cep'=> $cep);
}echo json_encode($json, JSON_PRETTY_PRINT);
}else{
    echo '[{"status": "error"}]';
}