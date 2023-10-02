<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/formulario.css">
    <title>Login</title>
</head>

<body>
    <form method="get">
        <h1>Cadastro</h1>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome">
        <input type="text" name="email" id="email" placeholder="Digite sua email">
        <input type="text" name="senha" id="senha" placeholder="Digite sua senha">
        <input type="text" name="telefone" id="telefone" placeholder="Digite seu telefone">
        <button type="submit">Entrar</button>
        <div>
            <p>Ja tem um conta?</p>
            <a href="./login.php">Cadastre-se</a>
        </div>
    </form>
    <div>
        <ul id="lista-erro">
        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="../../js/validacao.js"></script>
</body>

</html>