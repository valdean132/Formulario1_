<?php
    $classAnimate = 'animate-form';
    if(isset($_POST['acao']) || isset($_POST['deletar']) || isset($_POST['editar'])){
        $classAnimate = '';
    }

    $registeredUsers = Painel::registeredUsers();
    $totalUser = Painel::totalUsers();
    $totalAgendamentos = Agendamentos::totalAgendamentos();

    verificaPermicaoPagina(2);
?>
<section class="relatorio section-fixed">
    <div class="center">
        <div class="container-central <?php echo $classAnimate; ?>">
            <div class="title">
                <h2><i><?php echo Icon::$relatorio; ?></i> Relatório</h2>
            </div><!-- Title -->
            <div class="div-wrapper">
                <div class="opcao-relatorio">
                    <div class="opcoes-relatorio-wrapper">
                        <i class="engrenagem"><?php echo Icon::$engrenagem; ?></i>
                        <i class="closeX"><?php echo Icon::$closeX; ?></i>
                        <div class="opcaoes-relatorio-single">
                            <a href="">Gerar EXCEL</a>
                            <a href="">Gerar PDF</a>
                        </div><!-- opcaoes-relatorio-single -->
                    </div><!-- opcoes-relatorio-wrapper -->
                    <a href="" class="gerar">Gerar Relatório</a>
                </div><!-- opção Relatório -->
                <div class="form-table-center">
                    <table>
                        <thead>
                            <tr class="table100-head">
                                <th class="column1">ID</th>
                                <th class="column2">Nome</th>
                                <th class="column3">Telefone</th>
                                <th class="column4">Dia da Visita</th>
                                <th class="column5">Responsável por Agend.</th>
                                <th class="column6">Ver Mais detalhes</th>
                            </tr>
                        </thead><!-- Cabeçalho da Tabela -->
                        <tbody>
                            <?php foreach($totalAgendamentos as $key => $value){ ?>
                                <tr>
                                    <td class="column1"><?php echo $key+1; ?></td>
                                    <td class="column2"><?php echo $value['nome']; ?></td>
                                    <td class="column3"><?php echo $value['telefone']; ?></td>
                                    <td class="column4"><?php echo date('d/m/Y H:i', strtotime($value['data_agendamento'])) ?></td>
                                    <td class="column5"><?php echo $value['respon_agendamento']; ?></td>
                                    <td class="column6">
                                        <div class="opcoes-wrapper">
                                            <div class="mostrar-single btn-agendados<?php echo $key+1;?>" realtime="<?php echo $key+1; ?>" title="Editar">
                                                <i><?php echo Icon::$mostrar; ?></i>
                                            </div><!-- Editar Single -->
                                        </div><!-- opcoes-wrapper -->
                                    </td>
                                </tr>
                            <?php }?>
                        </tbody><!-- Corpo da Tabela -->
                    </table><!-- Tabela -->
                </div><!-- Form-table-Center -->
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
    <?php } foreach($totalAgendamentos as $key => $value){ ?>
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
                            <input type="text" name="nome-profissional" disabled value="<?php echo $value['nome_profissional']; ?>" id="nome-profissional<?php echo $key+1; ?>">
                        </div><!-- Form-Group-data-agend -->
                    </div><!-- Form-50 -->
                </div><!-- center-form -->
                <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                <!-- <input type="submit" value="Reagendar" name="reagendar"> -->
            </form><!-- Form -->
        </div><!-- Form Agend -->
    <?php } ?>
    <div class="contador" realtime="<?php echo $totalUser + count($totalAgendamentos); ?>"></div>
</div><!-- popup -->