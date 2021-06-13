<?php
    $classAnimate = 'animate-form';
    $styleRotate = '';
    $borderTitle = '';
    $divWrapperActive = '';
    $activeButtonPaginacao = '';

    $styleRotateEditar = '';
    $borderTitleEditar = '';
    $divWrapperActiveEditar = '';
    $activeButtonPaginacao = '';
    
    if(isset($_POST['acao']) ||  
        isset($_GET['pagina']) ||
        isset($_GET['relatorio'])){
        $classAnimate = '';
        $styleRotate = 'style="transform: rotate(0deg)"';
        $borderTitle = 'border-title';
        $divWrapperActive = 'style="display: block;"';
        $activeButtonPaginacao = 'active-button-paginacao';
    }
    // if(isset($_POST['editar'])|| 
    //     isset($_POST['deletar'])){
    //     $classAnimate = '';
    //     $styleRotateEditar = 'style="transform: rotate(0deg)"';
    //     $borderTitleEditar = 'border-title';
    //     $divWrapperActiveEditar = 'style="display: block;"';
    //     $activeButtonPaginacao = 'active-button-paginacao';
    // }

    $registeredUsers = Painel::registeredUsers();
    $totalUser = count($registeredUsers);
    $totalAgendamentos = Agendamentos::totalAgendamentos();
    
    /* Paginação */
    
        // Receber o número da página
        $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
        
        // Setar a quantidade de itens por página
        $qnt_result_pg = 5;
        
        // Calcular o inicio da visualização
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
        
        // Buscando no banco de dados
        $paginacaoLimitAgendados = Agendamentos::paginacaoLimitAgendados($inicio, $qnt_result_pg);

        // Somando quantidade de cadastro
        $result_pg = count($totalAgendamentos);

        // Quantidadades de Páginas
        $quantidade_pg = ceil($result_pg / $qnt_result_pg);

        // Limitar A quantidade de Links
        $max_links = 1;


    /* ** */

    verificaPermicaoPagina(2);
