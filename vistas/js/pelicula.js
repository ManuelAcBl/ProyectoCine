// actualizar_sesiones(fecha.value);

// async function actualizar_sesiones(fecha) {
//     const id_pelicula = id.value;

//     const datos = await (await fetch(`/sesiones?id_pelicula=${id_pelicula}&fecha=${fecha}`)).json();

//     datos_sesiones.innerHTML = "";
//     datos.forEach(sesion => {
//         datos_sesiones.innerHTML += `
//             <tr>
//                 <td>${sesion.hora}</td>
//                 <td>Sala ${sesion.sala}</td>
//                 <td>${sesion.precio.toFixed(2)} €</td>
//                 <td>
//                     <form action="/carrito/anadir" method="post">
//                         <input type="number" name="unidades" placeholder="unidades" value="1">
//                         <input type="hidden" name="id" value="${sesion.id}">
//                         <input type="image" src="/svg/cart-plus-fill.svg">
//                     </form>
//                 </td>
//             </tr>
//         `;
//     });
// }

//
//  GALICINE
//

const API = "https://galicine.com/panel/api";
const key = "bf6b7f41-f168-4b86-af30-8c8c8622a676";

const Cines = {
    //PONTEVEDRA: { id: "cine-pontevedra", num: 48 },
    VIGO: { id: "cine-vigo", num: 19 },
    VILLAGARCIA: { id: "cine-vilagarcia", num: 11 },
    CARBALLO: { id: "cine-carballo", num: 9 },
    RIBEIRA: { id: "cine-ribeira", num: 14 },
    MONFORTE: { id: "cine-monforte", num: 13 },
    ORENSE: { id: "cine-ourense", num: 52 },
};

const Provincias = {
    PONTEVEDRA: [Cines.VILLAGARCIA],
    CORUNA: [Cines.CARBALLO, Cines.RIBEIRA],
    ORENSE: [Cines.ORENSE],
    LUGO: [Cines.MONFORTE],
};

async function get_peliculas(...cines) {
    const peliculas = [];

    for (const cine of cines) {
        const url = `${API}/pelicula/index/listado/${cine.id}`;

        const response = await (await fetch(url)).json();

        for (const pelicula of response) {
            if (!peliculas.some(pel => pelicula.idGalicine == pel.id))
                peliculas.push({
                    id: pelicula.slug,
                    titulo: pelicula.titulo,
                });
        }
    }

    return peliculas;
}

async function datos_cine(cine) {
    const url = `${API}/cine/index/cine/${cine.id}`;

    const response = await (await fetch(url)).json();

    return {
        nombre: response.tituloCompleto.substring(3, 2).toUpperCase() + response.tituloCompleto.substring(3),
        direccion: response.direccion,
    };
}

async function get_sesiones(cine, id_pelicula, fecha) {
    const url = `${API}/reservaentradas/index/sesiones/${cine.num}/${id_pelicula}/${key}`;

    const response = await (await fetch(url)).json();

    const sesiones = [];

    for (const dia of Object.values(response.sesiones)) for (const sesion of dia) if (sesion.fecha == fecha) sesiones.push(sesion);

    const promises = [];

    for (const sesion of sesiones) promises.push(datos_sesion(cine, sesion.id));

    await Promise.all(promises);

    const datos = [];
    for (const promise of promises) await promise.then(res => datos.push(res));

    const devolver = [];

    for (let y = 0; y < sesiones.length; y++)
        devolver.push({
            id: sesiones[y].id,
            fecha: sesiones[y].fecha,
            hora: sesiones[y].hora.slice(1),
            ...datos[y],
        });

    return devolver;

    // const sesiones = [],
    //     promises = [];

    // for (const dia of Object.values(response.sesiones))
    //     for (const sesion of dia)
    //         if(sesion.fecha == fecha)
    //             promises.push(datos_sesion(cine, sesion.id));

    // await Promise.all(promises);

    // const datos = [];

    // for (const promise of promises) await promise.then(res => datos.push(res));

    // for (const dia of Object.values(response.sesiones)) {
    //     for (let y = 0; y < dia.length; y++)
    //         if(dia[y].fecha == fecha)
    //         sesiones.push({
    //             id: dia[y].id,
    //             fecha: dia[y].fecha,
    //             hora: dia[y].hora.slice(1),
    //             ...datos[y],
    //         });
    // }

    // return sesiones;
}

