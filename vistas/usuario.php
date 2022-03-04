<?php

use manuel\cine\Usuario;

?>
<h3>Datos usuario</h3>
<form method="post" class="usuario__datos">
    <div class="usuario__dato">
        <label for="nombre" class="input__label">Nombre</label>
        <input type="text" class="input__input" id="nombre" name="nombre" value="<?= $datos['nombre'] ?>" disabled>
    </div>

    <div class="usuario__dato">
        <label for="apellidos" class="input__label">Apellidos</label>
        <input type="text" class="input__input" id="apellidos" name="apellidos" value="<?= $datos['apellidos'] ?>" disabled>
    </div>

    <div class="usuario__dato">
        <label for="dni" class="input__label">DNI</label>
        <input type="text" class="input__input" id="dni" name="dni" value="<?= $datos['dni'] ?>" disabled>
    </div>

    <div class="usuario__dato">
        <label for="telefono" class="input__label">Teléfono</label>
        <input type="text" class="input__input" id="telefono" name="telefono" value="<?= $datos['telefono'] ?>" disabled>
    </div>
    <a href="usuario/editar"><button>Editar</button></a>
</form>

<?php if (Usuario::is_admin()) : ?>
    <h3>Añadir Administrador</h3>
    <form>
        <input type="text" name="nombre">
        <input type="submit" value="Añadir">
    </form>
<?php endif ?>