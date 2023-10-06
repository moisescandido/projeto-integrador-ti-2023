<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/formulario.css">
    <title>Cadastro</title>
</head>

<body>
    <section id="formulario">
        <form method="post">
            <header>
                <h1>Cadastro</h1>
                <p>Produtos com melhores preços</p>
            </header>
            <main>
                <div>
                    <div>
                        <label for="nome">Nome</label>
                    </div>
                    <input type="text" name="nome" id="nome" min="4" max="50">
                </div>
                <div>
                    <div>
                        <label for="email">Email</label>
                    </div>
                    <input type="email" name="email" id="email" min="4" max="50">
                </div>
                <div>
                    <div>
                        <label for="senha">Senha</label>
                    </div>
                    <input type="password" name="senha" id="senha" min="4" max="50">
                </div>
                <div>
                    <div>
                        <label for="telefone">Telefone</label>
                    </div>
                    <input type="text" name="telefone" id="telefone" min="14" max="14">
                </div>
                <div>
                    <div>
                        <label for="cep">Cep</label>
                    </div>
                    <input type="text" name="cep" id="cep">
                </div>
                <div>
                    <div>
                        <label for="rua">Rua</label>
                    </div>
                    <input type="text" name="rua" id="rua">
                </div>
                <div>
                    <div>
                        <label for="numero">Numero</label>
                    </div>
                    <input type="text" name="numero" id="numero">
                </div>
                <div>
                    <div>
                        <label for="bairro">Bairro</label>
                    </div>
                    <input type="text" name="bairro" id="bairro" >
                </div>
                <div>
                    <div>
                        <label for="cidade">Cidade</label>
                    </div>
                    <input type="text" name="cidade" id="cidade" >
                </div>
                <div>
                    <button type="submit" id="cadastrar" name="cadastrar">Cadastrar</button>
                </div>
            </main>
            <footer>
                <div>
                    <p>Já tem um conta?</p>
                    <a href="./login.php">Faça login</a>
                </div>
            </footer>
        </form>
    </section>
    <script src="../../js/cadastro.js"></script>
</body>

</html>

<?php
include("../db/usuario.php");
$banco = new Usuario();

if (isset($_POST['cadastrar'])) {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $telefone = $_POST["telefone"];
    $cep = $_POST["cep"];
    $rua = $_POST["rua"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];

    try {
        $banco->criar(
            $nome,
            $email,
            $senha,
            $telefone,
            $cep,
            $rua,
            $numero,
            $bairro,
            $cidade
        );
        header("Location: login.php");
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}

?>