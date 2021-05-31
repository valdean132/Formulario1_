<?php


    $porAgendar = Agendamentos::porAgendar();

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
                    <?php foreach($porAgendar as $key => $value){ 
                            if($value['situacao_agendamento'] === strtoupper('n')){

                        ?>
                            <div class="name-date">
                                <h4><?php echo $value['nome']; ?></h4>
                                <p><?php echo date('d/m/Y H:i:s', strtotime($value['momento_registro'])); ?></p>
                            </div><!-- Nom-data -->
                    <?php }
                        }
                    ?>
                </div><!-- list-nomes -->
            </div><!-- Btn-List -->

            <div class="btn-list">
                <div class="btn-wraper-center agendado">
                    <div class="cont">
                        <p>5</p>
                    </div>
                    <div class="btn2 btn-wraper border-radius1">
                        <h4>Agendadas</h4>
                        <div class="seta-para-baixo seta2 seta"></div>
                    </div><!-- BTN - Wraper -->
                </div><!-- Btn-Wraper-Center -->

                <div class="list-nomes anm2">
                    <div class="name-date">
                        <h4>Valdean Palmeira de Souza</h4>
                        <p>07/02/2020 4:53:52</p>
                    </div>
                </div><!-- list-nomes -->
            </div><!-- Btn-List -->
        </div><!-- Center -->
    </section><!-- Section - Button-List -->
</div>