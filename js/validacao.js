var nome = document.getElementById("nome")
var email = document.getElementById("email")
var senha = document.getElementById("senha")
var telefone = document.getElementById("telefone")

var lista = document.getElementById("lista-erro");

var erros = {
    nome: "Nome precisa conter entre 4 e 50 caracteres",
    email: "E-mail inválido",
    senha: "Senha precisa conter entre 4 e 50 caracteres",
    telefone: "Telefone inválido"
};
nome.onchange = () => {
    if (nome.value.lenght < 4 || nome.value.lenght > 50) {
        lista.append(erros.nome);
    } else {
        console.log("@#23")
    }
}