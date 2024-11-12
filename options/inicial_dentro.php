<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF_8">
    <meta name="viewport" content="width=device_width, initial_scale=1.0">
    <title>Inicial Dentro</title>
    <link rel="stylesheet" href="css/inicial_tudo.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" 
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" 
    crossorigin="anonymous" defer></script>
    <script src="js/script.js" defer></script>
    <script src="js/upload.js" defer></script>
    <script src="js/puxarMembros.js" defer></script>
    <script src="js/cep.js" defer></script>
    <?php
    session_start();

    if (!isset($_SESSION['usuario'])) { 
        header("Location: ../logincadastro/login_cadastro.html");
        exit();
    }
    $email = $_SESSION['usuario']['email'];
    $senha = $_SESSION['usuario']['senha'];
    ?>
</head>

<body>
    <div class="espaco">
        <aside class="lado_esquerdo">
            <div class="nome_empresa">
                <h1>CCONNECT</h1>
            </div>
            <nav id="buttons_active_t">
                <button id="mapeamento" class="tabs">Mapeamento de Problemas Locais</button>
                <button id="membros" class="tabs">Visualização de Membros</button>
                <button id="problemas" class="tabs">Problemas Locais</button>
                <button id="forum" class="tabs">Fórum de Discussão</button>
                <button id="financiamento" class="tabs">Financiamento Coletivo</button>
            </nav>
            <div class="support">
                <a class="a" href="#">Suporte</a>
            </div>
        </aside>
        <main class="main_content">
            <header class="header_inicial_dentro" id="title_t">
                <h2 id="title_espaco" class="title_class">Teste</h2>
                <h2 id="title_mapeamento" class="title_class">Mapeamento Remoto</h2>
                <h2 id="title_membros" class="title_class">Visualização de Membros</h2>
                <h2 id="title_problemas" class="title_class">Problemas Locais</h2>
                <h2 id="title_forum" class="title_class">Fórum de Duscussão</h2>
                <h2 id="title_financiamento" class="title_class">Financiamento Coletivo</h2>
                <div id="active_topo" class="header_actions">
                    <div class="dropdown_container_perfil_sair">
                        <button class="icon_button dropdown_button_perfil_sair" id="user_button"
                            onclick="toggleDropdown()">
                            <img src="img/user_inicial_dentro.png" alt="">
                        </button>
                        <div class="dropdown_overlay_perfil_sair" id="dropdownOverlay" onclick="toggleDropdown()"></div>
                        <div class="dropdown_menu_perfil_sair" id="dropdownMenu">
                            <a href="editar_perfil.php" class="link_perfil_sair">
                                <div class="dropdown_item_perfil_sair">
                                    <img class="img_opcoes" src="img/opcoes_inicial.png" alt=""> Ver Perfil
                                </div>
                            </a>
                            <a href="php/logout.php" class="link_perfil_sair">
                                <div class="dropdown_item_perfil_sair">
                                    <img src="img/door.png" alt="" class="img_opcoes"> Sair
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </header>
            <div id="content" class="content">
                <div id="mapeamento_disc">
                    <div id="map">
                        <!-- <iframe class="map_mapeamento"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3647.3030413476204!2d100.5641230193719!3d13.757206847615207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf51ce6427b7918fc!2sG+Tower!5e0!3m2!1sen!2sth!4v1510722015945"
                            allowfullscreen></iframe> -->
                    </div>
                </div>
                <div id="visualizacao_disc">
                    <div class="body_visualizacao">
                        <div class="min-h-screen p-8">
                            <div class="card_visualizacao">
                                <div class="card_content_visualizacao">
                                    <div class="search_container_visualizacao">
                                        <input id="search_input_visualizacao" type="text"
                                            placeholder="Pesquisar por nome..." class="search_input_visualizacao" />
                                        <svg xmlns="http://www.w3.org/2000/svg" class="search_icon_visualizacao"
                                            viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2"
                                            width="20" height="20">
                                            <path fill="none" d="M19 19l-4-4M11 6a5 5 0 1 1 0 10 5 5 0 0 1 0-10z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="table_container_visualizacao">
                                        <table class="table_visualizacao">
                                            <thead>
                                                <tr class="tr_visualizacao">
                                                    <th class="th_visualizacao">Id</th>
                                                    <th class="th_visualizacao">Nome</th>
                                                    <th class="th_visualizacao">Telefone</th>
                                                    <th class="th_visualizacao">E-mail</th>
                                                </tr>
                                            </thead>
                                            <tbody id="membros_table_visualizacao">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="problemas_disc">
                    <div class="container_problemas">
                        <h1 class="h1_problemas">Reportar Problema</h1>
                        <form id="reportForm_problemas">
                            <label class="label_problemas" for="title_problema">Título</label>
                            <input class="input_problemas" type="text" id="title_problema" name="title_problema"
                                required>

                            <label class="label_problemas" for="description_problemas">Descrição</label>
                            <input class="input_problemas" type="text" id="description_problemas"
                                name="description_problemas" rows="4" required>

                            <label class="label_problemas">Adicionar Arquivos (Máx. 5)</label>
                            <div class="file_upload_problemas"
                                onclick="document.getElementById('fileInput_problemas').click()">Clique para enviar ou
                                arraste e solte</div>
                            <input class="input_problemas" type="file" id="fileInput_problemas" name="media" style="display: none;"
                                multiple accept="image/*,video/*" onchange="handleFileChange(event)">

                            <ul class="file_list_problemas" id="fileList_problemas"></ul>

                            <button type="submit_problemas" class="submit_btn_problemas" id="btnEnviar">Enviar Relatório</button>
                        </form>
                        <div id="notification_problemas" class="notification_problemas" style="display: none;">
                            Problema reportado com sucesso!
                        </div>
                    </div>
                </div>
                <div id="forum_disc" class="responsividade">
                    <div class="body_forum">
                        <div class="card_forum">
                            <div class="card_forum_content" id="message_forums_container"></div>
                            <footer class="card_forum_footer_forum">
                                <div id="replying_to_forum" class="replying_to_forum hidden_forum"></div>
                                <form id="message_forum_form">
                                    <input type="text" id="mensagem_enviar_forum" placeholder="Digite sua mensagem..."
                                        required>
                                    <button type="submit" class="send_button_forum" >
                                        <svg class="icon_forum"><!-- Ícone de enviar aqui --></svg>
                                    </button>
                                </form>
                            </footer>
                        </div>
                    </div>
                </div>
                <div id="financiamento_disc">
                    <div class="body_financiamento">
                        <div class="container_financiamento">
                            <h1>Campanha de Financiamento Coletivo</h1>
                            <div class="card2">
                                <h2>Progresso da Campanha</h2>
                                <div class="progress2">
                                    <div id="progress2_bar" class="progress2_bar"></div>
                                </div>
                                <div class="stats2">
                                    <div>
                                        <p id="raised_amount">R$ 1.000</p>
                                        <p>de R$ 100.000 arrecadados</p>
                                    </div>
                                    <div>
                                        <p id="backers_count">1234</p>
                                        <p>apoiadores</p>
                                    </div>
                                    <div>
                                        <p id="days_left">15</p>
                                        <p>dias restantes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card2">
                                <div class="faca_financeiro">Faça sua doação</div>
                                <div class="tabs2">
                                    <button class="button2 tab_button2 active"
                                        onclick="showTab('amount')">Valor</button>
                                    <button class="button3 tab_button2" onclick="showTab('payment')">Pagamento</button>
                                </div>
                                <div id="amount" class="tab_content">
                                    <label for="donation_amount">Valor da doação (R$)</label>
                                    <input id="donation_amount" type="number" value="50"
                                        onchange="updateDonationAmount(this.value)">
                                    <div class="donations">
                                        <button class="button2" onclick="setDonationAmount(10)">R$ 10</button>
                                        <button class="button2" onclick="setDonationAmount(25)">R$ 25</button>
                                        <button class="button2" onclick="setDonationAmount(50)">R$ 50</button>
                                        <button class="button2" onclick="setDonationAmount(100)">R$ 100</button>
                                    </div>
                                </div>
                                <div id="payment" class="tab_content" style="display:none;">
                                    <label>Forma de pagamento:</label>
                                    <div>
                                        <input type="radio" name="payment" value="credit" checked> Cartão de Crédito
                                    </div>
                                    <div>
                                        <input type="radio" name="payment" value="debit"> Cartão de Débito
                                    </div>
                                    <div>
                                        <input type="radio" name="payment" value="pix"> PIX
                                    </div>
                                    <div>
                                        <input type="radio" name="payment" value="boleto"> Boleto
                                    </div>
                                </div>
                                <button class="button2" onclick="donate()">Doar R$ <span
                                        id="current_amount">50</span></button>
                            </div>
                            <div class="card2">
                                <h2>Sobre a Campanha</h2>
                                <p>Nossa campanha de financiamento coletivo tem como objetivo arrecadar fundos para
                                    um
                                    projeto inovador que irá beneficiar toda a comunidade...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="js/inicial_tudo.js"></script>
</body>

</html>