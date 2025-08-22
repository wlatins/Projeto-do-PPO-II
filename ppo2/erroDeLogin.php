<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Erro de Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0F6292 0%, #1B262C 100%);
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Poppins", Arial, Helvetica, sans-serif;
        }
        .erro-container {
            background: rgba(30, 40, 60, 0.92);
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px 0 rgba(0,0,0,0.37);
            padding: 2.5rem 2rem;
            max-width: 400px;
            text-align: center;
            color: #fff;
            border: 1.5px solid #ff6b6b;
        }
        .erro-title {
            font-size: 2rem;
            font-weight: 700;
            color: #ff6b6b;
            margin-bottom: 1rem;
        }
        .erro-msg {
            font-size: 1.15rem;
            margin-bottom: 2rem;
        }
        .erro-btn {
            background: linear-gradient(90deg, #0F6292 60%, #4FD1C5 100%);
            color: #fff;
            border: none;
            border-radius: 1rem;
            padding: 0.7rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, transform 0.2s;
            text-decoration: none;
            display: inline-block;
        }
        .erro-btn:hover {
            background: linear-gradient(90deg, #4FD1C5 0%, #0F6292 100%);
            transform: translateY(-2px) scale(1.03);
        }
    </style>
</head>
<body>
    <div class="erro-container">
        <div class="erro-title">Erro de Login</div>
        <div class="erro-msg">Email ou Senha incorreto!</div>
        <a href="loginpg.php" class="erro-btn">Tentar Novamente</a>
    </div>
</body>
</html>