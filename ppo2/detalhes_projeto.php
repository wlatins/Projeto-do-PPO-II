<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
require_once('topo/conexao.php');
require_once('classes/pessoa.php');
require_once('classes/empresa.php');
require_once('classes/projeto.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
  die("ID do projeto não informado.");
}

$id = intval($_GET['id']);
$projeto = new Projeto($conn);

// Buscar projeto pelo ID
$sql = "SELECT pr.*, pe.email_pessoa 
        FROM projeto pr
        JOIN pessoa pe ON pe.id_pessoa = pr.id_pessoa_fk
        WHERE pr.id_projeto = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$dados = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$dados) {
  die("Projeto não encontrado.");
}

$url = 'imagens/imagens-projetos/';
$imgSrc = rtrim($url, '/') . '/' . ltrim($dados['img_projeto'], '/');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset='utf-8'>
  <title><?php echo htmlspecialchars($dados['titulo_projeto']); ?></title>
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
  <link rel='stylesheet' type='text/css' media='screen' href='css/principal.css'>
  <link rel='stylesheet' type='text/css' media='screen' href='css/detalhes_projeto.css'>
</head>

<body>
  <header>
    <?php include("nav.php"); ?>
  </header>

  <main class="detalhes-projeto">
    <div class="projeto-card-novo">
      <img src="<?php echo $imgSrc; ?>" alt="Imagem do projeto">
      <h1><?php echo htmlspecialchars($dados['titulo_projeto']); ?></h1>
      <div class="autor">
        <span class="autor-nome">Por <?php echo htmlspecialchars($dados['autor_projeto']); ?></span>
        <span class="email-label">Email de contato:</span>
        <span class="email-autor"><?php echo htmlspecialchars($dados['email_pessoa']); ?></span>
      </div>
      <div class="descricao"><?php echo nl2br(htmlspecialchars($dados['descricao_projeto'])); ?></div>
    </div>
  </main>
</body>

</html>