<?php

$peliculas = [
    ['codigo' => 'abc', 'titulo' => 'Prueba', 'descripcion' => 'asdasdasd'],
    ['codigo' => 'abc', 'titulo' => 'Prueba 2', 'descripcion' => 'asdasdfdsfdsgfdasd'],
    ['codigo' => 'abc', 'titulo' => 'Prueba 3', 'descripcion' => 'asdasdgczxcxzcxzcxzcasd'],
    ['codigo' => 'abc', 'titulo' => 'Prueba 4', 'descripcion' => 'asdasdzxcasd'],
    ['codigo' => 'abc', 'titulo' => 'Prueba 4', 'descripcion' => 'asdasdzxcasd'],
    ['codigo' => 'abc', 'titulo' => 'Prueba 4', 'descripcion' => 'asdasdzxcasd']
];

?>

<!-- <?php foreach ($peliculas as $pelicula) : ?>
    <a href="peliculas/<?= $pelicula['codigo'] ?>" class="pelicula__link">
        <article class="pelicula">
            <div class="pelicula__opciones">
                <a href="editarpelicula" class="pelicula__editar">
                    <img src="svg/pencil-fill.svg">
                </a>
                <a href="" class="pelicula__eliminar">
                    <img src="svg/trash-fill.svg">
                </a>
            </div>

            <img src="svg/film_image.svg" class="pelicula__imagen" />

            <div class="pelicula__texto">
                <h1 class="pelicula__titulo"><?= $pelicula['titulo'] ?></h1>
                <p class="pelicula__descripcion"><?= $pelicula['descripcion'] ?></p>
            </div>
        </article>
    </a>
<?php endforeach ?> -->

<?php foreach ($peliculas as $pelicula) : ?>
    <article class="pelicula">
        <div class="pelicula__opciones">
            <a href="editarpelicula" class="opciones__elemento">
                <img src="svg/pencil-fill.svg" alt="Editar" class="opciones__imagen opciones__imagen--editar">
            </a>
            <a href="" class="opciones__elemento">
                <img src="svg/trash-fill.svg" alt="Eliminar" class="opciones__imagen opciones__imagen--eliminar">
            </a>
        </div>

        <a href="peliculas/<?= $pelicula['codigo'] ?>" class="pelicula__link">
            <img src="svg/film_image.svg" class="pelicula__imagen" />

            <div class="pelicula__texto">
                <h1 class="pelicula__titulo"><?= $pelicula['titulo'] ?></h1>
                <p class="pelicula__descripcion"><?= $pelicula['descripcion'] ?></p>
            </div>
        </a>
    </article>
<?php endforeach ?>

<a href="editarpelicula" class="pelicula__link anadir__pelicula">
    <article class="pelicula">
        <img src="svg/film_add.svg" class="pelicula__imagen" />
    </article>
</a>