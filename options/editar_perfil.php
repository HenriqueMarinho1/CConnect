<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.js" 
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" 
    crossorigin="anonymous" defer></script>
    <script src="js/editarPerfil.js" defer></script>
    <script src="js/editarDados.js" defer></script>
    <?php
    session_start();

    if (!isset($_SESSION['usuario'])) { 
        header("Location: ../logincadastro/login_cadastro.html");
        exit();
    }
    $email = $_SESSION['usuario']['email'];
    $senha = $_SESSION['usuario']['senha'];
    ?>
    <title>Profile</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-shadow: border-box;
            font-family: 'Poppins', sans-serif;
        }

        a {
            text-decoration: none;
            color: rgb(255, 255, 0);
        }

        body {
            background: #18181b;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
            width: 100%;
        }

        .espaco {
            position: relative;
            border: 4px solid rgb(255, 255, 0);
            width: 500px;
            height: 800px;
            border-radius: 10%;
            overflow: hidden;
            max-width: 100%;
            min-height: 80%;
        }

        .div_perfil {
            position: relative;
            width: 100%;
            height: 24.32%;
            min-height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            overflow: hidden;
        }

        .perfil {
            position: absolute;
            background: rgba(255, 255, 0, 0.562);
            color: black;
            width: 35%;
            height: 70%;
            border: 2px dashed rgb(255, 255, 0);
            border-radius: 50%;
            top: 15%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            overflow: hidden;
        }

        .div_img {
            position: absolute;
            overflow: hidden;
        }

        .img {
            width: 175px;
        }

        .sua_foto {
            z-index: 1000;
            font-size: 150%;
        }

        .centralizar {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            overflow: hidden;
        }

        .div_frente {
            position: absolute;
            width: 100%;
            top: 24.32%;
            height: 24.32%;
            color: rgb(255, 255, 0);
            text-align: center;
        }

        .itens_frente {
            width: 100%;
            height: 24.32%;
            border: none;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 5%;
            margin-top: 5%;
            font-size: 100%;
            color: white;
        }

        .div_centro {
            position: absolute;
            top: 48.64%;
            width: 100%;
            height: 41.36%;
            text-align: center;
        }

        .div_centro_ativo {
            top: 52.32%;
            height: 37.68%;
        }

        .centro {
            position: relative;
            width: 80%;
            height: 80%;
            border: 2px solid rgb(255, 255, 0);
            border-radius: 15px;
        }

        .div_inferior {
            position: absolute;
            background: rgba(175, 164, 164, 0.194);
            border-top: 4px solid rgb(255, 255, 0);
            top: 90%;
            width: 100%;
            height: 109%;
            transition: all 0.6s ease-in-out;
        }

        .ativar .div_inferior {
            transform: translateY(-90%);
            animation: move 0.6s;
        }

        .div_editar_perfil {
            position: relative;
            width: 100%;
            height: 9%;
        }

        .editar_perfil {
            position: relative;
            background: transparent;
            font-size: 150%;
            font-weight: 600;
            border: none;
            width: 100%;
            height: 100%;
            max-width: 100%;
            min-height: 80%;
            cursor: pointer;
            color: rgb(255, 255, 0);
        }

        .ativar #editar {
            display: none;
        }

        .perfil_completo {
            opacity: 1;
            z-index: 5;
            transition: all 0.6s ease-in-out;
            width: 100%;
            height: 100%;
        }

        .ativar .perfil_completo {
            transform: translateY(-100%);
            opacity: 0;
            z-index: 1;
            animation: move 0.6s;
        }

        .inferior_ativo {
            position: absolute;
            background: #18181b;
            border-top: 4px solid rgb(255, 255, 0);
            top: 90%;
            width: 100%;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .superior_centro {
            position: absolute;
            width: 150%;
            height: 100%;
            top: -70%;
            border-radius: 50%;
            background: rgba(164, 170, 175, 0.194);
        }

        .interior_descricao {
            position: absolute;
            width: 80%;
            height: 50%;
            top: 40%;
            color: rgb(255, 255, 255);
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .titulo {
            position: relative;
            width: 100%;
            height: 10%;
            font-size: 200%;
            font-weight: 600;
            top: 80%;
            color: rgb(255, 255, 0);
        }

        .div_editar_ativo {
            top: -2%;
        }

        .div_frente_ativo {
            top: 28%;
        }

        .btn {
            position: relative;
            width: 49%;
            height: 100%;
            border: 2px solid rgb(255, 255, 0);
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.301);
            color: white;
            overflow: hidden;
            margin-bottom: 2%;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 77%;
            cursor: pointer;
        }

        .btn:hover {
            background: black;
        }

        #nome_edit {
            position: absolute;
            opacity: 0;
        }

        #email_edit {
            position: absolute;
            opacity: 0;
        }

        #telefone_edit {
            position: absolute;
            opacity: 0;
        }

        #senha_edit {
            position: absolute;
            opacity: 0;
        }

        .editar_nome #nome_edit {
            position: relative;
            opacity: 1;
        }

        .editar_nome #nome {
            position: absolute;
            opacity: 0;
        }

        .editar_email #email_edit {
            position: relative;
            opacity: 1;
        }

        .editar_email #email {
            position: absolute;
            opacity: 0;
        }

        .editar_telefone #telefone_edit {
            position: relative;
            opacity: 1;
        }

        .editar_telefone #telefone {
            position: absolute;
            opacity: 0;
        }

        .editar_senha #senha_edit {
            position: relative;
            opacity: 1;
        }

        .editar_senha #senha {
            position: absolute;
            opacity: 0;
        }
        .arrumar .btn {
            position: relative;
            width: 48%;
            min-height: 100%;
        }

        .arrumar .btn_ativo {
            min-height: 100%;
        }

        .arrumar .div_frente_ativo {
            position: absolute;
            width: 80%;
            left: 10%;
        }
    </style>
