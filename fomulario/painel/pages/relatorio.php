<?php
    $classAnimate = 'animate-form';
    if(isset($_POST['acao'])){
        $classAnimate = '';
    }
    verificaPermicaoPagina(2);
?>

<section class="relatorio section-fixed">
    <div class="center">
        <div class="container-central <?php echo $classAnimate; ?>">
            <div class="title">
                <h2><i><?php echo Icon::$relatorio; ?></i> Relatório</h2>
            </div><!-- Title -->
            <div class="div-wrapper">
                
            </div><!-- Div Wraper -->
        </div><!-- Conteiner Central -->
    </div><!-- Center -->

    <div class="center">
        <div class="container-central <?php echo $classAnimate; ?>">
            <div class="title">
                <h2><i><?php echo Icon::$relatorio; ?></i> Relatório</h2>
            </div><!-- Title -->
            <div class="div-wrapper">
                
            </div><!-- Div Wrapper -->
        </div><!-- Conteiner Central -->
    </div><!-- Center -->
</section><!-- Editar Perfil -->