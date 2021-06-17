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
        public static function loadPage($cargo){
            
            if(isset($_GET['url'])){
                $url = explode('/', $_GET['url']);
                if(file_exists('pages/'.$url[0].'.php')){
                    include('pages/'.$url[0].'.php');
                }else{
                    // Quando a pagina não existe
                    include('pages/404.php');
                }
            }else{
                if($cargo == 0){
                    include('pages/home-visita.php');
                }else{
                    include('pages/home.php');
                }
            }
        }

        // Verificando se foi Enviado Com sucesso
        public static function alert($type, $men, $span){
            if($type == 'sucesso'){
                echo '<div class="box-alert '.$type.'"><i>'.Icon::$checked.'</i><p>'.$men.'<span>'.$span.'</span></p></div>';
                echo "<script>
                        setTimeout(()=>{
                            // location.reload(true);
                            window.location.href = '';
                            
                        }, 2000);
                    </script>";
                // echo "<meta HTTP-EQUIV='refresh' CONTENT='2'>";
            }else if($type == 'error'){
                echo '<div class="box-alert '.$type.'"><i>'.Icon::$closeError.'</i><p>'.$men.'<span>'.$span.'</span></p></div>';
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

        // Variaveis de Cargo
        public static $cargos = [
            '0' => 'Responsavel Pelas Visitas',
            '1' => 'Agendador',
            '2' => 'Administrador',
            '3' => 'Administrador Geral'
        ];

        // Variaveis de Menu
        public static $menus = [
            '0' => 'editar-usuario',
            '1' => 'cadastrar-usuario',
            '2' => 'relatorio'
        ];

        // Variaveis de Tipo de opção ajuda
        public static $tipo_ajuda_opcao = [
            '1' => 'Apoio Espiritual (Pedido de oração, palavra do pastor, leitura da palavra de Deus)',
            '2' => 'Apoio Psicológico (Estou de luto, depressão, ansiedade)',
            '3' => 'Ajuda Social (alimentícias, medicações, transporte para uma unidade de saúde, etc)',
            '4' => 'Atendimento de Fisioterapia',
            '5' => 'Atendimento de enfermagem (suspeita de Covid, dúvidas e suporte)',
            '6' => 'Outro:'
        ];

        // Puxar Usuários Cadastrados
        public static function registeredUsers(){
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
            $sql->execute();

            return $sql->fetchAll();
        }
    }

?>