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
    <header>
        <?php
        include("../componentes/header.php");
        $nome_produto = "Sofá de couro";

        include("../db/produtos.php");
        $banco = new Produtos();
        ?>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row p-4 gap-1">
                <aside class="col border border-light-subtle">
                    <form>
                        <h4 class="text-start mb-4 fs-4">Filtros</h4>
                        <div class="mb-3">
                            <h5 class="text-start fs-6">Tipos de oferta</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label text-start text-dark-emphasis fs-6"
                                    for="flexCheckDefault">
                                    Garantia de transação
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                <label class="form-check-label text-start text-dark-emphasis fs-6"
                                    for="flexCheckChecked">
                                    Vendedores verificados
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <h5 class="text-start fs-6">Tipos de produtos</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label text-start text-dark-emphasis fs-6"
                                    for="flexCheckDefault">
                                    Pronta entrega
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                <label class="form-check-label text-start text-dark-emphasis fs-6"
                                    for="flexCheckChecked">
                                    Amostras pagas
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <h5 class="text-start fs-6">Condições</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label text-start text-dark-emphasis fs-6"
                                    for="flexCheckDefault">
                                    Novo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                <label class="form-check-label text-start text-dark-emphasis fs-6"
                                    for="flexCheckChecked">
                                    Usado
                                </label>
                            </div>
                        </div>
                        <div>
                            <h5 class="text-start fs-6">Preço</h5>
                            <input type="range" class="form-range" id="customRange1">
                            <div class="d-flex justify-content-between">
                                <p>10</p>
                                <p>10000</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <h5 class="text-start fs-6">Fabricante</h5>
                            <div class="form-check">
                                <?php
                                $fabricantes = $banco->fabrincantes_produto($nome_produto);

                                foreach ($fabricantes as $itm) {
                                    echo '<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">';

                                    echo 'label class="form-check-label text-start text-dark-emphasis fs-6"
                                        for="flexCheckDefault">
                                        ' . $itm['nome'] . '
                                    </label>';
                                }
                                ?>
                            </div>
                        </div>
                        <button style=" height: 2.2rem;
    width: 5rem;
    background-color: #332F99;
    border: 1px solid #332F99;
    color: white;
    border-radius: 4px;">Filtrar</button>
                    </form>
                </aside>
                <div class="col-md-9">
                    <section class="d-flex flex-wrap g-3" style="gap: 1rem;">
                        <?php
                        $resultado = $banco->pesquisa_nome($nome_produto);

                        foreach ($resultado as $item) {
                            echo '
                        <div class="card" style="width:15rem">
                            <img class="card-img-top" style="max-height: 13.5rem;"src="' . $item['imagem'] . '">
                            <section class="card-body text-break">
                                <div class="d-flex align-content-center gap-1">
                                    <h4 class="card-title">' . $item['valor'] . '</h4>
                                </div> <div class="d-flex align-content-center gap-1">
                                <h4 class="card-title">' . $item['nome'] . '</h4>
                            </div>
                                <p class="card-text">
                                <ul>';
                            $vantagens = $banco->vantagens_produtos($item['id']);
                            foreach ($vantagens as $itm) {
                                echo '<li>' . $itm['vantagem'] . '</li>';
                            }
                            echo
                                '
                                </ul>
                                </p>
                                <a class="icon-link icon-link-hover" href="./produto.php?produto=' . $item['nome'] . '">
                                    Saiba mais
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </section>
                        </div>';
                        }
                        ?>
                    </section>
                </div>
            </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>