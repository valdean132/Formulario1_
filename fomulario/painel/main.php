<?php 
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Valdean Palmeira de Souza">
    <meta name="description" content="Essa página de formulario serve para que as pessoas necessitadas de alguma forma possa buscar ajuda e esse foi o meio que achamos para possamos ajudar essas pessoas.">
    <title>Acolhimento IBN Nova Canaã || Painel de controle de agendamento</title>

    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/main.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PANEL; ?>css/painelAgend.css">
</head>
<body>
    <header>
        <div class="center">
            <div class="logo">
                <a href="">
                    <img src="https://static.wixstatic.com/media/a16b82_701423dcfd20453ca190ffb55b8e91a8~mv2.png/v1/crop/x_0,y_201,w_1090,h_674/fill/w_152,h_94,al_c,q_85,usm_0.66_1.00_0.01/a16b82_701423dcfd20453ca190ffb55b8e91a8~mv2.webp" alt="Logo">
                </a>
            </div><!-- Logo -->
            <div class="user">
                <h2>Bem Vindo(a), Funano de Tal.</h2>
                <div class="img_logo">
                    <img src="<?php echo INCLUDE_PATH_PANEL; ?>img/user.svg" alt="User_Img">
                </div>
            </div><!-- User -->
        </div><!-- Center -->
    </header><!-- Header -->
    <section class="banner">
        <div class="center">
            <div class="text-banner">
                <h3>
                    Essa é uma área para fazer o agendamento das pessoas que se cadastraram no Projeto de Acolhimento IBN Nova Canaã, Por favor preste atenção nos campos de cadastro...
                </h3>
                <h3>Dúvidas clique <a href="">Aqui!</a></h3>
            </div><!-- Text-Banner -->
        </div><!-- Center -->
    </section><!-- Section - Banner -->
    <section class="button-list">
        <div class="center">
            <div class="btn-list por_agendar">
                <div class="btn-wraper-center">
                    <div class="cont">
                        <p>5</p>
                    </div>
                    <div class="btn1 btn-wraper">
                        <h4>Por agendar</h4>
                        <div class="seta-para-baixo seta1"></div>
                    </div><!-- BTN - Wraper -->
                </div><!-- Btn-Wraper-Center -->

                <div class="list-nomes anm1">
                    <div class="name-date">
                        <h4>Valdean Palmeira de Souza</h4>
                        <p>07/02/2020 4:53:52</p>
                    </div>
                </div><!-- list-nomes -->
            </div><!-- Btn-List -->

            <div class="btn-list agendado">
                <div class="btn-wraper-center">
                    <div class="cont">
                        <p>5</p>
                    </div>
                    <div class="btn2 btn-wraper">
                        <h4>Agendadas</h4>
                        <div class="seta-para-baixo seta2"></div>
                    </div><!-- BTN - Wraper -->
                </div><!-- Btn-Wraper-Center -->

                <div class="list-nomes anm2">
                    <div class="name-date">
                        <h4>Valdean Palmeira de Souza</h4>
                        <p>07/02/2020 4:53:52</p>
                    </div>
                </div><!-- list-nomes -->
            </div><!-- Btn-List -->
        </div><!-- Center -->
    </section><!-- Section - Button-List -->


    <!-- JavaScript - JQuery -->
    <script src="<?php echo INCLUDE_PATH; ?>js/jquery-3.5.1.min.js"></script>
    <script src="<?php echo INCLUDE_PATH_PANEL; ?>js/animacoes.js"></script>
</body>
</html>