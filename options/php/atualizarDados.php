<?php
include'../../configuracao/conexao.php';
header('Content-Type: application/json');

$id = $_POST['id'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];
$nome = $_POST['nome'];

$sql = $conn->prepare('UPDATE moradia SET senha = :senha, telefone = :telefone, nome = :nome, email = :email WHERE id = :id');
$sql->bindValue(':email', $email);
$sql->bindValue(':id', $id);
$sql->bindValue(':senha', $senha);
$sql->bindValue(':telefone', $telefone);
$sql->bindValue(':nome', $nome);
$sql->execute();

if ($sql->rowCount() > 0) {
    $json = [];
    while ($dado = $sql->fetch()) {
        $json[] = array(
            'nome' => $dado['nome'],
            'id' => $dado['id'],
            'email' => $dado['email'],
            'senha' => $dado['email'],
            'telefone' => $dado['telefone'],
            'tipo' => $dado['tipo']
        );
    }
    echo json_encode($json, JSON_PRETTY_PRINT); 
} else {
    echo json_encode([['status' => 'error']]);
}
