
var btnCadastrar = document.querySelector("#btnCadastrar")
btnCadastrar.addEventListener("click", function cadastrar(){
		var nome = document.querySelector("#nome").value;
        var user = document.querySelector("#user").value;
        var password = document.querySelector("#password").value;
        var telefone = document.querySelector("#telefone").value;
        var confpassword = document.querySelector('.confpassword').value;
        if(password == confpassword){
            $.post('./php/cadastroUsuario.php', {
                nome: nome,
                user: user,
                password: password,
                telefone: telefone
            }, function(resp){
                console.log(resp);
                if(resp[0].status != 'error') {
                    localStorage.setItem('usuario', resp[0].nome_completo)
                    window.location.href = './lc.html'
                }
            })
        }else{
            alert('senhas diferentes')
        }
    })