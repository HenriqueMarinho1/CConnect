<?php

include'../../configuracao/conexao.php';
header('Content-Type: application/json');

$email = $_POST['user'];
$senha = $_POST['password'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$tipo = $_POST['selectedOption'];

$insert = $conn->prepare('INSERT INTO moradia (nome, email, senha, telefone, tipo) VALUE (:nome, :email, :senha, :telefone, :tipo)');
$insert->bindvalue(':email', $email);
$insert->bindValue(':senha', $senha);
$insert->bindValue(':nome', $nome);
$insert->bindValue(':telefone', $telefone);
$insert->bindValue(':cep', $cep);
$insert->bindValue(':tipo', $tipo);
$insert->execute();

if($insert){
    $get = $conn->prepare('SELECT * FROM moradia WHERE email = :email');
    $get->bindvalue(':email', $email);
    $get->execute();
    if($get->rowCount() > 0){
        while($dado = $get->fetch()){
            $email = $dado['email'];
            $senha = $dado['senha'];
            $nome = $dado['nome'];
            $telefone = $dado['telefone'];
            $cep = $dado['cep'];
            $tipo = $dado['tipo'];
            $json[]= array('email'=> $email, 'senha'=> $senha, 'nome'=> $nome, 'telefone'=> $telefone, 'tipo'=> $tipo);
        }
        echo json_encode($json, JSON_PRETTY_PRINT);
    }else{
        echo '[{"status": "error"}]';
    }
}else{
    echo '[{"status": "error"}]';
}