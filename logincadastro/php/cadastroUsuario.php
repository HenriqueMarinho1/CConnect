<?php

include'../../configuracao/conexao.php';
header('Content-Type: application/json');

$nome = $_POST['nome'];
$email = $_POST['user'];
$senha = $_POST['password'];
$telefone = $_POST['telefone'];

$insert = $conn->prepare('INSERT INTO usuarios (nome_completo, email, senha, telefone) VALUE (:nome, :email, :senha, :telefone)');
$insert->bindvalue(':nome', $nome);
$insert->bindvalue(':email', $email);
$insert->bindvalue(':senha', $senha);
$insert->bindvalue(':telefone', $telefone);
$insert->execute();

if($insert){
    $get = $conn->prepare('Select * from usuarios WHERE email = :email');
    $get->bindvalue(':email', $email);
    $get->execute();
    if($get->rowCount() > 0){
        while($dado = $get->fetch()){
            $nome = $dado['nome_completo'];
            $email = $dado['email'];
            $senha = $dado['senha'];
            $telefone = $dado['telefone'];
            $json[]= array('nome_completo'=> $nome, 'email'=> $email, 'senha'=> $senha, 'telefone'=> $telefone);
        }
        echo json_encode ($json, JSON_PRETTY_PRINT);
    }else{
        echo '[{"status": "error"}]';
    }
}else{
    echo '[{"status": "error"}]';
}