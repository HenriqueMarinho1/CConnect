let message_forums = [];

// Função de carregamento de mensagens com nomes de classes e IDs padronizados
async function loadMessage_forums() {
  try {
    const response = await fetch('./controller/controllerChat.php?action=Consultar');
    const data = await response.json();

    if (data.status === 1) {
      message_forums = data.dados.map(msg => ({
        id: msg.id,
        user: msg.usuario,
        avatar_forum: "placeholder.png",
        message_forum: msg.mensagem,
        online: true,
        timestamp_forum: new Date(msg.datas),
        likes: 0,
        replies: []
      }));
      renderMessage_forums();
    } else {
      console.error(data.error);
    }
  } catch (error) {
    console.error('Erro ao carregar mensagens:', error);
  }
}

// Função para renderizar mensagens no contêiner
function renderMessage_forums() {
  const container = document.getElementById("message_forums_container");
  container.innerHTML = "";

  message_forums.forEach(msg => {
    container.appendChild(createMessage_forumElement(msg));
    msg.replies.forEach(reply => {
      container.appendChild(createMessage_forumElement(reply, true));
    });
  });
}

// Criação do elemento de mensagem com classes padronizadas
function createMessage_forumElement(msg, isReply = false) {
  const div = document.createElement("div");
  div.className = `message_forum ${isReply ? "reply" : ""}`;

  const avatar_forum = document.createElement("div");
  avatar_forum.className = "avatar_forum";
  avatar_forum.style.backgroundImage = `url(${msg.avatar_forum})`;
  div.appendChild(avatar_forum);

  const info = document.createElement("div");
  info.className = "message_forum_info";

  const header = document.createElement("div");
  header.className = "message_forum_header";

  const username_forum = document.createElement("span");
  username_forum.className = "username_forum";
  username_forum.textContent = msg.user;
  header.appendChild(username_forum);

  const timestamp_forum = document.createElement("span");
  timestamp_forum.className = "timestamp_forum";
  timestamp_forum.textContent = formatTimestamp_forum(msg.timestamp_forum);
  header.appendChild(timestamp_forum);

  info.appendChild(header);

  const message_forumText = document.createElement("p");
  message_forumText.className = "message_forum_text";
  message_forumText.textContent = msg.message_forum;
  info.appendChild(message_forumText);

  div.appendChild(info);
  return div;
}

// Função para formatação do timestamp
function formatTimestamp_forum(date) {
  const now = new Date();
  const diffInSeconds = Math.floor((now - date) / 1000);
  if (diffInSeconds < 60) return `${diffInSeconds}s atrás`;
  if (diffInSeconds < 3600) return `${Math.floor(diffInSeconds / 60)}m atrás`;
  if (diffInSeconds < 86400) return `${Math.floor(diffInSeconds / 3600)}h atrás`;
  return `${Math.floor(diffInSeconds / 86400)}d atrás`;
}

// Envio de nova mensagem com ID e classes padronizadas
document.getElementById("message_forum_form").addEventListener("submit", async (e) => {
  e.preventDefault();
  const input = document.getElementById("mensagem_enviar_forum");
  const nome = localStorage.getItem('nome') || "Anônimo";
  const newMessage_forum = {
    id: message_forums.length + 1,
    user: nome,
    avatar_forum: "placeholder.png",
    message_forum: input.value,
    online: true,
    timestamp_forum: new Date(),
    likes: 0,
    replies: [],
  };
  
  try {
    const response = await fetch('./controller/controllerChat.php', {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        usuario: newMessage_forum.user,
        mensagem: newMessage_forum.message_forum,
        datas: newMessage_forum.timestamp_forum.toISOString(),
        problem: "Discussão"
      }),
    });

    const result = await response.json();
    if (result.status === 1) {
      message_forums.push(newMessage_forum);
      renderMessage_forums();
      input.value = "";
    } else {
      console.error(result.error);
    }
  } catch (error) {
    console.error("Erro ao enviar mensagem:", error);
  }
});

loadMessage_forums();
setInterval(loadMessage_forums, 1000);
