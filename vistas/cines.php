<?php

$cines = [
    ['codigo' => '0', 'nombre' => 'Cine Asdffdsafd', 'descripcion' => 'asdfsd fsad g asdf s adf sa df sadgfsd', 'direccion' => 'Calle Falsa 123, Vigo, Pontevadra'],
    ['codigo' => '0', 'nombre' => 'Cine Asdffdsafd', 'descripcion' => 'asdfsd fsad g asdf s adf sa df sadgfsd', 'direccion' => 'Calle Falsa 123, Vigo, Pontevadra'],
    ['codigo' => '0', 'nombre' => 'Cine Asdffdsafd', 'descripcion' => 'asdfsd fsad g asdf s adf sa df sadgfsd', 'direccion' => 'Calle Falsa 123, Vigo, Pontevadra']
]

?>

<?php foreach ($cines as $cine) : ?>
    <article class="cine">
        <img src="/" class="cine__imagen">
        <h1 class="cine__nombre"><?= $cine['nombre'] ?></h1>

        <div class="cine__direccion" href="/">
            <img src="/svg/map_marker.svg" class="direccion__imagen">
            <a class="direccion__texto" href="#"><?= $cine['direccion'] ?></a>
        </div>

        <p class="cine__descripcion"><?= $cine['descripcion'] ?></p>
    </article>
<?php endforeach; ?>