const btnconfirmar = document.querySelector(".btnconfirmar")
btnconfirmar.addEventListener('click', function confirmar(event){
    event.preventDefault();
    const password = document.querySelector('#password').value
    const confpassword = document.querySelector('#confpassword').value
    const email = localStorage.getItem('email');
    if(password == confpassword){
        $.post('php/reset.php', {
            password: password,
            email:email
        }, function(resp){
            console.log(resp);
            if(resp[0].status == 'sucesso') {
                alert('Senha alterada com sucesso!');
                window.location.href = '././logincadastro/lc.html'
            }
        })
    }else{
        errorMessage.style.display = 'block';
    }
})