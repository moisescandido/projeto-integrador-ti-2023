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
        <h1>Login</h1>
        <input type="text" name="email" id="email" placeholder="Digite seu e-mail">
        <input type="text" name="senha" id="senha" placeholder="Digite sua senha">
        <button type="submit">Entrar</button>
        <div>
            <p>Não tem um conta?</p>
            <a href="./cadastro.php">Cadastre-se</a>
        </div>
    </form>
    <div>
        <ul>
        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>