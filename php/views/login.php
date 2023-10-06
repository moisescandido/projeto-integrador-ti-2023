<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/formulario.css">
    <title>Login</title>
</head>

<body>
    <section id="formulario" style="margin-top:4rem;">
        <form method="POST">
            <header>
                <h1>Log in</h1>
                <p>Compre com os melhores preços</p>
            </header>
            <main>
                <div>
                    <div>
                        <label for="email">Email</label>
                    </div>
                    <input type="text" name="email" id="email">
                </div>
                <div>
                    <div>
                        <label for="senha">Senha</label>
                        <a href="#">Esqueci a senha</a>
                    </div>
                    <input type="password" name="senha" id="senha">
                </div>
                <div>
                    <button name="login" type="submit">Log In</button>
                </div>
            </main>
            <footer>
                <div>
                    <p>Não tem um conta?</p>
                    <a href="./cadastro.php">Cadastre-se</a>
                </div>
            </footer>
        </form>
    </section>
    <?php

    session_start();
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        include('../db/usuario.php');
        $banco = new Usuario;

        $resultado = $banco->entrar($email, $senha);


        if (!empty($resultado)) {
            $_SESSION['id_usuario'] = $resultado['id'];
            $_SESSION['id_funcao'] = $resultado['id_funcao'];
            $_SESSION['nome_usuario'] = $resultado['nome'];
            $_SESSION['autenticado'] = true;

            header("Location: ./home.php");
            exit;
        } else {
            header("Location: ./cadastro.php");
            exit;
        }
    }
    ?>
</body>

</html>