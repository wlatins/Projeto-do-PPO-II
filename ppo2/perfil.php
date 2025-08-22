<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
require_once('topo/conexao.php');
require_once('classes/pessoa.php');
require_once('classes/empresa.php');

if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
    header('Location: loginpg.php');
    exit();
}

$tipo = $_SESSION['tipo_cadastro'] ?? $_SESSION['tipo_cadastrado'] ?? null;
$dados = null;

if ($tipo == 'pessoa') {
    $pessoa = new Pessoa($conn);
    $dados = $pessoa->listar($_SESSION['id_pessoa']);
} elseif ($tipo == 'empresa') {
    $empresa = new Empresa($conn);
    $dados = $empresa->listar($_SESSION['id_empresa']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['excluir'])) {
        if ($tipo == 'pessoa') {
            $pessoa->excluir($_SESSION['id_pessoa']);
        } elseif ($tipo == 'empresa') {
            $empresa->excluir($_SESSION['id_empresa']);
        }
        header('Location: logout.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Perfil</title>
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
    <link rel='stylesheet' type='text/css' media='screen' href='css/perfil.css'>
    <script async defer src='js/home.js'></script>
    <style>
    .perfil-container {
        max-width: 420px;
        margin: 3rem auto;
        background: linear-gradient(135deg, rgba(15, 98, 146, 0.85) 0%, rgba(79, 209, 197, 0.60) 100%);
        border-radius: 18px;
        box-shadow: 0 4px 24px #0003;
        padding: 2.5rem 2rem;
        color: #fff;
        font-family: "Poppins", sans-serif;
    }

    .perfil-titulo {
        font-size: 2rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .perfil-info {
        margin-bottom: 1.2rem;
        font-size: 1.1rem;
    }

    .perfil-label {
        font-weight: 600;
        color: #4FD1C5;
    }

    .perfil-btn {
        display: block;
        margin: 2rem auto 0 auto;
        background: #0F6292;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 12px 32px;
        font-size: 1.1rem;
        font-family: "Poppins", sans-serif;
        cursor: pointer;
        transition: background 0.2s;
    }

    .perfil-btn:hover {
        background: #4FD1C5;
        color: #0F6292;
    }

    .perfil-btn-editar {
        background: linear-gradient(90deg, #4FD1C5 60%, #0F6292 100%);
        color: #fff !important;
        font-weight: 700;
        border: none;
        box-shadow: 0 2px 12px #4FD1C555;
        transition: background 0.2s, color 0.2s, transform 0.2s;
        letter-spacing: 0.5px;
    }

    .perfil-btn-editar:hover {
        background: linear-gradient(90deg, #0F6292 60%, #4FD1C5 100%);
        color: #fff !important;
        transform: scale(1.04);
    }

    .perfil-btn-excluir {
        background: linear-gradient(90deg, #e74c3c 60%, #c0392b 100%);
        color: #fff;
        font-weight: 700;
        border: none;
        box-shadow: 0 2px 12px #c0392b55;
        transition: background 0.2s, color 0.2s, transform 0.2s;
        margin-top: 0.5rem;
        letter-spacing: 0.5px;
    }

    .perfil-btn-excluir:hover {
        background: linear-gradient(90deg, #c0392b 60%, #e74c3c 100%);
        color: #fff;
        transform: scale(1.04);
    }
    </style>
</head>

<body>
    <div class="perfil-container">
        <div class="perfil-titulo">Meu Perfil</div>
        <?php if ($dados): ?>
        <?php if ($tipo == 'pessoa'): ?>
        <div class="perfil-info"><span class="perfil-label">Nome:</span>
            <?= htmlspecialchars($dados['nome_pessoa'] ?? '') ?></div>
        <div class="perfil-info"><span class="perfil-label">Email:</span>
            <?= htmlspecialchars($dados['email_pessoa'] ?? '') ?></div>
        <div class="perfil-info"><span class="perfil-label">CPF:</span>
            <?= htmlspecialchars($dados['cpf_pessoa'] ?? '') ?></div>
        <div class="perfil-info"><span class="perfil-label">Telefone:</span>
            <?= htmlspecialchars($dados['telefone_pessoa'] ?? '') ?></div>
        <?php elseif ($tipo == 'empresa'): ?>
        <div class="perfil-info"><span class="perfil-label">Empresa:</span>
            <?= htmlspecialchars($dados['nome_empresa'] ?? '') ?></div>
        <div class="perfil-info"><span class="perfil-label">Email:</span>
            <?= htmlspecialchars($dados['email_empresa'] ?? '') ?></div>
        <div class="perfil-info"><span class="perfil-label">CNPJ:</span>
            <?= htmlspecialchars($dados['cnpj_empresa'] ?? '') ?></div>
        <div class="perfil-info"><span class="perfil-label">Telefone:</span>
            <?= htmlspecialchars($dados['telefone_empresa'] ?? '') ?></div>
        <?php endif; ?>
        <?php else: ?>
        <div class="perfil-info">Não foi possível carregar os dados do perfil.</div>
        <?php endif; ?>
        <a href="editaConta.php" class="perfil-btn perfil-btn-editar"
            style="margin-bottom:0.5rem; display:flex; align-items:center; justify-content:center; gap:8px;">
            <span style="font-size:1.2em;">&#9998;</span> Editar Conta
        </a>
        <form method="post"
            onsubmit="return confirm('Tem certeza que deseja excluir sua conta? Esta ação não pode ser desfeita!');"
            style="margin-top:1rem;">
            <button type="submit" class="perfil-btn perfil-btn-excluir" name="excluir">
                Excluir Conta
            </button>
        </form>
    </div>
</body>

</html>