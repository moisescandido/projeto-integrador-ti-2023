const inputCep = document.getElementById("cep");

inputCep.oninput = () => {
    if (inputCep.value.length === 8) {
        buscar_cep(inputCep.value);
    }
}

function buscar_cep(cep) {
    fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(x => {
            return x.json()
        })
        .then(data => {
            const rua = document.getElementById("rua");
            const bairro = document.getElementById("bairro");
            const cidade = document.getElementById("cidade");

            rua.value = data.logradouro;
            bairro.value = data.bairro;
            cidade.value = data.localidade;


        })
        .catch(error => {
            console.error(error);
        });
}
