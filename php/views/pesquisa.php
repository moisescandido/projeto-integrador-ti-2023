<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div id="testeId"></div>
    <header>
        <?php
        include("../componentes/header.php");
        $nome_produto;

        if (isset($_GET['produto'])) {
            $nome_produto = $_GET['produto'];
        }
        ?>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row p-4 gap-1">
                <aside class="col border border-light-subtle">
                    <h4 class="text-start mb-4 fs-4">Filtros</h4>
                    <div class="mb-3">
                        <h5 class="text-start fs-6">Tipos de oferta</h5>
                        <div id="ofertas">
                        </div>
                    </div>
                    <div class="mb-3">
                        <h5 class="text-start fs-6">Tipos de entrega</h5>
                        <div id="entrega">
                        </div>
                    </div>
                    <div class="mb-3">
                        <h5 class="text-start fs-6">Condições</h5>
                        <div id="condicao">
                        </div>
                    </div>
                    <div class="mb-3">
                        <h5 class="text-start fs-6">Fabricante</h5>
                        <div id="fabricante">
                        </div>
                    </div>
                    <div>
                        <h5 class="text-start fs-6">Preço</h5>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="number" class="form-control" placeholder="Min" aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="number" class="form-control" placeholder="Max" aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <button id="filtrar" type="button" style="
                                    height: 2.2rem;
                                    width: 5rem;
                                    background-color: #332F99;
                                    border: 1px solid #332F99;
                                    color: white;
                                    border-radius: 4px;
                                    ">Filtrar</button>
                </aside>
                <div id="lista-produtos" class="col-md-9 d-flex flex-wrap gap-1">
                </div>
            </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../../js/pesquisa.js"></script>
    <?php

    echo '<script>
    carregar("' . $nome_produto . '");
</script>';

    ?>

</body>

</html>