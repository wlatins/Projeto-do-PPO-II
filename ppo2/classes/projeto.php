<?php
class Projeto
{
    private $conn;
    private $id_projeto;
    private $titulo_projeto;
    private $autor_projeto;
    private $descricao_projeto;
    private $img_projeto;
    private $id_pessoa_fk;

    // Construtor
    public function __construct($connp)
    {
        if ($connp instanceof PDO) {
            $this->conn = $connp;
        } else {
            throw new Exception("A conexão não é válida.");
        }
    }

    // Métodos Setters
    public function setid_projeto($id_projeto)
    {
        $this->id_projeto = $id_projeto;
    }

    public function settitulo_projeto($titulo_projeto)
    {
        $this->titulo_projeto = $titulo_projeto;
    }

    public function setautor_projeto($autor_projeto)
    {
        $this->autor_projeto = $autor_projeto;
    }

    public function setdescricao_projeto($descricao_projeto)
    {
        $this->descricao_projeto = $descricao_projeto;
    }

    public function setimg_projeto($img_projeto)
    {
        $this->img_projeto = $img_projeto;
    }

    public function setid_pessoa_fk($id_pessoa_fk)
    {
        $this->id_pessoa_fk = $id_pessoa_fk;

    }

    public function insert()
    {
        if (    (empty($this->titulo_projeto) || empty($this->autor_projeto) || empty($this->descricao_projeto) || empty($this->img_projeto)) || empty($this->id_pessoa_fk)) {
            echo "Erro: Todos os campos são obrigatórios.<br>";
            echo "Título: " . var_export($this->titulo_projeto, true) . "<br>";
            echo "Autor: " . var_export($this->autor_projeto, true) . "<br>";
            echo "Descrição: " . var_export($this->descricao_projeto, true) . "<br>";
            echo "Imagem: " . (empty($this->img_projeto) ? "Vazia" : "Conteúdo com " . strlen($this->img_projeto) . " bytes") . "<br>";
            echo "ID Pessoa: " . var_export($this->id_pessoa_fk, true) . "<br>";
            return;
        }
        $sql = "INSERT INTO projeto (titulo_projeto, autor_projeto, descricao_projeto, img_projeto, id_Pessoa_fk) 
            VALUES (:titulo_projeto, :autor_projeto, :descricao_projeto, :img_projeto, :id_pessoa_fk)";
        try {
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':titulo_projeto', $this->titulo_projeto);
            $stmt->bindParam(':autor_projeto', $this->autor_projeto);
            $stmt->bindParam(':descricao_projeto', $this->descricao_projeto);
            $stmt->bindParam(':img_projeto', $this->img_projeto);
            $stmt->bindParam(':id_pessoa_fk', $this->id_pessoa_fk, PDO::PARAM_INT);

            if ($stmt->execute()) {
                header('Location: projetoInserido.php');
                exit();
            } else {
                echo "Erro ao inserir Projeto!<br>";
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function listar($url) {
        $sql = "SELECT * FROM projeto";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $retorno = '';
    
        if (count($result) > 0) {
            foreach ($result as $row) {
                $imgSrc = rtrim($url, '/') . '/' . ltrim($row['img_projeto'], '/');
    
                $retorno .= '<div class="gallery">
                                <a href="detalhes_projeto.php?id=' . $row['id_projeto'] . '" class="projeto-link">
                                    <div class="image-wrapper">
                                        <img src="' . $imgSrc . '" alt="Imagem do projeto">
                                    </div>
                                    <div class="desc">' . htmlspecialchars($row['titulo_projeto']) . '</div>
                                </a>
                            </div>';
            }
            return $retorno;
        } else {
            return "0 resultados";
        }
    }
}
?>