async function datos_sesion(cine, id_sesion) {
    const url = `${API}/reservaentradas/index/plano/${cine.num}/${id_sesion}/${key}`;

    const response = await (await fetch(url)).json();

    let precio;
    
    if(response.plano)
        precio = response.plano[0].Importe;

    return {
        aforo: response.aforo,
        disponibles: response.disponibles,
        precio: precio,
    };
}

async function datos_pelicula_galicine(slug) {
    const url = `${API}/pelicula/index/pelicula/${slug}`;

    const response = await (await fetch(url)).json();

    return {
        id: response.idGalicine,
        titulo: response.titulo,
    };
}

//
// IMDB
//

async function datos_pelicula(nombre) {
    const url = `https://api.themoviedb.org/3/search/movie?api_key=7aa7896ce87a74422b386789f948cf5d&language=es-ES&page=1&include_adult=false&query="${nombre}"`;

    const response = await (await fetch(url)).json();

    const pelicula = response.results[0];

    if (pelicula == null) return null;

    return {
        titulo: pelicula.title,
        imagen: `https://image.tmdb.org/t/p/w500${pelicula.poster_path}`,
        descripcion: pelicula.overview,
    };
}

const id_pelicula = /[^/]*$/.exec(window.location.href)[0];

let id;

datos_pelicula_galicine(id_pelicula).then(datos => {
    datos_pelicula(datos.titulo).then(async pelicula => {
        const main = document.getElementsByTagName("main")[0];

        main.innerHTML = `
            <article class="pelicula">
                <img src="${pelicula.imagen}" class="pelicula__imagen" />

                <div class="pelicula__info">
                    <div class="pelicula__texto">
                        <h1 class="pelicula__titulo">${pelicula.titulo}</h1>
                        <p class="pelicula__descripcion">${pelicula.descripcion}</p>
                    </div>

                    <div class="horario">
                        <div class="seleccion">
                            <label for="fecha" class="seleccion__label">Día</label>
                            <input type="date" name="fecha" id="selector_fecha" onchange="update_peliculas()" value="${get_raw_fecha()}" class="seleccion__input">
                            <input type="hidden" id="id" value="<?= $pelicula['id'] ?>">
                        </div>

                        <table id="tabla_sesiones">
                            <thead>
                                <tr>
                                    <th>Cine</th>
                                    <th>Hora</th>
                                    <th>Precio</th>
                                    <th>Butacas disponibles</th>
                                </tr>
                            </thead>
                            <tbody id="datos_sesiones">
                            </tbody>
                        </table>
                    </div>

                </div>
            </article>
        `;

        id = datos.id;

        update_peliculas();
    });
});

function get_fecha() {
    const fecha = new Date(selector_fecha.value).toLocaleDateString().split("/");

    return `${fecha[0].padStart(2, "0")}/${fecha[1].padStart(2, "0")}/${fecha[2].padStart(4, "0")}`;
}

function get_raw_fecha() {
    const fecha = new Date().toLocaleDateString().split("/");

    return `${fecha[2].padStart(4, "0")}-${fecha[1].padStart(2, "0")}-${fecha[0].padStart(2, "0")}`;
}

async function update_peliculas() {
    datos_sesiones.innerHTML = "";

    for (const id_cine of Provincias[location_selector.value.toUpperCase()]) {
        const sesiones = await get_sesiones(id_cine, id, get_fecha());

        const cine = await datos_cine(id_cine);

        if(sesiones.length == 0)
            datos_sesiones.innerHTML += `
                <tr>
                    <td>${cine.nombre}</td>
                    <td colspan="3">No hay sesiones</td>
                </tr>
            `;

        for (let y = 0; y < sesiones.length; y++) {
            const sesion = sesiones[y];

            let precio = "";

            if(sesion.precio)
                precio = sesion.precio.toFixed(2) + " €";

            let html = "<tr>";

            if (y == 0)
                html += `
                    <td rowspan="${sesiones.length}">${cine.nombre}</td>
                `;

            html += `
                    <td>${sesion.hora}</td>
                    <td>${precio}</td>
                    <td>${sesion.disponibles}/${sesion.aforo}</td>
                </tr>
            `;

            datos_sesiones.innerHTML += html;
        }
    }
}
