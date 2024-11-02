<?php

class Conexao {
    public $host = "localhost"; // Corrige a porta para o padrão
    public $port = "3306"; // Porta padrão do MySQL
    public $nomeBanco = "cconnect";
    public $usuarioBanco = "root";
    public $senhaUsuario = "";
    public $pdo = null;

    public function abrirConexao() {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->nomeBanco}", $this->usuarioBanco, $this->senhaUsuario);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configuração adicional para tratar erros
        } catch (PDOException $ex) {
            echo 'Erro ao conectar com o banco de dados: ' . $ex->getMessage();
        }
        return $this->pdo;
    }
}

?>
