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
    function pegaCargo($cargo){
        $arr = [
            '0' => 'Normal',
            '1' => 'Sub Administrador',
            '2' => 'Administrador'
        ];

        return $arr[$cargo];
    }

    // Menu Selecionado
    function selectMenu($menu){
        $url = explode('/', @$_GET['url'])[0];

        if($url == $menu){
            echo 'class = "menu-active"';
        }
    }

    // Display none
    function display(){
        $url = explode('/', @$_GET['url'])[0];

        $editar = 'editar-usuario';
        $cadastrar = 'cadastrar-usuario';
        $relarotio = 'relatorio';

        $menu = $editar || $cadastrar || $relarotio;

        if($url != $menu){
            echo 'style="display: none;"';
        }
    }
?>