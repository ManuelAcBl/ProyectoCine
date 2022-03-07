<form method="POST">
    <input type="text" name="usuario" placeholder="Usuario">
    <input type="password" name="contrasena" placeholder="Contraseña">
    <input type="submit">
    <?php if ($datos['error'] ?? false) : ?>
        <p style="color: red;">Usuario o contraseña incorrectos.</p>
    <?php endif ?>
</form>

<a href="registro">No tengo cuenta</a>