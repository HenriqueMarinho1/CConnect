const nav_t = document.getElementById('buttons_active_t');
const active_mapeamento = document.getElementById('mapeamento');
const active_membros = document.getElementById('membros');
const active_problemas = document.getElementById('problemas');
const active_forum = document.getElementById('forum');
const active_financiamento = document.getElementById('financiamento');

const title_t = document.getElementById('title_t');
const title_mapeamento = document.getElementById('title_mapeamento');
const title_membros = document.getElementById('title_membros');
const title_problemas = document.getElementById('title_problemas');
const title_forum = document.getElementById('title_forum');
const title_financiamento = document.getElementById('title_financiamento');

const body_t = document.getElementById('content');
const active_mapeamento_tela = document.getElementById('mapeamento_disc');
const active_visualizacao_tela = document.getElementById('visualizacao_disc');
const active_problemas_tela = document.getElementById('problemas_disc');
const active_forum_tela = document.getElementById('forum_disc');
const active_financiamento_tela = document.getElementById('financiamento_disc');

active_mapeamento.addEventListener('click', () => {
    nav_t.classList.add("active_mapeamento");
    nav_t.classList.remove("active_membros");
    nav_t.classList.remove("active_problemas");
    nav_t.classList.remove("active_forum");
    nav_t.classList.remove("active_financiamento");

    title_t.classList.add("active_title_mapeamento");
    title_t.classList.remove("active_title_membros");
    title_t.classList.remove("active_title_problemas");
    title_t.classList.remove("active_title_forum");
    title_t.classList.remove("active_title_financiamento");

    body_t.classList.add("active_mapeamento_tela");
    body_t.classList.remove("active_visualizacao_tela");
    body_t.classList.remove("active_problemas_tela");
    body_t.classList.remove("active_forum_tela");
    body_t.classList.remove("active_financiamento_tela");
});

active_membros.addEventListener('click', () => {
    nav_t.classList.remove("active_mapeamento");
    nav_t.classList.add("active_membros");
    nav_t.classList.remove("active_problemas");
    nav_t.classList.remove("active_forum");
    nav_t.classList.remove("active_financiamento");

    title_t.classList.remove("active_title_mapeamento");
    title_t.classList.add("active_title_membros");
    title_t.classList.remove("active_title_problemas");
    title_t.classList.remove("active_title_forum");
    title_t.classList.remove("active_title_financiamento");

    body_t.classList.remove("active_mapeamento_tela");
    body_t.classList.add("active_visualizacao_tela");
    body_t.classList.remove("active_problemas_tela");
    body_t.classList.remove("active_forum_tela");
    body_t.classList.remove("active_financiamento_tela");
});

active_problemas.addEventListener('click', () => {
    nav_t.classList.remove("active_mapeamento");
    nav_t.classList.remove("active_membros");
    nav_t.classList.add("active_problemas");
    nav_t.classList.remove("active_forum");
    nav_t.classList.remove("active_financiamento");

    title_t.classList.remove("active_title_mapeamento");
    title_t.classList.remove("active_title_membros");
    title_t.classList.add("active_title_problemas");
    title_t.classList.remove("active_title_forum");
    title_t.classList.remove("active_title_financiamento");

    body_t.classList.remove("active_mapeamento_tela");
    body_t.classList.remove("active_visualizacao_tela");
    body_t.classList.add("active_problemas_tela");
    body_t.classList.remove("active_forum_tela");
    body_t.classList.remove("active_financiamento_tela");
});

active_forum.addEventListener('click', () => {
    nav_t.classList.remove("active_mapeamento");
    nav_t.classList.remove("active_membros");
    nav_t.classList.remove("active_problemas");
    nav_t.classList.add("active_forum");
    nav_t.classList.remove("active_financiamento");

    title_t.classList.remove("active_title_mapeamento");
    title_t.classList.remove("active_title_membros");
    title_t.classList.remove("active_title_problemas");
    title_t.classList.add("active_title_forum");
    title_t.classList.remove("active_title_financiamento");

    body_t.classList.remove("active_mapeamento_tela");
    body_t.classList.remove("active_visualizacao_tela");
    body_t.classList.remove("active_problemas_tela");
    body_t.classList.add("active_forum_tela");
    body_t.classList.remove("active_financiamento_tela");
});

