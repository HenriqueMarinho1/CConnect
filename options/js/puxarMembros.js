document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById("search_input_visualizacao");
    const membrosTable = document.getElementById("membros_table_visualizacao");

    const cep = localStorage.getItem('cep');
    let membros = [];

    // Função para renderizar os membros na tabela
    function renderMembros(membros) {
        membrosTable.innerHTML = "";
        membros.forEach((membro) => {
            const tr = document.createElement("tr");
            tr.innerHTML = `
                <td class='td_visualizacao'>${membro.id}</td>
                <td class='td_visualizacao'>${membro.nome}</td>
                <td class='td_visualizacao'>${membro.telefone}</td>
                <td class='td_visualizacao'>${membro.email}</td>
            `;
            membrosTable.appendChild(tr);
        });
    }

    // Função para buscar os membros do banco com base no CEP
    $.post('php/puxarMembros.php', { cep: cep }, function(resp) {
        console.log('Resposta do servidor:', resp);
        if (resp[0].status !== 'error') {
            membros = resp;  // Armazena os membros na variável 'membros'
            renderMembros(membros);  // Chama a função para renderizar os membros na tabela
        } else {
            alert('Nenhum membro encontrado para este CEP');
        }
    });

    // Função para filtrar membros por nome
    function filtrarMembros(nome) {
        const membrosFiltrados = membros.filter((membro) => 
            membro.nome.toLowerCase().includes(nome.toLowerCase()) 
        );
        renderMembros(membrosFiltrados);
    }

    // Evento de digitação no campo de pesquisa
    searchInput.addEventListener("input", (e) => {
        const nomePesquisado = e.target.value;
        filtrarMembros(nomePesquisado);
    });
});
