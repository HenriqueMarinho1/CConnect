const btnValidar = document.querySelector("#submit-button");
btnValidar.addEventListener('click', function validar(){

    const codeInput1 = document.querySelector("#code-input1").value;
    const codeInput2 = document.querySelector("#code-input2").value;
    const codeInput3 = document.querySelector("#code-input3").value;
    const codeInput4 = document.querySelector("#code-input4").value;
    const codeInput5 = document.querySelector("#code-input5").value;
    const codeInput6 = document.querySelector("#code-input6").value;
    const codigo = codeInput1 + codeInput2 + codeInput3 + codeInput4 + codeInput5 + codeInput6;
    const email = localStorage.getItem('email');
    const successMessage = document.getElementById("success-message");
    
    $.post('php/validacao.php', {
        codigo:codigo,
        email:email
    }, function(resp){
        console.log(resp);
        if(resp[0].status != 'error') {
            successMessage.style.display = "block";
            window.location.href = './trocar_senha.html'
        }
        else{
            
        }
    })
})