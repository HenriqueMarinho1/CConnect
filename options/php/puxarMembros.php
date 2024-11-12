<?php 
include'../../configuracao/conexao.php';
header('Content-Type: application/json');

$cep = $_POST['cep'];

$sql = $conn->prepare('SELECT * FROM moradia WHERE cep = :cep');
$sql->bindValue(':cep', $cep);
$sql->execute();

if ($sql->rowCount() > 0) {
    $json = [];
    while ($dado = $sql->fetch()) {
        $json[] = array(
            'nome' => $dado['nome'],
            'cep' => $dado['cep'],
            'email' => $dado['email'],
            'telefone' => $dado['telefone'],
            'id' => $dado['id']
        );
    }
    echo json_encode($json, JSON_PRETTY_PRINT); 
} else {
    echo json_encode([['status' => 'error']]);
}
?>
