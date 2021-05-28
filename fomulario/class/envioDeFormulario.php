<?php

    class EnvioDeFormulario{

        // Fazendo Atualização de Usuário
        public function updateUser($nome, $password, $image){
            $sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET nome = ?, password = ? , img = ? WHERE user = ?");
            if($sql->execute(array($nome, $password, $image, $_SESSION['user']))){
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
    }

?>