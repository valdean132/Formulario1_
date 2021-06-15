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
        
        $visuGeral .= "
            <div class='ocultar form-agend agendados$key; ?>'>
            <a href='' class='sairModal'>x</a><!-- Fechar Popup -->
            <h2>Agendamento de".$value['nome']."</h2>
            <form method='POST'>
                <div class='center-form'>
                    <div class='form-50'>
                        <div class='form-group-agend disabled'>
                            <label for='nome$key'>Nome:</label>
                            <h4>".$value['nome']."</h4>
                            <input type='hidden' id='nome$key' name='nome' required value='".$value['nome']."'>
                        </div><!-- Form-Group-agend-Nome -->

                        <div class='form-group-agend disabled'>
                            <label for='email$key'>E-mail:</label>
                            <h4>".$value['email']."</h4>
                        </div><!-- Form-Group-agend-Email -->

                        <div class='form-group-agend disabled'>
                            <label for='telefone$key'>Celular:</label>
                            <h4>".$value['telefone']."</h4>
                        </div><!-- Form-Group-agend-Telefone -->
        
                        <div class='form-group-agend disabled'>
                            <label for='endereco$key'>Endereço:</label>
                            <h4>".$value['endereco']."</h4>
                        </div><!-- Form-Group-agend-Telefone -->

                        <div class='form-group-agend ged disabled'>";
                            if($value['resp_ged'] == 'Sim'){
                                $visuGeral .= "
                                    <label for=''>Ged:</label>
                                    <input type='text' name='' disabled value='".$value['nome_ged']."'>
                
                                    <label for='endereco$key'>Supervisor:</label>
                                    <input type='text' name='' disabled value='".$value['nome_supervisor']."'>";
                            }else{
                                $visuGeral .= "
                                    <div class='null-ged'>
                                        <p>Não Possue Ged</p>
                                    </div>";
                            }
                $visuGeral .= "
                            </div><!-- Form-Group-agend-Ged -->
                    </div><!-- Form-50 -->
                    
                    <div class='form-50'>
                        <div class='form-group-agend disabled'>
                            <label for=''>Tipos de Ajuda</label>";  
                            for($i = 1; $i <= 6; $i++){
                                if($value["tipo_ajuda_opcao{$i}"] == ''){
                                    $visuGeral .= "<div class='tipo-ajuda'></div><!-- Tipo Ajuda -->";
                                }else{
                                    $visuGeral .= "
                                        <div class='tipo-ajuda'>
                                            <div class='tipo-ajuda-wrapper'>
                                                <div class='checkbox'>
                                                    <i>".Icon::$vistos2."</i>
                                                </div>
                                                <label for='>".$value["tipo_ajuda_opcao{$i}"]."</label>
                                            </div><!-- Tipo Ajuda Wrapper -->
                                        </div><!-- Tipo Ajuda -->";
                                }
                            }
            $visuGeral .= "</div><!-- Form-Group-agend-Tipo-Ajuda -->
        ";

        echo $prev;
    }
?>