<?php
    $classAnimate = 'animate-form';
    if(isset($_POST['acao']) || isset($_POST['deletar'])){
        $classAnimate = '';
    }

    $registeredUsers = Painel::registeredUsers();
    $totalUser = Painel::totalUsers();

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
                <?php 
                    if(isset($_POST['deletar'])){
                        $usuario = new EnvioDeFormulario();
                        $user = $_POST['userDelete'];
                        $nome = $_POST['nomeDelete'];
                        $img = $_POST['imgDelete'];
                        // echo $user;
                        // echo $nome;


                        if($usuario->deleteUser($user)){
                            Painel::deleteFile($img);
                            Painel::alert('sucesso', 'Usuário "'.$nome.'" foi removido SUCESSO!!!', 'Atualize a página');
                        }else{
                            Painel::alert('error', 'Ocorreu um erro ou deletar o usuário "'.$nome.'"','Por favor, tente novamente');
                        }
                    }    
                    ?>
                <table>
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">ID</th>
                            <th class="column2">Nome</th>
                            <th class="column3">Login</th>
                            <th class="column4">Cargo</th>
                            <th class="column5">Opções</th>
                        </tr>
                    </thead><!-- Cabeçalho da Tabela -->
                    <tbody>
                        <?php foreach($registeredUsers as $key => $value){ ?>
                            <tr>
                                <td class="column1"><?php echo $key+1; ?></td>
                                <td class="column2"><?php echo $value['nome']; ?></td>
                                <td class="column3"><?php echo $value['user']; ?></td>
                                <td class="column4"><?php echo pegaCargo($value['cargo']); ?></td>
                                <td class="column5">
                                    <div class="opcoes-wrapper">
                                        <?php if($value['user'] == $_SESSION['user']){?>
                                            <a title="Editar" href="<?php echo INCLUDE_PATH_PANEL; ?>editar-usuario" class="editar-single">
                                                <i><?php echo Icon::$pencil; ?></i>
                                            </a><!-- Editar Single -->
                                        <?php } ?>

                                        <?php if($value['cargo'] < $_SESSION['cargo']){ ?>
                                            <div class="editar-single" title="Editar">
                                                <i><?php echo Icon::$pencil; ?></i>
                                            </div><!-- Editar Single -->
                                            <div class="remove-single btn-remove<?php echo $key+1;?>" realtime="<?php echo $key+1; ?>" title="Remover">
                                                <i><?php echo Icon::$remove; ?></i>
                                            </div><!-- Remover Single -->
                                        <?php } ?>
                                    </div><!-- Opção Wrapper -->
                                </td>
                            </tr>
                        <?php }?>
                    </tbody><!-- Corpo da Tabela -->
                </table><!-- Tabela -->
            </div><!-- Div Wrapper -->
        </div><!-- Conteiner Central -->
    </div><!-- Center -->
</section><!-- Editar Perfil -->


<div class="popup">
    <?php foreach($registeredUsers as $key => $value){ ?>
        <div class="ocultar deletar-center delete-conf<?php echo $key+1; ?>" realtime="<?php echo $key+1; ?>">
            <h2>Deseja realmente deletar <strong><?php echo $value['nome'] ?></strong>?</h2>
            <div class="buttom">
                <form method="POST">
                    
                    <input type="submit" value="Sim" name="deletar">
                    <input type="hidden" name="userDelete" value="<?php echo $value['user']; ?>">
                    <input type="hidden" name="nomeDelete" value="<?php echo $value['nome']; ?>">
                    <input type="hidden" name="imgDelete" value="<?php echo $value['img']; ?>">
                </form>
                <a href="" class="sairModal">não</a>
            </div><!-- Button -->
        </div><!-- Deletar -->
    <?php }?>
    <div class="contador" realtime="<?php echo $totalUser; ?>"></div>
</div><!-- popup -->