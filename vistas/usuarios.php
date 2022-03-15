<?php


?>

<table>
    <thead>
        <tr>
            <th onclick="ordenar('nombre')">Nombre</th>
            <th onclick="ordenar('apellidos')">Apellidos</th>
            <th onclick="ordenar('telefono')">Teléfono</th>
            <th onclick="ordenar('correo')">Correo</th>
            <th onclick="ordenar('ultimo_acceso')">Ultimo Acceso</th>
            <th onclick="ordenar('admin')">Admin</th>
        </tr>
    </thead>
    <tbody id="datos_usuarios">
        <!-- <?php foreach ($usuarios as $usuario) : ?>
            <tr>
                <td><?= $usuario['nombre'] ?></td>
                <td><?= $usuario['apellidos'] ?></td>
                <td><?= $usuario['telefono'] ?></td>
                <td><?= $usuario['correo'] ?></td>
                <td><?= $usuario['ultimo_acceso'] ?></td>
                <td><?= $usuario['admin'] ?></td>
            </tr>
        <?php endforeach ?> -->
    </tbody>
</table>