<?php

class Conexao {
    public $host = "localhost:3306";
    public $nomeBanco = "cconnect";
    public $usuarioBanco = "root";
    public $senhaUsuario = "";
    public $pdo = null;

    public function abrirConexao() {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->nomeBanco};charset=utf8", $this->usuarioBanco, $this->senhaUsuario);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            echo 'Erro ao conectar com o banco de dados: ' . $ex->getMessage();
        }
        return $this->pdo;
    }
}

?>
