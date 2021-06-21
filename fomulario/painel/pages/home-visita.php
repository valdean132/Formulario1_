<?php
    $visitas_pendentes = Agendamentos::totalAgendamentos($_SESSION['nome']);
    $visitados = Agendamentos::visitados($_SESSION['nome']);

    $anmTextBanner = 'anm-text-banner';
    $anmBtnListLeft = 'anm-btn-list-left';
    $anmBtnListRight = 'anm-btn-list-right';
    if(isset($_POST['visita_concluida']) || isset($_GET['sucesso'])){
        $anmTextBanner = '';
        $anmBtnListLeft = '';
        $anmBtnListRight = '';
    }

?>
<div class="section-fixed">
    <div class="alert-home">
        <?php
            $usuario = new EnvioDeFormulario();

            if(isset($_POST['visita_concluida'])){
        
                $id = $_POST['id'];
                $nome = $_POST['nome'];

                if($_POST['resp_visita'] == 2){
                    $resp_visita = strtoupper('s');
                    if($usuario->visitaForm($resp_visita, $id)){
                        Painel::alert('sucesso', 'Processo de visita de "'.$nome.'" foi concluída com SUCESSO!!!', '');
                        $visitas_pendentes = Agendamentos::totalAgendamentos($_SESSION['nome']);
                        $visitados = Agendamentos::visitados($_SESSION['nome']);
                    }else{
                        Painel::alert('error', 'Erro ao concluir visita de "'.$nome.'" Por favor tente Novamente', '');
                    }
                }else{
                    $resp_visita = strtoupper('n');
                    if($usuario->visitaForm($resp_visita, $id)){
                        Painel::alert('sucesso', '"'.$nome.'" não obteve visita!!!', '');
                        $visitas_pendentes = Agendamentos::totalAgendamentos($_SESSION['nome']);
                        $visitados = Agendamentos::visitados($_SESSION['nome']);
                    }
                }
        
            }
        ?>
    </div><!-- Alert-home -->
    <section class="banner">
        <div class="center">
            <div class="text-banner <?php echo $anmTextBanner; ?>">
                <h3>
                    Essa é uma área para fazer o agendamento das pessoas que se cadastraram no Projeto de Acolhimento IBN Nova Canaã, Por favor preste atenção nos campos de cadastro...
                </h3>
                <h3>Dúvidas clique <a href="">Aqui!</a></h3>
            </div><!-- Text-Banner -->
        </div><!-- Center -->
    </section><!-- Section - Banner -->
    <section class="button-list">
        <div class="center">
            <div class="btn-list <?php echo $anmBtnListLeft; ?>">
                <div class="btn-wraper-center por_agendar">
                    <div class="cont">
                        <p><?php echo count($visitas_pendentes); ?></p>
                    </div>
                    <div class="btn1 btn-wraper border-radius1">
                        <h4>Visitas Pendentes</h4>
                        <div class="seta-para-baixo seta1 seta"></div>
                    </div><!-- BTN - Wraper -->
                </div><!-- Btn-Wraper-Center -->

                <div class="list-nomes anm1">
                    <?php
                        if(count($visitas_pendentes) > 0){
                            foreach($visitas_pendentes as $key => $value){ ?>
                            <div class="name-date btn-por-agendar<?php echo $key+1;?>" realtime="<?php echo $key+1; ?>">
                                <h4><?php echo $value['nome']; ?></h4>
                                <p><?php echo date('d/m/Y H:i:s', strtotime($value['momento_agendamento'])); ?></p>
                            </div><!-- Nome-data Por visitados -->
                    <?php
                            }
                        }else{
                    ?>
                            <div class="name-date null">
                                <p>Não há visitas pendentes</p>
                            </div><!-- Nome-data Null -->
                    <?php
                        }
                    ?>
                </div><!-- list-nomes -->
            </div><!-- Btn-List -->

            <div class="btn-list <?php echo $anmBtnListRight; ?>">
                <div class="btn-wraper-center agendado">
                    <div class="cont">
                        <p><?php echo count($visitados); ?></p>
                    </div>
                    <div class="btn2 btn-wraper border-radius1">
                        <h4>Visitas Confirmadas</h4>
                        <div class="seta-para-baixo seta2 seta"></div>
                    </div><!-- BTN - Wraper -->
                </div><!-- Btn-Wraper-Center -->

                <div class="list-nomes anm2">
                    <?php
                        if(count($visitados) > 0){
                            foreach($visitados as $key => $value){?>
                                <div class="name-date btn-agendados<?php echo $key+1;?>" realtime="<?php echo $key+1; ?>">
                                    <h4><?php echo $value['nome']; ?></h4>
                                    <p><?php echo date('d/m/Y H:i:s', strtotime($value['data_agendamento'])); ?></p>
                                </div><!-- Nome-data visitados -->
                    <?php
                            }
                        }else{
                    ?>
                            <div class="name-date null">
                                <p>Você não Fez nenhuma visita</p>
                            </div><!-- Nome-data Null -->
                    <?php
                        }
                    ?>
                </div><!-- list-nomes -->
            </div><!-- Btn-List -->
        </div><!-- Center -->
    </section><!-- Section - Button-List -->
