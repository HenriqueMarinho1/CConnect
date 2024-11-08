<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/reset.js" defer></script>
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
      <h2>Redefinir Senha</h2>
      <form id="reset-form">
        <div class="input-group">
          <input type="password" id="password" placeholder="Nova senha" required>
          <button type="button" class="toggle-password" id="toggle-password">👁️</button>
        </div>
        <div class="strength-meter" id="strength-meter">
          <div class="strength-bar"></div>
          <div class="strength-bar"></div>
          <div class="strength-bar"></div>
          <div class="strength-bar"></div>
        </div>
        <div class="input-group">
          <input type="password" id="confirm-password" placeholder="Confirmar nova senha" required>
          <button type="button" class="toggle-password" id="toggle-confirm-password">👁️</button>
        </div>
        <p class="error-message" id="error-message"></p>
        <button type="submit" id="submit-button">Redefinir Senha</button>
      </form>
      <div class="success-message" id="success-message">
        <div>✔️ Senha redefinida com sucesso!</div>
        <p>Você pode agora fazer login com sua nova senha.</p>
      </div>
      <div class="footer">
        Lembrou sua senha antiga? <a class="link" href="#">Faça login</a>
      </div>
    </div>
  </div>
<script>
  // script.js

document.addEventListener('DOMContentLoaded', () => {
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirm-password');
    const togglePassword = document.getElementById('toggle-password');
    const toggleConfirmPassword = document.getElementById('toggle-confirm-password');
    const errorMessage = document.getElementById('error-message');
    const successMessage = document.getElementById('success-message');
    const submitButton = document.getElementById('submit-button');
    const strengthMeter = document.getElementById('strength-meter').children;
  
    const toggleVisibility = (input, button) => {
      if (input.type === 'password') {
        input.type = 'text';
        button.textContent = '🙈';
      } else {
        input.type = 'password';
        button.textContent = '👁️';
      }
    };
  
    togglePassword.addEventListener('click', () => toggleVisibility(passwordInput, togglePassword));
    toggleConfirmPassword.addEventListener('click', () => toggleVisibility(confirmPasswordInput, toggleConfirmPassword));
  
    const passwordStrength = (password) => {
      if (password.length < 8) return 1;
      let strength = 2;
      if (/[a-z]/.test(password) && /[A-Z]/.test(password) && /\d/.test(password) && /\W/.test(password)) strength = 4;
      else if (/[a-zA-Z]/.test(password) && /\d/.test(password)) strength = 3;
      return strength;
    };
  
    passwordInput.addEventListener('input', () => {
      const strength = passwordStrength(passwordInput.value);
      for (let i = 0; i < 4; i++) {
        strengthMeter[i].style.backgroundColor = i < strength ? '#fbbf24' : '#52525b';
      }
    });
  
    document.getElementById('reset-form').addEventListener('submit', async (e) => {
      e.preventDefault();
      errorMessage.style.display = 'none';
      successMessage.style.display = 'none';
      if (passwordInput.value !== confirmPasswordInput.value) {
        errorMessage.textContent = 'As senhas não coincidem.';
        errorMessage.style.display = 'block';
        return;
      }
  
      submitButton.disabled = true;
      submitButton.textContent = 'Aguarde...';
      await new Promise((resolve) => setTimeout(resolve, 2000));
      successMessage.style.display = 'block';
      submitButton.disabled = false;
      submitButton.textContent = 'Redefinir Senha';
    });
  });
  
</script>

</body>
</html>
