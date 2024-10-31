let selectedOption = "";

document.querySelector(".condominio").addEventListener("click", function() {
    selectedOption = this.value;
});

document.querySelector(".comunidade").addEventListener("click", function() {
    selectedOption = this.value;
});

btnCadastrar.addEventListener("click", function cadastrar() {
    var nome = document.querySelector("#nome").value;
    var user = document.querySelector("#user").value;
    var password = document.querySelector("#password").value;
    var telefone = document.querySelector("#tel").value;
    var confpassword = document.querySelector('#confpassword').value;
    const cep = document.querySelector('#informecpf').value;
    
    if (password == confpassword) {
        $.post('./php/cadastroCom.php', {
            nome: nome,
            user: user,
            password: password,
            telefone: telefone,
            cep: cep,
            selectedOption: selectedOption
        }, function(resp) {
            console.log(resp);
            if (resp[0].status != 'error') {
                window.location.href = './login_cadastro.html';
            }
        });
    } else {
        console.log('ERRO');
    }
});
