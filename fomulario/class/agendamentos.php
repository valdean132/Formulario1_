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
            $sql = MySql::conectar()->prepare("SELECT * FROM `res_form` WHERE `situacao_agendamento` = ? AND respon_agendamento = ? AND visita_concluida = ?");
            $sql->execute(array(strtoupper('s'), $nomeUser, strtoupper('n')));

            return $sql->fetchAll();
        }
        
        // Agendados
        public static function visitados($nomeUser){
            $sql = MySql::conectar()->prepare("SELECT * FROM `res_form` WHERE nome_profissional = ? AND visita_concluida = ?");
            $sql->execute(array($nomeUser, strtoupper('s')));

            return $sql->fetchAll();
        }

        // Total de Agendamentos
        public static function totalAgendamentos($resp = null, $agend = null, $visita = null){
            if($resp == null || $resp == ''){
                $sql = MySql::conectar()->prepare("SELECT * FROM `res_form`");
                $sql->execute();
            }else{
                $sql = MySql::conectar()->prepare("SELECT * FROM `res_form` WHERE `situacao_agendamento` = ? AND `nome_profissional` = ? AND visita_concluida = ?");
                $sql->execute(array(strtoupper('s'), $resp, strtoupper('n')));
            }

            if($agend == strtoupper('n')){
                $sql = MySql::conectar()->prepare("SELECT * FROM `res_form` WHERE `situacao_agendamento` = ?");
                $sql->execute(array($agend));
            }else if($agend == strtoupper('s') && $visita == strtoupper('n')){
                $sql = MySql::conectar()->prepare("SELECT * FROM `res_form` WHERE `situacao_agendamento` = ? AND `visita_concluida` = ?");
                $sql->execute(array($agend, $visita));
            }else if($agend == strtoupper('s') && $visita == strtoupper('s')){
                $sql = MySql::conectar()->prepare("SELECT * FROM `res_form` WHERE `situacao_agendamento` = ? AND `visita_concluida` = ?");
                $sql->execute(array($agend, $visita));
            }

            return $sql->fetchAll();

        }

        // Paginação limitada Agendados
        public static function paginacaoLimitAgendados($inicio, $qnt_result_pg, $agend = null, $visita = null){
            if($agend == null && $visita == null){
                $sql = MySql::conectar()->prepare("SELECT * FROM `res_form` LIMIT $inicio, $qnt_result_pg");
                $sql->execute();
            }else if($agend == strtoupper('n')){
                $sql = MySql::conectar()->prepare("SELECT * FROM `res_form` WHERE `situacao_agendamento` = ? LIMIT $inicio, $qnt_result_pg");
                $sql->execute(array($agend));
            }else if($agend == strtoupper('s') && $visita == strtoupper('n')){
                $sql = MySql::conectar()->prepare("SELECT * FROM `res_form` WHERE `situacao_agendamento` = ? AND `visita_concluida` = ? LIMIT $inicio, $qnt_result_pg");
                $sql->execute(array($agend, $visita));
            }else if($agend == strtoupper('s') && $visita == strtoupper('s')){
                $sql = MySql::conectar()->prepare("SELECT * FROM `res_form` WHERE `situacao_agendamento` = ? AND `visita_concluida` = ? LIMIT $inicio, $qnt_result_pg");
                $sql->execute(array($agend, $visita));
            }
            
            return $sql->fetchAll();
        }


    }

?>