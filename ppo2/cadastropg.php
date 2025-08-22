<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
$url = 'http://localhost/ppoI/';
require_once('topo/conexao.php');
require_once('classes/pessoa.php');
require_once('classes/empresa.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];
    $_SESSION['tipo_cadastro'] = $tipo;
    if ($tipo == "pessoa") {
        $cliente = new Pessoa($conn);
        $cliente->setnome_pessoa($_POST['nome_pessoa']);
        $cliente->setemail_pessoa($_POST['email_pessoa']);
        $cliente->setcpf_pessoa($_POST['cpf_pessoa']);
        $cliente->setsenha_pessoa($_POST['senha_pessoa']);
        $cliente->settelefone_pessoa($_POST['telefone_pessoa']);
        $cliente->insert();
        exit();
    } elseif ($tipo == "empresa") {
        $empresa = new Empresa($conn);
        $empresa->setnome_empresa($_POST['nome_empresa']);
        $empresa->setemail_empresa($_POST['email_empresa']);
        $empresa->setcnpj_empresa($_POST['cnpj_empresa']);
        $empresa->setsenha_empresa($_POST['senha_empresa']);
        $empresa->settelefone_empresa($_POST['telefone_empresa']);
        $empresa->insert();
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Cadastro</title>
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
    <script async defer src='./bootstrap-5.3.6-dist/js/bootstrap.js'></script>
    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="css/principal.css"> -->
    <link rel='stylesheet' type='text/css' media='screen' href='css/cadastropg.css'>
</head>

<body>
    <video class="bg-video" src="imagens/peixes2.mp4" autoplay muted loop playsinline></video>
    <div class="dada">CADASTRO</div>
    <section class="page1">
        <div class="tabs">
            <button class="tab-btn active" data-target="pessoa-form">Pessoa</button>
            <button class="tab-btn" data-target="empresa-form">Empresa</button>
        </div>
        <!-- Formulário Pessoa -->
        <form id="pessoa-form" action="" method="post" class="login">
            <div class="usuario">
                <input type="text" name="nome_pessoa" placeholder="Nome de usuário" required>
            </div>
            <div class="email">
                <input type="email" name="email_pessoa" placeholder="Informe seu email" required>
            </div>
            <div class="cpf">
                <input type="text" name="cpf_pessoa" maxlength="14" placeholder="Informe seu CPF" required>
            </div>
            <div class="telefone">
                <input type="text" name="telefone_pessoa" maxlength="15" placeholder="Seu telefone" required>
            </div>
            <div class="senha">
                <input type="password" name="senha_pessoa" placeholder="Sua senha" required>
            </div>
            <input type="hidden" name="tipo" value="pessoa">
            <button class="botao" name="register">Criar conta</button>
        </form>
        <!-- Formulário Empresa -->
        <form id="empresa-form" action="" method="post" class="login" style="display: none;">
            <div class="usuario">
                <input type="text" name="nome_empresa" placeholder="Nome da Empresa" required>
            </div>
            <div class="email">
                <input type="email" name="email_empresa" placeholder="Informe seu email" required>
            </div>
            <div class="cpf">
                <input type="text" name="cnpj_empresa" maxlength="18" placeholder="Informe o CNPJ" required>
            </div>
            <div class="telefone">
                <input type="text" name="telefone_empresa" maxlength="15" placeholder="Telefone da Empresa" required>
            </div>
            <div class="senha">
                <input type="password" name="senha_empresa" placeholder="Senha da Empresa" required>
            </div>
            <input type="hidden" name="tipo" value="empresa">
            <button class="botao" name="register">Criar conta</button>
        </form>
    </section>
    <script>
        // Troca de abas dos formulários
        const tabBtns = document.querySelectorAll('.tab-btn');
        const forms = {
            'pessoa-form': document.getElementById('pessoa-form'),
            'empresa-form': document.getElementById('empresa-form')
        };
        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                tabBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                Object.values(forms).forEach(f => f.style.display = 'none');
                forms[btn.getAttribute('data-target')].style.display = 'flex';
            });
        });
        forms['pessoa-form'].style.display = 'flex';
        function maskCPF(input) {
            input.value = input.value
                .replace(/\D/g, '')
                .slice(0, 11) // Limita a 11 dígitos
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        }

        function maskCPF(input) {
            let v = input.value.replace(/\D/g, '').slice(0, 11); // Limita a 11 dígitos
            v = v.replace(/(\d{3})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            input.value = v;
        }

        function maskCNPJ(input) {
            let v = input.value.replace(/\D/g, '').slice(0, 14); // Limita a 14 dígitos
            v = v.replace(/^(\d{2})(\d)/, '$1.$2');
            v = v.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
            v = v.replace(/\.(\d{3})(\d)/, '.$1/$2');
            v = v.replace(/(\d{4})(\d)/, '$1-$2');
            input.value = v;
        }

        function maskTelefone(input) {
            let v = input.value.replace(/\D/g, '').slice(0, 11); // Limita a 11 dígitos
            if (v.length > 10) {
                // Celular: (xx) xxxxx-xxxx
                v = v.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
            } else if (v.length > 5) {
                // Fixo: (xx) xxxx-xxxx
                v = v.replace(/^(\d{2})(\d{4})(\d{0,4})$/, '($1) $2-$3');
            } else if (v.length > 2) {
                v = v.replace(/^(\d{2})(\d{0,5})$/, '($1) $2');
            } else {
                v = v.replace(/^(\d*)$/, '($1');
            }
            input.value = v;
        }
        document.addEventListener('DOMContentLoaded', function () {

            const cpf = document.querySelector('input[name="cpf_pessoa"]');
            if (cpf) cpf.addEventListener('input', function () { maskCPF(this); });

            const cnpj = document.querySelector('input[name="cnpj_empresa"]');
            if (cnpj) cnpj.addEventListener('input', function () { maskCNPJ(this); });

            const telPessoa = document.querySelector('input[name="telefone_pessoa"]');
            if (telPessoa) telPessoa.addEventListener('input', function () { maskTelefone(this); });

            const telEmpresa = document.querySelector('input[name="telefone_empresa"]');
            if (telEmpresa) telEmpresa.addEventListener('input', function () { maskTelefone(this); });
        });
    </script>
</body>

</html>