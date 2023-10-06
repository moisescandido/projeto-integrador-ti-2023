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
                            <h5 class="text-start fs-6">Fabrincante</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label text-start text-dark-emphasis fs-6"
                                    for="flexCheckDefault">
                                    Fabrincate 1
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                <label class="form-check-label text-start text-dark-emphasis fs-6"
                                    for="flexCheckChecked">
                                    Fabrincate 2
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                <label class="form-check-label text-start text-dark-emphasis fs-6"
                                    for="flexCheckChecked">
                                    Fabrincate 3
                                </label>
                            </div>
                        </div>
                    </form>
                </aside>
                <div class="col-md-9">
                    <header class="mb-1">
                        <div class="d-flex justify-content-between">
                            <h4 class="fs-4">1-10 dos 7000 resultados para <span class="text-warning">"Asus"</span></h4>
                            <div class="d-flex align-content-center justify-content-center">
                                <div class="dropdown fs-4">
                                    <button class="btn dropdown-toggle fs-5" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Ordenar por
                                    </button>
                                    <ul class="dropdown-menu fs-6">
                                        <li><a class="dropdown-item" href="#">Menor preço</a></li>
                                        <li><a class="dropdown-item" href="#">Maior preco</a></li>
                                        <li><a class="dropdown-item" href="#">Melhor avaliação</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div>
                        </div>
                    </header>
                    <section class="d-flex flex-wrap g-3" style="gap: 1rem;">
                        <div class="card" style="width:15rem; max-height: 35rem;">
                            <img class="card-img-top" src="img/asus.webp" alt="Card image">
                            <section class="card-body text-break">
                                <div class="d-flex align-content-center gap-1">
                                    <h4 class="card-title">R$2.503</h4>
                                    <h6 class="card-title text-danger align-self-center">R$3.343</h6>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li>Tela NanoEdge com molduras superfinas</li>
                                    <li>Estrutura interna reforçada em metal</li>
                                    <li>Compacto, fino e leve</li>
                                    <li>Bateria com carregamento rápido (60% em 49min.)</li>
                                </ul>
                                </p>
                                <a class="icon-link icon-link-hover" href="#">
                                    Saiba mais
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </section>
                        </div>
                        <div class="card" style="width:15rem; max-height: 35rem;">
                            <img class="card-img-top" src="img/asus.webp" alt="Card image">
                            <section class="card-body text-break">
                                <div class="d-flex align-content-center gap-1">
                                    <h4 class="card-title">R$2.503</h4>
                                    <h6 class="card-title text-danger align-self-center">R$3.343</h6>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li>Tela NanoEdge com molduras superfinas</li>
                                    <li>Estrutura interna reforçada em metal</li>
                                    <li>Compacto, fino e leve</li>
                                    <li>Bateria com carregamento rápido (60% em 49min.)</li>
                                </ul>
                                </p>
                                <a class="icon-link icon-link-hover" href="#">
                                    Saiba mais
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </section>
                        </div>
                        <div class="card" style="width:15rem; max-height: 35rem;">
                            <img class="card-img-top" src="img/asus.webp" alt="Card image">
                            <section class="card-body text-break">
                                <div class="d-flex align-content-center gap-1">
                                    <h4 class="card-title">R$2.503</h4>
                                    <h6 class="card-title text-danger align-self-center">R$3.343</h6>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li>Tela NanoEdge com molduras superfinas</li>
                                    <li>Estrutura interna reforçada em metal</li>
                                    <li>Compacto, fino e leve</li>
                                    <li>Bateria com carregamento rápido (60% em 49min.)</li>
                                </ul>
                                </p>
                                <a class="icon-link icon-link-hover" href="#">
                                    Saiba mais
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </section>
                        </div>
                        <div class="card" style="width:15rem; max-height: 35rem;">
                            <img class="card-img-top" src="img/asus.webp" alt="Card image">
                            <section class="card-body text-break">
                                <div class="d-flex align-content-center gap-1">
                                    <h4 class="card-title">R$2.503</h4>
                                    <h6 class="card-title text-danger align-self-center">R$3.343</h6>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li>Tela NanoEdge com molduras superfinas</li>
                                    <li>Estrutura interna reforçada em metal</li>
                                    <li>Compacto, fino e leve</li>
                                    <li>Bateria com carregamento rápido (60% em 49min.)</li>
                                </ul>
                                </p>
                                <a class="icon-link icon-link-hover" href="#">
                                    Saiba mais
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </section>
                        </div>
                        <div class="card" style="width:15rem; max-height: 35rem;">
                            <img class="card-img-top" src="img/asus.webp" alt="Card image">
                            <section class="card-body text-break">
                                <div class="d-flex align-content-center gap-1">
                                    <h4 class="card-title">R$2.503</h4>
                                    <h6 class="card-title text-danger align-self-center">R$3.343</h6>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li>Tela NanoEdge com molduras superfinas</li>
                                    <li>Estrutura interna reforçada em metal</li>
                                    <li>Compacto, fino e leve</li>
                                    <li>Bateria com carregamento rápido (60% em 49min.)</li>
                                </ul>
                                </p>
                                <a class="icon-link icon-link-hover" href="#">
                                    Saiba mais
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </section>
                        </div>
                        <div class="card" style="width:15rem; max-height: 35rem;">
                            <img class="card-img-top" src="img/asus.webp" alt="Card image">
                            <section class="card-body text-break">
                                <div class="d-flex align-content-center gap-1">
                                    <h4 class="card-title">R$2.503</h4>
                                    <h6 class="card-title text-danger align-self-center">R$3.343</h6>
                                </div>
                                <p class="card-text">
                                <ul>
                                    <li>Tela NanoEdge com molduras superfinas</li>
                                    <li>Estrutura interna reforçada em metal</li>
                                    <li>Compacto, fino e leve</li>
                                    <li>Bateria com carregamento rápido (60% em 49min.)</li>
                                </ul>
                                </p>
                                <a class="icon-link icon-link-hover" href="#">
                                    Saiba mais
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </section>
                        </div>
                    </section>
                </div>
            </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>