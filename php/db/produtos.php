<?php
class Produtos
{
    private $usuario_banco = "root";
    private $senha_banco = "";
    private $conexao = "mysql:host=localhost;dbname=projeto";

    function pesquisa_nome(string $nome)
    {
        $pdo = new PDO($this->conexao, $this->usuario_banco, $this->senha_banco);

        $query = $pdo->prepare("SELECT pr.id, imp.url as imagem, pr.nome, pr.valor FROM produtos pr 
        INNER JOIN imagens_produtos imp ON pr.nome LIKE CONCAT('%', :nome, '%') GROUP BY pr.id");
        $query->bindParam(":nome", $nome, PDO::PARAM_STR);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    function vantagens_produtos(string $id_produto)
    {
        $pdo = new PDO($this->conexao, $this->usuario_banco, $this->senha_banco);

        $query = $pdo->prepare("SELECT vap.vantagem FROM  
        vantagens_produtos vap 
        INNER JOIN produtos pr 
        ON pr.id = vap.id_produto 
        AND pr.id = :id");
        $query->bindParam(":id", $id_produto, PDO::PARAM_INT);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>