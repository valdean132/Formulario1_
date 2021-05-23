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

        // Verificando se foi Enviado Com sucesso
        public static function alert($type, $men, $span){
            if($type == 'sucesso'){
                echo '<div class="box-alert '.$type.'"><i>'.Icon::$checked.'</i><p>'.$men.'</p><span>'.$span.'</span></div>';
            }else if($type == 'error'){
                echo '<div class="box-alert '.$type.'"><i>'.Icon::$closeError.'</i><p>'.$men.'</p><span>'.$span.'</span></div>';
            }
        }
        
        // Validação de Imagens
        public static function imgValid($imagem){
            if($imagem['type'] == 'image/jpeg' ||
                $imagem['type'] == 'image/jpg' ||
                $imagem['type'] == 'image/png'){
                
                $tamanho = intval($imagem['size']/1024);
                if($tamanho < 300){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        // Deletar Documentos de Imagens
        public static function deleteFile($file){
            @unlink(BASE_DIR_PANEL.'/uploads/'.$file);
        }

        // Salvando Documentos de Imagens
        public static function uploadFile($file){
            $formatoArquivo = explode('.',$file['name']);
            $imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];

            if(move_uploaded_file($file['tmp_name'], BASE_DIR_PANEL.'/uploads/'.$imagemNome)){
                return $imagemNome;
            }else{
                return false;
            }
        }
    }

?>