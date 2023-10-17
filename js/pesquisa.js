var listaProdutos = document.getElementById("lista-produtos");
var listaOriginalProdutos, listaModificadaProdutos;

const botaoFiltrar = document.getElementById("filtrar");

botaoFiltrar.onclick = () => {
    alterarLista();
}
function carregar(produto) {
    $.ajax({
        url: "../api/produtos.php",
        method: "get",
        data: {
            filtros_pesquisa: produto
        },
        contentType: false,
        success: function (resposta) {
            if (resposta !== null && resposta !== undefined) {
                resposta.oferta.forEach(x => {
                    adicionarOfertas(x.nome, x.id);
                });
                resposta.entrega.forEach(x => {
                    adicionarEntrega(x.nome, x.id);
                });
                resposta.condicao.forEach(x => {
                    adicionarCondicao(x.nome, x.id);
                });
                resposta.fabricante.forEach(x => {
                    adicionarFabricante(x.nome, x.id);
                });
            }
        },
        error: function (erro) {
            console.error("Erro: " + erro);
        }
    })
    $.ajax({
        url: "../api/produtos.php",
        method: "get",
        data: {
            produto: produto
        },
        contentType: false,
        success: function (resposta) {
            if (resposta !== null && resposta !== undefined) {
                resposta.forEach(x => {
                    criarCardProduto(x.id, x.url, x.valor, x.nome);
                });
                listaOriginalProdutos = resposta;
            }
        },
        error: function (erro) {
            console.error("Erro: " + erro);
        }
    });
}
function alterarLista() {
    const ofertaInput = document.getElementsByName("oferta");
    const entregaInput = document.getElementsByName("entrega");
    const condicaoInput = document.getElementsByName("condicao");
    const fabricanteInput = document.getElementsByName("fabricante");

    var valoresSelecionados = {
        oferta: [],
        entrega: [],
        condicao: [],
        fabricante: []
    }
    ofertaInput.forEach = (x) => {
        if (x.checked) {
            console.log(x)
            valoresSelecionados.oferta.push(x.value);
        }
    }
    entregaInput.forEach = (x) => {
        if (x.checked) {
            valoresSelecionados.entrega.push(x.value);
        }
    }
    condicaoInput.forEach = (x) => {
        if (x.checked) {
            valoresSelecionados.condicao.push(x.value);
        }
    }
    fabricanteInput.forEach = (x) => {
        if (x.checked) {
            valoresSelecionados.fabricante.push(x.value);
        }
    }

    console.log(valoresSelecionados);
}
function criarCardProduto(id, imagem, preco, nome,) {
    const card = ` <section id="lista-produtos" class="d-flex flex-wrap g-3" style="gap: 1rem;">
    <div class="card" style="width:14.5rem; max-height: 35rem;">
        <img class="card-img-top" alt="Card image" src="${imagem}">
        <section class="card-body text-break">
            <div class="d-flex align-content-center gap-1">
                <h5 class="card-title">R$${preco}</h5>
            </div>
            <p class="card-text">
            ${nome}
            </p>
            <a class="icon-link icon-link-hover" href="./produto.php?id=${id}">
                Saiba mais
                <i class="bi bi-arrow-right"></i>
            </a>
        </section>
    </div>
</section>`
    listaProdutos.innerHTML += card;
}

function adicionarOfertas(nome, id) {
    const filtro = document.getElementById("ofertas")
    const filtroNome = `
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="${id}" id="${nome}" name="oferta">
        <label class="form-check-label text-start text-dark-emphasis fs-6"
        for="${nome}">
        ${nome}
        </label>
    </div>`;

    filtro.innerHTML += filtroNome;
}

function adicionarEntrega(nome, id) {
    const filtro = document.getElementById("entrega")
    const filtroNome = `
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="${id}" id="${nome}"  name="entrega">
        <label class="form-check-label text-start text-dark-emphasis fs-6"
        for="${nome}">
        ${nome}
        </label>
    </div>`;

    filtro.innerHTML += filtroNome;
}

function adicionarCondicao(nome, id) {
    const filtro = document.getElementById("condicao")
    const filtroNome = `
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="${id}" id="${nome}"  name="condicao">
        <label class="form-check-label text-start text-dark-emphasis fs-6"
            for="${nome}">
            ${nome}
        </label>
    </div>`;
    filtro.innerHTML += filtroNome;
}

function adicionarFabricante(nome, id) {
    const filtro = document.getElementById("fabricante")
    const filtroNome = `
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="${id}" id="${nome}"  name="fabricante">
        <label class="form-check-label text-start text-dark-emphasis fs-6"
            for="${nome}">
            ${nome}
        </label>
    </div>`;
    filtro.innerHTML += filtroNome;
}

