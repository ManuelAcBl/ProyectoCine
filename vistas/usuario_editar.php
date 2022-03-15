<?php

$usuario = $datos['usuario'];

?>

<h2>Datos Usuario</h2>
<form action="/usuario/editar" method="post">
    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
    <table>
        <tr>
            <td><label for="nombre">Nombre</label></td>
            <td><input type="text" id="nombre" name="nombre" value="<?= $usuario['nombre'] ?>"></td>
        </tr>
        <tr>
            <td><label for="apellidos">Apellidos</label></td>
            <td><input type="text" id="apellidos" name="apellidos" value="<?= $usuario['apellidos'] ?>"></td>
        </tr>
        <tr>
            <td><label for="telefono">Telefono</label></td>
            <td><input type="text" id="telefono" name="telefono" value="<?= $usuario['telefono'] ?>"></td>
        </tr>
        <tr>
            <td><label for="correo">Correo</label></td>
            <td><input type="text" id="correo" name="correo" value="<?= $usuario['correo'] ?>"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Guardar"></td>
        </tr>
    </table>
</form>