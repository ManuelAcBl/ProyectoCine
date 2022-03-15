<?php

$usuario = $datos['usuario'];

?>

<section>
    <h2>Datos Usuario</h2>
    <table>
        <tr>
            <td><label for="nombre">Nombre</label></td>
            <td><input type="text" id="nombre" name="nombre" value="<?= $usuario['nombre'] ?>" disabled></td>
        </tr>
        <tr>
            <td><label for="apellidos">Apellidos</label></td>
            <td><input type="text" id="apellidos" name="apellidos" value="<?= $usuario['apellidos'] ?>" disabled></td>
        </tr>
        <tr>
            <td><label for="telefono">Telefono</label></td>
            <td><input type="text" id="telefono" name="telefono" value="<?= $usuario['telefono'] ?>" disabled></td>
        </tr>
        <tr>
            <td><label for="correo">Correo</label></td>
            <td><input type="text" id="correo" name="correo" value="<?= $usuario['correo'] ?>" disabled></td>
        </tr>
        <tr>
            <td><a href="/usuario/editar">Editar Datos</a></td>
        </tr>
    </table>
</section>

<?php if ($usuario['admin']) : ?>
    <section>
        <h2>Añadir Admin</h2>
        <form action="usuario/anadir_admin" method="post">
            <table>
                <tr>
                    <td><label for="correo">Correo</label></td>
                    <td><input type="text" id="correo" name="correo"></td>
                    <td><input type="submit" value="Añadir"></td>
                </tr>
            </table>
        </form>
    </section>

    <section>
        <h2>Datos Usuarios</h2>
        <table class="tabla_usuarios">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Ultimo Acceso</th>
                    <th>Admin</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos['usuarios'] as $usuario) : ?>
                    <tr>
                        <td><?= $usuario['nombre'] ?></td>
                        <td><?= $usuario['apellidos'] ?></td>
                        <td><?= $usuario['telefono'] ?></td>
                        <td><?= $usuario['correo'] ?></td>
                        <td><?= $usuario['ultimo_acceso'] ?></td>
                        <td><?= $usuario['admin'] ? 'Sí' : 'No' ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </section>
<?php endif ?>



<!-- <h3>Datos usuario</h3>
<form action="/editar" method="post" class="usuario__datos">
    <div class="usuario__dato">
        <label for="nombre" class="input__label">Nombre</label>
        <input type="text" class="input__input" id="nombre" name="nombre" value="<?= $usuario['nombre'] ?>" <?= $disabled ?>>
    </div>

    <div class="usuario__dato">
        <label for="apellidos" class="input__label">Apellidos</label>
        <input type="text" class="input__input" id="apellidos" name="apellidos" value="<?= $usuario['apellidos'] ?>" <?= $disabled ?>>
    </div>

    <div class="usuario__dato">
        <label for="telefono" class="input__label">Teléfono</label>
        <input type="text" class="input__input" id="telefono" name="telefono" value="<?= $usuario['telefono'] ?>" <?= $disabled ?>>
    </div>

    <div class="usuario__dato">
        <label for="correo" class="input__label">Correo</label>
        <input type="text" class="input__input" id="correo" name="correo" value="<?= $usuario['correo'] ?>" <?= $disabled ?>>
    </div>

    <?php if ($datos['editar']) : ?>
        <input type="submit" value="Guardar">
        <a href="/usuario">Descartar</a>
    <?php else : ?>
        <a href="/usuario/editar">Editar</a>
    <?php endif ?>

</form> -->

<!-- <?php if ($usuario['admin']) : ?>
    <h3>Añadir Administrador</h3>
    <form>
        <input type="text" name="nombre">
        <input type="submit" value="Añadir">
    </form>
<?php endif ?> -->