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
            </div><!-- Totle -->
            <div class="form-center">
                <form method="POST" enctype="multipart/form-data">
                    <?php
                        if(isset($_POST['acao'])){
                            // Pegando Dados dos Inputs
                            $usuario = new EnvioDeFormulario();
                            $nome = $_POST['nome'];
                            $user = $_POST['user'];
                            $password = $_POST['password'];
                            $imagem = $_FILES['imagem'];
                            $imagem_atual = $_POST['imagem_atual'];

                            if($imagem['name'] != ''){
                                // Imagem Existe e é válida
                                if(Painel::imgValid($imagem)){
                                    $imagem = Painel::uploadFile($imagem);
                                    if($usuario->updateUser($nome, $user, $password, $imagem)){
                                        Painel::deleteFile($imagem_atual);
                                        Painel::alert('sucesso', 'Atualização Realizada com Sucesso!', 'Atualize a Página');
    
                                        $_SESSION['nome'] = $nome;
                                        $_SESSION['user'] = $user;
                                        $_SESSION['img'] = $imagem;
                                        $_SESSION['password'] = $password;
                                    }else{
                                        Painel::alert('error', 'Ocorreu um erro ao Atualizar...', '');
                                    }
                                }else{
                                    Painel::alert('error', 'Formato de Imagem Invalido...','Selecione uma imagem JPG, JPEG ou PNG');
                                }
                            }else{
                                $imagem = $imagem_atual;
                                if($usuario->updateUser($nome, $user, $password, $imagem)){
                                    Painel::alert('sucesso', 'Atualização Realizada com Sucesso!', 'Atualize a Página');

                                    $_SESSION['nome'] = $nome;
                                    $_SESSION['user'] = $user;
                                    $_SESSION['img'] = $imagem;
                                    $_SESSION['password'] = $password;
                                }else{
                                    Painel::alert('error', 'Ocorreu um erro ao Atualizar...', '');
                                }
                            }
                        }
                    ?>
                    <div class="form-group-wrapper">
                        <div class="form-group">
                            <label for="">Nome:</label>
                            <input type="text" name="nome" required value="<?php echo $_SESSION['nome'];?>">
                        </div><!-- Form-Group-Nome -->

                        <div class="form-group">
                            <label for="">Login:</label>
                            <input type="text" name="user" required value="<?php echo $_SESSION['user'];?>">
                        </div><!-- Form-Group-User -->

                        <div class="form-group">
                            <label for="">Senha:</label>
                            <input type="text" name="password" required value="<?php echo $_SESSION['password'];?>">
                        </div><!-- Form-Group-Senha -->

                        <div class="form-group">
                            <label for="">Imagem:</label>
                            <input type="file" name="imagem">
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
