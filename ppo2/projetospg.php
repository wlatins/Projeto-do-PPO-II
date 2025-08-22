<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
$url = 'http://localhost/ppo2/';
require_once('topo/conexao.php');
require_once('classes/pessoa.php');
require_once('classes/empresa.php');
require_once('classes/projeto.php');

header('Content-Type: text/html; charset=utf-8');
$projeto = new Projeto($conn);

$url = 'imagens/imagens-projetos/';

$projetosHTML = $projeto->listar($url);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Projetos</title>

    <!-- links de fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@400;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./bootstrap-5.3.6-dist/css/bootstrap.css">
    <script async defer src='./bootstrap-5.3.6-dist/js/bootstrap.bundle.js'></script>

    <!-- links de arquivos -->
    <link rel='stylesheet' type='text/css' media='screen' href='css/principal.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/projetospg.css'>
    <script async defer src='js/home.js'></script>
</head>

<body>
    <header>
        <?php include("nav.php"); ?>
    </header>
    <section class="page1">
    <div class="projetos-lista">
        <?php echo $projetosHTML;?>
    </div>
</section>
</body>

</html>