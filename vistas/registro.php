<form action="/usuario/registrar" method="post">
    <h1>Registro</h1>
    <table>
        <tr>
            <td><label for="nombre">Nombre</label></td>
            <td><input type="text" id="nombre" name="nombre" onchange="check_form()"></td>
        </tr>
        <tr>
            <td><label for="apellidos">Apellidos</label></td>
            <td><input type="text" id="apellidos" name="apellidos" onchange="check_form()"></td>
        </tr>
        <tr>
            <td><label for="telefono">Telefono</label></td>
            <td><input type="text" id="telefono" name="telefono" onchange="check_form()"></td>
        </tr>
        <tr>
            <td><label for="correo">Correo</label></td>
            <td><input type="text" id="correo" name="correo" onchange="check_form()"></td>
        </tr>
        <tr>
            <td><label for="contrasena">Contraseña</label></td>
            <td><input type="password" id="contrasena" name="contrasena" onchange="check_form()"></td>
        </tr>
        <tr>
            <td><label for="contrasena2">Repetir Contraseña</label></td>
            <td><input type="password" id="contrasena2" name="contrasena" onchange="check_form()"></td>
        </tr>
    </table>
    <div class="check">
        <label for="checkbox">Acepto los términos y condiciones.</label>
        <input type="checkbox" id="checkbox" onchange="check_form()">
    </div>

    <input type="submit" id="submit" value="Registrarse" disabled>
</form>