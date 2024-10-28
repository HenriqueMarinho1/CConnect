<?php

include'../../configuracao/conexao.php';
header('Content-Type: application/json');

@$nome = $_POST['nome'];
@$email = $_POST['user'];
@$senha = $_POST['password'];
@$telefone = $_POST['telefone'];

@$sql = $conn->prepare('INSERT INTO usuarios (nome_completo, email, senha, telefone) VALUE (:nome, :email, :senha, :telefone)');
@$sql->bindvalue(':nome', $nome);
$sql->bindvalue(':email', $email);
$sql->bindvalue(':senha', $senha);
$sql->bindvalue(':telefone', $telefone);
$sql->execute();

if($sql->rowCount() > 0){
    while($dado = $sql->fetch()){
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