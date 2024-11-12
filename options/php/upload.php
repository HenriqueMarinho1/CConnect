<?php
include '../../configuracao/conexao.php';
header('Content-Type: application/json');


$target_dir = "../uploads/";

$mediaName = basename($_FILES["media"]["name"]);
$target_file = $target_dir . $mediaName;

if (move_uploaded_file($_FILES["media"]["tmp_name"], $target_file)) {
    $descricao = $_POST['descricao'];
    $titulo = $_POST['titulo'];

    $sql = $conn->prepare('INSERT INTO problemas (descricao, imagem, titulo) VALUES (:descricao, :imagem, :titulo)');
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':imagem', $mediaName);
    $sql->bindValue(':titulo', $titulo);

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
