<?php

use manuel\cine\Utils;

$usuario = $_SESSION['usuario'] ?? '';

?>

<header>
    <h1>Mi cine</h1>
    <nav>
        <ul>
            <li><a href="peliculas.php">Cartelera</a></li>
            <li><a href="#">Cines</a></li>
            <li><a href="#">Conócenos</a></li>
            <?php if (!$usuario) : ?>
                <li>
                    <a href="login" id="login">
                        Inicia Sesión
                        <img src="<?= Utils::PROJECT_URL ?>vistas/images/svg/user/person-fill.svg" alt="Usuario" />
                    </a>
                </li>
            <?php else : ?>
                <li>
                    <a href="user" id="user">
                        <?= $usuario ?>
                        <img src="<?= Utils::PROJECT_URL ?>vistas/images/svg/user/person-fill.svg" alt="Usuario" />
                    </a>
                </li>
                <li>
                    <a href="logout" id="logout">
                        <img src="<?= Utils::PROJECT_URL ?>vistas/images/svg/user/person-x-fill.svg" alt="Usuario" />
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>