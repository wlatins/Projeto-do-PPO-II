<?php
if ($_SESSION['logado']) {
    ?>
    <style>
        .perfil:focus,
        .perfil:active,
        .dropdown-toggle:focus,
        .dropdown-toggle:active,
        .dropdown-toggle.show,
        .dropdown-toggle:focus-visible {
            outline: none !important;
            box-shadow: none !important;
            border: none !important;
        }

        .dropdown-menu {
            background: #1B262C;
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 24px #0008;
            min-width: 160px;
            padding: 0.5rem 0;
        }

        .dropdown-menu .dropdown-item {
            color: #FFF;
            font-family: "Poppins", sans-serif;
            font-size: 1rem;
            padding: 0.75rem 1.5rem;
            transition: background 0.2s, color 0.2s;
        }

        .dropdown-menu .dropdown-item:hover,
        .dropdown-menu .dropdown-item:focus {
            background: #0F6292;
            color: #4FD1C5;
            border-radius: 8px;
        }
    </style>
    <nav>
        <ul>
            <li class="nav-item"><a href="index.php">Home</a></li>
            <li class="nav-item"><a href="quem_somos.php">Quem Somos?</a></li>
            <li class="nav-item"><a href="projetospg.php">Projetos</a></li>
            <li class="nav-item"><a href="criarprojeto.php">Publique Aqui</a></li>

        </ul>
    </nav>
    <div class="dropdown">
        <a class="btn dropdown-toggle p-0 border-0 bg-transparent" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false" style="box-shadow:none;">
            <img src="imagens/icon.webp" alt="Perfil" class="perfil"
                style="width:40px; height:40px; border-radius:50%; object-fit:cover;">
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="perfil.php">Perfil</a></li>
            <li><a class="dropdown-item" href="logout.php" id="deslogar">Deslogar</a></li>
        </ul>
    </div>
    <?php
} else {
    ?>
    <style>
        ul {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }
    </style>
    <nav>
        <ul>
            <li class="nav-item"><a href="index.php">Home</a></li>
            <li class="nav-item"><a href="quem_somos.php">Quem Somos?</a></li>
            <li class="nav-item"><a href="projetospg.php">Projetos</a></li>
            <li class="nav-item"><a href="criarprojeto.php">Publique Aqui</a></li>

        </ul>
    </nav>
    <div>
        <ul>
            <li class="log-in"><a href="loginpg.php">Clique aqui para logar!</a></li>
        </ul>
    </div>
    <?php
}
?>