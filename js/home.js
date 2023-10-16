const card = document.getElementsByClassName("produtoCard");

window.onload = () => {
    $.ajax({
        url: "../api/produtos.php",
        method: "get",
        data: {
            todos_produtos: ""
        },
        contentType: false,
        success: function (resposta) {
            if (resposta !== null && resposta !== undefined) {
                resposta.forEach(x => {
                    criarCardProduto(x.id, x.url, x.valor, x.nome, x.descricao);
                });
            }

        },
        error: function (erro) {
            console.error("Erro: " + erro);
        }
    });
}

function criarCardProduto(id,imagem, preco, nome, descricao) {
    const card = `
    <div class="produtoCard">
        <header>
            <img src="${imagem}"/>
        </header>
        <main>
            <p id="nome">${nome}</p>
            <p id="preco">${preco}</p>
            <p id="descricao">${descricao}</p>
        </main>
        <a href="./produto.php?id=${id}">Comprar</a>

    </div>`;
    listaProdutos.innerHTML += card;
}