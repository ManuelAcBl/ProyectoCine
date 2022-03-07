<?php

$disabled = $datos['editar'] ? '' : 'disabled';
$usuario = $datos['usuario'];

?>

<h3>Datos usuario</h3>
<form action="<?= $datos['URL'] ?>editar" method="post" class="usuario__datos">
    <div class="usuario__dato">
        <label for="nombre" class="input__label">Nombre</label>
        <input type="text" class="input__input" id="nombre" name="nombre" value="<?= $usuario['nombre'] ?>" <?= $disabled ?>>
    </div>

    <div class="usuario__dato">
        <label for="apellidos" class="input__label">Apellidos</label>
        <input type="text" class="input__input" id="apellidos" name="apellidos" value="<?= $usuario['apellidos'] ?>" <?= $disabled ?>>
    </div>

    <div class="usuario__dato">
        <label for="dni" class="input__label">DNI</label>
        <input type="text" class="input__input" id="dni" name="dni" value="<?= $usuario['dni'] ?>" <?= $disabled ?>>
    </div>

    <div class="usuario__dato">
        <label for="telefono" class="input__label">Teléfono</label>
        <input type="text" class="input__input" id="telefono" name="telefono" value="<?= $usuario['telefono'] ?>" <?= $disabled ?>>
    </div>

    <div class="usuario__dato">
        <label for="correo" class="input__label">Correo</label>
        <input type="text" class="input__input" id="correo" name="correo" value="<?= $usuario['correo'] ?>" <?= $disabled ?>>
    </div>

    <input type="hidden" name="usuario" value="<?= $usuario['usuario'] ?>">

    <?php if ($datos['editar']) : ?>
        <input type="submit" value="Guardar">
        <a href="<?= $datos['URL'] ?>usuario">Descartar</a>
    <?php else : ?>
        <a href="<?= $datos['URL'] ?>usuario/editar">Editar</a>
    <?php endif ?>

</form>

<?php if ($datos['admin']) : ?>
    <h3>Añadir Administrador</h3>
    <form>
        <input type="text" name="nombre">
        <input type="submit" value="Añadir">
    </form>
<?php endif ?>