<?php
    
    class EnvForm{
        public static function envForm(){
            if(isset($_POST['acao'])){
                $momento_registro = date('Y-m-d H:i:s');
        
                $usuario = new EnvioDeFormulario();
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];
                $endereco_rua = $_POST['endereco_rua'];
                $endereco_numCasa = $_POST['endereco_numCasa'];
                $endereco_bairro = $_POST['endereco_bairro'];
                $endereco = "$endereco_rua, $endereco_numCasa - $endereco_bairro";
        
                $nome_ged = '';
                $nome_supervisor = '';
        
                
                $tipo_ajuda_opcao1 = '';
                $tipo_ajuda_opcao2 = '';
                $tipo_ajuda_opcao3 = '';
                $tipo_ajuda_opcao4 = '';
                $tipo_ajuda_opcao5 = '';
                $tipo_ajuda_opcao6 = '';
                
        
                if($_POST['resp_ged'] == 1){
                    $resp_ged = 'Sim';
                    $nome_ged = $_POST['nome_ged'];
                    $nome_supervisor = $_POST['nome_supervisor'];
                }else {
                    $resp_ged = 'Não';
                }
        
                foreach($_POST['tipo_ajuda_opcao'] as $value){
                    switch ($value) {
                        case 1:
                            $tipo_ajuda_opcao1 = 'Apoio Espiritual (Pedido de oração, palavra do pastor, leitura da palavra de Deus)';
                            break;
                        case 2:
                            $tipo_ajuda_opcao2 = 'Apoio Psicológico (Estou de luto, depressão, ansiedade)';
                            break;
                        case 3:
                            $tipo_ajuda_opcao3 = 'Ajuda Social (alimentícias, medicações, transporte para uma unidade de saúde, etc)';
                            break;
                        case 4:
                            $tipo_ajuda_opcao4 = 'Atendimento de Fisioterapia';
                            break;
                        case 5:
                            $tipo_ajuda_opcao5 = 'Atendimento de enfermagem (suspeita de Covid, dúvidas e suporte)';
                            break;
                        case 6:
                            $tipo_ajuda_opcao6 = $_POST['outros'];
                            break;
                    }
                }
                
                $necessidade = $_POST['necessidade'];
                $situacao_agendamento = strtoupper('n');
        
        
                if($usuario->formGeral($momento_registro, $nome, $email, $telefone, $endereco, $resp_ged, $nome_ged, $nome_supervisor, $tipo_ajuda_opcao1, $tipo_ajuda_opcao2, $tipo_ajuda_opcao3, $tipo_ajuda_opcao4, $tipo_ajuda_opcao5, $tipo_ajuda_opcao6, $necessidade, $situacao_agendamento)){
                    Painel::alert('sucesso', 'Seu formulário foi enviado com sucesso!!!', 'Iremos analizar sua situação e entraremos em contato o mais rápido possível. Aguarde!');
                }else{
                    Painel::alert('error', 'Ocorreu um erro ao enviar seu formulário...','Por favor tente novamente.');
                }
            }
        }
    }

?>