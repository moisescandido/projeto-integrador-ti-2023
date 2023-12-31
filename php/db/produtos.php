<?php
include("credenciais.php");
class Produtos
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
    function informacoes_produto(string $id)
    {
        $pdo = new PDO($this->conexao, $this->usuario_banco, $this->senha_banco);

        $query = $pdo->prepare("SELECT pr.id, pr.descricao, cat.nome as categoria, imp.url, pr.valor, pr.nome, top.nome as oferta, tep.nome as entrega, con.condicao condicao, fa.nome as fabricante 
        FROM produtos pr 
        INNER JOIN condicoes_produtos con 
        ON pr.id_condicao = con.id
        INNER JOIN fabricante fa ON pr.id_fabricante = fa.id
        INNER JOIN categorias_produtos cat ON pr.id_categoria = cat.id
        INNER JOIN tipo_entrega_produto tep ON pr.id_entrega = tep.id
        INNER JOIN tipo_oferta_produto top ON pr.id_entrega = top.id
        INNER JOIN imagens_produtos imp ON pr.id = imp.id_produto and pr.id = :id");
        $query->bindParam(":id", $id, PDO::PARAM_INT);

        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }
    function pesquisa_nome(string $param)
    {
        $pdo = new PDO($this->conexao, $this->usuario_banco, $this->senha_banco);

        $query = $pdo->prepare("SELECT pr.id,imp.url, pr.valor, pr.nome, top.id as oferta, tep.id as entrega, con.id condicao, fa.id as fabricante 
        FROM produtos pr 
        INNER JOIN condicoes_produtos con 
        ON pr.id_condicao = con.id
        INNER JOIN fabricante fa ON pr.id_fabricante = fa.id
        INNER JOIN tipo_entrega_produto tep ON pr.id_entrega = tep.id
        INNER JOIN tipo_oferta_produto top ON pr.id_entrega = top.id
        INNER JOIN imagens_produtos imp ON pr.id = imp.id_produto and pr.nome LIKE CONCAT('%', :nome, '%')");
        $query->bindParam(":nome", $param, PDO::PARAM_STR);

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
    function fabricantes_produto(string $nome)
    {
        $pdo = new PDO($this->conexao, $this->usuario_banco, $this->senha_banco);

        $query = $pdo->prepare("SELECT fa.id, fa.nome FROM fabricante fa INNER JOIN produtos pr ON pr.id_fabricante = fa.id and pr.nome LIKE CONCAT('%', :nome, '%') GROUP BY fa.nome;");
        $query->bindParam(":nome", $nome, PDO::PARAM_STR);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    function fabricantes_todos()
    {
        $pdo = new PDO($this->conexao, $this->usuario_banco, $this->senha_banco);
        $query = $pdo->prepare("SELECT fa.id, fa.nome FROM fabricante fa");

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    function oferta()
    {
        $pdo = new PDO($this->conexao, $this->usuario_banco, $this->senha_banco);

        $query = $pdo->prepare("SELECT id, nome FROM tipo_oferta_produto");

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    function categoria()
    {
        $pdo = new PDO($this->conexao, $this->usuario_banco, $this->senha_banco);

        $query = $pdo->prepare("SELECT id, nome FROM categorias_produtos");

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    function entrega()
    {
        $pdo = new PDO($this->conexao, $this->usuario_banco, $this->senha_banco);

        $query = $pdo->prepare("SELECT id, nome FROM tipo_entrega_produto");

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    function condicao()
    {
        $pdo = new PDO($this->conexao, $this->usuario_banco, $this->senha_banco);

        $query = $pdo->prepare("SELECT id, condicao as nome FROM condicoes_produtos");

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    function deletar_produto(string $id_produto)
    {
        $pdo = new PDO($this->conexao, $this->usuario_banco, $this->senha_banco);

        $query = $pdo->prepare("DELETE FROM imagens_produtos WHERE id_produto = :id");
        $query->bindParam(":id", $id_produto, PDO::PARAM_STR);
        $query->execute();

        $query = $pdo->prepare("DELETE FROM PRODUTOS WHERE id = :id");
        $query->bindParam(":id", $id_produto, PDO::PARAM_STR);

        $query->execute();
    }
    function pesquisa_todos()
    {
        $pdo = new PDO($this->conexao, $this->usuario_banco, $this->senha_banco);

        $query = $pdo->prepare("SELECT pr.id, pr.descricao, cat.id as categoria, imp.url, pr.valor, pr.nome, top.id as oferta, tep.id as entrega, con.id condicao, fa.id as fabricante 
        FROM produtos pr 
        INNER JOIN condicoes_produtos con 
        ON pr.id_condicao = con.id
        INNER JOIN fabricante fa ON pr.id_fabricante = fa.id
        INNER JOIN tipo_entrega_produto tep ON pr.id_entrega = tep.id
        INNER JOIN tipo_oferta_produto top ON pr.id_entrega = top.id
        INNER JOIN categorias_produtos cat ON pr.id_categoria = cat.id
        INNER JOIN imagens_produtos imp ON pr.id = imp.id_produto GROUP BY pr.id");

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    function alterar_produto(
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
    ) {
        $pdo = new PDO($this->conexao, $this->usuario_banco, $this->senha_banco);

        $sql = "UPDATE produtos SET 
                id_categoria = :id_categoria,
                id_fabricante = :id_fabricante,
                id_condicao = :id_condicao,
                id_oferta = :id_oferta,
                id_entrega = :id_entrega,
                nome = :nome,
                descricao = :descricao,
                valor = :valor
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_categoria', $categoria);
        $stmt->bindParam(':id_fabricante', $fabricante);
        $stmt->bindParam(':id_condicao', $condicao);
        $stmt->bindParam(':id_oferta', $oferta);
        $stmt->bindParam(':id_entrega', $entrega);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $sql = "UPDATE imagens_produtos SET url = :url WHERE id_produto = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }
    function criar_produto(
        $url,
        $categoria,
        $valor,
        $nome,
        $oferta,
        $entrega,
        $condicao,
        $fabricante,
        $descricao
    ) {
        $pdo = new PDO($this->conexao, $this->usuario_banco, $this->senha_banco);

        $sql = "INSERT INTO produtos(id_categoria, id_fabricante, id_condicao, id_oferta, id_entrega, nome, descricao, valor) VALUES(:categoria, :fabricante, :condicao, :oferta, :entrega, :nome, :descricao, :valor)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_INT);
        $stmt->bindParam(':fabricante', $fabricante, PDO::PARAM_INT);
        $stmt->bindParam(':condicao', $condicao, PDO::PARAM_INT);
        $stmt->bindParam(':oferta', $oferta, PDO::PARAM_INT);
        $stmt->bindParam(':entrega', $entrega, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->bindParam(':valor', $valor, PDO::PARAM_STR);

        $stmt->execute();

        $id_produto = $pdo->lastInsertId();

        $sql = "INSERT INTO imagens_produtos(id_produto, url) VALUES (:id, :url)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':id', $id_produto);

        $stmt->execute();
    }
}
?>