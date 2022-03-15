<?php

// $titulo = $_POST['titulo'] ?? 'asdsad';
// $descripcion = $_POST['descripcion'] ?? 'asdasdsad fdsafsa asdfafd';

$pelicula = $datos['pelicula'];

$imagen = isset($pelicula['imagen']) ? "/peliculas/$pelicula[imagen]" : '/svg/film_image.svg';

?>

<h2>Editar Película</h2>
<section class="editar">
    <section class="editar__formulario">
        <form action="/peliculas/<?= isset($pelicula['id']) ? 'editar' : 'anadir' ?>" method="post">
            <input type="hidden" name="id" value="<?= $pelicula['id'] ?? '' ?>">
            <table>
                <tr>
                    <td><label for="titulo">Título</label></td>
                    <td><input type="text" id="titulo" name="titulo" onchange="actualizar_previsualizacion()" value="<?= $pelicula['titulo'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="sinopsis">Sinopsis</label></td>
                    <td><input type="text" id="sinopsis" name="sinopsis" onchange="actualizar_previsualizacion()" value="<?= $pelicula['sinopsis'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="imagen">Imagen</label></td>
                    <td><input type="file" id="imagen" name="imagen"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Guardar"></td>
                </tr>
            </table>


            <!-- <div class="formulario__element">
                <label for="titulo" class="formulario__label">Título</label>
                <input type="text" name="titulo" id="titulo" onchange="actualizar_previsualizacion()" class="formulario__input" value="<?= $pelicula['titulo'] ?? '' ?>">
            </div>
            <div class="formulario__element">
                <label for="sinopsis" class="formulario__label">Sinopsis</label>
                <input type="text" name="sinopsis" id="sinopsis" onchange="actualizar_previsualizacion()" class="formulario__input" value="<?= $pelicula['sinopsis'] ?? '' ?>">
            </div>
            <div class="formulario__element">
                <label for="imagen" class="formulario__label">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="formulario__input">
            </div>
            <input type="hidden" name="id" value="<?= $pelicula['id'] ?? '' ?>">
            <input type="submit" class="formulario__submit"> -->
        </form>
    </section>
    <section class="editar__previsualizacion">
        <article class="pelicula">
            <img src="<?= $imagen ?>" class="pelicula__imagen" />

            <div class="pelicula__texto">
                <h1 class="pelicula__titulo" id="prev_titulo"></h1>
                <p class="pelicula__descripcion" id="prev_sinopsis"></p>
            </div>
        </article>
    </section>
</section>