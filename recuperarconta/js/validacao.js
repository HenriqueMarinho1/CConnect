const btnValidar = document.querySelector("#validar");
btnValidar.addEventListener('click', function validar(){

    const codigo = document.querySelector("#input").value;
    const email = localStorage.getItem('email');
    $.post('php/validacao.php', {
        codigo:codigo,
        email:email
    }, function(resp){
        console.log(resp);
        if(resp[0].status != 'error') {
            alert('codigo verificado!')
        }
    })
})