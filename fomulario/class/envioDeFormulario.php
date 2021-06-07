<?php

    class EnvioDeFormulario{

        // Fazendo Atualização de Usuário
        public function updateUser($nome, $user, $password, $image){
            $sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET nome = ?, user = ?, password = ? , img = ? WHERE user = ?");
            if($sql->execute(array($nome, $user, $password, $image, $_SESSION['user']))){
                return true;
            }else{
                return false;
            }
        }
        
        // Verificando se Usuário Existe
        public function userExists($user){
            $sql = MySql::conectar()->prepare("SELECT `id`, `user` FROM `tb_admin.usuarios` WHERE user = ?");
            $sql->execute(array($user));
            if($sql->rowCount() == 1){
                $info = $sql->fetchAll();
                foreach($info as $key => $value){
                    return $value['user'];
                }
            }else{
                return false;
            }
        }
        
        // Cadastrar Novo Usuário
        public function registerUser($nome, $user, $password, $image, $cargo){
            $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.usuarios` VALUES (null, ?, ?, ?, ?, ?)");
            if($sql->execute(array($user, $password, $cargo, $nome, $image))){
                return true;
            }else{
                return false;
            }
        }

        // Deletar Usuário
        public function deleteUser($user){
            $sql = MySql::conectar()->prepare("DELETE FROM `tb_admin.usuarios` WHERE user = ?");
            if($sql->execute(array($user))){
                return true;
            }else{
                return false;
            }
        }

        // Fazendo Atualização de Usuário
        public function updateUserAdmin($user, $password, $cargo, $userAtual){
            $sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET user = ?, password = ? , cargo = ? WHERE user = ?");
            if($sql->execute(array($user, $password, $cargo, $userAtual))){
                return true;
            }else{
                return false;
            }
        }

        // Formulário de Agendamento
        public function agendForm($dataAgendamento, $momentoAgendamento, $nomeProfissional, $situacaoAgendamento, $responAgendamento, $id){
            $sql = MySql::conectar()->prepare("UPDATE `res_form` SET data_agendamento = ?, momento_agendamento = ?, nome_profissional = ?, situacao_agendamento = ?, respon_agendamento = ? WHERE id = ?");
            if($sql->execute(array($dataAgendamento, $momentoAgendamento, $nomeProfissional, $situacaoAgendamento, $responAgendamento, $id))){
                return true;
            }else{
                return false;
            }
        }

        // Formulário geral
        public function formGeral($momento_registro, $nome, $email, $telefone, $endereco, $resp_ged, $nome_ged, $nome_supervisor, $tipo_ajuda_opcao1, $tipo_ajuda_opcao2, $tipo_ajuda_opcao3, $tipo_ajuda_opcao4, $tipo_ajuda_opcao5, $tipo_ajuda_opcao6, $necessidade, $data_agendamento, $momento_agendamento, $nome_profissional, $situacao_agendamento, $resp_agendamento){
            $sql = MySql::conectar()->prepare("INSERT INTO `res_form`  VALUES (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        
            if($sql->execute(array($momento_registro, $nome, $email, $telefone, $endereco, $resp_ged, $nome_ged, $nome_supervisor, $tipo_ajuda_opcao1, $tipo_ajuda_opcao2, $tipo_ajuda_opcao3, $tipo_ajuda_opcao4, $tipo_ajuda_opcao5, $tipo_ajuda_opcao6, $necessidade, $data_agendamento, $momento_agendamento, $nome_profissional, $situacao_agendamento, $resp_agendamento))){
                return true;
            }else{
                return false;
            }
        }
    }
?>




