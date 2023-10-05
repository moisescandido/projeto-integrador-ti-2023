<?php
class Usuario
{
    private $usuario_banco = "root";
    private $senha_banco = "";
    private $conexao = "mysql:host=localhost;dbname=projeto";

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

        $queryUsuario = $pdo->prepare("INSERT INTO usuarios (id_funcao, nome, email, senha, telefone, criado, atualizado) VALUES (:id_funcao, :nome, :email, :senha, :telefone, :criado, :atualizado)");
        $queryUsuario->bindParam(":id_funcao", 1, PDO::PARAM_INT);
        $queryUsuario->bindParam(":nome", $nome, PDO::PARAM_STR);
        $queryUsuario->bindParam(":email", $email, PDO::PARAM_STR);
        $queryUsuario->bindParam(":senha", $senha, PDO::PARAM_STR);
        $queryUsuario->bindParam(":telefone", $telefone, PDO::PARAM_STR);

        $data = new DateTime('now');
        $dataFormatted = $data->format('d/m/Y');

        $queryUsuario->bindParam(":criado", $dataFormatted, PDO::PARAM_STR);
        $queryUsuario->bindValue(":atualizado", null, PDO::PARAM_NULL);

        $queryUsuario->execute();
    }
}
?>