active_financiamento.addEventListener('click', () => {
    nav_t.classList.remove("active_mapeamento");
    nav_t.classList.remove("active_membros");
    nav_t.classList.remove("active_problemas");
    nav_t.classList.remove("active_forum");
    nav_t.classList.add("active_financiamento");

    title_t.classList.remove("active_title_mapeamento");
    title_t.classList.remove("active_title_membros");
    title_t.classList.remove("active_title_problemas");
    title_t.classList.remove("active_title_forum");
    title_t.classList.add("active_title_financiamento");

    body_t.classList.remove("active_mapeamento_tela");
    body_t.classList.remove("active_visualizacao_tela");
    body_t.classList.remove("active_problemas_tela");
    body_t.classList.remove("active_forum_tela");
    body_t.classList.add("active_financiamento_tela");
});

const btn_perfil_inicial = document.getElementById('user_button');
const active_topo = document.getElementById('active_topo');

btn_perfil_inicial.addEventListener('click', () => {
    active_topo.classList.add("active_perfil_inicial");
});
// Perfil - Sair 

let isOpen = false;

function toggleDropdown() {
    isOpen = !isOpen;
    const dropdownMenu = document.getElementById("dropdownMenu");
    const dropdownOverlay = document.getElementById("dropdownOverlay");

    if (isOpen) {
        dropdownMenu.classList.add("open");
        dropdownOverlay.style.display = "block";
    } else {
        dropdownMenu.classList.remove("open");
        dropdownOverlay.style.display = "none";
    }
}

// 
// Visualização

// document.addEventListener("DOMContentLoaded", () => {
//     const membrosMock = [
//         { id: 1, nome: "Amanda Torres", telefone: "(93) 91098-7654", email: "amanda.torres@email.com" },
//         { id: 2, nome: "Ana Silva", telefone: "(11) 98765-4321", email: "ana.silva@email.com" },
//         { id: 3, nome: "Beatriz Sousa", telefone: "(14) 90876-5432", email: "beatriz.sousa@email.com" },
//         { id: 4, nome: "Bruno Santos", telefone: "(21) 99876-5432", email: "bruno.santos@email.com" },
//         { id: 5, nome: "Caio Silva", telefone: "(24) 98765-1234", email: "caio.silva@email.com" },
//         { id: 6, nome: "Carla Oliveira", telefone: "(31) 97654-3210", email: "carla.oliveira@email.com" },
//         { id: 7, nome: "Daniel Lima", telefone: "(41) 96543-2109", email: "daniel.lima@email.com" },
//         { id: 8, nome: "Diogo Mendes", telefone: "(34) 97654-4321", email: "diogo.mendes@email.com" },
//         { id: 9, nome: "Elena Martins", telefone: "(51) 95432-1098", email: "elena.martins@email.com" },
//         { id: 10, nome: "Fábio Souza", telefone: "(61) 94321-0987", email: "fabio.souza@email.com" },
//         { id: 11, nome: "Gabriela Rocha", telefone: "(71) 93210-9876", email: "gabriela.rocha@email.com" },
//         { id: 12, nome: "Henrique Costa", telefone: "(81) 92109-8765", email: "henrique.costa@email.com" },
//         { id: 13, nome: "Isabela Fernandes", telefone: "(91) 91098-7654", email: "isabela.fernandes@email.com" },
//         { id: 14, nome: "João Pedro", telefone: "(12) 90876-5432", email: "joao.pedro@email.com" },
//         { id: 15, nome: "Karla Dias", telefone: "(22) 98765-1234", email: "karla.dias@email.com" },
//         { id: 16, nome: "Lucas Almeida", telefone: "(32) 97654-4321", email: "lucas.almeida@email.com" },
//         { id: 17, nome: "Mariana Lopes", telefone: "(42) 96543-2109", email: "mariana.lopes@email.com" },
//         { id: 18, nome: "Nathalia Azevedo", telefone: "(52) 95432-5678", email: "nathalia.azevedo@email.com" },
//         { id: 19, nome: "Otávio Maciel", telefone: "(62) 94321-8765", email: "otavio.maciel@email.com" },
//         { id: 20, nome: "Patrícia Freitas", telefone: "(72) 93210-7654", email: "patricia.freitas@email.com" },
//         { id: 21, nome: "Quintino Andrade", telefone: "(82) 92109-4321", email: "quintino.andrade@email.com" },
//         { id: 22, nome: "Roberta Moura", telefone: "(92) 91098-5678", email: "roberta.moura@email.com" },
//         { id: 23, nome: "Samuel Pinto", telefone: "(13) 90876-4321", email: "samuel.pinto@email.com" },
//         { id: 24, nome: "Talita Farias", telefone: "(23) 98765-4321", email: "talita.farias@email.com" },
//         { id: 25, nome: "Ubirajara Castro", telefone: "(33) 97654-3210", email: "ubirajara.castro@email.com" },
//         { id: 26, nome: "Vanessa Ribeiro", telefone: "(43) 96543-2109", email: "vanessa.ribeiro@email.com" },
//         { id: 27, nome: "Wagner Siqueira", telefone: "(53) 95432-1098", email: "wagner.siqueira@email.com" },
//         { id: 28, nome: "Xavier Lemos", telefone: "(63) 94321-0987", email: "xavier.lemos@email.com" },
//         { id: 29, nome: "Yasmin Cruz", telefone: "(73) 93210-9876", email: "yasmin.cruz@email.com" },
//         { id: 30, nome: "Zilda Cunha", telefone: "(83) 92109-8765", email: "zilda.cunha@email.com" }
//     ];

