<?php
    $classAnimate = 'animate-form';
    if(isset($_POST['acao'])){
        $classAnimate = '';
    }
    verificaPermicaoPagina(2);
?>

<section class="usuario section-fixed">
    <div class="center">
        <div class="container-central <?php echo $classAnimate; ?>">
            <div class="title">
                <h2><i><?php echo Icon::$cadastrar; ?></i> Cadastrar Usuário</h2>
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
                            $cargoUser = $_POST['cargo'];
                            $imagem = $_FILES['imagem'];

                            if($user == '' && $nome == '' && $password == '' && $cargoUser == ''){
                                Painel::alert('error', 'Os campos NOME, LOGIN e SENHA precisam ser preenchidos e o campo CARGO precisa ser selecionado!', '');
                            }else if($user == '' && $nome == '' && $password == ''){
                                Painel::alert('error', 'Os campos NOME, LOGIN e SENHA precisam ser preenchidos!', '');
                            }else if($user == '' && $nome == '' && $cargoUser == ''){
                                Painel::alert('error', 'Os campos NOME e LOGIN precisam ser preenchidos e o campo CARGO precisa ser selecionado!', '');
                            }else if($user == '' && $password == '' && $cargoUser == ''){
                                Painel::alert('error', 'Os campos LOGIN e SENHA precisam ser preenchidos e o campo CARGO precisa ser selecionado!', '');
                            }else if($nome == '' && $password == '' && $cargoUser == ''){
                                Painel::alert('error', 'Os campos NOME e SENHA precisam ser preenchidos e o campo CARGO precisa ser selecionado!', '');
                            }else if($user == '' && $nome == ''){
                                Painel::alert('error', 'Os campos NOME e LOGIN precisam ser preenchidos!', '');
                            }else if($user == '' && $password == ''){
                                Painel::alert('error', 'Os campos LOGIN e SENHA precisam ser preenchidos!', '');
                            }else if($user == '' && $cargoUser == ''){
                                Painel::alert('error', 'O campo LOGIN precisa ser preenchido e o campo CARGO precisa ser selecionado!', '');
                            }else if($nome == '' && $cargoUser == ''){
                                Painel::alert('error', 'O campo NOME precisa ser preenchido e o campo CARGO precisa ser selecionado!', '');
                            }else if($nome == '' && $password == ''){
                                Painel::alert('error', 'Os campos NOME e SENHA precisam ser preenchidos!', '');
                            }else if($password == '' && $cargoUser == ''){
                                Painel::alert('error', 'O campo SENHA precisa ser preenchido e o campo CARGO precisa ser selecionado!', '');
                            }else if($nome == ''){
                                Painel::alert('error', 'O campo NOME precisa ser preenchido!', '');
                            }else if($user == ''){
                                Painel::alert('error', 'O campo LOGIN precisa ser preenchido!', '');
                            }else if($password == ''){
                                Painel::alert('error', 'O campo SENHA precisa ser preenchido!', '');
                            }else if($cargoUser == ''){
                                Painel::alert('error', 'O campo CARGO precisa ser selecionado!', '');
                            }else{
                                if($imagem['name'] != ''){
                                    // Imagem Existe e é válida
                                    if(Painel::imgValid($imagem) == false){
                                        Painel::alert('error', 'Formato de Imagem Invalido...','Selecione uma imagem JPG, JPEG ou PNG');
                                    }else if($usuario->userExists($user)){
                                        Painel::alert('error', 'Login "'.$user.'" já existe no Banco de Dados!','Escolha Outro nome para Login');
                                    }else{
                                        $imagem = Painel::uploadFile($imagem);
                                        if($usuario->registerUser($nome, $user, $password, $imagem, $cargoUser)){
                                            Painel::alert('sucesso', 'Usuário "'.$nome.'" foi cadastrado SUCESSO!!!', '');
                                        }else{
                                            Painel::alert('error', 'Ocorreu um erro ao Cadastrar o Usuario "'.$nome.'"...','Por favor tente novamente.');
                                        }
                                    }
                                }else{
                                    if($usuario->userExists($user)){
                                        Painel::alert('error', 'Login "'.$user.'" já existe no Banco de Dados!','Escolha Outro nome para Login');
                                    }else{
                                        $imagem = '';
                                        if($usuario->registerUser($nome, $user, $password, $imagem, $cargoUser)){
                                            Painel::alert('sucesso', 'Usuário "'.$nome.'" foi cadastrado SUCESSO!!!', '');
                                        }else{
                                            Painel::alert('error', 'Ocorreu um erro ao Cadastrar o Usuario "'.$nome.'"...','Por favor tente novamente.');
                                        }
                                    }
                                }
                            } 
                        }
                    ?>
                    <div class="form-group-wrapper">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome">
                        </div><!-- Form-Group-Nome -->

                        <div class="form-group">
                            <label for="login">Login:</label>
                            <input type="text" id="login" name="user">
                        </div><!-- Form-Group-User -->

                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="text" id="senha" name="password">
                        </div><!-- Form-Group-Senha -->

                        <div class="form-group">
                            <label for="">Cargo:</label>
                            <select name="cargo">
                                <option value="" selected>Selecione Um Cargo</option>
                                <?php
                                    foreach(Painel::$cargos as $key => $value){
                                        echo '<option value="'.$key.'">'.$value.'</option>';
                                    }
                                ?>
                            </select>
                        </div><!-- Form-Group-Cargo -->

                        <div class="form-group">
                            <label for="imagem">Imagem:</label>
                            <input type="file" id="imagem" name="imagem">
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