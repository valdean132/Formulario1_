<?php
    date_default_timezone_set('America/Manaus');
    
    include('config.php');
    include('../index.php');

    
    if(isset($_POST['acao'])){
        
        /* 
        $sql = $pdo->prepare("SELECT email FROM `res_form`");
        $sql->execute();
        // $verif_email = $sql->fetchAll();
        // foreach($verif_email as $key => $value){
            if($_POST['email'] == $$sql->fetchAll()){
               die($confirmado = "<h2 class='verificacao'>O E-mail enserido já se encontra cadastrado em nosso banco de dados. <br/>Por favor escolha outro E-mail e tente novamente.</h2>");
            }else{
                
            }
        // }
        */
        $momento_registro = date('Y-m-d H:i:s');

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

        $data_agendamento = ''; 
        $nome_profissional = '';
        $resp_agendamento = '';
        

        if($_POST['resp_ged'] == 1){
            $resp_ged = 'Sim';
            $nome_ged = $_POST['nome_ged'];
            $nome_supervisor = $_POST['nome_supervisor'];
        }else {
            $resp_ged = 'Não';
        }

        foreach($_POST['tipo_ajuda_opcao'] as $key => $value){
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
        $situacao_agendamento = 'Não';

        $sql = $pdo->prepare("INSERT INTO `res_form`  VALUES (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $sql->execute(array($momento_registro, $nome, $email, $telefone, $endereco, $resp_ged, $nome_ged, $nome_supervisor, $tipo_ajuda_opcao1, $tipo_ajuda_opcao2, $tipo_ajuda_opcao3, $tipo_ajuda_opcao4, $tipo_ajuda_opcao5, $tipo_ajuda_opcao6, $necessidade, $data_agendamento, $nome_profissional, $situacao_agendamento, $resp_agendamento));


        $confirmado = "<h2 class='confirmado'>Seu formulário soi enviado com sucesso!!! <br/>Iremos analizar sua situação e entraremos em contato o mais rápido possível. Aguarde!</h2>";

    }

?>