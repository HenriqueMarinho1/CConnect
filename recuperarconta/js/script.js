const btnsend = document.querySelector("#btnsend");
btnsend.addEventListener('click', function send(){
    const email = document.querySelector("#email").value 
    $.post('php/recuperarConta.php', {
        email:email
    }, function(resp){
        console.log(resp);
        if(resp[0].status != 'error') {
            localStorage.setItem('email', email)
            alert('email enviado');
            window.location.href = './validacaocode.html'
        }else{
            alert('email invalido')
        }
    })
}) 