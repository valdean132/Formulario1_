<?php

    $porAgendar = Agendamentos::porAgendar();
    $agendados = Agendamentos::agendados();

?>
<div class="section-fixed">
    <section class="banner">
        <div class="center">
            <div class="text-banner">
                <h3>
                    Essa é uma área para fazer o agendamento das pessoas que se cadastraram no Projeto de Acolhimento IBN Nova Canaã, Por favor preste atenção nos campos de cadastro...
                </h3>
                <h3>Dúvidas clique <a href="">Aqui!</a></h3>
            </div><!-- Text-Banner -->
        </div><!-- Center -->
    </section><!-- Section - Banner -->
    <section class="button-list">
        <div class="center">
            <div class="btn-list">
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
                            <div class="name-date">
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

            <div class="btn-list">
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
                            foreach($agendados as $key => $value){ ?>
                            <div class="name-date">
                                <h4><?php echo $value['nome']; ?></h4>
                                <p><?php echo date('d/m/Y H:i:s', strtotime($value['momento_agendamento'])); ?></p>
                            </div><!-- Nome-data Agendados -->
                    <?php
                            }
                        }else{
                    ?>
                        <div class="name-date null">
                            <p>Não há agendamentos marcados</p>
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
    <div class="form-agend">
        <a href="" class="sairModal">x</a><!-- Fechar Popup -->
        <h2>Agendamento de Valdean Souza</h2>
        <form method="POST">
            <div class="center-form">
                <div class="form-50">
                    <div class="form-group-agend disabled">
                        <label for="nome<?php echo $key+1; ?>">Nome:</label>
                        <input type="text" name="" disabled value="Valdean Souza">
                        <input type="hidden" id="nome<?php echo $key+1; ?>" name="nome" required value="<?php echo $value['nome'];?>">
                    </div><!-- Form-Group-agend-Nome -->

                    <div class="form-group-agend disabled">
                        <label for="email<?php echo $key+1; ?>">E-mail:</label>
                        <input type="email" name="" disabled value="valdeanpds@gmail.com">
                        <input type="hidden" id="email<?php echo $key+1; ?>" name="email" required value="<?php echo $value['nome'];?>">
                    </div><!-- Form-Group-agend-Email -->

                    <div class="form-group-agend disabled">
                        <label for="telefone<?php echo $key+1; ?>">Celular:</label>
                        <input type="text" name="" disabled value="(92) 9 99296-1661">
                        <input type="hidden" id="telefone<?php echo $key+1; ?>" name="telefone" required value="<?php echo $value['nome'];?>">
                    </div><!-- Form-Group-agend-Email -->

                </div><!-- Form-50 -->
                <div class="form-50">
                    <div class="form-group-agend">
                        <label for="nome<?php echo $key+1; ?>">Nome:</label>
                        <input type="text" name="" value="Valdean Souza">
                        <input type="hidden" id="nome<?php echo $key+1; ?>" name="nome" required value="<?php echo $value['nome'];?>">
                    </div><!-- Form-Group-agend-Nome -->
                </div><!-- Form-50 -->
            </div>
            <input type="submit" value="Agendar" name="acao">
        </form><!-- Form -->
    </div><!-- Form Agend -->
</div><!-- Popup -->