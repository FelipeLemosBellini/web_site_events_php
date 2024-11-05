<?php

class Usuario
{
    private $db;
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $tipo;

    public function __construct()
    {
        global $conn;
        require_once '../db.php';

        $this->db = $conn;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSenha($senha)
    {
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function create($data)
    {
        $conn = $this->db;

        $nome = $data['nome'];
        $email = $data['email'];
        $senha = $data['senha'];
        $tipo = $data['tipo'];

        $sql = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES ('$nome', '$email', '$senha', '$tipo')";
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

        $sql = "DELETE FROM usuarios WHERE id = $id";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsuarios()
    {
        $conn = $this->db;

        $sql = "SELECT * FROM usuarios";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $usuarios = [];
            while ($row = $result->fetch_assoc()) {
                $usuarios[] = $row;
            }
            return $usuarios;
        } else {
            return [];
        }
    }

    public function getUsuario($id)
    {
        $conn = $this->db;

        $sql = "SELECT * FROM usuarios WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return [];
        }
    }

    public function update($data)
    {
        $conn = $this->db;

        $sql = "UPDATE usuarios SET 
                nome = '{$data['nome']}', 
                email = '{$data['email']}', 
                senha = '" . password_hash($data['senha'], PASSWORD_DEFAULT) . "', 
                tipo = '{$data['tipo']}'
                WHERE id = {$data['id']}";

        $result = $conn->query($sql);

        if ($result === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function authenticate($email, $senha)
    {
        $conn = $this->db;

        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();
            if ($senha === $usuario['senha']) {
                $this->id = $usuario['id'];
                $this->nome = $usuario['nome'];
                $this->email = $usuario['email'];
                $this->tipo = $usuario['tipo'];
                return true;
            }
        }
        return false;
    }
}
?>
