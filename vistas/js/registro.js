const inputs = [nombre, apellidos, telefono, correo, contrasena, contrasena2];

function check_form() {
    submit.disabled = !(inputs.every(element => element.value) && (contrasena.value == contrasena2.value) && (checkbox.checked));
}