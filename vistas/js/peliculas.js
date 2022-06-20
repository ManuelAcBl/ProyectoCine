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

async function get_sesiones(cine, id_pelicula) {
    const url = `${API}/reservaentradas/index/sesiones/${cine.num}/${id_pelicula}/${key}`;

    const response = await (await fetch(url)).json();

    const sesiones = [],
        promises = [];

    for (const dia of Object.values(response.sesiones)) for (const sesion of dia) promises.push(datos_sesion(cine, sesion.id));

    await Promise.all(promises);

    const datos = [];

    for (const promise of promises) await promise.then(res => datos.push(res));

    for (const dia of Object.values(response.sesiones)) {
        for (let y = 0; y < dia.length; y++)
            sesiones.push({
                id: dia[y].id,
                fecha: dia[y].fecha,
                hora: dia[y].hora.slice(1),
                ...datos[y],
            });
    }

    return sesiones;
}

async function datos_sesion(cine, id_sesion, callback) {
    const url = `${API}/reservaentradas/index/plano/${cine.num}/${id_sesion}/${key}`;

    const response = await (await fetch(url)).json();

    return {
        aforo: response.aforo,
        disponibles: response.disponibles,
        precio: response.plano[0].Importe,
    };
}

async function datos_pelicula_galicine(slug) {
    const url = `${API}/pelicula/index/pelicula/${id}`;

    const response = await (await fetch(url)).json();

    return {
        id: response.idGalicine,
        titulo: response.titulo
    };
}

//
// YELMO CINES
//

const URL_YEMLO = "https://www.yelmocines.es";

const Provincias_yelmo = {
    PONTEVEDRA: "pontevedra",
    CORUNA: "a-coruna",
    LUGO: "lugo",
    ORENSE: "",
};

async function get_peliculas_yelmo(provincia) {
    const url = `${URL_YEMLO}/cartelera/${provincia}`;

    const response = await (await fetch(get_url(url))).text();

    const html = new DOMParser().parseFromString(response, "text/html");

    const peliculas = [];

    for (const cine of html.getElementsByClassName("now__cinema")) {
        const nombre_cine = "Yelmo " + cine.querySelector("h2 a").innerText;

        const peliculas_cine = [];
        for (const pelicula of cine.getElementsByClassName("descripcion")) {
            const titulo = pelicula.querySelector("h3 a").innerText;
            const horas = [...pelicula.querySelectorAll("time")].map(hora => hora.innerText);

            peliculas_cine.push({
                titulo: titulo,
                horas: horas,
            });
        }

        peliculas.push({
            cine: nombre_cine,
            peliculas: peliculas_cine
        });
    }

    return peliculas;
}

function get_url(url) {
    const proxy_url = "https://phantomjscloud.com/api/browser/v2";
    const key = "ak-qq6d6-0wja5-bqha0-rjtyg-svzsk";
    const arguments = {
        url: url,
        renderType: "html",
        overseerScript: "await page.waitForNavigation({waitUntil:'domcontentloaded'}); page.done();"
    };

    return `${proxy_url}/${key}/?request=${JSON.stringify(arguments)}`;
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

update_peliculas();

function update_peliculas() {
    get_peliculas(...Provincias[location_selector.value.toUpperCase()]).then(async peliculas => {
        const main = document.getElementsByTagName("main")[0];

        main.innerHTML = "";

        for (const pelicula of peliculas) {
            const datos = await datos_pelicula(pelicula.titulo);

            if (datos != null)
                main.innerHTML += `
                <article class="pelicula">
                    <a href="/peliculas/mostrar/${pelicula.id}" class="pelicula__link">
                        <img src="${datos.imagen}" class="pelicula__imagen" width="400" height="600" />
        
                        <div class="pelicula__texto">
                            <h1 class="pelicula__titulo">${datos.titulo}</h1>
                            <p class="pelicula__descripcion">${datos.descripcion}</p>
                        </div>
                    </a>
                </article>
            `;
        }
    });

    get_peliculas_yelmo(Provincias_yelmo[location_selector.value.toUpperCase()]).then(peliculas => {

    });
}
