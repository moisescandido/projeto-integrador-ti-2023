<?php
include("../db/produtos.php");
$banco = new Produtos();

if (isset($_GET['produto'])) {
    header('Content-Type: application/json');
    $resultado = $banco->pesquisa_nome($_GET['produto']);

    if (empty($resultado)) {
        echo json_encode(array("mensagem" => "Sem resultados"));
    } else {
        echo json_encode($resultado);
    }
}
if (isset($_GET['filtros_pesquisa'])) {
    header('Content-Type: application/json');
    $oferta = $banco->oferta();
    $entrega = $banco->entrega();
    $condicao = $banco->condicao();
    $fabricante = $banco->fabricantes_produto($_GET['filtros_pesquisa']);

    echo json_encode(
        array(
            "oferta" => $oferta,
            "entrega" => $entrega,
            "condicao" => $condicao,
            "fabricante" => $fabricante
        )
    );
}

?>