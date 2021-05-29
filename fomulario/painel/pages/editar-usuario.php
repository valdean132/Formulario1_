<?php
    $classAnimate = 'animate-form';
    if(isset($_POST['acao'])){
        $classAnimate = '';
    }
    verificaPermicaoPagina(0);
?>

<section class="editar-Perfil section-fixed">
    <div class="center">
        <div class="container-central <?php echo $classAnimate; ?>">
            <div class="title">
                <h2><i><?php echo Icon::$editarPerfil; ?></i> Editar Usuário</h2>
            </div><!-- Title -->
            <div class="form-center">
                <form method="POST" enctype="multipart/form-data">
                    <?php
                        if(isset($_POST['acao'])){
                            // Pegando Dados dos Inputs
                            $usuario = new EnvioDeFormulario();
                            $nome = $_POST['nome'];
                            $user = strtolower($_POST['user']);
                            $password = $_POST['password'];
                            $imagem = $_FILES['imagem'];
                            $imagem_atual = $_POST['imagem_atual'];

                            if($imagem['name'] != ''){
                                // Imagem Existe e é válida
                                if(Painel::imgValid($imagem)){
                                    if($usuario->userExists($user) == $_SESSION['user'] || !$usuario->userExists($user)){
                                        $imagem = Painel::uploadFile($imagem);
                                        if($usuario->updateUser($nome, $user, $password, $imagem)){
                                            Painel::deleteFile($imagem_atual);
                                            Painel::alert('sucesso', 'Atualização Realizada com Sucesso!', 'Atualize a Página');
        
                                            $_SESSION['nome'] = $nome;
                                            $_SESSION['img'] = $imagem;
                                            $_SESSION['user'] = $user;
                                            $_SESSION['password'] = $password;
                                        }else{
                                            Painel::alert('error', 'Ocorreu um erro ao Atualizar...', '');
                                        }
                                    }else{
                                        Painel::alert('error', 'Login "'.$user.'" já existe no Banco de Dados!','Escolha Outro nome para Login ou mantenha o mesmo');
                                    }
                                }else{
                                    Painel::alert('error', 'Formato de Imagem Invalido...','Selecione uma imagem JPG, JPEG ou PNG');
                                }
                            }else{
                                if($usuario->userExists($user) == $_SESSION['user'] || !$usuario->userExists($user)){
                                    $imagem = $imagem_atual;
                                    if($usuario->updateUser($nome, $user, $password, $imagem)){
                                        Painel::alert('sucesso', 'Atualização Realizada com Sucesso!', 'Atualize a Página');
    
                                        $_SESSION['nome'] = $nome;
                                        $_SESSION['img'] = $imagem;
                                        $_SESSION['user'] = $user;
                                        $_SESSION['password'] = $password;
                                    }else{
                                        Painel::alert('error', 'Ocorreu um erro ao Atualizar...', '');
                                    }
                                }else{
                                    Painel::alert('error', 'Login "'.$user.'" já existe no Banco de Dados!','Escolha Outro nome para Login ou mantenha o mesmo');
                                }
                                
                            }
                        }
                    ?>
                    <div class="form-group-wrapper">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" required value="<?php echo $_SESSION['nome'];?>">
                        </div><!-- Form-Group-Nome -->

                        <div class="form-group">
                            <label for="login">Login:</label>
                            <input type="text" id="login" name="user" required value="<?php echo $_SESSION['user'];?>">
                        </div><!-- Form-Group-User -->

                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <div class="password">
                                <input type="password" class="passwordSenha" id="password" name="password" required value="<?php echo $_SESSION['password'];?>">
                                <div class="showPassword">
                                    <i class="mostrarPassword"><?php echo Icon::$mostrar; ?></i>
                                    <i class="ocultarPassword"><?php echo Icon::$ocultar; ?></i>
                                </div><!-- Show Password -->
                            </div><!-- Show Password -->
                        </div><!-- Form-Group-Senha -->

                        <div class="form-group">
                            <label for="imagem">Imagem:</label>
                            <input type="file" id="imagem" name="imagem">
                            <input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img'];?>">
                        </div><!-- Form-Group-Imagem -->

                        <div class="form-group">
                            <input type="submit" name="acao" value="Atualizar!">
                        </div><!-- Form-Group -->
                    </div><!-- form-group-wrapper -->
                </form><!-- Form -->
            </div><!-- Form Center -->
        </div><!-- Conteiner Central -->
    </div><!-- Center -->
</section><!-- Editar Perfil -->
