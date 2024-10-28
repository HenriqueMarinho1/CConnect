<?php

include'../../configuracao/conexao.php';
header('Content-Type: application/json');

$email = $_POST['user'];
$senha = $_POST['password'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$tipo = $_POST['selectedOption'];

$sql = $conn->prepare('INSERT INTO moradia (nome, cep, email, senha, telefone, tipo) VALUE (:nome, :cep, :email, :senha, :telefone, :tipo)');
$sql->bindvalue(':email', $email);
$sql->bindValue(':senha', $senha);
$sql->bindValue(':nome', $nome);
$sql->bindValue(':telefone', $telefone);
$sql->bindValue(':cep', $cep);
$sql->bindValue(':tipo', $tipo);
$sql->execute();

if($sql->rowCount() > 0){
    while($dado = $sql->fetch()){
        $email = $dado['email'];
        $senha = $dado['senha'];
        $nome = $dado['nome'];
        $telefone = $dado['telefone'];
        $cep = $dado['cep'];
        $tipo = $dado['tipo'];
        $json[]= array('email'=> $email, 'senha'=> $senha, 'nome'=> $nome, 'telefone'=> $telefone, 'cep'=> $cep, 'tipo'=> $tipo);
    }echo json_encode($json, JSON_PRETTY_PRINT);
}else{
    echo '[{"status": "error"}]';
}
