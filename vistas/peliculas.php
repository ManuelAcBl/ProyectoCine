<?php

use manuel\cine\Usuario;

$peliculas = $datos['peliculas'];

?>

<?php foreach ($peliculas as $pelicula) : ?>
    <article class="pelicula">
        <?php if (Usuario::is_admin()) : ?>
            <div class="pelicula__opciones">
                <a href="/peliculas/editar/<?= $pelicula['id'] ?>" class="opciones__elemento">
                    <img src="/svg/pencil-fill.svg" alt="Editar" class="opciones__imagen opciones__imagen--editar">
                </a>
                <form action="/peliculas/eliminar" method="post" class="opciones__elemento">
                    <input type="hidden" name="id" value="<?= $pelicula['id'] ?>">
                    <input type="image" src="/svg/trash-fill.svg" alt="Eliminar" class="opciones__imagen opciones__imagen--eliminar">
                </form>
            </div>
        <?php endif ?>

        <a href="/peliculas/mostrar/<?= $pelicula['id'] ?>" class="pelicula__link">
            <img src="/peliculas/<?= $pelicula['imagen'] ?>" class="pelicula__imagen" />

            <div class="pelicula__texto">
                <h1 class="pelicula__titulo"><?= $pelicula['titulo'] ?></h1>
                <p class="pelicula__descripcion"><?= $pelicula['sinopsis'] ?></p>
            </div>
        </a>
    </article>
<?php endforeach ?>

<a href="peliculas/editar" class="pelicula__link anadir__pelicula">
    <article class="pelicula">
        <img src="/peliculas/anadir.png" class="pelicula__imagen" />
    </article>
</a>