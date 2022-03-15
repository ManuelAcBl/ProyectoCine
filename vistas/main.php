<?php

//var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/header.css">
    <link rel="stylesheet" href="/footer.css">
    <link rel="stylesheet" href="/<?= $vista ?>.css">
    <script src="/jquery-3.6.0.min.js"></script>
    <script src="/header.js"></script>
    <script defer src="/<?= $vista ?>.js"></script>
    <title>MiCine</title>
</head>

<body>
    <header>
        <?php include 'header.php' ?>
    </header>

    <main>
        <?php include "$vista.php" ?>
    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>
</body>

</html>