?>
<section class="relatorio section-fixed">
    <div class="center">
        <div class="container-central <?php echo $classAnimate; ?>">
            <div class="title <?php echo $borderTitle; ?>">
                <h2><i><?php echo Icon::$relatorio; ?></i> Relatório</h2>
                <div class="seta-title" <?php echo $styleRotate ?>>
                    <i><?php echo Icon::$seta; ?></i>
                </div>
            </div><!-- Title -->
            <div class="div-wrapper" <?php echo $divWrapperActive; ?>>
                <div class="opcao-relatorio">
                    <div class="opcoes-relatorio-wrapper">
                        <i class="engrenagem"><?php echo Icon::$engrenagem; ?></i>
                        <i class="closeX"><?php echo Icon::$closeX; ?></i>
                        <div class="opcaoes-relatorio-single">
                            <a href="<?php echo INCLUDE_PATH_PANEL; ?>export/gerar-relatorio-excel">Gerar EXCEL</a>
                            <a href="">Gerar PDF</a>
                        </div><!-- opcaoes-relatorio-single -->
                    </div><!-- opcoes-relatorio-wrapper -->
                    <div class="opcoes-relatorio-filter">
                        <div class="btn-filter-tabela btn-filter1 select"><i><?php echo Icon::$seta ?></i>Todos</div>
                        <div class="btn-filter-tabela btn-filter2"><i><?php echo Icon::$seta ?></i>Por Agendar</div>
                        <div class="btn-filter-tabela btn-filter3"><i><?php echo Icon::$seta ?></i>Agendado</div>
                        <div class="btn-filter-tabela btn-filter4"><i><?php echo Icon::$seta ?></i>Visita Concluída</div>
                    </div><!-- opcoes-relatorio-filter -->
                    <a href="<?php echo INCLUDE_PATH_PANEL; ?>export/gerar-relatorio-excel" class="gerar">Gerar Relatório</a>
                </div><!-- opção Relatório -->
                <div class="form-table-center">
                    <table>
                        <thead>
                            <tr class="table100-head">
                                <th class="column1">ID</th>
                                <th class="column2">Nome</th>
                                <th class="column3">Telefone</th>
                                <th class="column4">Dia da Visita</th>
                                <th class="column5">Agendado Por</th>
                                <th class="column6">Mais Detalhes</th>
                            </tr>
                        </thead><!-- Cabeçalho da Tabela -->
                        <tbody class="tbody-agendados">
                            <?php foreach($paginacaoLimitAgendados as $key => $value){ 
                                // if($value['situacao_agendamento'] == strtoupper('s')){
                            ?>
                                    <tr>
                                        <td class="column1"><?php echo $value['id']; ?></td>
                                        <td class="column2"><?php echo $value['nome']; ?></td>
                                        <td class="column3"><?php echo $value['telefone']; ?></td>
                                        <?php if($value['situacao_agendamento'] == strtoupper('s')){?>
                                            <td class="column4"><?php echo date('d/m/Y H:i', strtotime($value['data_agendamento'])) ?></td>
                                            <td class="column5"><?php echo $value['respon_agendamento']; ?></td>
                                            <?php }else{?>
                                                <td class="column4">00/00/0000 00:00</td>
                                                <td class="column5">Não foi agendado</td>
                                        <?php }?>
                                        <td class="column6">
                                            <div class="opcoes-wrapper">
                                                <div class="mostrar-single btn-agendados<?php echo $key+1;?>" realtime="<?php echo $key+1; ?>" title="Editar">
                                                    <i><?php echo Icon::$mostrar; ?></i>
                                                </div><!-- Editar Single -->
                                            </div><!-- opcoes-wrapper -->
                                        </td>
                                    </tr>
                            <?php }
                                // }
                            ?>
                        </tbody><!-- Corpo da Tabela -->
                    </table><!-- Tabela -->
                    
                    <?php if(count($paginacaoLimitAgendados)  == $result_pg){
                        echo "<div style='display: none;'>/div>"; 
                    }else{?>
                        <div class="lista-paginacao">
                            <div class="lista-paginacao-wrapper">
                                <?php
                                    if($pagina == 1){
                                        echo "<a class='active-button-paginacao disabled'>Primeira</a>";
                                        echo "<a class='active-button-paginacao disabled'><i>".Icon::$arowSeta."</i> Prev</a>";
                                    }else{
                                        echo "<a realtime='?pagina=1' href='relatorio?pagina=1'>Primeira</a>";
                                        echo "<a realtime='?pagina=".($pagina - 1)."' href='relatorio?pagina=".($pagina - 1)."'><i>".Icon::$arowSeta."</i> Prev</a>";
                                    }
                                    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                        if($pag_ant >= 1){
                                            if($pag_ant == 1){
                                                echo "<a realtime='?pagina=1' href='relatorio?pagina=1'>$pag_ant</a>";
                                            }else{
                                                echo "<a realtime='?pagina=$pag_ant' href='relatorio?pagina=$pag_ant'>$pag_ant</a>";
                                            }
                                        }
                                        
                                    }
                                    echo "<a class='active-button-paginacao disabled'>$pagina</a>"; 
                                    for($pag_post = $pagina + 1; $pag_post <= $pagina + $max_links; $pag_post++){
                                        if($pag_post <= $quantidade_pg){
                                            echo "<a realtime='?pagina=$pag_post' href='relatorio?pagina=$pag_post'>$pag_post</a>";
                                        }
                                        
                                    }

                                    if($pagina == $quantidade_pg){
                                        echo "<a class='active-button-paginacao disabled'>Next <i>".Icon::$arowSeta."</i></a>";
                                        echo "<a class='active-button-paginacao disabled'>Ultima</a>";
                                    }else{
                                        echo "<a realtime='?pagina=".($pagina + 1)."' href='relatorio?pagina=".($pagina + 1)."'>Next <i>".Icon::$arowSeta."</i></a>";
                                        echo "<a realtime='?pagina=$quantidade_pg' href='relatorio?pagina=$quantidade_pg'>Ultima</a>";
                                    }
                                ?>
                            </div><!-- lista-paginacao-wrapper -->
                        </div><!-- lista-paginacao -->
                    <?php } ?>
                </div><!-- Form-table-Center -->
            </div><!-- Div Wraper -->
        </div><!-- Conteiner Central -->
    </div><!-- Center -->

    <div class="center">
        <div class="container-central <?php echo $classAnimate; ?>">
            <div class="title <?php echo $borderTitleEditar; ?>">
                <h2><i><?php echo Icon::$userGroup; ?></i> Usuários Cadastrados</h2>
                <div class="seta-title" <?php echo $styleRotateEditar ?>>
                    <i><?php echo Icon::$seta; ?></i>
                </div>
            </div><!-- Title -->
            <div class="div-wrapper" <?php echo $divWrapperActiveEditar; ?>>
                <?php 
                    $usuario = new EnvioDeFormulario();
                    if(isset($_POST['deletar'])){
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

                    if(isset($_POST['editar'])){
                        $nome = $_POST['nomeEditar'];
                        $userEditar = strtolower($_POST['userEditar']);
                        $userAtual = strtolower($_POST['userAtual']);
                        $passwordEditar = $_POST['passwordEditar'];
                        $cargoEditar = $_POST['cargoEditar'];

                        if($usuario->userExists($userEditar) == $userAtual || !$usuario->userExists($userEditar)){
                            if($usuario->updateUserAdmin($userEditar, $passwordEditar, $cargoEditar, $userAtual)){
                                Painel::alert('sucesso', '"'.$nome.'" foi atualizado com Sucesso!', 'Atualize a Página');
                            }else{
                                Painel::alert('error', 'Ocorreu um erro ao Atualizar "'.$nome.'"...', 'Por favor, tente novamente');
                            }
                        }else{
                            Painel::alert('error', 'Login "'.$userEditar.'" já existe no Banco de Dados!','Escolha Outro nome para Login ou mantenha o mesmo');
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
                                            <div class="editar-single btn-editar<?php echo $key+1;?>" realtime="<?php echo $key+1; ?>" title="Editar">
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

        <div class="ocultar editar-center editar-conf<?php echo $key+1; ?>" realtime="<?php echo $key+1; ?>">
            <a href="" class="sairModal">x</a>
            <h2>Editar Usuário <strong><?php echo $value['nome'] ?></strong>!</h2>
            <div class="buttom">
                <form method="POST">
                    <div class="form-group-wrapper">
                        <div class="form-group">
                            <label for="nome<?php echo $key+1; ?>">Nome:</label>
                            <input type="text" name="" disabled value="<?php echo $value['nome'];?>">
                            <input type="hidden" id="nome<?php echo $key+1; ?>" name="nomeEditar" required value="<?php echo $value['nome'];?>">
                        </div><!-- Form-Group-Nome -->
    
                        <div class="form-group">
                            <label for="login<?php echo $key+1; ?>">Login:</label>
                            <input type="text" id="login<?php echo $key+1; ?>" name="userEditar" required value="<?php echo $value['user'];?>">
                            <input type="hidden" id="login<?php echo $key+1; ?>" name="userAtual" required value="<?php echo $value['user'];?>">
                        </div><!-- Form-Group-User -->
    
                        <div class="form-group">
                            <label for="password<?php echo $key+1; ?>">Senha:</label>
                            <div class="password">
                                <input type="password" class="passwordSenha" id="password<?php echo $key+1; ?>" name="passwordEditar" required value="<?php echo $value['password'];?>">
                                <div class="showPassword">
                                    <i class="mostrarPassword"><?php echo Icon::$mostrar; ?></i>
                                    <i class="ocultarPassword"><?php echo Icon::$ocultar; ?></i>
                                </div><!-- Show Password -->
                            </div><!-- Show Password -->
                        </div><!-- Form-Group-Senha -->
    
                        <?php if($_SESSION['cargo'] == 3){ ?>
                            <div class="form-group">
                                <label for="cargo<?php echo $key+1; ?>">Cargo:</label>
                                <select type="hidden" name="cargoEditar" id="cargo<?php echo $key+1; ?>">
                                    <?php
                                        foreach(Painel::$cargos as $key => $values){
                                            if($key < 3){
                                                if($key == $value['cargo']){
                                                    echo '<option selected value="'.$key.'">'.$values.'</option>';
                                                }else{
                                                    echo '<option value="'.$key.'">'.$values.'</option>';
                                                }
                                            } 
                                        }
                                    ?>
                                </select>
                            </div><!-- Form-Group-Cargo -->
                        <?php }else{ ?>
                            <input type="hidden" name="cargoEditar" value="<?php echo $value['cargo']; ?>">
                        <?php } ?>
    
                        <div class="form-group">
                            <input type="submit" name="editar" value="Atualizar!">
                        </div><!-- Form-Group -->
                    </div><!-- form-group-wrapper -->
                </form>
            </div><!-- Button -->
        </div><!-- Editar -->
    <?php } foreach($paginacaoLimitAgendados as $key => $value){ ?>
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
                        <?php if($value['situacao_agendamento'] == strtoupper('s')){ ?>
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
                                <input type="text" name="nome-profissional" disabled value="<?php echo $value['nome_profissional']; ?>" id="nome-profissional<?php echo $key+1; ?>">
                            </div><!-- Form-Group-data-agend -->
                        <?php if($value['visita_concluida'] == strtoupper('s')){ ?>
                            <div class="form-group-agend disabled">
                                <label for="Visitado<?php echo $key+1; ?>">Visitou?</label>
                                <div class="box-form-resp">
                                    <input id="s<?php echo $key+1; ?>" type="radio" name="resp_visita" value="2" checked>
                                    <label for="s<?php echo $key+1; ?>">Sim</label>
                                </div>
                            </div><!-- Form-Group-data-agend -->
                        <?php }else{ ?>
                            <div class="form-group-agend disabled">
                                <label for="Visitado<?php echo $key+1; ?>">Visitou?</label>
                                <div class="box-form-resp">
                                    <input id="s<?php echo $key+1; ?>" type="radio" name="resp_visita" value="2" checked>
                                    <label for="s<?php echo $key+1; ?>">Não</label>
                                </div>
                            </div><!-- Form-Group-data-agend -->
                        <?php }
                            }
                        ?>
                    </div><!-- Form-50 -->
                </div><!-- center-form -->
                <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                <!-- <input type="submit" value="Reagendar" name="reagendar"> -->
            </form><!-- Form -->
        </div><!-- Form Agend -->
    <?php } ?>
    <div class="contador" realtime="<?php echo $totalUser + count($paginacaoLimitAgendados); ?>"></div>
</div><!-- popup -->