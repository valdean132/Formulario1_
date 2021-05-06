<?php

    session_start();
    
    $autoload = function($class){
        // if($class == 'Email'){
        //     include('classes/phpmailer/src/PHPMailer.php');
        // }
        include('class/'.$class.'.php');
    };

    spl_autoload_register($autoload);


    define('INCLUDE_PATH', 'http://localhost/Formulario1_/fomulario/');
    define('INCLUDE_PATH_PANEL', INCLUDE_PATH.'painel/');
    // Conexão com o banco de dados
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD','');
    define('DATABASER', 'atendimento_igreja'); 
?>