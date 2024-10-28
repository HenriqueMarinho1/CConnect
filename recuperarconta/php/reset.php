<?php

include'../../configuracao/conexao.php';
header('Content-Type: application/json');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = $conn->prepare('UPDATE usuarios SET senha = :senha WHERE email = :email;');
$sql->bindValue(':email', $email);
$sql->bindValue(':senha', $password);
$sql->execute();
echo '[{"status": "sucesso"}]';