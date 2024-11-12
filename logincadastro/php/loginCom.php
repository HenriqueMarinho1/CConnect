<?php

include'../../configuracao/conexao.php';
header('Content-Type: application/json');
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = $conn->prepare('SELECT * FROM moradia WHERE email = :email AND senha = :senha');
$sql->bindvalue(':email', $email);
$sql->bindvalue(':senha', $senha);
$sql->execute();

if($sql->rowCount() > 0){
    while($dado = $sql->fetch()){
    $email = $dado['email'];
    $id = $dado['id'];
    $senha = $dado['senha'];
    $cep = $dado['cep'];
    $nome = $dado['nome'];
    $_SESSION['usuario'] = [
        'email' => $dado['email'],
        'senha' => $dado['senha']
    ];
    $json[] = array('email'=> $email, 'senha'=> $senha, 'cep'=> $cep, 'nome' => $nome, 'id' => $id);
}echo json_encode($json, JSON_PRETTY_PRINT);
}else{
    echo '[{"status": "error"}]';
}