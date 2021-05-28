<?php
    if(isset($_COOKIE['lembrar'])){
        $user = $_COOKIE['user'];
        $password = $_COOKIE['password'];
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
        }

    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/main.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PANEL; ?>css/main.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PANEL; ?>css/login-style.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/animate.css">
    <title>Login</title>
</head>
<body>

    <?php
        $errorBox = '';
        $activeErroBox = '';
        $valueUser = '';
        $valuePassword = '';
        $classAnimate = 'animate-form';
        if(isset($_POST['acao'])){
            $user = strtolower($_POST['user']);
            $password = $_POST['password'];
            $userVazio = $user === '';
            $passwordVazio = $password === '';
            if($userVazio && !$passwordVazio){
                $activeErroBox = 'activeErrorBox';
                $errorBox = 'O campo <strong>USERNAME</strong> deve está preenchido';

                $valueUser = $user;
                $valuePassword = $password;
                $classAnimate = '';   
            }else if($passwordVazio && !$userVazio){
                $activeErroBox = 'activeErrorBox';
                $errorBox = 'O campo <strong>PASSWORD</strong> deve está preenchido'; 

                $valueUser = $user;
                $valuePassword = $password;
                $classAnimate = '';  
            }else if($userVazio && $passwordVazio){
                $activeErroBox = 'activeErrorBox vazio';
                $errorBox = 'Os campos <strong>USERNAME</strong> e <strong>PASSWORD</strong> devem ser preenchidos'; 

                $valueUser = $user;
                $valuePassword = $password;
                $classAnimate = '';   
            }else{
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
                $sql->execute(array($user, $password));

                if($sql->rowCount() == 1){
                    $info = $sql->fetch();

                    if($password === $info['password']){
                        // Login Efetuado com sucesso
                        $_SESSION['login'] = true;
                        $_SESSION['user'] = $user;
                        $_SESSION['password'] = $password;
                        $_SESSION['cargo'] = $info['cargo'];
                        $_SESSION['nome'] = $info['nome'];
                        $_SESSION['img'] = $info['img'];
                        if(isset($_POST['lembrar'])){
                            setcookie('lembrar', true, time()+(60*60*24), '/');
                            setcookie('user',$user,time()+(60*60*24), '/');
                            setcookie('password',$password,time()+(60*60*24), '/');
                        }
                        header('Location: '.INCLUDE_PATH_PANEL);
                        die();
                    }else{
                        // Login e/ou senha incorretos
                        $activeErroBox = 'activeErrorBox';
                        $errorBox = 'Usuário ou Senha Incorretos';

                        $valueUser = $user;
                        $valuePassword = $password;
                        $classAnimate = '';
                    }
                }else{
                    // Login e/ou senha incorretos
                    $activeErroBox = 'activeErrorBox';
                    $errorBox = 'Usuário ou Senha Incorretos';

                    $valueUser = $user;
                    $valuePassword = $password;
                    $classAnimate = '';
                }
            }
        }
    ?>
    <main>
        <div class="center">
            <div class="form-login">
                <div class="form-login-center <?php echo $classAnimate; ?>">
                    <div class="user-img">
                        <i alt="User_Img" title="Avatar"><?php echo Icon::$user1; ?></i>
                    </div><!-- Img-User -->

                    <div class="error-box <?php echo($activeErroBox);?>" style="<?php echo($opacityErroBox); ?>"><?php echo($errorBox); ?></div>
                    
                    <form method="post" id="form">
                        <div class="flex-login user-name">
                            <div class="user-img11">
                                <i alt="User_Img"><?php echo Icon::$user1; ?></i>
                            </div><!-- Img-User -->
                            <div class="input">
                                <input type="text" id="user" name="user" value="<?php echo $valueUser; ?>" placeholder="USERNAME" autocomplete="off">
                            </div><!-- Input -->
                        </div><!-- UserName -->

                        <div class="flex-login user-password">
                            <div class="user-img11">
                                <i alt="User_Img" class="cadeado"><?php echo Icon::$cadeadoFechado; ?></i>
                            </div><!-- Img-User -->
                            <div class="input password">
                                <input type="password" id="password" name="password" value="<?php echo $valuePassword; ?>" placeholder="PASSWORD" autocomplete="off">
                                <div class="showPassword">
                                    <i class="mostrar"><?php echo Icon::$mostrar; ?></i>
                                    <i class="ocultar"><?php echo Icon::$ocultar; ?></i>
                                </div><!-- Show Password -->
                            </div><!-- Input -->
                        </div><!-- UserPassword -->

                        <div class="flex-login logar-button">
                            <div class="input">
                                <input type="submit" name="acao" value="LOGIN" id="buttonEnviar">
                            </div><!-- Input -->
                        </div><!-- UserSubmit -->

                        <div class="user-lembrete">
                            <div class="input">
                                <input type="checkbox" name="lembrar" id="lembrarUser">
                                <label for="lembrarUser">
                                    <div class="after-lembrete"></div>
                                </label>
                                <span>Lembre-me</span>
                            </div><!-- Input -->
                            <div class="senha-esquecida">
                                <a href="#">Esqueceu a senha?</a>
                            </div>
                        </div><!-- Lembrete User -->
                    </form><!-- Form-Login -->
                </div><!-- Form-login-center -->
            </div><!-- Div-Form -->
            <div class="suport <?php echo $classAnimate; ?>">
                <p>Algum erro ou dificuldade?! Entre em contato com o <a href="">Suport</a></p>
            </div>
        </div><!-- Center -->
    </main><!-- Conteiner Principal -->

    <!-- JavaScript -- Jquery -->
    <script src="<?php echo INCLUDE_PATH; ?>js/jquery-3.5.1.min.js"></script>
    <script src="<?php echo INCLUDE_PATH_PANEL; ?>js/animacoes.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/pace.min.js"></script>
</body>
</html>