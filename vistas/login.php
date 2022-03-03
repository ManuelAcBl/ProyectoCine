<form method="POST">
    <input type="text" name="usuario" placeholder="Usuario">
    <input type="password" name="contrasena" placeholder="Contraseña">
    <input type="submit">
    <?php if ($datos['error']) : ?>
        <p style="color: red;">Usuario o contraseña incorrectos.</p>
    <?php endif ?>
</form>