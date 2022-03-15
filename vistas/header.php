<?php

include 'modelos/usuario.php';

?>

<div class="header__main">
    <h1 class="logo">Mi cine</h1>
    <a class="button button--login navbar__open" onclick="open_navbar()">
        <img class="button__img navbar__open__img" src="/svg/justify.svg" alt="Usuario" />
    </a>
</div>
<nav>
    <ul class="navbar navbar--hidden">
        <li><a class="button" href="/peliculas">Cartelera</a></li>
        <li><a class="button" href="/conocenos">Conócenos</a></li>
        <li><a class="button" href="/carrito">Carrito</a></li>
        <?php if (!$usuario) : ?>
            <li class="user-buttons">
                <a href="/usuario/iniciar" class="button button--login">
                    Inicia Sesión
                    <img class="button__img button__img--animate" src="/svg/user/person-fill.svg" alt="Usuario" />
                </a>
            </li>
        <?php else : ?>
            <li class="user-buttons">
                <a href="/usuario" class="button button--user">
                    <?= $usuario['nombre'] ?>
                    <img class="button__img button__img--animate" src="/svg/user/person-fill.svg" alt="Usuario" />
                </a>

                <a href="/usuario/terminar" class="button button--logout">
                    <img class="button__img button__img--animate" src="/svg/user/person-x-fill.svg" alt="Usuario" />
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>