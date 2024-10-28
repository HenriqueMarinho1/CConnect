<?php
include '../../configuracao/conexao.php';
header('Content-Type: application/json');

if (!isset($_FILES['media']) || !isset($_POST['descricao'])) {
    echo json_encode(['status' => 'error', 'message' => 'Dados incompletos']);
    exit;
}

$target_dir = "../uploads/";

$mediaName = basename($_FILES["media"]["name"]);
$target_file = $target_dir . $mediaName;

if (move_uploaded_file($_FILES["media"]["tmp_name"], $target_file)) {
    $descricao = $_POST['descricao'];
    $provas = isset($_POST['provas']) ? $_POST['provas'] : null;

    $sql = $conn->prepare('INSERT INTO problemas (descricao, imagem, provas) VALUES (:descricao, :imagem, :provas)');
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':imagem', $mediaName);
    $sql->bindValue(':provas', $provas);

    if ($sql->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao inserir o problema no banco de dados.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao enviar o arquivo.']);
}
exit; 
?>
