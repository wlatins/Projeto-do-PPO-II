<?php
class Pessoa
{
    private $conn;
    private $id_pessoa;
    private $nome_pessoa;
    private $email_pessoa;
    private $cpf_pessoa;
    private $senha_pessoa;
    private $telefone_pessoa;

    // Construtor
    public function __construct($connp)
    {
        // Verifica se a conexão é um objeto PDO válido
        if ($connp instanceof PDO) {
            $this->conn = $connp;
        } else {
            throw new Exception("A conexão não é válida.");
        }
    }

    // Métodos Setters
    public function setid_pessoa($id_pessoa)
    {
        $this->id_pessoa = $id_pessoa;
    }

    public function setnome_pessoa($nome_pessoa)
    {
        $this->nome_pessoa = $nome_pessoa;
    }

    public function setemail_pessoa($email_pessoa)
    {
        $this->email_pessoa = $email_pessoa;
    }

    public function setcpf_pessoa($cpf_pessoa)
    {
        $this->cpf_pessoa = $cpf_pessoa;
    }

    public function setsenha_pessoa($senha_pessoa)
    {
        $this->senha_pessoa = $senha_pessoa;
    }

    public function settelefone_pessoa($telefone_pessoa)
    {
        $this->telefone_pessoa = $telefone_pessoa;
    }

    public function insert()
    {
        if (empty($this->nome_pessoa) || empty($this->email_pessoa) || empty($this->cpf_pessoa) || empty($this->senha_pessoa) || empty($this->telefone_pessoa)) {
            echo "Erro: Todos os campos são obrigatórios.";
            return;
        }

        $sql = "INSERT INTO pessoa (nome_pessoa, email_pessoa, cpf_pessoa, senha_pessoa, telefone_pessoa) 
            VALUES (:nome_pessoa, :email_pessoa, :cpf_pessoa, :senha_pessoa, :telefone_pessoa)";

        try {
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':nome_pessoa', $this->nome_pessoa);
            $stmt->bindParam(':email_pessoa', $this->email_pessoa);
            $stmt->bindParam(':cpf_pessoa', $this->cpf_pessoa);
            $stmt->bindParam(':senha_pessoa', $this->senha_pessoa);
            $stmt->bindParam(':telefone_pessoa', $this->telefone_pessoa);

            if ($stmt->execute()) {
                $_SESSION['logado'] = true;
                $this->id_pessoa = $this->conn->lastInsertId();
                $_SESSION['id_pessoa'] = $this->id_pessoa;
                var_dump($_SESSION);
                header('location:index.php');
                exit();
            } else {
                echo "Erro ao inserir Pessoa!<br>";
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    public function logar()
    {
        $sql = "SELECT id_pessoa FROM pessoa WHERE email_pessoa = :email AND senha_pessoa = :senha";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $this->email_pessoa);
        $stmt->bindParam(':senha', $this->senha_pessoa);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION['id_pessoa'] = $result['id_pessoa'];
            $_SESSION['logado'] = true;
            var_dump($_SESSION);
            header('Location: index.php');
            exit();
        }

        if ($result) {
            $_SESSION['id_pessoa'] = $result['id_pessoa'];
            $_SESSION['logado'] = true;
            header('Location: index.php');
            exit();
        } else {
            header('Location: erroDeLogin.php');
        }
    }

    public function listar($id)
    {
        $sql = "SELECT * FROM pessoa WHERE id_pessoa = :id_pessoa";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_pessoa', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function excluir($id) {
    $sql = "DELETE FROM pessoa WHERE id_pessoa = :id_pessoa";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id_pessoa', $id);
    return $stmt->execute();
    }

    public function editar($id, $nome, $email, $cpf, $telefone) {
    $sql = "UPDATE pessoa SET nome_pessoa = :nome, email_pessoa = :email, cpf_pessoa = :cpf, telefone_pessoa = :telefone WHERE id_pessoa = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
}