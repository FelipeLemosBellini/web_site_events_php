<?php

class Inscricoes
{
    private $db;
    private $id;
    private $idEvento;
    private $idParticipante;
    private $dataInscricao;

    public function __construct()
    {
        global $conn;
        require_once 'db.php';

        $this->db = $conn;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdEvento()
    {
        return $this->idEvento;
    }

    public function getIdParticipante()
    {
        return $this->idParticipante;
    }

    public function getDataInscricao()
    {
        return $this->dataInscricao;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setIdEvento($idEvento)
    {
        $this->idEvento = $idEvento;
    }

    public function setIdParticipante($idParticipante)
    {
        $this->idParticipante = $idParticipante;
    }

    public function setDataInscricao($dataInscricao)
    {
        $this->dataInscricao = $dataInscricao;
    }
    public function create($data)
    {
        $conn = $this->db;

        $idEvento = $data['idEvento'];
        $idParticipante = $data['idParticipante'];

        $sql = "INSERT INTO inscricoes (evento_id, participante_id, data_inscricao) VALUES ('$idEvento', '$idParticipante', NOW())";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $conn = $this->db;

        $sql = "DELETE FROM inscricoes WHERE id = $id";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getTotalInscricoes($idEvento)
    {
        $conn = $this->db;

        $sql = "SELECT COUNT(*) as total FROM inscricoes WHERE evento_id = $idEvento";
        $result = $conn->query($sql);
        $total = $result->fetch_assoc();

        return $total['total'];
    }
}
?>
