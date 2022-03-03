<?php

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
                    <a href="login.php" id="login">
                        Inicia Sesión
                        <img src="vistas/images/svg/user/person-fill.svg" alt="Usuario" />
                    </a>
                </li>
            <?php else : ?>
                <li>
                    <a href="user.php" id="user">
                        <?= $usuario ?>
                        <img src="vistas/images/svg/user/person-fill.svg" alt="Usuario" />
                    </a>
                </li>
                <li>
                    <a href="logout.php" id="logout">
                        <img src="vistas/images/svg/user/person-x-fill.svg" alt="Usuario" />
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>