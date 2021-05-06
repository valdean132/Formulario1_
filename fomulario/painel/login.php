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
                <form>
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
                            <img src="<?php echo INCLUDE_PATH_PANEL; ?>img/user2.svg" alt="User">
                        </div><!-- Img-User -->
                        <div class="input">
                            <input type="password" name="password" placeholder="PASSWORD" autocomplete="off">
                        </div><!-- Input -->
                    </div><!-- UserPassword -->

                    <div class="flex-login logar-button">
                        <div class="input">
                            <input type="button" name="acao" value="LOGIN">
                        </div><!-- Input -->
                    </div><!-- UserPassword -->
                </form><!-- Form-Login -->
            </div><!-- Div-Form -->
        </div><!-- Center -->
    </main>
</body>
</html>