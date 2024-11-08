let messages = [];

    async function loadMessages() {
      try {
        const response = await fetch('./controller/controllerChat.php?action=Consultar');
        const data = await response.json();

        if (data.status === 1) {
          messages = data.dados.map(msg => ({
            id: msg.id,
            user: msg.usuario,
            avatar: "placeholder.png",
            message: msg.mensagem,
            online: true,
            timestamp: new Date(msg.datas),
            likes: 0,
            replies: []
          }));
          renderMessages();
        } else {
          console.error(data.error);
        }
      } catch (error) {
        console.error('Erro ao carregar mensagens:', error);
      }
    }

    function renderMessages() {
      const container = document.getElementById("messages-container");
      container.innerHTML = "";

      messages.forEach(msg => {
        container.appendChild(createMessageElement(msg));
      });
    }

    function createMessageElement(msg) {
      const div = document.createElement("div");
      div.className = "message";

      const avatar = document.createElement("div");
      avatar.className = "avatar";
      avatar.style.backgroundImage = `url(${msg.avatar})`;
      div.appendChild(avatar);

      const info = document.createElement("div");
      info.className = "message-info";

      const header = document.createElement("div");
      header.className = "message-header";

      const username = document.createElement("span");
      username.className = "username";
      username.textContent = msg.user;
      header.appendChild(username);

      const timestamp = document.createElement("span");
      timestamp.className = "timestamp";
      timestamp.textContent = formatTimestamp(msg.timestamp);
      header.appendChild(timestamp);

      info.appendChild(header);

      const messageText = document.createElement("p");
      messageText.className = "message-text";
      messageText.textContent = msg.message;
      info.appendChild(messageText);

      div.appendChild(info);
      return div;
    }

    function formatTimestamp(date) {
      const now = new Date();
      const diffInSeconds = Math.floor((now - date) / 1000 + 10940);
      if (diffInSeconds < 60) return `${diffInSeconds}s atrás`;
      if (diffInSeconds < 3600) return `${Math.floor(diffInSeconds / 60)}m atrás`;
      if (diffInSeconds < 86400) return `${Math.floor(diffInSeconds / 3600)}h atrás`;
      return `${Math.floor(diffInSeconds / 86400)}d atrás`;
    }

    document.getElementById("message-form").addEventListener("submit", async (e) => {
      e.preventDefault();
      const input = document.getElementById("mensagem_enviar");
      const nome = localStorage.getItem('nome')
      const newMessage = {  
        user: nome, 
        avatar: "placeholder.png",
        message: input.value,
        timestamp: new Date(),
      };

      try {
        const response = await fetch('./controller/controllerChat.php', {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            usuario: newMessage.user,
            message: newMessage.message,
            problem: "Discussão"
          }),
        });

        const result = await response.json();
        if (result.status === 1) {
          messages.push(newMessage); 
          renderMessages();
          input.value = ""; 
        } else {
          console.error(result.error);
        }
      } catch (error) {
        console.error("Erro ao enviar mensagem:", error);
      }
    });

    loadMessages();

    setInterval(loadMessages, 1000);