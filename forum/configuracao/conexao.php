<?php

class Conexao{
    public $host = "localhost";
    public $nomeBanco = "u149144215_connect";
    public $usuarioBanco = "u149144215_connect";
    public $senhaUsuario ="02152301He.";
    public $pdo = null;
    public function abrirConexao(){
        try{
            $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->nomeBanco, $this->usuarioBanco, $this->senhaUsuario);
        }catch (PDOException $ex){
            echo 'Erro ao conectar com o banco de dados: ' . $ex->getMessage();
        }
        return $this->pdo;
    }
}

?>