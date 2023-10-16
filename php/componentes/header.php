<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="./style/header.css">
    <title>Header</title>
</head>

<body>
    <header id="header-cabecalho">
        <nav>
            <form method="get">
                <input type="text" name="produto"/>
                <button type="submit" name="pesquisar">Pesquisar</button>
            </form>
        </nav>
    </header>
</body>

<?php
if (isset($_GET['pesquisar'])) {
    $produto = $_GET['produto'];
    header("Location: ./pesquisa.php?produto=" . $produto);
}
?>

</html>
