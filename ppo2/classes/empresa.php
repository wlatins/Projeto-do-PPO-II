<?php
class Empresa
{
    private $conn;
    private $id_empresa;
    private $nome_empresa;
    private $email_empresa;
    private $cnpj_empresa;
    private $senha_empresa;
    private $telefone_empresa;

    // Construtor
    public function __construct($connp)
    {
        if ($connp instanceof PDO) {
            $this->conn = $connp;
        } else {
            throw new Exception("A conexão não é válida.");
        }
    }

    // Setters
    public function setid_empresa($id_empresa)
    {
        $this->id_empresa = $id_empresa;
    }

    public function setnome_empresa($nome_empresa)
    {
        $this->nome_empresa = $nome_empresa;
    }

    public function setemail_empresa($email_empresa)
    {
        $this->email_empresa = $email_empresa;
    }

    public function setcnpj_empresa($cnpj_empresa)
    {
        $this->cnpj_empresa = $cnpj_empresa;
    }

    public function setsenha_empresa($senha_empresa)
    {
        $this->senha_empresa = $senha_empresa;
    }

    public function settelefone_empresa($telefone_empresa)
    {
        $this->telefone_empresa = $telefone_empresa;
    }

    // Inserção de dados
    public function insert()
    {
        if (empty($this->nome_empresa) || empty($this->email_empresa) || empty($this->cnpj_empresa) || empty($this->senha_empresa) || empty($this->telefone_empresa)) {
            echo "Erro: Todos os campos são obrigatórios.";
            return;
        }

        $sql = "INSERT INTO empresa (nome_empresa, email_empresa, cnpj_empresa, senha_empresa, telefone_empresa) 
                VALUES (:nome_empresa, :email_empresa, :cnpj_empresa, :senha_empresa, :telefone_empresa)";

        try {
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':nome_empresa', $this->nome_empresa);
            $stmt->bindParam(':email_empresa', $this->email_empresa);
            $stmt->bindParam(':cnpj_empresa', $this->cnpj_empresa);
            $stmt->bindParam(':senha_empresa', $this->senha_empresa);
            $stmt->bindParam(':telefone_empresa', $this->telefone_empresa);

            if ($stmt->execute()) {
                $_SESSION['logado'] = true;
                $this->id_empresa = $this->conn->lastInsertId();
                $_SESSION['id_empresa'] = $this->id_empresa;
                var_dump($_SESSION);
                header('location:index.php');
                exit();
            } else {
                echo "Erro ao inserir Empresa!<br>";
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    // Login de empresa
    public function logar()
    {
        $sql = "SELECT id_empresa FROM empresa WHERE email_empresa = :email AND senha_empresa = :senha";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $this->email_empresa);
        $stmt->bindParam(':senha', $this->senha_empresa);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION['id_empresa'] = $result['id_empresa'];
            $_SESSION['logado'] = true;
            var_dump($_SESSION);
            header('Location: index.php');
            exit();
        }

        if ($result) {
            $_SESSION['id_empresa'] = $result['id_empresa'];
            $_SESSION['logado'] = true;
            header('Location: index.php');
            exit();
        } else {
            header('Location: erroDeLogin.php');
        }
    }

    public function listar($id) {
    $sql = "SELECT * FROM empresa WHERE id_empresa = :id_empresa";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id_empresa', $id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function excluir($id) {
    $sql = "DELETE FROM empresa WHERE id_empresa = :id_empresa";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id_empresa', $id);
    return $stmt->execute();
}

public function editar($id, $nome, $email, $cnpj, $telefone) {
    $sql = "UPDATE empresa SET nome_empresa = :nome, email_empresa = :email, cnpj_empresa = :cnpj, telefone_empresa = :telefone WHERE id_empresa = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':cnpj', $cnpj);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
}