document.addEventListener("DOMContentLoaded", function() {
    const chatBox = document.getElementById("chat-box");
    const chatInput = document.getElementById("chat-input");
    const btnEnviar = document.getElementById("btnEnviar");
    const problemaInput = document.getElementById("problema-input");
    const usuario = localStorage.getItem('usuario');

    btnEnviar.addEventListener("click", function() {
        enviarMensagem();
    });

    chatInput.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            enviarMensagem();
        }
    });

    async function enviarMensagem() {
        const message = chatInput.value.trim();
        const problem = problemaInput.value.trim();
        if (message !== "" && problem !== "" && usuario !== null) {
            const config = {
                method: "post",
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    usuario,
                    message,
                    problem
                })
            };
            const response = await fetch('./controller/controllerChat.php', config);
            const require = await response.json();
            if (require.status === 1) {
                const messageElement = document.createElement("div");
                messageElement.textContent = `${usuario}: ${message} (${problem})`;
                chatBox.appendChild(messageElement);
                chatInput.value = "";
                chatBox.scrollTop = chatBox.scrollHeight;
            } else {
                console.error(require.error);
            }
        } else {
            alert("Mensagem, problema ou usuário está vazio.");
        }
    }

    async function carregarMensagens() {
        const response = await fetch('./controller/controllerChat.php?action=Consultar');
        const require = await response.json();
        if (require.status === 1) {
            chatBox.innerHTML = '';
            require.dados.forEach(msg => {
                if (msg.usuario && msg.mensagem && msg.problema) {
                    const messageElement = document.createElement("div");
                    messageElement.textContent = `${msg.usuario}: ${msg.mensagem} (${msg.problema})`;
                    chatBox.appendChild(messageElement);
                }
            });
            chatBox.scrollTop = chatBox.scrollHeight;
        } else {
            console.error(require.error);
        }
    }

    carregarMensagens();
    setInterval(carregarMensagens, 3000);
});
