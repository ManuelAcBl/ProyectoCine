<?php

$usuario = $_SESSION['usuario'] ?? '';

?>

<header>
    <h1>Mi cine</h1>
    <nav>
        <ul>
            <li><a href="peliculas">Cartelera</a></li>
            <li><a href="cines">Cines</a></li>
            <li><a href="conocenos">Conócenos</a></li>
            <?php if (!$usuario) : ?>
                <li>
                    <a href="login" id="login">
                        Inicia Sesión
                        <img src="svg/user/person-fill.svg" alt="Usuario" />
                    </a>
                </li>
            <?php else : ?>
                <li>
                    <a href="usuario" id="user">
                        <?= $usuario ?>
                        <img src="svg/user/person-fill.svg" alt="Usuario" />
                    </a>
                </li>
                <li>
                    <a href="logout" id="logout">
                        <img src="svg/user/person-x-fill.svg" alt="Usuario" />
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>