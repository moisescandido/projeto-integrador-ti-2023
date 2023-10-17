<?php

class Usuario
{
    private $usuario_banco;
    private $senha_banco;
    private $conexao;
    public function __construct()
    {
        include("credenciais.php");
        $this->usuario_banco = $usuario_banco;
        $this->senha_banco = $senha_banco;
        $this->conexao = $conexao;
    }
    public function criar(
        $nome,
        $email,
        $senha,
        $telefone,
        $cep,
        $rua,
        $numero,
        $bairro,
        $cidade
    ) {
        $pdo = new PDO($this->conexao, $this->usuario_banco, $this->senha_banco);

        $id_funcao = 2;
        $queryUsuario = $pdo->prepare("INSERT INTO usuarios (id_funcao, nome, email, senha, telefone, criado, atualizado) VALUES (:id_funcao, :nome, :email, :senha, :telefone, :criado, :atualizado)");
        $queryUsuario->bindParam(":id_funcao", $id_funcao, PDO::PARAM_INT);
        $queryUsuario->bindParam(":nome", $nome, PDO::PARAM_STR);
        $queryUsuario->bindParam(":email", $email, PDO::PARAM_STR);
        $queryUsuario->bindParam(":senha", $senha, PDO::PARAM_STR);
        $queryUsuario->bindParam(":telefone", $telefone, PDO::PARAM_STR);

        $data = new DateTime('now');
        $dataFormatted = $data->format('d/m/Y');

        $queryUsuario->bindParam(":criado", $dataFormatted, PDO::PARAM_STR);
        $queryUsuario->bindValue(":atualizado", null, PDO::PARAM_NULL);

        $queryUsuario->execute();

        $usuarioId = $pdo->lastInsertId();

        $queryEndereco = $pdo->prepare("INSERT INTO endereco_usuarios (rua, numero, bairro, cep, cidade, id_usuario) VALUES (:rua, :numero, :bairro, :cep, :cidade, :id_usuario)");
        $queryEndereco->bindParam(":rua", $rua, PDO::PARAM_STR);
        $queryEndereco->bindParam(":numero", $numero, PDO::PARAM_STR);
        $queryEndereco->bindParam(":bairro", $bairro, PDO::PARAM_STR);
        $queryEndereco->bindParam(":cep", $cep, PDO::PARAM_STR);
        $queryEndereco->bindParam(":cidade", $cidade, PDO::PARAM_STR);
        $queryEndereco->bindParam(":id_usuario", $usuarioId, PDO::PARAM_INT);
        $queryEndereco->execute();
    }
    public function entrar(string $email, string $senha)
    {
        $pdo = new PDO($this->conexao, $this->usuario_banco, $this->senha_banco);

        $query = $pdo->prepare("SELECT id, nome, id_funcao FROM usuarios WHERE email = :email AND senha = :senha");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("senha", $senha, PDO::PARAM_STR);


        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);

    }
}
?>