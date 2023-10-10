<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/produtos.css">
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <button>Adicionar produto</button>
        </nav>
        <nav>
            <button>Gerenciar filtros</button>
        </nav>
    </header>
    <aside id="informacao">
        <img id="imagem-produto" src="" alt="Imagem do produto">

        <form method="POST">
            <input id="imagem" name="imagem" type="text" placeholder="Url imagem">
            <select id="categoria" name="categoria" type="text" placeholder="Categoria">
                <option selected>Categoria</option>
            </select>
            <select id="fabricante" name="fabricante" type="text" placeholder="Fabricante">
                <option selected>Fabricante</option>
            </select>
            <select id="condicao" name="condicao" type="text" placeholder="Condicao">
                <option selected>Condicao</option>
            </select>
            <select id="oferta" name="oferta" type="text" placeholder="Oferta">
                <option selected>Oferta</option>
            </select>
            <select id="entrega" name="entrega" type="text" placeholder="Entrega">
                <option selected>Entrega</option>
            </select>
            <input id="nome" name="nome" type="text" placeholder="Nome">
            <input id="descricao" name="descricao" type="text" placeholder="Descricao">
            <input id="valor" name="valor" type="text" placeholder="Valor">
            <button type="submit" name="atualizar" id="botao">Alterar</button>
        </form>

    </aside>
    <section id="lista-produtos">

    </section>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../../../js/admin_produtos.js"></script>
</body>
<?php

if (isset($_POST['atualizar'])) {

    $url = $_POST['imagem'];
    $categoria = $_POST['categoria'];
    $valor = $_POST['valor'];
    $nome = $_POST['nome'];
    $oferta = $_POST['oferta'];
    $entrega = $_POST['entrega'];
    $condicao = $_POST['condicao'];
    $fabricante = $_POST['fabricante'];
    $descricao = $_POST['descricao'];
    include("../../db/produtos.php");

    $banco = new Produtos();
    $resultado = $banco->pesquisa_nome($_POST['atualizar']);

    foreach ($resultado as $item) {
        if (empty($url)) {
            $url = $item['url'];
        }
        if (empty($categoria)) {
            $categoria = $item['categoria'];
        }
        if (empty($valor)) {
            $valor = $item['valor'];
        }
        if (empty($nome)) {
            $nome = $item['nome'];
        }
        if (empty($oferta)) {
            $oferta = $item['oferta'];
        }
        if (empty($entrega)) {
            $entrega = $item['entrega'];
        }
        if (empty($url)) {
            $condicao = $item['condicao'];
        }
        if (empty($fabricante)) {
            $fabricante = $item['fabricante'];
        }
        if (empty($descricao)) {
            $descricao = $item['descricao'];
        }
    }
    try {
        $banco->alterar_produto(
            $url,
            $categoria,
            $valor,
            $nome,
            $oferta,
            $entrega,
            $condicao,
            $fabricante,
            $descricao
        );
    } catch (PDOException $e) {
        echo "Erro ao atualizar o produto: " . $e->getMessage();
    }
}
?>

</html>