var btnEntrar = document.querySelector("#butLogar")
    btnEntrar.addEventListener("click", function login(){
		var email = document.querySelector("#email").value;
        var senha = document.querySelector("#senha").value;

	    $.post('./php/loginUsuario.php', {
	    	email: email,
	    	senha: senha
	    }, function(resp){
	    	console.log(resp);
			if(resp[0].status != 'error') {
                localStorage.setItem('usuario', resp[0].nome_completo)
				window.location.href = '../options/options.html'
			}
	    })
	})