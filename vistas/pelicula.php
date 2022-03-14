<?php

use manuel\cine\DB;

$pelicula = DB::run('SELECT * FROM peliculas WHERE id = ?', [$_GET['action']])->fetch();

$fecha = date('Y-m-d');

//$sesiones = DB::run('')->fetchAll();

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
                <input type="date" name="fecha" id="fecha" value="<?= $fecha ?>" class="seleccion__input">
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Sala</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>15:00</td>
                        <td>17:00</td>
                        <td>2</td>
                        <td><a href="carrito"><img class="imagen-carrito" src="/svg/cart-plus-fill.svg" alt=""></a></td>
                    </tr>
                    <tr>
                        <td>15:00</td>
                        <td>17:00</td>
                        <td>2</td>
                        <td><a href="carrito"><img class="imagen-carrito" src="/svg/cart-plus-fill.svg" alt=""></a></td>
                    </tr>
                    <tr>
                        <td>15:00</td>
                        <td>17:00</td>
                        <td>2</td>
                        <td><a href="carrito"><img class="imagen-carrito" src="/svg/cart-plus-fill.svg" alt=""></a></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</article>


<!-- <article class="pelicula">
    <div class="pelicula__opciones">
        <a href="/editarpelicula" class="opciones__elemento">
            <img src="/svg/pencil-fill.svg" alt="Editar" class="opciones__imagen opciones__imagen--editar">
        </a>
        <a href="" class="opciones__elemento">
            <img src="/svg/trash-fill.svg" alt="Eliminar" class="opciones__imagen opciones__imagen--eliminar">
        </a>
    </div>

    <img src="/peliculas/<?= $pelicula['imagen'] ?>" class="pelicula__imagen" />

    <div class="pelicula__texto">
        <h1 class="pelicula__titulo"><?= $pelicula['titulo'] ?></h1>
        <p class="pelicula__descripcion"><?= $pelicula['sinopsis'] ?></p>
    </div>
</article> -->