<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
    session_start();

    if (!isset($_SESSION['usuario'])) { 
        header("Location: ../logincadastro/login_cadastro.html");
        exit();
    }
    $email = $_SESSION['usuario']['email'];
    $senha = $_SESSION['usuario']['senha'];
    ?>
  <title>Fórum de Discussão</title>
  <script src="js/script.js" defer></script>
  
  <style>
    body {
      background-color: #1e1e1e;
      color: #f5f5f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: Arial, sans-serif;
      margin: 0;
    }

    .card {
      max-width: 600px;
      width: 100%;
      background-color: #292929;
      border-radius: 8px;
      overflow: hidden;
    }

    .card-header, .card-footer {
      padding: 16px;
      border-bottom: 1px solid #444;
    }

    .card-title {
      font-size: 1.5rem;
      color: #ffb400;
    }

    .icon {
      width: 1rem;
      height: 1rem;
      margin-right: 4px;
    }

    .card-content {
      max-height: 400px;
      overflow-y: auto;
      padding: 16px;
    }

    .message {
      display: flex;
      align-items: flex-start;
      margin-bottom: 16px;
    }

    .avatar {
      position: relative;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: #444;
      margin-right: 12px;
    }

    .message-info {
      display: flex;
      flex-direction: column;
      flex: 1;
    }

    .username {
      font-weight: bold;
      color: #ffb400;
    }

    .timestamp {
      font-size: 0.75rem;
      color: #666;
      margin-left: 12px;
    }

    .message-text {
      margin-top: 4px;
      color: #ccc;
    }

    .replying-to {
      font-size: 0.875rem;
      color: #ccc;
    }

    .hidden {
      display: none;
    }

    .card-footer {
      display: flex;
      align-items: center;
    }

    #message-form {
      display: flex;
      width: 97%;
    }

    #mensagem_enviar {
      flex: 1;
      background-color: #333;
      border: 1px solid #444;
      border-radius: 4px;
      padding: 8px;
      color: #fff;
    }

    .send-button {
        position: relative;
      background-color: #ffb400;
      border: none;
      border-radius: 4px;
      padding: 8px;
      cursor: pointer;
      left: 3%;
    }

    .send-button:hover {
      background-color: #e5a200;
    }
  </style>
</head>
<body>
  <div class="card">
    <header class="card-header">
      <h1 class="card-title">Fórum de Discussão</h1>
    </header>
    <div class="card-content" id="messages-container"></div>
    <footer class="card-footer">
      <div id="replying-to" class="replying-to hidden"></div>
      <form id="message-form">
        <input type="text" id="mensagem_enviar" placeholder="Digite sua mensagem..." required>
        <button type="submit" class="send-button">
          <svg class="icon"><!-- Ícone de enviar aqui --></svg>
        </button>
      </form>
    </footer>
  </div>

  
</body>
</html>