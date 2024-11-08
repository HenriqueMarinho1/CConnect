<?php

class ModelChat {
    public $db = null;
    public $usuario = null;
    public $message = null;
    public $problema = null;

    public function __construct($conexaobanco) {
        $this->db = $conexaobanco;
    }

    public function chat() {
        $retorno = ['status' => 0, 'dados' => null];
        try {
            $sql = $this->db->prepare('INSERT INTO chat (mensagem, usuario, problema, datas) VALUES (:mensagem, :usuario, :problema, NOW())');
            $sql->bindValue(':mensagem', $this->message);
            $sql->bindValue(':usuario', $this->usuario);
            $sql->bindValue(':problema', $this->problema);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $retorno['status'] = 1;
                $retorno['dados'] = ['mensagem' => $this->message, 'usuario' => $this->usuario, 'problema' => $this->problema];
            }
        } catch (PDOException $ex) {
            $retorno['error'] = $ex->getMessage();
        }
        return $retorno;
    }

    public function Consultar() {
        try {
            $sql = $this->db->prepare("SELECT * FROM chat ORDER BY datas ASC");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            return ['error' => $ex->getMessage()];
        }
    }
}
