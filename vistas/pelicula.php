<?php

$pelicula = $datos['pelicula'];

?>

<article class="pelicula">
    <img src="/peliculas/<?= $pelicula['imagen'] ?>" class="pelicula__imagen" />

    <div class="pelicula__info">
        <div class="pelicula__texto">
            <h1 class="pelicula__titulo"><?= $pelicula['titulo'] ?></h1>
            <p class="pelicula__descripcion"><?= $pelicula['sinopsis'] ?></p>
        </div>

        <div class="horario">
            <div class="seleccion">
                <label for="fecha" class="seleccion__label">Día</label>
                <input type="date" name="fecha" id="fecha" onchange="actualizar_sesiones(this.value)" value="<?= date('Y-m-d') ?>" class="seleccion__input">
                <input type="hidden" id="id" value="<?= $pelicula['id'] ?>">
            </div>

            <table id="tabla_sesiones">
                <thead>
                    <tr>
                        <th>Inicio</th>
                        <th>Sala</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody id="datos_sesiones">
                </tbody>
            </table>
        </div>

    </div>
</article>