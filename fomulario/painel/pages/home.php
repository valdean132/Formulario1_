<?php
    $porAgendar = Agendamentos::porAgendar();
    $agendados = Agendamentos::agendados($_SESSION['nome']);

    $anmTextBanner = 'anm-text-banner';
    $anmBtnListLeft = 'anm-btn-list-left';
    $anmBtnListRight = 'anm-btn-list-right';
    if(isset($_POST['agendar']) || isset($_POST['reagendar'])){
        $anmTextBanner = '';
        $anmBtnListLeft = '';
        $anmBtnListRight = '';
    }

?>
<div class="section-fixed">
    <div class="alert-home">
        <?php
            $usuario = new EnvioDeFormulario();

            if(isset($_POST['agendar'])){
                $dataAgd = explode('T', $_POST['data-agend']);
        
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $dataAgendamento = $dataAgd[0].' '.$dataAgd[1].':00';
                $momentoAgendamento = date('Y-m-d H:i:s');
                $nomeProfissional = $_POST['nome-profissional'];
                $situacaoAgendamento = strtoupper('s');
                $responAgendamento = $_SESSION['nome'];
        
                if($usuario->agendForm($dataAgendamento, $momentoAgendamento, $nomeProfissional, $situacaoAgendamento, $responAgendamento, $id)){
                    Painel::alert('sucesso', '"'.$nome.'" foi Agendado SUCESSO!!!', 'Atualize a página!');
                }else{
                    Painel::alert('error', 'Não foi possivel Agendar "'.$nome.'" Por favor tente Novamente', '');
                }
            }
            if(isset($_POST['reagendar'])){
                $dataAgd = explode('T', $_POST['data-agend']);
        
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $dataAgendamento = $dataAgd[0].' '.$dataAgd[1].':00';
                $momentoAgendamento = date('Y-m-d H:i:s');
                $nomeProfissional = $_POST['nome-profissional'];
                $situacaoAgendamento = strtoupper('s');
                $responAgendamento = $_SESSION['nome'];
        
                if($usuario->agendForm($dataAgendamento, $momentoAgendamento, $nomeProfissional, $situacaoAgendamento, $responAgendamento, $id)){
                    Painel::alert('sucesso', '"'.$nome.'" foi reagendado SUCESSO!!!', 'Atualize a página!');
                }else{
                    Painel::alert('error', 'Não foi possivel reagendar "'.$nome.'" Por favor tente Novamente', '');
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
                        <p><?php echo count($porAgendar); ?></p>
                    </div>
                    <div class="btn1 btn-wraper border-radius1">
                        <h4>Por agendar</h4>
                        <div class="seta-para-baixo seta1 seta"></div>
                    </div><!-- BTN - Wraper -->
                </div><!-- Btn-Wraper-Center -->

                <div class="list-nomes anm1">
                    <?php
                        if(count($porAgendar) > 0){
                            foreach($porAgendar as $key => $value){ ?>
                            <div class="name-date btn-por-agendar<?php echo $key+1;?>" realtime="<?php echo $key+1; ?>">
                                <h4><?php echo $value['nome']; ?></h4>
                                <p><?php echo date('d/m/Y H:i:s', strtotime($value['momento_registro'])); ?></p>
                            </div><!-- Nome-data Por Agendados -->
                    <?php
                            }
                        }else{
                    ?>
                            <div class="name-date null">
                                <p>Não há agendamestos por marcar</p>
                            </div><!-- Nome-data Null -->
                    <?php
                        }
                    ?>
                </div><!-- list-nomes -->
            </div><!-- Btn-List -->

            <div class="btn-list <?php echo $anmBtnListRight; ?>">
                <div class="btn-wraper-center agendado">
                    <div class="cont">
                        <p><?php echo count($agendados); ?></p>
                    </div>
                    <div class="btn2 btn-wraper border-radius1">
                        <h4>Agendadas</h4>
                        <div class="seta-para-baixo seta2 seta"></div>
                    </div><!-- BTN - Wraper -->
                </div><!-- Btn-Wraper-Center -->

                <div class="list-nomes anm2">
                    <?php
                        if(count($agendados) > 0){
                            foreach($agendados as $key => $value){?>
                                <div class="name-date btn-agendados<?php echo $key+1;?>" realtime="<?php echo $key+1; ?>">
                                    <h4><?php echo $value['nome']; ?></h4>
                                    <p><?php echo date('d/m/Y H:i:s', strtotime($value['data_agendamento'])); ?></p>
                                </div><!-- Nome-data Agendados -->
                    <?php
                            }
                        }else{
                    ?>
                            <div class="name-date null">
                                <p>Você não marcou agendamentos</p>
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
    <?php foreach($porAgendar as $key => $value){ ?>
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
                        <?php if($_SESSION['cargo'] != 0){ ?>
                            <div class="form-group-agend">
                                <label for="data-agend<?php echo $key+1; ?>">Data de Consulta:</label>
                                <input type="datetime-local" name="data-agend" required id="data-agend<?php echo $key+1; ?>">
                            </div><!-- Form-Group-data-agend -->

                            <div class="form-group-agend">
                                <label for="nome-profissional<?php echo $key+1; ?>">Profissional Qualificado:</label>
                                <input type="text" name="nome-profissional" id="nome-profissional<?php echo $key+1; ?>">
                            </div><!-- Form-Group-data-agend -->
                        <?php }else{ ?>
                            <div class="form-group-agend disabled">
                                <label for="data-agend<?php echo $key+1; ?>">Data de Consulta:</label>
                                <input type="datetime-local" name="data-agend" required id="data-agend<?php echo $key+1; ?>">
                            </div><!-- Form-Group-data-agend -->

                            <div class="form-group-agend disabled">
                                <label for="nome-profissional<?php echo $key+1; ?>">Profissional Qualificado:</label>
                                <input type="text" name="nome-profissional" id="nome-profissional<?php echo $key+1; ?>">
                            </div><!-- Form-Group-data-agend -->
                        <?php } ?>
                    </div><!-- Form-50 -->
                </div><!-- center-form -->
                <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                <input type="submit" value="Agendar" name="agendar">
            </form><!-- Form -->
        </div><!-- Form Agend -->
    <?php } foreach($agendados as $key => $value){ ?>
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

                        <div class="form-group-agend necessidade">
                            <label for="data-agend<?php echo $key+1; ?>">Data de Consulta:</label>
                            <?php
                                $datetimeLocal = explode(' ', date('Y-m-d H:i:s', strtotime($value['data_agendamento'])));
                                $datetimeLocalAgendado = $datetimeLocal[0].'T'.$datetimeLocal[1];
                            ?>
                            <input type="datetime-local" value="<?php echo $datetimeLocalAgendado; ?>" name="data-agend" required id="data-agend<?php echo $key+1; ?>">
                        </div><!-- Form-Group-data-agend -->

                        <div class="form-group-agend necessidade">
                            <label for="nome-profissional<?php echo $key+1; ?>">Profissional Qualificado:</label>
                            <input type="text" name="nome-profissional" value="<?php echo $value['nome_profissional']; ?>" id="nome-profissional<?php echo $key+1; ?>">
                        </div><!-- Form-Group-data-agend -->
                    </div><!-- Form-50 -->
                </div><!-- center-form -->
                <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                <input type="submit" value="Reagendar" name="reagendar">
            </form><!-- Form -->
        </div><!-- Form Agend -->
    <?php } ?>
    <div class="contador" realtime="<?php echo count($porAgendar)+count($agendados);?>"></div>
</div><!-- Popup -->
