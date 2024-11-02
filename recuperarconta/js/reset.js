const btnconfirmar = document.querySelector("#submit-button")
btnconfirmar.addEventListener('click', function confirmar(event){
    event.preventDefault();
    const password = document.querySelector('#password').value
    const confpassword = document.querySelector('#confirm-password').value
    const email = localStorage.getItem('email');
    alert(email)
    if(password == confpassword){
        $.post('php/reset.php', {
            password: password,
            email:email
        }, function(resp){
            console.log(resp);
            if(resp[0].status == 'sucesso') {
                alert('Senha alterada com sucesso!');
                window.location.href = './../logincadastro/login_cadastro.html'
            }
        })
    }else{
        alert('senhas diferentes')
    }
})