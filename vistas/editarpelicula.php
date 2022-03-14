<?php

$titulo = $_POST['titulo'] ?? 'asdsad';
$descripcion = $_POST['descripcion'] ?? 'asdasdsad fdsafsa asdfafd';



?>

<link rel="stylesheet" href="/peliculas.css">
<section class="editar">
    <section class="editar__formulario">
        <form action="" method="post">
            <div class="formulario__element">
                <label for="titulo" class="formulario__label">Título</label>
                <input type="text" name="titulo" id="titulo" class="formulario__input">
            </div>
            <div class="formulario__element">
                <label for="descripcion" class="formulario__label">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" class="formulario__input">
            </div>
            <div class="formulario__element">
                <label for="portada" class="formulario__label">Portada</label>
                <input type="file" name="portada" id="portada" class="formulario__input">
            </div>
            <input type="submit" class="formulario__submit">
        </form>
    </section>
    <section class="editar__previsualizacion">
        <article class="pelicula">
            <img src="/svg/film_image.svg" class="pelicula__imagen" />

            <div class="pelicula__texto">
                <h1 class="pelicula__titulo"><?= $titulo ?></h1>
                <p class="pelicula__descripcion"><?= $descripcion ?></p>
            </div>
        </article>
    </section>
</section>