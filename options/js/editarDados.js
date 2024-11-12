const btnPerfil = document.getElementById('ver_perfil');
btnPerfil.addEventListener('click', function(){
    const nome = document.getElementById('nome_edit').value 
    const email = document.getElementById('email_edit').value 
    const telefone = document.getElementById('telefone_edit').value
    const senha = document.getElementById('senha_edit').value
    const id = localStorage.getItem('id')
    $.post('./php/atualizarDados.php', {
        id: id,
        nome: nome,
        email: email,
        telefone: telefone,
        senha:senha
    }, function(resp){
        console.log(resp);
        if(resp[0].status != 'error') {
            window.location.reload();
        }
    }) 
})          
