<?php
    $classAnimate = 'animate-form';
    if(isset($_POST['acao'])){
        $classAnimate = '';
    }

    $registeredUsers = Painel::registeredUsers();

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
                <h2><i><?php echo Icon::$userGroup; ?></i> Usuários Cadastrados</h2>
            </div><!-- Title -->
            <div class="div-wrapper">
                <table>
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">ID</th>
                            <th class="column2">Nome</th>
                            <th class="column3">Login</th>
                            <th class="column4">Cargo</th>
                            <th class="column5">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($registeredUsers as $key => $value){ ?>
                            <tr>
                                <td class="column1"><?php echo $key+1; ?></td>
                                <td class="column2"><?php echo $value['nome']; ?></td>
                                <td class="column3"><?php echo $value['user']; ?></td>
                                <td class="column4"><?php echo pegaCargo($value['cargo']); ?></td>
                                <td class="column5">Administrador</td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div><!-- Div Wrapper -->
        </div><!-- Conteiner Central -->
    </div><!-- Center -->
</section><!-- Editar Perfil -->