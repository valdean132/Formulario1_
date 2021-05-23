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
    }

?>