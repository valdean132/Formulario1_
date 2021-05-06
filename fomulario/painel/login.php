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
    <main>
        <div class="center">
            <div class="form-login">
                <div class="user-img">
                    <img src="<?php echo INCLUDE_PATH_PANEL; ?>img/user2.svg" alt="User">
                </div><!-- Img-User -->
                <form method="post">
                    <div class="flex-login user-name">
                        <div class="user-img11">
                            <img src="<?php echo INCLUDE_PATH_PANEL; ?>img/user2.svg" alt="User">
                        </div><!-- Img-User -->
                        <div class="input">
                            <input type="text" name="login" placeholder="USERNAME" autocomplete="off">
                        </div><!-- Input -->
                    </div><!-- UserName -->

                    <div class="flex-login user-password">
                        <div class="user-img11">
                            <img src="<?php echo INCLUDE_PATH_PANEL; ?>img/cadeado-fechado.svg" alt="User">
                        </div><!-- Img-User -->
                        <div class="input">
                            <input type="password" name="password" placeholder="PASSWORD" autocomplete="off">
                        </div><!-- Input -->
                    </div><!-- UserPassword -->

                    <div class="flex-login logar-button">
                        <div class="input">
                            <input type="submit" name="acao" value="LOGIN">
                        </div><!-- Input -->
                    </div><!-- UserSubmit -->

                    <div class="user-lembrete">
                        <div class="input">
                            <input type="checkbox" name="lembrarUser" id="lembrarUser">
                            <label for="lembrarUser"></label>
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
</body>
</html>