<?php

// $peliculas = [
//     ['codigo' => 'abc', 'titulo' => 'Prueba', 'descripcion' => 'asdasdasd', 'imagen' => 'batman.jpg'],
//     ['codigo' => 'abc', 'titulo' => 'Prueba 2', 'descripcion' => 'asdasdfdsfdsgfdasd', 'imagen' => 'boba_fett.jpg'],
//     ['codigo' => 'abc', 'titulo' => 'Prueba 3', 'descripcion' => 'asdasdgczxcxzcxzcxzcasd', 'imagen' => 'casate_conmigo.jpg'],
//     ['codigo' => 'abc', 'titulo' => 'Prueba 4', 'descripcion' => 'asdasdzxcasd', 'imagen' => 'cyrano.jpg'],
//     ['codigo' => 'abc', 'titulo' => 'Prueba 4', 'descripcion' => 'asdasdzxcasd', 'imagen' => 'dog_viaje_salvaje.jpg'],
//     ['codigo' => 'abc', 'titulo' => 'Prueba 4', 'descripcion' => 'asdasdzxcasd', 'imagen' => 'muerte_nilo.jpg'],
//     ['codigo' => 'abc', 'titulo' => 'Prueba 4', 'descripcion' => 'asdasdzxcasd', 'imagen' => 'luz_negra.jpg']
// ];

use manuel\cine\DB;

$peliculas = DB::run("SELECT * FROM peliculas");

?>

<?php foreach ($peliculas as $pelicula) : ?>
    <article class="pelicula">
        <div class="pelicula__opciones">
            <a href="/editarpelicula" class="opciones__elemento">
                <img src="/svg/pencil-fill.svg" alt="Editar" class="opciones__imagen opciones__imagen--editar">
            </a>
            <a href="" class="opciones__elemento">
                <img src="/svg/trash-fill.svg" alt="Eliminar" class="opciones__imagen opciones__imagen--eliminar">
            </a>
        </div>

        <a href="/pelicula/<?= $pelicula['id'] ?>" class="pelicula__link">
            <img src="/peliculas/<?= $pelicula['imagen'] ?>" class="pelicula__imagen" />

            <div class="pelicula__texto">
                <h1 class="pelicula__titulo"><?= $pelicula['titulo'] ?></h1>
                <p class="pelicula__descripcion"><?= $pelicula['sinopsis'] ?></p>
            </div>
        </a>
    </article>
<?php endforeach ?>

<a href="editarpelicula" class="pelicula__link anadir__pelicula">
    <article class="pelicula">
        <img src="/svg/film_add.svg" class="pelicula__imagen" />
    </article>
</a>