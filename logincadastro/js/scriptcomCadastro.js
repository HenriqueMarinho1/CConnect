var btnCadastrar = document.querySelector("#btnCadastrar")
    btnCadastrar.addEventListener("click", function cadastrar(){
		var nome = document.querySelector("#nome").value;
        var user = document.querySelector("#user").value;
        var password = document.querySelector("#password").value;
        var telefone = document.querySelector("#telefone").value;
        var confpassword = document.querySelector('#confpassword').value;
        const cep = document.querySelector('#cep').value;
        const selectedOption = document.querySelector('input[name="opcao"]:checked').value;
        if(password == confpassword && selectedOption != null){
            $.post('./php/cadastroCom.php', {
                nome: nome,
                user: user,
                password: password,
                telefone: telefone,
                cep: cep,
                selectedOption: selectedOption
            }, function(resp){
                console.log(resp);
                if(resp[0].status != 'error') {
                    window.location.href = './comunidade.html'
                }
            })
        }else{
            console.log('ERROR');
        }
    })
