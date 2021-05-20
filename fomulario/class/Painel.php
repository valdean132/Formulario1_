<?php

    class Painel{

        // Logar
        public static function logado(){
            return isset($_SESSION['login']) ? true : false;
        }

        // Voltar a página de Login
        public static function loggout(){
            setcookie('lembrar', 'true', time()-1,'/');
            session_destroy();

            header('Location: '.INCLUDE_PATH_PANEL);
        }

        // Redirecionamento
        public static function loadPage(){
            
            if(isset($_GET['url'])){
                $url = explode('/', $_GET['url']);
                if(file_exists('pages/'.$url[0].'.php')){
                    include('pages/'.$url[0].'.php');
                }else{
                    // Quando a pagina não existe
                    include('pages/404.php');
                }
            }else{
                include('pages/home.php');
            }
        }
        
    }

?>