<?php
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

$dados = null;
if ($tipo == 'pessoa') {
    $pessoa = new Pessoa($conn);
    $dados = $pessoa->listar($_SESSION['id_pessoa']);
} elseif ($tipo == 'empresa') {
    $empresa = new Empresa($conn);
    $dados = $empresa->listar($_SESSION['id_empresa']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($tipo == 'pessoa') {
        $pessoa = new Pessoa($conn);
        $pessoa->editar(
            $_SESSION['id_pessoa'],
            $_POST['nome'],
            $_POST['email'],
            $_POST['cpf_cnpj'],
            $_POST['telefone']
        );
    }
    if ($tipo == 'empresa') {
        $empresa = new Empresa($conn);
        $empresa->editar(
            $_SESSION['id_empresa'],
            $_POST['nome'],
            $_POST['email'],
            $_POST['cpf_cnpj'],
            $_POST['telefone']
        );
    }
    header('Location: perfil.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Editar Conta</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="./bootstrap-5.3.6-dist/css/bootstrap.css">
    <script async defer src='./bootstrap-5.3.6-dist/js/bootstrap.bundle.js'></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/principal.css">
    <link rel='stylesheet' type='text/css' media='screen' href='css/perfil.css'>
    <style>
    body {
        min-height: 100vh;
        background: linear-gradient(135deg, #0F6292 0%, #4FD1C5 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: "Poppins", sans-serif;
    }

    .edit-container {
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(12px);
        border-radius: 18px;
        box-shadow: 0 4px 24px #0003;
        padding: 2.5rem 2rem 2rem 2rem;
        max-width: 420px;
        width: 100%;
    }

    .edit-title {
        font-size: 2rem;
        font-weight: 700;
        color: #0F6292;
        margin-bottom: 1.5rem;
        text-align: center;
        letter-spacing: 1px;
    }

    .form-label {
        color: #0F6292;
        font-weight: 600;
    }

    .form-control {
        border-radius: 8px;
        border: 1.5px solid #4FD1C5;
        background: rgba(255, 255, 255, 0.7);
        color: #0F6292;
    }

    .form-control:focus {
        border-color: #0F6292;
        box-shadow: 0 0 0 2px #4FD1C555;
    }

    .btn-primary {
        background: linear-gradient(90deg, #0F6292 60%, #4FD1C5 100%);
        border: none;
        font-weight: 700;
        letter-spacing: 1px;
        border-radius: 8px;
        padding: 12px 0;
        width: 100%;
        transition: background 0.2s, transform 0.2s;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #4FD1C5 60%, #0F6292 100%);
        transform: scale(1.03);
    }
    </style>
</head>

<body>
    <div class="edit-container">
        <div class="edit-title">Editar Conta</div>
        <form method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($dados['nome_pessoa'] ?? $dados['nome_empresa'] ?? ''); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
<input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($dados['email_pessoa'] ?? $dados['email_empresa'] ?? ''); ?>" required>
            </div>
            <div class="mb-3">
                <label for="cpf_cnpj" class="form-label">CPF ou CNPJ</label>
                <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value="<?php echo htmlspecialchars($dados['cpf_pessoa'] ?? $dados['cnpj_empresa'] ?? ''); ?>" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo htmlspecialchars($dados['telefone_pessoa'] ?? $dados['telefone_empresa'] ?? ''); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
    <script>
    function maskCpfCnpj(input) {
        let v = input.value.replace(/\D/g, '');
        if (v.length <= 11) {
            // CPF
            v = v.replace(/(\d{3})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        } else {
            // CNPJ
            v = v.slice(0, 14);
            v = v.replace(/^(\d{2})(\d)/, '$1.$2');
            v = v.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
            v = v.replace(/\.(\d{3})(\d)/, '.$1/$2');
            v = v.replace(/(\d{4})(\d)/, '$1-$2');
        }
        input.value = v;
    }

    function maskTelefone(input) {
        let v = input.value.replace(/\D/g, '').slice(0, 11);
        if (v.length > 10) {
            v = v.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
        } else if (v.length > 5) {
            v = v.replace(/^(\d{2})(\d{4})(\d{0,4})$/, '($1) $2-$3');
        } else if (v.length > 2) {
            v = v.replace(/^(\d{2})(\d{0,5})$/, '($1) $2');
        } else {
            v = v.replace(/^(\d*)$/, '($1');
        }
        input.value = v;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const cpfCnpj = document.querySelector('input[name="cpf_cnpj"]');
        if (cpfCnpj) cpfCnpj.addEventListener('input', function() {
            maskCpfCnpj(this);
        });

        const telefone = document.querySelector('input[name="telefone"]');
        if (telefone) telefone.addEventListener('input', function() {
            maskTelefone(this);
        });
    });
    </script>
</body>

</html>