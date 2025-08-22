<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
require_once('topo/conexao.php');
require_once('classes/pessoa.php');
require_once('classes/empresa.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login_pessoa'])) {
        $_SESSION['tipo_cadastro'] = 'pessoa';
        $cliente = new Pessoa($conn);
        $cliente->setemail_pessoa($_POST['email_pessoa']);
        $cliente->setsenha_pessoa($_POST['senha_pessoa']);
        $cliente->logar();
    } elseif (isset($_POST['login_empresa'])) {
        $_SESSION['tipo_cadastro'] = 'empresa';
        $empresa = new Empresa($conn);
        $empresa->setemail_empresa($_POST['email_empresa']);
        $empresa->setsenha_empresa($_POST['senha_empresa']);
        $empresa->logar();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Login</title>
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
    <!-- Mesmo CSS do cadastro para manter padrão -->
    <link rel='stylesheet' type='text/css' media='screen' href='css/cadastropg.css'>
    <script defer src="js/loginpg.js"></script>
    <style>
        .was-validated input:invalid {
            border-color: #ff6b6b !important;
            background: #2a1a1a !important;
        }

        .invalid-feedback {
            color: #ff6b6b;
            font-size: 0.95rem;
            font-family: "Poppins", sans-serif;
            display: none;
        }

        .was-validated input:invalid~.invalid-feedback {
            display: block;
        }
    </style>
</head>

<body>
    <video class="bg-video" src="imagens/peixes2.mp4" autoplay muted loop playsinline></video>
    <div class="dada">LOGIN</div>
    <section class="page1">
        <div class="tabs">
            <button class="tab-btn active" data-target="pessoa-form">Pessoa</button>
            <button class="tab-btn" data-target="empresa-form">Empresa</button>
        </div>
        <!-- Formulário Pessoa -->
        <form id="pessoa-form" action="" method="post" class="login needs-validation" novalidate>
            <div class="email">
                <input type="email" name="email_pessoa" placeholder="Informe seu email" required>
                <div class="invalid-feedback"></div>
            </div>
            <div class="senha">
                <input type="password" name="senha_pessoa" placeholder="Sua senha" required>
                <div class="invalid-feedback"></div>
            </div>
            <button class="botao" name="login_pessoa" type="submit">Entrar</button>
            <a class="m1" href="cadastropg.php">Criar conta?</a>
        </form>
        <!-- Formulário Empresa -->
        <form id="empresa-form" action="" method="post" class="login needs-validation" style="display: none;"
            novalidate>
            <div class="email">
                <input type="email" name="email_empresa" placeholder="Email da empresa" required>
                <div class="invalid-feedback"></div>
            </div>
            <div class="senha">
                <input type="password" name="senha_empresa" placeholder="Senha da empresa" required>
                <div class="invalid-feedback"></div>
            </div>
            <button class="botao" name="login_empresa" type="submit">Entrar</button>
            <a class="m1" href="cadastropg.php">Criar conta?</a>
        </form>
    </section>
    <script>
        // Validação visual Bootstrap-like
        (() => {
            'use strict'
            const formsVal = document.querySelectorAll('.needs-validation')
            Array.from(formsVal).forEach(form => {
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