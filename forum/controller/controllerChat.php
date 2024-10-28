<?php

require_once("../configuracao/conexao.php");
require_once("../model/ModelChat.php");

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $reqbody = json_decode($json);

        if (isset($reqbody->usuario) && isset($reqbody->message) && isset($reqbody->problem) && !empty($reqbody->usuario) && !empty($reqbody->message) && !empty($reqbody->problem)) {
            $usuario = $reqbody->usuario;
            $message = $reqbody->message;
            $problema = $reqbody->problem;

            $conexao = new Conexao();
            $banco = $conexao->abrirConexao();

            $modelChat = new ModelChat($banco);
            $modelChat->usuario = $usuario;
            $modelChat->message = $message;
            $modelChat->problema = $problema;

            $retorno = $modelChat->chat();
            echo json_encode($retorno);
        } else {
            echo json_encode(['status' => 0, 'error' => 'Dados incompletos ou inválidos']);
        }
    } elseif (isset($_GET['action']) && $_GET['action'] === 'Consultar') {
        $conexao = new Conexao();
        $banco = $conexao->abrirConexao();

        $modelChat = new ModelChat($banco);
        $retorno = $modelChat->Consultar();
        echo json_encode(['status' => 1, 'dados' => $retorno]);
    } else {
        echo json_encode(['status' => 0, 'error' => 'Ação inválida']);
    }
} catch (Exception $ex) {
    echo json_encode(['status' => 0, 'error' => $ex->getMessage()]);
}
