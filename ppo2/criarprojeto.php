<?php
require_once('topo/conexao.php');
require_once('classes/projeto.php');
session_start();

if (isset($_SESSION['logado'])) {
    if ($_SESSION['tipo_cadastro'] == 'pessoa') {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $projeto = new Projeto($conn);

            $projeto->settitulo_projeto($_POST['titulo_projeto']);
            $projeto->setautor_projeto($_POST['autor_projeto']);
            $projeto->setdescricao_projeto($_POST['descricao_projeto']);

            if (isset($_FILES['arquivo_projeto']) && $_FILES['arquivo_projeto']['error'] === UPLOAD_ERR_OK) {
                $targetDirectory = 'imagens/imagens-projetos/';

                $ext = pathinfo($_FILES['arquivo_projeto']['name'], PATHINFO_EXTENSION);
                $nomeUnico = uniqid('img_', true) . '.' . $ext;

                $targetFile = $targetDirectory . $nomeUnico;

                if (move_uploaded_file($_FILES['arquivo_projeto']['tmp_name'], $targetFile)) {
                    $projeto->setimg_projeto($nomeUnico);
                } else {
                    echo "Erro ao mover o arquivo para o diretório.<br>";
                    exit();
                }
            } else {
                echo "Erro: Nenhum arquivo foi enviado ou houve erro no upload.<br>";
                exit();
            }

            $projeto->setid_pessoa_fk($_SESSION['id_pessoa']);
            $projeto->insert();
        }
        // Se não for POST, só exibe o formulário (não faz nada com $projeto)
    } else {
        header('Location: erroJuridico.php');
        exit();
    }
} else {
    header('Location: naocadastrado.php');
    exit();
}
?>
?>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Registre aqui seu projeto</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@400;700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="./bootstrap-5.3.6-dist/css/bootstrap.css">
    <script async defer src='./bootstrap-5.3.6-dist/js/bootstrap.bundle.js'></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/principal.css">
    <link rel='stylesheet' type='text/css' media='screen' href='css/criarprojeto.css'>
    <script async defer src='js/home.js'></script>
</head>

<body>
    <header>
        <?php include("nav-index.php"); ?>
    </header>
    <form class="row g-3 needs-validation" id="criar" method="post" enctype="multipart/form-data" novalidate>
        <div class="col-md-6">
            <label for="titulo_projeto" class="form-label">Título do Projeto</label>
            <input type="text" class="form-control" id="titulo_projeto" name="titulo_projeto" placeholder="TÍTULO"
                required>
            <div class="invalid-feedback">
                Informe o título do projeto.
            </div>
        </div>
        <div class="col-md-6">
            <label for="autor_projeto" class="form-label">Nome do Autor</label>
            <input type="text" class="form-control" id="autor_projeto" name="autor_projeto" placeholder="NOME DO AUTOR"
                required>
            <div class="invalid-feedback">
                Informe o nome do autor.
            </div>
        </div>
        <div class="col-12">
            <label for="descricao_projeto" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao_projeto" name="descricao_projeto" rows="5" required></textarea>
            <div class="invalid-feedback">
                Informe a descrição do projeto.
            </div>
        </div>
        <div class="col-12">
            <label for="arquivo_projeto" class="form-label">Selecione uma Imagem</label>
            <input class="form-control" type="file" id="arquivo_projeto" name="arquivo_projeto" required>
            <div class="invalid-feedback">
                Selecione uma imagem para o projeto.
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit" id="baixar">ENVIAR PROJETO</button>
        </div>
    </form>

    <!-- Script de validação Bootstrap -->
    <script>
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>