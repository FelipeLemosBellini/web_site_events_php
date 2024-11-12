<?php

class Evento
{
    private $db;
    private $id;
    private $titulo;
    private $descricao;
    private $data;
    private $local;
    private $limite_inscricoes;
    private $organizador_id;

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

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getLocal()
    {
        return $this->local;
    }

    public function getLimiteInscricao()
    {
        return $this->limite_inscricoes;
    }

    public function getOrganizadorId()
    {
        return $this->organizador_id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setLocal($local)
    {
        $this->local = $local;
    }

    public function setLimiteInscricao($limite_inscricoes)
    {
        $this->limite_inscricoes = $limite_inscricoes;
    }

    public function setOrganizadorId($organizador_id)
    {
        $this->organizador_id = $organizador_id;
    }

    public function create($data) {
        $conn = $this->db;

        $titulo = $data['titulo'];
        $descricao = $data['descricao'];
        $date = $data['data'];
        $local = $data['local'];
        $limite_inscricoes = $data['limite_inscricao'];

        $sql = "INSERT INTO eventos (titulo, descricao, data, local, limite_inscricoes) VALUES ('$titulo', '$descricao', '$date', '$local', '$limite_inscricoes')";
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

        $sql = "DELETE FROM eventos WHERE id = $id";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getEventos()
    {
        $conn = $this->db;

        $sql = "SELECT * FROM eventos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $tarefas = [];
            while ($row = $result->fetch_assoc()) {
                $tarefas[] = $row;
            }
            return $tarefas;
        } else {
            return [];
        }
    }

    public function getEvento($id)
    {
        $conn = $this->db;

        $sql = "SELECT * FROM eventos WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return [];
        }

        $conn->close();
    }

    public function update($data)
    {
        $conn = $this->db;

        $sql = "UPDATE eventos SET 
                titulo = '{$data['titulo']}', 
                descricao = '{$data['descricao']}', 
                data = '{$data['data']}', 
                local = '{$data['local']}', 
                limite_inscricoes = '{$data['limite_inscricao']}'
                WHERE id = {$data['id']}";

        $result = $conn->query($sql);

        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }

        $conn->close();
    }

    public function participar($idEvento)
    {
        $conn = $this->db;

        $sql = "INSERT INTO evento_usuario (usuario_id, evento_id) VALUES ({$_SESSION['id']}, {$idEvento})";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }

        $conn->close();
    }

}