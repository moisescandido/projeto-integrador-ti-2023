<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/produtos.css">
    <title>Document</title>
</head>


<?php
session_start();
if ($_SESSION['id_funcao'] !== 1) {
    header("Location: ../home.php");
}
?>

<body>
    <header>
        <div>
            <nav>
                <button id="adicionar-produto">Adicionar produto</button>
            </nav>
        </div>
        <a href="../home.php">Sair</a>
    </header>
    <aside id="informacao">
        <button id="fechar">X</button>
        <form method="POST">
            <div>
                <img id="imagem-produto" src="" alt="Imagem do produto">
            </div>
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
            <button type="submit" id="botao"></button>
            <button type="submit" id="deletar" name="deletar">Deletar</button>
        </form>
    </aside>
    <section id="lista-produtos">
    </section>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../../../js/admin_produtos.js"></script>
</body>
<?php

if (isset($_POST['deletar'])) {
    include("../../db/produtos.php");
    $banco = new Produtos();

    if (!empty($_POST['deletar'])) {
        $banco->deletar_produto($_POST['deletar']);
    }
}
if (isset($_POST['criar'])) {
    include("../../db/produtos.php");
    $banco = new Produtos();

    try {
        $url = $_POST['imagem'];
        $categoria = $_POST['categoria'];
        $valor = $_POST['valor'];
        $nome = $_POST['nome'];
        $oferta = $_POST['oferta'];
        $entrega = $_POST['entrega'];
        $condicao = $_POST['condicao'];
        $fabricante = $_POST['fabricante'];
        $descricao = $_POST['descricao'];

        $banco->criar_produto(
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
    } catch (Exception $e) {
        echo 'Ocorreu um erro: ' . $e->getMessage();
    }
    exit;
}
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

    $id = $_POST['atualizar'];

    $banco = new Produtos();
    $resultado = $banco->pesquisa_nome($id);

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
            $id,
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
        echo "Erro ao alterar o produto: " . $e->getMessage();
    }
    exit;
}
?>

</html>