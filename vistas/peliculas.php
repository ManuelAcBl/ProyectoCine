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

<?php foreach ($peliculas as $pelicula) : ?>
    <a href="peliculas/<?= $pelicula['codigo'] ?>" class="pelicula">
        <article href="">
            <img src="svg/film_image.svg" class="pelicula__imagen" />

            <div class="pelicula__texto">
                <h1 class="pelicula__titulo"><?= $pelicula['titulo'] ?></h1>
                <p class="pelicula__descripcion"><?= $pelicula['descripcion'] ?></p>
            </div>
        </article>
    </a>
<?php endforeach; ?>

<a href="peliculas/anadir" class="pelicula anadir__pelicula">
    <article href="">
        <img src="svg/film_add.svg" class="pelicula__imagen" />
    </article>
</a>