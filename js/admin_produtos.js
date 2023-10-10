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
const botao = document.getElementById("botao");
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
    botao.value = null;
}


function adicionarInformacoesFormAsideModificar(id, url, categoria, fabricante, condicao, oferta, entrega, nome, descricao, valor) {
    botao.value = id;
    let imagemProduto = document.getElementById("imagem-produto")
    imagemProduto.src = url
    selectCategoria.value = categoria;
    selectFabricante.value = fabricante;
    selectCondicao.value = condicao;
    selectOferta.value = oferta;
    selectEntrega.value = entrega;
    inputImagem.value = url;
    inputNome.value = nome;
    inputDescricao.value = descricao
    inputValor.value = valor
}

function adicionarCardProduto(id, url, categoria, fabricante, condicao, oferta, entrega, nome, descricao, valor) {
    cardHTML = `
    <div>
        <img src="${url}" class="produto-imagem" onclick="adicionarInformacoesFormAsideModificar('${id}','${url}', '${categoria}', '${fabricante}', '${condicao}', '${oferta}', '${entrega}', '${nome}', '${descricao}', '${valor}')">
    </div>
    `;
    listaProdutos.innerHTML += cardHTML;
}


function adicionarCategorias(id, nome) {
    filtroHTML = `<option name="categoria"value="${id}">${nome}</option>`

    selectCategoria.innerHTML += filtroHTML;
}
function adicionarFabricante(id, nome) {
    filtroHTML = `<option name="fabricante"value="${id}">${nome}</option>`

    selectFabricante.innerHTML += filtroHTML;
}
function adicionarCondicao(id, nome) {
    filtroHTML = `<option name="condicao"value="${id}">${nome}</option>`

    selectCondicao.innerHTML += filtroHTML;
}
function adicionarOferta(id, nome) {
    filtroHTML = `<option name="oferta"value="${id}">${nome}</option>`

    selectOferta.innerHTML += filtroHTML;
}
function adicionarEntrega(id, nome) {
    filtroHTML = `<option name="entrega"value="${id}">${nome}</option>`

    selectEntrega.innerHTML += filtroHTML;
}