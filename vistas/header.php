<?php

include 'modelos/usuario.php';

$provincias = ["Pontevedra", "Orense", "La Coruña", "Lugo"];

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
        <li><a class="button" href="/conocenos">Cines</a></li>
        <!-- <li><a class="button" href="/carrito">Carrito</a></li> -->
        <li class="button location">
            <select id="location_selector" onchange="update_peliculas()" class="location__selector">
                    <option value="pontevedra">Pontevedra</option>
                    <option value="orense">Orense</option>
                    <option value="coruna">La Coruña</option>
                    <option value="lugo">Lugo</option>
            </select>
            <img class="button__img button__img--animate" src="/svg/location.svg" alt="Usuario" />
        </li>
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