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
				console.log(resp[0].nome)
				window.location.href = '../options/options.html'
			}
	    })
	})