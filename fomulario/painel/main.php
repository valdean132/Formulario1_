<?php 
    if(isset($_GET['loggout'])){
        Painel::loggout();
    }
    $classAnimateHeader = 'animate-header';
    $classAnimateInicial = 'animate-inicial';
    if(isset($_POST['acao']) || 
        isset($_POST['deletar']) || 
        isset($_POST['editar']) || 
        isset($_POST['agendar']) ||
        isset($_POST['visita_concluida']) ||
        isset($_POST['reagendar']) ||
        isset($_GET['pagina']) ||
        isset($_GET['sucesso']) ||
        isset($_POST['todos']) ||
        isset($_POST['porAgendar']) ||
        isset($_POST['agendados']) ||
        isset($_POST['visitaConcluida'])){
        $classAnimateHeader = '';
        $classAnimateInicial = '';
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Valdean Palmeira de Souza">
    <meta name="description" content="Essa página de formulario serve para que as pessoas necessitadas de alguma forma possa buscar ajuda e esse foi o meio que achamos para possamos ajudar essas pessoas.">
    <title><?php titlePage(); ?></title>

    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/main.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PANEL; ?>css/main.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PANEL; ?>css/home.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PANEL; ?>css/404.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PANEL; ?>css/usuario.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PANEL; ?>css/relatorio.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PANEL; ?>css/table.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/animate.css">

</head>
<body>
    <base base="<?php echo INCLUDE_PATH_PANEL; ?>">
    <header class="<?php echo $classAnimateHeader; ?>">
        <div class="center">
            <div class="logo">
                <a href="<?php echo INCLUDE_PATH_PANEL; ?>">
                    <img src="<?php echo INCLUDE_PATH_PANEL; ?>img/logo-ibn-nova-canaa-letra-preta21.png" alt="Logo">
                </a>
            </div><!-- Logo -->
            <div class="user">
                <div class="user-wecome">
                    <h2><?php echo $_SESSION['nome'];?>, <?php echo pegaCargo($_SESSION['cargo']); ?>.</h2>

                    <div class="menu-wraper">
                        <div class="img_logo">
                            <?php if($_SESSION['img'] == ''){ ?>
                                <div class="imagem-user border-logo-usuario">
                                    <i alt="User_Img" title="Avatar"><?php echo Icon::$user1; ?></i>
                                </div>
                            <?php }else{ ?>
                                <div class="imagem-usuario border-logo-usuario">
                                    <img src="<?php echo INCLUDE_PATH_PANEL ?>uploads/<?php echo $_SESSION['img']; ?>" alt="User_Img" title="<?php echo $_SESSION['nome'];?>">
                                </div>
                            <?php } ?>    
                        </div>

                        <nav class="menu-single">
                            <div class="after"></div>
                            <ul>
                                <li <?php verificaPermicaoMenu(0); selectMenu('editar-usuario'); ?>>
                                    <a realtime="editar-usuario" href="<?php echo INCLUDE_PATH_PANEL; ?>editar-usuario"><i><?php echo Icon::$editarPerfil; ?></i>Editar Usuário</a>
                                </li>
                                <li <?php verificaPermicaoMenu(2); selectMenu('cadastrar-usuario'); ?>>
                                    <a realtime="cadastrar-usuario" href="<?php echo INCLUDE_PATH_PANEL; ?>cadastrar-usuario"><i><?php echo Icon::$cadastrar; ?></i>Cadastrar Usuário</a>
                                </li>
                                <li <?php verificaPermicaoMenu(2); selectMenu('relatorio'); ?>>
                                    <a realtime="relatorio" href="<?php echo INCLUDE_PATH_PANEL; ?>relatorio"><i><?php echo Icon::$relatorio; ?></i>Relatório</a>
                                </li>
                                <li>
                                    <a realtime="" href="<?php echo INCLUDE_PATH_PANEL; ?>?loggout"><i><?php echo Icon::$loggout; ?></i>Sair</a>
                                </li>
                            </ul>
                        </nav><!-- Menu Sigle -->
                    </div><!-- Menu Wraper -->
                </div><!-- user-wecome -->
            </div><!-- User -->
        </div><!-- Center -->
    </header><!-- Header -->
    <div class="container-central">
        <?php echo Painel::loadPage($_SESSION['cargo']); ?>
    </div><!-- Container Central -->
    
    <div class="homeInicial <?php echo $classAnimateInicial; ?>" <?php display() ?>>
        <div class="homeInicial-center">
            <a href="<?php echo INCLUDE_PATH_PANEL; ?>"><i><?php echo Icon::$homePage; ?></i></a>
        </div>
    </div>


    <!-- JavaScript - JQuery -->
    <script src="<?php echo INCLUDE_PATH; ?>js/jquery-3.5.1.min.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script>
    <script src="<?php echo INCLUDE_PATH_PANEL; ?>js/animacoes.js"></script>
    <script src="<?php echo INCLUDE_PATH_PANEL; ?>js/modal.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/pace.min.js"></script>
</body>
</html>