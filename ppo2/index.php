<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
require_once('topo/conexao.php');
require_once('classes/pessoa.php');
require_once('classes/empresa.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Fishing</title>
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
    <link rel='stylesheet' type='text/css' media='screen' href='css/home.css'>
    <script async defer src='js/home.js'></script>
    <style>
    .barra_de_pesquisa {
        height: 2.5rem;
        max-width:40rem;
        width: 100%;
        border-radius: 2.5rem;
        background: #FFF;
        display: flex;
        align-items: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        padding: 0 1rem;
        margin: 1rem auto;
    }
    </style>
</head>

<body>
    <header>
        <?php include("nav-index.php"); ?>
    </header>

    <main>
        <section class="fishing">
            <h1 class="title">FISHING</h1>
            <h2 class="subtitle">Aqui sua ideia vira realidade</h2>
            <div class="barra_de_pesquisa">
                <input placeholder="Pesquise aqui" class="texto_da_pesquisa">
                <img class="icone" src="imagens/lupa.png" alt="Pesquisar">
            </div>
        </section>

        <section>
            <h2 class="recomendacoes">PROJETOS RECOMENDADOS</h2>
            <div class="projetos-recomendados">
                <div class="gallery">
                    <img src="imagens/user.png" alt="Projeto 1">
                    <div class="desc">PROJETO</div>
                </div>
                <div class="gallery">
                    <img src="imagens/user.png" alt="Projeto 2">
                    <div class="desc">PROJETO</div>
                </div>
                <div class="gallery">
                    <img src="imagens/user.png" alt="Projeto 3">
                    <div class="desc">PROJETO</div>
                </div>
                <div class="gallery">
                    <img src="imagens/user.png" alt="Projeto 4">
                    <div class="desc">PROJETO</div>
                </div>
            </div>
            <a class="projetos" href="projetospg.php">Veja todas as ideias aqui</a>
        </section>

        <section class="zika">
            <h2 class="title2">SOBRE A FISHING</h2>
            <p class="paragraph">
                Nossa plataforma é um espaço digital dinâmico onde criadores de ideias inovadoras podem depositar seus
                projetos e conceitos, variando desde dispositivos manufaturados até ideias conceituais, e conectá-los
                diretamente com empresas ou pessoas interessadas em investir, colaborar ou desenvolver essas ideias.
            </p>
        </section>
    </main>
</body>

</html>