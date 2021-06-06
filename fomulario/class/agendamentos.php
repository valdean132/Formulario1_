<?php

    class Agendamentos{

        // Por agendar
        public static function porAgendar(){
            $sql = MySql::conectar()->prepare("SELECT * FROM `res_form` WHERE `situacao_agendamento` = ?");
            $sql->execute(array(strtoupper('n')));

            return $sql->fetchAll();
        }
        
        // Agendados
        public static function agendados($nomeUser){
            $sql = MySql::conectar()->prepare("SELECT * FROM `res_form` WHERE `situacao_agendamento` = ? AND respon_agendamento = ?");
            $sql->execute(array(strtoupper('s'), $nomeUser));

            return $sql->fetchAll();
        }

        // Total de Agendamentos
        public static function totalAgendamentos(){
            $sql = MySql::conectar()->prepare("SELECT * FROM `res_form` WHERE `situacao_agendamento` = ?");
            $sql->execute(array(strtoupper('s')));

            return $sql->fetchAll();
        }

        // Paginação limitada Agendados
        public static function paginacaoLimitAgendados($inicio, $qnt_result_pg){
            $sql = MySql::conectar()->prepare("SELECT * FROM `res_form` LIMIT $inicio, $qnt_result_pg");
            $sql->execute();

            return $sql->fetchAll();
        }


    }

?>