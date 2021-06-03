<?php

    class Agendamentos{

        // Por agendar
        public static function porAgendar(){
            $sql = MySql::conectar()->prepare("SELECT * FROM `res_form` WHERE `situacao_agendamento` = ?");
            $sql->execute(array(strtoupper('n')));

            return $sql->fetchAll();
        }
        
        // Por agendar
        public static function agendados($nomeUser){
            $sql = MySql::conectar()->prepare("SELECT * FROM `res_form` WHERE `situacao_agendamento` = ? AND respon_agendamento = ?");
            $sql->execute(array(strtoupper('s'), $nomeUser));

            return $sql->fetchAll();
        }

    }

?>