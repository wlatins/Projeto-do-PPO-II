<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
$url = 'http://localhost/ppoI/';
require_once('topo/conexao.php');
require_once('classes/pessoa.php');
require_once('classes/empresa.php');
?>
    <!DOCTYPE html>
    <html>
    <html lang="pt-br">

    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

        <title>Quem Somos?</title>

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
        <link rel='stylesheet' type='text/css' media='screen' href='css/quem_somos.css'>
        <script async defer src='js/quem_somos.js'></script>

    </head>

    <body>
        <header>
            <?php include("nav.php"); ?>
        </header>
        <div class="nos">
            <div class="walter">
                <div class="foto1"></div>
                <div class="txt2">Walter Santa Cruz Júnior</div>
                <div class="txt2">IA23</div>
            </div>
            <div class="joao">
                <div class="foto2"></div>
                <div class="txt2">João Gabriel Rodrigues Bencz</div>
                <div class="txt2">IA23</div>
            </div>
            <div class="rian">
                <div class="foto3"></div>
                <div class="txt2">Rian Marcelo do Nascimento Evaristo</div>
                <div class="txt2">IA23</div>
            </div>
        </div>
    </body>

    </html>