</head>

<body>
    <div id="espaco" class="espaco">
        <div class="perfil_completo">
            <div class="div_perfil">
                <div class="perfil">
                    <div class="div_img">
                        <img class="img" src="img/foto.png" alt="">
                    </div>
                    <h1 class="sua_foto">
                        Sem Foto
                    </h1>
                </div>
            </div>
            <div class="div_frente centralizar">
                <div class="frente">
                    
                </div>
            </div>
            <div class="div_centro centralizar">
                <div class="centro centralizar">
                    <div class="superior_centro">
                        <div class="titulo">Descrição</div>
                    </div>
                    <div class="interior_descricao">
                        Aqui você pode vizualizar seu perfil
                    </div>
                </div>
            </div>
        </div>
        <div class="div_inferior">
            <div class="div_editar_perfil centralizar">
                <button id="editar" class="editar_perfil">Editar Perfil</button>
            </div>
            <div class="inferior_ativo">
                <div class="div_editar_perfil">
                    <button id="ver_perfil" class="editar_perfil">Perfil</button>
                </div>
            </div>
            <div class="div_perfil div_editar_ativo">
                <div class="perfil">
                    <div class="div_img">
                        <img class="img" src="img/foto.png" alt="">
                    </div>
                    <h1 class="sua_foto">
                        Editar Foto
                    </h1>
                </div>
            </div>
            <div class="div_frente div_frente_ativo centralizar">
                <div>
                    <button id="nome" class="btn">editar nome</button>
                    <input id="nome_edit" class="btn btn_ativar" type="text" placeholder="Nome: ">
                    <button id="email" class="btn">editar email</button>
                    <input id="email_edit" class="btn btn_ativar" type="text" placeholder="Email: ">
                    <button id="telefone" class="btn">editar telefone</button>
                    <input id="telefone_edit" class="btn btn_ativar" type="text" placeholder="Telefone: ">
                    <button id="senha" class="btn">editar senha</button>
                    <input id="senha_edit" class="btn btn_ativar" type="text" placeholder="Senha: ">
                </div>
            </div>
            <div class="div_centro div_centro_ativo centralizar">
                <div class="centro centralizar">
                    <div class="superior_centro">
                        <div class="titulo">Descrição</div>
                    </div>
                    <div class="interior_descricao">
                        aqui você pode editar seu perfil
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const espaco = document.getElementById('espaco');
        const btn_editar = document.getElementById('editar');
        const btn_ver_perfil = document.getElementById('ver_perfil');
        const btn_nome = document.getElementById('nome');
        const btn_email = document.getElementById('email');
        const btn_telefone = document.getElementById('telefone');
        const btn_senha = document.getElementById('senha');

        btn_editar.addEventListener('click', () => {
            espaco.classList.add("ativar");
        });
        btn_ver_perfil.addEventListener('click', () => {
            espaco.classList.remove("ativar");
        });
        btn_nome.addEventListener('click', () => {
            espaco.classList.add("editar_nome");
            espaco.classList.remove("editar_email");
            espaco.classList.remove("editar_telefone");
            espaco.classList.remove("editar_senha");
            espaco.classList.add("arrumar");
        });
        btn_email.addEventListener('click', () => {
            espaco.classList.remove("editar_nome");
            espaco.classList.add("editar_email");
            espaco.classList.remove("editar_telefone");
            espaco.classList.remove("editar_senha");
        });
        btn_telefone.addEventListener('click', () => {
            espaco.classList.remove("editar_nome");
            espaco.classList.remove("editar_email");
            espaco.classList.add("editar_telefone");
            espaco.classList.remove("editar_senha");
        });
        btn_senha.addEventListener('click', () => {
            espaco.classList.remove("editar_nome");
            espaco.classList.remove("editar_email");
            espaco.classList.remove("editar_telefone");
            espaco.classList.add("editar_senha");
        });
    </script>
</body>

</html>