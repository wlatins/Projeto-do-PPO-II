<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['logado']) && $_SESSION['logado']) {
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

        .nav-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            width: 100%;
            padding: 0 2rem;
            display: flex;
            gap: 2.5rem;
            font-weight: 500;
            font-size: 1.1rem;
            list-style: none;
        }

        .nav-left {
            display: flex;
            align-items: center;
            text-transform: uppercase;
        }

        .nav-left ul {
            display: flex;
            gap: 2rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 1.2rem;
        }

        @media (max-width: 900px) {
            .nav-bar {
                flex-direction: column;
                align-items: stretch;
                gap: 0.5rem;
                padding: 0 0.5rem;
            }

            .nav-left ul {
                gap: 1rem;
            }

            .nav-right {
                justify-content: flex-end;
                gap: 0.5rem;
            }
        }
    </style>
    <div class="nav-bar">
        <div class="nav-left">
            <nav>
                <ul>
                    <li class="nav-item"><a href="index.php">Home</a></li>
                    <li class="nav-item"><a href="quem_somos.php">Quem Somos?</a></li>
                    <li class="nav-item"><a href="projetospg.php">Projetos</a></li>
                    <li class="nav-item"><a href="criarprojeto.php">Publique Aqui</a></li>
                </ul>
            </nav>
        </div>
        <div class="nav-right">
            <div class="barra_de_pesquisa">
                <input placeholder="Pesquise aqui" class="texto_da_pesquisa">
                <img class="icone" src="imagens/lupa.png" alt="Pesquisar">
            </div>
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
        </div>
    </div>
    <?php
} else {
    ?>
    <style>
        .nav-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            width: 100%;
            padding: 0 2rem;
        }

        .nav-left {
            display: flex;
            align-items: center;
            text-transform: uppercase;
        }

        .nav-left ul {
            display: flex;
            gap: 2rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 1.2rem;
        }

        @media (max-width: 900px) {
            .nav-bar {
                flex-direction: column;
                align-items: stretch;
                gap: 0.5rem;
                padding: 0 0.5rem;
            }

            .nav-left ul {
                gap: 1rem;
            }

            .nav-right {
                justify-content: flex-end;
                gap: 0.5rem;
            }
        }
    </style>
    <div class="nav-bar">
        <div class="nav-left">
            <nav>
                <ul>
                    <li class="nav-item"><a href="index.php">Home</a></li>
                    <li class="nav-item"><a href="quem_somos.php">Quem Somos?</a></li>
                    <li class="nav-item"><a href="projetospg.php">Projetos</a></li>
                    <li class="nav-item"><a href="criarprojeto.php">Publique Aqui</a></li>
                </ul>
            </nav>
        </div>
        <div class="nav-right">
            <div class="barra_de_pesquisa">
                <input placeholder="Pesquise aqui" class="texto_da_pesquisa">
                <img class="icone" src="imagens/lupa.png" alt="Pesquisar">
            </div>
            <ul style="list-style: none; margin: 0; padding: 0;">
                <li class="log-in"><a href="loginpg.php">Clique aqui para logar!</a></li>
            </ul>
        </div>
    </div>
    <?php
}
?>