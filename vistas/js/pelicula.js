actualizar_sesiones(fecha.value);

async function actualizar_sesiones(fecha) {
    const id_pelicula = id.value;

    const datos = await (await fetch(`/sesiones?id_pelicula=${id_pelicula}&fecha=${fecha}`)).json();

    datos_sesiones.innerHTML = "";
    datos.forEach(sesion => {
        datos_sesiones.innerHTML += `
            <tr>
                <td>${sesion.hora}</td>
                <td>Sala ${sesion.sala}</td>
                <td>${sesion.precio.toFixed(2)} €</td>
                <td>
                    <form action="/carrito/anadir" method="post">
                        <input type="number" name="unidades" placeholder="unidades" value="1">
                        <input type="hidden" name="id" value="${sesion.id}">
                        <input type="image" src="/svg/cart-plus-fill.svg">
                    </form>
                </td>
            </tr>
        `;
    });
}
