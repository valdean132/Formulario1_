<?php

    session_start();
    
    $autoload = function($class){
        // if($class == 'Email'){
        //     include('classes/phpmailer/src/PHPMailer.php');
        // }
        include('class/'.$class.'.php');
    };

    spl_autoload_register($autoload);


    // Definindo Diretorios
    define('INCLUDE_PATH', 'http://localhost/Formulario1_/fomulario/');
    define('INCLUDE_PATH_PANEL', INCLUDE_PATH.'painel/');
    define('BASE_DIR_PANEL', __DIR__.'/painel');

    // Conexão com o banco de dados
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD','');
    define('DATABASER', 'atendimento_igreja'); 

    // Função do usuario
    function pegaCargo($indice){
        return Painel::$cargos[$indice];
    }

    // Url Geral
    function urlGeral(){
        return explode('/', @$_GET['url'])[0];
    }

    // Menu Selecionado
    function selectMenu($menu){
        $url = urlGeral();

        if($url == $menu){
            echo 'class = "menu-active"';
        }
    }

    // Menus
    function menus($indece){
        return Painel::$menus[$indece];
    }

    // Display none
    function display(){
        $url = urlGeral();

        $menu = menus(0) || menus(1) || menus(2);

        if($url != $menu){
            echo 'style="display: none;"';
        }
    }

    // Title
    function titlePage(){
        $url = urlGeral();

        if(menus(0) == $url){
            echo 'Editar Usuário';
        }else if(menus(1) == $url){
            echo 'Cadastrar Usuário';
        }else if(menus(2) == $url){
            echo 'Relatório';
        }else if($url == ''){
            echo 'Agendamentos';
        }else{
            echo 'Error 404';
        }
    }

    // Permiação de Usuário Menu
    function verificaPermicaoMenu($permissao){
        if($_SESSION['cargo'] >= $permissao){
            return;
        }else{
            echo 'style="display: none;"';
        }
    }
    // Permição de Usuário Página
    function verificaPermicaoPagina($permissao){
        if($_SESSION['cargo'] >= $permissao){
            return;
        }else{
            include('pages/permissao_negada.php');
            die();
        }
    }
?>