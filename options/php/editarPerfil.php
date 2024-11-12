<?php

include'../../configuracao/conexao.php';
header('Content-Type: application/json');


$id = $_POST['id'];

$sql = $conn->prepare('SELECT * FROM moradia WHERE id = :id');
$sql->bindValue(':id', $id);
$sql->execute();

if ($sql->rowCount() > 0) {
    $json = [];
    while ($dado = $sql->fetch()) {
        $json[] = array(
            'nome' => $dado['nome'],
            'id' => $dado['id'],
            'email' => $dado['email'],
            'senha' => $dado['senha'],
            'telefone' => $dado['telefone'],
            'tipo' => $dado['tipo']
        );
    }
    echo json_encode($json, JSON_PRETTY_PRINT); 
} else {
    echo json_encode([['status' => 'error']]);
}



