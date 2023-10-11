const listaProdutos = document.getElementById("lista-produtos")

const selectCategoria = document.getElementById("categoria")
const selectFabricante = document.getElementById("fabricante")
const selectCondicao = document.getElementById("condicao")
const selectOferta = document.getElementById("oferta")
const selectEntrega = document.getElementById("entrega")
const inputImagem = document.getElementById("imagem")
const inputNome = document.getElementById("nome")
const inputDescricao = document.getElementById("descricao")
const inputValor = document.getElementById("valor")
const botaoForm = document.getElementById("botao");
const botaoAdicionarProduto = document.getElementById("adicionar-produto");
const botaoFechar = document.getElementById("fechar");

const aside = document.getElementById("informacao");
window.onload = () => {
    $.ajax({
        url: "../../api/produtos.php",
        method: "get",
        data: {
            todos_produtos: ""
        },
        contentType: false,
        success: function (resposta) {
            if (resposta !== null && resposta !== undefined) {
                resposta.forEach(x => {
                    adicionarCardProduto(x.id, x.url, x.categoria, x.fabricante, x.condicao, x.oferta, x.entrega, x.nome, x.descricao, x.valor)
                })

            }
        },
        error: function (erro) {
            console.log("Erro: " + erro);
        }
    });

    $.ajax({
        url: "../../api/produtos.php",
        method: "get",
        data: {
            filtros_pesquisa: ""
        },
        contentType: false,
        success: function (resposta) {
            if (resposta !== null && resposta !== undefined) {
                resposta.oferta.forEach(x => {
                    adicionarOferta(x.id, x.nome);
                });
                resposta.entrega.forEach(x => {
                    adicionarEntrega(x.id, x.nome);
                });
                resposta.condicao.forEach(x => {
                    adicionarCondicao(x.id, x.nome);
                });
                resposta.fabricante.forEach(x => {
                    adicionarFabricante(x.id, x.nome);
                });
                resposta.categoria.forEach(x => {
                    adicionarCategorias(x.id, x.nome);
                });
            }
        },
        error: function (erro) {
            console.error("Erro: " + erro);
        }
    })
    botaoForm.value = null;
}
inputImagem.oninput = () => {
    let imagemProduto = document.getElementById("imagem-produto");


    imagemProduto.src = inputImagem.value;
    console.log(inputImagem.value)
}
botaoAdicionarProduto.onclick = () => {


    aside.style.left = "0";
    listaProdutos.style.marginLeft = "20%";
    botaoForm.setAttribute('name', 'criar')
    botaoForm.innerHTML = "Adicionar"
    botaoForm.value = null;
}
function adicionarInformacoesFormAsideModificar(id, url, categoria, fabricante, condicao, oferta, entrega, nome, descricao, valor) {
    aside.style.left = "0";
    listaProdutos.style.marginLeft = "20%";
    botaoForm.value = id;
    botaoForm.setAttribute('name', 'atualizar')
    botaoForm.innerHTML = "Atualizar"
    let imagemProduto = document.getElementById("imagem-produto");
    imagemProduto.src = url;

    selectCategoria.value = categoria;
    selectFabricante.value = fabricante;
    selectCondicao.value = condicao;
    selectOferta.value = oferta;
    selectEntrega.value = entrega;

    inputImagem.value = url;
    inputNome.value = nome;
    inputDescricao.value = descricao;
    inputValor.value = valor;
}
botaoFechar.onclick = () => {
    aside.style.left = "-20rem";
    listaProdutos.style.marginLeft = "0%";
}
function adicionarCardProduto(id, url, categoria, fabricante, condicao, oferta, entrega, nome, descricao, valor) {
    cardHTML = `
    <div class="card-produto">
        <img src="${url}"  onclick="adicionarInformacoesFormAsideModificar('${id}','${url}', '${categoria}', '${fabricante}', '${condicao}', '${oferta}', '${entrega}', '${nome}', '${descricao}', '${valor}')">
    </div>
    `;
    listaProdutos.innerHTML += cardHTML;
}


function adicionarCategorias(id, nome) {
    var option = document.createElement("option")
    option.value = id;
    option.textContent = nome;

    selectCategoria.append(option);
}
function adicionarFabricante(id, nome) {
    var option = document.createElement("option")
    option.value = id;
    option.textContent = nome;

    selectFabricante.append(option);
}
function adicionarCondicao(id, nome) {
    var option = document.createElement("option")
    option.value = id;
    option.textContent = nome;

    selectCondicao.append(option);
}
function adicionarOferta(id, nome) {
    var option = document.createElement("option")
    option.value = id;
    option.textContent = nome;

    selectOferta.append(option);
}
function adicionarEntrega(id, nome) {
    var option = document.createElement("option")
    option.value = id;
    option.textContent = nome;

    selectEntrega.append(option);
}



