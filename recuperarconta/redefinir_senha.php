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
  <title>Recuperação de Senha</title>
  <script src="js/script.js" defer></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" 
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" 
    crossorigin="anonymous" defer></script>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #18181b;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      font-family: Arial, sans-serif;
      color: #facc15;
      width: 100%;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .card {
        position: relative;
      background-color: #27272a;
      border-radius: 8px;
      overflow: hidden;
      max-width: 768px;
      width: 300px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      animation: fadeIn 0.5s ease-in-out;
    }

    .icon-container {
      display: flex;
      justify-content: center;
      margin-top: 20px;
      animation: rotate 5s linear infinite;
    }

    .lock-icon {
      width: 80px;
      height: 80px;
      background: linear-gradient(90deg, #facc15, #d97706);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .lock-icon svg {
      width: 40px;
      height: 40px;
      fill: #27272a;
    }

    .title {
      color: #facc15;
      text-align: center;
      font-size: 24px;
      margin: 20px 0;
      font-weight: bold;
    }

    .form {
      padding: 20px;
    }

    .input-container {
      position: relative;
      margin-bottom: 20px;
    }

    input {
      width: 100%;
      padding: 12px;
      border-radius: 6px;
      background-color: #404040;
      border: none;
      color: #facc15;
      padding-right: 40px;
    }

    .mail-icon {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
    }

    .mail-icon svg {
      width: 20px;
      height: 20px;
      fill: #facc15;
    }

    .button {
      width: 100%;
      padding: 12px;
      background: linear-gradient(90deg, #facc15, #d97706);
      color: #27272a;
      font-weight: bold;
      text-align: center;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: transform 0.3s;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .button:hover {
      transform: scale(1.05);
    }

    .arrow-icon svg {
      margin-left: 8px;
      width: 20px;
      height: 20px;
      fill: #27272a;
    }

    .message {
      text-align: center;
      color: #facc15;
      padding: 20px;
      display: none;
    }

    .footer {
      background: linear-gradient(90deg, #facc15, #d97706);
      padding: 12px;
      text-align: center;
    }

    .footer p {
      color: #27272a;
    }

    @keyframes rotate {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .block {
        width: 50%;
    }

    .email_rec {
        position: absolute;
        width: 10%;
        right: 5%;
        top: 25%;
    }

    a {
        text-decoration: none;
    }
    .link {
        color: black;
    }

    .link:hover {
        text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="icon-container">
        <div class="lock-icon">
            <img class="block" src="img/bloqueio.png" alt="">
        </div>
      </div>
      <h2 class="title">Recuperação de Senha</h2>
      <form id="recoveryForm" class="form">
        <div class="input-container">
          <input type="email" id="emailInput" placeholder="Seu endereço de e-mail" required>
            <img class="email_rec" src="img/email_rec.png" alt="">            
          </span>
        </div>
        <button type="submit" id="submitButton" class="button">
          <span id="buttonText">Enviar link de recuperação</span>
          <span class="arrow-icon">
            <!-- Arrow Icon -->
            <svg viewBox="0 0 24 24">
              <path d="M12 4v1h8.292l-12.293 12.293.707.707 12.293-12.293v8.293h1v-10h-10z"/>
            </svg>
          </span>
        </button>
      </form>
      <div id="message" class="message">
        <p>Um link de recuperação foi enviado para o seu e-mail.</p>
        <p>Verifique sua caixa de entrada e siga as instruções.</p>
      </div>
      <div class="footer">
        <p>Lembrou sua senha? <a class="link" href="#">Faça login</a></p>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const form = document.getElementById("recoveryForm");
      const buttonText = document.getElementById("buttonText");
      const message = document.getElementById("message");

      form.addEventListener("submit", async (e) => {
        e.preventDefault();
        buttonText.textContent = "Enviando...";
        document.getElementById("submitButton").disabled = true;

        // Simulação do envio com um atraso de 2 segundos
        await new Promise((resolve) => setTimeout(resolve, 2000));

        form.style.display = "none";
        message.style.display = "block";
      });
    });
  </script>
</body>
</html>
