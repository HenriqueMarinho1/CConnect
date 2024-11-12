const lugar = document.querySelector('.frente')

document.addEventListener("DOMContentLoaded", () => {
    const id = localStorage.getItem('id')
    $.post('./php/editarPerfil.php', {
        id: id,
    }, function(resp){
        console.log(resp);
        if(resp[0].status != 'error') {
            lugar.innerHTML = "";
            resp.forEach((Usuario) => {
                const p = document.createElement("p");
                p.innerHTML = `
                    <p class="itens_frente">Nome: ${Usuario.nome}</p>
                    <p class="itens_frente">Email: ${Usuario.email}</p>
                    <p class="itens_frente">Telefone: ${Usuario.telefone}</p>
                    <p class="itens_frente">Tipo: ${Usuario.tipo}</p>
                `;
            lugar.appendChild(p);
            });
            document.getElementById('nome_edit').value = resp[0].nome
            document.getElementById('email_edit').value = resp[0].email
            document.getElementById('telefone_edit').value = resp[0].telefone
            document.getElementById('senha_edit').value = resp[0].senha
            localStorage.setItem('id', resp[0].id)
        }
    })
})                  


