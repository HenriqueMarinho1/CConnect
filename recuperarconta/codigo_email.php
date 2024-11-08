<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/validacao.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" 
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" 
    crossorigin="anonymous" defer></script>
    <?php
    session_start();

    if (!isset($_SESSION['usuario'])) { 
        header("Location: ../logincadastro/login_cadastro.html");
        exit();
    }
    $email = $_SESSION['usuario']['email'];
    $senha = $_SESSION['usuario']['senha'];
    ?>
  <title>Redefinir Senha</title>
  <style>
    /* styles.css */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
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
    align-items: center;
    justify-content: center;
  }
  
  .form-container {
    background-color: #27272a;
    padding: 2rem;
    border-radius: 10px;
    text-align: center;
    max-width: 400px;
    width: 100%;
    overflow: hidden;
  }
  
  .icon-container {
    display: flex;
    justify-content: center;
    margin-top: 0px;
    margin-bottom: 10px;
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
  
  h2 {
    font-size: 1.75rem;
    margin-bottom: 1.5rem;
  }
  
  .input-group {
    position: relative;
    margin-bottom: 1rem;
  }
  
  input[type="password"] {
    width: 100%;
    padding: 0.75rem;
    background-color: #3f3f46;
    border: none;
    border-radius: 5px;
    color: #fbbf24;
  }
  
  input::placeholder {
    color: #fbbf24;
    opacity: 0.7;
  }
  
  .toggle-password {
    position: absolute;
    top: 50%;
    right: 0.75rem;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #fbbf24;
    cursor: pointer;
  }
  
  .strength-meter {
    display: flex;
    margin: 0.5rem 0;
  }
  
  .strength-bar {
    flex: 1;
    height: 6px;
    margin: 0 2px;
    background-color: #52525b;
    border-radius: 3px;
    transition: background-color 0.3s;
  }
  
  .error-message {
    color: #ef4444;
    font-size: 0.875rem;
    display: none;
  }
  
  button[type="submit"] {
    width: 100%;
    padding: 0.75rem;
    background: linear-gradient(90deg, #fbbf24, #f59e0b);
    border: none;
    color: #27272a;
    font-weight: bold;
    cursor: pointer;
    border-radius: 5px;
    margin-top: 1rem;
  }
  
  button:disabled {
    background-color: #78716c;
  }
  
  .success-message {
    display: none;
    color: #10b981;
  }
  
  .footer {
    position: relative;
    margin-top: 1rem;
    margin-bottom: -2rem;
      background: linear-gradient(90deg, #facc15, #d97706);
      padding: 12px;
      text-align: center;
    color: black;
    width: 125%;
    left: -12.5%;
    font-size: 80%;
    bottom: 100%;
    }

  .link {
    text-decoration: none;
    color: black;
}

.link:hover {
    text-decoration: underline;
}

.block {
    width: 50%;
}

.code-inputs {
    display: flex;
    justify-content: space-between;
    margin-bottom: 16px;
    margin-top: 5%;
  }
  
  .code-input {
    width: 40px;
    height: 40px;
    font-size: 24px;
    text-align: center;
    background: #52525b;
    color: #fbbf24;
    border: none;
    border-radius: 5px;
    outline: none;
  }

  .continue_button {
    background: linear-gradient(to right, #fbbf24, #f59e0b);
        color: #27272a;
        border: none;
        padding: 10px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        margin-top: 7%;
  }

@keyframes rotate {
    0% {
      transform: rotate(30deg);
    }
    20% {
        transform: rotate(10deg);
    }
    40% {
        transform: rotate(-10deg);
    }
    60% {
        transform: rotate(-30deg);
    }
    80% {
      transform: rotate(-10deg);
    }
    100% {
        transform: rotate(10deg);
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
  
  </style>
</head>
<body>
  <div class="container">
    <div class="form-container">
      <div class="icon-container">
        <div class="lock-icon">
            <img class="block" src="img/bloqueio.png" alt="">
        </div>
      </div>
      <h2>Verificação de Código</h2>
      <form id="verification-form">
      <p>Insira o código de 6 dígitos enviado para o seu e-mail.</p>
        <div id="code-inputs" class="code-inputs">
            <input type="text" maxlength="1" class="code-input" id="code-input1" required>
            <input type="text" maxlength="1" class="code-input" id="code-input2" required>
            <input type="text" maxlength="1" class="code-input" id="code-input3" required>
            <input type="text" maxlength="1" class="code-input" id="code-input4" required>
            <input type="text" maxlength="1" class="code-input" id="code-input5" required>
            <input type="text" maxlength="1" class="code-input" id="code-input6" required>
          </div>
        <p class="error-message" id="error-message"></p>
        <button type="submit" id="submit-button" class="submit-button">Verificar Código</button>
      </form>
      <div class="success-message" id="success-message">
        <div>Código verificado com sucesso!</div>
        <a href="redefinir_senha.html">
        <button id="submit-button" class="continue_button">
            <span>Continuar</span>
        </button>
      </a>
      </div>
      <div class="footer">
        Não recebeu o código? <a class="link" href="#">Reenviar</a>
      </div>
    </div>
  </div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const codeInputs = document.querySelectorAll(".code-input");
        const errorMessage = document.getElementById("error-message");
        const verificationForm = document.getElementById("verification-form");
        const successMessage = document.getElementById("success-message");
        const submitButton = document.getElementById("submit-button");
      
        codeInputs[0].focus();
      
        codeInputs.forEach((input, index) => {
          input.addEventListener("input", (e) => {
            if (e.target.value.length > 1) {
              e.target.value = e.target.value.slice(0, 1);
            }
      
            if (e.target.value && index < codeInputs.length - 1) {
              codeInputs[index + 1].focus();
            }
          });
      
          input.addEventListener("keydown", (e) => {
            if (e.key === "Backspace" && !input.value && index > 0) {
              codeInputs[index - 1].focus();
            }
          });
        });
      
        verificationForm.addEventListener("submit", async (e) => {
          e.preventDefault();
          errorMessage.textContent = "";
          const code = Array.from(codeInputs).map((input) => input.value).join("");
      
          if (code.length !== 6) {
            errorMessage.textContent = "Por favor, insira o código completo de 6 dígitos.";
            return;
          }
      
          submitButton.disabled = true;
          submitButton.textContent = "Verificando...";
      
          setTimeout(() => {
            submitButton.disabled = false;
            submitButton.textContent = "Verificar Código";
      
            
            verificationForm.style.display = "none";
          }, 2000);
        });
      
      });
</script>

</body>
</html>