</div><!-- Home -->

<div class="popup">
    <?php foreach($visitas_pendentes as $key => $value){ ?>
        <div class="ocultar form-agend por-agendar<?php echo $key+1; ?>">
            <a href="" class="sairModal">x</a><!-- Fechar Popup -->
            <h2>Agendamento de <?php echo $value['nome'];?></h2>
            <form method="POST">
                <div class="center-form">
                    <div class="form-50">
                        <div class="form-group-agend disabled">
                            <label for="nome<?php echo $key+1; ?>">Nome:</label>
                            <h4><?php echo $value['nome'];?></h4>
                            <input type="hidden" id="nome<?php echo $key+1; ?>" name="nome" required value="<?php echo $value['nome'];?>">
                        </div><!-- Form-Group-agend-Nome -->
        
                        <div class="form-group-agend disabled">
                            <label for="email<?php echo $key+1; ?>">E-mail:</label>
                            <h4><?php echo $value['email'];?></h4>
                        </div><!-- Form-Group-agend-Email -->
        
                        <div class="form-group-agend disabled">
                            <label for="telefone<?php echo $key+1; ?>">Celular:</label>
                            <h4><?php echo $value['telefone'];?></h4>
                        </div><!-- Form-Group-agend-Telefone -->
        
                        <div class="form-group-agend disabled">
                            <label for="endereco<?php echo $key+1; ?>">Endereço:</label>
                            <h4><?php echo $value['endereco'];?></h4>
                        </div><!-- Form-Group-agend-Telefone -->
                        
                        <div class="form-group-agend ged disabled">
                            <?php if($value['resp_ged'] == 'Sim'){?>
                                <label for="">Ged:</label>
                                <input type="text" name="" disabled value="<?php echo $value['nome_ged']; ?>">
            
                                <label for="endereco<?php echo $key+1; ?>">Supervisor:</label>
                                <input type="text" name="" disabled value="<?php echo $value['nome_supervisor']; ?>">
                            <?php }else{?>
                                <div class="null-ged">
                                    <p>Não Possue Ged</p>
                                </div>
                            <?php } ?>
                        </div><!-- Form-Group-agend-Ged -->
                    </div><!-- Form-50 -->

                    <div class="form-50">
                        <div class="form-group-agend disabled">
                            <label for="">Tipos de Ajuda</label>
                            <?php 
                                for($i = 1; $i <= 6; $i++){
                                    if($value["tipo_ajuda_opcao{$i}"] == ''){ 
                            ?>
                                        <div class="tipo-ajuda"></div><!-- Tipo Ajuda -->
                            <?php }else{ ?>
                                        <div class="tipo-ajuda">
                                            <div class="tipo-ajuda-wrapper">
                                                <div class="checkbox">
                                                    <i><?php echo Icon::$vistos2; ?></i>
                                                </div>
                                                <label for=""><?php echo $value["tipo_ajuda_opcao{$i}"] ?></label>
                                            </div><!-- Tipo Ajuda Wrapper -->
                                        </div><!-- Tipo Ajuda -->
                            <?php
                                    }
                                } 
                            ?>
                        </div><!-- Form-Group-agend-Tipo-Ajuda -->

                        <div class="form-group-agend necessidade disabled">
                            <?php if($value['necessidade'] == ''){?>
                                <div class="null-necessidade">
                                    <p>Não Possue necessidade</p>
                                </div>
                            <?php }else{?>
                                <label for="">Necessidade:</label>
                                <h4><?php echo $value['necessidade']; ?></h4>
                            <?php } ?>
                        </div><!-- Form-Group-agend-Ged -->
                        
                        <div class="form-group-agend disabled">
                            <label for="data-agend<?php echo $key+1; ?>">Data de Consulta:</label>
                            <input type="datetime-local" disabled name="data-agend" required id="data-agend<?php echo $key+1; ?>">
                        </div><!-- Form-Group-data-agend -->

                        <div class="form-group-agend disabled">
                            <label for="nome-profissional<?php echo $key+1; ?>">Profissional Qualificado:</label>
                            <input type="search" value="<?php echo $value['nome_profissional']; ?>" disabled  name="nome-profissional" id="nome-profissional<?php echo $key+1; ?>">
                        </div><!-- Form-Group-data-agend -->

                        <div class="form-group-agend">
                            <label for="Visitado<?php echo $key+1; ?>">Visitou?</label>
                            <div class="box-form-resp">
                                <input id="n<?php echo $key+1; ?>" type="radio" name="resp_visita" value="1" checked>
                                <label for="n<?php echo $key+1; ?>">Não</label>
                                <input id="s<?php echo $key+1; ?>" type="radio" name="resp_visita" value="2">
                                <label for="s<?php echo $key+1; ?>">Sim</label>
                            </div>
                        </div><!-- Form-Group-data-agend -->
                    </div><!-- Form-50 -->
                </div><!-- center-form -->
                <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                <input type="submit" class="reload" value="Visita concluida" name="visita_concluida">
            </form><!-- Form -->
        </div><!-- Form Agend -->
    <?php } foreach($visitados as $key => $value){ ?>
        <div class="ocultar form-agend agendados<?php echo $key+1; ?>">
            <a href="" class="sairModal">x</a><!-- Fechar Popup -->
            <h2>Agendamento de <?php echo $value['nome'];?></h2>
            <form method="POST">
                <div class="center-form">
                    <div class="form-50">
                        <div class="form-group-agend disabled">
                            <label for="nome<?php echo $key+1; ?>">Nome:</label>
                            <h4><?php echo $value['nome'];?></h4>
                            <input type="hidden" id="nome<?php echo $key+1; ?>" name="nome" required value="<?php echo $value['nome'];?>">
                        </div><!-- Form-Group-agend-Nome -->
        
                        <div class="form-group-agend disabled">
                            <label for="email<?php echo $key+1; ?>">E-mail:</label>
                            <h4><?php echo $value['email'];?></h4>
                        </div><!-- Form-Group-agend-Email -->
        
                        <div class="form-group-agend disabled">
                            <label for="telefone<?php echo $key+1; ?>">Celular:</label>
                            <h4><?php echo $value['telefone'];?></h4>
                        </div><!-- Form-Group-agend-Telefone -->
        
                        <div class="form-group-agend disabled">
                            <label for="endereco<?php echo $key+1; ?>">Endereço:</label>
                            <h4><?php echo $value['endereco'];?></h4>
                        </div><!-- Form-Group-agend-Telefone -->
                        
                        <div class="form-group-agend ged disabled">
                            <?php if($value['resp_ged'] == 'Sim'){?>
                                <label for="">Ged:</label>
                                <input type="text" name="" disabled value="<?php echo $value['nome_ged']; ?>">
            
                                <label for="endereco<?php echo $key+1; ?>">Supervisor:</label>
                                <input type="text" name="" disabled value="<?php echo $value['nome_supervisor']; ?>">
                            <?php }else{?>
                                <div class="null-ged">
                                    <p>Não Possue Ged</p>
                                </div>
                            <?php } ?>
                        </div><!-- Form-Group-agend-Ged -->
                    </div><!-- Form-50 -->

                    <div class="form-50">
                        <div class="form-group-agend disabled">
                            <label for="">Tipos de Ajuda</label>
                            <?php 
                                for($i = 1; $i <= 6; $i++){
                                    if($value["tipo_ajuda_opcao{$i}"] == ''){ 
                            ?>
                                        <div class="tipo-ajuda"></div><!-- Tipo Ajuda -->
                            <?php }else{ ?>
                                        <div class="tipo-ajuda">
                                            <div class="tipo-ajuda-wrapper">
                                                <div class="checkbox">
                                                    <i><?php echo Icon::$vistos2; ?></i>
                                                </div>
                                                <label for=""><?php echo $value["tipo_ajuda_opcao{$i}"] ?></label>
                                            </div><!-- Tipo Ajuda Wrapper -->
                                        </div><!-- Tipo Ajuda -->
                            <?php
                                    }
                                } 
                            ?>
                        </div><!-- Form-Group-agend-Tipo-Ajuda -->

                        <div class="form-group-agend necessidade disabled">
                            <?php if($value['necessidade'] == ''){?>
                                <div class="null-necessidade">
                                    <p>Não Possue necessidade</p>
                                </div>
                            <?php }else{?>
                                <label for="">Necessidade:</label>
                                <h4><?php echo $value['necessidade']; ?></h4>
                            <?php } ?>
                        </div><!-- Form-Group-agend-Ged -->
                        
                        <div class="form-group-agend disabled">
                            <label for="data-agend<?php echo $key+1; ?>">Data de Consulta:</label>
                            <?php
                                $datetimeLocal = explode(' ', date('Y-m-d H:i:s', strtotime($value['data_agendamento'])));
                                $datetimeLocalAgendado = $datetimeLocal[0].'T'.$datetimeLocal[1];
                            ?>
                            <input type="datetime-local" disabled value="<?php echo $datetimeLocalAgendado; ?>" name="data-agend" required id="data-agend<?php echo $key+1; ?>">
                        </div><!-- Form-Group-data-agend -->

                        <div class="form-group-agend disabled">
                            <label for="nome-profissional<?php echo $key+1; ?>">Profissional Qualificado:</label>
                            <input type="search" value="<?php echo $value['nome_profissional']; ?>" disabled  name="nome-profissional" id="nome-profissional<?php echo $key+1; ?>">
                        </div><!-- Form-Group-data-agend -->

                        <div class="form-group-agend">
                            <label for="Visitado<?php echo $key+1; ?>">Visitou?</label>
                            <div class="box-form-resp">
                                <input id="s<?php echo $key+1; ?>" type="radio" name="resp_visita" value="2" checked>
                                <label for="s<?php echo $key+1; ?>">Sim</label> 
                                <input id="n<?php echo $key+1; ?>" type="radio" name="resp_visita" value="1">
                                <label for="n<?php echo $key+1; ?>">Não</label>
                            </div>
                        </div><!-- Form-Group-data-agend -->
                    </div><!-- Form-50 -->
                </div><!-- center-form -->
                <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                <input type="submit" class="reload" value="Visita concluida" name="visita_concluida">
            </form><!-- Form -->
        </div><!-- Form Agend -->
    <?php } ?>
    <div class="contador" realtime="<?php echo count($visitas_pendentes)+count($visitados);?>"></div>
</div><!-- Popup -->

<script>
    document.querySelector('.reload')
</script>