//     const searchInput = document.getElementById("search_input_visualizacao");
//     const membrosTable = document.getElementById("membros_table_visualizacao");

//     function renderMembros(membros) {
//         membrosTable.innerHTML = "";
//         membros.forEach((membro) => {
//             const tr = document.createElement("tr");
//             tr.innerHTML = `
//             <td class='td_visualizacao'>${membro.nome}</td>
//             <td class='td_visualizacao'>${membro.telefone}</td>
//             <td class='td_visualizacao'>${membro.email}</td>
//           `;
//             membrosTable.appendChild(tr);
//         });
//     }

//     function filtrarMembros(termo) {
//         const membrosFiltrados = membrosMock.filter((membro) =>
//             membro.nome.toLowerCase().startsWith(termo.toLowerCase())
//         );
//         renderMembros(membrosFiltrados);
//     }

//     renderMembros(membrosMock);

//     searchInput.addEventListener("input", (e) => {
//         const termo = e.target.value;
//         filtrarMembros(termo);
//     });
// });

// suporte

document.addEventListener('DOMContentLoaded', function() {
    const btnSuporte = document.getElementById('suporte_btn');
    const numeroWhatsApp = '+5511993967438';
    const mensagem = 'Olá, preciso de ajuda!';

    // btnSuporte.addEventListener('click', function() {
    //     const urlWhatsApp = `https://wa.me/${numeroWhatsApp}?text=${encodeURIComponent(mensagem)}`;
    //     window.location.href = urlWhatsApp;
    // });
});


// Problemas

let files = [];

function handleFileChange(event) {
    const selectedFiles = Array.from(event.target.files);
    if (selectedFiles.length + files.length > 5) {
        alert('Você pode enviar no máximo 5 arquivos.');
        return;
    }
    files = [...files, ...selectedFiles];
    displayFiles();
}

function displayFiles() {
    const fileList = document.getElementById('fileList_problemas');
    fileList.innerHTML = '';
    files.forEach((file, index) => {
        const li = document.createElement('li');
        li.className = 'file_item_problemas';
        li.innerHTML = `
        ${file.name}
        <button class="remove_btn_problemas" onclick="removeFile(${index})">X</button>
      `;
        fileList.appendChild(li);
    });
}

function removeFile(index) {
    files.splice(index, 1);
    displayFiles();
}

document.getElementById('reportForm_problemas').addEventListener('submit_problemas', function (event) {
    event.preventDefault();
    const title = document.getElementById('title_problema').value;
    const description = document.getElementById('description_problemas').value;

    console.log('Enviando:', { title, description, files });

    files = [];
    document.getElementById('fileList_problemas').innerHTML = '';
    document.getElementById('title_problema').value = '';
    document.getElementById('description_problemas').value = '';

    showNotification();
});

function showNotification() {
    const notification = document.getElementById('notification_problemas');
    notification.style.display = 'block';
    setTimeout(() => {
        notification.style.display = 'none';
    }, 3000);
}