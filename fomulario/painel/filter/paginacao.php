<?php
    include('../../config.php');

    
    // Receber o número da página
    $pagina_atual = $_POST['pagina'];

     $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
     
     // Setar a quantidade de itens por página
     $qnt_result_pg = 5;
     
     // Calcular o inicio da visualização
     $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
     
     // Buscando no banco de dados
     $paginacaoLimitAgendados = Agendamentos::paginacaoLimitAgendados($inicio, $qnt_result_pg);
     $totalAgendamentos = Agendamentos::totalAgendamentos();
     

     $paginacaoLimitAgendadosCont = count($paginacaoLimitAgendados);


     // Somando quantidade de cadastro
     $result_pg = count($totalAgendamentos);

     // Quantidadades de Páginas
     $quantidade_pg = ceil($result_pg / $qnt_result_pg);

     // Limitar A quantidade de Links
     $max_links = 1;

    foreach($paginacaoLimitAgendados as $key => $value){
        $key = $key+1;
        
        $prev = "
        <tr>
            <td class='column1'>".$value['id']."</td>
            <td class='column2'>".$value['nome']."</td>
            <td class='column3'>".$value['telefone']."</td>";
            if($value['situacao_agendamento'] == strtoupper('s')){
                $prev .= "
                <td class='column4'>".date('d/m/Y H:i', strtotime($value['data_agendamento']))."</td>
                <td class='column5'>".$value['respon_agendamento']."</td>";
            }else{
                $prev .= "
                <td class='column4'>00/00/0000 00:00</td>
                <td class='column5'>Não foi agendado</td>";
            }
            $prev .= "
            <td class='column6'>
                <div class='opcoes-wrapper'>
                    <div class='mostrar-single btn-agendados$key' realtime='$key' title='Editar'>
                        <i>".Icon::$mostrar."</i>
                    </div><!-- Editar Single -->
                </div><!-- opcoes-wrapper -->
            </td>
        </tr>";

        echo $prev;
    }
?>