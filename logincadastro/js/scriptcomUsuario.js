var btnEntrar = document.querySelector("#btnEntrar")
    btnEntrar.addEventListener("click", function login(){
		var email = document.querySelector("#email").value;
        var senha = document.querySelector("#senha").value;

	    $.post('./php/loginCom.php', {
	    	email: email,
	    	senha: senha
	    }, function(resp){
	    	console.log(resp);
			if(resp[0].status != 'error') {
                localStorage.setItem('cep', resp[0].cep)
				localStorage.setItem('nome', resp[0].nome)
				localStorage.setItem('email', resp[0].email)
				localStorage.setItem('id', resp[0].id)
				console.log(resp[0].nome)
				window.location.href = '../options/inicial_dentro.php'
			}
	    })
	})