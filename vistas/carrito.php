<?php

use manuel\cine\Usuario;

$sesiones = $datos['sesiones'];

?>

<h1>Carrito</h1>

<?php if ($sesiones) : ?>
    <table>
        <thead>
            <tr>
                <th>Película</th>
                <th>Sala</th>
                <th>Hora</th>
                <th>Precio</th>
                <th>Uds.</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sesiones as $sesion) : ?>
                <tr>
                    <td><?= $sesion['titulo'] ?></td>
                    <td><?= $sesion['sala'] ?></td>
                    <td><?= $sesion['fecha'] ?></td>
                    <td><?= number_format($sesion['precio'], 2) ?> €</td>
                    <td><?= $sesion['unidades'] ?></td>
                    <td>
                        <form action="/carrito/eliminar" method="post">
                            <input type="hidden" name="id" value="<?= $sesion['id'] ?>">
                            <input type="image" src="/svg/trash-fill.svg" alt="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <?php if (Usuario::sesion_iniciada()) : ?>
        <a href="/comprar" class="button button--user">
            Comprar
        </a>
    <?php else : ?>
        <p>Tienes que iniciar sesión para completar tu pedido.</p>
    <?php endif ?>
<?php else : ?>
    <p>El carrito está vacío.</p>
<?php endif ?>