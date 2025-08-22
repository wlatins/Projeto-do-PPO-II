<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Projeto Inserido</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="./bootstrap-5.3.6-dist/css/bootstrap.css">
    <script async defer src='./bootstrap-5.3.6-dist/js/bootstrap.bundle.js'></script>
    <!-- Custom CSS -->
    <style>
        body {
            background: #111;
            min-height: 100vh;
            margin: 0;
        }
        .sucesso-container {
            max-width: 420px;
            margin: 5rem auto;
            background: linear-gradient(135deg, rgba(79,209,197,0.85) 0%, rgba(15,98,146,0.85) 100%);
            border-radius: 18px;
            box-shadow: 0 4px 24px #0003;
            padding: 2.5rem 2rem;
            color: #fff;
            font-family: "Poppins", sans-serif;
            text-align: center;
        }
        .sucesso-titulo {
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 1.2rem;
        }
        .sucesso-msg {
            font-size: 1.15rem;
            margin-bottom: 2.5rem;
        }
        .sucesso-btn-group {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }
        .sucesso-btn {
            background: #0F6292;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 32px;
            font-size: 1.1rem;
            font-family: "Poppins", sans-serif;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
            text-decoration: none;
            display: inline-block;
        }
        .sucesso-btn:hover {
            background: #4FD1C5;
            color: #0F6292;
        }
    </style>
</head>
<body>
    <div class="sucesso-container">
        <div class="sucesso-titulo">Projeto inserido com sucesso!</div>
        <div class="sucesso-msg">
            Seu projeto foi cadastrado e já está disponível na plataforma.<br>
            Obrigado por compartilhar sua ideia!
        </div>
        <div class="sucesso-btn-group">
            <a href="projetospg.php" class="sucesso-btn">Ver projetos</a>
            <a href="index.php" class="sucesso-btn">Voltar ao início</a>
        </div>
    </div>
</body>