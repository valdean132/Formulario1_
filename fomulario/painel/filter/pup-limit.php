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
    echo "<div> Total na planilha: ".count($paginacaoLimitAgendados)."</div>";
    
    foreach($paginacaoLimitAgendados as $key => $value){
        $key = $key+1;
        
        $visuGeral = "
            <div class='ocultar form-agend agendados$key'>
            <a href='' class='sairModal'>x</a><!-- Fechar Popup -->
            <h2>Agendamento de ".$value['nome']."</h2>
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
                    $visuGeral .= "
                        </div><!-- Form-Group-agend-Tipo-Ajuda -->
                        <div class='form-group-agend necessidade disabled'>";
                            if($value['necessidade'] == ''){
                                $visuGeral .="
                                    <div class='null-necessidade'>
                                        <p>Não Possue necessidade</p>
                                    </div>
                                ";
                            }else{
                                $visuGeral .="
                                    <label for=''>Necessidade:</label>
                                    <h4>".$value['necessidade']."</h4>
                                ";
                            }
                            $visuGeral .="
                                </div><!-- Form-Group-agend-Ged -->";
                                if($value['situacao_agendamento'] == strtoupper('s')){
                                    $visuGeral .="
                                        <div class='form-group-agend disabled'>
                                            <label for='data-agend$key'>Data de Consulta:</label>";
                                                $datetimeLocal = explode(' ', date('Y-m-d H:i:s', strtotime($value['data_agendamento'])));
                                                $datetimeLocalAgendado = $datetimeLocal[0].'T'.$datetimeLocal[1];
                                    $visuGeral .="
                                            <input type='datetime-local' disabled value='$datetimeLocalAgendado' name='data-agend' required id='data-agend$key'>
                                        </div><!-- Form-Group-data-agend -->

                                        <div class='form-group-agend disabled'>
                                            <label for='nome-profissional$key'>Profissional Qualificado:</label>
                                            <input type='text' name='nome-profissional' disabled value='".$value['nome_profissional']."' id='nome-profissional$key'>
                                        </div><!-- Form-Group-data-agend -->";
                                    if($value['visita_concluida'] == strtoupper('s')){
                                        $visuGeral .="
                                            <div class='form-group-agend disabled'>
                                                <label for='Visitado$key'>Visitou?</label>
                                                <div class='box-form-resp'>
                                                    <input id='s$key' type='radio' name='resp_visita' value='2' checked>
                                                    <label for='s$key'>Sim</label>
                                                </div>
                                            </div><!-- Form-Group-data-agend -->";
                                    }else{
                                        $visuGeral .="
                                        <div class='form-group-agend disabled'>
                                            <label for='Visitado$key'>Visitou?</label>
                                            <div class='box-form-resp'>
                                                <input id='n$key' type='radio' name='resp_visita' value='2' checked>
                                                <label for='n$key'>Não</label>
                                            </div>
                                        </div><!-- Form-Group-data-agend -->";
                                    }
                                }
                        $visuGeral .="    
                            </div><!-- Form-50 -->
                            </div><!-- center-form -->
                            <input type='hidden' name='id' value='".$value['id']."'>
                        </form><!-- Form -->
                    </div><!-- Form Agend -->";  

        echo $visuGeral;
    }
?>