<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/main.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PANEL; ?>css/login-style.css">
    <title>Login</title>
</head>
<body>

    <?php
        $errorBox = '';
        $activeErroBox = '';
        if(isset($_POST['acao'])){
            $user = $_POST['user'];
            $password = $_POST['password'];
            $userVazio = $user === '';
            $passwordVazio = $password === '';
            if($userVazio && !$passwordVazio){
                $activeErroBox = 'activeErrorBox';
                $errorBox = 'O campo <strong>USERNAME</strong> deve está preenchido';   
            }else if($passwordVazio && !$userVazio){
                $activeErroBox = 'activeErrorBox';
                $errorBox = 'O campo <strong>PASSWORD</strong> deve está preenchido';   
            }else if($userVazio && $passwordVazio){
                $activeErroBox = 'activeErrorBox vazio';
                $errorBox = 'Os campos <strong>USERNAME</strong> e <strong>PASSWORD</strong> devem ser preenchidos';    
            }else{
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
                $sql->execute(array($user, $password));

                if($sql->rowCount() == 1){
                    $info = $sql->fetch();

                    // Login Efetuado com sucesso
                    $_SESSION['login'] = true;
                    $_SESSION['user'] = $user;
                    $_SESSION['password'] = $password;
                    $_SESSION['cargo'] = $info['cargo'];
                    $_SESSION['nome'] = $info['nome'];
                    $_SESSION['img'] = $info['img'];
                    header('Location: '.INCLUDE_PATH_PANEL);
                    die();
                }else{
                    // Login e/ou senha incorretos
                    $activeErroBox = 'activeErrorBox';
                    $errorBox = 'Usuário ou Senha Incorretos';
                }
            }
        }
    ?>
    <main>
        <div class="center">
            <div class="form-login">
                <div class="user-img">
                    <img src="<?php echo INCLUDE_PATH_PANEL; ?>img/user2.svg" alt="User">
                </div><!-- Img-User -->

                <div class="error-box <?php echo($activeErroBox);?>" style="<?php echo($opacityErroBox); ?>"><?php echo($errorBox); ?></div>
                
                <form method="post" id="form">
                    <div class="flex-login user-name">
                        <div class="user-img11">
                            <img src="<?php echo INCLUDE_PATH_PANEL; ?>img/user2.svg" alt="User">
                        </div><!-- Img-User -->
                        <div class="input">
                            <input type="text" id="user" name="user" placeholder="USERNAME" autocomplete="off">
                        </div><!-- Input -->
                    </div><!-- UserName -->

                    <div class="flex-login user-password">
                        <div class="user-img11">
                            <img src="<?php echo INCLUDE_PATH_PANEL; ?>img/cadeado-fechado.svg" alt="User">
                        </div><!-- Img-User -->
                        <div class="input">
                            <input type="password" id="password" name="password" placeholder="PASSWORD" autocomplete="off">
                        </div><!-- Input -->
                    </div><!-- UserPassword -->

                    <div class="flex-login logar-button">
                        <div class="input">
                            <input type="submit" name="acao" value="LOGIN" id="buttonEnviar">
                        </div><!-- Input -->
                    </div><!-- UserSubmit -->

                    <div class="user-lembrete">
                        <div class="input">
                            <input type="checkbox" name="lembrarUser" id="lembrarUser">
                            <label for="lembrarUser">
                                <div class="after-lembrete"></div>
                            </label>
                            <span>Lempre meu Login</span>
                        </div><!-- Input -->
                        <div class="senha-esquecida">
                            <a href="#">Esqueceu a senha?</a>
                        </div>
                    </div><!-- Lembrete User -->
                </form><!-- Form-Login -->
            </div><!-- Div-Form -->
            <div class="suport">
                <p>Algum erro ou dificuldade?! Entre em contato com o <a href="">Suport</a></p>
            </div>
        </div><!-- Center -->
    </main><!-- Conteiner Principal -->

    <!-- JavaScript -- Jquery -->
    <script src="<?php echo INCLUDE_PATH; ?>js/jquery-3.5.1.min.js"></script>
    <!-- <script src="<?php echo INCLUDE_PATH_PANEL; ?>js/entradaLogin.js"></script> -->
</body>
</html>