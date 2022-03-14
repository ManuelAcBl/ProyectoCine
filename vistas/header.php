<?php

$usuario = $_SESSION['usuario'] ?? '';

?>


<div class="header__main">
    <h1 class="logo">Mi cine</h1>
    <a class="button button--login navbar__open" onclick="open_navbar()">
        <img class="button__img navbar__open__img" src="/svg/justify.svg" alt="Usuario" />
    </a>
</div>
<nav>
    <ul class="navbar navbar--hidden">
        <!-- <li>
                <a class="button button--login navbar__close" onclick="close_navbar()">
                    <img class="button__img" src="/svg/cross.svg" alt="Usuario" />
                </a>
            </li> -->
        <li><a class="button" href="/peliculas">Cartelera</a></li>
        <li><a class="button" href="/conocenos">Conócenos</a></li>
        <li><a class="button" href="/carrito">Carrito</a></li>
        <?php if (!$usuario) : ?>
            <!-- <li>
                    <a href="/login" id="login">
                        Inicia Sesión
                        <img src="/svg/user/person-fill.svg" alt="Usuario" />
                    </a>
                </li> -->
            <li class="user-buttons">
                <a href="/usuario" class="button button--login">
                    Inicia Sesión
                    <img class="button__img button__img--animate" src="/svg/user/person-fill.svg" alt="Usuario" />
                </a>
            </li>
        <?php else : ?>
            <li class="user-buttons">
                <a href="/usuario" class="button button--user">
                    <?= $usuario ?>
                    <img class="button__img button__img--animate" src="/svg/user/person-fill.svg" alt="Usuario" />
                </a>

                <a href="/logout" class="button button--logout">
                    <img class="button__img button__img--animate" src="/svg/user/person-x-fill.svg" alt="Usuario" />
                </a>
            </li>
            <!-- <li>
                    <a href="/usuario" class="button button--user">
                        <?= $usuario ?>
                        <img class="button__img" src="/svg/user/person-fill.svg" alt="Usuario" />
                    </a>
                </li>
                <li>
                    <a href="/logout" class="button button--logout">
                        <img class="button__img" src="/svg/user/person-x-fill.svg" alt="Usuario" />
                    </a>
                </li> -->
            <!-- <li>
                    <a href="/usuario" id="user">
                        <?= $usuario ?>
                        <img src="/svg/user/person-fill.svg" alt="Usuario" />
                    </a>
                </li>
                <li>
                    <a href="/logout" id="logout">
                        <img src="/svg/user/person-x-fill.svg" alt="Usuario" />
                    </a>
                </li> -->
        <?php endif; ?>
    </ul>
</nav>