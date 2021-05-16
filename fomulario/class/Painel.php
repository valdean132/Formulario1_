<?php

    class Painel{

        public static function logado(){
            return isset($_SESSION['login']) ? true : false;
        }

        public static function loggout(){
            setcookie('lembrar', 'true', time()-1,'/');
            session_destroy();

            header('Location: '.INCLUDE_PATH_PANEL);
        }
    }

?>