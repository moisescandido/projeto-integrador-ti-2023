<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style/produto.css">
    <title>Produto</title>
</head>

<body>
    <header>
        <?php
        include("../componentes/header.php");
        ?>
    </header>
    <main>
        <section>
            <?php

            include("../db/produtos.php");
            $banco = new Produtos();

            if (!isset($_GET['id'])) {
                echo 'Nada encontrado!';
            } else {
                $id = $_GET['id'];

                $informacoes_produto = $banco->informacoes_produto($id);

                echo '
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="' . $informacoes_produto['url'] . '" class="img-fluid" alt="Imagem do Produto">
                </div>
                <div class="col-md-8">
                    <div>
                        <h2>' . $informacoes_produto['nome'] . '</h2>
                        <p><strong>Valor:</strong> R$ ' . $informacoes_produto['valor'] . '</p>
                        <p><strong>Descrição:</strong> ' . $informacoes_produto['descricao'] . '</p>
                        <p><strong>Categoria:</strong> ' . $informacoes_produto['categoria'] . '</p>
                        <a class="btn btn-lg btn-success">Comprar</a>
                        <form method="post">    
                            <input type="hidden" name="id_produto" value="' . $informacoes_produto['id'] . '">
                            <input type="hidden" name="id_usuario" value="' . $_SESSION['id_funcao'] . '">                    
                        </form>
                    </div>
                </div>
            </div>
        </div>';
            }
            ?>
    </main>
</body>

</html>