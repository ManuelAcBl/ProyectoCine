<form method="post">
    <h1>Inicio de Sesión</h1>

    <?php if ($datos['error'] ?? false) : ?>
        <p style="color: red;">Correo o contraseña incorrectos.</p>
    <?php endif ?>

    <table>
        <tr>
            <td><label for="correo">Correo</label></td>
            <td><input type="text" id="correo" name="correo"></td>
        </tr>
        <tr>
            <td><label for="contrasena">Contraseña</label></td>
            <td><input type="password" id="contrasena" name="contrasena"></td>
        </tr>
    </table>
    
    <input type="submit" value="Iniciar Sesión">
    <a href="/usuario/registrar">No tengo cuenta</a>
</form>